/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 11:
/***/ (function(module, exports) {

/**
 * Created by Lothar on 29/05/17.
 */

$(function () {
    showLevelIfClassSelected();

    var delay = function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    }();

    $('#classes-sel').on('change', function () {
        showLevelIfClassSelected();
    });

    $('.filter-input-onchange').on('change', function () {
        sendFilters();
    });

    //We se
    $('#spell-search-text').keyup(function () {
        delay(function () {
            sendFilters();
        }, 500);
    });
});

function sendFilters() {
    var delay = 250;
    $.ajax({
        url: '/spells',
        type: "post",
        data: {
            'name': $('#spell-search-text').val(),
            'school': $('#schools-sel').val(),
            'class': $('#classes-sel').val(),
            'level': $('#spell-level-sel').val(),
            '_token': $('input[name=_token]').val()
        },
        beforeSend: function beforeSend() {
            $('#spinner-default').show();
        },
        success: function success(data) {
            $('#spinner-default').hide();
            $('#spell-table').fadeOut().html(data).fadeIn();
        }
    });
}

function showLevelIfClassSelected() {
    if ($('#classes-sel').val() != '') {
        $('#spell-level-sel').show();
    } else {
        $('#spell-level-sel').hide();
        $('#spell-level-sel').val('');
    }
}

/***/ }),

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(11);


/***/ })

/******/ });