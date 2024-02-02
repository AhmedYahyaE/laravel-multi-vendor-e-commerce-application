/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "react":
/*!**************************!*\
  !*** external ["React"] ***!
  \**************************/
/***/ (function(module) {

module.exports = window["React"];

/***/ }),

/***/ "@elementor/editor-app-bar":
/*!***********************************************!*\
  !*** external ["elementorV2","editorAppBar"] ***!
  \***********************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["editorAppBar"];

/***/ }),

/***/ "@elementor/editor-documents":
/*!**************************************************!*\
  !*** external ["elementorV2","editorDocuments"] ***!
  \**************************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["editorDocuments"];

/***/ }),

/***/ "@elementor/editor-panels":
/*!***********************************************!*\
  !*** external ["elementorV2","editorPanels"] ***!
  \***********************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["editorPanels"];

/***/ }),

/***/ "@elementor/env":
/*!**************************************!*\
  !*** external ["elementorV2","env"] ***!
  \**************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["env"];

/***/ }),

/***/ "@elementor/icons":
/*!****************************************!*\
  !*** external ["elementorV2","icons"] ***!
  \****************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["icons"];

/***/ }),

/***/ "@elementor/query":
/*!****************************************!*\
  !*** external ["elementorV2","query"] ***!
  \****************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["query"];

/***/ }),

/***/ "@elementor/ui":
/*!*************************************!*\
  !*** external ["elementorV2","ui"] ***!
  \*************************************/
/***/ (function(module) {

module.exports = window["elementorV2"]["ui"];

/***/ }),

/***/ "@wordpress/api-fetch":
/*!**********************************!*\
  !*** external ["wp","apiFetch"] ***!
  \**********************************/
/***/ (function(module) {

module.exports = window["wp"]["apiFetch"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ (function(module) {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "@wordpress/url":
/*!*****************************!*\
  !*** external ["wp","url"] ***!
  \*****************************/
/***/ (function(module) {

module.exports = window["wp"]["url"];

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
/*!***********************************************************************!*\
  !*** ./node_modules/@elementor/editor-site-navigation/dist/index.mjs ***!
  \***********************************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   extendIconsMap: function() { return /* binding */ extendIconsMap; }
/* harmony export */ });
/* harmony import */ var _elementor_icons__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @elementor/icons */ "@elementor/icons");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var _elementor_ui__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @elementor/ui */ "@elementor/ui");
/* harmony import */ var _elementor_editor_documents__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @elementor/editor-documents */ "@elementor/editor-documents");
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/api-fetch */ "@wordpress/api-fetch");
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/url */ "@wordpress/url");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _elementor_editor_app_bar__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @elementor/editor-app-bar */ "@elementor/editor-app-bar");
/* harmony import */ var _elementor_editor_panels__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @elementor/editor-panels */ "@elementor/editor-panels");
/* harmony import */ var _elementor_query__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @elementor/query */ "@elementor/query");
/* harmony import */ var _elementor_env__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @elementor/env */ "@elementor/env");
// src/icons-map.ts

var initialIconsMap = {
  page: _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.PageTemplateIcon,
  section: _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.SectionTemplateIcon,
  container: _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.ContainerTemplateIcon,
  "wp-page": _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.PageTypeIcon,
  "wp-post": _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.PostTypeIcon
};
var iconsMap = { ...initialIconsMap };
function extendIconsMap(additionalIcons) {
  Object.assign(iconsMap, additionalIcons);
}
function getIconsMap() {
  return iconsMap;
}

// src/components/top-bar/recently-edited.tsx





// src/components/top-bar/indicator.tsx


function Indicator({ title, status }) {
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(Tooltip, { title }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Stack, { component: "span", direction: "row", alignItems: "center", spacing: 0.5 }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Typography, { component: "span", variant: "body2", sx: { maxWidth: "120px" }, noWrap: true }, title), status.value !== "publish" && /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Typography, { component: "span", variant: "body2", sx: { fontStyle: "italic" } }, "(", status.label, ")")));
}
function Tooltip(props) {
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Tooltip,
    {
      PopperProps: {
        sx: {
          "&.MuiTooltip-popper .MuiTooltip-tooltip.MuiTooltip-tooltipPlacementBottom": {
            mt: 2.7
          }
        }
      },
      ...props
    }
  );
}

// src/hooks/use-recent-posts.ts



