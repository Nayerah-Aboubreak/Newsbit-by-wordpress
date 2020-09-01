 (function(modules) { // webpackBootstrap
 	// The module cache
 	var installedModules = {};

 	// The require function
 	function __webpack_require__(moduleId) {

 		// Check if module is in cache
 		if(installedModules[moduleId]) {
 			return installedModules[moduleId].exports;
 		}
 		// Create a new module (and put it into the cache)
 		var module = installedModules[moduleId] = {
 			i: moduleId,
 			l: false,
 			exports: {}
 		};

 		// Execute the module function
 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

 		// Flag the module as loaded
 		module.l = true;

 		// Return the exports of the module
 		return module.exports;
 	}


 	// expose the modules object (__webpack_modules__)
 	__webpack_require__.m = modules;

 	// expose the module cache
 	__webpack_require__.c = installedModules;

 	// define getter function for harmony exports
 	__webpack_require__.d = function(exports, name, getter) {
 		if(!__webpack_require__.o(exports, name)) {
 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
 		}
 	};

 	// define __esModule on exports
 	__webpack_require__.r = function(exports) {
 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
 		}
 		Object.defineProperty(exports, '__esModule', { value: true });
 	};

 	// create a fake namespace object
 	// mode & 1: value is a module id, require it
 	// mode & 2: merge all properties of value into the ns
 	// mode & 4: return value when already ns object
 	// mode & 8|1: behave like require
 	__webpack_require__.t = function(value, mode) {
 		if(mode & 1) value = __webpack_require__(value);
 		if(mode & 8) return value;
 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
 		var ns = Object.create(null);
 		__webpack_require__.r(ns);
 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
 		return ns;
 	};

 	// getDefaultExport function for compatibility with non-harmony modules
 	__webpack_require__.n = function(module) {
 		var getter = module && module.__esModule ?
 			function getDefault() { return module['default']; } :
 			function getModuleExports() { return module; };
 		__webpack_require__.d(getter, 'a', getter);
 		return getter;
 	};

 	// Object.prototype.hasOwnProperty.call
 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };

 	// __webpack_public_path__
 	__webpack_require__.p = "";


 	// Load entry module and return exports
 	return __webpack_require__(__webpack_require__.s = 0);
 })
/************************************************************************/
 ({

/***/ "./src/assets/js/bundle.js":
/*!*********************************!*\
  !*** ./src/assets/js/bundle.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

    "use strict";
    __webpack_require__.r(__webpack_exports__);
    /* harmony import */ var _components_scrollTop__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/scrollTop */ "./src/assets/js/components/scrollTop.js");
    /* harmony import */ var _components_skip_link_focus_fix__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/skip-link-focus-fix */ "./src/assets/js/components/skip-link-focus-fix.js");
    /* harmony import */ var _components_skip_link_focus_fix__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_components_skip_link_focus_fix__WEBPACK_IMPORTED_MODULE_1__);
    
    
    
    /***/ }),
    
    /***/ "./src/assets/js/components/scrollTop.js":
    /*!***********************************************!*\
      !*** ./src/assets/js/components/scrollTop.js ***!
      \***********************************************/
    /*! no exports provided */
    /***/ (function(module, __webpack_exports__, __webpack_require__) {
    
    "use strict";
    __webpack_require__.r(__webpack_exports__);
    /* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
    /* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
     // Scroll to top
    
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).scroll(function () {
      if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(this).scrollTop() > 150) {
        jquery__WEBPACK_IMPORTED_MODULE_0___default()("#scroll-to-top").fadeIn();
      } else {
        jquery__WEBPACK_IMPORTED_MODULE_0___default()("#scroll-to-top").fadeOut();
      }
    });
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("#scroll-to-top").click(function () {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()("html, body").animate({
        scrollTop: 0
      }, 1000);
    });
    
    /***/ }),
    
    /***/ "./src/assets/js/components/skip-link-focus-fix.js":
    /*!*********************************************************!*\
      !*** ./src/assets/js/components/skip-link-focus-fix.js ***!
      \*********************************************************/
    /*! no static exports found */
    /***/ (function(module, exports) {
    
    /**
     * File skip-link-focus-fix.js.
     *
     * Helps with accessibility for keyboard only users.
     *
     * Learn more: https://git.io/vWdr2
     */
    (function () {
      var isIe = /(trident|msie)/i.test(navigator.userAgent);
    
      if (isIe && document.getElementById && window.addEventListener) {
        window.addEventListener('hashchange', function () {
          var id = location.hash.substring(1),
              element;
    
          if (!/^[A-z0-9_-]+$/.test(id)) {
            return;
          }
    
          element = document.getElementById(id);
    
          if (element) {
            if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
              element.tabIndex = -1;
            }
    
            element.focus();
          }
        }, false);
      }
    })();
    
    /***/ }),
    
    /***/ 0:
    /*!***************************************!*\
      !*** multi ./src/assets/js/bundle.js ***!
      \***************************************/
    /*! no static exports found */
    /***/ (function(module, exports, __webpack_require__) {
    
    module.exports = __webpack_require__(/*! C:\laragon\www\backup-theme\wp-content\themes\frannawp\src\assets\js\bundle.js */"./src/assets/js/bundle.js");
    
    
    /***/ }),
    
    /***/ "jquery":
    /*!*************************!*\
      !*** external "jQuery" ***!
      \*************************/
    /*! no static exports found */
    /***/ (function(module, exports) {
    
    module.exports = jQuery;
    
    /***/ })
    
     });