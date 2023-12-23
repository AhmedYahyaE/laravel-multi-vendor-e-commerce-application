/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/dev/js/admin/pages/settings-page.js":
/*!****************************************************!*\
  !*** ./assets/dev/js/admin/pages/settings-page.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "./node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.SettingsPage = void 0;
var _react = __webpack_require__(/*! react */ "react");
var _notices = __webpack_require__(/*! @wordpress/notices */ "@wordpress/notices");
var _data = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
var _i18n = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
var _api = _interopRequireDefault(__webpack_require__(/*! @wordpress/api */ "@wordpress/api"));
var _components = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
var _settingsPanel = __webpack_require__(/*! ./../panels/settings-panel.js */ "./assets/dev/js/admin/panels/settings-panel.js");
const Notices = () => {
  const notices = (0, _data.useSelect)(select => select(_notices.store).getNotices().filter(notice => 'snackbar' === notice.type), []);
  const {
    removeNotice
  } = (0, _data.useDispatch)(_notices.store);
  return /*#__PURE__*/React.createElement(_components.SnackbarList, {
    className: "edit-site-notices",
    notices: notices,
    onRemove: removeNotice
  });
};
const SETTINGS = {
  DESCRIPTION_META_TAG: '_description_meta_tag',
  SKIP_LINK: '_skip_link',
  PAGE_TITLE: '_page_title',
  HELLO_STYLE: '_hello_style',
  HELLO_THEME: '_hello_theme'
};
const SettingsPage = () => {
  const [hasLoaded, setHasLoaded] = (0, _react.useState)(false);
  const [settingsData, setSettingsData] = (0, _react.useState)({});
  const settingsPrefix = 'hello_elementor_settings';

  /**
   * Update settings data.
   *
   * @param {string} settingsName
   * @param {string} settingsValue
   */
  const updateSettings = (settingsName, settingsValue) => {
    setSettingsData({
      ...settingsData,
      [settingsName]: settingsValue
    });
  };

  /**
   * Save settings to server.
   */
  const saveSettings = () => {
    const data = {};
    Object.values(SETTINGS).forEach(value => data[`${settingsPrefix}${value}`] = settingsData[value] ? 'true' : '');
    const settings = new _api.default.models.Settings(data);
    settings.save();
    (0, _data.dispatch)('core/notices').createNotice('success', (0, _i18n.__)('Settings Saved', 'hello-elementor'), {
      type: 'snackbar',
      isDismissible: true
    });
  };
  (0, _react.useEffect)(() => {
    const fetchSettings = async () => {
      try {
        await _api.default.loadPromise;
        const settings = new _api.default.models.Settings();
        const response = await settings.fetch();
        const data = {};
        Object.values(SETTINGS).forEach(value => data[value] = response[`${settingsPrefix}${value}`]);
        setSettingsData(data);
        setHasLoaded(true);
      } catch (error) {
        // eslint-disable-next-line no-console
        console.error(error);
      }
    };
    if (hasLoaded) {
      return;
    }
    fetchSettings();
  }, [settingsData]);
  if (!hasLoaded) {
    return /*#__PURE__*/React.createElement(_components.Placeholder, null, /*#__PURE__*/React.createElement(_components.Spinner, null));
  }
  return /*#__PURE__*/React.createElement(_react.Fragment, null, /*#__PURE__*/React.createElement("div", {
    className: "hello_elementor__header"
  }, /*#__PURE__*/React.createElement("div", {
    className: "hello_elementor__container"
  }, /*#__PURE__*/React.createElement("div", {
    className: "hello_elementor__title"
  }, /*#__PURE__*/React.createElement("h1", null, (0, _i18n.__)('Hello Theme Settings', 'hello-elementor'))))), /*#__PURE__*/React.createElement("div", {
    className: "hello_elementor__main"
  }, /*#__PURE__*/React.createElement(_components.Panel, null, /*#__PURE__*/React.createElement(_settingsPanel.SettingsPanel, {
    SETTINGS,
    settingsData,
    updateSettings
  }), /*#__PURE__*/React.createElement(_components.Button, {
    isPrimary: true,
    onClick: saveSettings
  }, (0, _i18n.__)('Save Settings', 'hello-elementor')))), /*#__PURE__*/React.createElement("div", {
    className: "hello_elementor__notices"
  }, /*#__PURE__*/React.createElement(Notices, null)));
};
exports.SettingsPage = SettingsPage;

/***/ }),