var endpointPath = "/elementor/v1/site-navigation/recent-posts";
function useRecentPosts(documentId) {
  const [recentPosts, setRecentPosts] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)([]);
  const [isLoading, setIsLoading] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)(false);
  (0,react__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    if (documentId) {
      setIsLoading(true);
      fetchRecentlyEditedPosts(documentId).then((posts) => {
        setRecentPosts(posts);
        setIsLoading(false);
      });
    }
  }, [documentId]);
  return {
    isLoading,
    recentPosts
  };
}
async function fetchRecentlyEditedPosts(documentId) {
  const queryParams = {
    posts_per_page: 5,
    post__not_in: documentId
  };
  return await _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_4__({
    path: (0,_wordpress_url__WEBPACK_IMPORTED_MODULE_5__.addQueryArgs)(endpointPath, queryParams)
  }).then((response) => response).catch(() => []);
}

// src/components/top-bar/recently-edited.tsx


// src/components/top-bar/chip-doc-type.tsx



var iconsMap2 = getIconsMap();
function DocTypeChip({ postType, docType, label }) {
  const color = "elementor_library" === postType ? "global" : "primary";
  const Icon = iconsMap2[docType] || _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.PostTypeIcon;
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Chip,
    {
      component: "span",
      size: "small",
      variant: "outlined",
      label,
      "data-value": docType,
      color,
      icon: /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(Icon, null),
      sx: { ml: 1, cursor: "inherit" }
    }
  );
}

// src/components/top-bar/post-list-item.tsx




// src/hooks/use-reverse-html-entities.ts

function useReverseHtmlEntities(escapedHTML = "") {
  return (0,react__WEBPACK_IMPORTED_MODULE_1__.useMemo)(() => {
    const textarea = document.createElement("textarea");
    textarea.innerHTML = escapedHTML;
    const { value } = textarea;
    textarea.remove();
    return value;
  }, [escapedHTML]);
}

// src/components/top-bar/post-list-item.tsx
function PostListItem({ post, closePopup, ...props }) {
  const navigateToDocument = (0,_elementor_editor_documents__WEBPACK_IMPORTED_MODULE_3__.__useNavigateToDocument)();
  const postTitle = useReverseHtmlEntities(post.title);
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.MenuItem,
    {
      onClick: async () => {
        closePopup();
        await navigateToDocument(post.id);
      },
      ...props
    },
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
      _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemText,
      {
        sx: { flexGrow: 0 },
        primaryTypographyProps: { variant: "body2", noWrap: true },
        primary: postTitle
      }
    ),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
      DocTypeChip,
      {
        postType: post.type.post_type,
        docType: post.type.doc_type,
        label: post.type.label
      }
    )
  );
}

// src/components/top-bar/create-post-list-item.tsx



// src/hooks/use-create-page.ts


var endpointPath2 = "/elementor/v1/site-navigation/add-new-post";
function useCreatePage() {
  const [isLoading, setIsLoading] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)(false);
  return {
    create: () => {
      setIsLoading(true);
      return addNewPage().then((newPost) => newPost).finally(() => setIsLoading(false));
    },
    isLoading
  };
}
async function addNewPage() {
  return await _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_4__({
    path: endpointPath2,
    method: "POST",
    data: { post_type: "page" }
  });
}

// src/components/top-bar/create-post-list-item.tsx



function CreatePostListItem({ closePopup, ...props }) {
  const { create, isLoading } = useCreatePage();
  const navigateToDocument = (0,_elementor_editor_documents__WEBPACK_IMPORTED_MODULE_3__.__useNavigateToDocument)();
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.MenuItem,
    {
      onClick: async () => {
        const { id } = await create();
        closePopup();
        await navigateToDocument(id);
      },
      ...props
    },
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemIcon, null, isLoading ? /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.CircularProgress, { size: "1.25rem" }) : /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_icons__WEBPACK_IMPORTED_MODULE_0__.PlusIcon, { fontSize: "small" })),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
      _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemText,
      {
        primaryTypographyProps: { variant: "body2" },
        primary: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Add new page", "elementor")
      }
    )
  );
}

