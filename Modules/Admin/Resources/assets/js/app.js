function api_axios(action, formData, form) {
    axios.post(action, formData)
        .then(function (response) {
            if (response.data.code === "401") {
                showErrorToast(response.data.message);
            } else {
                showSuccessToast(response.data.message);
            }
            if (redirect_uri = response.data.redirect) {
                location.href = redirect_uri;
            }
        })
        .catch(function (error) {
            showErrorToast(error.response.data.message);
        });
}

function showErrorToast(message) {
    iziToast.error({
        title: 'Error',
        message: message ?? 'エラーが発生しました。',
        position: 'topRight',
        closeOnClick: true,
        timeout: 10000
    });
}

function showSuccessToast(message) {
    iziToast.success({
        title: 'OK',
        message: message ?? 'データを正常に更新しました。',
        position: 'topRight'
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll(".api_form");
    for (let i = 0; i < forms.length; i++) {
        forms[i].addEventListener("submit", function (e) {
            e.preventDefault();
            let form = this;
            let formData = new FormData(this);
            let action = form.action;

            api_axios(action, formData, form);
        });
    }
});

(function () {
    const burgerMenu = document.querySelector('.hamburger-menu-btn__wrapper');
    const Sidebar = document.querySelector('#sidebar');
    const mainContent = document.querySelector('#main-content');
    const lineBefore = document.querySelector('.hamburger-menu__btn_before');
    const line = document.querySelector('.hamburger-menu__btn');
    const lineAfter = document.querySelector('.hamburger-menu__btn_after');

    burgerMenu.addEventListener('click', () => {
        burgerMenu.classList.toggle('burger-menu--active');
        Sidebar.classList.toggle('sidebar--active');
        mainContent.classList.toggle('main-content--active');
        lineBefore.classList.toggle('hamburger-menu__btn_before-active');
        line.classList.toggle('hamburger-menu__btn_active');
        lineAfter.classList.toggle('hamburger-menu__btn_after-active');
    });
}());

/* Make dynamic date appear */
(function () {
    if (document.getElementById("get-current-year")) {
        document.getElementById(
            "get-current-year"
        ).innerHTML = new Date().getFullYear();
    }
})();

/* Sidebar - Side navigation menu on mobile/responsive mode */
function toggleNavbar(collapseID) {
    document.getElementById(collapseID).classList.toggle("hidden");
    document.getElementById(collapseID).classList.toggle("bg-white");
    document.getElementById(collapseID).classList.toggle("m-2");
    document.getElementById(collapseID).classList.toggle("py-3");
    document.getElementById(collapseID).classList.toggle("px-6");
}

/* Function for dropdowns */
function openDropdown(event, dropdownID) {
    let element = event.target;
    while (element.nodeName !== "A") {
        element = element.parentNode;
    }
    Popper.createPopper(element, document.getElementById(dropdownID), {
        placement: "bottom-start",
    });
    document.getElementById(dropdownID).classList.toggle("hidden");
    document.getElementById(dropdownID).classList.toggle("block");
}