/***/ "./assets/dev/js/admin/panels/settings-panel.js":
/*!******************************************************!*\
  !*** ./assets/dev/js/admin/panels/settings-panel.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.SettingsPanel = void 0;
var _i18n = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
var _components = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
const SettingsPanel = ({
  SETTINGS,
  settingsData,
  updateSettings
}) => {
  const protocol = window.location.protocol || 'https:';
  const hostname = window.location.hostname || 'example.com';
  const prefix = protocol + '//' + hostname;
  return /*#__PURE__*/React.createElement(_components.PanelBody, {
    title: (0, _i18n.__)('Hello Theme Settings', 'hello-elementor')
  }, /*#__PURE__*/React.createElement(_components.Notice, {
    status: "warning",
    isDismissible: "false"
  }, /*#__PURE__*/React.createElement(_components.Dashicon, {
    icon: "flag"
  }), (0, _i18n.__)('Be cautious, disabling some of the following options may break your website.', 'hello-elementor')), /*#__PURE__*/React.createElement(_components.ToggleControl, {
    label: (0, _i18n.__)('Disable description meta tag', 'hello-elementor'),
    help: (0, _i18n.__)('Remove the description meta tag in singular content pages that contain an excerpt.', 'hello-elementor'),
    checked: !!settingsData[SETTINGS.DESCRIPTION_META_TAG] || false,
    onChange: value => updateSettings(SETTINGS.DESCRIPTION_META_TAG, value)
  }), /*#__PURE__*/React.createElement("code", {
    className: "code-example"
  }, " <meta name=\"description\" content=\"...\" /> "), /*#__PURE__*/React.createElement(_components.ToggleControl, {
    label: (0, _i18n.__)('Disable skip link', 'hello-elementor'),
    help: (0, _i18n.__)('Remove the "Skip to content" link used by screen-readers and users navigating with a keyboard.', 'hello-elementor'),
    checked: !!settingsData[SETTINGS.SKIP_LINK] || false,
    onChange: value => updateSettings(SETTINGS.SKIP_LINK, value)
  }), /*#__PURE__*/React.createElement("code", {
    className: "code-example"
  }, " <a class=\"skip-link screen-reader-text\" href=\"#content\"> Skip to content </a> "), /*#__PURE__*/React.createElement(_components.ToggleControl, {
    label: (0, _i18n.__)('Disable page title', 'hello-elementor'),
    help: (0, _i18n.__)('Remove the section above the content that contains the main heading of the page.', 'hello-elementor'),
    checked: !!settingsData[SETTINGS.PAGE_TITLE] || false,
    onChange: value => updateSettings(SETTINGS.PAGE_TITLE, value)
  }), /*#__PURE__*/React.createElement("code", {
    className: "code-example"
  }, " <header class=\"page-header\"> <h1 class=\"entry-title\"> Post title </h1> </header> "), /*#__PURE__*/React.createElement(_components.ToggleControl, {
    label: (0, _i18n.__)('Unregister Hello style.css', 'hello-elementor'),
    help: (0, _i18n.__)("Disable Hello theme's style.css file which contains CSS reset rules for unified cross-browser view.", 'hello-elementor'),
    checked: !!settingsData[SETTINGS.HELLO_STYLE] || false,
    onChange: value => updateSettings(SETTINGS.HELLO_STYLE, value)
  }), /*#__PURE__*/React.createElement("code", {
    className: "code-example"
  }, " <link rel=\"stylesheet\" href=\"", prefix, "/wp-content/themes/hello-elementor/style.min.css\" /> "), /*#__PURE__*/React.createElement(_components.ToggleControl, {
    label: (0, _i18n.__)('Unregister Hello theme.css', 'hello-elementor'),
    help: (0, _i18n.__)("Disable Hello theme's theme.css file which contains CSS rules that style WordPress elements.", 'hello-elementor'),
    checked: !!settingsData[SETTINGS.HELLO_THEME] || false,
    onChange: value => updateSettings(SETTINGS.HELLO_THEME, value)
  }), /*#__PURE__*/React.createElement("code", {
    className: "code-example"
  }, " <link rel=\"stylesheet\" href=\"", prefix, "/wp-content/themes/hello-elementor/theme.min.css\" /> "));
};
exports.SettingsPanel = SettingsPanel;

/***/ }),

/***/ "./assets/dev/js/admin/hello-admin.scss":
/*!**********************************************!*\
  !*** ./assets/dev/js/admin/hello-admin.scss ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

"use strict";
module.exports = window["React"];

/***/ }),

/***/ "@wordpress/api":
/*!*****************************!*\
  !*** external ["wp","api"] ***!
  \*****************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["api"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["data"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "@wordpress/notices":
/*!*********************************!*\
  !*** external ["wp","notices"] ***!
  \*********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["notices"];

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
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!********************************************!*\
  !*** ./assets/dev/js/admin/hello-admin.js ***!
  \********************************************/


__webpack_require__(/*! ./hello-admin.scss */ "./assets/dev/js/admin/hello-admin.scss");
var _element = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
var _settingsPage = __webpack_require__(/*! ./pages/settings-page.js */ "./assets/dev/js/admin/pages/settings-page.js");
const App = () => {
  return /*#__PURE__*/React.createElement(_settingsPage.SettingsPage, null);
};
document.addEventListener('DOMContentLoaded', () => {
  const rootElement = document.getElementById('hello-elementor-settings');
  if (rootElement) {
    (0, _element.render)( /*#__PURE__*/React.createElement(App, null), rootElement);
  }
});
})();

/******/ })()
;
//# sourceMappingURL=hello-admin.js.map