// src/components/top-bar/recently-edited.tsx
function RecentlyEdited() {
  const activeDocument = (0,_elementor_editor_documents__WEBPACK_IMPORTED_MODULE_3__.__useActiveDocument)();
  const hostDocument = (0,_elementor_editor_documents__WEBPACK_IMPORTED_MODULE_3__.__useHostDocument)();
  const document2 = activeDocument && activeDocument.type.value !== "kit" ? activeDocument : hostDocument;
  const { recentPosts } = useRecentPosts(document2?.id);
  const popupState = (0,_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.usePopupState)({
    variant: "popover",
    popupId: "elementor-v2-top-bar-recently-edited"
  });
  const documentTitle = useReverseHtmlEntities(document2?.title);
  if (!document2) {
    return null;
  }
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(react__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Button,
    {
      color: "inherit",
      size: "small",
      endIcon: /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_icons__WEBPACK_IMPORTED_MODULE_0__.ChevronDownIcon, { fontSize: "small" }),
      ...(0,_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.bindTrigger)(popupState)
    },
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
      Indicator,
      {
        title: documentTitle,
        status: document2.status
      }
    )
  ), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Menu,
    {
      MenuListProps: {
        subheader: /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListSubheader, { color: "primary", sx: { fontStyle: "italic", fontWeight: "300" } }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Recent", "elementor"))
      },
      PaperProps: { sx: { mt: 2.5, width: 320 } },
      ...(0,_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.bindMenu)(popupState)
    },
    recentPosts.map((post) => /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(PostListItem, { key: post.id, post, closePopup: popupState.close })),
    recentPosts.length === 0 && /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.MenuItem, { disabled: true }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
      _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemText,
      {
        primaryTypographyProps: {
          variant: "caption",
          fontStyle: "italic"
        },
        primary: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("There are no other pages or templates on this site yet.", "elementor")
      }
    )),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Divider, { disabled: recentPosts.length === 0 }),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(CreatePostListItem, { closePopup: popupState.close })
  ));
}

// src/init.ts


// src/hooks/use-toggle-button-props.ts



// src/components/panel/panel.ts


// src/components/panel/shell.tsx




// src/components/panel/posts-list/posts-collapsible-list.tsx




// src/hooks/use-posts.ts


// src/api/post.ts


var postTypesMap = {
  page: {
    labels: {
      singular_name: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Page", "elementor"),
      plural_name: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Pages", "elementor")
    },
    rest_base: "pages"
  }
};
var getRequest = (postTypeSlug) => {
  const baseUri = `/wp/v2/${postTypesMap[postTypeSlug].rest_base}`;
  const keys = ["id", "type", "title", "link", "status"];
  const queryParams = new URLSearchParams({
    status: "any",
    per_page: "-1",
    order: "asc",
    _fields: keys.join(",")
  });
  const uri = baseUri + "?" + queryParams.toString();
  return _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_4__({ path: uri });
};
var createRequest = (postTypeSlug, newPost) => {
  const path = `/wp/v2/${postTypesMap[postTypeSlug].rest_base}`;
  return _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_4__({
    path,
    method: "POST",
    data: newPost
  });
};
var updateRequest = (postTypeSlug, updatedPost) => {
  const path = `/wp/v2/${postTypesMap[postTypeSlug].rest_base}`;
  const { id, ...data } = updatedPost;
  return _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_4__({
    path: `${path}/${id}`,
    method: "POST",
    data
  });
};
var deleteRequest = (postTypeSlug, postId) => {
  const path = `/wp/v2/${postTypesMap[postTypeSlug].rest_base}`;
  return _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_4__({
    path: `${path}/${postId}`,
    method: "DELETE"
  });
};
var duplicateRequest = (originalPost) => {
  const path = `/elementor/v1/site-navigation/duplicate-post`;
  return _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_4__({
    path,
    method: "POST",
    data: {
      post_id: originalPost.id,
      title: originalPost.title
    }
  });
};

// src/hooks/use-posts.ts
var postsQueryKey = (postTypeSlug) => ["site-navigation", "posts", postTypeSlug];
function usePosts(postTypeSlug) {
  return (0,_elementor_query__WEBPACK_IMPORTED_MODULE_9__.useQuery)({
    queryKey: postsQueryKey(postTypeSlug),
    queryFn: () => getRequest(postTypeSlug)
  });
}

// src/contexts/post-list-context.tsx


var defaultValues = {
  type: "page",
  editMode: { mode: "none", details: {} },
  setEditMode: () => null,
  resetEditMode: () => null
};
var PostListContext = (0,react__WEBPACK_IMPORTED_MODULE_1__.createContext)(defaultValues);
var PostListContextProvider = ({
  type,
  children
}) => {
  const [editMode, setEditMode] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)(defaultValues.editMode);
  const resetEditMode = () => {
    setEditMode(defaultValues.editMode);
  };
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(PostListContext.Provider, { value: {
    type,
    editMode,
    setEditMode,
    resetEditMode
  } }, children);
};
function usePostListContext() {
  const context = (0,react__WEBPACK_IMPORTED_MODULE_1__.useContext)(PostListContext);
  if (!context) {
    throw new Error("The `usePostListContext()` hook must be used within an `<PostListContextProvider />`");
  }
  return context;
}

