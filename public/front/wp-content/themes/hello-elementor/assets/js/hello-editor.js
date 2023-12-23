/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/dev/js/editor/component.js":
/*!*******************************************!*\
  !*** ./assets/dev/js/editor/component.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "./node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _defineProperty2 = _interopRequireDefault(__webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js"));
var _controlsHook = _interopRequireDefault(__webpack_require__(/*! ./hooks/ui/controls-hook */ "./assets/dev/js/editor/hooks/ui/controls-hook.js"));
class _default extends $e.modules.ComponentBase {
  constructor(...args) {
    super(...args);
    (0, _defineProperty2.default)(this, "pages", {});
  }
  getNamespace() {
    return 'hello-elementor';
  }
  defaultHooks() {
    return this.importHooks({
      ControlsHook: _controlsHook.default
    });
  }
}
exports["default"] = _default;

/***/ }),

/***/ "./assets/dev/js/editor/hooks/ui/controls-hook.js":
/*!********************************************************!*\
  !*** ./assets/dev/js/editor/hooks/ui/controls-hook.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class ControlsHook extends $e.modules.hookUI.After {
  getCommand() {
    // Command to listen.
    return 'document/elements/settings';
  }
  getId() {
    // Unique id for the hook.
    return 'hello-elementor-editor-controls-handler';
  }

  /**
   * Get Hello Elementor Theme Controls
   *
   * Returns an object in which the keys are control IDs, and the values are the selectors of the elements that need
   * to be targeted in the apply() method.
   *
   * Example return value:
   *   {
   *      hello_elementor_show_logo: '.site-header .site-header-logo',
   *      hello_elementor_show_menu: '.site-header .site-header-menu',
   *   }
   */
  getHelloThemeControls() {
    return {
      hello_header_logo_display: {
        selector: '.site-header .site-logo, .site-header .site-title',
        callback: ($element, args) => {
          this.toggleShowHideClass($element, args.settings.hello_header_logo_display);
        }
      },
      hello_header_menu_display: {
        selector: '.site-header .site-navigation, .site-header .site-navigation-toggle-holder',
        callback: ($element, args) => {
          this.toggleShowHideClass($element, args.settings.hello_header_menu_display);
        }
      },
      hello_header_tagline_display: {
        selector: '.site-header .site-description',
        callback: ($element, args) => {
          this.toggleShowHideClass($element, args.settings.hello_header_tagline_display);
        }
      },
      hello_header_logo_type: {
        selector: '.site-header .site-branding',
        callback: ($element, args) => {
          const classPrefix = 'show-',
            inputOptions = args.container.controls.hello_header_logo_type.options,
            inputValue = args.settings.hello_header_logo_type;
          this.toggleLayoutClass($element, classPrefix, inputOptions, inputValue);
        }
      },
      hello_header_layout: {
        selector: '.site-header',
        callback: ($element, args) => {
          const classPrefix = 'header-',
            inputOptions = args.container.controls.hello_header_layout.options,
            inputValue = args.settings.hello_header_layout;
          this.toggleLayoutClass($element, classPrefix, inputOptions, inputValue);
        }
      },
      hello_header_width: {
        selector: '.site-header',
        callback: ($element, args) => {
          const classPrefix = 'header-',
            inputOptions = args.container.controls.hello_header_width.options,
            inputValue = args.settings.hello_header_width;
          this.toggleLayoutClass($element, classPrefix, inputOptions, inputValue);
        }
      },
      hello_header_menu_layout: {
        selector: '.site-header',
        callback: ($element, args) => {
          const classPrefix = 'menu-layout-',
            inputOptions = args.container.controls.hello_header_menu_layout.options,
            inputValue = args.settings.hello_header_menu_layout;

          // No matter what, close the mobile menu
          $element.find('.site-navigation-toggle-holder').removeClass('elementor-active');
          $element.find('.site-navigation-dropdown').removeClass('show');
          this.toggleLayoutClass($element, classPrefix, inputOptions, inputValue);
        }
      },
      hello_header_menu_dropdown: {
        selector: '.site-header',
        callback: ($element, args) => {
          const classPrefix = 'menu-dropdown-',
            inputOptions = args.container.controls.hello_header_menu_dropdown.options,
            inputValue = args.settings.hello_header_menu_dropdown;
          this.toggleLayoutClass($element, classPrefix, inputOptions, inputValue);
        }
      },
      hello_footer_logo_display: {
        selector: '.site-footer .site-logo, .site-footer .site-title',
        callback: ($element, args) => {
          this.toggleShowHideClass($element, args.settings.hello_footer_logo_display);
        }
      },
      hello_footer_tagline_display: {
        selector: '.site-footer .site-description',
        callback: ($element, args) => {
          this.toggleShowHideClass($element, args.settings.hello_footer_tagline_display);
        }
      },
      hello_footer_menu_display: {
        selector: '.site-footer .site-navigation',
        callback: ($element, args) => {
          this.toggleShowHideClass($element, args.settings.hello_footer_menu_display);
        }
      },
      hello_footer_copyright_display: {
        selector: '.site-footer .copyright',
        callback: ($element, args) => {
          const $footerContainer = $element.closest('#site-footer'),
            inputValue = args.settings.hello_footer_copyright_display;
          this.toggleShowHideClass($element, inputValue);
          $footerContainer.toggleClass('footer-has-copyright', 'yes' === inputValue);
        }
      },
      hello_footer_logo_type: {
        selector: '.site-footer .site-branding',
        callback: ($element, args) => {
          const classPrefix = 'show-',
            inputOptions = args.container.controls.hello_footer_logo_type.options,
            inputValue = args.settings.hello_footer_logo_type;
          this.toggleLayoutClass($element, classPrefix, inputOptions, inputValue);
        }
      },
      hello_footer_layout: {
        selector: '.site-footer',
        callback: ($element, args) => {
          const classPrefix = 'footer-',
            inputOptions = args.container.controls.hello_footer_layout.options,
            inputValue = args.settings.hello_footer_layout;
          this.toggleLayoutClass($element, classPrefix, inputOptions, inputValue);
        }
      },
      hello_footer_width: {
        selector: '.site-footer',
        callback: ($element, args) => {
          const classPrefix = 'footer-',
            inputOptions = args.container.controls.hello_footer_width.options,
            inputValue = args.settings.hello_footer_width;
          this.toggleLayoutClass($element, classPrefix, inputOptions, inputValue);
        }
      },
      hello_footer_copyright_text: {
        selector: '.site-footer .copyright',
        callback: ($element, args) => {
          const inputValue = args.settings.hello_footer_copyright_text;
          $element.find('p').text(inputValue);
        }
      }
    };
  }

  /**
   * Toggle show and hide classes on containers
   *
   * This will remove the .show and .hide clases from the element, then apply the new class
   *
   * @param {jQuery} element
   * @param {string} inputValue
   */
  toggleShowHideClass(element, inputValue) {
    element.removeClass('hide').removeClass('show').addClass(inputValue ? 'show' : 'hide');
  }

  /**
   * Toggle layout classes on containers
   *
   * This will cleanly set classes onto which ever container we want to target, removing the old classes and adding the new one
   *
   * @param {jQuery} element
   * @param {string} classPrefix
   * @param {Object} inputOptions
   * @param {string} inputValue
   *
   */
  toggleLayoutClass(element, classPrefix, inputOptions, inputValue) {
    // Loop through the possible classes and remove the one that's not in use
    Object.entries(inputOptions).forEach(([key]) => {
      element.removeClass(classPrefix + key);
    });

    // Append the class which we want to use onto the element
    if ('' !== inputValue) {
      element.addClass(classPrefix + inputValue);
    }
  }

  /**
   * Set the conditions under which the hook will run.
   *
   * @param {Object} args
   */
  getConditions(args) {
    const isKit = 'kit' === elementor.documents.getCurrent().config.type,
      changedControls = Object.keys(args.settings),
      isSingleSetting = 1 === changedControls.length;

    // If the document is not a kit, or there are no changed settings, or there is more than one single changed
    // setting, don't run the hook.
    if (!isKit || !args.settings || !isSingleSetting) {
      return false;
    }

    // If the changed control is in the list of theme controls, return true to run the hook.
    // Otherwise, return false so the hook doesn't run.
    return !!Object.keys(this.getHelloThemeControls()).includes(changedControls[0]);
  }

  /**
   * The hook logic.
   *
   * @param {Object} args
   */
  apply(args) {
    const allThemeControls = this.getHelloThemeControls(),
      // Extract the control ID from the passed args
      controlId = Object.keys(args.settings)[0],
      controlConfig = allThemeControls[controlId],
      // Find the element that needs to be targeted by the control.
      $element = elementor.$previewContents.find(controlConfig.selector);
    controlConfig.callback($element, args);
  }
}
exports["default"] = ControlsHook;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/defineProperty.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/defineProperty.js ***!
  \***************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var toPropertyKey = __webpack_require__(/*! ./toPropertyKey.js */ "./node_modules/@babel/runtime/helpers/toPropertyKey.js");
