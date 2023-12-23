/*! elementor-pro - v3.18.0 - 06-12-2023 */
(self["webpackChunkelementor_pro"] = self["webpackChunkelementor_pro"] || []).push([["preloaded-elements-handlers"],{

/***/ "../assets/dev/js/frontend/preloaded-elements-handlers.js":
/*!****************************************************************!*\
  !*** ../assets/dev/js/frontend/preloaded-elements-handlers.js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
var _frontendLegacy = _interopRequireDefault(__webpack_require__(/*! modules/animated-headline/assets/js/frontend/frontend-legacy */ "../modules/animated-headline/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy2 = _interopRequireDefault(__webpack_require__(/*! modules/carousel/assets/js/frontend/frontend-legacy */ "../modules/carousel/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy3 = _interopRequireDefault(__webpack_require__(/*! modules/countdown/assets/js/frontend/frontend-legacy */ "../modules/countdown/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy4 = _interopRequireDefault(__webpack_require__(/*! modules/forms/assets/js/frontend/frontend-legacy */ "../modules/forms/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy5 = _interopRequireDefault(__webpack_require__(/*! modules/gallery/assets/js/frontend/frontend-legacy */ "../modules/gallery/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy6 = _interopRequireDefault(__webpack_require__(/*! modules/hotspot/assets/js/frontend/frontend-legacy */ "../modules/hotspot/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy7 = _interopRequireDefault(__webpack_require__(/*! modules/lottie/assets/js/frontend/frontend-legacy */ "../modules/lottie/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy8 = _interopRequireDefault(__webpack_require__(/*! modules/nav-menu/assets/js/frontend/frontend-legacy */ "../modules/nav-menu/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy9 = _interopRequireDefault(__webpack_require__(/*! modules/popup/assets/js/frontend/frontend-legacy */ "../modules/popup/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy10 = _interopRequireDefault(__webpack_require__(/*! modules/posts/assets/js/frontend/frontend-legacy */ "../modules/posts/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy11 = _interopRequireDefault(__webpack_require__(/*! modules/share-buttons/assets/js/frontend/frontend-legacy */ "../modules/share-buttons/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy12 = _interopRequireDefault(__webpack_require__(/*! modules/slides/assets/js/frontend/frontend-legacy */ "../modules/slides/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy13 = _interopRequireDefault(__webpack_require__(/*! modules/social/assets/js/frontend/frontend-legacy */ "../modules/social/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy14 = _interopRequireDefault(__webpack_require__(/*! modules/table-of-contents/assets/js/frontend/frontend-legacy */ "../modules/table-of-contents/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy15 = _interopRequireDefault(__webpack_require__(/*! modules/theme-builder/assets/js/frontend/frontend-legacy */ "../modules/theme-builder/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy16 = _interopRequireDefault(__webpack_require__(/*! modules/theme-elements/assets/js/frontend/frontend-legacy */ "../modules/theme-elements/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy17 = _interopRequireDefault(__webpack_require__(/*! modules/woocommerce/assets/js/frontend/frontend-legacy */ "../modules/woocommerce/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy18 = _interopRequireDefault(__webpack_require__(/*! modules/loop-builder/assets/js/frontend/frontend-legacy */ "../modules/loop-builder/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy19 = _interopRequireDefault(__webpack_require__(/*! modules/mega-menu/assets/js/frontend/frontend-legacy */ "../modules/mega-menu/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy20 = _interopRequireDefault(__webpack_require__(/*! modules/nested-carousel/assets/js/frontend/frontend-legacy */ "../modules/nested-carousel/assets/js/frontend/frontend-legacy.js"));
var _frontendLegacy21 = _interopRequireDefault(__webpack_require__(/*! modules/loop-filter/assets/js/frontend/frontend-legacy */ "../modules/loop-filter/assets/js/frontend/frontend-legacy.js"));
const extendDefaultHandlers = defaultHandlers => {
  const handlers = {
    animatedText: _frontendLegacy.default,
    carousel: _frontendLegacy2.default,
    countdown: _frontendLegacy3.default,
    form: _frontendLegacy4.default,
    gallery: _frontendLegacy5.default,
    hotspot: _frontendLegacy6.default,
    lottie: _frontendLegacy7.default,
    nav_menu: _frontendLegacy8.default,
    popup: _frontendLegacy9.default,
    posts: _frontendLegacy10.default,
    share_buttons: _frontendLegacy11.default,
    slides: _frontendLegacy12.default,
    social: _frontendLegacy13.default,
    themeBuilder: _frontendLegacy15.default,
    themeElements: _frontendLegacy16.default,
    woocommerce: _frontendLegacy17.default,
    tableOfContents: _frontendLegacy14.default,
    loopBuilder: _frontendLegacy18.default,
    megaMenu: _frontendLegacy19.default,
    nestedCarousel: _frontendLegacy20.default,
    taxonomyFilter: _frontendLegacy21.default
  };
  return {
    ...defaultHandlers,
    ...handlers
  };
};
elementorProFrontend.on('elementor-pro/modules/init:before', () => {
  elementorFrontend.hooks.addFilter('elementor-pro/frontend/handlers', extendDefaultHandlers);
});

/***/ }),

/***/ "../assets/dev/js/frontend/utils/ajax-helper.js":
/*!******************************************************!*\
  !*** ../assets/dev/js/frontend/utils/ajax-helper.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class AjaxHelper {
  addLoadingAnimationOverlay(elementId) {
    const widget = document.querySelector(`.elementor-element-${elementId}`);
    if (!widget) {
      return;
    }
    widget.classList.add('e-loading-overlay');
  }
  removeLoadingAnimationOverlay(elementId) {
    const widget = document.querySelector(`.elementor-element-${elementId}`);
    if (!widget) {
      return;
    }
    widget.classList.remove('e-loading-overlay');
  }
}
exports["default"] = AjaxHelper;

/***/ }),

/***/ "../assets/dev/js/frontend/utils/anchor-link.js":
/*!******************************************************!*\
  !*** ../assets/dev/js/frontend/utils/anchor-link.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class AnchorLinks {
  followMenuAnchors($anchorLinks, classes) {
    $anchorLinks.each((index, anchorLink) => {
      if (location.pathname === anchorLink.pathname && '' !== anchorLink.hash) {
        this.followMenuAnchor(jQuery(anchorLink), classes);
      }
    });
  }
  followMenuAnchor($element, classes) {
    const anchorSelector = $element[0].hash,
      activeAnchorClass = classes.activeAnchorItem,
      anchorClass = classes.anchorItem,
      $targetElement = $element.hasClass(anchorClass) ? $element : $element.closest(`.${anchorClass}`);
    let offset = -300,
      $anchor;
    try {
      // `decodeURIComponent` for UTF8 characters in the hash.
      $anchor = jQuery(decodeURIComponent(anchorSelector));
    } catch (e) {
      return;
    }
    if (!$anchor.length) {
      return;
    }
    if (!$anchor.hasClass('elementor-menu-anchor')) {
      const halfViewport = jQuery(window).height() / 2;
      offset = -$anchor.outerHeight() + halfViewport;
    }
    elementorFrontend.waypoint($anchor, direction => {
      if ('down' === direction) {
        $targetElement.addClass(activeAnchorClass);
        $element.attr('aria-current', 'location');
      } else {
        $targetElement.removeClass(activeAnchorClass);
        $element.attr('aria-current', '');
      }
    }, {
      offset: '50%',
      triggerOnce: false
    });
    elementorFrontend.waypoint($anchor, direction => {
      if ('down' === direction) {
        $targetElement.removeClass(activeAnchorClass);
        $element.attr('aria-current', '');
      } else {
        $targetElement.addClass(activeAnchorClass);
        $element.attr('aria-current', 'location');
      }
    }, {
      offset,
      triggerOnce: false
    });
  }
}
exports["default"] = AnchorLinks;

/***/ }),

/***/ "../assets/dev/js/frontend/utils/flex-horizontal-scroll.js":
/*!*****************************************************************!*\
  !*** ../assets/dev/js/frontend/utils/flex-horizontal-scroll.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.changeScrollStatus = changeScrollStatus;
exports.setHorizontalScrollAlignment = setHorizontalScrollAlignment;
exports.setHorizontalTitleScrollValues = setHorizontalTitleScrollValues;
function changeScrollStatus(element, event) {
  if ('mousedown' === event.type) {
    element.classList.add('e-scroll');
    element.dataset.pageX = event.pageX;
  } else {
    element.classList.remove('e-scroll', 'e-scroll-active');
    element.dataset.pageX = '';
  }
}

// This function was written using this example https://codepen.io/thenutz/pen/VwYeYEE.
function setHorizontalTitleScrollValues(element, horizontalScrollStatus, event) {
  const isActiveScroll = element.classList.contains('e-scroll'),
    isHorizontalScrollActive = 'enable' === horizontalScrollStatus,
    headingContentIsWiderThanWrapper = element.scrollWidth > element.clientWidth;
  if (!isActiveScroll || !isHorizontalScrollActive || !headingContentIsWiderThanWrapper) {
    return;
  }
  event.preventDefault();
  const previousPositionX = parseFloat(element.dataset.pageX),
    mouseMoveX = event.pageX - previousPositionX,
    maximumScrollValue = 5,
    stepLimit = 20;
  let toScrollDistanceX = 0;
  if (stepLimit < mouseMoveX) {
    toScrollDistanceX = maximumScrollValue;
  } else if (stepLimit * -1 > mouseMoveX) {
    toScrollDistanceX = -1 * maximumScrollValue;
  } else {
    toScrollDistanceX = mouseMoveX;
  }
  element.scrollLeft = element.scrollLeft - toScrollDistanceX;
  element.classList.add('e-scroll-active');
}
function setHorizontalScrollAlignment(_ref) {
  let {
    element,
    direction,
    justifyCSSVariable,
    horizontalScrollStatus
  } = _ref;
  if (!element) {
    return;
  }
  if (isHorizontalScroll(element, horizontalScrollStatus)) {
    initialScrollPosition(element, direction, justifyCSSVariable);
  } else {
    element.style.setProperty(justifyCSSVariable, '');
  }
}
function isHorizontalScroll(element, horizontalScrollStatus) {
  return element.clientWidth < getChildrenWidth(element.children) && 'enable' === horizontalScrollStatus;
}
function getChildrenWidth(children) {
  let totalWidth = 0;
  const parentContainer = children[0].parentNode,
    computedStyles = getComputedStyle(parentContainer),
    gap = parseFloat(computedStyles.gap) || 0; // Get the gap value or default to 0 if it's not specified

  for (let i = 0; i < children.length; i++) {
    totalWidth += children[i].offsetWidth + gap;
  }
  return totalWidth;
}
function initialScrollPosition(element, direction, justifyCSSVariable) {
  const isRTL = elementorFrontend.config.is_rtl;
  switch (direction) {
    case 'end':
      element.style.setProperty(justifyCSSVariable, 'start');
      element.scrollLeft = isRTL ? -1 * getChildrenWidth(element.children) : getChildrenWidth(element.children);
      break;
    default:
      element.style.setProperty(justifyCSSVariable, 'start');
      element.scrollLeft = 0;
  }
}

/***/ }),

/***/ "../assets/dev/js/frontend/utils/handle-parameter-pollution.js":
/*!*********************************************************************!*\
  !*** ../assets/dev/js/frontend/utils/handle-parameter-pollution.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = handleParameterPollution;
function handleParameterPollution(inputURL) {
  const urlObject = new URL(inputURL),
    mainDomain = urlObject.hostname,
    params = new URLSearchParams(urlObject.search),
    paramKeysToCheck = ['u']; // Can add more items if we find more problems with other social networks.

  paramKeysToCheck.forEach(key => {
    const paramValue = params.get(key);
    if (paramValue) {
      try {
        const paramDomain = new URL(paramValue).hostname;
        if (paramDomain !== mainDomain) {
          params.delete(key);
        }
      } catch (error) {
        params.delete(key);
      }
    }
  });
  urlObject.search = params.toString();
  return urlObject.toString();
}

/***/ }),

/***/ "../assets/dev/js/frontend/utils/icons/e-icons.js":
/*!********************************************************!*\
  !*** ../assets/dev/js/frontend/utils/icons/e-icons.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.close = void 0;
var _manager = _interopRequireDefault(__webpack_require__(/*! ./manager */ "../assets/dev/js/frontend/utils/icons/manager.js"));
// This file is automatically generated, please don't change anything in this file.

const iconsManager = new _manager.default('eicon');
const close = exports.close = {
  get element() {
    const svgData = {
      path: 'M742 167L500 408 258 167C246 154 233 150 217 150 196 150 179 158 167 167 154 179 150 196 150 212 150 229 154 242 171 254L408 500 167 742C138 771 138 800 167 829 196 858 225 858 254 829L496 587 738 829C750 842 767 846 783 846 800 846 817 842 829 829 842 817 846 804 846 783 846 767 842 750 829 737L588 500 833 258C863 229 863 200 833 171 804 137 775 137 742 167Z',
      width: 1000,
      height: 1000
    };
    return iconsManager.createSvgElement('close', svgData);
  }
};

/***/ }),

/***/ "../assets/dev/js/frontend/utils/icons/manager.js":
/*!********************************************************!*\
  !*** ../assets/dev/js/frontend/utils/icons/manager.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _defineProperty2 = _interopRequireDefault(__webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "../node_modules/@babel/runtime/helpers/defineProperty.js"));
class IconsManager {
  constructor(elementsPrefix) {
    this.prefix = `${elementsPrefix}-`;
    if (!IconsManager.symbolsContainer) {
      const symbolsContainerId = 'e-font-icon-svg-symbols';
      IconsManager.symbolsContainer = document.getElementById(symbolsContainerId);
      if (!IconsManager.symbolsContainer) {
        IconsManager.symbolsContainer = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        IconsManager.symbolsContainer.setAttributeNS(null, 'style', 'display: none;');
        IconsManager.symbolsContainer.setAttributeNS(null, 'class', symbolsContainerId);
        document.body.appendChild(IconsManager.symbolsContainer);
      }
    }
  }
  createSvgElement(name, _ref) {
    let {
      path,
      width,
      height
    } = _ref;
    const elementName = this.prefix + name,
      elementSelector = '#' + this.prefix + name;

    // Create symbol if not exist yet.
    if (!IconsManager.iconsUsageList.includes(elementName)) {
      if (!IconsManager.symbolsContainer.querySelector(elementSelector)) {
        const symbol = document.createElementNS('http://www.w3.org/2000/svg', 'symbol');
        symbol.id = elementName;
        symbol.innerHTML = '<path d="' + path + '"></path>';
        symbol.setAttributeNS(null, 'viewBox', '0 0 ' + width + ' ' + height);
        IconsManager.symbolsContainer.appendChild(symbol);
      }
      IconsManager.iconsUsageList.push(elementName);
    }
    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg.innerHTML = '<use xlink:href="' + elementSelector + '" />';
    svg.setAttributeNS(null, 'class', 'e-font-icon-svg e-' + elementName);
    return svg;
  }
}
exports["default"] = IconsManager;
(0, _defineProperty2.default)(IconsManager, "symbolsContainer", void 0);
(0, _defineProperty2.default)(IconsManager, "iconsUsageList", []);

/***/ }),

/***/ "../assets/dev/js/frontend/utils/run-element-handlers.js":
/*!***************************************************************!*\
  !*** ../assets/dev/js/frontend/utils/run-element-handlers.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = runElementHandlers;
function runElementHandlers(elements) {
  [...elements].flatMap(el => [...el.querySelectorAll('.elementor-element')]).forEach(el => elementorFrontend.elementsHandler.runReadyTrigger(el));
}

/***/ }),

/***/ "../assets/dev/js/frontend/utils/scroll.js":
/*!*************************************************!*\
  !*** ../assets/dev/js/frontend/utils/scroll.js ***!
  \*************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
if (window.elementorCommon) {
  window.elementorCommon.helpers.softDeprecated('Scroll util from "/dev/js/frontend/utils/scroll"', '3.1.0', 'elementorModules.utils.Scroll');
}
var _default = exports["default"] = elementorModules.utils.Scroll;

/***/ }),

/***/ "../assets/dev/js/preview/utils/document-handle.js":
/*!*********************************************************!*\
  !*** ../assets/dev/js/preview/utils/document-handle.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";
/* provided dependency */ var __ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n")["__"];


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.SAVE_CONTEXT = exports.EDIT_CONTEXT = void 0;
exports.createElement = createElement;
exports["default"] = addDocumentHandle;
const EDIT_HANDLE_CLASS_NAME = 'elementor-document-handle';
const EDIT_MODE_CLASS_NAME = 'elementor-edit-mode';
const EDIT_CONTEXT = exports.EDIT_CONTEXT = 'edit';
const SAVE_HANDLE_CLASS_NAME = 'elementor-document-save-back-handle';
const SAVE_CONTEXT = exports.SAVE_CONTEXT = 'save';

/**
 * @param {Object}        handleTarget
 * @param {HTMLElement}   handleTarget.element
 * @param {string|number} handleTarget.id      - Document ID.
 * @param {string}        handleTarget.title
 * @param {string}        context              - Edit/Save
 * @param {Function|null} onCloseDocument      - Callback to run when outgoing document is closed.
 * @param {string}        selector
 */
function addDocumentHandle(_ref) {
  let {
    element,
    id,
    title = __('Template', 'elementor-pro')
  } = _ref;
  let context = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : EDIT_CONTEXT;
  let onCloseDocument = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
  let selector = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
  if (EDIT_CONTEXT === context) {
    if (!id || !element) {
      throw Error('`id` and `element` are required.');
    }
    if (isCurrentlyEditing(element) || hasHandle(element)) {
      return;
    }
  }
  const handleElement = createHandleElement({
    title,
    onClick: () => onDocumentClick(id, context, onCloseDocument, selector)
  }, context, element);
  element.prepend(handleElement);
  if (EDIT_CONTEXT === context) {
    element.dataset.editableElementorDocument = id;
  }
}

/**
 * @param {HTMLElement} element
 *
 * @return {boolean} Whether the element is currently being edited.
 */
function isCurrentlyEditing(element) {
  return element.classList.contains(EDIT_MODE_CLASS_NAME);
}

/**
 * @param {HTMLElement} element
 *
 * @return {boolean} Whether the element has a handle.
 */
function hasHandle(element) {
  return !!element.querySelector(`:scope > .${EDIT_HANDLE_CLASS_NAME}`);
}

/**
 * @param {Object}      handleProperties
 * @param {string}      handleProperties.title
 * @param {Function}    handleProperties.onClick
 * @param {string}      context
 * @param {HTMLElement} element
 *
 * @return {HTMLElement} The newly generated Handle element
 */
function createHandleElement(_ref2, context) {
  let {
    title,
    onClick
  } = _ref2;
  let element = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
  const handleTitle = ['header', 'footer'].includes(element?.dataset.elementorType) ? '%s' : __('Edit %s', 'elementor-pro');
  const innerElement = createElement({
    tag: 'div',
    classNames: [`${EDIT_HANDLE_CLASS_NAME}__inner`],
    children: [createElement({
      tag: 'i',
      classNames: [getHandleIcon(context)]
    }), createElement({
      tag: 'div',
      classNames: [`${EDIT_CONTEXT === context ? EDIT_HANDLE_CLASS_NAME : SAVE_HANDLE_CLASS_NAME}__title`],
      children: [document.createTextNode(EDIT_CONTEXT === context ? handleTitle.replace('%s', title) : __('Save %s', 'elementor-pro').replace('%s', title))]
    })]
  });
  const classNames = [EDIT_HANDLE_CLASS_NAME];
  if (EDIT_CONTEXT !== context) {
    classNames.push(SAVE_HANDLE_CLASS_NAME);
  }
  const containerElement = createElement({
    tag: 'div',
    classNames,
    children: [innerElement]
  });
  containerElement.addEventListener('click', onClick);
  return containerElement;
}
function getHandleIcon(context) {
  let icon = 'eicon-edit';
  if (SAVE_CONTEXT === context) {
    icon = elementorFrontend.config.is_rtl ? 'eicon-arrow-right' : 'eicon-arrow-left';
  }
  return icon;
}

/**
 * Util for creating HTML element.
 *
 * @param {Object}        elementProperties
 * @param {string}        elementProperties.tag
 * @param {string[]}      elementProperties.classNames
 * @param {HTMLElement[]} elementProperties.children
 *
 * @return {HTMLElement} Generated Element
 */
function createElement(_ref3) {
  let {
    tag,
    classNames = [],
    children = []
  } = _ref3;
  const element = document.createElement(tag);
  element.classList.add(...classNames);
  children.forEach(child => element.appendChild(child));
  return element;
}

/**
 * @param {string|number} id
 * @param {string}        context
 * @param {Function|null} onCloseDocument
 * @param {string}        selector
 * @return {Promise<void>}
 */
async function onDocumentClick(id, context) {
  let onCloseDocument = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
  let selector = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
  if (EDIT_CONTEXT === context) {
    window.top.$e.internal('panel/state-loading');
    await window.top.$e.run('editor/documents/switch', {
      id: parseInt(id),
      onClose: onCloseDocument,
      selector
    });
    window.top.$e.internal('panel/state-ready');
  } else {
    elementorCommon.api.internal('panel/state-loading');
    elementorCommon.api.run('editor/documents/switch', {
      id: elementor.config.initial_document.id,
      mode: 'save',
      shouldScroll: false,
      selector
    }).finally(() => elementorCommon.api.internal('panel/state-ready'));
  }
}

/***/ }),

/***/ "../modules/animated-headline/assets/js/frontend/frontend-legacy.js":
/*!**************************************************************************!*\
  !*** ../modules/animated-headline/assets/js/frontend/frontend-legacy.js ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _animatedHeadlines = _interopRequireDefault(__webpack_require__(/*! ./handlers/animated-headlines */ "../modules/animated-headline/assets/js/frontend/handlers/animated-headlines.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('animated-headline', _animatedHeadlines.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/animated-headline/assets/js/frontend/handlers/animated-headlines.js":
/*!**************************************************************************************!*\
  !*** ../modules/animated-headline/assets/js/frontend/handlers/animated-headlines.js ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _scroll = _interopRequireDefault(__webpack_require__(/*! elementor-pro/frontend/utils/scroll */ "../assets/dev/js/frontend/utils/scroll.js"));
var _default = exports["default"] = elementorModules.frontend.handlers.Base.extend({
  svgPaths: {
    circle: ['M325,18C228.7-8.3,118.5,8.3,78,21C22.4,38.4,4.6,54.6,5.6,77.6c1.4,32.4,52.2,54,142.6,63.7 c66.2,7.1,212.2,7.5,273.5-8.3c64.4-16.6,104.3-57.6,33.8-98.2C386.7-4.9,179.4-1.4,126.3,20.7'],
    underline_zigzag: ['M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9'],
    x: ['M497.4,23.9C301.6,40,155.9,80.6,4,144.4', 'M14.1,27.6c204.5,20.3,393.8,74,467.3,111.7'],
    strikethrough: ['M3,75h493.5'],
    curly: ['M3,146.1c17.1-8.8,33.5-17.8,51.4-17.8c15.6,0,17.1,18.1,30.2,18.1c22.9,0,36-18.6,53.9-18.6 c17.1,0,21.3,18.5,37.5,18.5c21.3,0,31.8-18.6,49-18.6c22.1,0,18.8,18.8,36.8,18.8c18.8,0,37.5-18.6,49-18.6c20.4,0,17.1,19,36.8,19 c22.9,0,36.8-20.6,54.7-18.6c17.7,1.4,7.1,19.5,33.5,18.8c17.1,0,47.2-6.5,61.1-15.6'],
    diagonal: ['M13.5,15.5c131,13.7,289.3,55.5,475,125.5'],
    double: ['M8.4,143.1c14.2-8,97.6-8.8,200.6-9.2c122.3-0.4,287.5,7.2,287.5,7.2', 'M8,19.4c72.3-5.3,162-7.8,216-7.8c54,0,136.2,0,267,7.8'],
    double_underline: ['M5,125.4c30.5-3.8,137.9-7.6,177.3-7.6c117.2,0,252.2,4.7,312.7,7.6', 'M26.9,143.8c55.1-6.1,126-6.3,162.2-6.1c46.5,0.2,203.9,3.2,268.9,6.4'],
    underline: ['M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7']
  },
  getDefaultSettings() {
    const iterationDelay = this.getElementSettings('rotate_iteration_delay'),
      settings = {
        animationDelay: iterationDelay || 2500,
        // Letters effect
        lettersDelay: iterationDelay * 0.02 || 50,
        // Typing effect
        typeLettersDelay: iterationDelay * 0.06 || 150,
        selectionDuration: iterationDelay * 0.2 || 500,
        // Clip effect
        revealDuration: iterationDelay * 0.24 || 600,
        revealAnimationDelay: iterationDelay * 0.6 || 1500,
        // Highlighted headline
        highlightAnimationDuration: this.getElementSettings('highlight_animation_duration') || 1200,
        highlightAnimationDelay: this.getElementSettings('highlight_iteration_delay') || 8000
      };
    settings.typeAnimationDelay = settings.selectionDuration + 800;
    settings.selectors = {
      headline: '.elementor-headline',
      dynamicWrapper: '.elementor-headline-dynamic-wrapper',
      dynamicText: '.elementor-headline-dynamic-text'
    };
    settings.classes = {
      dynamicText: 'elementor-headline-dynamic-text',
      dynamicLetter: 'elementor-headline-dynamic-letter',
      textActive: 'elementor-headline-text-active',
      textInactive: 'elementor-headline-text-inactive',
      letters: 'elementor-headline-letters',
      animationIn: 'elementor-headline-animation-in',
      typeSelected: 'elementor-headline-typing-selected',
      activateHighlight: 'e-animated',
      hideHighlight: 'e-hide-highlight'
    };
    return settings;
  },
  getDefaultElements() {
    var selectors = this.getSettings('selectors');
    return {
      $headline: this.$element.find(selectors.headline),
      $dynamicWrapper: this.$element.find(selectors.dynamicWrapper),
      $dynamicText: this.$element.find(selectors.dynamicText)
    };
  },
  getNextWord($word) {
    return $word.is(':last-child') ? $word.parent().children().eq(0) : $word.next();
  },
  switchWord($oldWord, $newWord) {
    $oldWord.removeClass('elementor-headline-text-active').addClass('elementor-headline-text-inactive');
    $newWord.removeClass('elementor-headline-text-inactive').addClass('elementor-headline-text-active');
    this.setDynamicWrapperWidth($newWord);
  },
  singleLetters() {
    var classes = this.getSettings('classes');
    this.elements.$dynamicText.each(function () {
      var $word = jQuery(this),
        letters = $word.text().split(''),
        isActive = $word.hasClass(classes.textActive);
      $word.empty();
      letters.forEach(function (letter) {
        var $letter = jQuery('<span>', {
          class: classes.dynamicLetter
        }).text(letter);
        if (isActive) {
          $letter.addClass(classes.animationIn);
        }
        $word.append($letter);
      });
      $word.css('opacity', 1);
    });
  },
  showLetter($letter, $word, bool, duration) {
    var self = this,
      classes = this.getSettings('classes');
    $letter.addClass(classes.animationIn);
    if (!$letter.is(':last-child')) {
      setTimeout(function () {
        self.showLetter($letter.next(), $word, bool, duration);
      }, duration);
    } else if (!bool) {
      setTimeout(function () {
        self.hideWord($word);
      }, self.getSettings('animationDelay'));
    }
  },
  hideLetter($letter, $word, bool, duration) {
    var self = this,
      settings = this.getSettings();
    $letter.removeClass(settings.classes.animationIn);
    if (!$letter.is(':last-child')) {
      setTimeout(function () {
        self.hideLetter($letter.next(), $word, bool, duration);
      }, duration);
    } else if (bool) {
      setTimeout(function () {
        self.hideWord(self.getNextWord($word));
      }, self.getSettings('animationDelay'));
    }
  },
  showWord($word, $duration) {
    var self = this,
      settings = self.getSettings(),
      animationType = self.getElementSettings('animation_type');
    if ('typing' === animationType) {
      self.showLetter($word.find('.' + settings.classes.dynamicLetter).eq(0), $word, false, $duration);
      $word.addClass(settings.classes.textActive).removeClass(settings.classes.textInactive);
    } else if ('clip' === animationType) {
      self.elements.$dynamicWrapper.animate({
        width: $word.width() + 10
      }, settings.revealDuration, function () {
        setTimeout(function () {
          self.hideWord($word);
        }, settings.revealAnimationDelay);
      });
    }
  },
  hideWord($word) {
    var self = this,
      settings = self.getSettings(),
      classes = settings.classes,
      letterSelector = '.' + classes.dynamicLetter;
    if (!this.isLoopMode && $word.is(':last-child')) {
      return;
    }
    var animationType = self.getElementSettings('animation_type'),
      nextWord = self.getNextWord($word);
    if ('typing' === animationType) {
      self.elements.$dynamicWrapper.addClass(classes.typeSelected);
      setTimeout(function () {
        self.elements.$dynamicWrapper.removeClass(classes.typeSelected);
        $word.addClass(settings.classes.textInactive).removeClass(classes.textActive).children(letterSelector).removeClass(classes.animationIn);
      }, settings.selectionDuration);
      setTimeout(function () {
        self.showWord(nextWord, settings.typeLettersDelay);
      }, settings.typeAnimationDelay);
    } else if (self.elements.$headline.hasClass(classes.letters)) {
      var bool = $word.children(letterSelector).length >= nextWord.children(letterSelector).length;
      self.hideLetter($word.find(letterSelector).eq(0), $word, bool, settings.lettersDelay);
      self.showLetter(nextWord.find(letterSelector).eq(0), nextWord, bool, settings.lettersDelay);
      self.setDynamicWrapperWidth(nextWord);
    } else if ('clip' === animationType) {
      self.elements.$dynamicWrapper.animate({
        width: '2px'
      }, settings.revealDuration, function () {
        self.switchWord($word, nextWord);
        self.showWord(nextWord);
      });
    } else {
      self.switchWord($word, nextWord);
      setTimeout(function () {
        self.hideWord(nextWord);
      }, settings.animationDelay);
    }
  },
  setDynamicWrapperWidth($word) {
    const animationType = this.getElementSettings('animation_type');
    if ('clip' !== animationType && 'typing' !== animationType) {
      this.elements.$dynamicWrapper.css('width', $word.width());
    }
  },
  animateHeadline() {
    var self = this,
      animationType = self.getElementSettings('animation_type'),
      $dynamicWrapper = self.elements.$dynamicWrapper;
    if ('clip' === animationType) {
      $dynamicWrapper.width($dynamicWrapper.width() + 10);
    } else if ('typing' !== animationType) {
      self.setDynamicWrapperWidth(self.elements.$dynamicText);
    }

    // Trigger animation
    setTimeout(function () {
      self.hideWord(self.elements.$dynamicText.eq(0));
    }, self.getSettings('animationDelay'));
  },
  getSvgPaths(pathName) {
    var pathsInfo = this.svgPaths[pathName],
      $paths = jQuery();
    pathsInfo.forEach(function (pathInfo) {
      $paths = $paths.add(jQuery('<path>', {
        d: pathInfo
      }));
    });
    return $paths;
  },
  addHighlight() {
    const elementSettings = this.getElementSettings(),
      $svg = jQuery('<svg>', {
        xmlns: 'http://www.w3.org/2000/svg',
        viewBox: '0 0 500 150',
        preserveAspectRatio: 'none'
      }).html(this.getSvgPaths(elementSettings.marker));
    this.elements.$dynamicWrapper.append($svg[0].outerHTML);
  },
  rotateHeadline() {
    var settings = this.getSettings();

    // Insert <span> for each letter of a changing word
    if (this.elements.$headline.hasClass(settings.classes.letters)) {
      this.singleLetters();
    }

    // Initialise headline animation
    this.animateHeadline();
  },
  initHeadline() {
    const headlineStyle = this.getElementSettings('headline_style');
    if ('rotate' === headlineStyle) {
      this.rotateHeadline();
    } else if ('highlight' === headlineStyle) {
      this.addHighlight();
      this.activateHighlightAnimation();
    }
    this.deactivateScrollListener();
  },
  activateHighlightAnimation() {
    const settings = this.getSettings(),
      classes = settings.classes,
      $headline = this.elements.$headline;
    $headline.removeClass(classes.hideHighlight).addClass(classes.activateHighlight);
    if (!this.isLoopMode) {
      return;
    }
    setTimeout(() => {
      $headline.removeClass(classes.activateHighligh).addClass(classes.hideHighlight);
    }, settings.highlightAnimationDuration + settings.highlightAnimationDelay * .8);
    setTimeout(() => {
      this.activateHighlightAnimation(false);
    }, settings.highlightAnimationDuration + settings.highlightAnimationDelay);
  },
  activateScrollListener() {
    const scrollBuffer = -100;
    this.intersectionObservers.startAnimation.observer = _scroll.default.scrollObserver({
      offset: `0px 0px ${scrollBuffer}px`,
      callback: event => {
        if (event.isInViewport) {
          this.initHeadline();
        }
      }
    });
    this.intersectionObservers.startAnimation.element = this.elements.$headline[0];
    this.intersectionObservers.startAnimation.observer.observe(this.intersectionObservers.startAnimation.element);
  },
  deactivateScrollListener() {
    this.intersectionObservers.startAnimation.observer.unobserve(this.intersectionObservers.startAnimation.element);
  },
  onInit() {
    elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments);
    this.intersectionObservers = {
      startAnimation: {
        observer: null,
        element: null
      }
    };
    this.isLoopMode = 'yes' === this.getElementSettings('loop');
    this.activateScrollListener();
  }
});

/***/ }),

/***/ "../modules/carousel/assets/js/frontend/frontend-legacy.js":
/*!*****************************************************************!*\
  !*** ../modules/carousel/assets/js/frontend/frontend-legacy.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _mediaCarousel = _interopRequireDefault(__webpack_require__(/*! ./handlers/media-carousel */ "../modules/carousel/assets/js/frontend/handlers/media-carousel.js"));
var _testimonialCarousel = _interopRequireDefault(__webpack_require__(/*! ./handlers/testimonial-carousel */ "../modules/carousel/assets/js/frontend/handlers/testimonial-carousel.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('media-carousel', _mediaCarousel.default);
    elementorFrontend.elementsHandler.attachHandler('testimonial-carousel', _testimonialCarousel.default);
    elementorFrontend.elementsHandler.attachHandler('reviews', _testimonialCarousel.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/carousel/assets/js/frontend/handlers/base.js":
/*!***************************************************************!*\
  !*** ../modules/carousel/assets/js/frontend/handlers/base.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class CarouselBase extends elementorModules.frontend.handlers.SwiperBase {
  getDefaultSettings() {
    return {
      selectors: {
        swiperContainer: '.elementor-main-swiper',
        swiperSlide: '.swiper-slide'
      },
      slidesPerView: {
        widescreen: 3,
        desktop: 3,
        laptop: 3,
        tablet_extra: 3,
        tablet: 2,
        mobile_extra: 2,
        mobile: 1
      }
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors'),
      elements = {
        $swiperContainer: this.$element.find(selectors.swiperContainer)
      };
    elements.$slides = elements.$swiperContainer.find(selectors.swiperSlide);
    return elements;
  }
  getEffect() {
    return this.getElementSettings('effect');
  }
  getDeviceSlidesPerView(device) {
    const slidesPerViewKey = 'slides_per_view' + ('desktop' === device ? '' : '_' + device);
    return Math.min(this.getSlidesCount(), +this.getElementSettings(slidesPerViewKey) || this.getSettings('slidesPerView')[device]);
  }
  getSlidesPerView(device) {
    if ('slide' === this.getEffect()) {
      return this.getDeviceSlidesPerView(device);
    }
    return 1;
  }
  getDeviceSlidesToScroll(device) {
    const slidesToScrollKey = 'slides_to_scroll' + ('desktop' === device ? '' : '_' + device);
    return Math.min(this.getSlidesCount(), +this.getElementSettings(slidesToScrollKey) || 1);
  }
  getSlidesToScroll(device) {
    if ('slide' === this.getEffect()) {
      return this.getDeviceSlidesToScroll(device);
    }
    return 1;
  }
  getSpaceBetween(device) {
    let propertyName = 'space_between';
    if (device && 'desktop' !== device) {
      propertyName += '_' + device;
    }
    return this.getElementSettings(propertyName).size || 0;
  }
  getSwiperOptions() {
    const elementSettings = this.getElementSettings();
    const swiperOptions = {
      grabCursor: true,
      initialSlide: this.getInitialSlide(),
      slidesPerView: this.getSlidesPerView('desktop'),
      slidesPerGroup: this.getSlidesToScroll('desktop'),
      spaceBetween: this.getSpaceBetween(),
      loop: 'yes' === elementSettings.loop,
      speed: elementSettings.speed,
      effect: this.getEffect(),
      preventClicksPropagation: false,
      slideToClickedSlide: true,
      handleElementorBreakpoints: true
    };
    if ('yes' === elementSettings.lazyload) {
      swiperOptions.lazy = {
        loadPrevNext: true,
        loadPrevNextAmount: 1
      };
    }
    if (elementSettings.show_arrows) {
      swiperOptions.navigation = {
        prevEl: '.elementor-swiper-button-prev',
        nextEl: '.elementor-swiper-button-next'
      };
    }
    if (elementSettings.pagination) {
      swiperOptions.pagination = {
        el: '.swiper-pagination',
        type: elementSettings.pagination,
        clickable: true
      };
    }
    if ('cube' !== this.getEffect()) {
      const breakpointsSettings = {},
        breakpoints = elementorFrontend.config.responsive.activeBreakpoints;
      Object.keys(breakpoints).forEach(breakpointName => {
        breakpointsSettings[breakpoints[breakpointName].value] = {
          slidesPerView: this.getSlidesPerView(breakpointName),
          slidesPerGroup: this.getSlidesToScroll(breakpointName),
          spaceBetween: this.getSpaceBetween(breakpointName)
        };
      });
      swiperOptions.breakpoints = breakpointsSettings;
    }
    if (!this.isEdit && elementSettings.autoplay) {
      swiperOptions.autoplay = {
        delay: elementSettings.autoplay_speed,
        disableOnInteraction: !!elementSettings.pause_on_interaction
      };
    }
    return swiperOptions;
  }
  getDeviceBreakpointValue(device) {
    if (!this.breakpointsDictionary) {
      const breakpoints = elementorFrontend.config.responsive.activeBreakpoints;
      this.breakpointsDictionary = {};
      Object.keys(breakpoints).forEach(breakpointName => {
        this.breakpointsDictionary[breakpointName] = breakpoints[breakpointName].value;
      });
    }
    return this.breakpointsDictionary[device];
  }
  updateSpaceBetween(propertyName) {
    const deviceMatch = propertyName.match('space_between_(.*)'),
      device = deviceMatch ? deviceMatch[1] : 'desktop',
      newSpaceBetween = this.getSpaceBetween(device);
    if ('desktop' !== device) {
      this.swiper.params.breakpoints[this.getDeviceBreakpointValue(device)].spaceBetween = newSpaceBetween;
    } else {
      this.swiper.params.spaceBetween = newSpaceBetween;
    }
    this.swiper.params.spaceBetween = newSpaceBetween;
    this.swiper.update();
  }
  async onInit() {
    elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments);
    if (1 >= this.getSlidesCount()) {
      return;
    }
    const Swiper = elementorFrontend.utils.swiper;
    this.swiper = await new Swiper(this.elements.$swiperContainer, this.getSwiperOptions());
    const elementSettings = this.getElementSettings();
    if ('yes' === elementSettings.pause_on_hover) {
      this.togglePauseOnHover(true);
    }

    // Expose the swiper instance in the frontend
    this.elements.$swiperContainer.data('swiper', this.swiper);
  }
  getChangeableProperties() {
    return {
      autoplay: 'autoplay',
      pause_on_hover: 'pauseOnHover',
      pause_on_interaction: 'disableOnInteraction',
      autoplay_speed: 'delay',
      speed: 'speed',
      width: 'width'
    };
  }
  updateSwiperOption(propertyName) {
    if (0 === propertyName.indexOf('width')) {
      this.swiper.update();
      return;
    }
    const elementSettings = this.getElementSettings(),
      newSettingValue = elementSettings[propertyName],
      changeableProperties = this.getChangeableProperties();
    let propertyToUpdate = changeableProperties[propertyName],
      valueToUpdate = newSettingValue;

    // Handle special cases where the value to update is not the value that the Swiper library accepts
    switch (propertyName) {
      case 'autoplay':
        if (newSettingValue) {
          valueToUpdate = {
            delay: elementSettings.autoplay_speed,
            disableOnInteraction: 'yes' === elementSettings.pause_on_interaction
          };
        } else {
          valueToUpdate = false;
        }
        break;
      case 'autoplay_speed':
        propertyToUpdate = 'autoplay';
        valueToUpdate = {
          delay: newSettingValue,
          disableOnInteraction: 'yes' === elementSettings.pause_on_interaction
        };
        break;
      case 'pause_on_hover':
        this.togglePauseOnHover('yes' === newSettingValue);
        break;
      case 'pause_on_interaction':
        valueToUpdate = 'yes' === newSettingValue;
        break;
    }

    // 'pause_on_hover' is implemented by the handler with event listeners, not the Swiper library
    if ('pause_on_hover' !== propertyName) {
      this.swiper.params[propertyToUpdate] = valueToUpdate;
    }
    this.swiper.update();
  }
  onElementChange(propertyName) {
    if (1 >= this.getSlidesCount()) {
      return;
    }
    if (0 === propertyName.indexOf('width')) {
      this.swiper.update();

      // If there is another thumbs slider, like in the Media Carousel widget.
      if (this.thumbsSwiper) {
        this.thumbsSwiper.update();
      }
      return;
    }

    // This is for handling the responsive control 'space_between'.
    // Responsive controls require a separate way of handling, and some currently don't work
    // (Swiper bug, currently exists in v5.3.6) TODO: update Swiper when bug is fixed and handle responsive controls
    if (0 === propertyName.indexOf('space_between')) {
      this.updateSpaceBetween(propertyName);
      return;
    }
    const changeableProperties = this.getChangeableProperties();
    if (Object.prototype.hasOwnProperty.call(changeableProperties, propertyName)) {
      this.updateSwiperOption(propertyName);
    }
  }
  onEditSettingsChange(propertyName) {
    if (1 >= this.getSlidesCount()) {
      return;
    }
    if ('activeItemIndex' === propertyName) {
      this.swiper.slideToLoop(this.getEditSettings('activeItemIndex') - 1);
    }
  }
}
exports["default"] = CarouselBase;

/***/ }),

/***/ "../modules/carousel/assets/js/frontend/handlers/media-carousel.js":
/*!*************************************************************************!*\
  !*** ../modules/carousel/assets/js/frontend/handlers/media-carousel.js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/carousel/assets/js/frontend/handlers/base.js"));
class MediaCarousel extends _base.default {
  isSlideshow() {
    return 'slideshow' === this.getElementSettings('skin');
  }
  getDefaultSettings() {
    const defaultSettings = super.getDefaultSettings(...arguments);
    if (this.isSlideshow()) {
      defaultSettings.selectors.thumbsSwiper = '.elementor-thumbnails-swiper';
      defaultSettings.slidesPerView = {
        widescreen: 5,
        desktop: 5,
        laptop: 5,
        tablet_extra: 5,
        tablet: 4,
        mobile_extra: 4,
        mobile: 3
      };
    }
    return defaultSettings;
  }
  getSlidesPerViewSettingNames() {
    if (!this.slideshowElementSettings) {
      this.slideshowElementSettings = ['slides_per_view'];
      const activeBreakpoints = elementorFrontend.config.responsive.activeBreakpoints;
      Object.keys(activeBreakpoints).forEach(breakpointName => {
        this.slideshowElementSettings.push('slides_per_view_' + breakpointName);
      });
    }
    return this.slideshowElementSettings;
  }
  getElementSettings(setting) {
    if (-1 !== this.getSlidesPerViewSettingNames().indexOf(setting) && this.isSlideshow()) {
      setting = 'slideshow_' + setting;
    }
    return super.getElementSettings(setting);
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors'),
      defaultElements = super.getDefaultElements(...arguments);
    if (this.isSlideshow()) {
      defaultElements.$thumbsSwiper = this.$element.find(selectors.thumbsSwiper);
    }
    return defaultElements;
  }
  getEffect() {
    if ('coverflow' === this.getElementSettings('skin')) {
      return 'coverflow';
    }
    return super.getEffect();
  }
  getSlidesPerView(device) {
    if (this.isSlideshow()) {
      return 1;
    }
    if ('coverflow' === this.getElementSettings('skin')) {
      return this.getDeviceSlidesPerView(device);
    }
    return super.getSlidesPerView(device);
  }
  getSwiperOptions() {
    const options = super.getSwiperOptions();
    if (this.isSlideshow()) {
      options.loopedSlides = this.getSlidesCount();
      delete options.pagination;
      delete options.breakpoints;
    }
    return options;
  }
  async onInit() {
    await super.onInit();
    const slidesCount = this.getSlidesCount();
    if (!this.isSlideshow() || 1 >= slidesCount) {
      return;
    }
    const elementSettings = this.getElementSettings(),
      loop = 'yes' === elementSettings.loop,
      breakpointsSettings = {},
      breakpoints = elementorFrontend.config.responsive.activeBreakpoints,
      desktopSlidesPerView = this.getDeviceSlidesPerView('desktop');
    Object.keys(breakpoints).forEach(breakpointName => {
      breakpointsSettings[breakpoints[breakpointName].value] = {
        slidesPerView: this.getDeviceSlidesPerView(breakpointName),
        spaceBetween: this.getSpaceBetween(breakpointName)
      };
    });
    const thumbsSliderOptions = {
      slidesPerView: desktopSlidesPerView,
      initialSlide: this.getInitialSlide(),
      centeredSlides: elementSettings.centered_slides,
      slideToClickedSlide: true,
      spaceBetween: this.getSpaceBetween(),
      loopedSlides: slidesCount,
      loop,
      breakpoints: breakpointsSettings,
      handleElementorBreakpoints: true
    };
    if ('yes' === elementSettings.lazyload) {
      thumbsSliderOptions.lazy = {
        loadPrevNext: true,
        loadPrevNextAmount: 1
      };
    }
    const Swiper = elementorFrontend.utils.swiper;
    this.swiper.controller.control = this.thumbsSwiper = await new Swiper(this.elements.$thumbsSwiper, thumbsSliderOptions);

    // Expose the swiper instance in the frontend
    this.elements.$thumbsSwiper.data('swiper', this.thumbsSwiper);
    this.thumbsSwiper.controller.control = this.swiper;
  }
}
exports["default"] = MediaCarousel;

/***/ }),

/***/ "../modules/carousel/assets/js/frontend/handlers/testimonial-carousel.js":
/*!*******************************************************************************!*\
  !*** ../modules/carousel/assets/js/frontend/handlers/testimonial-carousel.js ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/carousel/assets/js/frontend/handlers/base.js"));
class TestimonialCarousel extends _base.default {
  getDefaultSettings() {
    const defaultSettings = super.getDefaultSettings();
    defaultSettings.slidesPerView = {
      desktop: 1
    };
    Object.keys(elementorFrontend.config.responsive.activeBreakpoints).forEach(breakpointName => {
      defaultSettings.slidesPerView[breakpointName] = 1;
    });
    if (defaultSettings.loop) {
      defaultSettings.loopedSlides = this.getSlidesCount();
    }
    return defaultSettings;
  }
  getEffect() {
    return 'slide';
  }
}
exports["default"] = TestimonialCarousel;

/***/ }),

/***/ "../modules/countdown/assets/js/frontend/frontend-legacy.js":
/*!******************************************************************!*\
  !*** ../modules/countdown/assets/js/frontend/frontend-legacy.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _countdown = _interopRequireDefault(__webpack_require__(/*! ./handlers/countdown */ "../modules/countdown/assets/js/frontend/handlers/countdown.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('countdown', _countdown.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/countdown/assets/js/frontend/handlers/countdown.js":
/*!*********************************************************************!*\
  !*** ../modules/countdown/assets/js/frontend/handlers/countdown.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _default = exports["default"] = elementorModules.frontend.handlers.Base.extend({
  cache: null,
  cacheElements() {
    const $countDown = this.$element.find('.elementor-countdown-wrapper');
    this.cache = {
      $countDown,
      timeInterval: null,
      elements: {
        $countdown: $countDown.find('.elementor-countdown-wrapper'),
        $daysSpan: $countDown.find('.elementor-countdown-days'),
        $hoursSpan: $countDown.find('.elementor-countdown-hours'),
        $minutesSpan: $countDown.find('.elementor-countdown-minutes'),
        $secondsSpan: $countDown.find('.elementor-countdown-seconds'),
        $expireMessage: $countDown.parent().find('.elementor-countdown-expire--message')
      },
      data: {
        id: this.$element.data('id'),
        endTime: new Date($countDown.data('date') * 1000),
        actions: $countDown.data('expire-actions'),
        evergreenInterval: $countDown.data('evergreen-interval')
      }
    };
  },
  onInit() {
    elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments);
    this.cacheElements();
    if (0 < this.cache.data.evergreenInterval) {
      this.cache.data.endTime = this.getEvergreenDate();
    }
    this.initializeClock();
  },
  updateClock() {
    const self = this,
      timeRemaining = this.getTimeRemaining(this.cache.data.endTime);
    jQuery.each(timeRemaining.parts, function (timePart) {
      const $element = self.cache.elements['$' + timePart + 'Span'];
      let partValue = this.toString();
      if (1 === partValue.length) {
        partValue = 0 + partValue;
      }
      if ($element.length) {
        $element.text(partValue);
      }
    });
    if (timeRemaining.total <= 0) {
      clearInterval(this.cache.timeInterval);
      this.runActions();
    }
  },
  initializeClock() {
    const self = this;
    this.updateClock();
    this.cache.timeInterval = setInterval(function () {
      self.updateClock();
    }, 1000);
  },
  runActions() {
    const self = this;

    // Trigger general event for 3rd patry actions
    self.$element.trigger('countdown_expire', self.$element);
    if (!this.cache.data.actions) {
      return;
    }
    this.cache.data.actions.forEach(function (action) {
      switch (action.type) {
        case 'hide':
          self.cache.$countDown.hide();
          break;
        case 'redirect':
          if (action.redirect_url) {
            window.location.href = action.redirect_url;
          }
          break;
        case 'message':
          self.cache.elements.$expireMessage.show();
          break;
      }
    });
  },
  getTimeRemaining(endTime) {
    const timeRemaining = endTime - new Date();
    let seconds = Math.floor(timeRemaining / 1000 % 60),
      minutes = Math.floor(timeRemaining / 1000 / 60 % 60),
      hours = Math.floor(timeRemaining / (1000 * 60 * 60) % 24),
      days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
    if (days < 0 || hours < 0 || minutes < 0) {
      seconds = minutes = hours = days = 0;
    }
    return {
      total: timeRemaining,
      parts: {
        days,
        hours,
        minutes,
        seconds
      }
    };
  },
  getEvergreenDate() {
    const self = this,
      id = this.cache.data.id,
      interval = this.cache.data.evergreenInterval,
      dueDateKey = id + '-evergreen_due_date',
      intervalKey = id + '-evergreen_interval',
      localData = {
        dueDate: localStorage.getItem(dueDateKey),
        interval: localStorage.getItem(intervalKey)
      },
      initEvergreen = function () {
        var evergreenDueDate = new Date();
        self.cache.data.endTime = evergreenDueDate.setSeconds(evergreenDueDate.getSeconds() + interval);
        localStorage.setItem(dueDateKey, self.cache.data.endTime);
        localStorage.setItem(intervalKey, interval);
        return self.cache.data.endTime;
      };
    if (null === localData.dueDate && null === localData.interval) {
      return initEvergreen();
    }
    if (null !== localData.dueDate && interval !== parseInt(localData.interval, 10)) {
      return initEvergreen();
    }
    if (localData.dueDate > 0 && parseInt(localData.interval, 10) === interval) {
      return localData.dueDate;
    }
  }
});

/***/ }),

/***/ "../modules/forms/assets/js/frontend/frontend-legacy.js":
/*!**************************************************************!*\
  !*** ../modules/forms/assets/js/frontend/frontend-legacy.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _formSteps = _interopRequireDefault(__webpack_require__(/*! ./handlers/form-steps */ "../modules/forms/assets/js/frontend/handlers/form-steps.js"));
var _formSender = _interopRequireDefault(__webpack_require__(/*! ./handlers/form-sender */ "../modules/forms/assets/js/frontend/handlers/form-sender.js"));
var _formRedirect = _interopRequireDefault(__webpack_require__(/*! ./handlers/form-redirect */ "../modules/forms/assets/js/frontend/handlers/form-redirect.js"));
var _recaptcha = _interopRequireDefault(__webpack_require__(/*! ./handlers/recaptcha */ "../modules/forms/assets/js/frontend/handlers/recaptcha.js"));
var _date = _interopRequireDefault(__webpack_require__(/*! ./handlers/fields/date */ "../modules/forms/assets/js/frontend/handlers/fields/date.js"));
var _time = _interopRequireDefault(__webpack_require__(/*! ./handlers/fields/time */ "../modules/forms/assets/js/frontend/handlers/fields/time.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    const formHandlers = [_formSteps.default, _formSender.default, _formRedirect.default];
    elementorFrontend.elementsHandler.attachHandler('form', [...formHandlers, _recaptcha.default, _date.default, _time.default]);
    elementorFrontend.elementsHandler.attachHandler('subscribe', formHandlers);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/forms/assets/js/frontend/handlers/fields/data-time-field-base.js":
/*!***********************************************************************************!*\
  !*** ../modules/forms/assets/js/frontend/handlers/fields/data-time-field-base.js ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class DataTimeFieldBase extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        fields: this.getFieldsSelector()
      },
      classes: {
        useNative: 'elementor-use-native'
      }
    };
  }
  getDefaultElements() {
    const {
      selectors
    } = this.getDefaultSettings();
    return {
      $fields: this.$element.find(selectors.fields)
    };
  }
  addPicker(element) {
    const {
        classes
      } = this.getDefaultSettings(),
      $element = jQuery(element);
    if ($element.hasClass(classes.useNative)) {
      return;
    }
    element.flatpickr(this.getPickerOptions(element));
  }
  onInit() {
    super.onInit(...arguments);
    this.elements.$fields.each((index, element) => this.addPicker(element));
  }
}
exports["default"] = DataTimeFieldBase;

/***/ }),

/***/ "../modules/forms/assets/js/frontend/handlers/fields/date.js":
/*!*******************************************************************!*\
  !*** ../modules/forms/assets/js/frontend/handlers/fields/date.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _dataTimeFieldBase = _interopRequireDefault(__webpack_require__(/*! ./data-time-field-base */ "../modules/forms/assets/js/frontend/handlers/fields/data-time-field-base.js"));
class DateField extends _dataTimeFieldBase.default {
  getFieldsSelector() {
    return '.elementor-date-field';
  }
  getPickerOptions(element) {
    const $element = jQuery(element);
    return {
      minDate: $element.attr('min') || null,
      maxDate: $element.attr('max') || null,
      allowInput: true
    };
  }
}
exports["default"] = DateField;

/***/ }),

/***/ "../modules/forms/assets/js/frontend/handlers/fields/time.js":
/*!*******************************************************************!*\
  !*** ../modules/forms/assets/js/frontend/handlers/fields/time.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _dataTimeFieldBase = _interopRequireDefault(__webpack_require__(/*! ./data-time-field-base */ "../modules/forms/assets/js/frontend/handlers/fields/data-time-field-base.js"));
class TimeField extends _dataTimeFieldBase.default {
  getFieldsSelector() {
    return '.elementor-time-field';
  }
  getPickerOptions() {
    return {
      noCalendar: true,
      enableTime: true,
      allowInput: true
    };
  }
}
exports["default"] = TimeField;

/***/ }),

/***/ "../modules/forms/assets/js/frontend/handlers/form-redirect.js":
/*!*********************************************************************!*\
  !*** ../modules/forms/assets/js/frontend/handlers/form-redirect.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _default = exports["default"] = elementorModules.frontend.handlers.Base.extend({
  getDefaultSettings() {
    return {
      selectors: {
        form: '.elementor-form'
      }
    };
  },
  getDefaultElements() {
    var selectors = this.getSettings('selectors'),
      elements = {};
    elements.$form = this.$element.find(selectors.form);
    return elements;
  },
  bindEvents() {
    this.elements.$form.on('form_destruct', this.handleSubmit);
  },
  handleSubmit(event, response) {
    if ('undefined' !== typeof response.data.redirect_url) {
      location.href = response.data.redirect_url;
    }
  }
});

/***/ }),

/***/ "../modules/forms/assets/js/frontend/handlers/form-sender.js":
/*!*******************************************************************!*\
  !*** ../modules/forms/assets/js/frontend/handlers/form-sender.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _default = exports["default"] = elementorModules.frontend.handlers.Base.extend({
  getDefaultSettings() {
    return {
      selectors: {
        form: '.elementor-form',
        submitButton: '[type="submit"]'
      },
      action: 'elementor_pro_forms_send_form',
      ajaxUrl: elementorProFrontend.config.ajaxurl
    };
  },
  getDefaultElements() {
    const selectors = this.getSettings('selectors'),
      elements = {};
    elements.$form = this.$element.find(selectors.form);
    elements.$submitButton = elements.$form.find(selectors.submitButton);
    return elements;
  },
  bindEvents() {
    this.elements.$form.on('submit', this.handleSubmit);
    const $fileInput = this.elements.$form.find('input[type=file]');
    if ($fileInput.length) {
      $fileInput.on('change', this.validateFileSize);
    }
  },
  validateFileSize(event) {
    const $field = jQuery(event.currentTarget),
      files = $field[0].files;
    if (!files.length) {
      return;
    }
    const maxSize = parseInt($field.attr('data-maxsize')) * 1024 * 1024,
      maxSizeMessage = $field.attr('data-maxsize-message');
    const filesArray = Array.prototype.slice.call(files);
    filesArray.forEach(file => {
      if (maxSize < file.size) {
        $field.parent().addClass('elementor-error').append('<span class="elementor-message elementor-message-danger elementor-help-inline elementor-form-help-inline" role="alert">' + maxSizeMessage + '</span>').find(':input').attr('aria-invalid', 'true');
        this.elements.$form.trigger('error');
      }
    });
  },
  beforeSend() {
    const $form = this.elements.$form;
    $form.animate({
      opacity: '0.45'
    }, 500).addClass('elementor-form-waiting');
    $form.find('.elementor-message').remove();
    $form.find('.elementor-error').removeClass('elementor-error');
    $form.find('div.elementor-field-group').removeClass('error').find('span.elementor-form-help-inline').remove().end().find(':input').attr('aria-invalid', 'false');
    this.elements.$submitButton.attr('disabled', 'disabled').find('> span').prepend('<span class="elementor-button-text elementor-form-spinner"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span>');
  },
  getFormData() {
    const formData = new FormData(this.elements.$form[0]);
    formData.append('action', this.getSettings('action'));
    formData.append('referrer', location.toString());
    return formData;
  },
  onSuccess(response) {
    const $form = this.elements.$form;
    this.elements.$submitButton.removeAttr('disabled').find('.elementor-form-spinner').remove();
    $form.animate({
      opacity: '1'
    }, 100).removeClass('elementor-form-waiting');
    if (!response.success) {
      if (response.data.errors) {
        jQuery.each(response.data.errors, function (key, title) {
          $form.find('#form-field-' + key).parent().addClass('elementor-error').append('<span class="elementor-message elementor-message-danger elementor-help-inline elementor-form-help-inline" role="alert">' + title + '</span>').find(':input').attr('aria-invalid', 'true');
        });
        $form.trigger('error');
      }
      $form.append('<div class="elementor-message elementor-message-danger" role="alert">' + response.data.message + '</div>');
    } else {
      $form.trigger('submit_success', response.data);

      // For actions like redirect page
      $form.trigger('form_destruct', response.data);
      $form.trigger('reset');
      if ('undefined' !== typeof response.data.message && '' !== response.data.message) {
        $form.append('<div class="elementor-message elementor-message-success" role="alert">' + response.data.message + '</div>');
      }
    }
  },
  onError(xhr, desc) {
    const $form = this.elements.$form;
    $form.append('<div class="elementor-message elementor-message-danger" role="alert">' + desc + '</div>');
    this.elements.$submitButton.html(this.elements.$submitButton.text()).removeAttr('disabled');
    $form.animate({
      opacity: '1'
    }, 100).removeClass('elementor-form-waiting');
    $form.trigger('error');
  },
  handleSubmit(event) {
    const self = this,
      $form = this.elements.$form;
    event.preventDefault();
    if ($form.hasClass('elementor-form-waiting')) {
      return false;
    }
    this.beforeSend();
    jQuery.ajax({
      url: self.getSettings('ajaxUrl'),
      type: 'POST',
      dataType: 'json',
      data: self.getFormData(),
      processData: false,
      contentType: false,
      success: self.onSuccess,
      error: self.onError
    });
  }
});

/***/ }),

/***/ "../modules/forms/assets/js/frontend/handlers/form-steps.js":
/*!******************************************************************!*\
  !*** ../modules/forms/assets/js/frontend/handlers/form-steps.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class FormSteps extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        form: '.elementor-form',
        fieldsWrapper: '.elementor-form-fields-wrapper',
        fieldGroup: '.elementor-field-group',
        stepWrapper: '.elementor-field-type-step',
        stepField: '.e-field-step',
        submitWrapper: '.elementor-field-type-submit',
        submitButton: '[type="submit"]',
        buttons: '.e-form__buttons',
        buttonWrapper: '.e-form__buttons__wrapper',
        button: '.e-form__buttons__wrapper__button',
        indicator: '.e-form__indicators__indicator',
        indicatorProgress: '.e-form__indicators__indicator__progress',
        indicatorProgressMeter: '.e-form__indicators__indicator__progress__meter',
        formHelpInline: '.elementor-form-help-inline'
      },
      classes: {
        hidden: 'elementor-hidden',
        column: 'elementor-column',
        fieldGroup: 'elementor-field-group',
        elementorButton: 'elementor-button',
        step: 'e-form__step',
        buttons: 'e-form__buttons',
        buttonWrapper: 'e-form__buttons__wrapper',
        button: 'e-form__buttons__wrapper__button',
        indicators: 'e-form__indicators',
        indicator: 'e-form__indicators__indicator',
        indicatorIcon: 'e-form__indicators__indicator__icon',
        indicatorNumber: 'e-form__indicators__indicator__number',
        indicatorLabel: 'e-form__indicators__indicator__label',
        indicatorProgress: 'e-form__indicators__indicator__progress',
        indicatorProgressMeter: 'e-form__indicators__indicator__progress__meter',
        indicatorSeparator: 'e-form__indicators__indicator__separator',
        indicatorInactive: 'e-form__indicators__indicator--state-inactive',
        indicatorActive: 'e-form__indicators__indicator--state-active',
        indicatorCompleted: 'e-form__indicators__indicator--state-completed',
        indicatorShapeCircle: 'e-form__indicators__indicator--shape-circle',
        indicatorShapeSquare: 'e-form__indicators__indicator--shape-square',
        indicatorShapeRounded: 'e-form__indicators__indicator--shape-rounded',
        indicatorShapeNone: 'e-form__indicators__indicator--shape-none'
      }
    };
  }
  getDefaultElements() {
    const {
        selectors
      } = this.getSettings(),
      elements = {
        $form: this.$element.find(selectors.form)
      };
    elements.$fieldsWrapper = elements.$form.children(selectors.fieldsWrapper);
    elements.$stepWrapper = elements.$fieldsWrapper.children(selectors.stepWrapper);
    elements.$stepField = elements.$stepWrapper.children(selectors.stepField);
    elements.$fieldGroup = elements.$fieldsWrapper.children(selectors.fieldGroup);
    elements.$submitWrapper = elements.$fieldsWrapper.children(selectors.submitWrapper);
    elements.$submitButton = elements.$submitWrapper.children(selectors.submitButton);
    return elements;
  }
  onInit() {
    super.onInit(...arguments);
    if (!this.isStepsExist()) {
      return;
    }
    this.data = {
      steps: [],
      indicatorsWithObjectTags: []
    };
    this.state = {
      currentStep: 0,
      stepsType: '',
      stepsShape: ''
    };
    this.buildSteps();
    this.elements = {
      ...this.elements,
      ...this.createStepsIndicators(),
      ...this.createStepsButtons()
    };
    this.initProgressBar();
    this.extractResponsiveSizeFromSubmitWrapper();
  }
  bindEvents() {
    if (!this.isStepsExist()) {
      return;
    }
    this.elements.$form.on({
      submit: () => this.resetForm(),
      keydown: e => {
        if (13 === e.keyCode && !this.isLastStep() && 'textarea' !== e.target.localName) {
          e.preventDefault();
          this.applyStep('next');
        }
      },
      error: () => this.onFormError()
    });
  }
  isStepsExist() {
    return this.elements.$stepWrapper.length;
  }
  initProgressBar() {
    const stepsSettings = this.getElementSettings();
    if ('progress_bar' === stepsSettings.step_type) {
      this.setProgressBar();
    }
  }
  buildSteps() {
    this.elements.$stepWrapper.each((index, el) => {
      const {
          selectors,
          classes
        } = this.getSettings(),
        $currentStep = jQuery(el);
      $currentStep.addClass(classes.step).removeClass(classes.fieldGroup, classes.column);
      if (index) {
        $currentStep.addClass(classes.hidden);
      }
      this.setStepData($currentStep.children(selectors.stepField));
      $currentStep.append($currentStep.nextUntil(this.elements.$stepWrapper).not(this.elements.$submitWrapper));
    });
  }
  setStepData($stepElement) {
    const dataAttributes = ['label', 'previousButton', 'nextButton', 'iconUrl', 'iconLibrary', 'icon'],
      stepData = {};
    dataAttributes.forEach(attr => {
      const attrValue = $stepElement.attr('data-' + attr);
      if (attrValue) {
        stepData[attr] = attrValue;
      }
    });
    this.data.steps.push(stepData);
  }
  createStepsIndicators() {
    const stepsSettings = this.getElementSettings(),
      stepsElements = {};
    if ('none' !== stepsSettings.step_type) {
      const {
          selectors,
          classes
        } = this.getSettings(),
        indicatorsTypeClass = classes.indicators + '--type-' + stepsSettings.step_type,
        indicatorsClasses = [classes.indicators, indicatorsTypeClass];
      stepsElements.$indicatorsWrapper = jQuery('<div>', {
        class: indicatorsClasses.join(' ')
      });
      stepsElements.$indicatorsWrapper.append(this.buildIndicators());
      this.elements.$fieldsWrapper.before(stepsElements.$indicatorsWrapper);
      if ('progress_bar' === stepsSettings.step_type) {
        stepsElements.$progressBar = stepsElements.$indicatorsWrapper.find(selectors.indicatorProgress);
        stepsElements.$progressBarMeter = stepsElements.$indicatorsWrapper.find(selectors.indicatorProgressMeter);
      } else {
        stepsElements.$indicators = stepsElements.$indicatorsWrapper.find(selectors.indicator);
        stepsElements.$currentIndicator = stepsElements.$indicators.eq(this.state.currentStep);
      }
    }
    this.saveIndicatorsState();
    return stepsElements;
  }
  buildIndicators() {
    const stepsSettings = this.getElementSettings();
    return 'progress_bar' === stepsSettings.step_type ? this.buildProgressBar() : this.buildIndicatorsFromStepsData();
  }
  buildProgressBar() {
    const {
        classes
      } = this.getSettings(),
      $progressBar = jQuery('<div>', {
        class: classes.indicatorProgress
      }),
      $progressBarMeter = jQuery('<div>', {
        class: classes.indicatorProgressMeter
      });
    $progressBar.append($progressBarMeter);
    return $progressBar;
  }
  getProgressBarValue() {
    const totalSteps = this.data.steps.length,
      currentStep = this.state.currentStep,
      percentage = currentStep ? (currentStep + 1) / totalSteps * 100 : 100 / totalSteps;
    return Math.floor(percentage) + '%';
  }
  setProgressBar() {
    const progressBarValue = this.getProgressBarValue();
    this.updateProgressMeterCSSVariable(progressBarValue);
    this.elements.$progressBarMeter.text(progressBarValue);
  }
  updateProgressMeterCSSVariable(value) {
    this.$element[0].style.setProperty('--e-form-steps-indicator-progress-meter-width', value);
  }
  saveIndicatorsState() {
    const stepsSettings = this.getElementSettings();
    this.state.stepsType = stepsSettings.step_type;
    if (!['none', 'text', 'progress_bar'].includes(stepsSettings.step_type)) {
      this.state.stepsShape = stepsSettings.step_icon_shape;
    }
  }
  buildIndicatorsFromStepsData() {
    const indicators = [];
    this.data.steps.forEach((stepObj, index) => {
      if (index) {
        indicators.push(this.getStepSeparator());
      }
      indicators.push(this.getStepIndicatorElement(stepObj, index));
    });
    return indicators;
  }
  getStepIndicatorElement(stepObj, index) {
    const {
        classes
      } = this.getSettings(),
      stepsSettings = this.getElementSettings(),
      indicatorStateClass = this.getIndicatorStateClass(index),
      indicatorClasses = [classes.indicator, indicatorStateClass],
      $stepIndicator = jQuery('<div>', {
        class: indicatorClasses.join(' ')
      });
    if (stepsSettings.step_type.includes('icon')) {
      $stepIndicator.append(this.getStepIconElement(stepObj));
    }
    if (stepsSettings.step_type.includes('number')) {
      $stepIndicator.append(this.getStepNumberElement(index));
    }
    if (stepsSettings.step_type.includes('text')) {
      $stepIndicator.append(this.getStepLabelElement(stepObj.label));
    }
    return $stepIndicator;
  }
  getIndicatorStateClass(index) {
    const {
      classes
    } = this.getSettings();
    if (index < this.state.currentStep) {
      return classes.indicatorCompleted;
    } else if (index > this.state.currentStep) {
      return classes.indicatorInactive;
    }
    return classes.indicatorActive;
  }
  getIndicatorShapeClass() {
    const stepsSettings = this.getElementSettings(),
      {
        classes
      } = this.getSettings();
    return classes['indicatorShape' + this.firstLetterToUppercase(stepsSettings.step_icon_shape)];
  }
  firstLetterToUppercase(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
  }
  getStepNumberElement(index) {
    const {
        classes
      } = this.getSettings(),
      numberClasses = [classes.indicatorNumber, this.getIndicatorShapeClass()];
    return jQuery('<div>', {
      class: numberClasses.join(' '),
      text: index + 1
    });
  }
  getStepIconElement(stepObj) {
    const {
        classes
      } = this.getSettings(),
      iconClasses = [classes.indicatorIcon, this.getIndicatorShapeClass()],
      $icon = jQuery('<div>', {
        class: iconClasses.join(' ')
      });
    if (stepObj.icon) {
      $icon.html(stepObj.icon);
    } else {
      let $iconElement;
      if (stepObj.iconLibrary) {
        $iconElement = jQuery('<i>', {
          class: stepObj.iconLibrary
        });
      } else {
        // Using the attributes inline when creating the object, otherwise the data attribute will not work.
        $iconElement = jQuery(`<object type="image/svg+xml" data="${stepObj.iconUrl}"></object>`);

        // Updating an indicator svg fill color, when loaded inside an object tag with a separated scope.
        $iconElement.on('load', event => {
          event.target.contentDocument.querySelector('svg').style.fill = $iconElement.css('fill');
        });

        // Storing the indicators elements that contain object tags in order to change their fill color on steps change.
        this.data.indicatorsWithObjectTags.push($iconElement);
      }
      $icon.append($iconElement);
    }
    return $icon;
  }
  getStepLabelElement(label) {
    const {
      classes
    } = this.getSettings();
    return jQuery('<label>', {
      class: classes.indicatorLabel,
      text: label
    });
  }
  getStepSeparator() {
    const {
      classes
    } = this.getSettings();
    return jQuery('<div>', {
      class: classes.indicatorSeparator
    });
  }
  createStepsButtons() {
    const {
        selectors
      } = this.getSettings(),
      stepsElements = {};
    this.injectButtonsToSteps(stepsElements);
    stepsElements.$buttonsContainer = this.elements.$stepWrapper.find(selectors.buttons);
    stepsElements.$buttonsWrappers = stepsElements.$buttonsContainer.children(selectors.buttonWrapper);
    return stepsElements;
  }
  injectButtonsToSteps() {
    const totalSteps = this.elements.$stepWrapper.length;
    this.elements.$stepWrapper.each((index, el) => {
      const $el = jQuery(el),
        $container = this.getButtonsContainer();
      let $nextButton;
      if (index) {
        $container.append(this.getStepButton('previous', index));
        $nextButton = index === totalSteps - 1 ? this.getSubmitButton() : this.getStepButton('next', index);
      } else {
        $nextButton = this.getStepButton('next', index);
      }
      $container.append($nextButton);
      $el.append($container);
    });
  }
  getButtonsContainer() {
    const {
        classes
      } = this.getSettings(),
      stepsSettings = this.getElementSettings(),
      buttonColumnWidthClasses = [classes.buttons, classes.column, 'elementor-col-' + stepsSettings.button_width];
    return jQuery('<div>', {
      class: buttonColumnWidthClasses.join(' ')
    });
  }
  extractResponsiveSizeFromSubmitWrapper() {
    let sizeClasses = [];
    this.elements.$submitWrapper.removeClass((index, className) => {
      sizeClasses = className.match(/elementor-(sm|md)-[0-9]+/g)?.join(' ');
      return sizeClasses;
    });
    this.elements.$buttonsContainer.addClass(sizeClasses);
  }
  getStepButton(buttonType, index) {
    const {
        classes
      } = this.getSettings(),
      $button = this.getButton(buttonType, index).on('click', () => this.applyStep(buttonType)),
      buttonWrapperClasses = [classes.fieldGroup, classes.buttonWrapper, 'elementor-field-type-' + buttonType];
    return jQuery('<div>', {
      class: buttonWrapperClasses.join(' ')
    }).append($button);
  }
  getSubmitButton() {
    const {
      classes
    } = this.getSettings();
    this.elements.$submitButton.addClass(classes.button);

    // TODO: When a solution for the conditions will be found, check if can remove the elementor-col-x manipulation.
    return this.elements.$submitWrapper.attr('class', (index, className) => {
      return this.replaceClassNameColSize(className, '');
    }).removeClass(classes.column).removeClass(classes.buttons).addClass(classes.buttonWrapper);
  }
  replaceClassNameColSize(className, value) {
    return className.replace(/elementor-col-([0-9]+)/g, value);
  }
  getButton(buttonType, index) {
    const {
        classes
      } = this.getSettings(),
      submitSizeClass = this.elements.$submitButton.attr('class').match(/elementor-size-([^\W\d]+)/g),
      buttonClasses = [classes.elementorButton, submitSizeClass, classes.button, classes.button + '-' + buttonType];
    return jQuery('<button>', {
      type: 'button',
      text: this.getButtonLabel(buttonType, index),
      class: buttonClasses.join(' ')
    });
  }
  getButtonLabel(buttonType, index) {
    const stepsSettings = this.getElementSettings(),
      stepData = this.data.steps[index],
      buttonName = buttonType + 'Button',
      buttonSettingsProp = `step_${buttonType}_label`;
    return stepData[buttonName] || stepsSettings[buttonSettingsProp];
  }
  applyStep(direction) {
    const nextIndex = 'next' === direction ? this.state.currentStep + 1 : this.state.currentStep - 1;
    if ('next' === direction && !this.isFieldsValid(this.elements.$stepWrapper)) {
      return false;
    }
    this.goToStep(nextIndex);
    this.state.currentStep = nextIndex;
    if ('progress_bar' === this.state.stepsType) {
      this.setProgressBar();
    } else if ('none' !== this.state.stepsType) {
      this.updateIndicatorsState(direction);
    }
  }
  goToStep(index) {
    const {
      classes
    } = this.getSettings();
    this.elements.$stepWrapper.eq(this.state.currentStep).addClass(classes.hidden);
    this.elements.$stepWrapper.eq(index).removeClass(classes.hidden).children(this.getSettings('selectors.fieldGroup')).first().find(':input').first().trigger('focus');
  }
  isFieldsValid($stepWrapper) {
    let isValid = true;
    $stepWrapper.eq(this.state.currentStep).find('.elementor-field-group :input').each((index, el) => {
      if (!el.checkValidity()) {
        el.reportValidity();
        return isValid = false;
      }
    });
    return isValid;
  }
  isLastStep() {
    return this.state.currentStep === this.data.steps.length - 1;
  }
  resetForm() {
    this.state.currentStep = 0;
    this.resetSteps();
    if ('progress_bar' === this.state.stepsType) {
      this.setProgressBar();
    } else if ('none' !== this.state.stepsType) {
      this.elements.$currentIndicator = this.elements.$indicators.eq(this.state.currentStep);
      this.resetIndicators();
    }
  }
  resetSteps() {
    const {
      classes
    } = this.getSettings();
    this.elements.$stepWrapper.addClass(classes.hidden).eq(0).removeClass(classes.hidden);
  }
  resetIndicators() {
    const {
        classes
      } = this.getSettings(),
      stateTypes = ['inactive', 'active', 'completed'],
      stateClasses = stateTypes.map(state => classes.indicator + '--state-' + state);
    this.elements.$indicators.removeClass(stateClasses.join(' ')).not(this.elements.$indicators.eq(0)).addClass(classes.indicatorInactive);
    this.elements.$indicators.eq(0).addClass(classes.indicatorActive);
  }
  updateIndicatorsState(direction) {
    const {
        classes
      } = this.getSettings(),
      indicatorsClasses = {
        current: {
          remove: classes.indicatorActive,
          add: 'next' === direction ? classes.indicatorCompleted : classes.indicatorInactive
        },
        next: {
          remove: 'next' === direction ? classes.indicatorInactive : classes.indicatorCompleted,
          add: classes.indicatorActive
        }
      };
    this.elements.$currentIndicator.removeClass(indicatorsClasses.current.remove).addClass(indicatorsClasses.current.add);
    this.elements.$currentIndicator = this.elements.$indicators.eq(this.state.currentStep);
    this.elements.$currentIndicator.removeClass(indicatorsClasses.next.remove).addClass(indicatorsClasses.next.add);

    // Updating an indicator svg fill color, if loaded inside an object tag.
    this.data.indicatorsWithObjectTags.forEach($element => {
      $element.contents().children('svg').css('fill', $element.css('fill'));
    });
  }
  updateValue(updatedValue) {
    const actionsMap = {
      step_type: () => this.updateStepsType(),
      step_icon_shape: () => this.updateStepsShape(),
      step_next_label: () => this.updateStepButtonsLabel('next'),
      step_previous_label: () => this.updateStepButtonsLabel('previous')
    };
    if (actionsMap[updatedValue]) {
      actionsMap[updatedValue]();
    }
  }
  updateStepsType() {
    const stepsSettings = this.getElementSettings();
    if (this.elements.$indicatorsWrapper) {
      this.elements.$indicatorsWrapper.remove();
    }
    if ('none' !== stepsSettings.step_type) {
      this.rebuildIndicators();
    }
    this.state.stepsType = stepsSettings.step_type;
  }
  rebuildIndicators() {
    this.elements = {
      ...this.elements,
      ...this.createStepsIndicators()
    };
    this.initProgressBar();
  }
  updateStepsShape() {
    const stepsSettings = this.getElementSettings(),
      {
        selectors,
        classes
      } = this.getSettings(),
      shapeClassStart = classes.indicator + '--shape-',
      currentShapeClass = shapeClassStart + this.state.stepsShape,
      newShapeClass = shapeClassStart + stepsSettings.step_icon_shape;
    let elementsTargetType = '';
    if (stepsSettings.step_type.includes('icon')) {
      elementsTargetType = 'icon';
    } else if (stepsSettings.step_type.includes('number')) {
      elementsTargetType = 'number';
    }
    this.elements.$indicators.children(selectors.indicator + '__' + elementsTargetType).removeClass(currentShapeClass).addClass(newShapeClass);
    this.state.stepsShape = stepsSettings.step_icon_shape;
  }
  updateStepButtonsLabel(buttonType) {
    const {
        selectors
      } = this.getSettings(),
      buttonSelector = {
        previous: selectors.button + '-previous',
        next: selectors.button + '-next'
      };
    this.elements.$stepWrapper.each((index, el) => {
      jQuery(el).find(buttonSelector[buttonType]).text(this.getButtonLabel(buttonType, index));
    });
  }
  onFormError() {
    const {
        selectors
      } = this.getSettings(),
      $errorStepElement = this.elements.$form.find(selectors.formHelpInline).closest(selectors.stepWrapper);
    if ($errorStepElement.length) {
      this.goToStep($errorStepElement.index());
    }
  }
  onElementChange(updatedValue) {
    if (!this.isStepsExist()) {
      return;
    }
    this.updateValue(updatedValue);
  }
}
exports["default"] = FormSteps;

/***/ }),

/***/ "../modules/forms/assets/js/frontend/handlers/recaptcha.js":
/*!*****************************************************************!*\
  !*** ../modules/forms/assets/js/frontend/handlers/recaptcha.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class Recaptcha extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        recaptcha: '.elementor-g-recaptcha:last',
        submit: 'button[type="submit"]',
        recaptchaResponse: '[name="g-recaptcha-response"]'
      }
    };
  }
  getDefaultElements() {
    const {
        selectors
      } = this.getDefaultSettings(),
      elements = {
        $recaptcha: this.$element.find(selectors.recaptcha)
      };
    elements.$form = elements.$recaptcha.parents('form');
    elements.$submit = elements.$form.find(selectors.submit);
    return elements;
  }
  bindEvents() {
    this.onRecaptchaApiReady();
  }
  isActive(settings) {
    const {
      selectors
    } = this.getDefaultSettings();
    return settings.$element.find(selectors.recaptcha).length;
  }
  addRecaptcha() {
    const settings = this.elements.$recaptcha.data(),
      isV2 = 'v3' !== settings.type,
      captchaIds = [];
    captchaIds.forEach(id => window.grecaptcha.reset(id));
    const widgetId = window.grecaptcha.render(this.elements.$recaptcha[0], settings);
    this.elements.$form.on('reset error', () => {
      window.grecaptcha.reset(widgetId);
    });
    if (isV2) {
      this.elements.$recaptcha.data('widgetId', widgetId);
    } else {
      captchaIds.push(widgetId);
      this.elements.$submit.on('click', e => this.onV3FormSubmit(e, widgetId));
    }
  }
  onV3FormSubmit(e, widgetId) {
    e.preventDefault();
    window.grecaptcha.ready(() => {
      const $form = this.elements.$form;
      grecaptcha.execute(widgetId, {
        action: this.elements.$recaptcha.data('action')
      }).then(token => {
        if (this.elements.$recaptchaResponse) {
          this.elements.$recaptchaResponse.val(token);
        } else {
          this.elements.$recaptchaResponse = jQuery('<input>', {
            type: 'hidden',
            value: token,
            name: 'g-recaptcha-response'
          });
          $form.append(this.elements.$recaptchaResponse);
        }

        // Support old browsers.
        const bcSupport = !$form[0].reportValidity || 'function' !== typeof $form[0].reportValidity;
        if (bcSupport || $form[0].reportValidity()) {
          $form.trigger('submit');
        }
      });
    });
  }
  onRecaptchaApiReady() {
    if (window.grecaptcha && window.grecaptcha.render) {
      this.addRecaptcha();
    } else {
      // If not ready check again by timeout..
      setTimeout(() => this.onRecaptchaApiReady(), 350);
    }
  }
}
exports["default"] = Recaptcha;

/***/ }),

/***/ "../modules/gallery/assets/js/frontend/frontend-legacy.js":
/*!****************************************************************!*\
  !*** ../modules/gallery/assets/js/frontend/frontend-legacy.js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _handler = _interopRequireDefault(__webpack_require__(/*! ./handler */ "../modules/gallery/assets/js/frontend/handler.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('gallery', _handler.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/gallery/assets/js/frontend/handler.js":
/*!********************************************************!*\
  !*** ../modules/gallery/assets/js/frontend/handler.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class galleryHandler extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        container: '.elementor-gallery__container',
        galleryTitles: '.elementor-gallery-title',
        galleryImages: '.e-gallery-image',
        galleryItemOverlay: '.elementor-gallery-item__overlay',
        galleryItemContent: '.elementor-gallery-item__content'
      },
      classes: {
        activeTitle: 'elementor-item-active'
      }
    };
  }
  getDefaultElements() {
    const {
        selectors
      } = this.getSettings(),
      elements = {
        $container: this.$element.find(selectors.container),
        $titles: this.$element.find(selectors.galleryTitles)
      };
    elements.$items = elements.$container.children();
    elements.$images = elements.$items.children(selectors.galleryImages);
    elements.$itemsOverlay = elements.$items.children(selectors.galleryItemOverlay);
    elements.$itemsContent = elements.$items.children(selectors.galleryItemContent);
    elements.$itemsContentElements = elements.$itemsContent.children();
    return elements;
  }
  getGallerySettings() {
    const settings = this.getElementSettings(),
      activeBreakpoints = elementorFrontend.config.responsive.activeBreakpoints,
      activeBreakpointsKeys = Object.keys(activeBreakpoints),
      breakPointSettings = {},
      desktopIdealRowHeight = elementorFrontend.getDeviceSetting('desktop', settings, 'ideal_row_height');
    activeBreakpointsKeys.forEach(breakpoint => {
      // The Gallery widget currently does not support widescreen.
      if ('widescreen' !== breakpoint) {
        const idealRowHeight = elementorFrontend.getDeviceSetting(breakpoint, settings, 'ideal_row_height');
        breakPointSettings[activeBreakpoints[breakpoint].value] = {
          horizontalGap: elementorFrontend.getDeviceSetting(breakpoint, settings, 'gap').size,
          verticalGap: elementorFrontend.getDeviceSetting(breakpoint, settings, 'gap').size,
          columns: elementorFrontend.getDeviceSetting(breakpoint, settings, 'columns'),
          idealRowHeight: idealRowHeight?.size
        };
      }
    });
    return {
      type: settings.gallery_layout,
      idealRowHeight: desktopIdealRowHeight?.size,
      container: this.elements.$container,
      columns: settings.columns,
      aspectRatio: settings.aspect_ratio,
      lastRow: 'normal',
      horizontalGap: elementorFrontend.getDeviceSetting('desktop', settings, 'gap').size,
      verticalGap: elementorFrontend.getDeviceSetting('desktop', settings, 'gap').size,
      animationDuration: settings.content_animation_duration,
      breakpoints: breakPointSettings,
      rtl: elementorFrontend.config.is_rtl,
      lazyLoad: 'yes' === settings.lazyload
    };
  }
  initGallery() {
    this.gallery = new EGallery(this.getGallerySettings());
    this.toggleAllAnimationsClasses();
  }
  removeAnimationClasses($element) {
    $element.removeClass((index, className) => (className.match(/elementor-animated-item-\S+/g) || []).join(' '));
  }
  toggleOverlayHoverAnimation() {
    this.removeAnimationClasses(this.elements.$itemsOverlay);
    const hoverAnimation = this.getElementSettings('background_overlay_hover_animation');
    if (hoverAnimation) {
      this.elements.$itemsOverlay.addClass('elementor-animated-item--' + hoverAnimation);
    }
  }
  toggleOverlayContentAnimation() {
    this.removeAnimationClasses(this.elements.$itemsContentElements);
    const contentHoverAnimation = this.getElementSettings('content_hover_animation');
    if (contentHoverAnimation) {
      this.elements.$itemsContentElements.addClass('elementor-animated-item--' + contentHoverAnimation);
    }
  }
  toggleOverlayContentSequencedAnimation() {
    this.elements.$itemsContent.toggleClass('elementor-gallery--sequenced-animation', 'yes' === this.getElementSettings('content_sequenced_animation'));
  }
  toggleImageHoverAnimation() {
    const imageHoverAnimation = this.getElementSettings('image_hover_animation');
    this.removeAnimationClasses(this.elements.$images);
    if (imageHoverAnimation) {
      this.elements.$images.addClass('elementor-animated-item--' + imageHoverAnimation);
    }
  }
  toggleAllAnimationsClasses() {
    const elementSettings = this.getElementSettings(),
      animation = elementSettings.background_overlay_hover_animation || elementSettings.content_hover_animation || elementSettings.image_hover_animation;
    this.elements.$items.toggleClass('elementor-animated-content', !!animation);
    this.toggleImageHoverAnimation();
    this.toggleOverlayHoverAnimation();
    this.toggleOverlayContentAnimation();
    this.toggleOverlayContentSequencedAnimation();
  }
  toggleAnimationClasses(settingKey) {
    if ('content_sequenced_animation' === settingKey) {
      this.toggleOverlayContentSequencedAnimation();
    }
    if ('background_overlay_hover_animation' === settingKey) {
      this.toggleOverlayHoverAnimation();
    }
    if ('content_hover_animation' === settingKey) {
      this.toggleOverlayContentAnimation();
    }
    if ('image_hover_animation' === settingKey) {
      this.toggleImageHoverAnimation();
    }
  }
  setGalleryTags(id) {
    this.gallery.setSettings('tags', 'all' === id ? [] : ['' + id]);
  }
  bindEvents() {
    this.elements.$titles.on('click', this.galleriesNavigationListener.bind(this)).on('keyup', event => {
      const ENTER_KEY = 13,
        SPACE_KEY = 32;
      if (ENTER_KEY === event.keyCode || SPACE_KEY === event.keyCode) {
        event.currentTarget.click();
      }
    });
  }
  galleriesNavigationListener(event) {
    const classes = this.getSettings('classes'),
      clickedElement = jQuery(event.target);

    // Make sure no other gallery title has an active class
    this.elements.$titles.removeClass(classes.activeTitle);

    // Give the gallery being activated the active class
    clickedElement.addClass(classes.activeTitle);
    this.setGalleryTags(clickedElement.data('gallery-index'));
    const updateLightboxGroup = () => this.setLightboxGalleryIndex(clickedElement.data('gallery-index'));

    // Wait for the gallery to filter before grouping items for the Light-box
    setTimeout(updateLightboxGroup, 1000);
  }
  setLightboxGalleryIndex() {
    let index = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'all';
    if ('all' === index) {
      return this.elements.$items.attr('data-elementor-lightbox-slideshow', 'all_' + this.getID());
    }
    this.elements.$items.not('.e-gallery-item--hidden').attr('data-elementor-lightbox-slideshow', index + '_' + this.getID());
  }
  onInit() {
    super.onInit(...arguments);
    if (elementorFrontend.isEditMode() && 1 <= this.$element.find('.elementor-widget-empty-icon').length) {
      this.$element.addClass('elementor-widget-empty');
    }
    if (!this.elements.$container.length) {
      return;
    }
    this.initGallery();
    this.elements.$titles.first().trigger('click');
  }
  getSettingsDictionary() {
    if (this.settingsDictionary) {
      return this.settingsDictionary;
    }
    const activeBreakpoints = elementorFrontend.config.responsive.activeBreakpoints,
      activeBreakpointsKeys = Object.keys(activeBreakpoints);
    const settingsDictionary = {
      columns: ['columns'],
      gap: ['horizontalGap', 'verticalGap'],
      ideal_row_height: ['idealRowHeight']
    };
    activeBreakpointsKeys.forEach(breakpoint => {
      // The Gallery widget currently does not support widescreen.
      if ('widescreen' === breakpoint) {
        return;
      }
      settingsDictionary['columns_' + breakpoint] = ['breakpoints.' + activeBreakpoints[breakpoint].value + '.columns'];
      settingsDictionary['gap_' + breakpoint] = ['breakpoints.' + activeBreakpoints[breakpoint].value + '.horizontalGap', 'breakpoints.' + activeBreakpoints[breakpoint].value + '.verticalGap'];
      settingsDictionary['ideal_row_height_' + breakpoint] = ['breakpoints.' + activeBreakpoints[breakpoint].value + '.idealRowHeight'];
    });
    settingsDictionary.aspect_ratio = ['aspectRatio'];
    this.settingsDictionary = settingsDictionary;
    return this.settingsDictionary;
  }
  onElementChange(settingKey) {
    if (-1 !== ['background_overlay_hover_animation', 'content_hover_animation', 'image_hover_animation', 'content_sequenced_animation'].indexOf(settingKey)) {
      this.toggleAnimationClasses(settingKey);
      return;
    }
    const settingsDictionary = this.getSettingsDictionary();
    const settingsToUpdate = settingsDictionary[settingKey];
    if (settingsToUpdate) {
      const gallerySettings = this.getGallerySettings();
      settingsToUpdate.forEach(settingToUpdate => {
        this.gallery.setSettings(settingToUpdate, this.getItems(gallerySettings, settingToUpdate));
      });
    }
  }
  onDestroy() {
    super.onDestroy();
    if (this.gallery) {
      this.gallery.destroy();
    }
  }
}
exports["default"] = galleryHandler;

/***/ }),

/***/ "../modules/hotspot/assets/js/frontend/frontend-legacy.js":
/*!****************************************************************!*\
  !*** ../modules/hotspot/assets/js/frontend/frontend-legacy.js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _hotspot = _interopRequireDefault(__webpack_require__(/*! ./handlers/hotspot */ "../modules/hotspot/assets/js/frontend/handlers/hotspot.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('hotspot', _hotspot.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/hotspot/assets/js/frontend/handlers/hotspot.js":
/*!*****************************************************************!*\
  !*** ../modules/hotspot/assets/js/frontend/handlers/hotspot.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class Hotspot extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        hotspot: '.e-hotspot',
        tooltip: '.e-hotspot__tooltip'
      }
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      $hotspot: this.$element.find(selectors.hotspot),
      $hotspotsExcludesLinks: this.$element.find(selectors.hotspot).filter(':not(.e-hotspot--no-tooltip)'),
      $tooltip: this.$element.find(selectors.tooltip)
    };
  }
  bindEvents() {
    const tooltipTrigger = this.getCurrentDeviceSetting('tooltip_trigger'),
      tooltipTriggerEvent = 'mouseenter' === tooltipTrigger ? 'mouseleave mouseenter' : tooltipTrigger;
    if (tooltipTriggerEvent !== 'none') {
      this.elements.$hotspotsExcludesLinks.on(tooltipTriggerEvent, event => this.onHotspotTriggerEvent(event));
    }
  }
  onDeviceModeChange() {
    this.elements.$hotspotsExcludesLinks.off();
    this.bindEvents();
  }
  onHotspotTriggerEvent(event) {
    const elementTarget = jQuery(event.target),
      isHotspotButtonEvent = elementTarget.closest('.e-hotspot__button').length,
      isTooltipMouseLeave = 'mouseleave' === event.type && (elementTarget.is('.e-hotspot--tooltip-position') || elementTarget.parents('.e-hotspot--tooltip-position').length),
      isMobile = 'mobile' === elementorFrontend.getCurrentDeviceMode(),
      isHotspotLink = elementTarget.closest('.e-hotspot--link').length,
      triggerTooltip = !(isHotspotLink && isMobile && ('mouseleave' === event.type || 'mouseenter' === event.type));
    if (triggerTooltip && (isHotspotButtonEvent || isTooltipMouseLeave)) {
      const currentHotspot = jQuery(event.currentTarget);
      this.elements.$hotspot.not(currentHotspot).removeClass('e-hotspot--active');
      currentHotspot.toggleClass('e-hotspot--active');
    }
  }

  // Fix bad UX of "Sequenced Animation" when editing other controls
  editorAddSequencedAnimation() {
    this.elements.$hotspot.toggleClass('e-hotspot--sequenced', 'yes' === this.getElementSettings('hotspot_sequenced_animation'));
  }
  hotspotSequencedAnimation() {
    const elementSettings = this.getElementSettings(),
      isSequencedAnimation = elementSettings.hotspot_sequenced_animation;
    if ('no' === isSequencedAnimation) {
      return;
    }

    // Start sequenced animation when element on viewport
    const hotspotObserver = elementorModules.utils.Scroll.scrollObserver({
      callback: event => {
        if (event.isInViewport) {
          hotspotObserver.unobserve(this.$element[0]);

          // Add delay for each hotspot
          this.elements.$hotspot.each((index, element) => {
            if (0 === index) {
              return;
            }
            const sequencedAnimation = elementSettings.hotspot_sequenced_animation_duration,
              sequencedAnimationDuration = sequencedAnimation ? sequencedAnimation.size : 1000,
              animationDelay = index * (sequencedAnimationDuration / this.elements.$hotspot.length);
            element.style.animationDelay = animationDelay + 'ms';
          });
        }
      }
    });
    hotspotObserver.observe(this.$element[0]);
  }
  setTooltipPositionControl() {
    const elementSettings = this.getElementSettings(),
      isDirectionAnimation = 'undefined' !== typeof elementSettings.tooltip_animation && elementSettings.tooltip_animation.match(/^e-hotspot--(slide|fade)-direction/);
    if (isDirectionAnimation) {
      this.elements.$tooltip.removeClass('e-hotspot--tooltip-animation-from-left e-hotspot--tooltip-animation-from-top e-hotspot--tooltip-animation-from-right e-hotspot--tooltip-animation-from-bottom');
      this.elements.$tooltip.addClass('e-hotspot--tooltip-animation-from-' + elementSettings.tooltip_position);
    }
  }
  onInit() {
    super.onInit(...arguments);
    this.hotspotSequencedAnimation();
    this.setTooltipPositionControl();
    if (window.elementor) {
      elementor.listenTo(elementor.channels.deviceMode, 'change', () => this.onDeviceModeChange());
    }
  }
  onElementChange(propertyName) {
    if (propertyName.startsWith('tooltip_position')) {
      this.setTooltipPositionControl();
    }
    if (propertyName.startsWith('hotspot_sequenced_animation')) {
      this.editorAddSequencedAnimation();
    }
  }
}
exports["default"] = Hotspot;

/***/ }),

/***/ "../modules/loop-builder/assets/js/frontend/frontend-legacy.js":
/*!*********************************************************************!*\
  !*** ../modules/loop-builder/assets/js/frontend/frontend-legacy.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _loop = _interopRequireDefault(__webpack_require__(/*! ./handlers/loop */ "../modules/loop-builder/assets/js/frontend/handlers/loop.js"));
var _loadMore = _interopRequireDefault(__webpack_require__(/*! ./handlers/load-more */ "../modules/loop-builder/assets/js/frontend/handlers/load-more.js"));
var _loopCarousel = _interopRequireDefault(__webpack_require__(/*! ./handlers/loop-carousel */ "../modules/loop-builder/assets/js/frontend/handlers/loop-carousel.js"));
var _ajaxPagination = _interopRequireDefault(__webpack_require__(/*! ./handlers/ajax-pagination */ "../modules/loop-builder/assets/js/frontend/handlers/ajax-pagination.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    ['post', 'product'].forEach(skinName => {
      elementorFrontend.elementsHandler.attachHandler('loop-grid', _loadMore.default, skinName);
      elementorFrontend.elementsHandler.attachHandler('loop-grid', _loop.default, skinName);
      elementorFrontend.elementsHandler.attachHandler('loop-carousel', _loop.default, skinName);
      elementorFrontend.elementsHandler.attachHandler('loop-carousel', _loopCarousel.default, skinName);
      elementorFrontend.elementsHandler.attachHandler('loop-grid', _ajaxPagination.default, skinName);
    });
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/loop-builder/assets/js/frontend/handlers/ajax-pagination.js":
/*!******************************************************************************!*\
  !*** ../modules/loop-builder/assets/js/frontend/handlers/ajax-pagination.js ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _ajaxHelper = _interopRequireDefault(__webpack_require__(/*! elementor-pro/frontend/utils/ajax-helper */ "../assets/dev/js/frontend/utils/ajax-helper.js"));
var _runElementHandlers = _interopRequireDefault(__webpack_require__(/*! elementor-pro/frontend/utils/run-element-handlers */ "../assets/dev/js/frontend/utils/run-element-handlers.js"));
class AjaxPagination extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        links: 'a.page-numbers:not(.current)',
        widgetContainer: '.elementor-widget-container',
        postWrapperTag: '.e-loop-item'
      }
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      links: this.$element[0].querySelectorAll(selectors.links),
      widgetContainer: this.$element[0].querySelector(selectors.widgetContainer)
    };
  }
  bindEvents() {
    super.bindEvents();
    this.linksEventListeners();
  }
  linksEventListeners() {
    if (!this.elements.links.length) {
      return;
    }
    if ('ajax' !== this.getElementSettings('pagination_load_type')) {
      return;
    }
    this.elements.links.forEach(link => {
      link.addEventListener('click', event => {
        this.handleLinkClick(event);
      });
    });
  }
  handleLinkClick(event) {
    event.preventDefault();
    if (this.isLoading) {
      return;
    }
    this.removeLinksListeners();
    this.handleUiBeforeLoading();
    const nextPageUrl = event?.target.getAttribute('href');
    this.updateURLQueryString(nextPageUrl);
    return fetch(nextPageUrl).then(response => response.text()).then(html => {
      // Convert the HTML string into a document object
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, 'text/html');
      this.handleSuccessFetch(doc);
    });
  }
  removeLinksListeners() {
    if (!this.elements.links.length) {
      return;
    }
    this.elements.links.forEach(link => {
      link.removeEventListener('click', this.handleLinkClick);
    });
  }
  updateURLQueryString(nextPageUrl) {
    const currentUrl = new URL(window.location.href);
    const currentParams = currentUrl.searchParams;
    const targetUrl = new URL(nextPageUrl);
    const targetParams = targetUrl.searchParams;
    targetParams.forEach((value, key) => {
      currentParams.set(key, value);
    });

    // Clicked on page 1.
    if (!targetParams.has('e-page-' + this.elementId)) {
      currentParams.delete('e-page-' + this.elementId);
    }
    history.pushState(null, '', currentUrl.href);
  }
  handleUiBeforeLoading() {
    this.setLoading(true);
    this.ajaxHelper.addLoadingAnimationOverlay(this.elementId);
    this.maybeScrollToTop();
  }
  setLoading(loadng) {
    this.isLoading = loadng;
  }
  maybeScrollToTop() {
    if ('yes' !== this.getElementSettings('auto_scroll')) {
      return;
    }
    const widget = document.querySelector(`.elementor-element-${this.elementId}`);
    if (!widget) {
      return;
    }
    widget.scrollIntoView({
      behavior: 'smooth'
    });
  }
  handleUiAfterLoading() {
    this.setLoading(false);
    this.ajaxHelper.removeLoadingAnimationOverlay(this.elementId);
  }
  handleSuccessFetch(result) {
    this.handleUiAfterLoading();
    const selectors = this.getSettings('selectors');
    const newWidgetContainer = result.querySelector(`[data-id="${this.elementId}"] ${selectors.widgetContainer}`);
    const existingWidgetContainer = this.elements.widgetContainer;
    this.$element[0].replaceChild(newWidgetContainer, existingWidgetContainer);
    this.afterInsertPosts();
  }
  afterInsertPosts() {
    const selectors = this.getSettings('selectors'),
      postsElements = document.querySelectorAll(`[data-id="${this.elementId}"] ${selectors.postWrapperTag}`);
    elementorFrontend.elementsHandler.runReadyTrigger(this.$element[0]);
    (0, _runElementHandlers.default)(postsElements);
  }
  onInit() {
    super.onInit();
    this.setLoading(false);
    this.elementId = this.getID();
    this.ajaxHelper = new _ajaxHelper.default();
  }
}
exports["default"] = AjaxPagination;

/***/ }),

/***/ "../modules/loop-builder/assets/js/frontend/handlers/load-more.js":
/*!************************************************************************!*\
  !*** ../modules/loop-builder/assets/js/frontend/handlers/load-more.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _loadMore = _interopRequireDefault(__webpack_require__(/*! modules/posts/assets/js/frontend/handlers/load-more */ "../modules/posts/assets/js/frontend/handlers/load-more.js"));
var _runElementHandlers = _interopRequireDefault(__webpack_require__(/*! elementor-pro/frontend/utils/run-element-handlers */ "../assets/dev/js/frontend/utils/run-element-handlers.js"));
class LoopLoadMore extends _loadMore.default {
  getDefaultSettings() {
    const defaultSettings = super.getDefaultSettings();
    defaultSettings.selectors.postsContainer = '.elementor-loop-container';
    defaultSettings.selectors.postWrapperTag = '.e-loop-item';
    defaultSettings.selectors.loadMoreButton = '.e-loop__load-more .elementor-button';
    defaultSettings.selectors.dynamicStyleElement = 'style[id^="loop-dynamic"]';
    return defaultSettings;
  }
  afterInsertPosts(postsElements, result) {
    super.afterInsertPosts(postsElements);
    if (elementorFrontend.config.experimentalFeatures.e_lazyload) {
      this.handleLazyloadBackgroundElements();
    }
    this.handleDynamicStyleElements(result);
    (0, _runElementHandlers.default)(postsElements);
  }

  /**
   * Handle Lazyload Background Elements.
   *
   * Add's the `lazyload` class to the newly added dom elements that use the Lazyload Background feature.
   */
  handleLazyloadBackgroundElements() {
    document.querySelectorAll(`[data-id="${this.elementId}"] [data-e-bg-lazyload]:not(.lazyloaded)`).forEach(element => {
      element.classList.add('lazyloaded');
    });
  }

  /**
   * Handle Dynamic Style Elements.
   *
   * Adds the dynamic `<style>` block responsible for any styling that effects each individual loop-item
   * e.g. dynamic-tag background images
   *
   * @param {Object} result - Dom element after the remaining content `afterInsertPosts()` has run.
   */
  handleDynamicStyleElements(result) {
    const selectors = this.getSettings('selectors'),
      dynamicStyleElements = result.querySelectorAll(`[data-id="${this.elementId}"] ${selectors.dynamicStyleElement}`);
    this.$element.append(dynamicStyleElements);
  }
}
exports["default"] = LoopLoadMore;

/***/ }),

/***/ "../modules/loop-builder/assets/js/frontend/handlers/loop-carousel.js":
/*!****************************************************************************!*\
  !*** ../modules/loop-builder/assets/js/frontend/handlers/loop-carousel.js ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";
/* provided dependency */ var __ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n")["__"];


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _runElementHandlers = _interopRequireDefault(__webpack_require__(/*! elementor-pro/frontend/utils/run-element-handlers */ "../assets/dev/js/frontend/utils/run-element-handlers.js"));
class LoopCarousel extends elementorModules.frontend.handlers.CarouselBase {
  getDefaultSettings() {
    const defaultSettings = super.getDefaultSettings();
    defaultSettings.selectors.carousel = '.elementor-loop-container';
    return defaultSettings;
  }
  getSwiperSettings() {
    const swiperOptions = super.getSwiperSettings(),
      elementSettings = this.getElementSettings(),
      isRtl = elementorFrontend.config.is_rtl,
      widgetSelector = `.elementor-element-${this.getID()}`;
    if ('yes' === elementSettings.arrows) {
      swiperOptions.navigation = {
        prevEl: isRtl ? `${widgetSelector} .elementor-swiper-button-next` : `${widgetSelector} .elementor-swiper-button-prev`,
        nextEl: isRtl ? `${widgetSelector} .elementor-swiper-button-prev` : `${widgetSelector} .elementor-swiper-button-next`
      };
    }
    swiperOptions.on.beforeInit = () => {
      this.a11ySetSlidesAriaLabels();
    };
    return swiperOptions;
  }
  async onInit() {
    super.onInit(...arguments);
    this.ranElementHandlers = false;
  }
  handleElementHandlers() {
    if (this.ranElementHandlers || !this.swiper) {
      return;
    }
    const newSlides = Array.from(this.swiper.slides).slice(this.swiper.activeIndex - 1, this.swiper.slides.length);
    (0, _runElementHandlers.default)(newSlides);
    this.ranElementHandlers = true;
  }
  a11ySetSlidesAriaLabels() {
    const slides = Array.from(this.elements.$slides);
    slides.forEach((slide, index) => {
      slide.setAttribute('aria-label', `${parseInt(index + 1)} ${__('of', 'elementor-pro')} ${slides.length}`);
    });
  }
}
exports["default"] = LoopCarousel;

/***/ }),

/***/ "../modules/loop-builder/assets/js/frontend/handlers/loop.js":
/*!*******************************************************************!*\
  !*** ../modules/loop-builder/assets/js/frontend/handlers/loop.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";
/* provided dependency */ var __ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n")["__"];


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _posts = _interopRequireDefault(__webpack_require__(/*! modules/posts/assets/js/frontend/handlers/posts */ "../modules/posts/assets/js/frontend/handlers/posts.js"));
var _documentHandle = _interopRequireWildcard(__webpack_require__(/*! elementor-pro/preview/utils/document-handle */ "../assets/dev/js/preview/utils/document-handle.js"));
function _getRequireWildcardCache(e) { if ("function" != typeof WeakMap) return null; var r = new WeakMap(), t = new WeakMap(); return (_getRequireWildcardCache = function (e) { return e ? t : r; })(e); }
function _interopRequireWildcard(e, r) { if (!r && e && e.__esModule) return e; if (null === e || "object" != typeof e && "function" != typeof e) return { default: e }; var t = _getRequireWildcardCache(r); if (t && t.has(e)) return t.get(e); var n = { __proto__: null }, a = Object.defineProperty && Object.getOwnPropertyDescriptor; for (var u in e) if ("default" !== u && Object.prototype.hasOwnProperty.call(e, u)) { var i = a ? Object.getOwnPropertyDescriptor(e, u) : null; i && (i.get || i.set) ? Object.defineProperty(n, u, i) : n[u] = e[u]; } return n.default = e, t && t.set(e, n), n; }
class Loop extends _posts.default {
  getSkinPrefix() {
    return '';
  }
  getDefaultSettings() {
    const defaultSettings = super.getDefaultSettings();
    defaultSettings.selectors.post = '.elementor-loop-container .elementor';
    defaultSettings.selectors.postsContainer = '.elementor-loop-container';
    defaultSettings.classes.inPlaceTemplateEditable = 'elementor-in-place-template-editable';
    return defaultSettings;
  }

  /**
   * Fit Images is used in the extended Posts widget handler to apply the "Image Size", "Image Ratio" and
   * "Image Width" controls. These controls don't exist in the Loop Grid widget, so we override `fitImages()`
   * to disable it's functionality.
   */
  fitImages() {}
  getVerticalSpaceBetween() {
    return elementorProFrontend.utils.controls.getResponsiveControlValue(this.getElementSettings(), 'row_gap', 'size');
  }

  /**
   * This is a callback that runs when the "Edit Template" document handle is clicked in the Editor.
   */
  onInPlaceEditTemplate() {
    this.$element.addClass(this.getDefaultSettings().classes.inPlaceTemplateEditable);
    this.elementsToRemove = [];
    this.handleSwiper();
    const templateID = this.getElementSettings('template_id');
    this.elementsToRemove = [...this.elementsToRemove, 'style#loop-' + templateID, 'link#font-loop-' + templateID, 'style#loop-dynamic-' + templateID];
    this.elementsToRemove.forEach(elementToRemove => {
      this.$element.find(elementToRemove).remove();
    });
  }
  handleSwiper() {
    const swiper = this.elements.$postsContainer.data('swiper');
    if (!swiper) {
      return;
    }
    swiper.slideTo(0);
    swiper.autoplay.pause();
    swiper.allowTouchMove = false;
    swiper.params.autoplay.delay = 1000000; // Add a long delay so that the Swiper does not move while editing the Template. Even though it was paused, it will start again on mouse leave.
    swiper.update();
    this.elementsToRemove = [...this.elementsToRemove, '.swiper-pagination', '.elementor-swiper-button', '.elementor-document-handle'];
  }
  attachEditDocumentHandle() {
    const templateId = this.getElementSettings('template_id');
    if (!templateId) {
      return;
    }
    const elementSettings = this.getElementSettings(),
      widgetSelector = `.elementor-element-${this.getID()}`,
      editHandleSelector = elementSettings?.edit_handle_selector + ('[data-elementor-type="loop-item"]' === elementSettings?.edit_handle_selector ? `.elementor-${templateId}` : ''),
      editHandleElement = this.$element.find(editHandleSelector).first()[0];
    if (!editHandleElement) {
      return;
    }
    if (this.isFirstEdit()) {
      // TODO: refactor when CSS :has() is fully supported.
      this.$element.find('.elementor-swiper-button').remove();
      return;
    }
    (0, _documentHandle.default)({
      element: editHandleElement,
      title: __('Template', 'elementor-pro'),
      id: templateId
    }, _documentHandle.EDIT_CONTEXT, () => this.onInPlaceEditTemplate(), `${widgetSelector} .elementor-${templateId}`);
  }
  isFirstEdit() {
    return this.$element.has('.e-loop-first-edit').length;
  }
  handleCTA() {
    const emptyViewContainer = document.querySelector(`[data-id="${this.getID()}"] .e-loop-empty-view__wrapper`);
    if (!emptyViewContainer) {
      return;
    }
    const shadowRoot = emptyViewContainer.attachShadow({
      mode: 'open'
    });
    shadowRoot.appendChild(elementorPro.modules.loopBuilder.getCtaStyles());
    shadowRoot.appendChild(elementorPro.modules.loopBuilder.getCtaContent(this.getWidgetType()));
    const ctaButton = shadowRoot.querySelector('.e-loop-empty-view__box-cta');
    ctaButton.addEventListener('click', () => {
      elementorPro.modules.loopBuilder.createTemplate();
    });
  }

  /**
   * Allows 3rd party add-ons to run code on the Loop Grid handler when the handler is initialized in the Editor.
   */
  doEditorInitAction() {
    elementor.hooks.doAction('editor/widgets/loop-grid/on-init', this);
  }
  onInit() {
    super.onInit(...arguments);
    if (elementorFrontend.isEditMode()) {
      this.doEditorInitAction();
      this.attachEditDocumentHandle();
      this.handleCTA();
    }
  }
}
exports["default"] = Loop;

/***/ }),

/***/ "../modules/loop-filter/assets/js/frontend/frontend-legacy.js":
/*!********************************************************************!*\
  !*** ../modules/loop-filter/assets/js/frontend/frontend-legacy.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _taxonomyFilter = _interopRequireDefault(__webpack_require__(/*! ./handlers/taxonomy-filter */ "../modules/loop-filter/assets/js/frontend/handlers/taxonomy-filter.js"));
var _frontendModuleBase = _interopRequireDefault(__webpack_require__(/*! ./frontend-module-base */ "../modules/loop-filter/assets/js/frontend/frontend-module-base.js"));
class LoopFilter extends _frontendModuleBase.default {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('taxonomy-filter', _taxonomyFilter.default);
  }
}
exports["default"] = LoopFilter;

/***/ }),

/***/ "../modules/loop-filter/assets/js/frontend/frontend-module-base.js":
/*!*************************************************************************!*\
  !*** ../modules/loop-filter/assets/js/frontend/frontend-module-base.js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _runElementHandlers = _interopRequireDefault(__webpack_require__(/*! elementor-pro/frontend/utils/run-element-handlers */ "../assets/dev/js/frontend/utils/run-element-handlers.js"));
var _ajaxHelper = _interopRequireDefault(__webpack_require__(/*! elementor-pro/frontend/utils/ajax-helper */ "../assets/dev/js/frontend/utils/ajax-helper.js"));
var _loopWidgetsStore = _interopRequireDefault(__webpack_require__(/*! ./loop-widgets-store */ "../modules/loop-filter/assets/js/frontend/loop-widgets-store.js"));
var _queryConstants = __webpack_require__(/*! ../query-constants */ "../modules/loop-filter/assets/js/query-constants.js");
class BaseFilterFrontendModule extends elementorModules.Module {
  constructor() {
    super();
    this.loopWidgetsStore = new _loopWidgetsStore.default();
  }

  /**
   * Removes selected filter term from the filter array
   *
   * @param {string} widgetId
   * @param {string} filterId
   * @param {string} filterTerm
   * @param {string} defaultFilter
   */
  removeFilterFromLoopWidget(widgetId, filterId) {
    let filterTerm = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
    let defaultFilter = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '';
    if (!this.loopWidgetsStore.getWidget(widgetId)) {
      this.loopWidgetsStore.addWidget(widgetId);
      this.refreshLoopWidget(widgetId, filterId);
      return;
    }
    if (filterTerm === defaultFilter) {
      this.loopWidgetsStore.unsetFilter(widgetId, filterId);
    }
    if (filterTerm !== defaultFilter) {
      const filters = this.loopWidgetsStore.getFilterTerms(widgetId, filterId),
        newTerms = filters.filter(function (e) {
          return e !== filterTerm;
        });
      this.loopWidgetsStore.setFilterTerms(widgetId, filterId, newTerms);
    }
    this.refreshLoopWidget(widgetId, filterId);
  }

  /**
   * Sets the filter data for a loop widget.
   *
   * This function should trigger the following sequence:
   * 1. Update the filter data for the passed ID in the loopElements object by adding new filters to the loopWidgetsStore filters array.
   * 2. Trigger a rerender of the loop widget if refresh is true.
   * 3  Trigger a consolidation of all filters belonging to the passed loop widget ID if refresh is false.
   *   - This should create an object with filter type keys, and for each type, an object of filter IDs, which contain the filter values.
   *   - This should also remove duplicates.
   *
   * @param {string}  widgetId
   * @param {string}  filterId
   * @param {Object}  filter                     new data for this filterId in loopWidgetsStore
   * @param {boolean} refresh
   * @param {string}  multipleFiltersLogicalJoin AND / OR / 'DISABLED' for single filter (default)
   */
  setFilterDataForLoopWidget(widgetId, filterId, filter) {
    let refresh = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : true;
    let multipleFiltersLogicalJoin = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 'DISABLED';
    this.loopWidgetsStore.maybeInitializeWidget(widgetId);
    this.loopWidgetsStore.maybeInitializeFilter(widgetId, filterId);
    const logicalJoin = this.validateMultipleFilterOperator(multipleFiltersLogicalJoin);
    if ('DISABLED' !== logicalJoin) {
      const existingTerms = this.loopWidgetsStore.getFilterTerms(widgetId, filterId) ?? [],
        newTerms = filter.filterData.terms;
      filter.filterData.terms = [...new Set([...existingTerms, ...newTerms])];
      filter.filterData.logicalJoin = logicalJoin;
    }
    this.loopWidgetsStore.setFilter(widgetId, filterId, filter);
    if (refresh) {
      this.refreshLoopWidget(widgetId, filterId);
      return;
    }
    this.loopWidgetsStore.consolidateFilters(widgetId);
  }

  /**
   * Validates the operator values for wp_query.
   * @param {string} operator
   * @return {*|string} 'AND' | 'OR' | 'DISABLED'
   */
  validateMultipleFilterOperator(operator) {
    if (!operator || !['AND', 'OR'].includes(operator)) {
      return 'DISABLED';
    }
    return operator;
  }

  /**
   *
   * @return {{}} Query string in object form.
   */
  getQueryStringInObjectForm() {
    const queryString = {};
    for (const widgetId in this.loopWidgetsStore.get()) {
      const loopWidget = this.loopWidgetsStore.getWidget(widgetId);
      for (const filterType in loopWidget.consolidatedFilters) {
        const filterData = loopWidget.consolidatedFilters[filterType];
        for (const filterName in filterData) {
          const separator = _queryConstants.queryConstants[filterData[filterName].logicalJoin ?? 'AND'].separator.decoded;

          // Add an `e-` prefix to the key to avoid clashes with other query strings.
          // Filter values are arrays, to support multiple select.
          queryString[`e-filter-${widgetId}-${filterName}`] = Object.values(filterData[filterName].terms).join(separator);
        }
      }
    }
    return queryString;
  }

  /**
   * Updates the URL query string with the current filter values.
   *
   * @param {string} widgetId
   * @param {string} filterId
   */
  updateURLQueryString(widgetId, filterId) {
    const currentUrl = new URL(window.location.href),
      existingQueryString = currentUrl.searchParams,
      queryStringObject = this.getQueryStringInObjectForm(),
      updatedParams = new URLSearchParams();
    existingQueryString.forEach((value, key) => {
      if (!key.startsWith('e-filter')) {
        updatedParams.append(key, value);
      }
      if (key.startsWith('e-page-' + widgetId)) {
        updatedParams.delete(key);
      }
    });
    for (const key in queryStringObject) {
      updatedParams.set(key, queryStringObject[key]);
    }
    let queryString = updatedParams.toString();
    queryString = queryString.replace(new RegExp(`${_queryConstants.queryConstants.AND.separator.encoded}`, 'g'), _queryConstants.queryConstants.AND.separator.decoded);
    queryString = queryString.replace(new RegExp(`${_queryConstants.queryConstants.OR.separator.encoded}`, 'g'), _queryConstants.queryConstants.OR.separator.decoded);
    const helpers = this.getFilterHelperAttributes(filterId);
    if (helpers.pageNum > 1) {
      queryString = queryString ? this.formatQueryString(helpers.baseUrl, queryString) : helpers.baseUrl;
    } else {
      queryString = queryString ? `?${queryString}` : location.pathname;
    }
    history.pushState(null, null, queryString);
  }

  /**
   * Formats the query string to remove any duplicate parameters.
   *
   * @param {string} baseURL
   * @param {string} queryString
   * @return {*} deduplicated query string
   */
  formatQueryString(baseURL, queryString) {
    const baseURLParams = baseURL.includes('?') ? new URLSearchParams(baseURL.split('?')[1]) : new URLSearchParams(),
      inputParams = new URLSearchParams(queryString);
    for (const param of baseURLParams.keys()) {
      if (inputParams.has(param)) {
        inputParams.delete(param);
      }
    }
    const excludedVariables = ['page', 'paged'];
    for (const excludedVar of excludedVariables) {
      baseURLParams.delete(excludedVar);
      inputParams.delete(excludedVar);
    }
    const mergedParams = new URLSearchParams(baseURLParams.toString());
    for (const [param, value] of inputParams.entries()) {
      mergedParams.append(param, value);
    }
    const baseURLString = baseURL.split('?')[0],
      mergedParamsString = mergedParams.toString() ? `?${mergedParams.toString()}` : '';
    return baseURLString + mergedParamsString;
  }

  /**
   *
   * @param {string} filterId
   * @return {{baseUrl: string, pageNum: number}|*|DOMStringMap} Base URL and page number for the loop widget.
   */
  getFilterHelperAttributes(filterId) {
    const filterWidget = document.querySelector('[data-id="' + filterId + '"]');
    if (!filterWidget) {
      return {
        baseUrl: location.href,
        pageNum: 1
      };
    }
    const filterBar = filterWidget.querySelector('.e-filter');
    return filterBar.dataset;
  }

  /**
   * Prepares the data to be sent to the server for the loop widget update.
   *
   * @param {string} widgetId
   * @param {string} filterId
   * @return {{post_id: (*|number), widget_id, pagination_base_url: string, widget_filters: *}} data for loop update
   */
  prepareLoopUpdateRequestData(widgetId, filterId) {
    const widgetFilters = this.loopWidgetsStore.getConsolidatedFilters(widgetId),
      helpers = this.getFilterHelperAttributes(filterId);
    const data = {
      post_id: elementorFrontend.config.post.id || this.getClosestDataElementorId(document.querySelector(`.elementor-element-${widgetId}`)),
      widget_filters: widgetFilters,
      widget_id: widgetId,
      pagination_base_url: helpers.baseUrl
    };
    if (elementorFrontend.isEditMode()) {
      // In the editor, we have to support loop widgets that have been created but not saved to the database yet.
      const widgetContainer = window.top.$e.components.get('document').utils.findContainerById(widgetId);
      data.widget_model = widgetContainer.model.toJSON({
        remove: ['default', 'editSettings', 'defaultEditSettings']
      });
      data.is_edit_mode = true;
    }
    return data;
  }

  /**
   * Returns the closest data-elementor-id attribute value.
   *
   * @param {Object} element
   * @return {string} elementor id of parent
   */
  getClosestDataElementorId(element) {
    const closestParent = element.closest('[data-elementor-id]');
    return closestParent ? closestParent.getAttribute('data-elementor-id') : 0;
  }

  /**
   *
   * @param {string} widgetId
   * @param {string} filterId
   * @return {{headers: {"Content-Type": string}, method: string, body: string}} Fetch arguments for loop Widget update
   */
  getFetchArgumentsForLoopUpdate(widgetId, filterId) {
    const data = this.prepareLoopUpdateRequestData(widgetId, filterId);
    const args = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    };
    if (elementorFrontend.isEditMode() && !!elementorPro.config.loopFilter?.nonce) {
      args.headers['X-WP-Nonce'] = elementorPro.config.loopFilter?.nonce;
    }
    return args;
  }

  /**
   * Fetches the updated loop widget markup from the server.
   *
   * @param {string} widgetId
   * @param {string} filterId
   * @return {Promise<Response>} Promise for the fetch request.
   */
  fetchUpdatedLoopWidgetMarkup(widgetId, filterId) {
    return fetch(`${elementorProFrontend.config.urls.rest}elementor-pro/v1/refresh-loop`, this.getFetchArgumentsForLoopUpdate(widgetId, filterId));
  }
  createElementFromHTMLString(widgetContainerHTMLString) {
    const div = document.createElement('div');
    if (!widgetContainerHTMLString) {
      div.classList.add('elementor-widget-container');
      return div;
    }
    div.innerHTML = widgetContainerHTMLString.trim();
    return div.firstElementChild;
  }
  refreshLoopWidget(widgetId, filterId) {
    this.loopWidgetsStore.consolidateFilters(widgetId);
    this.updateURLQueryString(widgetId, filterId);
    const widget = document.querySelector(`.elementor-element-${widgetId}`);
    if (!widget) {
      return;
    }
    if (!this.ajaxHelper) {
      this.ajaxHelper = new _ajaxHelper.default();
    }
    this.ajaxHelper.addLoadingAnimationOverlay(widgetId);
    const fetchUpdatedLoopWidgetMarkup = this.fetchUpdatedLoopWidgetMarkup(widgetId, filterId).then(response => {
      if (!(response instanceof Response) || !response?.ok || 400 <= response?.status) {
        return {};
      }
      return response.json();
    })
    // eslint-disable-next-line @typescript-eslint/no-unused-vars
    .catch(error => {
      return {};
    }).then(response => {
      if (!response?.data && '' !== response?.data) {
        return;
      }
      const existingWidgetContainer = widget.querySelector('.elementor-widget-container'),
        newWidgetContainer = this.createElementFromHTMLString(response.data);
      widget.replaceChild(newWidgetContainer, existingWidgetContainer);
      this.handleElementHandlers(newWidgetContainer);
      elementorFrontend.elementsHandler.runReadyTrigger(document.querySelector(`.elementor-element-${widgetId}`));
      widget.classList.remove('e-loading');
    }).finally(() => {
      this.ajaxHelper.removeLoadingAnimationOverlay(widgetId);
    });
    return fetchUpdatedLoopWidgetMarkup;

    // TODO: Deal with pagination. Do we need to manually add the query string to the pagination links?
  }

  handleElementHandlers(newWidgetMarkup) {
    const loopItems = newWidgetMarkup.querySelectorAll('.e-loop-item');
    (0, _runElementHandlers.default)(loopItems);
  }
}
exports["default"] = BaseFilterFrontendModule;

/***/ }),

/***/ "../modules/loop-filter/assets/js/frontend/handlers/taxonomy-filter.js":
/*!*****************************************************************************!*\
  !*** ../modules/loop-filter/assets/js/frontend/handlers/taxonomy-filter.js ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _flexHorizontalScroll = __webpack_require__(/*! elementor-pro/frontend/utils/flex-horizontal-scroll */ "../assets/dev/js/frontend/utils/flex-horizontal-scroll.js");
var _queryConstants = __webpack_require__(/*! ../../query-constants */ "../modules/loop-filter/assets/js/query-constants.js");
class TaxonomyFilter extends elementorModules.frontend.handlers.Base {
  constructor() {
    super(...arguments);
    this.resizeListenerNestedTabs = null;
  }

  /**
   *
   * @return {{filterValues: {default: string}, selectors: {container: string, item: string}}} Default Settings
   */
  getDefaultSettings() {
    return {
      selectors: {
        item: '.e-filter-item',
        container: '.e-filter'
      },
      filterValues: {
        default: '__all'
      }
    };
  }

  /**
   *
   * @return {{$filterButtons: *, $container: *}} Default Elements
   */
  getDefaultElements() {
    return {
      $filterButtons: this.$element.find(this.getSettings('selectors.item')),
      $container: this.$element.find(this.getSettings('selectors.container'))
    };
  }
  getHeadingEvents() {
    const container = this.elements.$container[0];
    return {
      mousedown: _flexHorizontalScroll.changeScrollStatus.bind(this, container),
      mouseup: _flexHorizontalScroll.changeScrollStatus.bind(this, container),
      mouseleave: _flexHorizontalScroll.changeScrollStatus.bind(this, container),
      mousemove: _flexHorizontalScroll.setHorizontalTitleScrollValues.bind(this, container, this.getHorizontalScrollSetting())
    };
  }
  bindEvents() {
    this.elements.$filterButtons.on('click', this.onFilterButtonClick.bind(this));
    this.elements.$container.on(this.getHeadingEvents());
    const settingsObject = {
      element: this.elements.$container[0],
      direction: this.getItemsAlignment(),
      justifyCSSVariable: '--e-filter-justify-content',
      horizontalScrollStatus: this.getHorizontalScrollSetting()
    };
    this.resizeListenerNestedTabs = _flexHorizontalScroll.setHorizontalScrollAlignment.bind(this, settingsObject);
    elementorFrontend.elements.$window.on('resize', this.resizeListenerNestedTabs);
  }

  /**
   *
   * @param {string} propertyName
   */
  onElementChange(propertyName) {
    if (this.checkSliderPropsToWatch(propertyName)) {
      const settingsObject = {
        element: this.elements.$container[0],
        direction: this.getItemsAlignment(),
        justifyCSSVariable: '--e-filter-justify-content',
        horizontalScrollStatus: this.getHorizontalScrollSetting()
      };
      (0, _flexHorizontalScroll.setHorizontalScrollAlignment)(settingsObject);
    }
  }

  /**
   *
   * @param {string} propertyName
   * @return {boolean} Is slider property
   */
  checkSliderPropsToWatch(propertyName) {
    return 0 === propertyName.indexOf('horizontal_scroll') || 0 === propertyName.indexOf('item_alignment_horizontal');
  }

  /**
   * Get the filter buttons elements.
   *
   * If the filter buttons weren't rendered when the handler was initialized, this method will cache the filter
   * button elements and add the necessary event listeners.
   *
   * @return {*} jQuery collection of filter button elements. Might be empty.
   */
  getFilterButtonElements() {
    if (this.elements?.$filterButtons.length) {
      return this.elements.$filterButtons;
    }
    this.elements = this.getDefaultElements();
    this.bindEvents();
    return this.elements.$filterButtons;
  }

  /**
   * Get the active filter buttons elements.
   *
   * @return {*} jQuery collection of the active filter button elements. Might be empty.
   */
  getActiveFilterButtonElements() {
    return this.getFilterButtonElements().filter('[aria-pressed="true"]');
  }

  /**
   *
   * @param {string} selectedTermSlug
   */
  activateFilterButton(selectedTermSlug) {
    const $filterButtons = this.getFilterButtonElements(),
      multipleSelectionActive = 'yes' === this.getElementSettings('multiple_selection');
    if (!$filterButtons.length) {
      return;
    }
    const defaultFilter = this.getSettings('filterValues.default');
    if (!multipleSelectionActive || defaultFilter === selectedTermSlug) {
      $filterButtons.attr('aria-pressed', false);
    }
    const $activeButton = $filterButtons.filter('[data-filter="' + selectedTermSlug + '"]');
    $activeButton.attr('aria-pressed', true);
    const activeFiltersButtons = this.getCurrentlyActiveFilter();
    if (activeFiltersButtons && activeFiltersButtons.includes(defaultFilter) && defaultFilter !== selectedTermSlug) {
      this.deactivateDefaultFilterButton($filterButtons);
    }
  }

  /**
   *
   * @param {string} clickedFilter
   */
  deactivateFilterButton(clickedFilter) {
    const $filterButtons = this.getFilterButtonElements(),
      multipleSelectionActive = 'yes' === this.getElementSettings('multiple_selection');
    if (!$filterButtons.length) {
      return;
    }
    const $activeButton = $filterButtons.filter('[data-filter="' + clickedFilter + '"]'),
      defaultFilter = this.getSettings('filterValues.default'),
      currentlyActiveButtons = this.getCurrentlyActiveFilter(),
      isActivateDefaultFilterButtonNeeded = !multipleSelectionActive || !currentlyActiveButtons.includes(defaultFilter) && 1 === currentlyActiveButtons.length;
    $activeButton.attr('aria-pressed', false);
    if (isActivateDefaultFilterButtonNeeded) {
      this.activateDefaultFilterButton();
    }
    elementorProFrontend.modules.taxonomyFilter.removeFilterFromLoopWidget(this.getElementSettings('selected_element'), this.getID(), clickedFilter, defaultFilter);
  }
  activateDefaultFilterButton() {
    const $filterButtons = this.getFilterButtonElements(),
      $defaultButton = $filterButtons.filter('[data-filter="' + this.getSettings('filterValues.default') + '"]');
    $filterButtons.attr('aria-pressed', false);
    $defaultButton.attr('aria-pressed', true);
  }
  deactivateDefaultFilterButton() {
    const $filterButtons = this.getFilterButtonElements();
    const $defaultButton = $filterButtons.filter('[data-filter="' + this.getSettings('filterValues.default') + '"]');
    $defaultButton.attr('aria-pressed', false);
  }

  /**
   * Gets the currently active buttons independent of URL params.
   * @return {Array} Currently active filter(s).
   */
  getCurrentlyActiveFilter() {
    const $activeFilterButtons = this.getActiveFilterButtonElements(),
      currentlyActiveFilterButtons = [];
    for (let i = 0; i < $activeFilterButtons.length; i++) {
      currentlyActiveFilterButtons.push($activeFilterButtons[i].dataset.filter);
    }
    return currentlyActiveFilterButtons;
  }

  /**
   * Get the filter operator for WP_Query. OR is translated IN.
   * @return {string} 'IN' or 'AND' for WP_Query or DISABLED for single selection.
   */
  getFilterOperator() {
    const elementSettings = this.getElementSettings(),
      multipleSelection = elementSettings.multiple_selection;
    if (!multipleSelection || !['AND', 'OR'].includes(elementSettings.logical_combination)) {
      return 'DISABLED';
    }
    return elementSettings.logical_combination;
  }

  /**
   *
   * @param {string} selectedTermSlug - Slug of currently selected term relating to last clicked button
   */
  filterItems(selectedTermSlug) {
    const elementSettings = this.getElementSettings(),
      defaultFilterValue = this.getSettings('filterValues.default');
    if (defaultFilterValue === selectedTermSlug) {
      elementorProFrontend.modules.taxonomyFilter.removeFilterFromLoopWidget(elementSettings.selected_element, this.getID(), selectedTermSlug, defaultFilterValue);
      return;
    }
    const multipleSelectionLogicalJoin = this.getFilterOperator();
    elementorProFrontend.modules.taxonomyFilter.setFilterDataForLoopWidget(elementSettings.selected_element, this.getID(), {
      filterType: 'taxonomy',
      filterData: {
        selectedTaxonomy: elementSettings.taxonomy,
        terms: [selectedTermSlug]
      }
    }, true, multipleSelectionLogicalJoin);
  }

  /**
   *
   * @param {string} filter
   */
  setFilter() {
    let filter = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : this.getSettings('filterValues.default');
    this.filterItems(filter);
    this.activateFilterButton(filter);
  }
  onFilterButtonClick(event) {
    this.removePaginationHiddenClassOnLoopWidgetContainer();
    const currentlyActiveFilterButtons = this.getCurrentlyActiveFilter(),
      clickedFilter = event.currentTarget?.dataset?.filter;
    if (this.userClickedOnAllWhileItWasActive(clickedFilter, currentlyActiveFilterButtons)) {
      return;
    }
    if (currentlyActiveFilterButtons.includes(clickedFilter)) {
      this.deactivateFilterButton(clickedFilter);
      return;
    }
    this.setFilter(clickedFilter);
  }
  removePaginationHiddenClassOnLoopWidgetContainer() {
    const elementSettings = this.getElementSettings(),
      loopWidget = document.querySelector('.elementor-element-' + elementSettings.selected_element);
    if (loopWidget) {
      loopWidget.classList.remove('e-load-more-pagination-end');
    }
  }

  /**
   *
   * @param {string} clickedFilter
   * @param {Array}  currentlyActiveFilter
   * @return {boolean} User clicked on all while it was active.
   */
  userClickedOnAllWhileItWasActive(clickedFilter, currentlyActiveFilter) {
    return currentlyActiveFilter.includes(clickedFilter) && clickedFilter === this.getSettings('filterValues.default');
  }
  onDestroy() {
    const selectedElementId = this.getElementSettings('selected_element'),
      selectedTaxonomy = this.getElementSettings('taxonomy'),
      filterId = this.getID();
    if (selectedElementId && selectedTaxonomy) {
      elementorProFrontend.modules.taxonomyFilter.removeFilterFromLoopWidget(selectedElementId, filterId, '');
    }
    super.onDestroy();
  }
  populateLoopWidgetsStoreOnInitialPageLoad() {
    const elementSettings = this.getElementSettings(),
      urlParams = new URLSearchParams(window.location.search);
    let selectedTermSlugs = urlParams.get('e-filter-' + elementSettings.selected_element + '-' + elementSettings.taxonomy);
    if (selectedTermSlugs) {
      // Avoid null values in elementSettings.taxonomy when multiple taxonomies deselected to trigger all (Default) state.
      selectedTermSlugs = this.getTermsFromParams(selectedTermSlugs);
      const multipleSelectionLogicalJoin = this.getFilterOperator();
      elementorProFrontend.modules.taxonomyFilter.setFilterDataForLoopWidget(elementSettings.selected_element, this.getID(), {
        filterType: 'taxonomy',
        filterData: {
          selectedTaxonomy: elementSettings.taxonomy,
          terms: selectedTermSlugs
        }
      }, false, multipleSelectionLogicalJoin);
    }
  }
  getTermsFromParams(params) {
    let separator = _queryConstants.queryConstants.AND.separator.fromBrowser; // The web browser automatically replaces the plus sign with a space character before sending the data to the server.

    if (params.includes(_queryConstants.queryConstants.OR.separator.fromBrowser)) {
      separator = _queryConstants.queryConstants.OR.separator.fromBrowser;
    }
    return params.split(separator);
  }
  onInit() {
    super.onInit();
    this.populateLoopWidgetsStoreOnInitialPageLoad();
    const settingsObject = {
      element: this.elements.$container[0],
      direction: this.getItemsAlignment(),
      justifyCSSVariable: '--e-filter-justify-content',
      horizontalScrollStatus: this.getHorizontalScrollSetting()
    };
    (0, _flexHorizontalScroll.setHorizontalScrollAlignment)(settingsObject);
  }
  getHorizontalScrollSetting() {
    const currentDevice = elementorFrontend.getCurrentDeviceMode();
    return elementorFrontend.utils.controls.getResponsiveControlValue(this.getElementSettings(), 'horizontal_scroll', '', currentDevice);
  }
  getItemsAlignment() {
    const currentDevice = elementorFrontend.getCurrentDeviceMode();
    return elementorFrontend.utils.controls.getResponsiveControlValue(this.getElementSettings(), 'item_alignment_horizontal', '', currentDevice);
  }
}
exports["default"] = TaxonomyFilter;

/***/ }),

/***/ "../modules/loop-filter/assets/js/frontend/loop-widgets-store.js":
/*!***********************************************************************!*\
  !*** ../modules/loop-filter/assets/js/frontend/loop-widgets-store.js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class LoopWidgetsStore {
  constructor() {
    this.widgets = {};
  }
  get() {
    return this.widgets;
  }
  getWidget(widgetId) {
    return this.widgets[widgetId];
  }
  setWidget(widgetId, widget) {
    this.widgets[widgetId] = widget;
  }
  unsetWidget(widgetId) {
    delete this.widgets[widgetId];
  }
  getFilters(widgetId) {
    return this.getWidget(widgetId).filters;
  }
  getFilter(widgetId, filterId) {
    return this.getWidget(widgetId).filters[filterId];
  }
  setFilter(widgetId, filterId, filterData) {
    this.getWidget(widgetId).filters[filterId] = filterData;
  }
  unsetFilter(widgetId, filterId) {
    delete this.getWidget(widgetId).filters[filterId];
  }
  getFilterTerms(widgetId, filterId) {
    return this.getFilter(widgetId, filterId).filterData.terms ?? [];
  }
  setFilterTerms(widgetId, filterId, termData) {
    this.getFilter(widgetId, filterId).filterData.terms = termData;
  }
  getConsolidatedFilters(widgetId) {
    return this.getWidget(widgetId).consolidatedFilters;
  }
  setConsolidatedFilters(widgetId, consolidatedFilters) {
    this.getWidget(widgetId).consolidatedFilters = consolidatedFilters;
  }

  /**
   *
   * @param {string} widgetId
   */
  addWidget(widgetId) {
    const newWidget = {
      filters: {},
      consolidatedFilters: {}
    };
    this.setWidget(widgetId, newWidget);
  }
  maybeInitializeWidget(widgetId) {
    if (!!this.getWidget(widgetId)) {
      return;
    }
    this.addWidget(widgetId);
  }
  maybeInitializeFilter(widgetId, filterId) {
    if (!!this.getFilter(widgetId, filterId)) {
      return;
    }
    const newFilter = {
      filterData: {
        terms: []
      }
    };
    this.setFilter(widgetId, filterId, newFilter);
  }

  /**
   * Consolidates all filters for a loop widget.
   *
   * filters: {
   * 	filter1: { filterType: 'type1', filterData: { selectedTaxonomy: 'taxonomy1', terms: [ 'term1', 'term2' ] } },
   * 	filter2: { filterType: 'type1', filterData: { selectedTaxonomy: 'taxonomy1', terms: [ 'term2' ] } },
   * },
   * consolidatedFilters: {},
   *
   * @param {string} widgetId
   */
  consolidateFilters(widgetId) {
    const loopWidgetFilters = this.getFilters(widgetId),
      consolidatedFilters = {};
    for (const filterId in loopWidgetFilters) {
      const filter = loopWidgetFilters[filterId],
        filterType = filter.filterType,
        filterData = filter.filterData;
      if (0 === filterData.terms.length) {
        continue;
      }

      // This part is non-generic. To expand this functionality to other filter types, we'll need to refactor and
      // generalize this part.
      if (!consolidatedFilters[filterType]) {
        consolidatedFilters[filterType] = {};
      }
      if (!consolidatedFilters[filterType][filterData.selectedTaxonomy]) {
        consolidatedFilters[filterType][filterData.selectedTaxonomy] = [];
      }
      if (filterData.terms && (!consolidatedFilters[filterType][filterData.selectedTaxonomy].terms || !consolidatedFilters[filterType][filterData.selectedTaxonomy].terms.includes(filterData.terms))) {
        consolidatedFilters[filterType][filterData.selectedTaxonomy] = {
          terms: filterData.terms === typeof 'string' ? [filterData.terms] : filterData.terms
        };
      }
      if (filterData.logicalJoin && !consolidatedFilters[filterType][filterData.selectedTaxonomy].logicalJoin) {
        consolidatedFilters[filterType][filterData.selectedTaxonomy] = {
          ...(consolidatedFilters[filterType][filterData.selectedTaxonomy] || {}),
          // Check for undefined
          logicalJoin: filterData.logicalJoin ?? 'AND'
        };
      }
    }
    this.setConsolidatedFilters(widgetId, consolidatedFilters);
  }
}
exports["default"] = LoopWidgetsStore;

/***/ }),

/***/ "../modules/loop-filter/assets/js/query-constants.js":
/*!***********************************************************!*\
  !*** ../modules/loop-filter/assets/js/query-constants.js ***!
  \***********************************************************/
/***/ ((module) => {

"use strict";


const queryConstants = {
  AND: {
    separator: {
      decoded: '+',
      fromBrowser: ' ',
      encoded: '%2B'
    },
    operator: 'AND'
  },
  OR: {
    separator: {
      decoded: '~',
      fromBrowser: '~',
      encoded: '%7C'
    },
    operator: 'IN'
  },
  NOT: {
    separator: {
      decoded: '!',
      fromBrowser: '!',
      encoded: '%21'
    },
    operator: 'NOT IN'
  },
  DISABLED: {
    separator: {
      decoded: '',
      fromBrowser: '',
      encoded: ''
    },
    operator: 'AND'
  }
};
module.exports = {
  queryConstants
};

/***/ }),

/***/ "../modules/lottie/assets/js/frontend/frontend-legacy.js":
/*!***************************************************************!*\
  !*** ../modules/lottie/assets/js/frontend/frontend-legacy.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _handler = _interopRequireDefault(__webpack_require__(/*! ./handler */ "../modules/lottie/assets/js/frontend/handler.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('lottie', _handler.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/lottie/assets/js/frontend/handler.js":
/*!*******************************************************!*\
  !*** ../modules/lottie/assets/js/frontend/handler.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class lottieHandler extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        container: '.e-lottie__container',
        containerLink: '.e-lottie__container__link',
        animation: '.e-lottie__animation',
        caption: '.e-lottie__caption'
      },
      classes: {
        caption: 'e-lottie__caption'
      }
    };
  }
  getDefaultElements() {
    const {
      selectors
    } = this.getSettings();
    return {
      $widgetWrapper: this.$element,
      $container: this.$element.find(selectors.container),
      $containerLink: this.$element.find(selectors.containerLink),
      $animation: this.$element.find(selectors.animation),
      $caption: this.$element.find(selectors.caption),
      $sectionParent: this.$element.closest('.elementor-section'),
      $columnParent: this.$element.closest('.elementor-column'),
      $containerParent: this.$element.closest('.e-con')
    };
  }
  onInit() {
    super.onInit(...arguments);
    this.lottie = null;
    this.state = {
      isAnimationScrollUpdateNeededOnFirstLoad: true,
      isNewLoopCycle: false,
      isInViewport: false,
      loop: false,
      animationDirection: 'forward',
      currentAnimationTrigger: '',
      effectsRelativeTo: '',
      hoverOutMode: '',
      hoverArea: '',
      caption: '',
      playAnimationCount: 0,
      animationSpeed: 0,
      linkTimeout: 0,
      viewportOffset: {
        start: 0,
        end: 100
      }
    };
    this.intersectionObservers = {
      animation: {
        observer: null,
        element: null
      },
      lazyload: {
        observer: null,
        element: null
      }
    };
    this.animationFrameRequest = {
      timer: null,
      lastScrollY: 0
    };
    this.listeners = {
      collection: [],
      elements: {
        $widgetArea: {
          triggerAnimationHoverIn: null,
          triggerAnimationHoverOut: null
        },
        $container: {
          triggerAnimationClick: null
        }
      }
    };
    this.initLottie();
  }
  initLottie() {
    const lottieSettings = this.getLottieSettings();
    if (lottieSettings.lazyload) {
      this.lazyloadLottie();
    } else {
      this.generateLottie();
    }
  }
  lazyloadLottie() {
    const bufferHeightBeforeTriggerLottie = 200;
    this.intersectionObservers.lazyload.observer = elementorModules.utils.Scroll.scrollObserver({
      offset: `0px 0px ${bufferHeightBeforeTriggerLottie}px`,
      callback: event => {
        if (event.isInViewport) {
          this.generateLottie();
          this.intersectionObservers.lazyload.observer.unobserve(this.intersectionObservers.lazyload.element);
        }
      }
    });
    this.intersectionObservers.lazyload.element = this.elements.$container[0];
    this.intersectionObservers.lazyload.observer.observe(this.intersectionObservers.lazyload.element);
  }
  generateLottie() {
    this.createLottieInstance();
    this.setLottieEvents();
  }
  createLottieInstance() {
    const lottieSettings = this.getLottieSettings();
    this.lottie = bodymovin.loadAnimation({
      container: this.elements.$animation[0],
      path: this.getAnimationPath(),
      renderer: lottieSettings.renderer,
      autoplay: false,
      // We always want to trigger the animation manually for considering start/end frame.
      name: 'lottie-widget'
    });

    // Expose the lottie instance in the frontend.
    this.elements.$animation.data('lottie', this.lottie);
  }
  getAnimationPath() {
    const lottieSettings = this.getLottieSettings();
    if (lottieSettings.source_json?.url && 'json' === lottieSettings.source_json.url.toLowerCase().substr(-4)) {
      return lottieSettings.source_json.url;
    } else if (lottieSettings.source_external_url?.url) {
      return lottieSettings.source_external_url.url;
    }

    // Default animation path.
    return elementorProFrontend.config.lottie.defaultAnimationUrl;
  }
  setCaption() {
    const lottieSettings = this.getLottieSettings();
    if ('external_url' === lottieSettings.source || 'media_file' === lottieSettings.source && 'custom' === lottieSettings.caption_source) {
      const $captionElement = this.getCaptionElement();
      $captionElement.text(lottieSettings.caption);
    }
  }
  getCaptionElement() {
    if (!this.elements.$caption.length) {
      const {
        classes
      } = this.getSettings();
      this.elements.$caption = jQuery('<p>', {
        class: classes.caption
      });
      this.elements.$container.append(this.elements.$caption);
      return this.elements.$caption;
    }
    return this.elements.$caption;
  }
  setLottieEvents() {
    this.lottie.addEventListener('DOMLoaded', () => this.onLottieDomLoaded());
    this.lottie.addEventListener('complete', () => this.onComplete());
  }
  saveInitialValues() {
    const lottieSettings = this.getLottieSettings();

    /*
    These values of the animation are being changed during the animation runtime
    and saved in the lottie instance (and not in the state) for the instance expose in the frontend.
     */
    this.lottie.__initialTotalFrames = this.lottie.totalFrames;
    this.lottie.__initialFirstFrame = this.lottie.firstFrame;
    this.state.currentAnimationTrigger = lottieSettings.trigger;
    this.state.effectsRelativeTo = lottieSettings.effects_relative_to;
    this.state.viewportOffset.start = lottieSettings.viewport ? lottieSettings.viewport.sizes.start : 0;
    this.state.viewportOffset.end = lottieSettings.viewport ? lottieSettings.viewport.sizes.end : 100;
    this.state.animationSpeed = lottieSettings.play_speed?.size;
    this.state.linkTimeout = lottieSettings.link_timeout;
    this.state.caption = lottieSettings.caption;
    this.state.loop = lottieSettings.loop;
  }
  setAnimationFirstFrame() {
    const frame = this.getAnimationFrames();

    /*
    We need to subtract the initial first frame from the first frame for handling scenarios
    when the animation first frame is not 0, this way we always get the relevant first frame.
    example: when start point is 70 and initial first frame is 60, the animation should start at 10.
     */
    frame.first = frame.first - this.lottie.__initialFirstFrame;
    this.lottie.goToAndStop(frame.first, true);
  }
  initAnimationTrigger() {
    const lottieSettings = this.getLottieSettings();
    switch (lottieSettings.trigger) {
      case 'none':
        this.playLottie();
        break;
      case 'arriving_to_viewport':
        this.playAnimationWhenArrivingToViewport();
        break;
      case 'bind_to_scroll':
        this.playAnimationWhenBindToScroll();
        break;
      case 'on_click':
        this.bindAnimationClickEvents();
        break;
      case 'on_hover':
        this.bindAnimationHoverEvents();
        break;
    }
  }
  playAnimationWhenArrivingToViewport() {
    const offset = this.getOffset();
    this.intersectionObservers.animation.observer = elementorModules.utils.Scroll.scrollObserver({
      offset: `${offset.end}% 0% ${offset.start}%`,
      callback: event => {
        if (event.isInViewport) {
          this.state.isInViewport = true;
          this.playLottie();
        } else {
          this.state.isInViewport = false;
          this.lottie.pause();
        }
      }
    });
    this.intersectionObservers.animation.element = this.elements.$widgetWrapper[0];
    this.intersectionObservers.animation.observer.observe(this.intersectionObservers.animation.element);
  }
  getOffset() {
    const lottieSettings = this.getLottieSettings(),
      start = -lottieSettings.viewport.sizes.start || 0,
      end = -(100 - lottieSettings.viewport.sizes.end) || 0;
    return {
      start,
      end
    };
  }
  playAnimationWhenBindToScroll() {
    const lottieSettings = this.getLottieSettings(),
      offset = this.getOffset();

    // Generate scroll detection by Intersection Observer API
    this.intersectionObservers.animation.observer = elementorModules.utils.Scroll.scrollObserver({
      offset: `${offset.end}% 0% ${offset.start}%`,
      callback: event => this.onLottieIntersection(event)
    });
    this.intersectionObservers.animation.element = 'viewport' === lottieSettings.effects_relative_to ? this.elements.$widgetWrapper[0] : document.documentElement;
    this.intersectionObservers.animation.observer.observe(this.intersectionObservers.animation.element);
  }
  updateAnimationByScrollPosition() {
    const lottieSettings = this.getLottieSettings();
    let percentage;
    if ('page' === lottieSettings.effects_relative_to) {
      percentage = this.getLottiePagePercentage();
    } else if ('fixed' === this.getCurrentDeviceSetting('_position')) {
      percentage = this.getLottieViewportHeightPercentage();
    } else {
      percentage = this.getLottieViewportPercentage();
    }
    let nextFrameToPlay = this.getFrameNumberByPercent(percentage);
    nextFrameToPlay = nextFrameToPlay - this.lottie.__initialFirstFrame;
    this.lottie.goToAndStop(nextFrameToPlay, true);
  }
  getLottieViewportPercentage() {
    return elementorModules.utils.Scroll.getElementViewportPercentage(this.elements.$widgetWrapper, this.getOffset());
  }
  getLottiePagePercentage() {
    return elementorModules.utils.Scroll.getPageScrollPercentage(this.getOffset());
  }
  getLottieViewportHeightPercentage() {
    return elementorModules.utils.Scroll.getPageScrollPercentage(this.getOffset(), window.innerHeight);
  }

  /**
   * @param {number} percent - Percent value between 0-100
   */
  getFrameNumberByPercent(percent) {
    const frame = this.getAnimationFrames();

    /*
    In mobile devices the document height can be 'stretched' at the top and bottom points of the document,
    this 'stretched' will make percent to be either negative or larger than 100, therefore we need to limit percent between 0-100.
    */
    percent = Math.min(100, Math.max(0, percent));

    // Getting frame number by percent of range, considering start/end frame values if exist.
    return frame.first + (frame.last - frame.first) * percent / 100;
  }
  getAnimationFrames() {
    const lottieSettings = this.getLottieSettings(),
      currentFrame = this.getAnimationCurrentFrame(),
      startPoint = this.getAnimationRange().start,
      endPoint = this.getAnimationRange().end;
    let firstFrame = this.lottie.__initialFirstFrame,
      lastFrame = 0 === this.lottie.__initialFirstFrame ? this.lottie.__initialTotalFrames : this.lottie.__initialFirstFrame + this.lottie.__initialTotalFrames;

    // Limiting min start point to animation first frame.
    if (startPoint && startPoint > firstFrame) {
      firstFrame = startPoint;
    }

    // Limiting max end point to animation last frame.
    if (endPoint && endPoint < lastFrame) {
      lastFrame = endPoint;
    }

    /*
    Getting the relevant first frame after loop complete and when not bind to scroll.
    when the animation is in progress (no when a new loop start), the first frame should be the current frame.
    when the trigger is bind_to_scroll we DON'T need to get this functionality.
    */
    if (!this.state.isNewLoopCycle && 'bind_to_scroll' !== lottieSettings.trigger) {
      // When we have a custom start point, we need to check if the start point is larger than the last pause stop of the animation.
      firstFrame = startPoint && startPoint > currentFrame ? startPoint : currentFrame;
    }

    // Reverse Mode.
    if ('backward' === this.state.animationDirection && this.isReverseMode()) {
      firstFrame = currentFrame;
      lastFrame = startPoint && startPoint > this.lottie.__initialFirstFrame ? startPoint : this.lottie.__initialFirstFrame;
    }
    return {
      first: firstFrame,
      last: lastFrame,
      current: currentFrame,
      total: this.lottie.__initialTotalFrames
    };
  }
  getAnimationRange() {
    const lottieSettings = this.getLottieSettings();
    return {
      start: this.getInitialFrameNumberByPercent(lottieSettings.start_point.size),
      end: this.getInitialFrameNumberByPercent(lottieSettings.end_point.size)
    };
  }
  getInitialFrameNumberByPercent(percent) {
    percent = Math.min(100, Math.max(0, percent));
    return this.lottie.__initialFirstFrame + (this.lottie.__initialTotalFrames - this.lottie.__initialFirstFrame) * percent / 100;
  }
  getAnimationCurrentFrame() {
    // When pausing the animation (when out of viewport) the first frame of the animation changes.
    return 0 === this.lottie.firstFrame ? this.lottie.currentFrame : this.lottie.firstFrame + this.lottie.currentFrame;
  }
  setLinkTimeout() {
    const lottieSettings = this.getLottieSettings();
    if ('on_click' === lottieSettings.trigger && lottieSettings.custom_link?.url && lottieSettings.link_timeout) {
      this.elements.$containerLink.on('click', event => {
        event.preventDefault();
        if (!this.isEdit) {
          setTimeout(() => {
            const tabTarget = 'on' === lottieSettings.custom_link.is_external ? '_blank' : '_self';
            window.open(lottieSettings.custom_link.url, tabTarget);
          }, lottieSettings.link_timeout);
        }
      });
    }
  }
  bindAnimationClickEvents() {
    this.listeners.elements.$container.triggerAnimationClick = () => {
      this.playLottie();
    };
    this.addSessionEventListener(this.elements.$container, 'click', this.listeners.elements.$container.triggerAnimationClick);
  }
  getLottieSettings() {
    const lottieSettings = this.getElementSettings();
    return {
      ...lottieSettings,
      lazyload: 'yes' === lottieSettings.lazyload,
      loop: 'yes' === lottieSettings.loop
    };
  }
  playLottie() {
    const frame = this.getAnimationFrames();
    this.lottie.stop();
    this.lottie.playSegments([frame.first, frame.last], true);

    // We reset the loop cycle state after playing the animation.
    this.state.isNewLoopCycle = false;
  }
  bindAnimationHoverEvents() {
    this.createAnimationHoverInEvents();
    this.createAnimationHoverOutEvents();
  }
  createAnimationHoverInEvents() {
    const lottieSettings = this.getLottieSettings(),
      $widgetArea = this.getHoverAreaElement();
    this.state.hoverArea = lottieSettings.hover_area;
    this.listeners.elements.$widgetArea.triggerAnimationHoverIn = () => {
      this.state.animationDirection = 'forward';
      this.playLottie();
    };
    this.addSessionEventListener($widgetArea, 'mouseenter', this.listeners.elements.$widgetArea.triggerAnimationHoverIn);
  }

  /**
   * @param {jQuery}   $el
   * @param {string}   event    - event type
   * @param {Function} callback
   */
  addSessionEventListener($el, event, callback) {
    $el.on(event, callback);
    this.listeners.collection.push({
      $el,
      event,
      callback
    });
  }
  createAnimationHoverOutEvents() {
    const lottieSettings = this.getLottieSettings(),
      $widgetArea = this.getHoverAreaElement();
    if ('pause' === lottieSettings.on_hover_out || 'reverse' === lottieSettings.on_hover_out) {
      this.state.hoverOutMode = lottieSettings.on_hover_out;
      this.listeners.elements.$widgetArea.triggerAnimationHoverOut = () => {
        if ('pause' === lottieSettings.on_hover_out) {
          this.lottie.pause();
        } else {
          this.state.animationDirection = 'backward';
          this.playLottie();
        }
      };
      this.addSessionEventListener($widgetArea, 'mouseleave', this.listeners.elements.$widgetArea.triggerAnimationHoverOut);
    }
  }
  getHoverAreaElement() {
    const lottieSettings = this.getLottieSettings();
    switch (lottieSettings.hover_area) {
      case 'section':
        return this.elements.$sectionParent;
      case 'column':
        return this.elements.$columnParent;
      case 'container':
        return this.elements.$containerParent;
    }
    return this.elements.$container;
  }
  setLoopOnAnimationComplete() {
    const lottieSettings = this.getLottieSettings();
    this.state.isNewLoopCycle = true;
    if (lottieSettings.loop && !this.isReverseMode()) {
      this.setLoopWhenNotReverse();
    } else if (lottieSettings.loop && this.isReverseMode()) {
      this.setReverseAnimationOnLoop();
    } else if (!lottieSettings.loop && this.isReverseMode()) {
      this.setReverseAnimationOnSingleTrigger();
    }
  }
  isReverseMode() {
    const lottieSettings = this.getLottieSettings();
    return 'yes' === lottieSettings.reverse_animation || 'reverse' === lottieSettings.on_hover_out && 'backward' === this.state.animationDirection;
  }
  setLoopWhenNotReverse() {
    const lottieSettings = this.getLottieSettings();
    if (lottieSettings.number_of_times > 0) {
      this.state.playAnimationCount++;
      if (this.state.playAnimationCount < lottieSettings.number_of_times) {
        this.playLottie();
      } else {
        this.state.playAnimationCount = 0;
      }
    } else {
      this.playLottie();
    }
  }
  setReverseAnimationOnLoop() {
    const lottieSettings = this.getLottieSettings();

    /*
    We trigger the reverse animation:
    either when we don't have any value in the 'Number of Times" field, and then it will be an infinite forward/backward loop,
    or, when we have a value in the 'Number of Times" field and then we need to limit the number of times of the loop cycles.
     */
    if (!lottieSettings.number_of_times || this.state.playAnimationCount < lottieSettings.number_of_times) {
      this.state.animationDirection = 'forward' === this.state.animationDirection ? 'backward' : 'forward';
      this.playLottie();

      /*
      We need to increment the count only on the backward movements,
      because forward movement + backward movement are equal together to one full movement count.
      */
      if ('backward' === this.state.animationDirection) {
        this.state.playAnimationCount++;
      }
    } else {
      // Reset the values for the loop counting for the next trigger.
      this.state.playAnimationCount = 0;
      this.state.animationDirection = 'forward';
    }
  }
  setReverseAnimationOnSingleTrigger() {
    if (this.state.playAnimationCount < 1) {
      this.state.playAnimationCount++;
      this.state.animationDirection = 'backward';
      this.playLottie();
    } else if (this.state.playAnimationCount >= 1 && 'forward' === this.state.animationDirection) {
      this.state.animationDirection = 'backward';
      this.playLottie();
    } else {
      this.state.playAnimationCount = 0;
      this.state.animationDirection = 'forward';
    }
  }
  setAnimationSpeed() {
    const lottieSettings = this.getLottieSettings();
    if (lottieSettings.play_speed) {
      this.lottie.setSpeed(lottieSettings.play_speed.size);
    }
  }
  onElementChange() {
    this.updateLottieValues();
    this.resetAnimationTrigger();
  }
  updateLottieValues() {
    const lottieSettings = this.getLottieSettings(),
      valuesComparison = [{
        sourceVal: lottieSettings.play_speed?.size,
        stateProp: 'animationSpeed',
        callback: () => this.setAnimationSpeed()
      }, {
        sourceVal: lottieSettings.link_timeout,
        stateProp: 'linkTimeout',
        callback: () => this.setLinkTimeout()
      }, {
        sourceVal: lottieSettings.caption,
        stateProp: 'caption',
        callback: () => this.setCaption()
      }, {
        sourceVal: lottieSettings.effects_relative_to,
        stateProp: 'effectsRelativeTo',
        callback: () => this.updateAnimationByScrollPosition()
      }, {
        sourceVal: lottieSettings.loop,
        stateProp: 'loop',
        callback: () => this.onLoopStateChange()
      }];
    valuesComparison.forEach(item => {
      if ('undefined' !== typeof item.sourceVal && item.sourceVal !== this.state[item.stateProp]) {
        this.state[item.stateProp] = item.sourceVal;
        item.callback();
      }
    });
  }
  onLoopStateChange() {
    const isInActiveViewportMode = 'arriving_to_viewport' === this.state.currentAnimationTrigger && this.state.isInViewport;
    if (this.state.loop && (isInActiveViewportMode || 'none' === this.state.currentAnimationTrigger)) {
      this.playLottie();
    }
  }
  resetAnimationTrigger() {
    const lottieSettings = this.getLottieSettings(),
      isTriggerChange = lottieSettings.trigger !== this.state.currentAnimationTrigger,
      isViewportOffsetChange = lottieSettings.viewport ? this.isViewportOffsetChange() : false,
      isHoverOutModeChange = lottieSettings.on_hover_out ? this.isHoverOutModeChange() : false,
      isHoverAreaChange = lottieSettings.hover_area ? this.isHoverAreaChange() : false;
    if (isTriggerChange || isViewportOffsetChange || isHoverOutModeChange || isHoverAreaChange) {
      this.removeAnimationFrameRequests();
      this.removeObservers();
      this.removeEventListeners();
      this.initAnimationTrigger();
    }
  }
  isViewportOffsetChange() {
    const lottieSettings = this.getLottieSettings(),
      isStartOffsetChange = lottieSettings.viewport.sizes.start !== this.state.viewportOffset.start,
      isEndOffsetChange = lottieSettings.viewport.sizes.end !== this.state.viewportOffset.end;
    return isStartOffsetChange || isEndOffsetChange;
  }
  isHoverOutModeChange() {
    const lottieSettings = this.getLottieSettings();
    return lottieSettings.on_hover_out !== this.state.hoverOutMode;
  }
  isHoverAreaChange() {
    const lottieSettings = this.getLottieSettings();
    return lottieSettings.hover_area !== this.state.hoverArea;
  }
  removeEventListeners() {
    this.listeners.collection.forEach(listener => {
      listener.$el.off(listener.event, null, listener.callback);
    });
  }
  removeObservers() {
    // Removing all observers.
    for (const type in this.intersectionObservers) {
      if (this.intersectionObservers[type].observer && this.intersectionObservers[type].element) {
        this.intersectionObservers[type].observer.unobserve(this.intersectionObservers[type].element);
      }
    }
  }
  removeAnimationFrameRequests() {
    cancelAnimationFrame(this.animationFrameRequest.timer);
  }
  onDestroy() {
    super.onDestroy();
    this.destroyLottie();
  }
  destroyLottie() {
    this.removeAnimationFrameRequests();
    this.removeObservers();
    this.removeEventListeners();
    this.elements.$animation.removeData('lottie');
    if (this.lottie) {
      this.lottie.destroy();
    }
  }
  onLottieDomLoaded() {
    this.saveInitialValues();
    this.setAnimationSpeed();
    this.setLinkTimeout();
    this.setCaption();
    this.setAnimationFirstFrame();
    this.initAnimationTrigger();
  }
  onComplete() {
    this.setLoopOnAnimationComplete();
  }
  onLottieIntersection(event) {
    if (event.isInViewport) {
      /*
      It's required to update the animation progress on first load when lottie is inside the viewport on load
      but, there is a problem when the browser is refreshed when the scroll bar is not in 0 position,
      in this scenario, after the refresh the browser will trigger 2 scroll events
      one trigger on immediate load and second after a f ew ms to move the scroll bar to previous position (before refresh)
      therefore, we use the this.state.isAnimationScrollUpdateNeededOnFirstLoad flag
      to make sure that this.updateAnimationByScrollPosition() function will be triggered only once.
       */
      if (this.state.isAnimationScrollUpdateNeededOnFirstLoad) {
        this.state.isAnimationScrollUpdateNeededOnFirstLoad = false;
        this.updateAnimationByScrollPosition();
      }
      this.animationFrameRequest.timer = requestAnimationFrame(() => this.onAnimationFrameRequest());
    } else {
      const frame = this.getAnimationFrames(),
        finalFrame = 'up' === event.intersectionScrollDirection ? frame.first : frame.last;
      this.state.isAnimationScrollUpdateNeededOnFirstLoad = false;
      cancelAnimationFrame(this.animationFrameRequest.timer);

      // Set the animation values to min/max when out of viewport.
      this.lottie.goToAndStop(finalFrame, true);
    }
  }
  onAnimationFrameRequest() {
    // Making calculation only when there is a change with the scroll position.
    if (window.scrollY !== this.animationFrameRequest.lastScrollY) {
      this.updateAnimationByScrollPosition();
      this.animationFrameRequest.lastScrollY = window.scrollY;
    }
    this.animationFrameRequest.timer = requestAnimationFrame(() => this.onAnimationFrameRequest());
  }
}
exports["default"] = lottieHandler;

/***/ }),

/***/ "../modules/mega-menu/assets/js/frontend/frontend-legacy.js":
/*!******************************************************************!*\
  !*** ../modules/mega-menu/assets/js/frontend/frontend-legacy.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _megaMenu = _interopRequireDefault(__webpack_require__(/*! ./handlers/mega-menu */ "../modules/mega-menu/assets/js/frontend/handlers/mega-menu.js"));
var _stretchMenuItemContent = _interopRequireDefault(__webpack_require__(/*! ./handlers/stretch-menu-item-content */ "../modules/mega-menu/assets/js/frontend/handlers/stretch-menu-item-content.js"));
var _menuTitleKeyboardHandler = _interopRequireDefault(__webpack_require__(/*! ./handlers/menu-title-keyboard-handler */ "../modules/mega-menu/assets/js/frontend/handlers/menu-title-keyboard-handler.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('mega-menu', [_megaMenu.default, _stretchMenuItemContent.default, _menuTitleKeyboardHandler.default]);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/mega-menu/assets/js/frontend/handlers/mega-menu.js":
/*!*********************************************************************!*\
  !*** ../modules/mega-menu/assets/js/frontend/handlers/mega-menu.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _utils = __webpack_require__(/*! ../utils */ "../modules/mega-menu/assets/js/frontend/utils.js");
var _anchorLink = _interopRequireDefault(__webpack_require__(/*! ../../../../../../assets/dev/js/frontend/utils/anchor-link */ "../assets/dev/js/frontend/utils/anchor-link.js"));
var _flexHorizontalScroll = __webpack_require__(/*! elementor-pro/frontend/utils/flex-horizontal-scroll */ "../assets/dev/js/frontend/utils/flex-horizontal-scroll.js");
class MegaMenu extends elementorModules.frontend.handlers.NestedTabs {
  constructor() {
    super(...arguments);
    if (elementorFrontend.isEditMode()) {
      this.lifecycleChangeListener = null;
    }
    this.resizeListener = null;
    this.prevMouseY = null;
  }
  getDefaultSettings() {
    const settings = super.getDefaultSettings();
    settings.selectors.widgetContainer = '.e-n-menu';
    settings.selectors.dropdownMenuToggle = '.e-n-menu-toggle';
    settings.selectors.menuWrapper = '.e-n-menu-wrapper';
    settings.selectors.headingContainer = '.e-n-menu-heading';
    settings.selectors.tabTitle = '.e-n-menu-title';
    settings.selectors.tabDropdown = '.e-n-menu-dropdown-icon';
    settings.selectors.menuContent = '.e-n-menu-content';
    settings.selectors.tabContent = '.e-n-menu-content > .e-con';
    settings.selectors.anchorLink = '.e-anchor a';
    settings.classes.anchorItem = 'e-anchor';
    settings.classes.activeAnchorItem = 'e-current';
    settings.autoExpand = false;
    settings.autoFocus = false;
    settings.ariaAttributes.titleStateAttribute = 'aria-expanded';
    settings.ariaAttributes.activeTitleSelector = '[aria-expanded="true"]';
    return settings;
  }
  getDefaultElements() {
    const elements = super.getDefaultElements(),
      selectors = this.getSettings('selectors');
    elements.$widgetContainer = this.$element.find(selectors.widgetContainer);
    elements.$dropdownMenuToggle = this.$element.find(selectors.dropdownMenuToggle);
    elements.$menuWrapper = this.$element.find(selectors.menuWrapper);
    elements.$menuContent = this.$element.find(selectors.menuContent);
    elements.$headingContainer = this.$element.find(selectors.headingContainer);
    elements.$tabTitles = this.$element.find(selectors.tabTitle);
    elements.$tabDropdowns = this.$element.find(selectors.tabDropdown);
    elements.$anchorLink = this.$element.find(selectors.anchorLink);
    return elements;
  }
  dropdownMenuHeightControllerConfig() {
    const selectors = this.getSettings('selectors');
    return {
      elements: {
        $element: this.$element,
        $dropdownMenuContainer: this.$element.find(selectors.menuWrapper),
        $menuToggle: this.$element.find(selectors.dropdownMenuToggle)
      },
      attributes: {
        menuToggleState: 'aria-expanded'
      },
      settings: {
        dropdownMenuContainerMaxHeight: 'auto',
        menuHeightCssVarName: '--n-menu-dropdown-content-box-height'
      }
    };
  }
  handleContentContainerPosition() {
    let $contentContainer = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
    this.resetContentContainersPosition();

    // If no container is passed as an argument, check if there is an active container.
    const activeTitleSelector = this.getSettings('ariaAttributes').activeTitleSelector,
      tabIndex = this.elements.$tabDropdowns.filter(activeTitleSelector)?.attr('data-tab-index');
    $contentContainer = $contentContainer || this.elements.$tabContents.filter(this.getTabContentFilterSelector(tabIndex));
    if (!$contentContainer.length) {
      return;
    }
    this.setContentContainerAbsolutePosition($contentContainer);
  }
  setContentContainerAbsolutePosition($contentContainer) {
    const elementSettings = this.getElementSettings(),
      isFitToContent = 'fit_to_content' === elementSettings.content_width;
    if ((0, _utils.isMenuInDropdownMode)(elementSettings)) {
      return;
    }
    if (isFitToContent) {
      const direction = elementorFrontend.config.is_rtl ? 'right' : 'left',
        menuItemContainerOffset = 0 < this.getMenuItemContainerAbsolutePosition($contentContainer) ? this.getMenuItemContainerAbsolutePosition($contentContainer) : 0;
      $contentContainer.css(direction, menuItemContainerOffset);
    }
    const headingsHeight = this.elements.$headingContainer[0].getBoundingClientRect().height;
    if (this.shouldPositionContentAbove($contentContainer, headingsHeight)) {
      const contentContainerBoundingBox = $contentContainer[0].getBoundingClientRect();
      $contentContainer.css({
        width: isFitToContent ? 'max-content' : '',
        'max-width': contentContainerBoundingBox.width
      });
      this.elements.$widgetContainer.addClass('content-above');
    }
  }
  getMenuItemContainerAbsolutePosition($contentContainer) {
    const tabIndex = $contentContainer.data('tab-index'),
      $activeDropdown = this.elements.$tabDropdowns.filter(this.getTabTitleFilterSelector(tabIndex))[0],
      $titleElement = $activeDropdown.closest(this.getSettings('selectors').tabTitle),
      titleBoundingBox = $titleElement.getBoundingClientRect(),
      contentContainerWidth = $contentContainer[0].clientWidth;
    let menuItemContainerOffset = null;
    switch (this.getElementSettings('content_horizontal_position')) {
      case 'left':
        menuItemContainerOffset = this.getLeftDirectionContainerOffset(contentContainerWidth, titleBoundingBox);
        break;
      case 'right':
        menuItemContainerOffset = this.getRightDirectionContainerOffset(contentContainerWidth, titleBoundingBox);
        break;
      default:
        menuItemContainerOffset = this.getCenteredContainerOffset(contentContainerWidth, titleBoundingBox);
    }
    return menuItemContainerOffset;
  }
  getCenteredContainerOffset(contentContainerWidth, titleBoundingBox) {
    const menuItemContentContainerHalfWidth = contentContainerWidth / 2,
      bodyWidth = elementorFrontend.elements.$body[0].clientWidth;
    let titleMiddleOffset = this.adjustForScrollbarIfNeeded(titleBoundingBox.left + titleBoundingBox.width / 2);
    if (elementorFrontend.config.is_rtl) {
      titleMiddleOffset = bodyWidth - titleMiddleOffset;
    }
    let offset = titleMiddleOffset - menuItemContentContainerHalfWidth;
    if (titleMiddleOffset + menuItemContentContainerHalfWidth > bodyWidth) {
      offset = bodyWidth - contentContainerWidth;
    } else if (menuItemContentContainerHalfWidth > titleMiddleOffset) {
      offset = 0;
    }
    return offset;
  }
  getLeftDirectionContainerOffset(contentContainerWidth, titleBoundingBox) {
    return elementorFrontend.config.is_rtl ? this.getRtlLeftDirectionContainerOffset(contentContainerWidth, titleBoundingBox) : this.getLtrLeftDirectionContainerOffset(contentContainerWidth, titleBoundingBox);
  }
  getRtlLeftDirectionContainerOffset(contentContainerWidth, titleBoundingBox) {
    const bodyWidth = elementorFrontend.elements.$body[0].clientWidth,
      titleLeftOffset = this.adjustForScrollbarIfNeeded(titleBoundingBox.left);
    let offset = bodyWidth - titleLeftOffset - contentContainerWidth;

    // If the content container doesn't fit in the viewport, align its right edge with the viewport's right edge.
    if (-offset + contentContainerWidth > bodyWidth) {
      offset = 0;
    }
    return offset;
  }
  getLtrLeftDirectionContainerOffset(contentContainerWidth, titleBoundingBox) {
    let offset = this.adjustForScrollbarIfNeeded(titleBoundingBox.left);
    offset = this.adjustStartOffsetToViewport(offset, contentContainerWidth);
    return offset;
  }
  getRightDirectionContainerOffset(contentContainerWidth, titleBoundingBox) {
    return elementorFrontend.config.is_rtl ? this.getRtlRightDirectionContainerOffset(contentContainerWidth, titleBoundingBox) : this.getLtrRightDirectionContainerOffset(contentContainerWidth, titleBoundingBox);
  }
  getRtlRightDirectionContainerOffset(contentContainerWidth, titleBoundingBox) {
    const bodyWidth = elementorFrontend.elements.$body[0].clientWidth;
    let offset = bodyWidth - this.adjustForScrollbarIfNeeded(titleBoundingBox.right);
    offset = this.adjustStartOffsetToViewport(offset, contentContainerWidth);
    return offset;
  }

  /**
   * If the content container doesn't fit in the viewport, align its right edge with the viewport's right edge.
   *
   * @param {number} offset
   * @param {number} contentContainerWidth
   */
  adjustStartOffsetToViewport(offset, contentContainerWidth) {
    const bodyWidth = elementorFrontend.elements.$body[0].clientWidth;
    if (offset + contentContainerWidth > bodyWidth) {
      offset = bodyWidth - contentContainerWidth;
    }
    return offset;
  }
  getLtrRightDirectionContainerOffset(contentContainerWidth, titleBoundingBox) {
    return contentContainerWidth > titleBoundingBox.right ? 0 : titleBoundingBox.right - contentContainerWidth;
  }
  adjustForScrollbarIfNeeded(offset) {
    if (elementorFrontend.config.is_rtl && elementorFrontend.isEditMode()) {
      const scrollbarWidth = window.innerWidth - elementorFrontend.elements.$body[0].clientWidth;
      offset -= scrollbarWidth;
    }
    return offset;
  }
  getMenuContainerOffset() {
    const menuContainerBoundingBox = this.elements.$widgetContainer[0].getBoundingClientRect();
    return elementorFrontend.config.is_rtl ? this.getMenuContainerOffsetRtl(menuContainerBoundingBox) : menuContainerBoundingBox.left;
  }
  getMenuContainerOffsetRtl(menuContainerBoundingBox) {
    const bodyWidth = elementorFrontend.elements.$body[0].clientWidth;
    let menuContainerOffset = bodyWidth - menuContainerBoundingBox.right;
    if (elementorFrontend.isEditMode()) {
      // In RTL mode, the editor's scrollbar is on the left side, so we need to add its width to the offset.
      const scrollbarWidth = window.innerWidth - bodyWidth;
      menuContainerOffset += scrollbarWidth;
    }
    return menuContainerOffset;
  }
  resetContentContainersPosition() {
    this.elements.$tabContents.css({
      left: '',
      right: '',
      bottom: '',
      position: 'var(--position)',
      'max-width': '',
      width: 'var(--width)'
    });
    this.elements.$widgetContainer.removeClass('content-above');
  }
  getTabContentFilterSelector(tabIndex) {
    return `[data-tab-index="${tabIndex}"]`;
  }
  isActiveTab(tabIndex) {
    return 'true' === this.elements.$tabDropdowns.filter('[data-tab-index="' + tabIndex + '"]').attr(this.getSettings('ariaAttributes').titleStateAttribute);
  }
  activateTab(tabIndex) {
    const settings = this.getSettings(),
      activeClass = settings.classes.active,
      childMenuDropdownSelector = `.elementor-element-${this.getID()} .e-n-menu .e-n-menu .e-n-menu-dropdown-icon`,
      childMenuContentSelector = `.elementor-element-${this.getID()} .e-n-menu .e-n-menu .e-n-menu-content > .e-con`,
      $requestedTitle = this.elements.$tabDropdowns.filter(this.getTabTitleFilterSelector(tabIndex)).not(childMenuDropdownSelector),
      animationDuration = 'show' === settings.showTabFn ? 0 : 400,
      $requestedContent = this.elements.$tabContents.filter(this.getTabContentFilterSelector(tabIndex)).not(childMenuContentSelector),
      $menuContent = this.elements.$menuContent;
    this.addAnimationToContentIfNeeded(tabIndex);
    $requestedContent[settings.showTabFn](animationDuration, () => this.onShowTabContent($requestedContent));
    $requestedTitle.attr(this.getTitleActivationAttributes());
    $requestedTitle.prev('.e-n-menu-title-container').find('a').attr(this.getTitleActivationAttributes('link'));
    $requestedContent.addClass(activeClass);
    $requestedContent.css({
      display: 'var(--display)'
    });
    $requestedContent.removeAttr('display');
    $menuContent.addClass(activeClass);
    if (elementorFrontend.isEditMode() && !!$requestedContent.length) {
      this.activeContainerWidthListener($requestedContent);
    }
    this.menuHeightController.reassignMenuHeight($requestedContent);
  }
  deactivateActiveTab(newTabIndex) {
    const settings = this.getSettings(),
      activeClass = settings.classes.active,
      activeTitleFilter = settings.ariaAttributes.activeTitleSelector,
      activeContentFilter = '.' + activeClass,
      $activeTitle = this.elements.$tabDropdowns.filter(activeTitleFilter),
      $activeContent = this.elements.$tabContents.filter(activeContentFilter),
      $menuContent = this.elements.$menuContent;
    this.setTabDeactivationAttributes($activeTitle, newTabIndex);
    $activeContent.removeClass(activeClass);
    $activeContent[settings.hideTabFn](0, () => this.onHideTabContent($activeContent));
    this.removeAnimationFromContentIfNeeded();
    $menuContent.removeClass(activeClass);
    if (elementorFrontend.isEditMode() && !!$activeContent.length) {
      this.observedContainer?.unobserve($activeContent[0]);
    }
    this.menuHeightController.resetMenuHeight($activeContent);
  }
  getTitleActivationAttributes() {
    let elementType = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'tab';
    const titleAttributes = {
      tabindex: '0'
    };
    if ('tab' === elementType) {
      titleAttributes['aria-expanded'] = 'true';
    }
    return titleAttributes;
  }
  setTabDeactivationAttributes($activeTitle, newTabIndex) {
    const isActiveTab = this.isActiveTab(newTabIndex),
      titleStateAttribute = this.getSettings('ariaAttributes').titleStateAttribute;
    $activeTitle.attr(`${titleStateAttribute}`, 'false');
    if (!!newTabIndex && !isActiveTab) {
      this.elements.$tabDropdowns.attr('tabindex', '-1');
      this.elements.$tabDropdowns.prev('.e-n-menu-title-container').find('a').attr('tabindex', '-1');
    }
  }
  shouldPositionContentAbove($contentContainer) {
    let offset = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
    const contentDimensions = $contentContainer[0].getBoundingClientRect();
    return this.isContentShorterThanItsTopOffset(contentDimensions, offset) && this.isContentTallerThanItsBottomOffset(contentDimensions);
  }
  isContentShorterThanItsTopOffset(contentDimensions, offset) {
    return contentDimensions.height < contentDimensions.top - offset;
  }
  isContentTallerThanItsBottomOffset(contentDimensions) {
    return window.innerHeight - contentDimensions.top < contentDimensions.height;
  }
  onShowTabContent($requestedContent) {
    this.handleContentContainerPosition($requestedContent);
    super.onShowTabContent($requestedContent);
  }
  onHideTabContent() {
    if (this.elements.$widgetContainer.hasClass('content-above')) {
      this.resetContentContainersPosition();
    }
  }
  changeActiveTab(tabIndex) {
    let fromUser = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
    const isActiveTab = this.isActiveTab(tabIndex);
    this.deactivateActiveTab(tabIndex);
    if (!isActiveTab || isActiveTab && !fromUser) {
      this.activateTab(tabIndex);
    }
  }
  changeActiveTabByKeyboard(event, settings) {
    if (settings.widgetId.toString() !== this.getID().toString()) {
      return;
    }
    if (!settings.titleIndex) {
      this.changeActiveTab('', true);
      return;
    }
    const $focusableElement = this.$element.find(`[data-focus-index="${settings.titleIndex}"]`),
      isLinkElement = 'a' === $focusableElement[0].tagName.toLowerCase(),
      dropdownSelector = this.getSettings('selectors.tabDropdown'),
      $tabDropdown = isLinkElement ? $focusableElement.next(dropdownSelector) : $focusableElement,
      tabIndex = this.getTabIndex($tabDropdown[0]);
    this.changeActiveTab(tabIndex, true);
    event.stopPropagation();
  }
  onTabClick(event) {
    if (event?.currentTarget?.classList?.contains('link-only')) {
      return;
    }
    const getClickedMenuId = event?.target?.closest('.elementor-widget-n-menu')?.getAttribute('data-id'),
      getWidgetId = this.getID().toString();
    if (getClickedMenuId !== getWidgetId) {
      return;
    }
    const selectors = this.getSettings('selectors'),
      clickedElement = event?.currentTarget,
      dropdownElement = clickedElement?.querySelector(selectors.tabDropdown),
      tabIndex = this.getTabIndex(dropdownElement);
    this.changeActiveTab(tabIndex, true);
  }
  bindEvents() {
    this.elements.$tabTitles.on(this.getTabEvents());
    this.elements.$dropdownMenuToggle.on('click', this.onClickToggleDropdownMenu.bind(this));
    this.elements.$tabContents.on(this.getContentEvents());
    this.elements.$menuContent.on(this.getContentEvents());
    this.elements.$headingContainer.on(this.getHeadingEvents());
    elementorFrontend.addListenerOnce(this.getModelCID(), 'scroll', elementorFrontend.debounce(this.menuHeightController.reassignMobileMenuHeight.bind(this.menuHeightController), 250));
    elementorFrontend.elements.$window.on('elementor/nested-tabs/activate', this.reInitSwipers);
    elementorFrontend.elements.$window.on('elementor/nested-elements/activate-by-keyboard', this.changeActiveTabByKeyboard.bind(this));
    elementorFrontend.elements.$window.on('elementor/mega-menu/dropdown-toggle-by-keyboard', this.onClickToggleDropdownMenuByKeyboard.bind(this));
    elementorFrontend.elements.$window.on('resize', this.resizeEventHandler.bind(this));
    if (elementorFrontend.isEditMode()) {
      this.addChildLifeCycleEventListeners();
    }
  }
  unbindEvents() {
    this.elements.$tabTitles.off();
    this.elements.$menuContent.off();
    this.elements.$tabContents.off();
    this.elements.$headingContainer.off();
    elementorFrontend.elements.$window.off('resize');
    if (elementorFrontend.isEditMode()) {
      this.removeChildLifeCycleEventListeners();
    }
    elementorFrontend.elements.$window.off('elementor/nested-tabs/activate');
    elementorFrontend.elements.$window.off('elementor/nested-elements/activate-by-keyboard');
    elementorFrontend.elements.$window.off('elementor/mega-menu/dropdown-toggle-by-keyboard');
  }
  resizeEventHandler() {
    this.resizeListener = this.handleContentContainerPosition();
    this.setLayoutType();
    this.setTouchMode();
    this.menuHeightController.reassignMobileMenuHeight();
    this.setScrollPosition();
    const activeTitleSelector = this.getSettings('ariaAttributes').activeTitleSelector,
      tabIndex = this.elements.$tabDropdowns.filter(activeTitleSelector)?.attr('data-tab-index'),
      childMenuContentSelector = `.elementor-element-${this.getID()} .e-n-menu .e-n-menu .e-n-menu-content > .e-con`,
      $requestedContent = this.elements.$tabContents.filter(this.getTabContentFilterSelector(tabIndex)).not(childMenuContentSelector);
    this.menuHeightController.resetMenuHeight($requestedContent);
    this.menuHeightController.reassignMenuHeight($requestedContent);
  }

  /**
   * Add Child Lifecycle Event Listeners
   *
   * This method adds event listeners for the elementor/editor/element-rendered and elementor/editor/element-destroyed
   * events. These events are fired when an element is rendered or destroyed in the editor. The callback functions
   * check if the rendered/destroyed element is nested in this mega-menu instance, and if it is, triggers the
   * recalculation of the mega-menu's content containers position.
   */
  addChildLifeCycleEventListeners() {
    this.lifecycleChangeListener = this.handleContentContainerChildrenChanges.bind(this);
    window.addEventListener('elementor/editor/element-rendered', this.lifecycleChangeListener);
    window.addEventListener('elementor/editor/element-destroyed', this.lifecycleChangeListener);
  }
  removeChildLifeCycleEventListeners() {
    window.removeEventListener('elementor/editor/element-rendered', this.lifecycleChangeListener);
    window.removeEventListener('elementor/editor/element-destroyed', this.lifecycleChangeListener);
  }
  handleContentContainerChildrenChanges(event) {
    if (!this.isNestedElementRenderedInContentContainer(event.detail.elementView)) {
      return;
    }
    this.handleContentContainerPosition();
  }
  isNestedElementRenderedInContentContainer(elementView) {
    const elementContainer = elementView?.getContainer();
    if (!elementContainer) {
      return false;
    }
    const elementAncestors = elementContainer.getParentAncestry();
    return elementAncestors.some(parent => this.getID().toString() === parent.model.get('id').toString());
  }
  getTabEvents() {
    const tabEvents = super.getTabEvents();
    return this.isNeedToOpenOnClick() ? tabEvents : this.replaceClickWithHover(tabEvents);
  }
  getContentEvents() {
    return this.isNeedToOpenOnClick() ? {} : {
      mouseleave: this.onMouseLeave.bind(this),
      mousemove: this.trackMousePosition.bind(this)
    };
  }
  isNeedToOpenOnClick() {
    const elementSettings = this.getElementSettings();
    return this.isEdit || this.isMobileDevice() || 'hover' !== elementSettings.open_on || 'dropdown' === elementSettings.item_layout;
  }
  isMobileDevice() {
    const mobileDevices = ['mobile', 'mobile_extra', 'tablet', 'tablet_extra'];
    return mobileDevices.includes(elementorFrontend.getCurrentDeviceMode());
  }
  replaceClickWithHover(tabEvents) {
    delete tabEvents.click;
    tabEvents.mouseenter = this.onMouseTitleEnter.bind(this);
    tabEvents.mouseleave = this.onMouseLeave.bind(this);
    return tabEvents;
  }
  onMouseTitleEnter(event) {
    event.preventDefault();
    const settings = this.getSettings(),
      titleStateAttribute = settings.ariaAttributes.titleStateAttribute,
      dropdownSelector = settings.selectors.tabDropdown,
      activeDropdownElement = event?.currentTarget?.querySelector(dropdownSelector),
      isActiveTabTitle = 'true' === activeDropdownElement?.getAttribute(titleStateAttribute);
    if (isActiveTabTitle) {
      return;
    }
    const tabIndex = activeDropdownElement?.getAttribute('data-tab-index');
    this.resetTabindexAttributes();
    this.changeActiveTab(tabIndex, true);
  }
  onClickToggleDropdownMenu(show) {
    this.elements.$widgetContainer.attr('data-layout', 'dropdown');
    const settings = this.getSettings(),
      activeClass = settings.classes.active,
      titleStateAttribute = this.getSettings('ariaAttributes').titleStateAttribute,
      isDropdownVisible = 'true' === this.elements.$dropdownMenuToggle.attr(titleStateAttribute);
    if ('boolean' !== typeof show) {
      show = !isDropdownVisible;
    }
    const activeTabTitleValue = show ? 'true' : 'false';
    this.elements.$dropdownMenuToggle.attr(titleStateAttribute, activeTabTitleValue);
    this.elements.$menuContent.toggleClass(activeClass, show);
    elementorFrontend.utils.events.dispatch(window, 'elementor-pro/mega-menu/dropdown-open');
    this.menuHeightController.reassignMobileMenuHeight();
  }
  onClickOutsideDropdownMenu(event) {
    if (!this.isNeedToOpenOnClick()) {
      return;
    }
    const settings = this.getSettings(),
      selectors = settings.selectors,
      widgetWrapper = `.elementor-element-${this.getID()}`,
      activeClass = settings.classes.active,
      activeContentFilter = `> .e-con.${activeClass}`,
      $activeContent = this.elements.$menuContent.find(activeContentFilter),
      isMenuDropdownsClosed = 0 === $activeContent.length,
      isElementRemovedFromDOM = elementorFrontend.isEditMode() && !document.body.contains(event?.target),
      isClickedInsideCurrentMenu = !!event?.target?.closest(`${widgetWrapper} ${selectors.widgetContainer}`),
      isMenuContentWrapperClicked = event?.target?.classList?.contains(selectors.menuContent.replace('.', ''));
    if (isMenuContentWrapperClicked) {
      this.deactivateActiveTab();
      return;
    }
    if (isMenuDropdownsClosed || isClickedInsideCurrentMenu || isElementRemovedFromDOM) {
      return;
    }
    this.deactivateActiveTab();
  }
  onClickToggleDropdownMenuByKeyboard(event, settings) {
    if (settings.widgetId.toString() !== this.getID().toString()) {
      return;
    }
    this.onClickToggleDropdownMenu(settings.show);
  }
  addAnimationToContentIfNeeded(tabIndex) {
    const openAnimation = this.getElementSettings('open_animation');
    if ('none' === openAnimation) {
      return;
    }
    const $requestedContent = this.elements.$tabContents.filter(this.getTabContentFilterSelector(tabIndex));
    $requestedContent.addClass(`animated ${openAnimation}`);
  }
  removeAnimationFromContentIfNeeded() {
    const openAnimation = this.getElementSettings('open_animation');
    if ('none' === openAnimation) {
      return;
    }
    this.elements.$tabContents.removeClass(`animated ${openAnimation}`);
  }

  /**
   * Store the current Y-coordinate of the mouse cursor.
   *
   * @param {Event} event - The mouse event object.
   */
  trackMousePosition(event) {
    this.prevMouseY = event?.clientY;
  }

  /**
   * Check if the menu content is currently hovered.
   *
   * @return {boolean} - True if menu content is hovered, otherwise false.
   */
  isMenuContentHovered() {
    const settings = this.getSettings(),
      $widget = this.$element;
    return $widget.find(`${settings.selectors.menuContent}:hover`).length > 0;
  }

  /**
   * Determines whether the cursor moved sideways or downwards.
   *
   * @param {Event} event - The mouse event object.
   * @return {boolean} - True if the cursor moved sideways or downwards, otherwise false.
   */
  didCursorMoveSidewaysOrDown(event) {
    // Detects if the Y-coordinate of the mouse has not decreased (i.e., either remained the same or increased).
    return this.prevMouseY !== null && event?.clientY >= this.prevMouseY;
  }

  /**
   * Check whether the dropdown menu should remain open based on hover and cursor movement.
   *
   * @param {boolean} isMouseLeavingTabContent - True if the mouse is leaving the tab content.
   * @param {Event}   event                    - The mouse event object.
   * @return {boolean} - True if dropdown should be considered as hovered, otherwise false.
   */
  isHoveredDropdownMenu(isMouseLeavingTabContent, event) {
    // If the mouse is leaving the tab content and it moved sideways or downwards, close the dropdown.
    if (isMouseLeavingTabContent && this.didCursorMoveSidewaysOrDown(event)) {
      return false;
    }

    // Otherwise, return true if the menu content is hovered.
    return this.isMenuContentHovered();
  }

  /**
   * Handle the event when the mouse leaves the dropdown.
   *
   * @param {Event} event - The mouse event object.
   */
  onMouseLeave(event) {
    event.preventDefault();
    const isMouseLeavingTabContent = event?.currentTarget?.classList?.contains('e-con');
    if (!this.isHoveredDropdownMenu(isMouseLeavingTabContent, event)) {
      this.deactivateActiveTab('', 'mouseLeave');
    }
  }
  onInit() {
    this.menuHeightController = new elementorProFrontend.utils.DropdownMenuHeightController(this.dropdownMenuHeightControllerConfig());
    super.onInit(...arguments);
    if (!elementorFrontend.isEditMode()) {
      const classes = this.getSettings('classes');
      this.anchorLinks = new _anchorLink.default();
      this.anchorLinks.followMenuAnchors(this.elements.$anchorLink, classes);
    }
    this.menuToggleVisibilityListener(this.elements.$dropdownMenuToggle);
    this.setScrollPosition();
    this.onClickOutsideDropdownMenu = this.onClickOutsideDropdownMenu.bind(this);
    document.addEventListener('click', this.onClickOutsideDropdownMenu);
  }
  onDestroy() {
    document.removeEventListener('click', this.onClickOutsideDropdownMenu);
  }
  setScrollPosition() {
    const settingsObject = {
      element: this.elements.$headingContainer[0],
      direction: this.getItemPosition(),
      justifyCSSVariable: '--n-menu-heading-justify-content',
      horizontalScrollStatus: this.getHorizontalScrollSetting()
    };
    (0, _flexHorizontalScroll.setHorizontalScrollAlignment)(settingsObject);
  }
  getPropsThatTriggerContentPositionCalculations() {
    return ['content_horizontal_position', 'content_position', 'item_position_horizontal', 'content_width', 'item_layout'];
  }
  activeContainerWidthListener($activeContainer) {
    let previousWidth = 0;
    this.observedContainer = new ResizeObserver(activeContainer => {
      const currentWidth = activeContainer[0].borderBoxSize?.[0].inlineSize;
      if (!!currentWidth && currentWidth !== previousWidth) {
        previousWidth = currentWidth;
        if (0 !== previousWidth) {
          this.handleContentContainerPosition();
        }
      }
    });
    this.observedContainer.observe($activeContainer[0]);
  }
  menuToggleVisibilityListener($menuToggle) {
    let previousWidth;
    this.observedContainer = new ResizeObserver(menuToggle => {
      const currentWidth = menuToggle[0].borderBoxSize?.[0].inlineSize;
      if (currentWidth !== previousWidth) {
        previousWidth = currentWidth;
        this.setLayoutType();
      }
    });
    this.observedContainer.observe($menuToggle[0]);
  }
  onElementChange(propertyName) {
    if (this.getPropsThatTriggerContentPositionCalculations().includes(propertyName)) {
      this.handleContentContainerPosition();
    }
    this.setLayoutType();
  }
  onEditSettingsChange(propertyName, value) {
    const settings = this.getSettings();
    if (settings.autoFocus) {
      super.onEditSettingsChange(propertyName, value);
    }
    this.setLayoutType();
  }
  resetTabindexAttributes() {
    this.elements.$tabDropdowns.attr('tabindex', '-1');
  }

  /**
   * Sets the layout type as a data attribute, so that it can be use for the responsive or dropdown menu styling.
   *
   * Originally this styling was handled by the distinction between the heading and the content styling elements.
   * Since we removed the title duplication, we needed another way to distinguish between the horizontal and the dropdown styling.
   */
  setLayoutType() {
    const layoutType = 'flex' === this.elements.$headingContainer.css('display') ? 'horizontal' : 'dropdown';
    this.elements.$widgetContainer.attr('data-layout', layoutType);
  }
  getHeadingEvents() {
    const navigationWrapper = this.elements.$headingContainer[0];
    return {
      mousedown: _flexHorizontalScroll.changeScrollStatus.bind(this, navigationWrapper),
      mouseup: _flexHorizontalScroll.changeScrollStatus.bind(this, navigationWrapper),
      mouseleave: _flexHorizontalScroll.changeScrollStatus.bind(this, navigationWrapper),
      mousemove: _flexHorizontalScroll.setHorizontalTitleScrollValues.bind(this, navigationWrapper, this.getHorizontalScrollSetting())
    };
  }
  getHorizontalScrollSetting() {
    const currentDevice = elementorFrontend.getCurrentDeviceMode();
    return elementorFrontend.utils.controls.getResponsiveControlValue(this.getElementSettings(), 'horizontal_scroll', '', currentDevice);
  }
  getItemPosition() {
    const currentDevice = elementorFrontend.getCurrentDeviceMode();
    return elementorFrontend.utils.controls.getResponsiveControlValue(this.getElementSettings(), 'item_position_horizontal', '', currentDevice);
  }
}
exports["default"] = MegaMenu;

/***/ }),

/***/ "../modules/mega-menu/assets/js/frontend/handlers/menu-title-keyboard-handler.js":
/*!***************************************************************************************!*\
  !*** ../modules/mega-menu/assets/js/frontend/handlers/menu-title-keyboard-handler.js ***!
  \***************************************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class MenuTitleKeyboardHandler extends elementorModules.frontend.handlers.NestedTitleKeyboardHandler {
  __construct() {
    super.__construct(...arguments);
    this.handleMenuToggleKeydown = this.handleMenuToggleKeydown.bind(this);
  }
  getDefaultSettings() {
    const settings = super.getDefaultSettings();
    settings.selectors.widgetInnerWrapper = '.e-n-menu';
    settings.selectors.menuToggle = '.e-n-menu-toggle';
    settings.selectors.itemTitle = '.e-focus';
    settings.selectors.itemContainer = '.e-n-menu-content > .e-con';
    settings.ariaAttributes.titleStateAttribute = 'aria-expanded';
    settings.ariaAttributes.activeTitleSelector = '[aria-expanded="true"]';
    settings.datasets.titleIndex = 'data-focus-index';
    return settings;
  }
  getDefaultElements() {
    const elements = super.getDefaultElements(),
      selectors = this.getSettings('selectors');
    elements.$menuToggle = this.findElement(selectors.menuToggle);
    return elements;
  }
  bindEvents() {
    super.bindEvents();
    this.elements.$menuToggle.on('keydown', this.handleMenuToggleKeydown);
  }
  unbindEvents() {
    super.unbindEvents();
    this.elements.$menuToggle.off('keydown', this.handleMenuToggleKeydown);
  }
  onInit() {
    super.onInit(...arguments);
    let focusTitleCount = 1;
    this.elements.$itemTitles.each((index, title) => {
      title.setAttribute(this.getSettings('datasets').titleIndex, focusTitleCount++);
    });
  }
  setTitleTabindex(titleIndex) {
    this.elements.$itemTitles.attr('tabindex', '-1');
    const $newTitle = this.elements.$itemTitles.filter(this.getTitleFilterSelector(titleIndex));
    $newTitle.attr('tabindex', '0');
    $newTitle.closest('.e-n-menu-title-container').next('.e-n-menu-dropdown-icon').attr('tabindex', '0');
    $newTitle.prev('.e-n-menu-title-container').find('a').attr('tabindex', '0');
  }
  handleMenuToggleKeydown(event) {
    if ('Escape' !== event.key) {
      return;
    }
    event.preventDefault();
    event.stopPropagation();
    elementorFrontend.elements.$window.trigger('elementor/mega-menu/dropdown-toggle-by-keyboard', {
      widgetId: this.getID(),
      show: false
    });
  }
  handleTitleEscapeKeyEvents(event) {
    event.preventDefault();
    event.stopPropagation();
    const selectors = this.getSettings('selectors'),
      isDropdownLayout = 'dropdown' === this.$element.find(selectors.widgetInnerWrapper).data('layout');
    if (isDropdownLayout) {
      elementorFrontend.elements.$window.trigger('elementor/mega-menu/dropdown-toggle-by-keyboard', {
        widgetId: this.getID()
      });
      this.$element.find(selectors.menuToggle).trigger('focus');
    }
    elementorFrontend.elements.$window.trigger('elementor/nested-elements/activate-by-keyboard', {
      widgetId: this.getID()
    });
  }
  handleContentElementEscapeEvents() {
    this.getActiveTitleElement().trigger('focus');
    elementorFrontend.elements.$window.trigger('elementor/nested-elements/activate-by-keyboard', {
      widgetId: this.getID()
    });
  }
  handleContentElementTabEvents(event) {
    const $currentElement = jQuery(event.currentTarget),
      containerSelector = this.getSettings('selectors').itemContainer,
      $focusableContainerElements = this.getFocusableElements($currentElement.closest(containerSelector)),
      $lastFocusableElement = $focusableContainerElements.last(),
      isCurrentElementLastFocusableElement = $currentElement.is($lastFocusableElement);
    if (!isCurrentElementLastFocusableElement) {
      return;
    }
    event.preventDefault();
    const $activeTitle = this.getActiveTitleElement(),
      activeTitleIndex = parseInt(this.getTitleIndex($activeTitle[0]));
    elementorFrontend.elements.$window.trigger('elementor/nested-elements/activate-by-keyboard', {
      widgetId: this.getID()
    });
    this.changeTitleFocus(activeTitleIndex);
  }
}
exports["default"] = MenuTitleKeyboardHandler;

/***/ }),

/***/ "../modules/mega-menu/assets/js/frontend/handlers/stretch-menu-item-content.js":
/*!*************************************************************************************!*\
  !*** ../modules/mega-menu/assets/js/frontend/handlers/stretch-menu-item-content.js ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class StretchedMenuItemContent extends elementorModules.frontend.handlers.StretchedElement {
  getStretchedClass() {
    return 'elementor-widget-n-menu';
  }
  getStretchElementForConfig() {
    return this.$element.find('.e-n-menu-wrapper');
  }
  getStretchElementConfig() {
    const elementConfig = super.getStretchElementConfig();
    elementConfig.cssOutput = 'variables';
    return elementConfig;
  }
  bindEvents() {
    super.bindEvents();
    elementorFrontend.addListenerOnce(this.getUniqueHandlerID(), 'elementor-pro/mega-menu/dropdown-open', this.stretch);
  }
  unbindEvents() {
    super.unbindEvents();
    elementorFrontend.removeListeners(this.getUniqueHandlerID(), 'elementor-pro/mega-menu/dropdown-open', this.stretch);
  }
  isStretchSettingEnabled() {
    return true;
  }
  isActive() {
    return true;
  }
}
exports["default"] = StretchedMenuItemContent;

/***/ }),

/***/ "../modules/mega-menu/assets/js/frontend/utils.js":
/*!********************************************************!*\
  !*** ../modules/mega-menu/assets/js/frontend/utils.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.isMenuInDropdownMode = isMenuInDropdownMode;
function isMenuInDropdownMode(elementSettings) {
  if ('dropdown' === elementSettings.item_layout) {
    return true;
  }
  const activeBreakpointsList = elementorFrontend.breakpoints.getActiveBreakpointsList({
      withDesktop: true
    }),
    breakpointIndex = activeBreakpointsList.indexOf(elementSettings.breakpoint_selector),
    currentDeviceModeIndex = activeBreakpointsList.indexOf(elementorFrontend.getCurrentDeviceMode());
  return currentDeviceModeIndex <= breakpointIndex;
}

/***/ }),

/***/ "../modules/nav-menu/assets/js/frontend/frontend-legacy.js":
/*!*****************************************************************!*\
  !*** ../modules/nav-menu/assets/js/frontend/frontend-legacy.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _navMenu = _interopRequireDefault(__webpack_require__(/*! ./handlers/nav-menu */ "../modules/nav-menu/assets/js/frontend/handlers/nav-menu.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    if (jQuery.fn.smartmenus) {
      // Override the default stupid detection
      jQuery.SmartMenus.prototype.isCSSOn = function () {
        return true;
      };
      if (elementorFrontend.config.is_rtl) {
        jQuery.fn.smartmenus.defaults.rightToLeftSubMenus = true;
      }
    }
    elementorFrontend.elementsHandler.attachHandler('nav-menu', _navMenu.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/nav-menu/assets/js/frontend/handlers/nav-menu.js":
/*!*******************************************************************!*\
  !*** ../modules/nav-menu/assets/js/frontend/handlers/nav-menu.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _anchorLink = _interopRequireDefault(__webpack_require__(/*! ../../../../../../assets/dev/js/frontend/utils/anchor-link */ "../assets/dev/js/frontend/utils/anchor-link.js"));
var _default = exports["default"] = elementorModules.frontend.handlers.Base.extend({
  stretchElement: null,
  getDefaultSettings() {
    return {
      selectors: {
        menu: '.elementor-nav-menu',
        anchorLink: '.elementor-nav-menu--main .elementor-item-anchor',
        dropdownMenu: '.elementor-nav-menu__container.elementor-nav-menu--dropdown',
        menuToggle: '.elementor-menu-toggle'
      },
      classes: {
        anchorItem: 'elementor-item-anchor',
        activeAnchorItem: 'elementor-item-active'
      }
    };
  },
  getDefaultElements() {
    var selectors = this.getSettings('selectors'),
      elements = {};
    elements.$menu = this.$element.find(selectors.menu);
    elements.$anchorLink = this.$element.find(selectors.anchorLink);
    elements.$dropdownMenu = this.$element.find(selectors.dropdownMenu);
    elements.$dropdownMenuFinalItems = elements.$dropdownMenu.find('.menu-item:not(.menu-item-has-children) > a');
    elements.$menuToggle = this.$element.find(selectors.menuToggle);
    elements.$links = elements.$dropdownMenu.find('a.elementor-item');
    return elements;
  },
  dropdownMenuHeightControllerConfig() {
    const selectors = this.getSettings('selectors');
    return {
      elements: {
        $element: this.$element,
        $dropdownMenuContainer: this.$element.find(selectors.dropdownMenu),
        $menuToggle: this.$element.find(selectors.menuToggle)
      },
      attributes: {
        menuToggleState: 'aria-expanded'
      },
      settings: {
        dropdownMenuContainerMaxHeight: '1000vmax',
        // Max-height value is fixed to 1000vmax in order to allow the mobile menu closing animation.
        menuHeightCssVarName: '--menu-height'
      }
    };
  },
  bindEvents() {
    if (!this.elements.$menu.length) {
      return;
    }
    this.elements.$menuToggle.on('click', this.toggleMenu.bind(this)).on('keyup', this.triggerClickOnEnterSpace.bind(this));
    if (this.getElementSettings('full_width')) {
      this.elements.$dropdownMenuFinalItems.on('click', this.toggleMenu.bind(this, false)).on('keyup', this.triggerClickOnEnterSpace.bind(this));
    }
    elementorFrontend.addListenerOnce(this.$element.data('model-cid'), 'resize', this.stretchMenu);
    elementorFrontend.addListenerOnce(this.$element.data('model-cid'), 'scroll', elementorFrontend.debounce(this.menuHeightController.reassignMobileMenuHeight.bind(this.menuHeightController), 250));
  },
  initStretchElement() {
    this.stretchElement = new elementorModules.frontend.tools.StretchElement({
      element: this.elements.$dropdownMenu
    });
  },
  toggleNavLinksTabIndex() {
    let enabled = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
    this.elements.$links.attr('tabindex', enabled ? 0 : -1);
  },
  toggleMenu(show) {
    var isDropdownVisible = this.elements.$menuToggle.hasClass('elementor-active');
    if ('boolean' !== typeof show) {
      show = !isDropdownVisible;
    }
    this.elements.$menuToggle.attr('aria-expanded', show);
    this.elements.$dropdownMenu.attr('aria-hidden', !show);
    this.elements.$menuToggle.toggleClass('elementor-active', show);
    this.toggleNavLinksTabIndex(show);
    this.menuHeightController.reassignMobileMenuHeight(this);
    if (show && this.getElementSettings('full_width')) {
      this.stretchElement.stretch();
    }
  },
  triggerClickOnEnterSpace(event) {
    const ENTER_KEY = 13,
      SPACE_KEY = 32;
    if (ENTER_KEY === event.keyCode || SPACE_KEY === event.keyCode) {
      event.currentTarget.click();
      event.stopPropagation();
    }
  },
  stretchMenu() {
    if (this.getElementSettings('full_width')) {
      this.stretchElement.stretch();
      this.elements.$dropdownMenu.css('top', this.elements.$menuToggle.outerHeight());
    } else {
      this.stretchElement.reset();
    }
  },
  onInit() {
    this.menuHeightController = new elementorProFrontend.utils.DropdownMenuHeightController(this.dropdownMenuHeightControllerConfig());
    elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments);
    if (!this.elements.$menu.length) {
      return;
    }
    const elementSettings = this.getElementSettings(),
      iconValue = elementSettings.submenu_icon.value;
    let subIndicatorsContent = '';
    if (iconValue) {
      // The value of iconValue can be either className inside the editor or a markup in the frontend.
      subIndicatorsContent = iconValue.indexOf('<') > -1 ? iconValue : `<i class="${iconValue}"></i>`;
    }

    // SubIndicators param - Added for backwards compatibility:
    // If the old 'indicator' control value = 'none', the <span class="sub-arrow"> wrapper element is removed
    this.elements.$menu.smartmenus({
      subIndicators: '' !== subIndicatorsContent,
      subIndicatorsText: subIndicatorsContent,
      subIndicatorsPos: 'append',
      subMenusMaxWidth: '1000px'
    });
    this.initStretchElement();
    this.stretchMenu();
    if (!elementorFrontend.isEditMode()) {
      const classes = this.getSettings('classes');
      this.anchorLinks = new _anchorLink.default();
      this.anchorLinks.followMenuAnchors(this.elements.$anchorLink, classes);
    }
  },
  onElementChange(propertyName) {
    if ('full_width' === propertyName) {
      this.stretchMenu();
    }
  }
});

/***/ }),

/***/ "../modules/nested-carousel/assets/js/frontend/frontend-legacy.js":
/*!************************************************************************!*\
  !*** ../modules/nested-carousel/assets/js/frontend/frontend-legacy.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _nestedCarousel = _interopRequireDefault(__webpack_require__(/*! ./handlers/nested-carousel */ "../modules/nested-carousel/assets/js/frontend/handlers/nested-carousel.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('nested-carousel', _nestedCarousel.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/nested-carousel/assets/js/frontend/handlers/nested-carousel.js":
/*!*********************************************************************************!*\
  !*** ../modules/nested-carousel/assets/js/frontend/handlers/nested-carousel.js ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _runElementHandlers = _interopRequireDefault(__webpack_require__(/*! elementor-pro/frontend/utils/run-element-handlers */ "../assets/dev/js/frontend/utils/run-element-handlers.js"));
class NestedCarousel extends elementorModules.frontend.handlers.CarouselBase {
  getDefaultSettings() {
    const defaultSettings = super.getDefaultSettings();
    defaultSettings.selectors.carousel = '.e-n-carousel';
    defaultSettings.selectors.slidesWrapper = '.e-n-carousel > .swiper-wrapper';
    return defaultSettings;
  }
  getSwiperSettings() {
    const swiperOptions = super.getSwiperSettings(),
      elementSettings = this.getElementSettings(),
      isRtl = elementorFrontend.config.is_rtl,
      widgetSelector = `.elementor-element-${this.getID()}`;
    if (elementorFrontend.isEditMode()) {
      delete swiperOptions.autoplay;
      swiperOptions.loop = false;
      swiperOptions.noSwipingSelector = '.swiper-slide > .e-con .elementor-element';
    }
    if ('yes' === elementSettings.arrows) {
      swiperOptions.navigation = {
        prevEl: isRtl ? `${widgetSelector} .elementor-swiper-button-next` : `${widgetSelector} .elementor-swiper-button-prev`,
        nextEl: isRtl ? `${widgetSelector} .elementor-swiper-button-prev` : `${widgetSelector} .elementor-swiper-button-next`
      };
    }
    this.applySwipeOptions(swiperOptions);
    return swiperOptions;
  }
  async onInit() {
    this.wrapSlideContent();
    super.onInit(...arguments);
    if (!elementorFrontend.config.experimentalFeatures.e_swiper_latest) {
      this.reInitBackgroundSlideshow();
    }
    this.ranElementHandlers = false;
  }
  handleElementHandlers() {
    if (this.ranElementHandlers || !this.swiper) {
      return;
    }
    const duplicatedSlides = Array.from(this.swiper.slides).filter(slide => slide.classList.contains(this.swiper.params.slideDuplicateClass));
    (0, _runElementHandlers.default)(duplicatedSlides);
    this.ranElementHandlers = true;
  }
  wrapSlideContent() {
    if (!elementorFrontend.isEditMode()) {
      return;
    }
    const settings = this.getSettings(),
      slideContentClass = settings.selectors.slideContent.replace('.', ''),
      $widget = this.$element;
    let index = 1;
    this.findElement(`${settings.selectors.slidesWrapper} > .e-con`).each(function () {
      const $currentContainer = jQuery(this),
        hasSwiperSlideWrapper = $currentContainer.closest('div').hasClass(slideContentClass),
        $currentSlide = $widget.find(`${settings.selectors.slidesWrapper} > .${slideContentClass}:nth-child(${index})`);
      if (!hasSwiperSlideWrapper) {
        $currentSlide.append($currentContainer);
      }
      index++;
    });
  }
  togglePauseOnHover(toggleOn) {
    if (elementorFrontend.isEditMode()) {
      return;
    }
    super.togglePauseOnHover(toggleOn);
  }
  getChangeableProperties() {
    return {
      arrows_position: 'arrows_position' // Not a Swiper setting.
    };
  }

  applySwipeOptions(swiperOptions) {
    if (!this.isTouchDevice()) {
      swiperOptions.shortSwipes = false;
    } else {
      swiperOptions.touchRatio = 1;
      swiperOptions.longSwipesRatio = 0.3;
      swiperOptions.followFinger = true;
      swiperOptions.threshold = 10;
    }
  }
  isTouchDevice() {
    return elementorFrontend.utils.environment.isTouchDevice;
  }
  reInitBackgroundSlideshow() {
    const slideshows = this.elements.$swiperContainer.find('.elementor-background-slideshow');
    for (const element of slideshows) {
      if (!element.swiper) {
        return;
      }
      element.swiper.initialized = false;
      element.swiper.init();
    }
  }
}
exports["default"] = NestedCarousel;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/document.js":
/*!*******************************************************!*\
  !*** ../modules/popup/assets/js/frontend/document.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _triggers = _interopRequireDefault(__webpack_require__(/*! ./triggers */ "../modules/popup/assets/js/frontend/triggers.js"));
var _timing = _interopRequireDefault(__webpack_require__(/*! ./timing */ "../modules/popup/assets/js/frontend/timing.js"));
var _eIcons = __webpack_require__(/*! @elementor-pro/e-icons */ "../assets/dev/js/frontend/utils/icons/e-icons.js");
// Temporary solution, when core 3.5.0 will be the minimum version, is should be replaced with @elementor/e-icons.

class _default extends elementorModules.frontend.Document {
  bindEvents() {
    const openSelector = this.getDocumentSettings('open_selector');
    if (openSelector) {
      elementorFrontend.elements.$body.on('click', openSelector, this.showModal.bind(this));
    }
  }
  startTiming() {
    const timing = new _timing.default(this.getDocumentSettings('timing'), this);
    if (timing.check()) {
      this.initTriggers();
    }
  }
  initTriggers() {
    this.triggers = new _triggers.default(this.getDocumentSettings('triggers'), this);
  }
  showModal(avoidMultiple, event) {
    // eslint-disable-next-line @wordpress/no-unused-vars-before-return
    const settings = this.getDocumentSettings();
    if (!this.isEdit) {
      if (!elementorFrontend.isWPPreviewMode()) {
        if (this.getStorage('disable')) {
          return;
        }
        if (avoidMultiple && elementorProFrontend.modules.popup.popupPopped && settings.avoid_multiple_popups) {
          return;
        }
      }

      // A clean copy of the element without previous initializations and events
      this.$element = jQuery(this.elementHTML);
      this.elements.$elements = this.$element.find(this.getSettings('selectors.elements'));
    }
    const modal = this.getModal(),
      $closeButton = modal.getElements('closeButton');
    modal.setMessage(this.$element).show();
    if (!this.isEdit) {
      if (settings.close_button_delay) {
        $closeButton.hide();
        clearTimeout(this.closeButtonTimeout);
        this.closeButtonTimeout = setTimeout(() => $closeButton.show(), settings.close_button_delay * 1000);
      }
      super.runElementsHandlers();
    }
    this.setEntranceAnimation();
    if (!settings.timing || !settings.timing.times_count) {
      this.countTimes();
    }
    elementorProFrontend.modules.popup.popupPopped = true;
    if (!this.isEdit && settings.a11y_navigation) {
      this.handleKeyboardA11y(event);
    }
  }
  setEntranceAnimation() {
    const $widgetContent = this.getModal().getElements('widgetContent'),
      settings = this.getDocumentSettings(),
      newAnimation = elementorFrontend.getCurrentDeviceSetting(settings, 'entrance_animation');
    if (this.currentAnimation) {
      $widgetContent.removeClass(this.currentAnimation);
    }
    this.currentAnimation = newAnimation;
    if (!newAnimation) {
      return;
    }
    const animationDuration = settings.entrance_animation_duration.size;
    $widgetContent.addClass(newAnimation);
    setTimeout(() => $widgetContent.removeClass(newAnimation), animationDuration * 1000);
  }
  handleKeyboardA11y(event) {
    const selectorFocusedElements = ':focusable';
    const $focusableElements = this.getModal().getElements('widgetContent').find(selectorFocusedElements);
    if (!$focusableElements.length) {
      return;
    }
    let $lastButtonClicked = null;
    if (event?.currentTarget) {
      $lastButtonClicked = jQuery(event.currentTarget);
    }
    const $lastFocusableElement = $focusableElements[$focusableElements.length - 1];
    const $firstFocusableElement = $focusableElements[0];
    const onKeyDownPressed = keyDownEvent => {
      const TAB_KEY = 9;
      const isShiftPressed = keyDownEvent.shiftKey;
      const isTabPressed = 'Tab' === keyDownEvent.key || TAB_KEY === keyDownEvent.keyCode;
      if (!isTabPressed) {
        return;
      }
      const activeElement = elementorFrontend.elements.window.document.activeElement;
      if (isShiftPressed) {
        const isFocusOnFirstElement = activeElement === $firstFocusableElement;
        if (isFocusOnFirstElement) {
          $lastFocusableElement.focus();
          keyDownEvent.preventDefault();
        }
      } else {
        const isFocusOnLastElement = activeElement === $lastFocusableElement;
        if (isFocusOnLastElement) {
          $firstFocusableElement.focus();
          keyDownEvent.preventDefault();
        }
      }
    };
    $firstFocusableElement.focus();
    const $window = elementorFrontend.elements.$window;
    $window.on('keydown', onKeyDownPressed).on('elementor/popup/hide', () => {
      $window.off('keydown', onKeyDownPressed);
      if ($lastButtonClicked) {
        $lastButtonClicked.focus();
      }
    });
  }
  setExitAnimation() {
    const modal = this.getModal(),
      settings = this.getDocumentSettings(),
      $widgetContent = modal.getElements('widgetContent'),
      newAnimation = elementorFrontend.getCurrentDeviceSetting(settings, 'exit_animation'),
      animationDuration = newAnimation ? settings.entrance_animation_duration.size : 0;
    setTimeout(() => {
      if (newAnimation) {
        $widgetContent.removeClass(newAnimation + ' reverse');
      }
      if (!this.isEdit) {
        this.$element.remove();
        modal.getElements('widget').hide();
      }
    }, animationDuration * 1000);
    if (newAnimation) {
      $widgetContent.addClass(newAnimation + ' reverse');
    }
  }
  initModal() {
    let modal;
    this.getModal = () => {
      if (!modal) {
        const settings = this.getDocumentSettings(),
          id = this.getSettings('id'),
          triggerPopupEvent = eventType => {
            const event = 'elementor/popup/' + eventType;
            elementorFrontend.elements.$document.trigger(event, [id, this]);

            // TODO: Use `elementorFrontend.utils.events.dispatch` when it's in master.
            window.dispatchEvent(new CustomEvent(event, {
              detail: {
                id,
                instance: this
              }
            }));
          };
        let classes = 'elementor-popup-modal';
        if (settings.classes) {
          classes += ' ' + settings.classes;
        }
        const modalProperties = {
          id: 'elementor-popup-modal-' + id,
          className: classes,
          closeButton: true,
          preventScroll: settings.prevent_scroll,
          onShow: () => triggerPopupEvent('show'),
          onHide: () => triggerPopupEvent('hide'),
          effects: {
            hide: () => {
              if (settings.timing && settings.timing.times_count) {
                this.countTimes();
              }
              this.setExitAnimation();
            },
            show: 'show'
          },
          hide: {
            auto: !!settings.close_automatically,
            autoDelay: settings.close_automatically * 1000,
            onBackgroundClick: !settings.prevent_close_on_background_click,
            onOutsideClick: !settings.prevent_close_on_background_click,
            onEscKeyPress: !settings.prevent_close_on_esc_key,
            ignore: '.flatpickr-calendar'
          },
          position: {
            enable: false
          }
        };
        if (elementorFrontend.config.experimentalFeatures.e_font_icon_svg) {
          modalProperties.closeButtonOptions = {
            iconElement: _eIcons.close.element
          };
        }

        // This line should be moved to the condition above, as an 'else' case, once the core minimum version is 3.5.0.
        modalProperties.closeButtonClass = 'eicon-close';
        modal = elementorFrontend.getDialogsManager().createWidget('lightbox', modalProperties);
        modal.getElements('widgetContent').addClass('animated');
        const $closeButton = modal.getElements('closeButton');
        if (this.isEdit) {
          $closeButton.off('click');
          modal.hide = () => {};
        }
        this.setCloseButtonPosition();
      }
      return modal;
    };
  }
  setCloseButtonPosition() {
    const modal = this.getModal(),
      closeButtonPosition = this.getDocumentSettings('close_button_position'),
      $closeButton = modal.getElements('closeButton');
    $closeButton.prependTo(modal.getElements('outside' === closeButtonPosition ? 'widget' : 'widgetContent'));
  }
  disable() {
    this.setStorage('disable', true);
  }
  setStorage(key, value, options) {
    elementorFrontend.storage.set(`popup_${this.getSettings('id')}_${key}`, value, options);
  }
  getStorage(key, options) {
    return elementorFrontend.storage.get(`popup_${this.getSettings('id')}_${key}`, options);
  }
  countTimes() {
    const displayTimes = this.getStorage('times') || 0;
    this.setStorage('times', displayTimes + 1);
  }
  runElementsHandlers() {}
  async onInit() {
    super.onInit();

    // In case that the library was not loaded, it indicates a Core version that enables dynamic loading.
    if (!window.DialogsManager) {
      await elementorFrontend.utils.assetsLoader.load('script', 'dialog');
    }
    this.initModal();
    if (this.isEdit) {
      this.showModal();
      return;
    }
    this.$element.show().remove();
    this.elementHTML = this.$element[0].outerHTML;
    if (elementorFrontend.isEditMode()) {
      return;
    }
    if (elementorFrontend.isWPPreviewMode() && elementorFrontend.config.post.id === this.getSettings('id')) {
      this.showModal();
      return;
    }
    this.startTiming();
  }
  onSettingsChange(model) {
    const changedKey = Object.keys(model.changed)[0];
    if (-1 !== changedKey.indexOf('entrance_animation')) {
      this.setEntranceAnimation();
    }
    if ('exit_animation' === changedKey) {
      this.setExitAnimation();
    }
    if ('close_button_position' === changedKey) {
      this.setCloseButtonPosition();
    }
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/frontend-legacy.js":
/*!**************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/frontend-legacy.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _document = _interopRequireDefault(__webpack_require__(/*! ./document */ "../modules/popup/assets/js/frontend/document.js"));
var _formsAction = _interopRequireDefault(__webpack_require__(/*! ./handlers/forms-action */ "../modules/popup/assets/js/frontend/handlers/forms-action.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.hooks.addAction('elementor/frontend/documents-manager/init-classes', this.addDocumentClass);
    elementorFrontend.elementsHandler.attachHandler('form', _formsAction.default);
    elementorFrontend.on('components:init', () => this.onFrontendComponentsInit());
    if (!elementorFrontend.isEditMode() && !elementorFrontend.isWPPreviewMode()) {
      this.setViewsAndSessions();
    }
  }
  addDocumentClass(documentsManager) {
    documentsManager.addDocumentClass('popup', _document.default);
  }
  setViewsAndSessions() {
    const pageViews = elementorFrontend.storage.get('pageViews') || 0;
    elementorFrontend.storage.set('pageViews', pageViews + 1);
    const activeSession = elementorFrontend.storage.get('activeSession', {
      session: true
    });
    if (!activeSession) {
      elementorFrontend.storage.set('activeSession', true, {
        session: true
      });
      const sessions = elementorFrontend.storage.get('sessions') || 0;
      elementorFrontend.storage.set('sessions', sessions + 1);
    }
  }
  showPopup(settings) {
    const popup = elementorFrontend.documentsManager.documents[settings.id];
    if (!popup) {
      return;
    }
    const modal = popup.getModal();
    if (settings.toggle && modal.isVisible()) {
      modal.hide();
    } else {
      popup.showModal();
    }
  }
  closePopup(settings, event) {
    const popupID = jQuery(event.target).parents('[data-elementor-type="popup"]').data('elementorId');
    if (!popupID) {
      return;
    }
    const document = elementorFrontend.documentsManager.documents[popupID];
    document.getModal().hide();
    if (settings.do_not_show_again) {
      document.disable();
    }
  }
  onFrontendComponentsInit() {
    elementorFrontend.utils.urlActions.addAction('popup:open', settings => this.showPopup(settings));
    elementorFrontend.utils.urlActions.addAction('popup:close', (settings, event) => this.closePopup(settings, event));
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/handlers/forms-action.js":
/*!********************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/handlers/forms-action.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _default = exports["default"] = elementorModules.frontend.handlers.Base.extend({
  getDefaultSettings() {
    return {
      selectors: {
        form: '.elementor-form'
      }
    };
  },
  getDefaultElements() {
    var selectors = this.getSettings('selectors'),
      elements = {};
    elements.$form = this.$element.find(selectors.form);
    return elements;
  },
  bindEvents() {
    this.elements.$form.on('submit_success', this.handleFormAction);
  },
  handleFormAction(event, response) {
    if ('undefined' === typeof response.data.popup) {
      return;
    }
    const popupSettings = response.data.popup;
    if ('open' === popupSettings.action) {
      return elementorProFrontend.modules.popup.showPopup(popupSettings);
    }
    setTimeout(() => {
      return elementorProFrontend.modules.popup.closePopup(popupSettings, event);
    }, 1000);
  }
});

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing.js":
/*!*****************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _pageViews = _interopRequireDefault(__webpack_require__(/*! ./timing/page-views */ "../modules/popup/assets/js/frontend/timing/page-views.js"));
var _sessions = _interopRequireDefault(__webpack_require__(/*! ./timing/sessions */ "../modules/popup/assets/js/frontend/timing/sessions.js"));
var _url = _interopRequireDefault(__webpack_require__(/*! ./timing/url */ "../modules/popup/assets/js/frontend/timing/url.js"));
var _sources = _interopRequireDefault(__webpack_require__(/*! ./timing/sources */ "../modules/popup/assets/js/frontend/timing/sources.js"));
var _loggedIn = _interopRequireDefault(__webpack_require__(/*! ./timing/logged-in */ "../modules/popup/assets/js/frontend/timing/logged-in.js"));
var _devices = _interopRequireDefault(__webpack_require__(/*! ./timing/devices */ "../modules/popup/assets/js/frontend/timing/devices.js"));
var _times = _interopRequireDefault(__webpack_require__(/*! ./timing/times */ "../modules/popup/assets/js/frontend/timing/times.js"));
var _browsers = _interopRequireDefault(__webpack_require__(/*! ./timing/browsers */ "../modules/popup/assets/js/frontend/timing/browsers.js"));
var _schedule = _interopRequireDefault(__webpack_require__(/*! ./timing/schedule */ "../modules/popup/assets/js/frontend/timing/schedule.js"));
class _default extends elementorModules.Module {
  constructor(settings, document) {
    super(settings);
    this.document = document;
    this.timingClasses = {
      page_views: _pageViews.default,
      sessions: _sessions.default,
      url: _url.default,
      sources: _sources.default,
      logged_in: _loggedIn.default,
      devices: _devices.default,
      times: _times.default,
      browsers: _browsers.default,
      schedule: _schedule.default
    };
  }
  check() {
    const settings = this.getSettings();
    let checkPassed = true;
    jQuery.each(this.timingClasses, (key, TimingClass) => {
      if (!settings[key]) {
        return;
      }
      const timing = new TimingClass(settings, this.document);
      if (!timing.check()) {
        checkPassed = false;
      }
    });
    return checkPassed;
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/base.js":
/*!**********************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/base.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class _default extends elementorModules.Module {
  constructor(settings, document) {
    super(settings);
    this.document = document;
  }
  getTimingSetting(settingKey) {
    return this.getSettings(this.getName() + '_' + settingKey);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/browsers.js":
/*!**************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/browsers.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/timing/base.js"));
class _default extends _base.default {
  getName() {
    return 'browsers';
  }
  check() {
    if ('all' === this.getTimingSetting('browsers')) {
      return true;
    }
    const targetedBrowsers = this.getTimingSetting('browsers_options'),
      browserDetectionFlags = elementorFrontend.utils.environment;
    return targetedBrowsers.some(browserName => browserDetectionFlags[browserName]);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/devices.js":
/*!*************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/devices.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/timing/base.js"));
class _default extends _base.default {
  getName() {
    return 'devices';
  }
  check() {
    return -1 !== this.getTimingSetting('devices').indexOf(elementorFrontend.getCurrentDeviceMode());
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/logged-in.js":
/*!***************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/logged-in.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/timing/base.js"));
class _default extends _base.default {
  getName() {
    return 'logged_in';
  }
  check() {
    const userConfig = elementorFrontend.config.user;
    if (!userConfig) {
      return true;
    }
    if ('all' === this.getTimingSetting('users')) {
      return false;
    }
    const userRolesInHideList = this.getTimingSetting('roles').filter(role => -1 !== userConfig.roles.indexOf(role));
    return !userRolesInHideList.length;
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/page-views.js":
/*!****************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/page-views.js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/timing/base.js"));
class _default extends _base.default {
  getName() {
    return 'page_views';
  }
  check() {
    const pageViews = elementorFrontend.storage.get('pageViews'),
      name = this.getName();
    let initialPageViews = this.document.getStorage(name + '_initialPageViews');
    if (!initialPageViews) {
      this.document.setStorage(name + '_initialPageViews', pageViews);
      initialPageViews = pageViews;
    }
    return pageViews - initialPageViews >= this.getTimingSetting('views');
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/schedule-utils.js":
/*!********************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/schedule-utils.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _defineProperty2 = _interopRequireDefault(__webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "../node_modules/@babel/runtime/helpers/defineProperty.js"));
class ScheduleUtils {
  constructor(args) {
    (0, _defineProperty2.default)(this, "shouldDisplay", () => {
      if (!this.settings.startDate && !this.settings.endDate) {
        return true;
      }
      const now = this.getCurrentDateTime();
      if ((!this.settings.startDate || now >= this.settings.startDate) && (!this.settings.endDate || now <= this.settings.endDate)) {
        return true;
      }
      return false;
    });
    this.settings = args.settings;
  }
  getCurrentDateTime() {
    let now = new Date();
    if ('site' === this.settings.timezone && this.settings.serverDatetime) {
      now = new Date(this.settings.serverDatetime);
    }
    return now;
  }
}
exports["default"] = ScheduleUtils;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/schedule.js":
/*!**************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/schedule.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/timing/base.js"));
var _scheduleUtils = _interopRequireDefault(__webpack_require__(/*! ./schedule-utils */ "../modules/popup/assets/js/frontend/timing/schedule-utils.js"));
class _default extends _base.default {
  constructor() {
    super(...arguments);
    const {
      schedule_timezone: timezone,
      schedule_start_date: startDate,
      schedule_end_date: endDate,
      schedule_server_datetime: serverDatetime
    } = this.getSettings();
    this.settings = {
      timezone,
      startDate: startDate ? new Date(startDate) : false,
      endDate: endDate ? new Date(endDate) : false,
      serverDatetime: serverDatetime ? new Date(serverDatetime) : false
    };
    this.scheduleUtils = new _scheduleUtils.default({
      settings: this.settings
    });
  }
  getName() {
    return 'schedule';
  }
  check() {
    return this.scheduleUtils.shouldDisplay();
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/sessions.js":
/*!**************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/sessions.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/timing/base.js"));
class _default extends _base.default {
  getName() {
    return 'sessions';
  }
  check() {
    const sessions = elementorFrontend.storage.get('sessions'),
      name = this.getName();
    let initialSessions = this.document.getStorage(name + '_initialSessions');
    if (!initialSessions) {
      this.document.setStorage(name + '_initialSessions', sessions);
      initialSessions = sessions;
    }
    return sessions - initialSessions >= this.getTimingSetting('sessions');
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/sources.js":
/*!*************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/sources.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/timing/base.js"));
class _default extends _base.default {
  getName() {
    return 'sources';
  }
  check() {
    const sources = this.getTimingSetting('sources');
    if (3 === sources.length) {
      return true;
    }
    const referrer = document.referrer.replace(/https?:\/\/(?:www\.)?/, ''),
      isInternal = 0 === referrer.indexOf(location.host.replace('www.', ''));
    if (isInternal) {
      return -1 !== sources.indexOf('internal');
    }
    if (-1 !== sources.indexOf('external')) {
      return true;
    }
    if (-1 !== sources.indexOf('search')) {
      return /^(google|yahoo|bing|yandex|baidu)\./.test(referrer);
    }
    return false;
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/times-utils.js":
/*!*****************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/times-utils.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class TimesUtils {
  constructor(args) {
    this.uniqueId = args.uniqueId;
    this.settings = args.settings;
    this.storage = args.storage;
  }
  getTimeFramesInSecounds(timeFrame) {
    const timeFrames = {
      day: 86400,
      // Day in seconds
      week: 604800,
      // Week in seconds
      month: 2628288 // Month in seconds
    };

    return timeFrames[timeFrame];
  }
  setExpiration(name, value, timeFrame) {
    const data = this.storage.get(name);
    if (!data) {
      const options = {
        lifetimeInSeconds: this.getTimeFramesInSecounds(timeFrame)
      };
      this.storage.set(name, value, options);
      return;
    }
    this.storage.set(name, value);
  }
  getImpressionsCount() {
    const impressionCount = this.storage.get(this.uniqueId) ?? 0;
    return parseInt(impressionCount);
  }
  incrementImpressionsCount() {
    if (!this.settings.period) {
      this.storage.set('times', (this.storage.get('times') ?? 0) + 1);
    } else if ('session' !== this.settings.period) {
      const impressionCount = this.getImpressionsCount();
      this.setExpiration(this.uniqueId, impressionCount + 1, this.settings.period);
    } else {
      sessionStorage.setItem(this.uniqueId, parseInt(sessionStorage.getItem(this.uniqueId) ?? 0) + 1);
    }
  }
  shouldCountOnOpen() {
    if (this.settings.countOnOpen) {
      this.incrementImpressionsCount();
    }
  }
  shouldDisplayPerTimeFrame() {
    const impressionCount = this.getImpressionsCount();
    if (impressionCount < this.settings.showsLimit) {
      this.shouldCountOnOpen();
      return true;
    }
    return false;
  }
  shouldDisplayPerSession() {
    const impressionCount = sessionStorage.getItem(this.uniqueId) ?? 0;
    if (parseInt(impressionCount) < this.settings.showsLimit) {
      this.shouldCountOnOpen();
      return true;
    }
    return false;
  }
  shouldDisplayBackwordCompatible() {
    let impressionCount = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
    let showsLimit = arguments.length > 1 ? arguments[1] : undefined;
    const shouldDisplay = parseInt(impressionCount) < parseInt(showsLimit);
    this.shouldCountOnOpen();
    return shouldDisplay;
  }
}
exports["default"] = TimesUtils;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/times.js":
/*!***********************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/times.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/timing/base.js"));
var _timesUtils = _interopRequireDefault(__webpack_require__(/*! ./times-utils.js */ "../modules/popup/assets/js/frontend/timing/times-utils.js"));
class _default extends _base.default {
  constructor() {
    super(...arguments);
    this.uniqueId = `popup-${this.document.getSettings('id')}-impressions-count`;
    const {
      times_count: countOnOpen,
      times_period: period,
      times_times: showsLimit
    } = this.getSettings();
    this.settings = {
      countOnOpen,
      period,
      showsLimit: parseInt(showsLimit)
    };
    if ('' === this.settings.period) {
      this.settings.period = false;
    }
    if (['', 'close'].includes(this.settings.countOnOpen)) {
      this.settings.countOnOpen = false;
      this.onPopupHide();
    } else {
      this.settings.countOnOpen = true;
    }
    this.utils = new _timesUtils.default({
      uniqueId: this.uniqueId,
      settings: this.settings,
      storage: elementorFrontend.storage
    });
  }
  getName() {
    return 'times';
  }
  check() {
    if (!this.settings.period) {
      const impressionCount = this.document.getStorage('times') || 0;
      const showsLimit = this.getTimingSetting('times');
      return this.utils.shouldDisplayBackwordCompatible(impressionCount, showsLimit);
    }
    if ('session' !== this.settings.period) {
      if (!this.utils.shouldDisplayPerTimeFrame()) {
        return false;
      }
    } else if (!this.utils.shouldDisplayPerSession()) {
      return false;
    }
    return true;
  }
  onPopupHide() {
    window.addEventListener('elementor/popup/hide', () => {
      this.utils.incrementImpressionsCount();
    });
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/timing/url.js":
/*!*********************************************************!*\
  !*** ../modules/popup/assets/js/frontend/timing/url.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/timing/base.js"));
class _default extends _base.default {
  getName() {
    return 'url';
  }
  check() {
    const url = this.getTimingSetting('url'),
      action = this.getTimingSetting('action'),
      referrer = document.referrer;
    if ('regex' !== action) {
      return 'hide' === action ^ -1 !== referrer.indexOf(url);
    }
    let regexp;
    try {
      regexp = new RegExp(url);
    } catch (e) {
      return false;
    }
    return regexp.test(referrer);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/triggers.js":
/*!*******************************************************!*\
  !*** ../modules/popup/assets/js/frontend/triggers.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _pageLoad = _interopRequireDefault(__webpack_require__(/*! ./triggers/page-load */ "../modules/popup/assets/js/frontend/triggers/page-load.js"));
var _scrolling = _interopRequireDefault(__webpack_require__(/*! ./triggers/scrolling */ "../modules/popup/assets/js/frontend/triggers/scrolling.js"));
var _scrollingTo = _interopRequireDefault(__webpack_require__(/*! ./triggers/scrolling-to */ "../modules/popup/assets/js/frontend/triggers/scrolling-to.js"));
var _click = _interopRequireDefault(__webpack_require__(/*! ./triggers/click */ "../modules/popup/assets/js/frontend/triggers/click.js"));
var _inactivity = _interopRequireDefault(__webpack_require__(/*! ./triggers/inactivity */ "../modules/popup/assets/js/frontend/triggers/inactivity.js"));
var _exitIntent = _interopRequireDefault(__webpack_require__(/*! ./triggers/exit-intent */ "../modules/popup/assets/js/frontend/triggers/exit-intent.js"));
class _default extends elementorModules.Module {
  constructor(settings, document) {
    super(settings);
    this.document = document;
    this.triggers = [];
    this.triggerClasses = {
      page_load: _pageLoad.default,
      scrolling: _scrolling.default,
      scrolling_to: _scrollingTo.default,
      click: _click.default,
      inactivity: _inactivity.default,
      exit_intent: _exitIntent.default
    };
    this.runTriggers();
  }
  runTriggers() {
    const settings = this.getSettings();
    jQuery.each(this.triggerClasses, (key, TriggerClass) => {
      if (!settings[key]) {
        return;
      }
      const trigger = new TriggerClass(settings, () => this.onTriggerFired());
      trigger.run();
      this.triggers.push(trigger);
    });
  }
  destroyTriggers() {
    this.triggers.forEach(trigger => trigger.destroy());
    this.triggers = [];
  }
  onTriggerFired() {
    this.document.showModal(true);
    this.destroyTriggers();
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/triggers/base.js":
/*!************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/triggers/base.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class _default extends elementorModules.Module {
  constructor(settings, callback) {
    super(settings);
    this.callback = callback;
  }
  getTriggerSetting(settingKey) {
    return this.getSettings(this.getName() + '_' + settingKey);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/triggers/click.js":
/*!*************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/triggers/click.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/triggers/base.js"));
class _default extends _base.default {
  constructor() {
    super(...arguments);
    this.checkClick = this.checkClick.bind(this);
    this.clicksCount = 0;
  }
  getName() {
    return 'click';
  }
  checkClick() {
    this.clicksCount++;
    if (this.clicksCount === this.getTriggerSetting('times')) {
      this.callback();
    }
  }
  run() {
    elementorFrontend.elements.$body.on('click', this.checkClick);
  }
  destroy() {
    elementorFrontend.elements.$body.off('click', this.checkClick);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/triggers/exit-intent.js":
/*!*******************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/triggers/exit-intent.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/triggers/base.js"));
class _default extends _base.default {
  constructor() {
    super(...arguments);
    this.detectExitIntent = this.detectExitIntent.bind(this);
  }
  getName() {
    return 'exit_intent';
  }
  detectExitIntent(event) {
    if (event.clientY <= 0) {
      this.callback();
    }
  }
  run() {
    elementorFrontend.elements.$window.on('mouseleave', this.detectExitIntent);
  }
  destroy() {
    elementorFrontend.elements.$window.off('mouseleave', this.detectExitIntent);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/triggers/inactivity.js":
/*!******************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/triggers/inactivity.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/triggers/base.js"));
class _default extends _base.default {
  constructor() {
    super(...arguments);
    this.restartTimer = this.restartTimer.bind(this);
  }
  getName() {
    return 'inactivity';
  }
  run() {
    this.startTimer();
    elementorFrontend.elements.$document.on('keypress mousemove', this.restartTimer);
  }
  startTimer() {
    this.timeOut = setTimeout(this.callback, this.getTriggerSetting('time') * 1000);
  }
  clearTimer() {
    clearTimeout(this.timeOut);
  }
  restartTimer() {
    this.clearTimer();
    this.startTimer();
  }
  destroy() {
    this.clearTimer();
    elementorFrontend.elements.$document.off('keypress mousemove', this.restartTimer);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/triggers/page-load.js":
/*!*****************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/triggers/page-load.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/triggers/base.js"));
class _default extends _base.default {
  getName() {
    return 'page_load';
  }
  run() {
    this.timeout = setTimeout(this.callback, this.getTriggerSetting('delay') * 1000);
  }
  destroy() {
    clearTimeout(this.timeout);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/triggers/scrolling-to.js":
/*!********************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/triggers/scrolling-to.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/triggers/base.js"));
class _default extends _base.default {
  getName() {
    return 'scrolling_to';
  }
  run() {
    let $targetElement;
    try {
      $targetElement = jQuery(this.getTriggerSetting('selector'));
    } catch (e) {
      return;
    }
    this.waypointInstance = elementorFrontend.waypoint($targetElement, this.callback)[0];
  }
  destroy() {
    if (this.waypointInstance) {
      this.waypointInstance.destroy();
    }
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/popup/assets/js/frontend/triggers/scrolling.js":
/*!*****************************************************************!*\
  !*** ../modules/popup/assets/js/frontend/triggers/scrolling.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/popup/assets/js/frontend/triggers/base.js"));
class _default extends _base.default {
  constructor() {
    super(...arguments);
    this.checkScroll = this.checkScroll.bind(this);
    this.lastScrollOffset = 0;
  }
  getName() {
    return 'scrolling';
  }
  checkScroll() {
    const scrollDirection = scrollY > this.lastScrollOffset ? 'down' : 'up',
      requestedDirection = this.getTriggerSetting('direction');
    this.lastScrollOffset = scrollY;
    if (scrollDirection !== requestedDirection) {
      return;
    }
    if ('up' === scrollDirection) {
      this.callback();
      return;
    }
    const fullScroll = elementorFrontend.elements.$document.height() - innerHeight,
      scrollPercent = scrollY / fullScroll * 100;
    if (scrollPercent >= this.getTriggerSetting('offset')) {
      this.callback();
    }
  }
  run() {
    elementorFrontend.elements.$window.on('scroll', this.checkScroll);
  }
  destroy() {
    elementorFrontend.elements.$window.off('scroll', this.checkScroll);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/posts/assets/js/frontend/frontend-legacy.js":
/*!**************************************************************!*\
  !*** ../modules/posts/assets/js/frontend/frontend-legacy.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _posts = _interopRequireDefault(__webpack_require__(/*! ./handlers/posts */ "../modules/posts/assets/js/frontend/handlers/posts.js"));
var _cards = _interopRequireDefault(__webpack_require__(/*! ./handlers/cards */ "../modules/posts/assets/js/frontend/handlers/cards.js"));
var _portfolio = _interopRequireDefault(__webpack_require__(/*! ./handlers/portfolio */ "../modules/posts/assets/js/frontend/handlers/portfolio.js"));
var _loadMore = _interopRequireDefault(__webpack_require__(/*! ./handlers/load-more */ "../modules/posts/assets/js/frontend/handlers/load-more.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    ['classic', 'full_content', 'cards'].forEach(skinName => {
      elementorFrontend.elementsHandler.attachHandler('posts', _loadMore.default, skinName);
    });
    elementorFrontend.elementsHandler.attachHandler('posts', _posts.default, 'classic');
    elementorFrontend.elementsHandler.attachHandler('posts', _posts.default, 'full_content');
    elementorFrontend.elementsHandler.attachHandler('posts', _cards.default, 'cards');
    elementorFrontend.elementsHandler.attachHandler('portfolio', _portfolio.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/posts/assets/js/frontend/handlers/cards.js":
/*!*************************************************************!*\
  !*** ../modules/posts/assets/js/frontend/handlers/cards.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _posts = _interopRequireDefault(__webpack_require__(/*! ./posts */ "../modules/posts/assets/js/frontend/handlers/posts.js"));
var _default = exports["default"] = _posts.default.extend({
  getSkinPrefix() {
    return 'cards_';
  }
});

/***/ }),

/***/ "../modules/posts/assets/js/frontend/handlers/load-more.js":
/*!*****************************************************************!*\
  !*** ../modules/posts/assets/js/frontend/handlers/load-more.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class LoadMore extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        postsContainer: '.elementor-posts-container',
        postWrapperTag: 'article',
        loadMoreButton: '.elementor-button',
        loadMoreSpinnerWrapper: '.e-load-more-spinner',
        loadMoreSpinner: '.e-load-more-spinner i, .e-load-more-spinner svg',
        loadMoreAnchor: '.e-load-more-anchor'
      },
      classes: {
        loadMoreSpin: 'eicon-animation-spin',
        loadMoreIsLoading: 'e-load-more-pagination-loading',
        loadMorePaginationEnd: 'e-load-more-pagination-end',
        loadMoreNoSpinner: 'e-load-more-no-spinner'
      }
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      postsWidgetWrapper: this.$element[0],
      postsContainer: this.$element[0].querySelector(selectors.postsContainer),
      loadMoreButton: this.$element[0].querySelector(selectors.loadMoreButton),
      loadMoreSpinnerWrapper: this.$element[0].querySelector(selectors.loadMoreSpinnerWrapper),
      loadMoreSpinner: this.$element[0].querySelector(selectors.loadMoreSpinner),
      loadMoreAnchor: this.$element[0].querySelector(selectors.loadMoreAnchor)
    };
  }
  bindEvents() {
    super.bindEvents();

    // Handle load more functionality for on-click type.
    if (!this.elements.loadMoreButton) {
      return;
    }
    this.elements.loadMoreButton.addEventListener('click', event => {
      if (this.isLoading) {
        return;
      }
      event.preventDefault();
      this.handlePostsQuery();
    });
  }
  onInit() {
    super.onInit();
    this.classes = this.getSettings('classes');
    this.isLoading = false;
    const paginationType = this.getElementSettings('pagination_type');
    if ('load_more_on_click' !== paginationType && 'load_more_infinite_scroll' !== paginationType) {
      return;
    }
    this.isInfinteScroll = 'load_more_infinite_scroll' === paginationType;

    // When spinner is not available, the button's text should not be hidden.
    this.isSpinnerAvailable = this.getElementSettings('load_more_spinner').value;
    if (!this.isSpinnerAvailable) {
      this.elements.postsWidgetWrapper.classList.add(this.classes.loadMoreNoSpinner);
    }
    if (this.isInfinteScroll) {
      this.handleInfiniteScroll();
    } else if (this.elements.loadMoreSpinnerWrapper && this.elements.loadMoreButton) {
      // Instead of creating 2 spinners for on-click and infinity-scroll, one spinner will be used so it should be appended to the button in on-click mode.
      this.elements.loadMoreButton.insertAdjacentElement('beforeEnd', this.elements.loadMoreSpinnerWrapper);
    }

    // Set the post id and element id for the ajax request.
    this.elementId = this.getID();
    this.postId = elementorFrontendConfig.post.id;

    // Set the current page and last page for handling the load more post and when no more posts to show.
    if (this.elements.loadMoreAnchor) {
      this.currentPage = parseInt(this.elements.loadMoreAnchor.getAttribute('data-page'));
      this.maxPage = parseInt(this.elements.loadMoreAnchor.getAttribute('data-max-page'));
      if (this.currentPage === this.maxPage || !this.currentPage) {
        this.handleUiWhenNoPosts();
      }
    }
  }

  // Handle load more functionality for infinity-scroll type.
  handleInfiniteScroll() {
    if (this.isEdit) {
      return;
    }
    this.observer = elementorModules.utils.Scroll.scrollObserver({
      callback: event => {
        if (!event.isInViewport || this.isLoading) {
          return;
        }

        // When the observer is triggered it won't be triggered without scrolling, but sometimes there will be no scrollbar to trigger it again.
        this.observer.unobserve(this.elements.loadMoreAnchor);
        this.handlePostsQuery().then(() => {
          if (this.currentPage !== this.maxPage) {
            this.observer.observe(this.elements.loadMoreAnchor);
          }
        });
      }
    });
    this.observer.observe(this.elements.loadMoreAnchor);
  }
  handleUiBeforeLoading() {
    this.isLoading = true;
    if (this.elements.loadMoreSpinner) {
      this.elements.loadMoreSpinner.classList.add(this.classes.loadMoreSpin);
    }
    this.elements.postsWidgetWrapper.classList.add(this.classes.loadMoreIsLoading);
  }
  handleUiAfterLoading() {
    this.isLoading = false;
    if (this.elements.loadMoreSpinner) {
      this.elements.loadMoreSpinner.classList.remove(this.classes.loadMoreSpin);
    }
    if (this.isInfinteScroll && this.elements.loadMoreSpinnerWrapper && this.elements.loadMoreAnchor) {
      // Since the spinner has to be shown after the new content (posts), it should be appended after the anchor element.
      this.elements.loadMoreAnchor.insertAdjacentElement('afterend', this.elements.loadMoreSpinnerWrapper);
    }
    this.elements.postsWidgetWrapper.classList.remove(this.classes.loadMoreIsLoading);
  }
  handleUiWhenNoPosts() {
    this.elements.postsWidgetWrapper.classList.add(this.classes.loadMorePaginationEnd);
  }

  // eslint-disable-next-line no-unused-vars
  afterInsertPosts(postsElements) {}
  handleSuccessFetch(result) {
    this.handleUiAfterLoading();
    const selectors = this.getSettings('selectors');

    // Grabbing only the new articles from the response without the existing ones (prevent posts duplication).
    const postsElements = result.querySelectorAll(`[data-id="${this.elementId}"] ${selectors.postsContainer} > ${selectors.postWrapperTag}`);
    const nextPageUrl = result.querySelector(`[data-id="${this.elementId}"] .e-load-more-anchor`).getAttribute('data-next-page');
    postsElements.forEach(element => this.elements.postsContainer.append(element));
    this.elements.loadMoreAnchor.setAttribute('data-page', this.currentPage);
    this.elements.loadMoreAnchor.setAttribute('data-next-page', nextPageUrl);
    if (this.currentPage === this.maxPage) {
      this.handleUiWhenNoPosts();
    }
    this.afterInsertPosts(postsElements, result);
  }
  handlePostsQuery() {
    this.handleUiBeforeLoading();
    this.currentPage++;
    const nextPageUrl = this.elements.loadMoreAnchor.getAttribute('data-next-page');
    return fetch(nextPageUrl).then(response => response.text()).then(html => {
      // Convert the HTML string into a document object
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, 'text/html');
      this.handleSuccessFetch(doc);
    });
  }
}
exports["default"] = LoadMore;

/***/ }),

/***/ "../modules/posts/assets/js/frontend/handlers/portfolio.js":
/*!*****************************************************************!*\
  !*** ../modules/posts/assets/js/frontend/handlers/portfolio.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _posts = _interopRequireDefault(__webpack_require__(/*! ./posts */ "../modules/posts/assets/js/frontend/handlers/posts.js"));
var _default = exports["default"] = _posts.default.extend({
  isActive(settings) {
    return settings.$element.find('.elementor-portfolio').length;
  },
  getSkinPrefix() {
    return '';
  },
  getDefaultSettings() {
    var settings = _posts.default.prototype.getDefaultSettings.apply(this, arguments);
    settings.transitionDuration = 450;
    jQuery.extend(settings.classes, {
      active: 'elementor-active',
      item: 'elementor-portfolio-item',
      ghostItem: 'elementor-portfolio-ghost-item'
    });
    return settings;
  },
  getDefaultElements() {
    var elements = _posts.default.prototype.getDefaultElements.apply(this, arguments);
    elements.$filterButtons = this.$element.find('.elementor-portfolio__filter');
    return elements;
  },
  getOffset(itemIndex, itemWidth, itemHeight) {
    var settings = this.getSettings(),
      itemGap = this.elements.$postsContainer.width() / settings.colsCount - itemWidth;
    itemGap += itemGap / (settings.colsCount - 1);
    return {
      start: (itemWidth + itemGap) * (itemIndex % settings.colsCount),
      top: (itemHeight + itemGap) * Math.floor(itemIndex / settings.colsCount)
    };
  },
  getClosureMethodsNames() {
    var baseClosureMethods = _posts.default.prototype.getClosureMethodsNames.apply(this, arguments);
    return baseClosureMethods.concat(['onFilterButtonClick']);
  },
  filterItems(term) {
    var $posts = this.elements.$posts,
      activeClass = this.getSettings('classes.active'),
      termSelector = '.elementor-filter-' + term;
    if ('__all' === term) {
      $posts.addClass(activeClass);
      return;
    }
    $posts.not(termSelector).removeClass(activeClass);
    $posts.filter(termSelector).addClass(activeClass);
  },
  removeExtraGhostItems() {
    var settings = this.getSettings(),
      $shownItems = this.elements.$posts.filter(':visible'),
      emptyColumns = (settings.colsCount - $shownItems.length % settings.colsCount) % settings.colsCount,
      $ghostItems = this.elements.$postsContainer.find('.' + settings.classes.ghostItem);
    $ghostItems.slice(emptyColumns).remove();
  },
  handleEmptyColumns() {
    this.removeExtraGhostItems();
    var settings = this.getSettings(),
      $shownItems = this.elements.$posts.filter(':visible'),
      $ghostItems = this.elements.$postsContainer.find('.' + settings.classes.ghostItem),
      emptyColumns = (settings.colsCount - ($shownItems.length + $ghostItems.length) % settings.colsCount) % settings.colsCount;
    for (var i = 0; i < emptyColumns; i++) {
      this.elements.$postsContainer.append(jQuery('<div>', {
        class: settings.classes.item + ' ' + settings.classes.ghostItem
      }));
    }
  },
  showItems($activeHiddenItems) {
    $activeHiddenItems.show();
    setTimeout(function () {
      $activeHiddenItems.css({
        opacity: 1
      });
    });
  },
  hideItems($inactiveShownItems) {
    $inactiveShownItems.hide();
  },
  arrangeGrid() {
    var $ = jQuery,
      self = this,
      settings = self.getSettings(),
      $activeItems = self.elements.$posts.filter('.' + settings.classes.active),
      $inactiveItems = self.elements.$posts.not('.' + settings.classes.active),
      $activeHiddenItems = $activeItems.filter(':hidden'),
      $inactiveShownItems = $inactiveItems.filter(':visible');
    self.elements.$posts.css('transition-duration', settings.transitionDuration + 'ms');
    self.showItems($activeHiddenItems);
    if (self.isEdit) {
      self.fitImages();
    }
    self.handleEmptyColumns();
    if (self.isMasonryEnabled()) {
      self.hideItems($inactiveShownItems);
      self.showItems($activeHiddenItems);
      self.handleEmptyColumns();
      self.runMasonry();
      return;
    }
    $inactiveShownItems.css({
      opacity: 0,
      transform: 'scale3d(0.2, 0.2, 1)'
    });
    const $shownItems = self.elements.$posts.filter(':visible'),
      $activeOrShownItems = $activeItems.add($shownItems),
      $activeShownItems = $activeItems.filter(':visible'),
      itemWidth = $shownItems.outerWidth(),
      itemHeight = $shownItems.outerHeight();
    $activeShownItems.each(function () {
      var $item = $(this),
        currentOffset = self.getOffset($activeOrShownItems.index($item), itemWidth, itemHeight),
        requiredOffset = self.getOffset($shownItems.index($item), itemWidth, itemHeight);
      if (currentOffset.start === requiredOffset.start && currentOffset.top === requiredOffset.top) {
        return;
      }
      requiredOffset.start -= currentOffset.start;
      requiredOffset.top -= currentOffset.top;
      if (elementorFrontend.config.is_rtl) {
        requiredOffset.start *= -1;
      }
      $item.css({
        transitionDuration: '',
        transform: 'translate3d(' + requiredOffset.start + 'px, ' + requiredOffset.top + 'px, 0)'
      });
    });
    setTimeout(function () {
      $activeItems.each(function () {
        var $item = $(this),
          currentOffset = self.getOffset($activeOrShownItems.index($item), itemWidth, itemHeight),
          requiredOffset = self.getOffset($activeItems.index($item), itemWidth, itemHeight);
        $item.css({
          transitionDuration: settings.transitionDuration + 'ms'
        });
        requiredOffset.start -= currentOffset.start;
        requiredOffset.top -= currentOffset.top;
        if (elementorFrontend.config.is_rtl) {
          requiredOffset.start *= -1;
        }
        setTimeout(function () {
          $item.css('transform', 'translate3d(' + requiredOffset.start + 'px, ' + requiredOffset.top + 'px, 0)');
        });
      });
    });
    setTimeout(function () {
      self.hideItems($inactiveShownItems);
      $activeItems.css({
        transitionDuration: '',
        transform: 'translate3d(0px, 0px, 0px)'
      });
      self.handleEmptyColumns();
    }, settings.transitionDuration);
  },
  activeFilterButton(filter) {
    var activeClass = this.getSettings('classes.active'),
      $filterButtons = this.elements.$filterButtons,
      $button = $filterButtons.filter('[data-filter="' + filter + '"]');
    $filterButtons.removeClass(activeClass);
    $button.addClass(activeClass);
  },
  setFilter(filter) {
    this.activeFilterButton(filter);
    this.filterItems(filter);
    this.arrangeGrid();
  },
  refreshGrid() {
    this.setColsCountSettings();
    this.arrangeGrid();
  },
  bindEvents() {
    _posts.default.prototype.bindEvents.apply(this, arguments);
    this.elements.$filterButtons.on('click', this.onFilterButtonClick);
  },
  isMasonryEnabled() {
    return !!this.getElementSettings('masonry');
  },
  run() {
    _posts.default.prototype.run.apply(this, arguments);
    this.setColsCountSettings();
    this.setFilter('__all');
    this.handleEmptyColumns();
  },
  onFilterButtonClick(event) {
    this.setFilter(jQuery(event.currentTarget).data('filter'));
  },
  onWindowResize() {
    _posts.default.prototype.onWindowResize.apply(this, arguments);
    this.refreshGrid();
  },
  onElementChange(propertyName) {
    _posts.default.prototype.onElementChange.apply(this, arguments);
    if ('classic_item_ratio' === propertyName) {
      this.refreshGrid();
    }
  }
});

/***/ }),

/***/ "../modules/posts/assets/js/frontend/handlers/posts.js":
/*!*************************************************************!*\
  !*** ../modules/posts/assets/js/frontend/handlers/posts.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _default = exports["default"] = elementorModules.frontend.handlers.Base.extend({
  getSkinPrefix() {
    return 'classic_';
  },
  bindEvents() {
    elementorFrontend.addListenerOnce(this.getModelCID(), 'resize', this.onWindowResize);
  },
  unbindEvents() {
    elementorFrontend.removeListeners(this.getModelCID(), 'resize', this.onWindowResize);
  },
  getClosureMethodsNames() {
    return elementorModules.frontend.handlers.Base.prototype.getClosureMethodsNames.apply(this, arguments).concat(['fitImages', 'onWindowResize', 'runMasonry']);
  },
  getDefaultSettings() {
    return {
      classes: {
        fitHeight: 'elementor-fit-height',
        hasItemRatio: 'elementor-has-item-ratio'
      },
      selectors: {
        postsContainer: '.elementor-posts-container',
        post: '.elementor-post',
        postThumbnail: '.elementor-post__thumbnail',
        postThumbnailImage: '.elementor-post__thumbnail img'
      }
    };
  },
  getDefaultElements() {
    var selectors = this.getSettings('selectors');
    return {
      $postsContainer: this.$element.find(selectors.postsContainer),
      $posts: this.$element.find(selectors.post)
    };
  },
  fitImage($post) {
    var settings = this.getSettings(),
      $imageParent = $post.find(settings.selectors.postThumbnail),
      $image = $imageParent.find('img'),
      image = $image[0];
    if (!image) {
      return;
    }
    var imageParentRatio = $imageParent.outerHeight() / $imageParent.outerWidth(),
      imageRatio = image.naturalHeight / image.naturalWidth;
    $imageParent.toggleClass(settings.classes.fitHeight, imageRatio < imageParentRatio);
  },
  fitImages() {
    var $ = jQuery,
      self = this,
      itemRatio = getComputedStyle(this.$element[0], ':after').content,
      settings = this.getSettings();
    if (self.isMasonryEnabled()) {
      this.elements.$postsContainer.removeClass(settings.classes.hasItemRatio);
      return;
    }
    this.elements.$postsContainer.toggleClass(settings.classes.hasItemRatio, !!itemRatio.match(/\d/));
    this.elements.$posts.each(function () {
      var $post = $(this),
        $image = $post.find(settings.selectors.postThumbnailImage);
      self.fitImage($post);
      $image.on('load', function () {
        self.fitImage($post);
      });
    });
  },
  setColsCountSettings() {
    const settings = this.getElementSettings(),
      skinPrefix = this.getSkinPrefix(),
      colsCount = elementorProFrontend.utils.controls.getResponsiveControlValue(settings, `${skinPrefix}columns`);
    this.setSettings('colsCount', colsCount);
  },
  isMasonryEnabled() {
    return !!this.getElementSettings(this.getSkinPrefix() + 'masonry');
  },
  initMasonry() {
    imagesLoaded(this.elements.$posts, this.runMasonry);
  },
  getVerticalSpaceBetween() {
    /* The `verticalSpaceBetween` variable is set up in a way that supports older versions of the portfolio widget */
    let verticalSpaceBetween = elementorProFrontend.utils.controls.getResponsiveControlValue(this.getElementSettings(), `${this.getSkinPrefix()}row_gap`, 'size');
    if ('' === this.getSkinPrefix() && '' === verticalSpaceBetween) {
      verticalSpaceBetween = this.getElementSettings('item_gap.size');
    }
    return verticalSpaceBetween;
  },
  runMasonry() {
    var elements = this.elements;
    elements.$posts.css({
      marginTop: '',
      transitionDuration: ''
    });
    this.setColsCountSettings();
    var colsCount = this.getSettings('colsCount'),
      hasMasonry = this.isMasonryEnabled() && colsCount >= 2;
    elements.$postsContainer.toggleClass('elementor-posts-masonry', hasMasonry);
    if (!hasMasonry) {
      elements.$postsContainer.height('');
      return;
    }
    const verticalSpaceBetween = this.getVerticalSpaceBetween();
    var masonry = new elementorModules.utils.Masonry({
      container: elements.$postsContainer,
      items: elements.$posts.filter(':visible'),
      columnsCount: this.getSettings('colsCount'),
      verticalSpaceBetween: verticalSpaceBetween || 0
    });
    masonry.run();
  },
  run() {
    // For slow browsers
    setTimeout(this.fitImages, 0);
    this.initMasonry();
  },
  onInit() {
    elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments);
    this.bindEvents();
    this.run();
  },
  onWindowResize() {
    this.fitImages();
    this.runMasonry();
  },
  onElementChange() {
    this.fitImages();
    setTimeout(this.runMasonry);
  }
});

/***/ }),

/***/ "../modules/share-buttons/assets/js/frontend/frontend-legacy.js":
/*!**********************************************************************!*\
  !*** ../modules/share-buttons/assets/js/frontend/frontend-legacy.js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _shareButtons = _interopRequireDefault(__webpack_require__(/*! ./handlers/share-buttons */ "../modules/share-buttons/assets/js/frontend/handlers/share-buttons.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('share-buttons', _shareButtons.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/share-buttons/assets/js/frontend/handlers/share-buttons.js":
/*!*****************************************************************************!*\
  !*** ../modules/share-buttons/assets/js/frontend/handlers/share-buttons.js ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _handleParameterPollution = _interopRequireDefault(__webpack_require__(/*! elementor-pro/frontend/utils/handle-parameter-pollution */ "../assets/dev/js/frontend/utils/handle-parameter-pollution.js"));
var _default = exports["default"] = elementorModules.frontend.handlers.Base.extend({
  async onInit() {
    if (!this.isActive()) {
      return;
    }
    elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments);
    const elementSettings = this.getElementSettings(),
      classes = this.getSettings('classes'),
      isCustomURL = elementSettings.share_url && elementSettings.share_url.url,
      shareLinkSettings = {
        classPrefix: classes.shareLinkPrefix
      };
    if (isCustomURL) {
      shareLinkSettings.url = elementSettings.share_url.url;
    } else {
      shareLinkSettings.url = (0, _handleParameterPollution.default)(location.href);
      shareLinkSettings.title = elementorFrontend.config.post.title;
      shareLinkSettings.text = elementorFrontend.config.post.excerpt;
      shareLinkSettings.image = elementorFrontend.config.post.featuredImage;
    }

    /**
     * First check of the ShareLink is for detecting if the optimized mode is disabled and the library should be loaded dynamically.
     * Checking if the assetsLoader exist, in case that the library is not loaded due to Ad Blockers and not because the optimized mode is enabled.
     */
    if (!window.ShareLink && elementorFrontend.utils.assetsLoader) {
      await elementorFrontend.utils.assetsLoader.load('script', 'share-link');
    }

    /**
     * The following condition should remain regardless of the share-link dynamic loading.
     * Ad Blockers may block the share script. (/assets/lib/share-link/share-link.js).
     */
    if (!this.elements.$shareButton.shareLink) {
      return;
    }
    this.elements.$shareButton.shareLink(shareLinkSettings);
  },
  getDefaultSettings() {
    return {
      selectors: {
        shareButton: '.elementor-share-btn'
      },
      classes: {
        shareLinkPrefix: 'elementor-share-btn_'
      }
    };
  },
  getDefaultElements() {
    var selectors = this.getSettings('selectors');
    return {
      $shareButton: this.$element.find(selectors.shareButton)
    };
  },
  isActive() {
    return !elementorFrontend.isEditMode();
  }
});

/***/ }),

/***/ "../modules/slides/assets/js/frontend/frontend-legacy.js":
/*!***************************************************************!*\
  !*** ../modules/slides/assets/js/frontend/frontend-legacy.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _slides = _interopRequireDefault(__webpack_require__(/*! ./handlers/slides */ "../modules/slides/assets/js/frontend/handlers/slides.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('slides', _slides.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/slides/assets/js/frontend/handlers/slides.js":
/*!***************************************************************!*\
  !*** ../modules/slides/assets/js/frontend/handlers/slides.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class SlidesHandler extends elementorModules.frontend.handlers.SwiperBase {
  getDefaultSettings() {
    return {
      selectors: {
        slider: '.elementor-slides-wrapper',
        slide: '.swiper-slide',
        slideInnerContents: '.swiper-slide-contents',
        activeSlide: '.swiper-slide-active',
        activeDuplicate: '.swiper-slide-duplicate-active'
      },
      classes: {
        animated: 'animated',
        kenBurnsActive: 'elementor-ken-burns--active',
        slideBackground: 'swiper-slide-bg'
      },
      attributes: {
        dataSliderOptions: 'slider_options',
        dataAnimation: 'animation'
      }
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors'),
      elements = {
        $swiperContainer: this.$element.find(selectors.slider)
      };
    elements.$slides = elements.$swiperContainer.find(selectors.slide);
    return elements;
  }
  getSwiperOptions() {
    const elementSettings = this.getElementSettings(),
      swiperOptions = {
        autoplay: this.getAutoplayConfig(),
        grabCursor: true,
        initialSlide: this.getInitialSlide(),
        slidesPerView: 1,
        slidesPerGroup: 1,
        loop: 'yes' === elementSettings.infinite,
        speed: elementSettings.transition_speed,
        effect: elementSettings.transition,
        observeParents: true,
        observer: true,
        handleElementorBreakpoints: true,
        on: {
          slideChange: () => {
            this.handleKenBurns();
          }
        }
      };
    const showArrows = 'arrows' === elementSettings.navigation || 'both' === elementSettings.navigation,
      pagination = 'dots' === elementSettings.navigation || 'both' === elementSettings.navigation;
    if (showArrows) {
      swiperOptions.navigation = {
        prevEl: '.elementor-swiper-button-prev',
        nextEl: '.elementor-swiper-button-next'
      };
    }
    if (pagination) {
      swiperOptions.pagination = {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      };
    }
    if (true === swiperOptions.loop) {
      swiperOptions.loopedSlides = this.getSlidesCount();
    }
    if ('fade' === swiperOptions.effect) {
      swiperOptions.fadeEffect = {
        crossFade: true
      };
    }
    return swiperOptions;
  }
  getAutoplayConfig() {
    const elementSettings = this.getElementSettings();
    if ('yes' !== elementSettings.autoplay) {
      return false;
    }
    return {
      stopOnLastSlide: true,
      // Has no effect in infinite mode by default.
      delay: elementSettings.autoplay_speed,
      disableOnInteraction: 'yes' === elementSettings.pause_on_interaction
    };
  }
  initSingleSlideAnimations() {
    const settings = this.getSettings(),
      animation = this.elements.$swiperContainer.data(settings.attributes.dataAnimation);
    this.elements.$swiperContainer.find('.' + settings.classes.slideBackground).addClass(settings.classes.kenBurnsActive);

    // If there is an animation, get the container of the slide's inner contents and add the animation classes to it
    if (animation) {
      this.elements.$swiperContainer.find(settings.selectors.slideInnerContents).addClass(settings.classes.animated + ' ' + animation);
    }
  }
  async initSlider() {
    const $slider = this.elements.$swiperContainer;
    if (!$slider.length) {
      return;
    }
    if (1 >= this.getSlidesCount()) {
      return;
    }
    const Swiper = elementorFrontend.utils.swiper;
    this.swiper = await new Swiper($slider, this.getSwiperOptions());

    // Expose the swiper instance in the frontend
    $slider.data('swiper', this.swiper);

    // The Ken Burns effect will only apply on the specific slides that toggled the effect ON,
    // since it depends on an additional class besides 'elementor-ken-burns--active'
    this.handleKenBurns();
    const elementSettings = this.getElementSettings();
    if (elementSettings.pause_on_hover) {
      this.togglePauseOnHover(true);
    }
    const settings = this.getSettings();
    const animation = $slider.data(settings.attributes.dataAnimation);
    if (!animation) {
      return;
    }
    this.swiper.on('slideChangeTransitionStart', function () {
      const $sliderContent = $slider.find(settings.selectors.slideInnerContents);
      $sliderContent.removeClass(settings.classes.animated + ' ' + animation).hide();
    });
    this.swiper.on('slideChangeTransitionEnd', function () {
      const $currentSlide = $slider.find(settings.selectors.slideInnerContents);
      $currentSlide.show().addClass(settings.classes.animated + ' ' + animation);
    });
  }
  onInit() {
    elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments);
    if (2 > this.getSlidesCount()) {
      this.initSingleSlideAnimations();
      return;
    }
    this.initSlider();
  }
  getChangeableProperties() {
    return {
      pause_on_hover: 'pauseOnHover',
      pause_on_interaction: 'disableOnInteraction',
      autoplay_speed: 'delay',
      transition_speed: 'speed'
    };
  }
  updateSwiperOption(propertyName) {
    if (0 === propertyName.indexOf('width')) {
      this.swiper.update();
      return;
    }
    const elementSettings = this.getElementSettings(),
      newSettingValue = elementSettings[propertyName],
      changeableProperties = this.getChangeableProperties();
    let propertyToUpdate = changeableProperties[propertyName],
      valueToUpdate = newSettingValue;

    // Handle special cases where the value to update is not the value that the Swiper library accepts
    switch (propertyName) {
      case 'autoplay_speed':
        propertyToUpdate = 'autoplay';
        valueToUpdate = {
          delay: newSettingValue,
          disableOnInteraction: 'yes' === elementSettings.pause_on_interaction
        };
        break;
      case 'pause_on_hover':
        this.togglePauseOnHover('yes' === newSettingValue);
        break;
      case 'pause_on_interaction':
        valueToUpdate = 'yes' === newSettingValue;
        break;
    }

    // 'pause_on_hover' is implemented by the handler with event listeners, not the Swiper library
    if ('pause_on_hover' !== propertyName) {
      this.swiper.params[propertyToUpdate] = valueToUpdate;
    }
    this.swiper.update();
  }
  onElementChange(propertyName) {
    if (1 >= this.getSlidesCount()) {
      return;
    }
    const changeableProperties = this.getChangeableProperties();
    if (Object.prototype.hasOwnProperty.call(changeableProperties, propertyName)) {
      this.updateSwiperOption(propertyName);
      this.swiper.autoplay.start();
    }
  }
  onEditSettingsChange(propertyName) {
    if (1 >= this.getSlidesCount()) {
      return;
    }
    if ('activeItemIndex' === propertyName) {
      this.swiper.slideToLoop(this.getEditSettings('activeItemIndex') - 1);
      this.swiper.autoplay.stop();
    }
  }
}
exports["default"] = SlidesHandler;

/***/ }),

/***/ "../modules/social/assets/js/frontend/frontend-legacy.js":
/*!***************************************************************!*\
  !*** ../modules/social/assets/js/frontend/frontend-legacy.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _facebook = _interopRequireDefault(__webpack_require__(/*! ./handlers/facebook */ "../modules/social/assets/js/frontend/handlers/facebook.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('facebook-button', _facebook.default);
    elementorFrontend.elementsHandler.attachHandler('facebook-comments', _facebook.default);
    elementorFrontend.elementsHandler.attachHandler('facebook-embed', _facebook.default);
    elementorFrontend.elementsHandler.attachHandler('facebook-page', _facebook.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/social/assets/js/frontend/handlers/facebook.js":
/*!*****************************************************************!*\
  !*** ../modules/social/assets/js/frontend/handlers/facebook.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class FacebookHandler extends elementorModules.frontend.handlers.Base {
  getConfig() {
    return elementorProFrontend.config.facebook_sdk;
  }
  setConfig(prop, value) {
    elementorProFrontend.config.facebook_sdk[prop] = value;
  }
  parse() {
    // On FB SDK is loaded, parse current element
    FB.XFBML.parse(this.$element[0]);
  }
  loadSDK() {
    const config = this.getConfig();

    // Preventing from ajax request to be sent multiple times when loading multiple widgets
    if (config.isLoading || config.isLoaded) {
      return;
    }
    this.setConfig('isLoading', true);
    jQuery.ajax({
      url: 'https://connect.facebook.net/' + config.lang + '/sdk.js',
      dataType: 'script',
      cache: true,
      success: () => {
        FB.init({
          appId: config.app_id,
          version: 'v2.10',
          xfbml: false
        });
        this.setConfig('isLoaded', true);
        this.setConfig('isLoading', false);
        elementorFrontend.elements.$document.trigger('fb:sdk:loaded');
      }
    });
  }
  onInit() {
    super.onInit(...arguments);
    this.loadSDK();
    const config = this.getConfig();
    if (config.isLoaded) {
      this.parse();
    } else {
      elementorFrontend.elements.$document.on('fb:sdk:loaded', () => this.parse());
    }
  }
}
exports["default"] = FacebookHandler;

/***/ }),

/***/ "../modules/table-of-contents/assets/js/frontend/frontend-legacy.js":
/*!**************************************************************************!*\
  !*** ../modules/table-of-contents/assets/js/frontend/frontend-legacy.js ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _tableOfContents = _interopRequireDefault(__webpack_require__(/*! ./handlers/table-of-contents */ "../modules/table-of-contents/assets/js/frontend/handlers/table-of-contents.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('table-of-contents', _tableOfContents.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/table-of-contents/assets/js/frontend/handlers/table-of-contents.js":
/*!*************************************************************************************!*\
  !*** ../modules/table-of-contents/assets/js/frontend/handlers/table-of-contents.js ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";
/* provided dependency */ var __ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n")["__"];


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _dompurify = _interopRequireDefault(__webpack_require__(/*! dompurify */ "../node_modules/dompurify/dist/purify.js"));
class TOCHandler extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    const elementSettings = this.getElementSettings(),
      listWrapperTag = 'numbers' === elementSettings.marker_view ? 'ol' : 'ul';
    return {
      selectors: {
        widgetContainer: '.elementor-widget-container',
        postContentContainer: '.elementor:not([data-elementor-type="header"]):not([data-elementor-type="footer"]):not([data-elementor-type="popup"])',
        expandButton: '.elementor-toc__toggle-button--expand',
        collapseButton: '.elementor-toc__toggle-button--collapse',
        body: '.elementor-toc__body',
        headerTitle: '.elementor-toc__header-title'
      },
      classes: {
        anchor: 'elementor-menu-anchor',
        listWrapper: 'elementor-toc__list-wrapper',
        listItem: 'elementor-toc__list-item',
        listTextWrapper: 'elementor-toc__list-item-text-wrapper',
        firstLevelListItem: 'elementor-toc__top-level',
        listItemText: 'elementor-toc__list-item-text',
        activeItem: 'elementor-item-active',
        headingAnchor: 'elementor-toc__heading-anchor',
        collapsed: 'elementor-toc--collapsed'
      },
      listWrapperTag
    };
  }
  getDefaultElements() {
    const settings = this.getSettings();
    return {
      $pageContainer: this.getContainer(),
      $widgetContainer: this.$element.find(settings.selectors.widgetContainer),
      $expandButton: this.$element.find(settings.selectors.expandButton),
      $collapseButton: this.$element.find(settings.selectors.collapseButton),
      $tocBody: this.$element.find(settings.selectors.body),
      $listItems: this.$element.find('.' + settings.classes.listItem)
    };
  }
  getContainer() {
    const elementSettings = this.getElementSettings();

    // If there is a custom container defined by the user, use it as the headings-scan container
    if (elementSettings.container) {
      return jQuery(_dompurify.default.sanitize(elementSettings.container));
    }

    // Get the document wrapper element in which the TOC is located
    const $documentWrapper = this.$element.parents('.elementor');

    // If the TOC container is a popup, only scan the popup for headings
    if ('popup' === $documentWrapper.attr('data-elementor-type')) {
      return $documentWrapper;
    }

    // If the TOC container is anything other than a popup, scan only the post/page content for headings
    const settings = this.getSettings();
    return jQuery(settings.selectors.postContentContainer);
  }
  bindEvents() {
    const elementSettings = this.getElementSettings();
    if (elementSettings.minimize_box) {
      this.elements.$expandButton.on('click', () => this.expandBox()).on('keyup', event => this.triggerClickOnEnterSpace(event));
      this.elements.$collapseButton.on('click', () => this.collapseBox()).on('keyup', event => this.triggerClickOnEnterSpace(event));
    }
    if (elementSettings.collapse_subitems) {
      this.elements.$listItems.on('hover', event => jQuery(event.target).slideToggle());
    }
  }
  getHeadings() {
    // Get all headings from document by user-selected tags
    const elementSettings = this.getElementSettings(),
      tags = elementSettings.headings_by_tags.join(','),
      selectors = this.getSettings('selectors'),
      excludedSelectors = elementSettings.exclude_headings_by_selector;
    return this.elements.$pageContainer.find(tags).not(selectors.headerTitle).filter((index, heading) => {
      return !jQuery(heading).closest(excludedSelectors).length; // Handle excluded selectors if there are any
    });
  }

  addAnchorsBeforeHeadings() {
    const classes = this.getSettings('classes');

    // Add an anchor element right before each TOC heading to create anchors for TOC links
    this.elements.$headings.before(index => {
      // Check if the heading element itself has an ID, or if it is a widget which includes a main heading element, whether the widget wrapper has an ID
      if (jQuery(this.elements.$headings[index]).data('hasOwnID')) {
        return;
      }
      return `<span id="${classes.headingAnchor}-${index}" class="${classes.anchor} "></span>`;
    });
  }
  activateItem($listItem) {
    const classes = this.getSettings('classes');
    this.deactivateActiveItem($listItem);
    $listItem.addClass(classes.activeItem);
    this.$activeItem = $listItem;
    if (!this.getElementSettings('collapse_subitems')) {
      return;
    }
    let $activeList;
    if ($listItem.hasClass(classes.firstLevelListItem)) {
      $activeList = $listItem.parent().next();
    } else {
      $activeList = $listItem.parents('.' + classes.listWrapper).eq(-2);
    }
    if (!$activeList.length) {
      delete this.$activeList;
      return;
    }
    this.$activeList = $activeList;
    this.$activeList.stop().slideDown();
  }
  deactivateActiveItem($activeToBe) {
    if (!this.$activeItem || this.$activeItem.is($activeToBe)) {
      return;
    }
    const {
      classes
    } = this.getSettings();
    this.$activeItem.removeClass(classes.activeItem);
    if (this.$activeList && (!$activeToBe || !this.$activeList[0].contains($activeToBe[0]))) {
      this.$activeList.slideUp();
    }
  }
  followAnchor($element, index) {
    const anchorSelector = $element[0].hash;
    let $anchor;
    try {
      // `decodeURIComponent` for UTF8 characters in the hash.
      $anchor = jQuery(decodeURIComponent(anchorSelector));
    } catch (e) {
      return;
    }
    elementorFrontend.waypoint($anchor, direction => {
      if (this.itemClicked) {
        return;
      }
      const id = $anchor.attr('id');
      if ('down' === direction) {
        this.viewportItems[id] = true;
        this.activateItem($element);
      } else {
        delete this.viewportItems[id];
        this.activateItem(this.$listItemTexts.eq(index - 1));
      }
    }, {
      offset: 'bottom-in-view',
      triggerOnce: false
    });
    elementorFrontend.waypoint($anchor, direction => {
      if (this.itemClicked) {
        return;
      }
      const id = $anchor.attr('id');
      if ('down' === direction) {
        delete this.viewportItems[id];
        if (Object.keys(this.viewportItems).length) {
          this.activateItem(this.$listItemTexts.eq(index + 1));
        }
      } else {
        this.viewportItems[id] = true;
        this.activateItem($element);
      }
    }, {
      offset: 0,
      triggerOnce: false
    });
  }
  followAnchors() {
    this.$listItemTexts.each((index, element) => this.followAnchor(jQuery(element), index));
  }
  populateTOC() {
    this.listItemPointer = 0;
    const elementSettings = this.getElementSettings();
    if (elementSettings.hierarchical_view) {
      this.createNestedList();
    } else {
      this.createFlatList();
    }
    this.$listItemTexts = this.$element.find('.elementor-toc__list-item-text');
    this.$listItemTexts.on('click', this.onListItemClick.bind(this));
    if (!elementorFrontend.isEditMode()) {
      this.followAnchors();
    }
  }
  createNestedList() {
    this.headingsData.forEach((heading, index) => {
      heading.level = 0;
      for (let i = index - 1; i >= 0; i--) {
        const currentOrderedItem = this.headingsData[i];
        if (currentOrderedItem.tag <= heading.tag) {
          heading.level = currentOrderedItem.level;
          if (currentOrderedItem.tag < heading.tag) {
            heading.level++;
          }
          break;
        }
      }
    });
    this.elements.$tocBody.html(this.getNestedLevel(0));
  }
  createFlatList() {
    this.elements.$tocBody.html(this.getNestedLevel());
  }
  getNestedLevel(level) {
    const settings = this.getSettings(),
      elementSettings = this.getElementSettings(),
      icon = this.getElementSettings('icon');
    let renderedIcon;
    if (icon) {
      // We generate the icon markup in PHP and make it available via get_frontend_settings(). As a result, the
      // rendered icon is not available in the editor, so in the editor we use the regular <i> tag.
      if (elementorFrontend.config.experimentalFeatures.e_font_icon_svg && !elementorFrontend.isEditMode()) {
        renderedIcon = typeof icon.rendered_tag !== 'undefined' ? icon.rendered_tag : '';
      } else {
        renderedIcon = icon.value ? `<i class="${icon.value}"></i>` : '';
      }
    }

    // Open new list/nested list
    let html = `<${settings.listWrapperTag} class="${settings.classes.listWrapper}">`;

    // For each list item, build its markup.
    while (this.listItemPointer < this.headingsData.length) {
      const currentItem = this.headingsData[this.listItemPointer];
      let listItemTextClasses = settings.classes.listItemText;
      if (0 === currentItem.level) {
        // If the current list item is a top level item, give it the first level class
        listItemTextClasses += ' ' + settings.classes.firstLevelListItem;
      }
      if (level > currentItem.level) {
        break;
      }
      if (level === currentItem.level) {
        html += `<li class="${settings.classes.listItem}">`;
        html += `<div class="${settings.classes.listTextWrapper}">`;
        let liContent = `<a href="#${currentItem.anchorLink}" class="${listItemTextClasses}">${currentItem.text}</a>`;

        // If list type is bullets, add the bullet icon as an <i> tag
        if ('bullets' === elementSettings.marker_view && icon) {
          liContent = `${renderedIcon}${liContent}`;
        }
        html += liContent;
        html += '</div>';
        this.listItemPointer++;
        const nextItem = this.headingsData[this.listItemPointer];
        if (nextItem && level < nextItem.level) {
          // If a new nested list has to be created under the current item,
          // this entire method is called recursively (outside the while loop, a list wrapper is created)
          html += this.getNestedLevel(nextItem.level);
        }
        html += '</li>';
      }
    }
    html += `</${settings.listWrapperTag}>`;
    return html;
  }
  handleNoHeadingsFound() {
    const noHeadingsText = __('No headings were found on this page.', 'elementor-pro');
    return this.elements.$tocBody.html(noHeadingsText);
  }
  collapseBodyListener() {
    const activeBreakpoints = elementorFrontend.breakpoints.getActiveBreakpointsList({
      withDesktop: true
    });
    const minimizedOn = this.getElementSettings('minimized_on'),
      currentDeviceMode = elementorFrontend.getCurrentDeviceMode(),
      isCollapsed = this.$element.hasClass(this.getSettings('classes.collapsed'));

    // If minimizedOn value is set to desktop, it applies for widescreen as well.
    if ('desktop' === minimizedOn || activeBreakpoints.indexOf(minimizedOn) >= activeBreakpoints.indexOf(currentDeviceMode)) {
      if (!isCollapsed) {
        this.collapseBox(false);
      }
    } else if (isCollapsed) {
      this.expandBox(false);
    }
  }
  onElementChange(settings) {
    if ('minimized_on' === settings) {
      this.collapseBodyListener();
    }
  }
  getHeadingAnchorLink(index, classes) {
    const headingID = this.elements.$headings[index].id,
      wrapperID = this.elements.$headings[index].closest('.elementor-widget').id;
    let anchorLink = '';
    if (headingID) {
      anchorLink = headingID;
    } else if (wrapperID) {
      // If the heading itself has an ID, we don't want to overwrite it
      anchorLink = wrapperID;
    }

    // If there is no existing ID, use the heading text to create a semantic ID
    if (headingID || wrapperID) {
      jQuery(this.elements.$headings[index]).data('hasOwnID', true);
    } else {
      anchorLink = `${classes.headingAnchor}-${index}`;
    }
    return anchorLink;
  }
  setHeadingsData() {
    this.headingsData = [];
    const classes = this.getSettings('classes');

    // Create an array for simplifying TOC list creation
    this.elements.$headings.each((index, element) => {
      const anchorLink = this.getHeadingAnchorLink(index, classes);
      this.headingsData.push({
        tag: +element.nodeName.slice(1),
        text: element.textContent,
        anchorLink
      });
    });
  }
  run() {
    this.elements.$headings = this.getHeadings();
    if (!this.elements.$headings.length) {
      return this.handleNoHeadingsFound();
    }
    this.setHeadingsData();
    if (!elementorFrontend.isEditMode()) {
      this.addAnchorsBeforeHeadings();
    }
    this.populateTOC();
    if (this.getElementSettings('minimize_box')) {
      this.collapseBodyListener();
    }
  }
  expandBox() {
    let changeFocus = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
    const boxHeight = this.getCurrentDeviceSetting('min_height');
    this.$element.removeClass(this.getSettings('classes.collapsed'));
    this.elements.$tocBody.slideDown();
    this.elements.$expandButton.attr('aria-expanded', 'true');
    this.elements.$collapseButton.attr('aria-expanded', 'true');

    // Return container to the full height in case a min-height is defined by the user
    this.elements.$widgetContainer.css('min-height', boxHeight.size + boxHeight.unit);
    if (changeFocus) {
      this.elements.$collapseButton.trigger('focus');
    }
  }
  collapseBox() {
    let changeFocus = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
    this.$element.addClass(this.getSettings('classes.collapsed'));
    this.elements.$tocBody.slideUp();
    this.elements.$expandButton.attr('aria-expanded', 'false');
    this.elements.$collapseButton.attr('aria-expanded', 'false');

    // Close container in case a min-height is defined by the user
    this.elements.$widgetContainer.css('min-height', '0px');
    if (changeFocus) {
      this.elements.$expandButton.trigger('focus');
    }
  }
  triggerClickOnEnterSpace(event) {
    const ENTER_KEY = 13,
      SPACE_KEY = 32;
    if (ENTER_KEY === event.keyCode || SPACE_KEY === event.keyCode) {
      event.currentTarget.click();
      event.stopPropagation();
    }
  }
  onInit() {
    super.onInit(...arguments);
    this.viewportItems = [];
    jQuery(() => this.run());
  }
  onListItemClick(event) {
    this.itemClicked = true;
    setTimeout(() => this.itemClicked = false, 2000);
    const $clickedItem = jQuery(event.target),
      $list = $clickedItem.parent().next(),
      collapseNestedList = this.getElementSettings('collapse_subitems');
    let listIsActive;
    if (collapseNestedList && $clickedItem.hasClass(this.getSettings('classes.firstLevelListItem'))) {
      if ($list.is(':visible')) {
        listIsActive = true;
      }
    }
    this.activateItem($clickedItem);
    if (collapseNestedList && listIsActive) {
      $list.slideUp();
    }
  }
}
exports["default"] = TOCHandler;

/***/ }),

/***/ "../modules/theme-builder/assets/js/frontend/frontend-legacy.js":
/*!**********************************************************************!*\
  !*** ../modules/theme-builder/assets/js/frontend/frontend-legacy.js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _archivePostsSkinClassic = _interopRequireDefault(__webpack_require__(/*! ./handlers/archive-posts-skin-classic */ "../modules/theme-builder/assets/js/frontend/handlers/archive-posts-skin-classic.js"));
var _archivePostsSkinCards = _interopRequireDefault(__webpack_require__(/*! ./handlers/archive-posts-skin-cards */ "../modules/theme-builder/assets/js/frontend/handlers/archive-posts-skin-cards.js"));
var _archivePostsLoadMore = _interopRequireDefault(__webpack_require__(/*! ./handlers/archive-posts-load-more */ "../modules/theme-builder/assets/js/frontend/handlers/archive-posts-load-more.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    ['archive_classic', 'archive_full_content', 'archive_cards'].forEach(skinName => {
      elementorFrontend.elementsHandler.attachHandler('archive-posts', _archivePostsLoadMore.default, skinName);
    });
    elementorFrontend.elementsHandler.attachHandler('archive-posts', _archivePostsSkinClassic.default, 'archive_classic');
    elementorFrontend.elementsHandler.attachHandler('archive-posts', _archivePostsSkinClassic.default, 'archive_full_content');
    elementorFrontend.elementsHandler.attachHandler('archive-posts', _archivePostsSkinCards.default, 'archive_cards');
    jQuery(function () {
      // Go to elementor element - if the URL is something like http://domain.com/any-page?preview=true&theme_template_id=6479
      var match = location.search.match(/theme_template_id=(\d*)/),
        $element = match ? jQuery('.elementor-' + match[1]) : [];
      if ($element.length) {
        jQuery('html, body').animate({
          scrollTop: $element.offset().top - window.innerHeight / 2
        });
      }
    });
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/theme-builder/assets/js/frontend/handlers/archive-posts-load-more.js":
/*!***************************************************************************************!*\
  !*** ../modules/theme-builder/assets/js/frontend/handlers/archive-posts-load-more.js ***!
  \***************************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _loadMore = _interopRequireDefault(__webpack_require__(/*! ../../../../../posts/assets/js/frontend/handlers/load-more */ "../modules/posts/assets/js/frontend/handlers/load-more.js"));
class ArchivePostsLoadMore extends _loadMore.default {}
exports["default"] = ArchivePostsLoadMore;

/***/ }),

/***/ "../modules/theme-builder/assets/js/frontend/handlers/archive-posts-skin-cards.js":
/*!****************************************************************************************!*\
  !*** ../modules/theme-builder/assets/js/frontend/handlers/archive-posts-skin-cards.js ***!
  \****************************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _cards = _interopRequireDefault(__webpack_require__(/*! ../../../../../posts/assets/js/frontend/handlers/cards */ "../modules/posts/assets/js/frontend/handlers/cards.js"));
var _default = exports["default"] = _cards.default.extend({
  getSkinPrefix() {
    return 'archive_cards_';
  }
});

/***/ }),

/***/ "../modules/theme-builder/assets/js/frontend/handlers/archive-posts-skin-classic.js":
/*!******************************************************************************************!*\
  !*** ../modules/theme-builder/assets/js/frontend/handlers/archive-posts-skin-classic.js ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _posts = _interopRequireDefault(__webpack_require__(/*! modules/posts/assets/js/frontend/handlers/posts */ "../modules/posts/assets/js/frontend/handlers/posts.js"));
var _default = exports["default"] = _posts.default.extend({
  getSkinPrefix() {
    return 'archive_classic_';
  }
});

/***/ }),

/***/ "../modules/theme-elements/assets/js/frontend/frontend-legacy.js":
/*!***********************************************************************!*\
  !*** ../modules/theme-elements/assets/js/frontend/frontend-legacy.js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _searchForm = _interopRequireDefault(__webpack_require__(/*! ./handlers/search-form */ "../modules/theme-elements/assets/js/frontend/handlers/search-form.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('search-form', _searchForm.default);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/theme-elements/assets/js/frontend/handlers/search-form.js":
/*!****************************************************************************!*\
  !*** ../modules/theme-elements/assets/js/frontend/handlers/search-form.js ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _default = exports["default"] = elementorModules.frontend.handlers.Base.extend({
  getDefaultSettings() {
    return {
      selectors: {
        wrapper: '.elementor-search-form',
        container: '.elementor-search-form__container',
        icon: '.elementor-search-form__icon',
        input: '.elementor-search-form__input',
        toggle: '.elementor-search-form__toggle',
        submit: '.elementor-search-form__submit',
        closeButton: '.dialog-close-button'
      },
      classes: {
        isFocus: 'elementor-search-form--focus',
        isFullScreen: 'elementor-search-form--full-screen',
        lightbox: 'elementor-lightbox'
      }
    };
  },
  getDefaultElements() {
    var selectors = this.getSettings('selectors'),
      elements = {};
    elements.$wrapper = this.$element.find(selectors.wrapper);
    elements.$container = this.$element.find(selectors.container);
    elements.$input = this.$element.find(selectors.input);
    elements.$icon = this.$element.find(selectors.icon);
    elements.$toggle = this.$element.find(selectors.toggle);
    elements.$submit = this.$element.find(selectors.submit);
    elements.$closeButton = this.$element.find(selectors.closeButton);
    return elements;
  },
  bindEvents() {
    var self = this,
      $container = self.elements.$container,
      $closeButton = self.elements.$closeButton,
      $input = self.elements.$input,
      $wrapper = self.elements.$wrapper,
      $icon = self.elements.$icon,
      $toggle = self.elements.$toggle,
      skin = this.getElementSettings('skin'),
      classes = this.getSettings('classes');
    const openFullScreenSearch = () => {
      $container.addClass(classes.isFullScreen).addClass(classes.lightbox);
      $input.trigger('focus');
    };
    const closeFullScreenSearch = () => {
      $container.removeClass(classes.isFullScreen).removeClass(classes.lightbox);
      $toggle.trigger('focus');
    };
    const triggerClickOnEnterSpace = event => {
      const ENTER_KEY = 13,
        SPACE_KEY = 32;
      if (ENTER_KEY === event.keyCode || SPACE_KEY === event.keyCode) {
        event.currentTarget.click();
        event.stopPropagation();
      }
    };
    if ('full_screen' === skin) {
      // Activate full-screen mode on mouse click or keyboard Enter & Space keyup.
      $toggle.on('click', () => openFullScreenSearch()).on('keyup', event => triggerClickOnEnterSpace(event));

      // Deactivate full-screen mode when clicking outside the container.
      $container.on('click', function (event) {
        if ($container.hasClass(classes.isFullScreen) && $container[0] === event.target) {
          $container.removeClass(classes.isFullScreen).removeClass(classes.lightbox);
        }
      });

      // Deactivate full-screen mode on mouse click or keyboard Enter & Space keyup.
      $closeButton.on('click', () => closeFullScreenSearch()).on('keyup', event => triggerClickOnEnterSpace(event));

      // Deactivate full-screen mode on keyboard Esc keyup.
      elementorFrontend.elements.$document.on('keyup', function (event) {
        const ESC_KEY = 27;
        if (ESC_KEY === event.keyCode) {
          if ($container.hasClass(classes.isFullScreen)) {
            $container.trigger('click');
          }
        }
      });
    } else {
      // Apply focus style on wrapper element when input is focused
      $input.on({
        focus() {
          $wrapper.addClass(classes.isFocus);
        },
        blur() {
          $wrapper.removeClass(classes.isFocus);
        }
      });
    }
    if ('minimal' === skin) {
      // Apply focus style on wrapper element when icon is clicked in minimal skin
      $icon.on('click', function () {
        $wrapper.addClass(classes.isFocus);
        $input.trigger('focus');
      });
    }
  }
});

/***/ }),

/***/ "../modules/woocommerce/assets/js/frontend/frontend-legacy.js":
/*!********************************************************************!*\
  !*** ../modules/woocommerce/assets/js/frontend/frontend-legacy.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _menuCart = _interopRequireDefault(__webpack_require__(/*! ./handlers/menu-cart */ "../modules/woocommerce/assets/js/frontend/handlers/menu-cart.js"));
var _purchaseSummary = _interopRequireDefault(__webpack_require__(/*! ./handlers/purchase-summary */ "../modules/woocommerce/assets/js/frontend/handlers/purchase-summary.js"));
var _checkoutPage = _interopRequireDefault(__webpack_require__(/*! ./handlers/checkout-page */ "../modules/woocommerce/assets/js/frontend/handlers/checkout-page.js"));
var _cart = _interopRequireDefault(__webpack_require__(/*! ./handlers/cart */ "../modules/woocommerce/assets/js/frontend/handlers/cart.js"));
var _myAccount = _interopRequireDefault(__webpack_require__(/*! ./handlers/my-account */ "../modules/woocommerce/assets/js/frontend/handlers/my-account.js"));
var _notices = _interopRequireDefault(__webpack_require__(/*! ./handlers/notices */ "../modules/woocommerce/assets/js/frontend/handlers/notices.js"));
var _productAddToCart = _interopRequireDefault(__webpack_require__(/*! ./handlers/product-add-to-cart */ "../modules/woocommerce/assets/js/frontend/handlers/product-add-to-cart.js"));
class _default extends elementorModules.Module {
  constructor() {
    super();
    elementorFrontend.elementsHandler.attachHandler('woocommerce-menu-cart', _menuCart.default);
    elementorFrontend.elementsHandler.attachHandler('woocommerce-purchase-summary', _purchaseSummary.default);
    elementorFrontend.elementsHandler.attachHandler('woocommerce-checkout-page', _checkoutPage.default);
    elementorFrontend.elementsHandler.attachHandler('woocommerce-cart', _cart.default);
    elementorFrontend.elementsHandler.attachHandler('woocommerce-my-account', _myAccount.default);
    elementorFrontend.elementsHandler.attachHandler('woocommerce-notices', _notices.default);
    elementorFrontend.elementsHandler.attachHandler('woocommerce-product-add-to-cart', _productAddToCart.default);

    /**
     * `wc-cart` script is enqueued in the Editor by the widget `get_script_depends()`. As a result WooCommerce
     * triggers its cart related event callbacks. One of the callbacks requires `.woocommerce-cart-form` to be in
     * the page and reloads the Preview if it's not there. To get around this we add our own empty
     * `.woocommerce-cart-form` to the page to stop the page reloading.
     */
    if (elementorFrontend.isEditMode()) {
      elementorFrontend.on('components:init', () => {
        if (!elementorFrontend.elements.$body.find('.elementor-widget-woocommerce-cart').length) {
          elementorFrontend.elements.$body.append('<div class="woocommerce-cart-form">');
        }
      });
    }
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/woocommerce/assets/js/frontend/handlers/base.js":
/*!******************************************************************!*\
  !*** ../modules/woocommerce/assets/js/frontend/handlers/base.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class Base extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        stickyRightColumn: '.e-sticky-right-column'
      },
      classes: {
        stickyRightColumnActive: 'e-sticky-right-column--active'
      }
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      $stickyRightColumn: this.$element.find(selectors.stickyRightColumn)
    };
  }
  bindEvents() {
    // Add our wrapper class around the select2 whenever it is opened.
    elementorFrontend.elements.$document.on('select2:open', event => {
      this.addSelect2Wrapper(event);
    });
  }
  addSelect2Wrapper(event) {
    // The select element is recaptured every time because the markup can refresh
    const selectElement = jQuery(event.target).data('select2');
    if (selectElement.$dropdown) {
      selectElement.$dropdown.addClass('e-woo-select2-wrapper');
    }
  }
  isStickyRightColumnActive() {
    const classes = this.getSettings('classes');
    return this.elements.$stickyRightColumn.hasClass(classes.stickyRightColumnActive);
  }
  activateStickyRightColumn() {
    const elementSettings = this.getElementSettings(),
      $wpAdminBar = elementorFrontend.elements.$wpAdminBar,
      classes = this.getSettings('classes');
    let stickyOptionsOffset = elementSettings.sticky_right_column_offset || 0;
    if ($wpAdminBar.length && 'fixed' === $wpAdminBar.css('position')) {
      stickyOptionsOffset += $wpAdminBar.height();
    }
    if ('yes' === this.getElementSettings('sticky_right_column')) {
      this.elements.$stickyRightColumn.addClass(classes.stickyRightColumnActive);
      this.elements.$stickyRightColumn.css('top', stickyOptionsOffset + 'px');
    }
  }
  deactivateStickyRightColumn() {
    if (!this.isStickyRightColumnActive()) {
      return;
    }
    const classes = this.getSettings('classes');
    this.elements.$stickyRightColumn.removeClass(classes.stickyRightColumnActive);
  }

  /**
   * Activates the sticky column
   *
   * @return {void}
   */
  toggleStickyRightColumn() {
    if (!this.getElementSettings('sticky_right_column')) {
      this.deactivateStickyRightColumn();
      return;
    }
    if (!this.isStickyRightColumnActive()) {
      this.activateStickyRightColumn();
    }
  }
  equalizeElementHeight($element) {
    if ($element.length) {
      $element.removeAttr('style'); // First remove the custom height we added so that the new height can be re-calculated according to the content

      let maxHeight = 0;
      $element.each((index, element) => {
        maxHeight = Math.max(maxHeight, element.offsetHeight);
      });
      if (0 < maxHeight) {
        $element.css({
          height: maxHeight + 'px'
        });
      }
    }
  }

  /**
   * WooCommerce prints the Purchase Note separated from the product name by a border and padding.
   * In Elementor's Order Summary design, the product name and purchase note are displayed un-separated.
   * To achieve this design, it is necessary to access the Product Name line before the Purchase Note line to adjust
   * its padding. Since this cannot be achieved in CSS, it is done in this method.
   *
   * @param {Object} $element
   *
   * @return {void}
   */
  removePaddingBetweenPurchaseNote($element) {
    if ($element) {
      $element.each((index, element) => {
        jQuery(element).prev().children('td').addClass('product-purchase-note-is-below');
      });
    }
  }

  /**
   * `elementorPageId` and `elementorWidgetId` are added to the url in the `_wp_http_referer` input which is then
   * received when WooCommerce does its cart and checkout ajax requests e.g `update_order_review` and `update_cart`.
   * These query strings are extracted from the url and used in our `load_widget_before_wc_ajax` method.
   */
  updateWpReferers() {
    const selectors = this.getSettings('selectors'),
      wpHttpRefererInputs = this.$element.find(selectors.wpHttpRefererInputs),
      url = new URL(document.location);
    url.searchParams.set('elementorPageId', elementorFrontend.config.post.id);
    url.searchParams.set('elementorWidgetId', this.getID());
    wpHttpRefererInputs.attr('value', url);
  }
}
exports["default"] = Base;

/***/ }),

/***/ "../modules/woocommerce/assets/js/frontend/handlers/cart.js":
/*!******************************************************************!*\
  !*** ../modules/woocommerce/assets/js/frontend/handlers/cart.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/woocommerce/assets/js/frontend/handlers/base.js"));
class Cart extends _base.default {
  getDefaultSettings() {
    const defaultSettings = super.getDefaultSettings(...arguments);
    return {
      selectors: {
        ...defaultSettings.selectors,
        shippingForm: '.shipping-calculator-form',
        quantityInput: '.qty',
        updateCartButton: 'button[name=update_cart]',
        wpHttpRefererInputs: '[name=_wp_http_referer]',
        hiddenInput: 'input[type=hidden]',
        productRemove: '.product-remove a'
      },
      classes: defaultSettings.classes,
      ajaxUrl: elementorProFrontend.config.ajaxurl
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      ...super.getDefaultElements(...arguments),
      $shippingForm: this.$element.find(selectors.shippingForm),
      $stickyColumn: this.$element.find(selectors.stickyColumn),
      $hiddenInput: this.$element.find(selectors.hiddenInput)
    };
  }
  bindEvents() {
    super.bindEvents();
    const selectors = this.getSettings('selectors');
    elementorFrontend.elements.$body.on('wc_fragments_refreshed', () => this.applyButtonsHoverAnimation());
    if ('yes' === this.getElementSettings('update_cart_automatically')) {
      this.$element.on('input', selectors.quantityInput, () => this.updateCart());
    }
    elementorFrontend.elements.$body.on('wc_fragments_loaded wc_fragments_refreshed', () => {
      this.updateWpReferers();
      if (elementorFrontend.isEditMode() || elementorFrontend.isWPPreviewMode()) {
        this.disableActions();
      }
    });
    elementorFrontend.elements.$body.on('added_to_cart', function (e, data) {
      // We do not want the page to reload in the Editor after we triggered the 'added_to_cart' event.
      if (data.e_manually_triggered) {
        return false;
      }
    });
  }
  onInit() {
    super.onInit(...arguments);
    this.toggleStickyRightColumn();
    this.hideHiddenInputsParentElements();
    if (elementorFrontend.isEditMode()) {
      this.elements.$shippingForm.show();
    }
    this.applyButtonsHoverAnimation();
    this.updateWpReferers();
    if (elementorFrontend.isEditMode() || elementorFrontend.isWPPreviewMode()) {
      this.disableActions();
    }
  }

  /**
   * Using the WooCommerce Cart controls (quantity, remove product) in the editor will cause the cart to disappear.
   * This is because WooCommerce does an ajax round trip where it modifies the cart, then loads that cart into the
   * current page and attempts to grab the elements from that page via ajax. In the Editor, if the page is not
   * published yet, it fetches an empty page that does not contain the required elements. As a result, the cart
   * is rendered empty.
   *
   * Due to this issue, the cart controls (quantity, remove product) need to be disabled in the Editor.
   */
  disableActions() {
    const selectors = this.getSettings('selectors');
    this.$element.find(selectors.updateCartButton).attr({
      disabled: 'disabled',
      'aria-disabled': 'true'
    });
    if (elementorFrontend.isEditMode()) {
      this.$element.find(selectors.quantityInput).attr('disabled', 'disabled');
      this.$element.find(selectors.productRemove).css('pointer-events', 'none');
    }
  }
  onElementChange(propertyName) {
    if ('sticky_right_column' === propertyName) {
      this.toggleStickyRightColumn();
    }
    if ('additional_template_select' === propertyName) {
      elementorPro.modules.woocommerce.onTemplateIdChange('additional_template_select');
    }
  }
  onDestroy() {
    super.onDestroy(...arguments);
    this.deactivateStickyRightColumn();
  }
  updateCart() {
    const selectors = this.getSettings('selectors');
    clearTimeout(this._debounce);
    this._debounce = setTimeout(() => {
      this.$element.find(selectors.updateCartButton).trigger('click');
    }, 1500);
  }
  applyButtonsHoverAnimation() {
    const elementSettings = this.getElementSettings();
    if (elementSettings.checkout_button_hover_animation) {
      // This element is recaptured every time because the cart markup can refresh
      jQuery('.checkout-button').addClass('elementor-animation-' + elementSettings.checkout_button_hover_animation);
    }
    if (elementSettings.forms_buttons_hover_animation) {
      // This element is recaptured every time because the cart markup can refresh
      jQuery('.shop_table .button').addClass('elementor-animation-' + elementSettings.forms_buttons_hover_animation);
    }
  }

  /**
   * In the editor, WC Frontend JS does not fire (not registered).
   * This causes that hidden inputs parent paragraph elements do not get display:none
   * as they would have on the front end.
   * So this function manually display:none the parent elements of these hidden inputs to avoid having
   * gaps/spaces in the layout caused by these parent elements' margins/paddings.
   */
  hideHiddenInputsParentElements() {
    if (this.isEdit) {
      if (this.elements.$hiddenInput) {
        this.elements.$hiddenInput.parent('.form-row').addClass('elementor-hidden');
      }
    }
  }
}
exports["default"] = Cart;

/***/ }),

/***/ "../modules/woocommerce/assets/js/frontend/handlers/checkout-page.js":
/*!***************************************************************************!*\
  !*** ../modules/woocommerce/assets/js/frontend/handlers/checkout-page.js ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/woocommerce/assets/js/frontend/handlers/base.js"));
class Checkout extends _base.default {
  getDefaultSettings() {
    const defaultSettings = super.getDefaultSettings(...arguments);
    return {
      selectors: {
        ...defaultSettings.selectors,
        container: '.elementor-widget-woocommerce-checkout-page',
        loginForm: '.e-woocommerce-login-anchor',
        loginSubmit: '.e-woocommerce-form-login-submit',
        loginSection: '.e-woocommerce-login-section',
        showCouponForm: '.e-show-coupon-form',
        couponSection: '.e-coupon-anchor',
        showLoginForm: '.e-show-login',
        applyCoupon: '.e-apply-coupon',
        checkoutForm: 'form.woocommerce-checkout',
        couponBox: '.e-coupon-box',
        address: 'address',
        wpHttpRefererInputs: '[name="_wp_http_referer"]'
      },
      classes: defaultSettings.classes,
      ajaxUrl: elementorProFrontend.config.ajaxurl
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      ...super.getDefaultElements(...arguments),
      $container: this.$element.find(selectors.container),
      $loginForm: this.$element.find(selectors.loginForm),
      $showCouponForm: this.$element.find(selectors.showCouponForm),
      $couponSection: this.$element.find(selectors.couponSection),
      $showLoginForm: this.$element.find(selectors.showLoginForm),
      $applyCoupon: this.$element.find(selectors.applyCoupon),
      $loginSubmit: this.$element.find(selectors.loginSubmit),
      $couponBox: this.$element.find(selectors.couponBox),
      $checkoutForm: this.$element.find(selectors.checkoutForm),
      $loginSection: this.$element.find(selectors.loginSection),
      $address: this.$element.find(selectors.address)
    };
  }
  bindEvents() {
    super.bindEvents(...arguments);
    this.elements.$showCouponForm.on('click', event => {
      event.preventDefault();
      this.elements.$couponSection.slideToggle();
    });
    this.elements.$showLoginForm.on('click', event => {
      event.preventDefault();
      this.elements.$loginForm.slideToggle();
    });
    this.elements.$applyCoupon.on('click', event => {
      event.preventDefault();
      this.applyCoupon();
    });
    this.elements.$loginSubmit.on('click', event => {
      event.preventDefault();
      this.loginUser();
    });
    elementorFrontend.elements.$body.on('updated_checkout', () => {
      this.applyPurchaseButtonHoverAnimation();
      this.updateWpReferers();
    });
  }
  onInit() {
    super.onInit(...arguments);
    this.toggleStickyRightColumn();
    this.updateWpReferers();
    this.equalizeElementHeight(this.elements.$address); // Equalize <address> boxes height

    if (elementorFrontend.isEditMode()) {
      this.elements.$loginForm.show();
      this.elements.$couponSection.show();
      this.applyPurchaseButtonHoverAnimation();
    }
  }
  onElementChange(propertyName) {
    if ('sticky_right_column' === propertyName) {
      this.toggleStickyRightColumn();
    }
  }
  onDestroy() {
    super.onDestroy(...arguments);
    this.deactivateStickyRightColumn();
  }
  applyPurchaseButtonHoverAnimation() {
    const purchaseButtonHoverAnimation = this.getElementSettings('purchase_button_hover_animation');
    if (purchaseButtonHoverAnimation) {
      // This element is recaptured every time because the checkout markup can refresh
      jQuery('#place_order').addClass('elementor-animation-' + purchaseButtonHoverAnimation);
    }
  }
  applyCoupon() {
    // Wc_checkout_params is required to continue, ensure the object exists
    // eslint-disable-next-line camelcase
    if (!wc_checkout_params) {
      return;
    }
    this.startProcessing(this.elements.$couponBox);
    const data = {
      // eslint-disable-next-line camelcase
      security: wc_checkout_params.apply_coupon_nonce,
      coupon_code: this.elements.$couponBox.find('input[name="coupon_code"]').val()
    };
    jQuery.ajax({
      type: 'POST',
      // eslint-disable-next-line camelcase
      url: wc_checkout_params.wc_ajax_url.toString().replace('%%endpoint%%', 'apply_coupon'),
      context: this,
      data,
      success(code) {
        jQuery('.woocommerce-error, .woocommerce-message').remove();
        this.elements.$couponBox.removeClass('processing').unblock();
        if (code) {
          this.elements.$checkoutForm.before(code);
          this.elements.$couponSection.slideUp();
          elementorFrontend.elements.$body.trigger('applied_coupon_in_checkout', [data.coupon_code]);
          elementorFrontend.elements.$body.trigger('update_checkout', {
            update_shipping_method: false
          });
        }
      },
      dataType: 'html'
    });
  }
  loginUser() {
    this.startProcessing(this.elements.$loginSection);
    const data = {
      action: 'elementor_woocommerce_checkout_login_user',
      username: this.elements.$loginSection.find('input[name="username"]').val(),
      password: this.elements.$loginSection.find('input[name="password"]').val(),
      nonce: this.elements.$loginSection.find('input[name="woocommerce-login-nonce"]').val(),
      remember: this.elements.$loginSection.find('input#rememberme').prop('checked')
    };
    jQuery.ajax({
      type: 'POST',
      url: this.getSettings('ajaxUrl'),
      context: this,
      data,
      success(code) {
        code = JSON.parse(code);
        this.elements.$loginSection.removeClass('processing').unblock();
        const messages = jQuery('.woocommerce-error, .woocommerce-message');
        messages.remove();
        if (code.logged_in) {
          location.reload();
        } else {
          this.elements.$checkoutForm.before(code.message);
          elementorFrontend.elements.$body.trigger('checkout_error', [code.message]);
        }
      }
    });
  }
  startProcessing($form) {
    if ($form.is('.processing')) {
      return;
    }

    /**
     * .block() is from a jQuery blockUI plugin loaded by WooCommerce. This code is based on WooCommerce
     * core in order for the Checkout widget to behave the same as WooCommerce Checkout pages.
     */
    $form.addClass('processing').block({
      message: null,
      overlayCSS: {
        background: '#fff',
        opacity: 0.6
      }
    });
  }
}
exports["default"] = Checkout;

/***/ }),

/***/ "../modules/woocommerce/assets/js/frontend/handlers/menu-cart.js":
/*!***********************************************************************!*\
  !*** ../modules/woocommerce/assets/js/frontend/handlers/menu-cart.js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class _default extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        container: '.elementor-menu-cart__container',
        main: '.elementor-menu-cart__main',
        toggle: '.elementor-menu-cart__toggle',
        toggleButton: '#elementor-menu-cart__toggle_button',
        toggleWrapper: '.elementor-menu-cart__toggle_wrapper',
        closeButton: '.elementor-menu-cart__close-button, .elementor-menu-cart__close-button-custom',
        productList: '.elementor-menu-cart__products'
      },
      classes: {
        isShown: 'elementor-menu-cart--shown'
      }
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      $container: this.$element.find(selectors.container),
      $main: this.$element.find(selectors.main),
      $toggleWrapper: this.$element.find(selectors.toggleWrapper),
      $closeButton: this.$element.find(selectors.closeButton)
    };
  }
  toggleCart() {
    if (!this.isCartOpen) {
      this.showCart();
    } else {
      this.hideCart();
    }
  }
  showCart() {
    if (this.isCartOpen) {
      return;
    }
    const classes = this.getSettings('classes'),
      selectors = this.getSettings('selectors');
    this.isCartOpen = true;
    this.$element.addClass(classes.isShown);
    this.$element.find(selectors.toggleButton).attr('aria-expanded', true);
    this.elements.$main.attr('aria-hidden', false);
    this.elements.$container.attr('aria-hidden', false);
  }
  hideCart() {
    if (!this.isCartOpen) {
      return;
    }
    const classes = this.getSettings('classes'),
      selectors = this.getSettings('selectors');
    this.isCartOpen = false;
    this.$element.removeClass(classes.isShown);
    this.$element.find(selectors.toggleButton).attr('aria-expanded', false);
    this.elements.$main.attr('aria-hidden', true);
    this.elements.$container.attr('aria-hidden', true);
  }
  automaticallyOpenCart() {
    const settings = this.getElementSettings();
    if ('yes' === settings.automatically_open_cart) {
      this.showCart();
    }
  }
  refreshFragments(eventType) {
    let data = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
    if (elementorFrontend.isEditMode() && elementorPro.modules.woocommerce.didManuallyTriggerAddToCartEvent(data)) {
      return false;
    }
    const templatesInPage = [];
    jQuery.each(elementorFrontend.documentsManager.documents, index => {
      templatesInPage.push(index);
    });
    jQuery.ajax({
      type: 'POST',
      url: elementorProFrontend.config.ajaxurl,
      context: this,
      data: {
        action: 'elementor_menu_cart_fragments',
        templates: templatesInPage,
        _nonce: ElementorProFrontendConfig.woocommerce.menu_cart.fragments_nonce,
        is_editor: elementorFrontend.isEditMode()
      },
      success(successData) {
        if (successData?.fragments) {
          jQuery.each(successData.fragments, (key, value) => {
            jQuery(key).replaceWith(value);
          });
        }
      },
      complete() {
        if ('added_to_cart' === eventType) {
          this.automaticallyOpenCart();
        }
      }
    });
  }
  bindEvents() {
    const menuCart = elementorProFrontend.config.woocommerce.menu_cart,
      noQueryParams = -1 === menuCart.cart_page_url.indexOf('?'),
      currentUrl = noQueryParams ? window.location.origin + window.location.pathname : window.location.href,
      cartUrl = menuCart.cart_page_url,
      isCart = menuCart.cart_page_url === currentUrl,
      isCheckout = menuCart.checkout_page_url === currentUrl,
      selectors = this.getSettings('selectors');

    // If on cart page or checkout page don't open cart, rather stay on, or go to cart page, and bail from init.
    if (isCart && isCheckout) {
      this.$element.find(selectors.toggleButton).attr('href', cartUrl);
      return;
    }

    // Cache cart open state.
    const classes = this.getSettings('classes');
    this.isCartOpen = this.$element.hasClass(classes.isShown);
    const settings = this.getElementSettings();
    if ('mouseover' === settings.open_cart) {
      // Enable opening of mini-cart and side-cart by hover (include click so we can `preventDefault()` page-top jump on click).
      this.elements.$toggleWrapper.on('mouseover click', selectors.toggleButton, event => {
        event.preventDefault();
        this.showCart();
      });

      // Close Cart on mouseleave.
      this.elements.$toggleWrapper.on('mouseleave', () => this.hideCart());
    } else {
      // Enable opening of mini-cart and side-cart by click.
      this.elements.$toggleWrapper.on('click', selectors.toggleButton, event => {
        event.preventDefault();
        this.toggleCart();
      });
    }

    // Listen for clicks outside to close any open cart.
    elementorFrontend.elements.$document.on('click', event => {
      if (!this.isCartOpen) {
        return;
      }
      const $target = jQuery(event.target);

      // Don't close if this is click on the main panel or toggle button.
      if ($target.closest(this.elements.$main).length || $target.closest(selectors.toggle).length) {
        return;
      }
      this.hideCart();
    });
    this.elements.$closeButton.on('click', event => {
      event.preventDefault();
      this.hideCart();
    });
    elementorFrontend.elements.$document.on('keyup', event => {
      const ESC_KEY = 27;
      if (ESC_KEY === event.keyCode) {
        this.hideCart();
      }
    });
    elementorFrontend.elements.$body.on('wc_fragments_refreshed removed_from_cart added_to_cart', (event, data) => this.refreshFragments(event.type, data));

    // Govern the height of the mini-cart dropdown.
    elementorFrontend.addListenerOnce(this.getUniqueHandlerID() + '_window_resize_dropdown', 'resize', () => this.governDropdownHeight());
    elementorFrontend.elements.$body.on('wc_fragments_loaded wc_fragments_refreshed', () => this.governDropdownHeight());
  }
  unbindEvents() {
    elementorFrontend.removeListeners(this.getUniqueHandlerID() + '_window_resize_dropdown', 'resize');
  }
  onInit() {
    super.onInit();

    /**
     * When the page is reloaded after an item is added to cart, and the user activated the
     * "Automatically Open Cart" option, the cart should open to show the updated contents.
     */
    if (elementorProFrontend.config.woocommerce.productAddedToCart) {
      this.automaticallyOpenCart();
    }

    // Govern the height of the mini-cart dropdown.
    this.governDropdownHeight();
  }
  governDropdownHeight() {
    const settings = this.getElementSettings();

    // Only do this for mini-cart.
    if ('mini-cart' !== settings.cart_type) {
      return;
    }

    // Elements need to be re-instantiated every time as WooCommerce reloads the toggle button
    // and cart contents in our widget when the cart changes e.g. adding products to the cart.
    const selectors = this.getSettings('selectors');
    const $productList = this.$element.find(selectors.productList),
      $toggle = this.$element.find(selectors.toggle);

    // Make sure required elements exist.
    if (!$productList.length || !$toggle.length) {
      return;
    }

    // Remove max-height of productList so we can take new measurements.
    this.$element.find(selectors.productList).css('max-height', '');

    // Calculate what the height of the productList should be based on elements above, below and it's vertical position.
    const windowHeight = document.documentElement.clientHeight,
      toggleHeight = $toggle.height() + parseInt(this.elements.$main.css('margin-top')),
      toggleTopPosition = $toggle[0].getBoundingClientRect().top,
      productListHeight = $productList.height(),
      dropdownWithoutViewportHeight = this.elements.$main.prop('scrollHeight') - productListHeight,
      extraBottomSpacing = 30,
      maxViewportHeight = windowHeight - toggleTopPosition - toggleHeight - dropdownWithoutViewportHeight - extraBottomSpacing,
      optimalViewportHeight = Math.max(120, maxViewportHeight);

    // Apply max-height to the productList.
    $productList.css('max-height', optimalViewportHeight);
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/woocommerce/assets/js/frontend/handlers/my-account.js":
/*!************************************************************************!*\
  !*** ../modules/woocommerce/assets/js/frontend/handlers/my-account.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/woocommerce/assets/js/frontend/handlers/base.js"));
class MyAccountHandler extends _base.default {
  getDefaultSettings() {
    return {
      selectors: {
        address: 'address',
        tabLinks: '.woocommerce-MyAccount-navigation-link a',
        viewOrderButtons: '.my_account_orders .woocommerce-button.view',
        viewOrderLinks: '.woocommerce-orders-table__cell-order-number a',
        authForms: 'form.login, form.register',
        tabWrapper: '.e-my-account-tab',
        tabItem: '.woocommerce-MyAccount-navigation li',
        allPageElements: '[e-my-account-page]',
        purchasenote: 'tr.product-purchase-note',
        contentWrapper: '.woocommerce-MyAccount-content-wrapper'
      }
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      $address: this.$element.find(selectors.address),
      $tabLinks: this.$element.find(selectors.tabLinks),
      $viewOrderButtons: this.$element.find(selectors.viewOrderButtons),
      $viewOrderLinks: this.$element.find(selectors.viewOrderLinks),
      $authForms: this.$element.find(selectors.authForms),
      $tabWrapper: this.$element.find(selectors.tabWrapper),
      $tabItem: this.$element.find(selectors.tabItem),
      $allPageElements: this.$element.find(selectors.allPageElements),
      $purchasenote: this.$element.find(selectors.purchasenote),
      $contentWrapper: this.$element.find(selectors.contentWrapper)
    };
  }
  editorInitTabs() {
    this.elements.$allPageElements.each((index, element) => {
      const currentPage = element.getAttribute('e-my-account-page');
      let $linksToThisPage;
      switch (currentPage) {
        case 'view-order':
          $linksToThisPage = this.elements.$viewOrderLinks.add(this.elements.$viewOrderButtons);
          break;
        default:
          $linksToThisPage = this.$element.find('.woocommerce-MyAccount-navigation-link--' + currentPage);
      }
      $linksToThisPage.on('click', () => {
        this.currentPage = currentPage;
        this.editorShowTab();
      });
    });
  }
  editorShowTab() {
    const $currentPage = this.$element.find('[e-my-account-page="' + this.currentPage + '"]');
    this.$element.attr('e-my-account-page', this.currentPage);
    this.elements.$allPageElements.hide();
    $currentPage.show();
    this.toggleEndpointClasses();
    if ('view-order' !== this.currentPage) {
      this.elements.$tabItem.removeClass('is-active');
      this.$element.find('.woocommerce-MyAccount-navigation-link--' + this.currentPage).addClass('is-active');
    }

    /**
     * We need to run equalizeElementHeights() again when the 'edit-address' or 'view-order' tab is shown, because jQuery cannot
     * get the height of hidden elements, and this tab was hidden on initial page load in the editor.
     */
    if ('edit-address' === this.currentPage || 'view-order' === this.currentPage) {
      this.equalizeElementHeights();
    }
  }
  toggleEndpointClasses() {
    const wcPages = ['dashboard', 'orders', 'view-order', 'downloads', 'edit-account', 'edit-address', 'payment-methods'];
    let wrapperClass = '';
    this.elements.$tabWrapper.removeClass('e-my-account-tab__' + wcPages.join(' e-my-account-tab__') + ' e-my-account-tab__dashboard--custom');
    if ('dashboard' === this.currentPage && this.elements.$contentWrapper.find('.elementor').length) {
      wrapperClass = ' e-my-account-tab__dashboard--custom';
    }
    if (wcPages.includes(this.currentPage)) {
      this.elements.$tabWrapper.addClass('e-my-account-tab__' + this.currentPage + wrapperClass);
    }
  }
  applyButtonsHoverAnimation() {
    const elementSettings = this.getElementSettings();
    if (elementSettings.forms_buttons_hover_animation) {
      this.$element.find('.woocommerce button.button,  #add_payment_method #payment #place_order').addClass('elementor-animation-' + elementSettings.forms_buttons_hover_animation);
    }
    if (elementSettings.tables_button_hover_animation) {
      this.$element.find('.order-again .button, td .button, .woocommerce-pagination .button').addClass('elementor-animation-' + elementSettings.tables_button_hover_animation);
    }
  }
  equalizeElementHeights() {
    this.equalizeElementHeight(this.elements.$address); // Equalize <address> boxes height

    if (!this.isEdit) {
      // Auth forms do not display in the Editor
      this.equalizeElementHeight(this.elements.$authForms); // Equalize login/reg boxes height
    }
  }

  onElementChange(propertyName) {
    // When the 'General Text' Typography or 'Section' Padding is changed, the height of the boxes need to update as well.
    if (0 === propertyName.indexOf('general_text_typography') || 0 === propertyName.indexOf('sections_padding')) {
      this.equalizeElementHeights();
    }
    if (0 === propertyName.indexOf('forms_rows_gap')) {
      this.removePaddingBetweenPurchaseNote(this.elements.$purchasenote);
    }
    if ('customize_dashboard_select' === propertyName) {
      elementorPro.modules.woocommerce.onTemplateIdChange('customize_dashboard_select');
    }
  }
  bindEvents() {
    super.bindEvents();

    // The heights of the Registration and Login boxes need to be recaclulated and equalized when
    // WooCommerce adds validation messages (such as the password strength meter) into these sections.
    elementorFrontend.elements.$body.on('keyup change', '.register #reg_password', () => {
      this.equalizeElementHeights();
    });
  }
  onInit() {
    super.onInit(...arguments);
    if (this.isEdit) {
      this.editorInitTabs();
      if (!this.$element.attr('e-my-account-page')) {
        this.currentPage = 'dashboard';
      } else {
        this.currentPage = this.$element.attr('e-my-account-page');
      }
      this.editorShowTab();
    }
    this.applyButtonsHoverAnimation();
    this.equalizeElementHeights();
    this.removePaddingBetweenPurchaseNote(this.elements.$purchasenote);
  }
}
exports["default"] = MyAccountHandler;

/***/ }),

/***/ "../modules/woocommerce/assets/js/frontend/handlers/notices.js":
/*!*********************************************************************!*\
  !*** ../modules/woocommerce/assets/js/frontend/handlers/notices.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
class _default extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        woocommerceNotices: '.woocommerce-NoticeGroup, :not(.woocommerce-NoticeGroup) .woocommerce-error, :not(.woocommerce-NoticeGroup) .woocommerce-message, :not(.woocommerce-NoticeGroup) .woocommerce-info',
        noticesWrapper: '.e-woocommerce-notices-wrapper'
      }
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      $documentScrollToElements: elementorFrontend.elements.$document.find('html, body'),
      $woocommerceCheckoutForm: elementorFrontend.elements.$body.find('.form.checkout'),
      $noticesWrapper: this.$element.find(selectors.noticesWrapper)
    };
  }
  moveNotices() {
    let scrollToNotices = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
    const selectors = this.getSettings('selectors');
    let $notices = elementorFrontend.elements.$body.find(selectors.woocommerceNotices);
    if (elementorFrontend.isEditMode() || elementorFrontend.isWPPreviewMode()) {
      $notices = $notices.filter(':not(.e-notices-demo-notice)');
    }
    if (scrollToNotices) {
      this.elements.$documentScrollToElements.stop();
    }
    this.elements.$noticesWrapper.prepend($notices);
    if (!this.is_ready) {
      this.elements.$noticesWrapper.removeClass('e-woocommerce-notices-wrapper-loading');
      this.is_ready = true;
    }
    if (scrollToNotices) {
      let $scrollToElement = $notices;
      if (!$scrollToElement.length) {
        $scrollToElement = this.elements.$woocommerceCheckoutForm;
      }
      if ($scrollToElement.length) {
        // Scrolls to the notice and puts it in the middle of the window so users' attention is drawn to it.
        this.elements.$documentScrollToElements.animate({
          scrollTop: $scrollToElement.offset().top - document.documentElement.clientHeight / 2
        }, 1000);
      }
    }
  }
  onInit() {
    super.onInit();
    this.is_ready = false;
    this.moveNotices(true);
  }
  bindEvents() {
    elementorFrontend.elements.$body.on('updated_wc_div updated_checkout updated_cart_totals applied_coupon removed_coupon applied_coupon_in_checkout removed_coupon_in_checkout checkout_error', () => this.moveNotices(true));
  }
}
exports["default"] = _default;

/***/ }),

/***/ "../modules/woocommerce/assets/js/frontend/handlers/product-add-to-cart.js":
/*!*********************************************************************************!*\
  !*** ../modules/woocommerce/assets/js/frontend/handlers/product-add-to-cart.js ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/woocommerce/assets/js/frontend/handlers/base.js"));
class ProductAddToCart extends _base.default {
  getDefaultSettings() {
    return {
      selectors: {
        quantityInput: '.e-loop-add-to-cart-form input.qty',
        addToCartButton: '.e-loop-add-to-cart-form .ajax_add_to_cart',
        addedToCartButton: '.added_to_cart',
        loopFormContainer: '.e-loop-add-to-cart-form-container'
      }
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      $quantityInput: this.$element.find(selectors.quantityInput),
      $addToCartButton: this.$element.find(selectors.addToCartButton)
    };
  }
  updateAddToCartButtonQuantity() {
    this.elements.$addToCartButton.attr('data-quantity', this.elements.$quantityInput.val());
  }
  handleAddedToCart($button) {
    const selectors = this.getSettings('selectors'),
      $addToCartButton = $button.siblings(selectors.addedToCartButton),
      $loopFormContainer = $addToCartButton.parents(selectors.loopFormContainer);
    $loopFormContainer.children(selectors.addedToCartButton).remove();
    $loopFormContainer.append($addToCartButton);
  }
  bindEvents() {
    super.bindEvents(...arguments);
    this.elements.$quantityInput.on('change', () => {
      this.updateAddToCartButtonQuantity();
    });
    elementorFrontend.elements.$body.off('added_to_cart.elementor-woocommerce-product-add-to-cart');
    elementorFrontend.elements.$body.on('added_to_cart.elementor-woocommerce-product-add-to-cart', (e, fragments, cartHash, $button) => {
      this.handleAddedToCart($button);
    });
  }
}
exports["default"] = ProductAddToCart;

/***/ }),

/***/ "../modules/woocommerce/assets/js/frontend/handlers/purchase-summary.js":
/*!******************************************************************************!*\
  !*** ../modules/woocommerce/assets/js/frontend/handlers/purchase-summary.js ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _interopRequireDefault = __webpack_require__(/*! @babel/runtime/helpers/interopRequireDefault */ "../node_modules/@babel/runtime/helpers/interopRequireDefault.js");
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/woocommerce/assets/js/frontend/handlers/base.js"));
class PurchaseSummaryHandler extends _base.default {
  getDefaultSettings() {
    return {
      selectors: {
        container: '.elementor-widget-woocommerce-purchase-summary',
        address: 'address',
        purchasenote: '.product-purchase-note'
      }
    };
  }
  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      $container: this.$element.find(selectors.container),
      $address: this.$element.find(selectors.address),
      $purchasenote: this.$element.find(selectors.purchasenote)
    };
  }
  onElementChange(propertyName) {
    // When the 'General Text' Typography, 'Section' Padding, or Border Width is changed, the height of the boxes need to update as well.
    const properties = ['general_text_typography', 'sections_padding', 'sections_border_width'];
    for (const property of properties) {
      if (propertyName.startsWith(property)) {
        this.equalizeElementHeight(this.elements.$address);
      }
    }

    // Remove padding on the purchase notes.
    if (propertyName.startsWith('order_details_rows_gap')) {
      this.removePaddingBetweenPurchaseNote(this.elements.$purchasenote);
    }
  }
  applyButtonsHoverAnimation() {
    const elementSettings = this.getElementSettings();
    if (elementSettings.order_details_button_hover_animation) {
      this.$element.find('.order-again .button, td .button').addClass('elementor-animation-' + elementSettings.order_details_button_hover_animation);
    }
  }
  onInit() {
    super.onInit(...arguments);
    this.equalizeElementHeight(this.elements.$address);
    this.removePaddingBetweenPurchaseNote(this.elements.$purchasenote);
    this.applyButtonsHoverAnimation();
  }
}
exports["default"] = PurchaseSummaryHandler;

/***/ }),

/***/ "../node_modules/dompurify/dist/purify.js":
/*!************************************************!*\
  !*** ../node_modules/dompurify/dist/purify.js ***!
  \************************************************/
/***/ (function(module) {

/*! @license DOMPurify 3.0.3 | (c) Cure53 and other contributors | Released under the Apache license 2.0 and Mozilla Public License 2.0 | github.com/cure53/DOMPurify/blob/3.0.3/LICENSE */

(function (global, factory) {
   true ? module.exports = factory() :
  0;
})(this, (function () { 'use strict';

  const {
    entries,
    setPrototypeOf,
    isFrozen,
    getPrototypeOf,
    getOwnPropertyDescriptor
  } = Object;
  let {
    freeze,
    seal,
    create
  } = Object; // eslint-disable-line import/no-mutable-exports

  let {
    apply,
    construct
  } = typeof Reflect !== 'undefined' && Reflect;

  if (!apply) {
    apply = function apply(fun, thisValue, args) {
      return fun.apply(thisValue, args);
    };
  }

  if (!freeze) {
    freeze = function freeze(x) {
      return x;
    };
  }

  if (!seal) {
    seal = function seal(x) {
      return x;
    };
  }

  if (!construct) {
    construct = function construct(Func, args) {
      return new Func(...args);
    };
  }

  const arrayForEach = unapply(Array.prototype.forEach);
  const arrayPop = unapply(Array.prototype.pop);
  const arrayPush = unapply(Array.prototype.push);
  const stringToLowerCase = unapply(String.prototype.toLowerCase);
  const stringToString = unapply(String.prototype.toString);
  const stringMatch = unapply(String.prototype.match);
  const stringReplace = unapply(String.prototype.replace);
  const stringIndexOf = unapply(String.prototype.indexOf);
  const stringTrim = unapply(String.prototype.trim);
  const regExpTest = unapply(RegExp.prototype.test);
  const typeErrorCreate = unconstruct(TypeError);
  function unapply(func) {
    return function (thisArg) {
      for (var _len = arguments.length, args = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
        args[_key - 1] = arguments[_key];
      }

      return apply(func, thisArg, args);
    };
  }
  function unconstruct(func) {
    return function () {
      for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
        args[_key2] = arguments[_key2];
      }

      return construct(func, args);
    };
  }
  /* Add properties to a lookup table */

  function addToSet(set, array, transformCaseFunc) {
    var _transformCaseFunc;

    transformCaseFunc = (_transformCaseFunc = transformCaseFunc) !== null && _transformCaseFunc !== void 0 ? _transformCaseFunc : stringToLowerCase;

    if (setPrototypeOf) {
      // Make 'in' and truthy checks like Boolean(set.constructor)
      // independent of any properties defined on Object.prototype.
      // Prevent prototype setters from intercepting set as a this value.
      setPrototypeOf(set, null);
    }

    let l = array.length;

    while (l--) {
      let element = array[l];

      if (typeof element === 'string') {
        const lcElement = transformCaseFunc(element);

        if (lcElement !== element) {
          // Config presets (e.g. tags.js, attrs.js) are immutable.
          if (!isFrozen(array)) {
            array[l] = lcElement;
          }

          element = lcElement;
        }
      }

      set[element] = true;
    }

    return set;
  }
  /* Shallow clone an object */

  function clone(object) {
    const newObject = create(null);

    for (const [property, value] of entries(object)) {
      newObject[property] = value;
    }

    return newObject;
  }
  /* This method automatically checks if the prop is function
   * or getter and behaves accordingly. */

  function lookupGetter(object, prop) {
    while (object !== null) {
      const desc = getOwnPropertyDescriptor(object, prop);

      if (desc) {
        if (desc.get) {
          return unapply(desc.get);
        }

        if (typeof desc.value === 'function') {
          return unapply(desc.value);
        }
      }

      object = getPrototypeOf(object);
    }

    function fallbackValue(element) {
      console.warn('fallback value for', element);
      return null;
    }

    return fallbackValue;
  }

  const html$1 = freeze(['a', 'abbr', 'acronym', 'address', 'area', 'article', 'aside', 'audio', 'b', 'bdi', 'bdo', 'big', 'blink', 'blockquote', 'body', 'br', 'button', 'canvas', 'caption', 'center', 'cite', 'code', 'col', 'colgroup', 'content', 'data', 'datalist', 'dd', 'decorator', 'del', 'details', 'dfn', 'dialog', 'dir', 'div', 'dl', 'dt', 'element', 'em', 'fieldset', 'figcaption', 'figure', 'font', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html', 'i', 'img', 'input', 'ins', 'kbd', 'label', 'legend', 'li', 'main', 'map', 'mark', 'marquee', 'menu', 'menuitem', 'meter', 'nav', 'nobr', 'ol', 'optgroup', 'option', 'output', 'p', 'picture', 'pre', 'progress', 'q', 'rp', 'rt', 'ruby', 's', 'samp', 'section', 'select', 'shadow', 'small', 'source', 'spacer', 'span', 'strike', 'strong', 'style', 'sub', 'summary', 'sup', 'table', 'tbody', 'td', 'template', 'textarea', 'tfoot', 'th', 'thead', 'time', 'tr', 'track', 'tt', 'u', 'ul', 'var', 'video', 'wbr']); // SVG

  const svg$1 = freeze(['svg', 'a', 'altglyph', 'altglyphdef', 'altglyphitem', 'animatecolor', 'animatemotion', 'animatetransform', 'circle', 'clippath', 'defs', 'desc', 'ellipse', 'filter', 'font', 'g', 'glyph', 'glyphref', 'hkern', 'image', 'line', 'lineargradient', 'marker', 'mask', 'metadata', 'mpath', 'path', 'pattern', 'polygon', 'polyline', 'radialgradient', 'rect', 'stop', 'style', 'switch', 'symbol', 'text', 'textpath', 'title', 'tref', 'tspan', 'view', 'vkern']);
  const svgFilters = freeze(['feBlend', 'feColorMatrix', 'feComponentTransfer', 'feComposite', 'feConvolveMatrix', 'feDiffuseLighting', 'feDisplacementMap', 'feDistantLight', 'feDropShadow', 'feFlood', 'feFuncA', 'feFuncB', 'feFuncG', 'feFuncR', 'feGaussianBlur', 'feImage', 'feMerge', 'feMergeNode', 'feMorphology', 'feOffset', 'fePointLight', 'feSpecularLighting', 'feSpotLight', 'feTile', 'feTurbulence']); // List of SVG elements that are disallowed by default.
  // We still need to know them so that we can do namespace
  // checks properly in case one wants to add them to
  // allow-list.

  const svgDisallowed = freeze(['animate', 'color-profile', 'cursor', 'discard', 'font-face', 'font-face-format', 'font-face-name', 'font-face-src', 'font-face-uri', 'foreignobject', 'hatch', 'hatchpath', 'mesh', 'meshgradient', 'meshpatch', 'meshrow', 'missing-glyph', 'script', 'set', 'solidcolor', 'unknown', 'use']);
  const mathMl$1 = freeze(['math', 'menclose', 'merror', 'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mmultiscripts', 'mn', 'mo', 'mover', 'mpadded', 'mphantom', 'mroot', 'mrow', 'ms', 'mspace', 'msqrt', 'mstyle', 'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext', 'mtr', 'munder', 'munderover', 'mprescripts']); // Similarly to SVG, we want to know all MathML elements,
  // even those that we disallow by default.

  const mathMlDisallowed = freeze(['maction', 'maligngroup', 'malignmark', 'mlongdiv', 'mscarries', 'mscarry', 'msgroup', 'mstack', 'msline', 'msrow', 'semantics', 'annotation', 'annotation-xml', 'mprescripts', 'none']);
  const text = freeze(['#text']);

  const html = freeze(['accept', 'action', 'align', 'alt', 'autocapitalize', 'autocomplete', 'autopictureinpicture', 'autoplay', 'background', 'bgcolor', 'border', 'capture', 'cellpadding', 'cellspacing', 'checked', 'cite', 'class', 'clear', 'color', 'cols', 'colspan', 'controls', 'controlslist', 'coords', 'crossorigin', 'datetime', 'decoding', 'default', 'dir', 'disabled', 'disablepictureinpicture', 'disableremoteplayback', 'download', 'draggable', 'enctype', 'enterkeyhint', 'face', 'for', 'headers', 'height', 'hidden', 'high', 'href', 'hreflang', 'id', 'inputmode', 'integrity', 'ismap', 'kind', 'label', 'lang', 'list', 'loading', 'loop', 'low', 'max', 'maxlength', 'media', 'method', 'min', 'minlength', 'multiple', 'muted', 'name', 'nonce', 'noshade', 'novalidate', 'nowrap', 'open', 'optimum', 'pattern', 'placeholder', 'playsinline', 'poster', 'preload', 'pubdate', 'radiogroup', 'readonly', 'rel', 'required', 'rev', 'reversed', 'role', 'rows', 'rowspan', 'spellcheck', 'scope', 'selected', 'shape', 'size', 'sizes', 'span', 'srclang', 'start', 'src', 'srcset', 'step', 'style', 'summary', 'tabindex', 'title', 'translate', 'type', 'usemap', 'valign', 'value', 'width', 'xmlns', 'slot']);
  const svg = freeze(['accent-height', 'accumulate', 'additive', 'alignment-baseline', 'ascent', 'attributename', 'attributetype', 'azimuth', 'basefrequency', 'baseline-shift', 'begin', 'bias', 'by', 'class', 'clip', 'clippathunits', 'clip-path', 'clip-rule', 'color', 'color-interpolation', 'color-interpolation-filters', 'color-profile', 'color-rendering', 'cx', 'cy', 'd', 'dx', 'dy', 'diffuseconstant', 'direction', 'display', 'divisor', 'dur', 'edgemode', 'elevation', 'end', 'fill', 'fill-opacity', 'fill-rule', 'filter', 'filterunits', 'flood-color', 'flood-opacity', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style', 'font-variant', 'font-weight', 'fx', 'fy', 'g1', 'g2', 'glyph-name', 'glyphref', 'gradientunits', 'gradienttransform', 'height', 'href', 'id', 'image-rendering', 'in', 'in2', 'k', 'k1', 'k2', 'k3', 'k4', 'kerning', 'keypoints', 'keysplines', 'keytimes', 'lang', 'lengthadjust', 'letter-spacing', 'kernelmatrix', 'kernelunitlength', 'lighting-color', 'local', 'marker-end', 'marker-mid', 'marker-start', 'markerheight', 'markerunits', 'markerwidth', 'maskcontentunits', 'maskunits', 'max', 'mask', 'media', 'method', 'mode', 'min', 'name', 'numoctaves', 'offset', 'operator', 'opacity', 'order', 'orient', 'orientation', 'origin', 'overflow', 'paint-order', 'path', 'pathlength', 'patterncontentunits', 'patterntransform', 'patternunits', 'points', 'preservealpha', 'preserveaspectratio', 'primitiveunits', 'r', 'rx', 'ry', 'radius', 'refx', 'refy', 'repeatcount', 'repeatdur', 'restart', 'result', 'rotate', 'scale', 'seed', 'shape-rendering', 'specularconstant', 'specularexponent', 'spreadmethod', 'startoffset', 'stddeviation', 'stitchtiles', 'stop-color', 'stop-opacity', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke', 'stroke-width', 'style', 'surfacescale', 'systemlanguage', 'tabindex', 'targetx', 'targety', 'transform', 'transform-origin', 'text-anchor', 'text-decoration', 'text-rendering', 'textlength', 'type', 'u1', 'u2', 'unicode', 'values', 'viewbox', 'visibility', 'version', 'vert-adv-y', 'vert-origin-x', 'vert-origin-y', 'width', 'word-spacing', 'wrap', 'writing-mode', 'xchannelselector', 'ychannelselector', 'x', 'x1', 'x2', 'xmlns', 'y', 'y1', 'y2', 'z', 'zoomandpan']);
  const mathMl = freeze(['accent', 'accentunder', 'align', 'bevelled', 'close', 'columnsalign', 'columnlines', 'columnspan', 'denomalign', 'depth', 'dir', 'display', 'displaystyle', 'encoding', 'fence', 'frame', 'height', 'href', 'id', 'largeop', 'length', 'linethickness', 'lspace', 'lquote', 'mathbackground', 'mathcolor', 'mathsize', 'mathvariant', 'maxsize', 'minsize', 'movablelimits', 'notation', 'numalign', 'open', 'rowalign', 'rowlines', 'rowspacing', 'rowspan', 'rspace', 'rquote', 'scriptlevel', 'scriptminsize', 'scriptsizemultiplier', 'selection', 'separator', 'separators', 'stretchy', 'subscriptshift', 'supscriptshift', 'symmetric', 'voffset', 'width', 'xmlns']);
  const xml = freeze(['xlink:href', 'xml:id', 'xlink:title', 'xml:space', 'xmlns:xlink']);

  const MUSTACHE_EXPR = seal(/\{\{[\w\W]*|[\w\W]*\}\}/gm); // Specify template detection regex for SAFE_FOR_TEMPLATES mode

  const ERB_EXPR = seal(/<%[\w\W]*|[\w\W]*%>/gm);
  const TMPLIT_EXPR = seal(/\${[\w\W]*}/gm);
  const DATA_ATTR = seal(/^data-[\-\w.\u00B7-\uFFFF]/); // eslint-disable-line no-useless-escape

  const ARIA_ATTR = seal(/^aria-[\-\w]+$/); // eslint-disable-line no-useless-escape

  const IS_ALLOWED_URI = seal(/^(?:(?:(?:f|ht)tps?|mailto|tel|callto|sms|cid|xmpp):|[^a-z]|[a-z+.\-]+(?:[^a-z+.\-:]|$))/i // eslint-disable-line no-useless-escape
  );
  const IS_SCRIPT_OR_DATA = seal(/^(?:\w+script|data):/i);
  const ATTR_WHITESPACE = seal(/[\u0000-\u0020\u00A0\u1680\u180E\u2000-\u2029\u205F\u3000]/g // eslint-disable-line no-control-regex
  );
  const DOCTYPE_NAME = seal(/^html$/i);

  var EXPRESSIONS = /*#__PURE__*/Object.freeze({
    __proto__: null,
    MUSTACHE_EXPR: MUSTACHE_EXPR,
    ERB_EXPR: ERB_EXPR,
    TMPLIT_EXPR: TMPLIT_EXPR,
    DATA_ATTR: DATA_ATTR,
    ARIA_ATTR: ARIA_ATTR,
    IS_ALLOWED_URI: IS_ALLOWED_URI,
    IS_SCRIPT_OR_DATA: IS_SCRIPT_OR_DATA,
    ATTR_WHITESPACE: ATTR_WHITESPACE,
    DOCTYPE_NAME: DOCTYPE_NAME
  });

  const getGlobal = () => typeof window === 'undefined' ? null : window;
  /**
   * Creates a no-op policy for internal use only.
   * Don't export this function outside this module!
   * @param {?TrustedTypePolicyFactory} trustedTypes The policy factory.
   * @param {HTMLScriptElement} purifyHostElement The Script element used to load DOMPurify (to determine policy name suffix).
   * @return {?TrustedTypePolicy} The policy created (or null, if Trusted Types
   * are not supported or creating the policy failed).
   */


  const _createTrustedTypesPolicy = function _createTrustedTypesPolicy(trustedTypes, purifyHostElement) {
    if (typeof trustedTypes !== 'object' || typeof trustedTypes.createPolicy !== 'function') {
      return null;
    } // Allow the callers to control the unique policy name
    // by adding a data-tt-policy-suffix to the script element with the DOMPurify.
    // Policy creation with duplicate names throws in Trusted Types.


    let suffix = null;
    const ATTR_NAME = 'data-tt-policy-suffix';

    if (purifyHostElement && purifyHostElement.hasAttribute(ATTR_NAME)) {
      suffix = purifyHostElement.getAttribute(ATTR_NAME);
    }

    const policyName = 'dompurify' + (suffix ? '#' + suffix : '');

    try {
      return trustedTypes.createPolicy(policyName, {
        createHTML(html) {
          return html;
        },

        createScriptURL(scriptUrl) {
          return scriptUrl;
        }

      });
    } catch (_) {
      // Policy creation failed (most likely another DOMPurify script has
      // already run). Skip creating the policy, as this will only cause errors
      // if TT are enforced.
      console.warn('TrustedTypes policy ' + policyName + ' could not be created.');
      return null;
    }
  };

  function createDOMPurify() {
    let window = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : getGlobal();

    const DOMPurify = root => createDOMPurify(root);
    /**
     * Version label, exposed for easier checks
     * if DOMPurify is up to date or not
     */


    DOMPurify.version = '3.0.3';
    /**
     * Array of elements that DOMPurify removed during sanitation.
     * Empty if nothing was removed.
     */

    DOMPurify.removed = [];

    if (!window || !window.document || window.document.nodeType !== 9) {
      // Not running in a browser, provide a factory function
      // so that you can pass your own Window
      DOMPurify.isSupported = false;
      return DOMPurify;
    }

    const originalDocument = window.document;
    const currentScript = originalDocument.currentScript;
    let {
      document
    } = window;
    const {
      DocumentFragment,
      HTMLTemplateElement,
      Node,
      Element,
      NodeFilter,
      NamedNodeMap = window.NamedNodeMap || window.MozNamedAttrMap,
      HTMLFormElement,
      DOMParser,
      trustedTypes
    } = window;
    const ElementPrototype = Element.prototype;
    const cloneNode = lookupGetter(ElementPrototype, 'cloneNode');
    const getNextSibling = lookupGetter(ElementPrototype, 'nextSibling');
    const getChildNodes = lookupGetter(ElementPrototype, 'childNodes');
    const getParentNode = lookupGetter(ElementPrototype, 'parentNode'); // As per issue #47, the web-components registry is inherited by a
    // new document created via createHTMLDocument. As per the spec
    // (http://w3c.github.io/webcomponents/spec/custom/#creating-and-passing-registries)
    // a new empty registry is used when creating a template contents owner
    // document, so we use that as our parent document to ensure nothing
    // is inherited.

    if (typeof HTMLTemplateElement === 'function') {
      const template = document.createElement('template');

      if (template.content && template.content.ownerDocument) {
        document = template.content.ownerDocument;
      }
    }

    let trustedTypesPolicy;
    let emptyHTML = '';
    const {
      implementation,
      createNodeIterator,
      createDocumentFragment,
      getElementsByTagName
    } = document;
    const {
      importNode
    } = originalDocument;
    let hooks = {};
    /**
     * Expose whether this browser supports running the full DOMPurify.
     */

    DOMPurify.isSupported = typeof entries === 'function' && typeof getParentNode === 'function' && implementation && implementation.createHTMLDocument !== undefined;
    const {
      MUSTACHE_EXPR,
      ERB_EXPR,
      TMPLIT_EXPR,
      DATA_ATTR,
      ARIA_ATTR,
      IS_SCRIPT_OR_DATA,
      ATTR_WHITESPACE
    } = EXPRESSIONS;
    let {
      IS_ALLOWED_URI: IS_ALLOWED_URI$1
    } = EXPRESSIONS;
    /**
     * We consider the elements and attributes below to be safe. Ideally
     * don't add any new ones but feel free to remove unwanted ones.
     */

    /* allowed element names */

    let ALLOWED_TAGS = null;
    const DEFAULT_ALLOWED_TAGS = addToSet({}, [...html$1, ...svg$1, ...svgFilters, ...mathMl$1, ...text]);
    /* Allowed attribute names */

    let ALLOWED_ATTR = null;
    const DEFAULT_ALLOWED_ATTR = addToSet({}, [...html, ...svg, ...mathMl, ...xml]);
    /*
     * Configure how DOMPUrify should handle custom elements and their attributes as well as customized built-in elements.
     * @property {RegExp|Function|null} tagNameCheck one of [null, regexPattern, predicate]. Default: `null` (disallow any custom elements)
     * @property {RegExp|Function|null} attributeNameCheck one of [null, regexPattern, predicate]. Default: `null` (disallow any attributes not on the allow list)
     * @property {boolean} allowCustomizedBuiltInElements allow custom elements derived from built-ins if they pass CUSTOM_ELEMENT_HANDLING.tagNameCheck. Default: `false`.
     */

    let CUSTOM_ELEMENT_HANDLING = Object.seal(Object.create(null, {
      tagNameCheck: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: null
      },
      attributeNameCheck: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: null
      },
      allowCustomizedBuiltInElements: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: false
      }
    }));
    /* Explicitly forbidden tags (overrides ALLOWED_TAGS/ADD_TAGS) */

    let FORBID_TAGS = null;
    /* Explicitly forbidden attributes (overrides ALLOWED_ATTR/ADD_ATTR) */

    let FORBID_ATTR = null;
    /* Decide if ARIA attributes are okay */

    let ALLOW_ARIA_ATTR = true;
    /* Decide if custom data attributes are okay */

    let ALLOW_DATA_ATTR = true;
    /* Decide if unknown protocols are okay */

    let ALLOW_UNKNOWN_PROTOCOLS = false;
    /* Decide if self-closing tags in attributes are allowed.
     * Usually removed due to a mXSS issue in jQuery 3.0 */

    let ALLOW_SELF_CLOSE_IN_ATTR = true;
    /* Output should be safe for common template engines.
     * This means, DOMPurify removes data attributes, mustaches and ERB
     */

    let SAFE_FOR_TEMPLATES = false;
    /* Decide if document with <html>... should be returned */

    let WHOLE_DOCUMENT = false;
    /* Track whether config is already set on this instance of DOMPurify. */

    let SET_CONFIG = false;
    /* Decide if all elements (e.g. style, script) must be children of
     * document.body. By default, browsers might move them to document.head */

    let FORCE_BODY = false;
    /* Decide if a DOM `HTMLBodyElement` should be returned, instead of a html
     * string (or a TrustedHTML object if Trusted Types are supported).
     * If `WHOLE_DOCUMENT` is enabled a `HTMLHtmlElement` will be returned instead
     */

    let RETURN_DOM = false;
    /* Decide if a DOM `DocumentFragment` should be returned, instead of a html
     * string  (or a TrustedHTML object if Trusted Types are supported) */

    let RETURN_DOM_FRAGMENT = false;
    /* Try to return a Trusted Type object instead of a string, return a string in
     * case Trusted Types are not supported  */

    let RETURN_TRUSTED_TYPE = false;
    /* Output should be free from DOM clobbering attacks?
     * This sanitizes markups named with colliding, clobberable built-in DOM APIs.
     */

    let SANITIZE_DOM = true;
    /* Achieve full DOM Clobbering protection by isolating the namespace of named
     * properties and JS variables, mitigating attacks that abuse the HTML/DOM spec rules.
     *
     * HTML/DOM spec rules that enable DOM Clobbering:
     *   - Named Access on Window (§7.3.3)
     *   - DOM Tree Accessors (§3.1.5)
     *   - Form Element Parent-Child Relations (§4.10.3)
     *   - Iframe srcdoc / Nested WindowProxies (§4.8.5)
     *   - HTMLCollection (§4.2.10.2)
     *
     * Namespace isolation is implemented by prefixing `id` and `name` attributes
     * with a constant string, i.e., `user-content-`
     */

    let SANITIZE_NAMED_PROPS = false;
    const SANITIZE_NAMED_PROPS_PREFIX = 'user-content-';
    /* Keep element content when removing element? */

    let KEEP_CONTENT = true;
    /* If a `Node` is passed to sanitize(), then performs sanitization in-place instead
     * of importing it into a new Document and returning a sanitized copy */

    let IN_PLACE = false;
    /* Allow usage of profiles like html, svg and mathMl */

    let USE_PROFILES = {};
    /* Tags to ignore content of when KEEP_CONTENT is true */

    let FORBID_CONTENTS = null;
    const DEFAULT_FORBID_CONTENTS = addToSet({}, ['annotation-xml', 'audio', 'colgroup', 'desc', 'foreignobject', 'head', 'iframe', 'math', 'mi', 'mn', 'mo', 'ms', 'mtext', 'noembed', 'noframes', 'noscript', 'plaintext', 'script', 'style', 'svg', 'template', 'thead', 'title', 'video', 'xmp']);
    /* Tags that are safe for data: URIs */

    let DATA_URI_TAGS = null;
    const DEFAULT_DATA_URI_TAGS = addToSet({}, ['audio', 'video', 'img', 'source', 'image', 'track']);
    /* Attributes safe for values like "javascript:" */

    let URI_SAFE_ATTRIBUTES = null;
    const DEFAULT_URI_SAFE_ATTRIBUTES = addToSet({}, ['alt', 'class', 'for', 'id', 'label', 'name', 'pattern', 'placeholder', 'role', 'summary', 'title', 'value', 'style', 'xmlns']);
    const MATHML_NAMESPACE = 'http://www.w3.org/1998/Math/MathML';
    const SVG_NAMESPACE = 'http://www.w3.org/2000/svg';
    const HTML_NAMESPACE = 'http://www.w3.org/1999/xhtml';
    /* Document namespace */

    let NAMESPACE = HTML_NAMESPACE;
    let IS_EMPTY_INPUT = false;
    /* Allowed XHTML+XML namespaces */

    let ALLOWED_NAMESPACES = null;
    const DEFAULT_ALLOWED_NAMESPACES = addToSet({}, [MATHML_NAMESPACE, SVG_NAMESPACE, HTML_NAMESPACE], stringToString);
    /* Parsing of strict XHTML documents */

    let PARSER_MEDIA_TYPE;
    const SUPPORTED_PARSER_MEDIA_TYPES = ['application/xhtml+xml', 'text/html'];
    const DEFAULT_PARSER_MEDIA_TYPE = 'text/html';
    let transformCaseFunc;
    /* Keep a reference to config to pass to hooks */

    let CONFIG = null;
    /* Ideally, do not touch anything below this line */

    /* ______________________________________________ */

    const formElement = document.createElement('form');

    const isRegexOrFunction = function isRegexOrFunction(testValue) {
      return testValue instanceof RegExp || testValue instanceof Function;
    };
    /**
     * _parseConfig
     *
     * @param  {Object} cfg optional config literal
     */
    // eslint-disable-next-line complexity


    const _parseConfig = function _parseConfig(cfg) {
      if (CONFIG && CONFIG === cfg) {
        return;
      }
      /* Shield configuration object from tampering */


      if (!cfg || typeof cfg !== 'object') {
        cfg = {};
      }
      /* Shield configuration object from prototype pollution */


      cfg = clone(cfg);
      PARSER_MEDIA_TYPE = // eslint-disable-next-line unicorn/prefer-includes
      SUPPORTED_PARSER_MEDIA_TYPES.indexOf(cfg.PARSER_MEDIA_TYPE) === -1 ? PARSER_MEDIA_TYPE = DEFAULT_PARSER_MEDIA_TYPE : PARSER_MEDIA_TYPE = cfg.PARSER_MEDIA_TYPE; // HTML tags and attributes are not case-sensitive, converting to lowercase. Keeping XHTML as is.

      transformCaseFunc = PARSER_MEDIA_TYPE === 'application/xhtml+xml' ? stringToString : stringToLowerCase;
      /* Set configuration parameters */

      ALLOWED_TAGS = 'ALLOWED_TAGS' in cfg ? addToSet({}, cfg.ALLOWED_TAGS, transformCaseFunc) : DEFAULT_ALLOWED_TAGS;
      ALLOWED_ATTR = 'ALLOWED_ATTR' in cfg ? addToSet({}, cfg.ALLOWED_ATTR, transformCaseFunc) : DEFAULT_ALLOWED_ATTR;
      ALLOWED_NAMESPACES = 'ALLOWED_NAMESPACES' in cfg ? addToSet({}, cfg.ALLOWED_NAMESPACES, stringToString) : DEFAULT_ALLOWED_NAMESPACES;
      URI_SAFE_ATTRIBUTES = 'ADD_URI_SAFE_ATTR' in cfg ? addToSet(clone(DEFAULT_URI_SAFE_ATTRIBUTES), // eslint-disable-line indent
      cfg.ADD_URI_SAFE_ATTR, // eslint-disable-line indent
      transformCaseFunc // eslint-disable-line indent
      ) // eslint-disable-line indent
      : DEFAULT_URI_SAFE_ATTRIBUTES;
      DATA_URI_TAGS = 'ADD_DATA_URI_TAGS' in cfg ? addToSet(clone(DEFAULT_DATA_URI_TAGS), // eslint-disable-line indent
      cfg.ADD_DATA_URI_TAGS, // eslint-disable-line indent
      transformCaseFunc // eslint-disable-line indent
      ) // eslint-disable-line indent
      : DEFAULT_DATA_URI_TAGS;
      FORBID_CONTENTS = 'FORBID_CONTENTS' in cfg ? addToSet({}, cfg.FORBID_CONTENTS, transformCaseFunc) : DEFAULT_FORBID_CONTENTS;
      FORBID_TAGS = 'FORBID_TAGS' in cfg ? addToSet({}, cfg.FORBID_TAGS, transformCaseFunc) : {};
      FORBID_ATTR = 'FORBID_ATTR' in cfg ? addToSet({}, cfg.FORBID_ATTR, transformCaseFunc) : {};
      USE_PROFILES = 'USE_PROFILES' in cfg ? cfg.USE_PROFILES : false;
      ALLOW_ARIA_ATTR = cfg.ALLOW_ARIA_ATTR !== false; // Default true

      ALLOW_DATA_ATTR = cfg.ALLOW_DATA_ATTR !== false; // Default true

      ALLOW_UNKNOWN_PROTOCOLS = cfg.ALLOW_UNKNOWN_PROTOCOLS || false; // Default false

      ALLOW_SELF_CLOSE_IN_ATTR = cfg.ALLOW_SELF_CLOSE_IN_ATTR !== false; // Default true

      SAFE_FOR_TEMPLATES = cfg.SAFE_FOR_TEMPLATES || false; // Default false

      WHOLE_DOCUMENT = cfg.WHOLE_DOCUMENT || false; // Default false

      RETURN_DOM = cfg.RETURN_DOM || false; // Default false

      RETURN_DOM_FRAGMENT = cfg.RETURN_DOM_FRAGMENT || false; // Default false

      RETURN_TRUSTED_TYPE = cfg.RETURN_TRUSTED_TYPE || false; // Default false

      FORCE_BODY = cfg.FORCE_BODY || false; // Default false

      SANITIZE_DOM = cfg.SANITIZE_DOM !== false; // Default true

      SANITIZE_NAMED_PROPS = cfg.SANITIZE_NAMED_PROPS || false; // Default false

      KEEP_CONTENT = cfg.KEEP_CONTENT !== false; // Default true

      IN_PLACE = cfg.IN_PLACE || false; // Default false

      IS_ALLOWED_URI$1 = cfg.ALLOWED_URI_REGEXP || IS_ALLOWED_URI;
      NAMESPACE = cfg.NAMESPACE || HTML_NAMESPACE;
      CUSTOM_ELEMENT_HANDLING = cfg.CUSTOM_ELEMENT_HANDLING || {};

      if (cfg.CUSTOM_ELEMENT_HANDLING && isRegexOrFunction(cfg.CUSTOM_ELEMENT_HANDLING.tagNameCheck)) {
        CUSTOM_ELEMENT_HANDLING.tagNameCheck = cfg.CUSTOM_ELEMENT_HANDLING.tagNameCheck;
      }

      if (cfg.CUSTOM_ELEMENT_HANDLING && isRegexOrFunction(cfg.CUSTOM_ELEMENT_HANDLING.attributeNameCheck)) {
        CUSTOM_ELEMENT_HANDLING.attributeNameCheck = cfg.CUSTOM_ELEMENT_HANDLING.attributeNameCheck;
      }

      if (cfg.CUSTOM_ELEMENT_HANDLING && typeof cfg.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements === 'boolean') {
        CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements = cfg.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements;
      }

      if (SAFE_FOR_TEMPLATES) {
        ALLOW_DATA_ATTR = false;
      }

      if (RETURN_DOM_FRAGMENT) {
        RETURN_DOM = true;
      }
      /* Parse profile info */


      if (USE_PROFILES) {
        ALLOWED_TAGS = addToSet({}, [...text]);
        ALLOWED_ATTR = [];

        if (USE_PROFILES.html === true) {
          addToSet(ALLOWED_TAGS, html$1);
          addToSet(ALLOWED_ATTR, html);
        }

        if (USE_PROFILES.svg === true) {
          addToSet(ALLOWED_TAGS, svg$1);
          addToSet(ALLOWED_ATTR, svg);
          addToSet(ALLOWED_ATTR, xml);
        }

        if (USE_PROFILES.svgFilters === true) {
          addToSet(ALLOWED_TAGS, svgFilters);
          addToSet(ALLOWED_ATTR, svg);
          addToSet(ALLOWED_ATTR, xml);
        }

        if (USE_PROFILES.mathMl === true) {
          addToSet(ALLOWED_TAGS, mathMl$1);
          addToSet(ALLOWED_ATTR, mathMl);
          addToSet(ALLOWED_ATTR, xml);
        }
      }
      /* Merge configuration parameters */


      if (cfg.ADD_TAGS) {
        if (ALLOWED_TAGS === DEFAULT_ALLOWED_TAGS) {
          ALLOWED_TAGS = clone(ALLOWED_TAGS);
        }

        addToSet(ALLOWED_TAGS, cfg.ADD_TAGS, transformCaseFunc);
      }

      if (cfg.ADD_ATTR) {
        if (ALLOWED_ATTR === DEFAULT_ALLOWED_ATTR) {
          ALLOWED_ATTR = clone(ALLOWED_ATTR);
        }

        addToSet(ALLOWED_ATTR, cfg.ADD_ATTR, transformCaseFunc);
      }

      if (cfg.ADD_URI_SAFE_ATTR) {
        addToSet(URI_SAFE_ATTRIBUTES, cfg.ADD_URI_SAFE_ATTR, transformCaseFunc);
      }

      if (cfg.FORBID_CONTENTS) {
        if (FORBID_CONTENTS === DEFAULT_FORBID_CONTENTS) {
          FORBID_CONTENTS = clone(FORBID_CONTENTS);
        }

        addToSet(FORBID_CONTENTS, cfg.FORBID_CONTENTS, transformCaseFunc);
      }
      /* Add #text in case KEEP_CONTENT is set to true */


      if (KEEP_CONTENT) {
        ALLOWED_TAGS['#text'] = true;
      }
      /* Add html, head and body to ALLOWED_TAGS in case WHOLE_DOCUMENT is true */


      if (WHOLE_DOCUMENT) {
        addToSet(ALLOWED_TAGS, ['html', 'head', 'body']);
      }
      /* Add tbody to ALLOWED_TAGS in case tables are permitted, see #286, #365 */


      if (ALLOWED_TAGS.table) {
        addToSet(ALLOWED_TAGS, ['tbody']);
        delete FORBID_TAGS.tbody;
      }

      if (cfg.TRUSTED_TYPES_POLICY) {
        if (typeof cfg.TRUSTED_TYPES_POLICY.createHTML !== 'function') {
          throw typeErrorCreate('TRUSTED_TYPES_POLICY configuration option must provide a "createHTML" hook.');
        }

        if (typeof cfg.TRUSTED_TYPES_POLICY.createScriptURL !== 'function') {
          throw typeErrorCreate('TRUSTED_TYPES_POLICY configuration option must provide a "createScriptURL" hook.');
        } // Overwrite existing TrustedTypes policy.


        trustedTypesPolicy = cfg.TRUSTED_TYPES_POLICY; // Sign local variables required by `sanitize`.

        emptyHTML = trustedTypesPolicy.createHTML('');
      } else {
        // Uninitialized policy, attempt to initialize the internal dompurify policy.
        if (trustedTypesPolicy === undefined) {
          trustedTypesPolicy = _createTrustedTypesPolicy(trustedTypes, currentScript);
        } // If creating the internal policy succeeded sign internal variables.


        if (trustedTypesPolicy !== null && typeof emptyHTML === 'string') {
          emptyHTML = trustedTypesPolicy.createHTML('');
        }
      } // Prevent further manipulation of configuration.
      // Not available in IE8, Safari 5, etc.


      if (freeze) {
        freeze(cfg);
      }

      CONFIG = cfg;
    };

    const MATHML_TEXT_INTEGRATION_POINTS = addToSet({}, ['mi', 'mo', 'mn', 'ms', 'mtext']);
    const HTML_INTEGRATION_POINTS = addToSet({}, ['foreignobject', 'desc', 'title', 'annotation-xml']); // Certain elements are allowed in both SVG and HTML
    // namespace. We need to specify them explicitly
    // so that they don't get erroneously deleted from
    // HTML namespace.

    const COMMON_SVG_AND_HTML_ELEMENTS = addToSet({}, ['title', 'style', 'font', 'a', 'script']);
    /* Keep track of all possible SVG and MathML tags
     * so that we can perform the namespace checks
     * correctly. */

    const ALL_SVG_TAGS = addToSet({}, svg$1);
    addToSet(ALL_SVG_TAGS, svgFilters);
    addToSet(ALL_SVG_TAGS, svgDisallowed);
    const ALL_MATHML_TAGS = addToSet({}, mathMl$1);
    addToSet(ALL_MATHML_TAGS, mathMlDisallowed);
    /**
     *
     *
     * @param  {Element} element a DOM element whose namespace is being checked
     * @returns {boolean} Return false if the element has a
     *  namespace that a spec-compliant parser would never
     *  return. Return true otherwise.
     */

    const _checkValidNamespace = function _checkValidNamespace(element) {
      let parent = getParentNode(element); // In JSDOM, if we're inside shadow DOM, then parentNode
      // can be null. We just simulate parent in this case.

      if (!parent || !parent.tagName) {
        parent = {
          namespaceURI: NAMESPACE,
          tagName: 'template'
        };
      }

      const tagName = stringToLowerCase(element.tagName);
      const parentTagName = stringToLowerCase(parent.tagName);

      if (!ALLOWED_NAMESPACES[element.namespaceURI]) {
        return false;
      }

      if (element.namespaceURI === SVG_NAMESPACE) {
        // The only way to switch from HTML namespace to SVG
        // is via <svg>. If it happens via any other tag, then
        // it should be killed.
        if (parent.namespaceURI === HTML_NAMESPACE) {
          return tagName === 'svg';
        } // The only way to switch from MathML to SVG is via`
        // svg if parent is either <annotation-xml> or MathML
        // text integration points.


        if (parent.namespaceURI === MATHML_NAMESPACE) {
          return tagName === 'svg' && (parentTagName === 'annotation-xml' || MATHML_TEXT_INTEGRATION_POINTS[parentTagName]);
        } // We only allow elements that are defined in SVG
        // spec. All others are disallowed in SVG namespace.


        return Boolean(ALL_SVG_TAGS[tagName]);
      }

      if (element.namespaceURI === MATHML_NAMESPACE) {
        // The only way to switch from HTML namespace to MathML
        // is via <math>. If it happens via any other tag, then
        // it should be killed.
        if (parent.namespaceURI === HTML_NAMESPACE) {
          return tagName === 'math';
        } // The only way to switch from SVG to MathML is via
        // <math> and HTML integration points


        if (parent.namespaceURI === SVG_NAMESPACE) {
          return tagName === 'math' && HTML_INTEGRATION_POINTS[parentTagName];
        } // We only allow elements that are defined in MathML
        // spec. All others are disallowed in MathML namespace.


        return Boolean(ALL_MATHML_TAGS[tagName]);
      }

      if (element.namespaceURI === HTML_NAMESPACE) {
        // The only way to switch from SVG to HTML is via
        // HTML integration points, and from MathML to HTML
        // is via MathML text integration points
        if (parent.namespaceURI === SVG_NAMESPACE && !HTML_INTEGRATION_POINTS[parentTagName]) {
          return false;
        }

        if (parent.namespaceURI === MATHML_NAMESPACE && !MATHML_TEXT_INTEGRATION_POINTS[parentTagName]) {
          return false;
        } // We disallow tags that are specific for MathML
        // or SVG and should never appear in HTML namespace


        return !ALL_MATHML_TAGS[tagName] && (COMMON_SVG_AND_HTML_ELEMENTS[tagName] || !ALL_SVG_TAGS[tagName]);
      } // For XHTML and XML documents that support custom namespaces


      if (PARSER_MEDIA_TYPE === 'application/xhtml+xml' && ALLOWED_NAMESPACES[element.namespaceURI]) {
        return true;
      } // The code should never reach this place (this means
      // that the element somehow got namespace that is not
      // HTML, SVG, MathML or allowed via ALLOWED_NAMESPACES).
      // Return false just in case.


      return false;
    };
    /**
     * _forceRemove
     *
     * @param  {Node} node a DOM node
     */


    const _forceRemove = function _forceRemove(node) {
      arrayPush(DOMPurify.removed, {
        element: node
      });

      try {
        // eslint-disable-next-line unicorn/prefer-dom-node-remove
        node.parentNode.removeChild(node);
      } catch (_) {
        node.remove();
      }
    };
    /**
     * _removeAttribute
     *
     * @param  {String} name an Attribute name
     * @param  {Node} node a DOM node
     */


    const _removeAttribute = function _removeAttribute(name, node) {
      try {
        arrayPush(DOMPurify.removed, {
          attribute: node.getAttributeNode(name),
          from: node
        });
      } catch (_) {
        arrayPush(DOMPurify.removed, {
          attribute: null,
          from: node
        });
      }

      node.removeAttribute(name); // We void attribute values for unremovable "is"" attributes

      if (name === 'is' && !ALLOWED_ATTR[name]) {
        if (RETURN_DOM || RETURN_DOM_FRAGMENT) {
          try {
            _forceRemove(node);
          } catch (_) {}
        } else {
          try {
            node.setAttribute(name, '');
          } catch (_) {}
        }
      }
    };
    /**
     * _initDocument
     *
     * @param  {String} dirty a string of dirty markup
     * @return {Document} a DOM, filled with the dirty markup
     */


    const _initDocument = function _initDocument(dirty) {
      /* Create a HTML document */
      let doc;
      let leadingWhitespace;

      if (FORCE_BODY) {
        dirty = '<remove></remove>' + dirty;
      } else {
        /* If FORCE_BODY isn't used, leading whitespace needs to be preserved manually */
        const matches = stringMatch(dirty, /^[\r\n\t ]+/);
        leadingWhitespace = matches && matches[0];
      }

      if (PARSER_MEDIA_TYPE === 'application/xhtml+xml' && NAMESPACE === HTML_NAMESPACE) {
        // Root of XHTML doc must contain xmlns declaration (see https://www.w3.org/TR/xhtml1/normative.html#strict)
        dirty = '<html xmlns="http://www.w3.org/1999/xhtml"><head></head><body>' + dirty + '</body></html>';
      }

      const dirtyPayload = trustedTypesPolicy ? trustedTypesPolicy.createHTML(dirty) : dirty;
      /*
       * Use the DOMParser API by default, fallback later if needs be
       * DOMParser not work for svg when has multiple root element.
       */

      if (NAMESPACE === HTML_NAMESPACE) {
        try {
          doc = new DOMParser().parseFromString(dirtyPayload, PARSER_MEDIA_TYPE);
        } catch (_) {}
      }
      /* Use createHTMLDocument in case DOMParser is not available */


      if (!doc || !doc.documentElement) {
        doc = implementation.createDocument(NAMESPACE, 'template', null);

        try {
          doc.documentElement.innerHTML = IS_EMPTY_INPUT ? emptyHTML : dirtyPayload;
        } catch (_) {// Syntax error if dirtyPayload is invalid xml
        }
      }

      const body = doc.body || doc.documentElement;

      if (dirty && leadingWhitespace) {
        body.insertBefore(document.createTextNode(leadingWhitespace), body.childNodes[0] || null);
      }
      /* Work on whole document or just its body */


      if (NAMESPACE === HTML_NAMESPACE) {
        return getElementsByTagName.call(doc, WHOLE_DOCUMENT ? 'html' : 'body')[0];
      }

      return WHOLE_DOCUMENT ? doc.documentElement : body;
    };
    /**
     * _createIterator
     *
     * @param  {Document} root document/fragment to create iterator for
     * @return {Iterator} iterator instance
     */


    const _createIterator = function _createIterator(root) {
      return createNodeIterator.call(root.ownerDocument || root, root, // eslint-disable-next-line no-bitwise
      NodeFilter.SHOW_ELEMENT | NodeFilter.SHOW_COMMENT | NodeFilter.SHOW_TEXT, null, false);
    };
    /**
     * _isClobbered
     *
     * @param  {Node} elm element to check for clobbering attacks
     * @return {Boolean} true if clobbered, false if safe
     */


    const _isClobbered = function _isClobbered(elm) {
      return elm instanceof HTMLFormElement && (typeof elm.nodeName !== 'string' || typeof elm.textContent !== 'string' || typeof elm.removeChild !== 'function' || !(elm.attributes instanceof NamedNodeMap) || typeof elm.removeAttribute !== 'function' || typeof elm.setAttribute !== 'function' || typeof elm.namespaceURI !== 'string' || typeof elm.insertBefore !== 'function' || typeof elm.hasChildNodes !== 'function');
    };
    /**
     * _isNode
     *
     * @param  {Node} obj object to check whether it's a DOM node
     * @return {Boolean} true is object is a DOM node
     */


    const _isNode = function _isNode(object) {
      return typeof Node === 'object' ? object instanceof Node : object && typeof object === 'object' && typeof object.nodeType === 'number' && typeof object.nodeName === 'string';
    };
    /**
     * _executeHook
     * Execute user configurable hooks
     *
     * @param  {String} entryPoint  Name of the hook's entry point
     * @param  {Node} currentNode node to work on with the hook
     * @param  {Object} data additional hook parameters
     */


    const _executeHook = function _executeHook(entryPoint, currentNode, data) {
      if (!hooks[entryPoint]) {
        return;
      }

      arrayForEach(hooks[entryPoint], hook => {
        hook.call(DOMPurify, currentNode, data, CONFIG);
      });
    };
    /**
     * _sanitizeElements
     *
     * @protect nodeName
     * @protect textContent
     * @protect removeChild
     *
     * @param   {Node} currentNode to check for permission to exist
     * @return  {Boolean} true if node was killed, false if left alive
     */


    const _sanitizeElements = function _sanitizeElements(currentNode) {
      let content;
      /* Execute a hook if present */

      _executeHook('beforeSanitizeElements', currentNode, null);
      /* Check if element is clobbered or can clobber */


      if (_isClobbered(currentNode)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Now let's check the element's type and name */


      const tagName = transformCaseFunc(currentNode.nodeName);
      /* Execute a hook if present */

      _executeHook('uponSanitizeElement', currentNode, {
        tagName,
        allowedTags: ALLOWED_TAGS
      });
      /* Detect mXSS attempts abusing namespace confusion */


      if (currentNode.hasChildNodes() && !_isNode(currentNode.firstElementChild) && (!_isNode(currentNode.content) || !_isNode(currentNode.content.firstElementChild)) && regExpTest(/<[/\w]/g, currentNode.innerHTML) && regExpTest(/<[/\w]/g, currentNode.textContent)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Remove element if anything forbids its presence */


      if (!ALLOWED_TAGS[tagName] || FORBID_TAGS[tagName]) {
        /* Check if we have a custom element to handle */
        if (!FORBID_TAGS[tagName] && _basicCustomElementTest(tagName)) {
          if (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, tagName)) return false;
          if (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(tagName)) return false;
        }
        /* Keep content except for bad-listed elements */


        if (KEEP_CONTENT && !FORBID_CONTENTS[tagName]) {
          const parentNode = getParentNode(currentNode) || currentNode.parentNode;
          const childNodes = getChildNodes(currentNode) || currentNode.childNodes;

          if (childNodes && parentNode) {
            const childCount = childNodes.length;

            for (let i = childCount - 1; i >= 0; --i) {
              parentNode.insertBefore(cloneNode(childNodes[i], true), getNextSibling(currentNode));
            }
          }
        }

        _forceRemove(currentNode);

        return true;
      }
      /* Check whether element has a valid namespace */


      if (currentNode instanceof Element && !_checkValidNamespace(currentNode)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Make sure that older browsers don't get noscript mXSS */


      if ((tagName === 'noscript' || tagName === 'noembed') && regExpTest(/<\/no(script|embed)/i, currentNode.innerHTML)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Sanitize element content to be template-safe */


      if (SAFE_FOR_TEMPLATES && currentNode.nodeType === 3) {
        /* Get the element's text content */
        content = currentNode.textContent;
        content = stringReplace(content, MUSTACHE_EXPR, ' ');
        content = stringReplace(content, ERB_EXPR, ' ');
        content = stringReplace(content, TMPLIT_EXPR, ' ');

        if (currentNode.textContent !== content) {
          arrayPush(DOMPurify.removed, {
            element: currentNode.cloneNode()
          });
          currentNode.textContent = content;
        }
      }
      /* Execute a hook if present */


      _executeHook('afterSanitizeElements', currentNode, null);

      return false;
    };
    /**
     * _isValidAttribute
     *
     * @param  {string} lcTag Lowercase tag name of containing element.
     * @param  {string} lcName Lowercase attribute name.
     * @param  {string} value Attribute value.
     * @return {Boolean} Returns true if `value` is valid, otherwise false.
     */
    // eslint-disable-next-line complexity


    const _isValidAttribute = function _isValidAttribute(lcTag, lcName, value) {
      /* Make sure attribute cannot clobber */
      if (SANITIZE_DOM && (lcName === 'id' || lcName === 'name') && (value in document || value in formElement)) {
        return false;
      }
      /* Allow valid data-* attributes: At least one character after "-"
          (https://html.spec.whatwg.org/multipage/dom.html#embedding-custom-non-visible-data-with-the-data-*-attributes)
          XML-compatible (https://html.spec.whatwg.org/multipage/infrastructure.html#xml-compatible and http://www.w3.org/TR/xml/#d0e804)
          We don't need to check the value; it's always URI safe. */


      if (ALLOW_DATA_ATTR && !FORBID_ATTR[lcName] && regExpTest(DATA_ATTR, lcName)) ; else if (ALLOW_ARIA_ATTR && regExpTest(ARIA_ATTR, lcName)) ; else if (!ALLOWED_ATTR[lcName] || FORBID_ATTR[lcName]) {
        if ( // First condition does a very basic check if a) it's basically a valid custom element tagname AND
        // b) if the tagName passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.tagNameCheck
        // and c) if the attribute name passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.attributeNameCheck
        _basicCustomElementTest(lcTag) && (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, lcTag) || CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(lcTag)) && (CUSTOM_ELEMENT_HANDLING.attributeNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.attributeNameCheck, lcName) || CUSTOM_ELEMENT_HANDLING.attributeNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.attributeNameCheck(lcName)) || // Alternative, second condition checks if it's an `is`-attribute, AND
        // the value passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.tagNameCheck
        lcName === 'is' && CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements && (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, value) || CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(value))) ; else {
          return false;
        }
        /* Check value is safe. First, is attr inert? If so, is safe */

      } else if (URI_SAFE_ATTRIBUTES[lcName]) ; else if (regExpTest(IS_ALLOWED_URI$1, stringReplace(value, ATTR_WHITESPACE, ''))) ; else if ((lcName === 'src' || lcName === 'xlink:href' || lcName === 'href') && lcTag !== 'script' && stringIndexOf(value, 'data:') === 0 && DATA_URI_TAGS[lcTag]) ; else if (ALLOW_UNKNOWN_PROTOCOLS && !regExpTest(IS_SCRIPT_OR_DATA, stringReplace(value, ATTR_WHITESPACE, ''))) ; else if (value) {
        return false;
      } else ;

      return true;
    };
    /**
     * _basicCustomElementCheck
     * checks if at least one dash is included in tagName, and it's not the first char
     * for more sophisticated checking see https://github.com/sindresorhus/validate-element-name
     * @param {string} tagName name of the tag of the node to sanitize
     */


    const _basicCustomElementTest = function _basicCustomElementTest(tagName) {
      return tagName.indexOf('-') > 0;
    };
    /**
     * _sanitizeAttributes
     *
     * @protect attributes
     * @protect nodeName
     * @protect removeAttribute
     * @protect setAttribute
     *
     * @param  {Node} currentNode to sanitize
     */


    const _sanitizeAttributes = function _sanitizeAttributes(currentNode) {
      let attr;
      let value;
      let lcName;
      let l;
      /* Execute a hook if present */

      _executeHook('beforeSanitizeAttributes', currentNode, null);

      const {
        attributes
      } = currentNode;
      /* Check if we have attributes; if not we might have a text node */

      if (!attributes) {
        return;
      }

      const hookEvent = {
        attrName: '',
        attrValue: '',
        keepAttr: true,
        allowedAttributes: ALLOWED_ATTR
      };
      l = attributes.length;
      /* Go backwards over all attributes; safely remove bad ones */

      while (l--) {
        attr = attributes[l];
        const {
          name,
          namespaceURI
        } = attr;
        value = name === 'value' ? attr.value : stringTrim(attr.value);
        lcName = transformCaseFunc(name);
        /* Execute a hook if present */

        hookEvent.attrName = lcName;
        hookEvent.attrValue = value;
        hookEvent.keepAttr = true;
        hookEvent.forceKeepAttr = undefined; // Allows developers to see this is a property they can set

        _executeHook('uponSanitizeAttribute', currentNode, hookEvent);

        value = hookEvent.attrValue;
        /* Did the hooks approve of the attribute? */

        if (hookEvent.forceKeepAttr) {
          continue;
        }
        /* Remove attribute */


        _removeAttribute(name, currentNode);
        /* Did the hooks approve of the attribute? */


        if (!hookEvent.keepAttr) {
          continue;
        }
        /* Work around a security issue in jQuery 3.0 */


        if (!ALLOW_SELF_CLOSE_IN_ATTR && regExpTest(/\/>/i, value)) {
          _removeAttribute(name, currentNode);

          continue;
        }
        /* Sanitize attribute content to be template-safe */


        if (SAFE_FOR_TEMPLATES) {
          value = stringReplace(value, MUSTACHE_EXPR, ' ');
          value = stringReplace(value, ERB_EXPR, ' ');
          value = stringReplace(value, TMPLIT_EXPR, ' ');
        }
        /* Is `value` valid for this attribute? */


        const lcTag = transformCaseFunc(currentNode.nodeName);

        if (!_isValidAttribute(lcTag, lcName, value)) {
          continue;
        }
        /* Full DOM Clobbering protection via namespace isolation,
         * Prefix id and name attributes with `user-content-`
         */


        if (SANITIZE_NAMED_PROPS && (lcName === 'id' || lcName === 'name')) {
          // Remove the attribute with this value
          _removeAttribute(name, currentNode); // Prefix the value and later re-create the attribute with the sanitized value


          value = SANITIZE_NAMED_PROPS_PREFIX + value;
        }
        /* Handle attributes that require Trusted Types */


        if (trustedTypesPolicy && typeof trustedTypes === 'object' && typeof trustedTypes.getAttributeType === 'function') {
          if (namespaceURI) ; else {
            switch (trustedTypes.getAttributeType(lcTag, lcName)) {
              case 'TrustedHTML':
                {
                  value = trustedTypesPolicy.createHTML(value);
                  break;
                }

              case 'TrustedScriptURL':
                {
                  value = trustedTypesPolicy.createScriptURL(value);
                  break;
                }
            }
          }
        }
        /* Handle invalid data-* attribute set by try-catching it */


        try {
          if (namespaceURI) {
            currentNode.setAttributeNS(namespaceURI, name, value);
          } else {
            /* Fallback to setAttribute() for browser-unrecognized namespaces e.g. "x-schema". */
            currentNode.setAttribute(name, value);
          }

          arrayPop(DOMPurify.removed);
        } catch (_) {}
      }
      /* Execute a hook if present */


      _executeHook('afterSanitizeAttributes', currentNode, null);
    };
    /**
     * _sanitizeShadowDOM
     *
     * @param  {DocumentFragment} fragment to iterate over recursively
     */


    const _sanitizeShadowDOM = function _sanitizeShadowDOM(fragment) {
      let shadowNode;

      const shadowIterator = _createIterator(fragment);
      /* Execute a hook if present */


      _executeHook('beforeSanitizeShadowDOM', fragment, null);

      while (shadowNode = shadowIterator.nextNode()) {
        /* Execute a hook if present */
        _executeHook('uponSanitizeShadowNode', shadowNode, null);
        /* Sanitize tags and elements */


        if (_sanitizeElements(shadowNode)) {
          continue;
        }
        /* Deep shadow DOM detected */


        if (shadowNode.content instanceof DocumentFragment) {
          _sanitizeShadowDOM(shadowNode.content);
        }
        /* Check attributes, sanitize if necessary */


        _sanitizeAttributes(shadowNode);
      }
      /* Execute a hook if present */


      _executeHook('afterSanitizeShadowDOM', fragment, null);
    };
    /**
     * Sanitize
     * Public method providing core sanitation functionality
     *
     * @param {String|Node} dirty string or DOM node
     * @param {Object} configuration object
     */
    // eslint-disable-next-line complexity


    DOMPurify.sanitize = function (dirty) {
      let cfg = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
      let body;
      let importedNode;
      let currentNode;
      let returnNode;
      /* Make sure we have a string to sanitize.
        DO NOT return early, as this will return the wrong type if
        the user has requested a DOM object rather than a string */

      IS_EMPTY_INPUT = !dirty;

      if (IS_EMPTY_INPUT) {
        dirty = '<!-->';
      }
      /* Stringify, in case dirty is an object */


      if (typeof dirty !== 'string' && !_isNode(dirty)) {
        if (typeof dirty.toString === 'function') {
          dirty = dirty.toString();

          if (typeof dirty !== 'string') {
            throw typeErrorCreate('dirty is not a string, aborting');
          }
        } else {
          throw typeErrorCreate('toString is not a function');
        }
      }
      /* Return dirty HTML if DOMPurify cannot run */


      if (!DOMPurify.isSupported) {
        return dirty;
      }
      /* Assign config vars */


      if (!SET_CONFIG) {
        _parseConfig(cfg);
      }
      /* Clean up removed elements */


      DOMPurify.removed = [];
      /* Check if dirty is correctly typed for IN_PLACE */

      if (typeof dirty === 'string') {
        IN_PLACE = false;
      }

      if (IN_PLACE) {
        /* Do some early pre-sanitization to avoid unsafe root nodes */
        if (dirty.nodeName) {
          const tagName = transformCaseFunc(dirty.nodeName);

          if (!ALLOWED_TAGS[tagName] || FORBID_TAGS[tagName]) {
            throw typeErrorCreate('root node is forbidden and cannot be sanitized in-place');
          }
        }
      } else if (dirty instanceof Node) {
        /* If dirty is a DOM element, append to an empty document to avoid
           elements being stripped by the parser */
        body = _initDocument('<!---->');
        importedNode = body.ownerDocument.importNode(dirty, true);

        if (importedNode.nodeType === 1 && importedNode.nodeName === 'BODY') {
          /* Node is already a body, use as is */
          body = importedNode;
        } else if (importedNode.nodeName === 'HTML') {
          body = importedNode;
        } else {
          // eslint-disable-next-line unicorn/prefer-dom-node-append
          body.appendChild(importedNode);
        }
      } else {
        /* Exit directly if we have nothing to do */
        if (!RETURN_DOM && !SAFE_FOR_TEMPLATES && !WHOLE_DOCUMENT && // eslint-disable-next-line unicorn/prefer-includes
        dirty.indexOf('<') === -1) {
          return trustedTypesPolicy && RETURN_TRUSTED_TYPE ? trustedTypesPolicy.createHTML(dirty) : dirty;
        }
        /* Initialize the document to work on */


        body = _initDocument(dirty);
        /* Check we have a DOM node from the data */

        if (!body) {
          return RETURN_DOM ? null : RETURN_TRUSTED_TYPE ? emptyHTML : '';
        }
      }
      /* Remove first element node (ours) if FORCE_BODY is set */


      if (body && FORCE_BODY) {
        _forceRemove(body.firstChild);
      }
      /* Get node iterator */


      const nodeIterator = _createIterator(IN_PLACE ? dirty : body);
      /* Now start iterating over the created document */


      while (currentNode = nodeIterator.nextNode()) {
        /* Sanitize tags and elements */
        if (_sanitizeElements(currentNode)) {
          continue;
        }
        /* Shadow DOM detected, sanitize it */


        if (currentNode.content instanceof DocumentFragment) {
          _sanitizeShadowDOM(currentNode.content);
        }
        /* Check attributes, sanitize if necessary */


        _sanitizeAttributes(currentNode);
      }
      /* If we sanitized `dirty` in-place, return it. */


      if (IN_PLACE) {
        return dirty;
      }
      /* Return sanitized string or DOM */


      if (RETURN_DOM) {
        if (RETURN_DOM_FRAGMENT) {
          returnNode = createDocumentFragment.call(body.ownerDocument);

          while (body.firstChild) {
            // eslint-disable-next-line unicorn/prefer-dom-node-append
            returnNode.appendChild(body.firstChild);
          }
        } else {
          returnNode = body;
        }

        if (ALLOWED_ATTR.shadowroot || ALLOWED_ATTR.shadowrootmod) {
          /*
            AdoptNode() is not used because internal state is not reset
            (e.g. the past names map of a HTMLFormElement), this is safe
            in theory but we would rather not risk another attack vector.
            The state that is cloned by importNode() is explicitly defined
            by the specs.
          */
          returnNode = importNode.call(originalDocument, returnNode, true);
        }

        return returnNode;
      }

      let serializedHTML = WHOLE_DOCUMENT ? body.outerHTML : body.innerHTML;
      /* Serialize doctype if allowed */

      if (WHOLE_DOCUMENT && ALLOWED_TAGS['!doctype'] && body.ownerDocument && body.ownerDocument.doctype && body.ownerDocument.doctype.name && regExpTest(DOCTYPE_NAME, body.ownerDocument.doctype.name)) {
        serializedHTML = '<!DOCTYPE ' + body.ownerDocument.doctype.name + '>\n' + serializedHTML;
      }
      /* Sanitize final string template-safe */


      if (SAFE_FOR_TEMPLATES) {
        serializedHTML = stringReplace(serializedHTML, MUSTACHE_EXPR, ' ');
        serializedHTML = stringReplace(serializedHTML, ERB_EXPR, ' ');
        serializedHTML = stringReplace(serializedHTML, TMPLIT_EXPR, ' ');
      }

      return trustedTypesPolicy && RETURN_TRUSTED_TYPE ? trustedTypesPolicy.createHTML(serializedHTML) : serializedHTML;
    };
    /**
     * Public method to set the configuration once
     * setConfig
     *
     * @param {Object} cfg configuration object
     */


    DOMPurify.setConfig = function (cfg) {
      _parseConfig(cfg);

      SET_CONFIG = true;
    };
    /**
     * Public method to remove the configuration
     * clearConfig
     *
     */


    DOMPurify.clearConfig = function () {
      CONFIG = null;
      SET_CONFIG = false;
    };
    /**
     * Public method to check if an attribute value is valid.
     * Uses last set config, if any. Otherwise, uses config defaults.
     * isValidAttribute
     *
     * @param  {string} tag Tag name of containing element.
     * @param  {string} attr Attribute name.
     * @param  {string} value Attribute value.
     * @return {Boolean} Returns true if `value` is valid. Otherwise, returns false.
     */


    DOMPurify.isValidAttribute = function (tag, attr, value) {
      /* Initialize shared config vars if necessary. */
      if (!CONFIG) {
        _parseConfig({});
      }

      const lcTag = transformCaseFunc(tag);
      const lcName = transformCaseFunc(attr);
      return _isValidAttribute(lcTag, lcName, value);
    };
    /**
     * AddHook
     * Public method to add DOMPurify hooks
     *
     * @param {String} entryPoint entry point for the hook to add
     * @param {Function} hookFunction function to execute
     */


    DOMPurify.addHook = function (entryPoint, hookFunction) {
      if (typeof hookFunction !== 'function') {
        return;
      }

      hooks[entryPoint] = hooks[entryPoint] || [];
      arrayPush(hooks[entryPoint], hookFunction);
    };
    /**
     * RemoveHook
     * Public method to remove a DOMPurify hook at a given entryPoint
     * (pops it from the stack of hooks if more are present)
     *
     * @param {String} entryPoint entry point for the hook to remove
     * @return {Function} removed(popped) hook
     */


    DOMPurify.removeHook = function (entryPoint) {
      if (hooks[entryPoint]) {
        return arrayPop(hooks[entryPoint]);
      }
    };
    /**
     * RemoveHooks
     * Public method to remove all DOMPurify hooks at a given entryPoint
     *
     * @param  {String} entryPoint entry point for the hooks to remove
     */


    DOMPurify.removeHooks = function (entryPoint) {
      if (hooks[entryPoint]) {
        hooks[entryPoint] = [];
      }
    };
    /**
     * RemoveAllHooks
     * Public method to remove all DOMPurify hooks
     *
     */


    DOMPurify.removeAllHooks = function () {
      hooks = {};
    };

    return DOMPurify;
  }

  var purify = createDOMPurify();

  return purify;

}));
//# sourceMappingURL=purify.js.map


/***/ }),

/***/ "@wordpress/i18n":
/*!**************************!*\
  !*** external "wp.i18n" ***!
  \**************************/
/***/ ((module) => {

"use strict";
module.exports = wp.i18n;

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["frontend"], () => (__webpack_exec__("../assets/dev/js/frontend/preloaded-elements-handlers.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=preloaded-elements-handlers.js.map