// src/components/panel/posts-list/collapsible-list.tsx




var RotateIcon = (0,_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.styled)(_elementor_icons__WEBPACK_IMPORTED_MODULE_0__.ChevronDownIcon, {
  shouldForwardProp: (prop) => prop !== "isOpen"
})(({ theme, isOpen }) => ({
  transform: isOpen ? "rotate(0deg)" : "rotate(-90deg)",
  transition: theme.transitions.create("transform", {
    duration: theme.transitions.duration.standard
  })
}));
function CollapsibleList({
  label,
  Icon,
  isOpenByDefault = false,
  children
}) {
  const [isOpen, setIsOpen] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)(isOpenByDefault);
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(react__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItem, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemIcon, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.IconButton,
    {
      onClick: () => setIsOpen((prev) => !prev),
      sx: { color: "inherit" },
      size: "small"
    },
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(RotateIcon, { fontSize: "small", isOpen })
  )), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemIcon, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(Icon, null)), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemText, { primaryTypographyProps: { variant: "subtitle1", component: "span", sx: { fontWeight: "bold" } }, primary: label })), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Collapse,
    {
      in: isOpen,
      timeout: "auto",
      unmountOnExit: true
    },
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.List, { dense: true }, children)
  ), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Divider, { sx: { my: 3 } }));
}

// src/components/panel/posts-list/post-list-item.tsx


// src/components/panel/posts-list/list-items/list-item-rename.tsx


// src/hooks/use-posts-actions.ts

function usePostActions(postTypeSlug) {
  const invalidatePosts = useInvalidatePosts(postTypeSlug);
  const onSuccess = () => invalidatePosts({ exact: true });
  const createPost = (0,_elementor_query__WEBPACK_IMPORTED_MODULE_9__.useMutation)({
    mutationFn: (newPost) => createRequest(postTypeSlug, newPost),
    onSuccess
  });
  const updatePost = (0,_elementor_query__WEBPACK_IMPORTED_MODULE_9__.useMutation)({
    mutationFn: (updatedPost) => updateRequest(postTypeSlug, updatedPost),
    onSuccess
  });
  const deletePost = (0,_elementor_query__WEBPACK_IMPORTED_MODULE_9__.useMutation)({
    mutationFn: (postId) => deleteRequest(postTypeSlug, postId),
    onSuccess
  });
  const duplicatePost = (0,_elementor_query__WEBPACK_IMPORTED_MODULE_9__.useMutation)({
    mutationFn: (originalPost) => duplicateRequest(originalPost),
    onSuccess
  });
  return {
    createPost,
    updatePost,
    deletePost,
    duplicatePost
  };
}
function useInvalidatePosts(postTypeSlug) {
  const queryClient = (0,_elementor_query__WEBPACK_IMPORTED_MODULE_9__.useQueryClient)();
  return (options = {}) => {
    const queryKey = postsQueryKey(postTypeSlug);
    return queryClient.invalidateQueries({ queryKey }, options);
  };
}

// src/components/panel/posts-list/list-items/edit-mode-template.tsx





function EditModeTemplate({ postTitle, isLoading, callback }) {
  const inputRef = (0,react__WEBPACK_IMPORTED_MODULE_1__.useRef)();
  const [inputError, setInputError] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)("");
  const closeButton = (0,react__WEBPACK_IMPORTED_MODULE_1__.useRef)();
  const onBlur = (e) => {
    if (closeButton.current === e.relatedTarget) {
      return;
    }
    runCallback();
  };
  const onFormSubmit = (e) => {
    e.preventDefault();
    runCallback();
  };
  const validateInput = () => {
    let isValid = true;
    if (inputRef.current?.value === "") {
      isValid = false;
      setInputError((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Name is required", "elementor"));
    }
    return isValid;
  };
  const runCallback = () => {
    if (!validateInput()) {
      return;
    }
    callback(inputRef.current?.value || "");
  };
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItem,
    {
      sx: { pt: 1, pl: 0 },
      secondaryAction: /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(CloseButton, { isLoading, closeButton })
    },
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Box, { width: "100%", sx: { ml: 4, pr: 3 }, component: "form", onSubmit: onFormSubmit }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
      _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.TextField,
      {
        autoFocus: true,
        fullWidth: true,
        ref: inputRef,
        defaultValue: postTitle,
        disabled: isLoading,
        error: !!inputError,
        onBlur,
        variant: "outlined",
        color: "secondary",
        size: "small",
        margin: "dense"
      }
    ))
  );
}
function CloseButton({ isLoading, closeButton }) {
  const { resetEditMode } = usePostListContext();
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.IconButton,
    {
      size: "small",
      color: "secondary",
      onClick: resetEditMode,
      ref: closeButton,
      disabled: isLoading
    },
    isLoading ? /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.CircularProgress, null) : /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_icons__WEBPACK_IMPORTED_MODULE_0__.XIcon, { fontSize: "small" })
  );
}

