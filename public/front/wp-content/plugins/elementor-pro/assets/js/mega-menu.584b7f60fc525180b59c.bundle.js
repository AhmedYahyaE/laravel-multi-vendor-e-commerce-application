/*! elementor-pro - v3.18.0 - 06-12-2023 */
"use strict";
(self["webpackChunkelementor_pro"] = self["webpackChunkelementor_pro"] || []).push([["mega-menu"],{

/***/ "../assets/dev/js/frontend/utils/anchor-link.js":
/*!******************************************************!*\
  !*** ../assets/dev/js/frontend/utils/anchor-link.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, exports) => {



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

/***/ "../modules/mega-menu/assets/js/frontend/handlers/mega-menu.js":
/*!*********************************************************************!*\
  !*** ../modules/mega-menu/assets/js/frontend/handlers/mega-menu.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



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

/***/ "../modules/mega-menu/assets/js/frontend/utils.js":
/*!********************************************************!*\
  !*** ../modules/mega-menu/assets/js/frontend/utils.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, exports) => {



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

/***/ })

}]);
//# sourceMappingURL=mega-menu.584b7f60fc525180b59c.bundle.js.map