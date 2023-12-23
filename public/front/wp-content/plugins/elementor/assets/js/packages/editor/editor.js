/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/react-dom/client.js":
/*!******************************************!*\
  !*** ./node_modules/react-dom/client.js ***!
  \******************************************/
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {



var m = __webpack_require__(/*! react-dom */ "react-dom");
if (false) {} else {
  var i = m.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED;
  exports.createRoot = function(c, o) {
    i.usingClientEntryPoint = true;
    try {
      return m.createRoot(c, o);
    } finally {
      i.usingClientEntryPoint = false;
    }
  };
  exports.hydrateRoot = function(c, h, o) {
    i.usingClientEntryPoint = true;
    try {
      return m.hydrateRoot(c, h, o);
    } finally {
      i.usingClientEntryPoint = false;
    }
  };
}


/***/ }),

/***/ "react":
/*!**************************!*\
  !*** external ["React"] ***!
  \**************************/
/***/ (function(module) {

module.exports = window["React"];

/***/ }),

/***/ "react-dom":
/*!*****************************!*\
  !*** external ["ReactDOM"] ***!
  \*****************************/
/***/ (function(module) {

module.exports = window["ReactDOM"];

/***/ }),

/***/ "@elementor/editor-documents":
/*!**************************************************!*\
  !*** external ["elementorV2","editorDocuments"] ***!
  \**************************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["editorDocuments"];

/***/ }),

/***/ "@elementor/editor-v1-adapters":
/*!***************************************************!*\
  !*** external ["elementorV2","editorV1Adapters"] ***!
  \***************************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["editorV1Adapters"];

/***/ }),

/***/ "@elementor/locations":
/*!********************************************!*\
  !*** external ["elementorV2","locations"] ***!
  \********************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["locations"];

/***/ }),

/***/ "@elementor/query":
/*!****************************************!*\
  !*** external ["elementorV2","query"] ***!
  \****************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["query"];

/***/ }),

/***/ "@elementor/store":
/*!****************************************!*\
  !*** external ["elementorV2","store"] ***!
  \****************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["store"];

/***/ }),

/***/ "@elementor/ui":
/*!*************************************!*\
  !*** external ["elementorV2","ui"] ***!
  \*************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["ui"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ (function(module) {

module.exports = window["wp"]["i18n"];

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
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!*******************************************************!*\
  !*** ./node_modules/@elementor/editor/dist/index.mjs ***!
  \*******************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   init: function() { return /* binding */ init; },
/* harmony export */   injectIntoTop: function() { return /* binding */ injectIntoTop; }
/* harmony export */ });
/* harmony import */ var _elementor_locations__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @elementor/locations */ "@elementor/locations");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-dom */ "react-dom");
/* harmony import */ var react_dom_client__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react-dom/client */ "./node_modules/react-dom/client.js");
/* harmony import */ var _elementor_editor_documents__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @elementor/editor-documents */ "@elementor/editor-documents");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _elementor_ui__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @elementor/ui */ "@elementor/ui");
/* harmony import */ var _elementor_store__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @elementor/store */ "@elementor/store");
/* harmony import */ var _elementor_editor_v1_adapters__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @elementor/editor-v1-adapters */ "@elementor/editor-v1-adapters");
/* harmony import */ var _elementor_query__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @elementor/query */ "@elementor/query");
// src/locations.ts

var {
  Slot: TopSlot,
  inject: injectIntoTop
} = (0,_elementor_locations__WEBPACK_IMPORTED_MODULE_0__.createLocation)();

// src/init.tsx




// src/components/shell.tsx


// src/hooks/use-sync-document-title.ts



function useSyncDocumentTitle() {
  const activeDocument = (0,_elementor_editor_documents__WEBPACK_IMPORTED_MODULE_4__.__useActiveDocument)();
  const hostDocument = (0,_elementor_editor_documents__WEBPACK_IMPORTED_MODULE_4__.__useHostDocument)();
  const document = activeDocument && activeDocument.type.value !== "kit" ? activeDocument : hostDocument;
  (0,react__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    if (document?.title === void 0) {
      return;
    }
    const title = (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)('Edit "%s" with Elementor', "elementor").replace("%s", document.title);
    window.document.title = title;
  }, [document?.title]);
}

// src/components/shell.tsx
function Shell() {
  useSyncDocumentTitle();
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(TopSlot, null);
}

// src/init.tsx




// src/components/theme-provider.tsx



// src/sync/use-color-scheme.ts


function useColorScheme() {
  const [colorScheme, setColorScheme] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)(() => getV1ColorScheme());
  (0,react__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    return (0,_elementor_editor_v1_adapters__WEBPACK_IMPORTED_MODULE_8__.__privateListenTo)(
      (0,_elementor_editor_v1_adapters__WEBPACK_IMPORTED_MODULE_8__.v1ReadyEvent)(),
      () => setColorScheme(getV1ColorScheme())
    );
  }, []);
  (0,react__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    return (0,_elementor_editor_v1_adapters__WEBPACK_IMPORTED_MODULE_8__.__privateListenTo)(
      (0,_elementor_editor_v1_adapters__WEBPACK_IMPORTED_MODULE_8__.commandEndEvent)("document/elements/settings"),
      (e) => {
        const event = e;
        const isColorScheme = event.args?.settings && "ui_theme" in event.args.settings;
        if (isColorScheme) {
          setColorScheme(getV1ColorScheme());
        }
      }
    );
  }, []);
  return colorScheme;
}
function getV1ColorScheme() {
  return window.elementor?.getPreferences?.("ui_theme") || "auto";
}

// src/components/theme-provider.tsx
function ThemeProvider({ children }) {
  const colorScheme = useColorScheme();
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_6__.ThemeProvider, { colorScheme }, children);
}

// src/init.tsx

function init(domElement) {
  const store = (0,_elementor_store__WEBPACK_IMPORTED_MODULE_7__.__createStore)();
  const queryClient = (0,_elementor_query__WEBPACK_IMPORTED_MODULE_9__.createQueryClient)();
  (0,_elementor_editor_v1_adapters__WEBPACK_IMPORTED_MODULE_8__.__privateDispatchReadyEvent)();
  render2(/* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_store__WEBPACK_IMPORTED_MODULE_7__.__StoreProvider, { store }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_query__WEBPACK_IMPORTED_MODULE_9__.QueryClientProvider, { client: queryClient }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_6__.DirectionProvider, { rtl: window.document.dir === "rtl" }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(ThemeProvider, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(Shell, null))))), domElement);
}
function render2(app, domElement) {
  let renderFn;
  try {
    const root = (0,react_dom_client__WEBPACK_IMPORTED_MODULE_3__.createRoot)(domElement);
    renderFn = () => {
      root.render(app);
    };
  } catch (e) {
    renderFn = () => {
      react_dom__WEBPACK_IMPORTED_MODULE_2__.render(app, domElement);
    };
  }
  renderFn();
}

//# sourceMappingURL=index.mjs.map
}();
(window.elementorV2 = window.elementorV2 || {}).editor = __webpack_exports__;
/******/ })()
;