// src/components/panel/posts-list/list-items/list-item-rename.tsx
function ListItemRename({ post }) {
  const { type, resetEditMode } = usePostListContext();
  const { updatePost } = usePostActions(type);
  const renamePostCallback = (inputValue) => {
    if (inputValue === post.title.rendered) {
      resetEditMode();
    }
    updatePost.mutateAsync({
      id: post.id,
      title: inputValue
    }, {
      onSuccess: () => {
        resetEditMode();
      }
    });
  };
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(EditModeTemplate, { postTitle: post.title.rendered, isLoading: updatePost.isPending, callback: renamePostCallback });
}

// src/components/panel/posts-list/list-items/list-item-create.tsx



function ListItemCreate() {
  const { type, resetEditMode } = usePostListContext();
  const { createPost } = usePostActions(type);
  const navigateToDocument = (0,_elementor_editor_documents__WEBPACK_IMPORTED_MODULE_3__.__useNavigateToDocument)();
  const createPostCallback = (inputValue) => {
    createPost.mutateAsync({
      title: inputValue,
      status: "draft"
    }, {
      onSuccess: (data) => {
        resetEditMode();
        navigateToDocument(data.id);
      }
    });
  };
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(EditModeTemplate, { postTitle: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("New Page", "elementor"), isLoading: createPost.isPending, callback: createPostCallback });
}

// src/components/panel/posts-list/list-items/list-item-duplicate.tsx



function ListItemDuplicate() {
  const { type, editMode, resetEditMode } = usePostListContext();
  const navigateToDocument = (0,_elementor_editor_documents__WEBPACK_IMPORTED_MODULE_3__.__useNavigateToDocument)();
  const { duplicatePost } = usePostActions(type);
  if ("duplicate" !== editMode.mode) {
    return null;
  }
  const duplicatePostCallback = (inputValue) => {
    duplicatePost.mutateAsync({
      id: editMode.details.postId,
      title: inputValue
    }, {
      onSuccess: (data) => {
        resetEditMode();
        navigateToDocument(data.post_id);
      }
    });
  };
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(EditModeTemplate, { postTitle: `${editMode.details.title} ${(0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("copy", "elementor")}`, isLoading: duplicatePost.isPending, callback: duplicatePostCallback });
}

// src/components/panel/posts-list/list-items/list-item-view.tsx





// src/components/shared/page-title-and-status.tsx


var PageStatus = ({ status }) => {
  if ("publish" === status) {
    return null;
  }
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Typography,
    {
      component: "span",
      variant: "body2",
      sx: {
        textTransform: "capitalize",
        fontStyle: "italic",
        whiteSpace: "nowrap",
        flexBasis: "content"
      }
    },
    "(",
    status,
    ")"
  );
};
var PageTitle = ({ title }) => {
  const modifiedTitle = useReverseHtmlEntities(title);
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Typography,
    {
      component: "span",
      variant: "body2",
      noWrap: true,
      sx: {
        flexBasis: "auto"
      }
    },
    modifiedTitle
  );
};
function PageTitleAndStatus({ page }) {
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Box, { display: "flex" }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(PageTitle, { title: page.title.rendered }), "\xA0", /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(PageStatus, { status: page.status }));
}

// src/components/panel/actions-menu/actions/rename.tsx




// src/components/panel/actions-menu/action-menu-item.tsx


function ActionMenuItem({ title, icon: Icon, ListItemButtonProps }) {
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.MenuItem, { disableGutters: true }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemButton,
    {
      ...ListItemButtonProps
    },
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemIcon, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(Icon, null)),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemText, { primary: title })
  ));
}