function _defineProperty(obj, key, value) {
  key = toPropertyKey(key);
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }
  return obj;
}
module.exports = _defineProperty, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/interopRequireDefault.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/interopRequireDefault.js ***!
  \**********************************************************************/
/***/ ((module) => {

function _interopRequireDefault(obj) {
  return obj && obj.__esModule ? obj : {
    "default": obj
  };
}
module.exports = _interopRequireDefault, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/toPrimitive.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/toPrimitive.js ***!
  \************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var _typeof = (__webpack_require__(/*! ./typeof.js */ "./node_modules/@babel/runtime/helpers/typeof.js")["default"]);
function _toPrimitive(input, hint) {
  if (_typeof(input) !== "object" || input === null) return input;
  var prim = input[Symbol.toPrimitive];
  if (prim !== undefined) {
    var res = prim.call(input, hint || "default");
    if (_typeof(res) !== "object") return res;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return (hint === "string" ? String : Number)(input);
}
module.exports = _toPrimitive, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/toPropertyKey.js":
/*!**************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/toPropertyKey.js ***!
  \**************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var _typeof = (__webpack_require__(/*! ./typeof.js */ "./node_modules/@babel/runtime/helpers/typeof.js")["default"]);
var toPrimitive = __webpack_require__(/*! ./toPrimitive.js */ "./node_modules/@babel/runtime/helpers/toPrimitive.js");
function _toPropertyKey(arg) {
  var key = toPrimitive(arg, "string");
  return _typeof(key) === "symbol" ? key : String(key);
}
module.exports = _toPropertyKey, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/typeof.js":
/*!*******************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/typeof.js ***!
  \*******************************************************/
/***/ ((module) => {

function _typeof(o) {
  "@babel/helpers - typeof";

  return (module.exports = _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, module.exports.__esModule = true, module.exports["default"] = module.exports), _typeof(o);
}
module.exports = _typeof, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!**********************************************!*\
  !*** ./assets/dev/js/editor/hello-editor.js ***!
  \**********************************************/


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "./node_modules/@babel/runtime/helpers/interopRequireDefault.js");
var _component = _interopRequireDefault(__webpack_require__(/*! ./component */ "./assets/dev/js/editor/component.js"));
$e.components.register(new _component.default());
})();

/******/ })()
;
//# sourceMappingURL=hello-editor.js.map