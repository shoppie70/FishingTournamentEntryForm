/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./Modules/Front/Resources/assets/js/app.js":
/*!**************************************************!*\
  !*** ./Modules/Front/Resources/assets/js/app.js ***!
  \**************************************************/
/***/ (() => {

// function api_axios(action, formData, form) {
//     axios.post(action, formData)
//         .then(function (response) {
//             if (response.data.code === "401") {
//                 showErrorToast(response.data.message);
//             }
//             else {
//                 showSuccessToast(response.data.message);
//             }
//             if (redirect_uri = response.data.redirect) {
//                 location.href = redirect_uri;
//             }
//         })
//         .catch(function (error) {
//             showErrorToast(error.response.data.message);
//         });
// }
//
// function showErrorToast(message) {
//     iziToast.error({
//         title: 'Error',
//         message: message ?? 'エラーが発生しました。',
//         position: 'topRight',
//         closeOnClick: true,
//         timeout: 10000
//     });
// }
//
// function showSuccessToast(message) {
//     iziToast.success({
//         title: 'OK',
//         message: message ?? 'データを正常に更新しました。',
//         position: 'topRight'
//     });
// }
//
// const api_form_elements = document.querySelectorAll('.api_form');
//
// for (let i = 0; i < api_form_elements.length; i++) {
//     api_form_elements[i].addEventListener('submit', function (e) {
//         e.preventDefault();
//         let form = this;
//         let formData = new FormData(this);
//         let action = form.action;
//         api_axios(action, formData, form);
//     });
// }

/***/ }),

/***/ "./Modules/Front/Resources/assets/sass/app.scss":
/*!******************************************************!*\
  !*** ./Modules/Front/Resources/assets/sass/app.scss ***!
  \******************************************************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/mini-css-extract-plugin/dist/loader.js):\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nSassError: Can't find stylesheet to import.\n  ╷\n8 │ @import 'components/slider';\n  │         ^^^^^^^^^^^^^^^^^^^\n  ╵\n  Modules\\Front\\Resources\\assets\\sass\\app.scss 8:9  root stylesheet\n    at processResult (C:\\Users\\shots\\Documents\\docker\\fishing\\src\\node_modules\\webpack\\lib\\NormalModule.js:758:19)\n    at C:\\Users\\shots\\Documents\\docker\\fishing\\src\\node_modules\\webpack\\lib\\NormalModule.js:860:5\n    at C:\\Users\\shots\\Documents\\docker\\fishing\\src\\node_modules\\loader-runner\\lib\\LoaderRunner.js:399:11\n    at C:\\Users\\shots\\Documents\\docker\\fishing\\src\\node_modules\\loader-runner\\lib\\LoaderRunner.js:251:18\n    at context.callback (C:\\Users\\shots\\Documents\\docker\\fishing\\src\\node_modules\\loader-runner\\lib\\LoaderRunner.js:124:13)\n    at Object.loader (C:\\Users\\shots\\Documents\\docker\\fishing\\src\\node_modules\\sass-loader\\dist\\index.js:69:5)");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	__webpack_modules__["./Modules/Front/Resources/assets/js/app.js"]();
/******/ 	// This entry module doesn't tell about it's top-level declarations so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./Modules/Front/Resources/assets/sass/app.scss"]();
/******/ 	
/******/ })()
;