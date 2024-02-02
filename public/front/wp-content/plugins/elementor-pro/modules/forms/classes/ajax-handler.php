<?php
namespace ElementorPro\Modules\Forms\Classes;

use ElementorPro\Core\Utils;
use ElementorPro\Modules\Forms\Module;
use ElementorPro\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Ajax_Handler {

	public $is_success = true;
	public $messages = [
		'success' => [],
		'error' => [],
		'admin_error' => [],
	];
	public $data = [];
	public $errors = [];

	private $current_form;

	const SUCCESS = 'success';
	const ERROR = 'error';
	const FIELD_REQUIRED = 'required_field';
	const INVALID_FORM = 'invalid_form';
	const SERVER_ERROR = 'server_error';
	const SUBSCRIBER_ALREADY_EXISTS = 'subscriber_already_exists';

	public static function is_form_submitted() {
		// PHPCS - No nonce is required, all visitors may send the form.
		return wp_doing_ajax() && isset( $_POST['action'] ) && 'elementor_pro_forms_send_form' === $_POST['action']; // phpcs:ignore WordPress.Security.NonceVerification.Missing
	}

	public static function get_default_messages() {
		return [
			self::SUCCESS => esc_html__( 'Your submission was successful.', 'elementor-pro' ),
			self::ERROR => esc_html__( 'Your submission failed because of an error.', 'elementor-pro' ),
			self::FIELD_REQUIRED => esc_html__( 'This field is required.', 'elementor-pro' ),
			self::INVALID_FORM => esc_html__( 'Your submission failed because the form is invalid.', 'elementor-pro' ),
			self::SERVER_ERROR => esc_html__( 'Your submission failed because of a server error.', 'elementor-pro' ),
			self::SUBSCRIBER_ALREADY_EXISTS => esc_html__( 'Subscriber already exists.', 'elementor-pro' ),
		];
	}

	public static function get_default_message( $id, $settings ) {
		if ( ! empty( $settings['custom_messages'] ) ) {
			$field_id = $id . '_message';
			if ( isset( $settings[ $field_id ] ) ) {
				return $settings[ $field_id ];
			}
		}

		$default_messages = self::get_default_messages();

		return isset( $default_messages[ $id ] ) ? $default_messages[ $id ] : esc_html__( 'Unknown error.', 'elementor-pro' );
	}

	public function ajax_send_form() {
		$post_data = $_POST; // phpcs:ignore WordPress.Security.NonceVerification.Missing
		// $post_id that holds the form settings.
		$post_id = $post_data['post_id'];

		// $queried_id the post for dynamic values data.
		if ( isset( $post_data['queried_id'] ) ) {
			$queried_id = $post_data['queried_id'];
		} else {
			$queried_id = $post_id;
		}

		// Make the post as global post for dynamic values.
		Plugin::elementor()->db->switch_to_post( $queried_id );

		$form_id = $post_data['form_id'];

		$elementor = Plugin::elementor();
		$document = $elementor->documents->get( $post_id );
		$form = null;
		$template_id = null;

		if ( $document ) {
			$form = Module::find_element_recursive( $document->get_elements_data(), $form_id );
		}

		if ( ! empty( $form['templateID'] ) ) {
			$template = Plugin::elementor()->documents->get( $form['templateID'] );

			if ( ! $template ) {
				return false;
			}

			$template_id = $template->get_id();
			$form = $template->get_elements_data()[0];
		}

		if ( empty( $form ) ) {
			$this
				->add_error_message( self::get_default_message( self::INVALID_FORM, [] ) )
				->send();
		}

		// restore default values
		$widget = $elementor->elements_manager->create_element_instance( $form );
		$form['settings'] = $widget->get_settings_for_display();
		$form['settings']['id'] = $form_id;
		$form['settings']['form_post_id'] = $template_id ? $template_id : $post_id;

		// TODO: Should be removed if there is an ability to edit "global widgets"
		$form['settings']['edit_post_id'] = $post_id;

		$this->current_form = $form;

		if ( empty( $form['settings']['form_fields'] ) ) {
			$this
				->add_error_message( self::get_default_message( self::INVALID_FORM, $form['settings'] ) )
				->send();
		}

		$record = new Form_Record( $post_data['form_fields'], $form );

		if ( ! $record->validate( $this ) ) {
			$this
				->add_error( $record->get( 'errors' ) )
				->add_error_message( self::get_default_message( self::ERROR, $form['settings'] ) )
				->send();
		}

		$record->process_fields( $this );
		//check for process errors
		if ( ! empty( $this->errors ) ) {
			$this->send();
		}

		$module = Module::instance();

		$actions = $module->actions_registrar->get();
		$errors = array_merge( $this->messages['error'], $this->messages['admin_error'] );

		/**
		 * Filters the record before it sent to actions after submit.
		 *
		 * @since 3.3.0
		 *
		 * @param Form_Record $record The form record.
		 * @param Ajax_Handler $this The class that handle the submission of the record
		 */
		$record = apply_filters( 'elementor_pro/forms/record/actions_before', $record, $this );

		foreach ( $actions as $action ) {
			if ( ! in_array( $action->get_name(), $form['settings']['submit_actions'], true ) ) {
				continue;
			}

			$exception = null;

			try {
				$action->run( $record, $this );

				$this->handle_bc_errors( $errors );
			} catch ( \Exception $e ) {
				$exception = $e;

				// Add an admin error.
				if ( ! in_array( $exception->getMessage(), $this->messages['admin_error'], true ) ) {
					$this->add_admin_error_message( "{$action->get_label()} {$exception->getMessage()}" );
				}

				// Add a user error.
				$this->add_error_message( $this->get_default_message( self::ERROR, $this->current_form['settings'] ) );
			}

			$errors = array_merge( $this->messages['error'], $this->messages['admin_error'] );

			/**
			 * After form actions run.
			 *
			 * Fires after Elementor forms run actions. This hook allows
			 * developers to add functionality after certain actions run.
			 *
			 * @param Action_Base     $action    An instance of form action.
			 * @param \Exception|null $exception An instance of the exception.
			 */
			do_action( 'elementor_pro/forms/actions/after_run', $action, $exception );
		}

		$activity_log = $module->get_component( 'activity_log' );
		if ( $activity_log ) {
			$activity_log->run( $record, $this );
		}

		$cf7db = $module->get_component( 'cf7db' );
		if ( $cf7db ) {
			$cf7db->run( $record, $this );
		}

		/**
		 * New Elementor form record.
		 *
		 * Fires before a new form record is sent by ajax. This hook allows
		 * developers to add functionality before a new form record is sent.
		 *
		 * @since 1.0.0
		 *
		 * @param Form_Record  $record An instance of the form record.
		 * @param Ajax_Handler $this   An instance of the ajax handler.
		 */
		do_action( 'elementor_pro/forms/new_record', $record, $this );

		$this->send();
	}

	public function add_success_message( $message ) {
		$this->messages['success'][] = $message;

		return $this;
	}

	public function add_response_data( $key, $data ) {
		$this->data[ $key ] = $data;

		return $this;
	}

	public function add_error_message( $message ) {
		$this->messages['error'][] = $message;
		$this->set_success( false );

		return $this;
	}

	public function add_error( $field, $message = '' ) {
		if ( is_array( $field ) ) {
			$this->errors += $field;
		} else {
			$this->errors[ $field ] = $message;
		}

		$this->set_success( false );

		return $this;
	}

	public function add_admin_error_message( $message ) {
		$this->messages['admin_error'][] = $message;
		$this->set_success( false );

		return $this;
	}

	public function set_success( $bool ) {
		$this->is_success = $bool;

		return $this;
	}

	public function send() {
		if ( $this->is_success ) {
			wp_send_json_success( [
				'message' => $this->get_default_message( self::SUCCESS, $this->current_form['settings'] ),
				'data' => $this->data,
			] );
		}

		if ( empty( $this->messages['error'] ) && ! empty( $this->errors ) ) {
			$this->add_error_message( $this->get_default_message( self::INVALID_FORM, $this->current_form['settings'] ) );
		}

		$post_id = Utils::_unstable_get_super_global_value( $_POST, 'post_id' ); // phpcs:ignore WordPress.Security.NonceVerification.Missing

		$error_msg = implode( '<br>', $this->messages['error'] );
		if ( current_user_can( 'edit_post', $post_id ) && ! empty( $this->messages['admin_error'] ) ) {
			$this->add_admin_error_message( esc_html__( 'This message is not visible to site visitors.', 'elementor-pro' ) );
			$error_msg .= '<div class="elementor-forms-admin-errors">' . implode( '<br>', $this->messages['admin_error'] ) . '</div>';
		}

		wp_send_json_error( [
			'message' => $error_msg,
			'errors' => $this->errors,
			'data' => $this->data,
		] );
	}

	public function get_current_form() {
		return $this->current_form;
	}

	/**
	 * BC: checks if the current action add some errors to the errors array
	 * if it add an error the "run" method treat it as a failed action.
	 *
	 * @param $errors
	 *
	 * @throws \Exception
	 */
	private function handle_bc_errors( $errors ) {
		$current_errors = array_merge( $this->messages['error'], $this->messages['admin_error'] );
		$errors_diff = array_diff( $current_errors, $errors );

		if ( count( $errors_diff ) > 0 ) {
			throw new \Exception( implode( ', ', $errors_diff ) );
		}
	}

	public function __construct() {
		add_action( 'wp_ajax_elementor_pro_forms_send_form', [ $this, 'ajax_send_form' ] );
		add_action( 'wp_ajax_nopriv_elementor_pro_forms_send_form', [ $this, 'ajax_send_form' ] );
	}
}
