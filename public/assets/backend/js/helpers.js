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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/backend/js/helpers.js":
/*!************************************************!*\
  !*** ./resources/assets/backend/js/helpers.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function hexToRgb(hexCode) {
  var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
  var matches = patt.exec(hexCode);
  var rgb = "rgb(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + ")";
  return rgb;
}

function hexToRgba(hexCode, opacity) {
  var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
  var matches = patt.exec(hexCode);
  var rgb = "rgba(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + "," + opacity + ")";
  return rgb;
}

$(function () {
  $('.js-basic-example').DataTable({
    responsive: true
  }); //Exportable table

  $('.js-exportable').DataTable({
    dom: 'Bfrtip',
    responsive: true,
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
  });
});
$(function () {
  //Widgets count
  $('.count-to').countTo(); //Sales count to

  $('.sales-count-to').countTo({
    formatter: function formatter(value, options) {
      return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
    }
  });
  initSparkline();
});

function initSparkline() {
  $(".sparkline").each(function () {
    var $this = $(this);
    $this.sparkline('html', $this.data());
  });
}

/***/ }),

/***/ 3:
/*!******************************************************!*\
  !*** multi ./resources/assets/backend/js/helpers.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /D-HDKR/PHP/Article-Zone/resources/assets/backend/js/helpers.js */"./resources/assets/backend/js/helpers.js");


/***/ })

/******/ });


// Delete items operation
function deleteItem(key) {
    var swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: 'Are you sure ?',
        text: "You won't be able to revert this !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it !',
        cancelButtonText: 'No, cancel !',
        reverseButtons: true
    }).then(function (result) {

        if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-' + key).submit();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire('Cancelled', 'Your item is safe :)', 'error');
        }
    });
}


// Approve post operation
function approveItem(key) {
    var swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: 'Are you sure ?',
        text: "You want to approve this !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, approve it !',
        cancelButtonText: 'No, cancel !',
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            event.preventDefault();
            document.getElementById('approval-form-' + key).submit();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire('Cancelled', 'Your item remain pending :)', 'error');
        }
    });
}


// Edit comment details
function editComment(commentObj) {
    var swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: 'Modify Your Comment',
        input: 'textarea',
        inputValue: commentObj.comment,
        showCancelButton: true,
        confirmButtonText: 'Update',
        inputPlaceholder: "Write something...",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            document.getElementById('comment-' + commentObj.id).value = result.value;
            document.getElementById('update-comment-' + commentObj.id).submit();
        } else if (result.value === "") {
            swalWithBootstrapButtons.fire('Cancelled', 'You need to write something !', 'error');
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire('Cancelled', 'Your comment remain unchanged :)', 'error');
        }
    });
}

// Reply a message
function replyMessage(messageObj) {
    var swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: 'Send A Reply',
        input: 'textarea',
        showCancelButton: true,
        confirmButtonText: 'Reply',
        inputPlaceholder: "Write something...",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            document.getElementById('message-' + messageObj.id).value = result.value;
            document.getElementById('reply-message-' + messageObj.id).submit();
        } else if (result.value === "") {
            swalWithBootstrapButtons.fire('Cancelled', 'You need to write something !', 'error');
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire('Cancelled', 'The message remain pending !', 'error');
        }
    });
}

// Read category details
function readCategory(category, imageUrl) {
    Swal.fire({
        title: category.name,
        text: category.description,
        imageUrl: imageUrl,
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: 'Custom image'
    });
}

// Read author details
function readAuthor(author, imageUrl) {
    Swal.fire({
        title: author.name,
        html: '<p>Email Address: ' + author.email + '</p>' + '<p> Mobile Number: ' + author.mobile_no + '</p>' + '<br><p class="text-warning">' + (author.about || " ") + '</p><br>' + '<div>' + '<i class="material-icons text-primary">library_books</i>' + '<span> ' + author.posts_count + '</span>' + ' <i class="material-icons text-danger">favorite</i>' + '<span> ' + author.favourite_posts_count + '</span>' + ' <i class="material-icons text-primary">comment</i>' + '<span> ' + author.comments_count + '</span>' + '</div>',
        imageUrl: imageUrl,
        imageWidth: 200,
        imageHeight: 200,
        imageAlt: 'Custom image'
    });
}

// Read message details
function readMessage(message) {
    Swal.fire({
        title: message.name,
        html: '<p>Email Address: ' + message.email + '</p>' + '<br><p class="text-warning">' + (message.message || " ") + '</p><br>' + '<div>' + '<span>On :' + message.created_at + ' </span>' + '</div>',
        icon: 'info'
    });
}

