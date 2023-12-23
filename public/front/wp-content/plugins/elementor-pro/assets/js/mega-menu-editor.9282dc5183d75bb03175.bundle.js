/*! elementor-pro - v3.18.0 - 06-12-2023 */
"use strict";
(self["webpackChunkelementor_pro"] = self["webpackChunkelementor_pro"] || []).push([["mega-menu-editor"],{

/***/ "../modules/mega-menu/assets/js/editor/mega-menu.js":
/*!**********************************************************!*\
  !*** ../modules/mega-menu/assets/js/editor/mega-menu.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = exports.MegaMenu = void 0;
var _view = _interopRequireDefault(__webpack_require__(/*! ./views/view */ "../modules/mega-menu/assets/js/editor/views/view.js"));
class MegaMenu extends elementor.modules.elements.types.NestedElementBase {
  getType() {
    return 'mega-menu';
  }
  getView() {
    return _view.default;
  }
}
exports.MegaMenu = MegaMenu;
var _default = exports["default"] = MegaMenu;

/***/ }),

/***/ "../modules/mega-menu/assets/js/editor/module.js":
/*!*******************************************************!*\
  !*** ../modules/mega-menu/assets/js/editor/module.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _megaMenu = _interopRequireDefault(__webpack_require__(/*! ./mega-menu */ "../modules/mega-menu/assets/js/editor/mega-menu.js"));
var _urlHelper = _interopRequireDefault(__webpack_require__(/*! ./utils/url-helper */ "../modules/mega-menu/assets/js/editor/utils/url-helper.js"));
class Module {
  constructor() {
    elementor.elementsManager.registerElementType(new _megaMenu.default());
    this.urlHelper = new _urlHelper.default();
  }
  getCurrentMenuItemClass(menuLinkUrl, permalinkUrl) {
    menuLinkUrl = menuLinkUrl?.trim(menuLinkUrl);
    if (!menuLinkUrl || !permalinkUrl) {
      return '';
    }
    const permalinkArray = this.urlHelper.parse_url(permalinkUrl),
      menuItemUrlArray = this.urlHelper.parse_url(menuLinkUrl),
      hasEqualUrls = _.isEqual(permalinkArray, menuItemUrlArray);
    return hasEqualUrls ? 'e-current' : '';
  }
}
exports["default"] = Module;

/***/ }),

/***/ "../modules/mega-menu/assets/js/editor/utils/url-helper.js":
/*!*****************************************************************!*\
  !*** ../modules/mega-menu/assets/js/editor/utils/url-helper.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = exports.UrlHelper = void 0;
class UrlHelper {
  parse_url(url) {
    try {
      const {
          hostname,
          pathname,
          search
        } = new URL(url),
        host = hostname.replace('www.', ''),
        trailingSlashesRegex = /^\/+|\/+$/g,
        path = pathname.replace(trailingSlashesRegex, '');
      return [host, path, search];
    } catch (err) {
      return false;
    }
  }
}
exports.UrlHelper = UrlHelper;
var _default = exports["default"] = UrlHelper;

/***/ }),

/***/ "../modules/mega-menu/assets/js/editor/views/view.js":
/*!***********************************************************!*\
  !*** ../modules/mega-menu/assets/js/editor/views/view.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, exports) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class View extends $e.components.get('nested-elements').exports.NestedView {
  filter(child, index) {
    child.attributes.dataIndex = index + 1;
    child.attributes.widgetId = child.id;
    return true;
  }
  onAddChild(childView) {
    const widgetNumber = childView._parent.$el.find('.e-n-menu')[0]?.dataset.widgetNumber || childView.model.attributes.widgetId,
      index = childView.model.attributes.dataIndex,
      tabId = childView._parent.$el.find(`.e-n-menu-item-title[data-tab-index="${index}"]`)?.attr('id') || childView.model.attributes.widgetId + ' ' + index;
    childView.$el.attr({
      id: 'e-n-menu-content-' + widgetNumber + '' + index,
      role: 'menu',
      'aria-labelledby': tabId,
      'data-tab-index': index,
      style: '--n-menu-title-order: ' + index + ';'
    });
  }
}
exports["default"] = View;

/***/ })

}]);
//# sourceMappingURL=mega-menu-editor.9282dc5183d75bb03175.bundle.js.map