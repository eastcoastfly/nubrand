/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/scripts.js":
/*!******************************!*\
  !*** ./assets/js/scripts.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var NuTabs = /*#__PURE__*/function () {
  function NuTabs(box) {
    var _this = this;

    _classCallCheck(this, NuTabs);

    if (!box) return;
    box.querySelectorAll('.wp-block-ub-tabbed-content-tab-title').forEach(function (el) {
      _this.buildTab(el);
    });
  }

  _createClass(NuTabs, [{
    key: "buildTab",
    value: function buildTab(tab) {
      var color = tab.innerText.toUpperCase();
      tab.innerText = '';
      tab.style.backgroundColor = color;

      if (color == '#FFF' || color == '#FFFFFF') {
        tab.style.border = '1px solid #000';
      }
    }
  }]);

  return NuTabs;
}();

var ScrollTop = /*#__PURE__*/function () {
  function ScrollTop(id) {
    var _this2 = this;

    _classCallCheck(this, ScrollTop);

    if (!id) return;
    var btn = document.getElementById(id);
    if (!btn) return;
    this.btn = btn;
    this.scrollY = window.scrollY;
    window.addEventListener('scroll', function () {
      _this2.scrollY = window.scrollY;

      _this2.trigger();
    });
    btn.addEventListener('click', this.clickHandler.bind(this));
    this.trigger();
  }

  _createClass(ScrollTop, [{
    key: "trigger",
    value: function trigger() {
      if (this.scrollY >= 200) {
        document.body.classList.add('scroll-visible');
      } else {
        document.body.classList.remove('scroll-visible');
      }
    }
  }, {
    key: "clickHandler",
    value: function clickHandler() {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    }
  }]);

  return ScrollTop;
}();

var NuAos = /*#__PURE__*/function () {
  function NuAos() {
    _classCallCheck(this, NuAos);

    if ((typeof AOS === "undefined" ? "undefined" : _typeof(AOS)) !== 'object') return;
    this.durationTime = 800;
    this.hero();
    this.mediaText();
    this.fadeUp();
    this.borderContent();
    this.zoonInUp();
    setTimeout(function () {
      AOS.init();
    }, 100);
  }

  _createClass(NuAos, [{
    key: "hero",
    value: function hero() {
      var _this3 = this;

      document.querySelectorAll('.wp-block-cover__inner-container').forEach(function (el) {
        el.setAttribute('data-aos', 'fade-right');

        _this3.duration(el);
      });
    }
  }, {
    key: "mediaText",
    value: function mediaText() {
      var _this4 = this;

      document.querySelectorAll('.wp-block-media-text').forEach(function (el) {
        var media = el.querySelector('.wp-block-media-text__media');
        var content = el.querySelector('.wp-block-media-text__content');

        var isVisible = _this4.isInViewport(el);

        if (!media || !content) return;

        if (el.classList.contains('has-media-on-the-right')) {
          media.setAttribute('data-aos', 'fade-left');
          content.setAttribute('data-aos', 'fade-right');
        } else {
          media.setAttribute('data-aos', 'fade-right');
          content.setAttribute('data-aos', 'fade-left');
        }

        _this4.duration(media);

        _this4.duration(content);
      });
    }
  }, {
    key: "fadeUp",
    value: function fadeUp() {
      var _this5 = this;

      var selector = ['.marks', '.colors-menu', '.color-switcher', '.nu-fade-up', '.acf-block.cards'];
      selector = selector.join(',');
      document.querySelectorAll(selector).forEach(function (el) {
        el.setAttribute('data-aos', 'fade-up');

        _this5.duration(el);
      });
    }
  }, {
    key: "borderContent",
    value: function borderContent() {
      var _this6 = this;

      document.querySelectorAll('.left-border-content').forEach(function (el) {
        el.setAttribute('data-aos', 'fade-down');

        _this6.duration(el);
      });
    }
  }, {
    key: "zoonInUp",
    value: function zoonInUp() {
      var _this7 = this;

      var selector = ['.nu-aos-on-figire figure', '.merchandise-gallery figure', '.stylized-group__gallery figure', '.stylized-group', '.nu-zoom-up', '.flip-box', '.gus-counts', '.nu-table__row > .wp-block-column > .wp-block-columns > .wp-block-column'];
      selector = selector.join(',');
      document.querySelectorAll(selector).forEach(function (el) {
        el.setAttribute('data-aos', 'zoom-in-up');

        _this7.duration(el);
      });
      document.querySelectorAll('.colors-menu .wp-block-column').forEach(function (el) {
        el.setAttribute('data-aos', 'zoom-in-right');

        _this7.duration(el);
      });
    }
  }, {
    key: "duration",
    value: function duration(el, time) {
      if (!time) time = this.durationTime;
      el.setAttribute('data-aos-duration', time);
    }
  }, {
    key: "isInViewport",
    value: function isInViewport(element) {
      var rect = element.getBoundingClientRect();
      var wh = window.innerHeight || document.documentElement.clientHeight;
      var isVis = null;

      if (rect.top > wh) {
        isVis = false;
      } else if (rect.bottom < 0) {
        isVis = false;
      } else {
        isVis = true;
      }

      return isVis;
    }
  }]);

  return NuAos;
}();

var NuMobHeader = /*#__PURE__*/function () {
  function NuMobHeader() {
    var _this8 = this;

    _classCallCheck(this, NuMobHeader);

    this.mob = false;
    this.ww = window.innerWidth;
    this.hasClassOnInit = document.body.classList.contains('is-dark-header');
    this.fire();
    jQuery(window).on('resize', function () {
      _this8.ww = window.innerWidth;

      _this8.fire();
    });
  }

  _createClass(NuMobHeader, [{
    key: "fire",
    value: function fire() {
      if (this.ww < 1025) document.body.classList.add('is-dark-header');

      if (this.ww > 1024 && !this.hasClassOnInit) {
        document.body.classList.remove('is-dark-header');
      }
    }
  }]);

  return NuMobHeader;
}();

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.color-switcher').forEach(function (el) {
    return new NuTabs(el);
  });
  new ScrollTop('scroll-to-top');
  new NuMobHeader();
});
window.addEventListener('load', function () {
  var container = $('.abc-wrap nav');
  var btn = $('.wp-block-navigation-submenu__toggle');
  jQuery(document).mouseup(function (e) {
    if (container.has(e.target).length === 0) {
      btn.attr('aria-expanded', false);
    }
  });
  container.find('a.wp-block-navigation-item__content').on('click', function () {
    btn.attr('aria-expanded', false);
  });
  new NuAos();
});

/***/ }),

/***/ "./assets/scss/style.scss":
/*!********************************!*\
  !*** ./assets/scss/style.scss ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./assets/js/scripts.js ./assets/scss/style.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/redwek/Projects/BRAND/app/public/wp-content/themes/nu-start-child/assets/js/scripts.js */"./assets/js/scripts.js");
module.exports = __webpack_require__(/*! /home/redwek/Projects/BRAND/app/public/wp-content/themes/nu-start-child/assets/scss/style.scss */"./assets/scss/style.scss");


/***/ })

/******/ });