// src/components/panel/actions-menu/actions/rename.tsx
function Rename({ post }) {
  const { setEditMode } = usePostListContext();
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    ActionMenuItem,
    {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Rename", "elementor"),
      icon: _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.EraseIcon,
      ListItemButtonProps: {
        onClick: () => {
          setEditMode({
            mode: "rename",
            details: {
              postId: post.id
            }
          });
        }
      }
    }
  );
}

// src/components/panel/actions-menu/actions/duplicate.tsx



function Duplicate({ post, popupState }) {
  const { setEditMode } = usePostListContext();
  const onClick = () => {
    popupState.close();
    setEditMode({
      mode: "duplicate",
      details: {
        postId: post.id,
        title: post.title.rendered
      }
    });
  };
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    ActionMenuItem,
    {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Duplicate", "elementor"),
      icon: _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.CopyIcon,
      ListItemButtonProps: {
        onClick
      }
    }
  );
}

// src/components/panel/actions-menu/actions/delete.tsx






function Delete({ post }) {
  const [isDialogOpen, setIsDialogOpen] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)(false);
  const activeDocument = (0,_elementor_editor_documents__WEBPACK_IMPORTED_MODULE_3__.__useActiveDocument)();
  const isPostActive = activeDocument?.id === post.id;
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(react__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    ActionMenuItem,
    {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Delete", "elementor"),
      icon: _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.TrashIcon,
      ListItemButtonProps: {
        disabled: post.isHome || isPostActive,
        onClick: () => setIsDialogOpen(true),
        sx: { "&:hover": { color: "error.main" } }
      }
    }
  ), isDialogOpen && /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(DeleteDialog, { post, setIsDialogOpen }));
}
function DeleteDialog({ post, setIsDialogOpen }) {
  const { type } = usePostListContext();
  const { deletePost } = usePostActions(type);
  const dialogTitle = (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.sprintf)((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)('Delete "%s"?', "elementor"), post.title.rendered);
  const deletePage = async () => {
    await deletePost.mutateAsync(post.id);
  };
  const handleCancel = () => {
    if (deletePost.isPending) {
      return;
    }
    setIsDialogOpen(false);
  };
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Dialog,
    {
      open: true,
      onClose: handleCancel,
      "aria-labelledby": "delete-dialog"
    },
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.DialogTitle, { noWrap: true }, dialogTitle),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Divider, null),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.DialogContent, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.DialogContentText, null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("The page and its content will be deleted forever and we won\u2019t be able to recover them.", "elementor"))),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.DialogActions, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Button, { variant: "contained", color: "secondary", onClick: handleCancel, disabled: deletePost.isPending }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Cancel", "elementor")), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Button, { variant: "contained", color: "error", onClick: deletePage, disabled: deletePost.isPending }, !deletePost.isPending ? (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Delete", "elementor") : /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.CircularProgress, null)))
  );
}

// src/components/panel/actions-menu/actions/view.tsx



function View({ post }) {
  const { type } = usePostListContext();
  const title = (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("View %s", "elementor").replace("%s", postTypesMap[type].labels.singular_name);
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    ActionMenuItem,
    {
      title,
      icon: _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.EyeIcon,
      ListItemButtonProps: {
        onClick: () => window.open(post.link, "_blank")
      }
    }
  );
}

// src/components/panel/actions-menu/actions/set-home.tsx




// src/hooks/use-homepage-actions.ts


// src/api/settings.ts

var getSettings = () => {
  const baseUri = "/wp/v2/settings";
  const keys = ["show_on_front", "page_on_front"];
  const queryParams = new URLSearchParams({
    _fields: keys.join(",")
  });
  const uri = baseUri + "?" + queryParams.toString();
  return _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_4__({ path: uri });
};
var updateSettings = (settings) => {
  return _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_4__({
    path: "/wp/v2/settings",
    method: "POST",
    data: settings
  });
};

// src/hooks/use-homepage.ts

var settingsQueryKey = () => ["site-navigation", "homepage"];
function useHomepage() {
  return (0,_elementor_query__WEBPACK_IMPORTED_MODULE_9__.useQuery)({
    queryKey: settingsQueryKey(),
    queryFn: () => getSettings()
  });
}

