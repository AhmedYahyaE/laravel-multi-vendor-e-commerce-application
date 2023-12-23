<?php
namespace ElementorPro\Modules\Screenshots;

use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Screenshot {

	const POST_META_KEY = '_elementor_screenshot';
	const IS_SCREENSHOT_POST_META_KEY = '_elementor_is_screenshot';
	const FAILED_POST_META_KEY = '_elementor_screenshot_failed';

	const SCREENSHOT_DIR = 'elementor/screenshots';

	/**
	 * @var int
	 */
	protected $post_id;

	/**
	 * @var string
	 */
	protected $base64_image;

	/**
	 * @var string
	 */
	protected $file_name;

	/**
	 * @var array
	 */
	protected $upload_bits;

	/**
	 * Screenshot constructor.
	 *
	 * @param int $post_id
	 * @param string $base64_image
	 */
	public function __construct( $post_id, $base64_image = null ) {
		$this->post_id = $post_id;
		$this->base64_image = $base64_image;
	}

	/**
	 * Creates the directory if needed + add index.html file for security reasons.
	 *
	 * @return $this
	 */
	public function create_dir() {
		$dir = wp_upload_dir()['basedir'] . '/' . self::SCREENSHOT_DIR;
		$html_file = $dir . '/index.html';

		if ( file_exists( $html_file ) ) {
			return $this;
		};

		if ( ! file_exists( $dir ) ) {
			wp_mkdir_p( $dir );
		}

		touch( $html_file );

		return $this;
	}

	/**
	 * Uploads the base64 image it self.
	 *
	 * TODO: Use Upload Manager when ready.
	 *
	 * @return $this
	 * @throws \Exception
	 */
	public function upload() {
		if ( ! $this->base64_image ) {
			throw new \Exception( 'Cannot upload an image with out base64_image.' );
		}

		$file_content = substr( $this->base64_image, strlen( 'data:image/png;base64,' ) );

		add_filter( 'wp_unique_filename', [ $this, 'get_file_name' ] );
		add_filter( 'upload_dir', [ $this, 'extend_upload_dirs_array' ] );

		$this->upload_bits = wp_upload_bits(
			$this->get_file_name(),
			null,
			base64_decode( $file_content )
		);

		remove_filter( 'wp_unique_filename', [ $this, 'get_file_name' ] );
		remove_filter( 'upload_dir', [ $this, 'extend_upload_dirs_array' ] );

		return $this;
	}

	/**
	 * Removes the old attachment if there is an old screenshot image.
	 *
	 * @return $this
	 */
	public function remove_old_attachment() {
		$post_meta = get_post_meta( $this->post_id, self::POST_META_KEY, true );

		if ( ! $post_meta ) {
			return $this;
		}

		wp_delete_attachment( $post_meta['id'] );

		return $this;
	}

	/**
	 * Removes the old post meta of the current post.
	 *
	 * @return $this
	 */
	public function remove_old_post_meta() {
		delete_post_meta( $this->post_id, self::POST_META_KEY );

		return $this;
	}

	/**
	 * Creates an attachment to the new screenshot and attach it to the original post
	 * via post_meta.
	 *
	 * @return $this
	 * @throws \Exception
	 */
	public function create_new_attachment() {
		$upload_bits = $this->get_upload_bits();

		$info = wp_check_filetype( $upload_bits['file'] );
		$post_mime_type = null;

		if ( $info ) {
			$post_mime_type = $info['type'];
		}

		$attachment_id = wp_insert_attachment(
			[
				'post_title' => $this->get_file_name(),
				'guid' => $upload_bits['url'],
				'post_mime_type' => $post_mime_type,
				'meta_input' => [
					self::IS_SCREENSHOT_POST_META_KEY => true,
				],
			],
			$upload_bits['file'],
			$this->post_id
		);

		update_post_meta( $this->post_id, self::POST_META_KEY, [
			'id' => $attachment_id,
			'url' => $upload_bits['url'],
		] );

		return $this;
	}

	/**
	 * Mark the post that the screenshot capture was failed.
	 *
	 * @return $this
	 */
	public function mark_as_failed() {
		update_post_meta(
			$this->post_id,
			self::FAILED_POST_META_KEY,
			( new \DateTime() )->format( 'Y-m-d H:i:s' )
		);

		return $this;
	}

	/**
	 * Remove the failed_screenshot post meta.
	 *
	 * @return $this
	 */
	public function unmark_as_failed() {
		delete_post_meta( $this->post_id, self::FAILED_POST_META_KEY );

		return $this;
	}

	/**
	 * Get the file name,
	 * if not exists will generate it.
	 *
	 * @return string
	 */
	public function get_file_name() {
		if ( ! $this->file_name ) {
			$now = ( new \DateTime() )->format( 'Y-m-d-H-i-s' );
			$random_str = Utils::generate_random_string();

			$this->file_name = "Elementor-post-screenshot_{$this->post_id}_{$now}_{$random_str}.png";
		}

		return $this->file_name;
	}

	/**
	 * Extend and change the upload_dirs original method
	 * to update the current screenshot to custom directory.
	 *
	 * @param $upload_dirs
	 *
	 * @return array
	 */
	public function extend_upload_dirs_array( $upload_dirs ) {
		return array_merge( $upload_dirs, [
			'subdir' => $subdir = self::SCREENSHOT_DIR,
			'path' => "{$upload_dirs['basedir']}/{$subdir}",
			'url' => "{$upload_dirs['baseurl']}/{$subdir}",
		] );
	}

	/**
	 * Get wp_upload_bits result.
	 *
	 * This method will be throw an exception if was called before actually upload a screenshot.
	 *
	 * @return array
	 * @throws \Exception
	 */
	protected function get_upload_bits() {
		if ( ! $this->upload_bits ) {
			throw new \Exception( 'File was not uploaded yet.' );
		}

		return $this->upload_bits;
	}

	/**
	 * Get the url of the screenshot.
	 *
	 * @return string
	 * @throws \Exception
	 */
	public function get_screenshot_url() {
		return $this->get_upload_bits()['url'];
	}
}
