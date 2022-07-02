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