// src/hooks/use-homepage-actions.ts
function useHomepageActions() {
  const invalidateSettings = useInvalidateSettings();
  const onSuccess = async () => invalidateSettings({ exact: true });
  const updateSettingsMutation = (0,_elementor_query__WEBPACK_IMPORTED_MODULE_9__.useMutation)({
    mutationFn: (settings) => updateSettings(settings),
    onSuccess
  });
  return { updateSettingsMutation };
}
function useInvalidateSettings() {
  const queryClient = (0,_elementor_query__WEBPACK_IMPORTED_MODULE_9__.useQueryClient)();
  return (options = {}) => {
    const queryKey = settingsQueryKey();
    return queryClient.invalidateQueries({ queryKey }, options);
  };
}

// src/components/panel/actions-menu/actions/set-home.tsx

function SetHome({ post }) {
  const { updateSettingsMutation } = useHomepageActions();
  const handleClick = () => {
    updateSettingsMutation.mutateAsync({ show_on_front: "page", page_on_front: post.id });
  };
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    ActionMenuItem,
    {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Set as homepage", "elementor"),
      icon: !updateSettingsMutation.isPending ? _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.HomeIcon : _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.CircularProgress,
      ListItemButtonProps: {
        disabled: !!post.isHome || post.status !== "publish" || updateSettingsMutation.isPending,
        onClick: handleClick
      }
    }
  );
}

// src/components/panel/posts-list/list-items/list-item-view.tsx

function ListItemView({ post }) {
  const activeDocument = (0,_elementor_editor_documents__WEBPACK_IMPORTED_MODULE_3__.__useActiveDocument)();
  const navigateToDocument = (0,_elementor_editor_documents__WEBPACK_IMPORTED_MODULE_3__.__useNavigateToDocument)();
  const popupState = (0,_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.usePopupState)({
    variant: "popover",
    popupId: "post-actions",
    disableAutoFocus: true
  });
  const isActive = activeDocument?.id === post.id;
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(react__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItem,
    {
      disablePadding: true,
      secondaryAction: /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
        _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ToggleButton,
        {
          value: true,
          color: "secondary",
          size: "small",
          selected: popupState.isOpen,
          ...(0,_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.bindTrigger)(popupState)
        },
        /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_icons__WEBPACK_IMPORTED_MODULE_0__.DotsVerticalIcon, { fontSize: "small" })
      )
    },
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
      _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemButton,
      {
        selected: isActive,
        onClick: () => {
          if (!isActive) {
            navigateToDocument(post.id);
          }
        },
        dense: true,
        disableGutters: true
      },
      /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemIcon, null),
      /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
        _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemText,
        {
          disableTypography: true
        },
        /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(PageTitleAndStatus, { page: post })
      ),
      post.isHome && /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.ListItemIcon, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_icons__WEBPACK_IMPORTED_MODULE_0__.HomeIcon, { titleAccess: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Homepage", "elementor"), color: "disabled" }))
    )
  ), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Menu,
    {
      PaperProps: { sx: { mt: 2, width: 200 } },
      MenuListProps: { dense: true },
      ...(0,_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.bindMenu)(popupState)
    },
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(Rename, { post }),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(Duplicate, { post, popupState }),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(Delete, { post }),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(View, { post }),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Divider, null),
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(SetHome, { post })
  ));
}

// src/components/panel/posts-list/post-list-item.tsx
function PostListItem2({ post }) {
  const { editMode } = usePostListContext();
  if ("rename" === editMode.mode && post?.id && post?.id === editMode.details.postId) {
    return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(ListItemRename, { post });
  }
  if ("create" === editMode.mode && !post) {
    return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(ListItemCreate, null);
  }
  if ("duplicate" === editMode.mode && !post) {
    return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(ListItemDuplicate, null);
  }
  if (!post) {
    return null;
  }
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(ListItemView, { post });
}

// src/components/panel/add-new-button.tsx




function AddNewButton() {
  const { setEditMode } = usePostListContext();
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Button,
    {
      size: "small",
      sx: { mt: 4, mb: 4, mr: 5 },
      startIcon: /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_icons__WEBPACK_IMPORTED_MODULE_0__.PlusIcon, null),
      onClick: () => {
        setEditMode({ mode: "create", details: {} });
      }
    },
    (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Add New", "elementor")
  );
}

// src/components/panel/posts-list/posts-collapsible-list.tsx
function PostsCollapsibleList({ isOpenByDefault = false }) {
  const { type, editMode } = usePostListContext();
  const { data: posts, isLoading: postsLoading } = usePosts(type);
  const { data: homepageSettings } = useHomepage();
  if (!posts || postsLoading) {
    return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Box, { sx: { px: 5 } }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
      _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Box,
      {
        display: "flex",
        justifyContent: "flex-end",
        alignItems: "center"
      },
      /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Skeleton, { sx: { my: 4 }, animation: "wave", variant: "rounded", width: "110px", height: "28px" })
    ), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Box, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Skeleton, { sx: { my: 3 }, animation: "wave", variant: "rounded", width: "100%", height: "24px" }), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Skeleton, { sx: { my: 3 }, animation: "wave", variant: "rounded", width: "70%", height: "24px" }), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Skeleton, { sx: { my: 3 }, animation: "wave", variant: "rounded", width: "70%", height: "24px" }), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Skeleton, { sx: { my: 3 }, animation: "wave", variant: "rounded", width: "70%", height: "24px" })));
  }
  const label = `${postTypesMap[type].labels.plural_name} (${posts.length.toString()})`;
  const isHomepageSet = homepageSettings?.show_on_front === "page" && !!homepageSettings?.page_on_front;
  const homepageId = isHomepageSet ? homepageSettings.page_on_front : null;
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(react__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    _elementor_ui__WEBPACK_IMPORTED_MODULE_2__.Box,
    {
      display: "flex",
      justifyContent: "flex-end",
      alignItems: "center"
    },
    /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(AddNewButton, null)
  ), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_ui__WEBPACK_IMPORTED_MODULE_2__.List, { dense: true }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(
    CollapsibleList,
    {
      label,
      Icon: _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.PageTypeIcon,
      isOpenByDefault: isOpenByDefault || false
    },
    posts.map((post) => {
      post = { ...post, isHome: post.id === homepageId };
      return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(PostListItem2, { key: post.id, post });
    }),
    ["duplicate", "create"].includes(editMode.mode) && /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(PostListItem2, null)
  )));
}

// src/components/panel/shell.tsx
var Shell = () => {
  return /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_editor_panels__WEBPACK_IMPORTED_MODULE_8__.Panel, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_editor_panels__WEBPACK_IMPORTED_MODULE_8__.PanelHeader, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_editor_panels__WEBPACK_IMPORTED_MODULE_8__.PanelHeaderTitle, null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Pages", "elementor"))), /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(_elementor_editor_panels__WEBPACK_IMPORTED_MODULE_8__.PanelBody, null, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(PostListContextProvider, { type: "page" }, /* @__PURE__ */ react__WEBPACK_IMPORTED_MODULE_1__.createElement(PostsCollapsibleList, { isOpenByDefault: true }))));
};
var shell_default = Shell;

// src/components/panel/panel.ts
var {
  panel,
  usePanelStatus,
  usePanelActions
} = (0,_elementor_editor_panels__WEBPACK_IMPORTED_MODULE_8__.__createPanel)({
  id: "site-navigation-panel",
  component: shell_default
});

// src/hooks/use-toggle-button-props.ts
function useToggleButtonProps() {
  const { isOpen, isBlocked } = usePanelStatus();
  const { open, close } = usePanelActions();
  return {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__.__)("Pages", "elementor"),
    icon: _elementor_icons__WEBPACK_IMPORTED_MODULE_0__.PagesIcon,
    onClick: () => isOpen ? close() : open(),
    selected: isOpen,
    disabled: isBlocked
  };
}

// src/init.ts


// src/env.ts

var { env, validateEnv } = (0,_elementor_env__WEBPACK_IMPORTED_MODULE_10__.parseEnv)("@elementor/editor-site-navigation", (envData) => {
  return envData;
});

// src/init.ts
function init() {
  registerTopBarMenuItems();
  if (env.is_pages_panel_active) {
    (0,_elementor_editor_panels__WEBPACK_IMPORTED_MODULE_8__.__registerPanel)(panel);
    registerButton();
  }
}
function registerTopBarMenuItems() {
  (0,_elementor_editor_app_bar__WEBPACK_IMPORTED_MODULE_7__.injectIntoPageIndication)({
    id: "document-recently-edited",
    component: RecentlyEdited
  });
}
function registerButton() {
  _elementor_editor_app_bar__WEBPACK_IMPORTED_MODULE_7__.toolsMenu.registerToggleAction({
    id: "toggle-site-navigation-panel",
    priority: 2,
    useProps: useToggleButtonProps
  });
}

// src/index.ts
init();


}();
(window.elementorV2 = window.elementorV2 || {}).editorSiteNavigation = __webpack_exports__;
/******/ })()
;