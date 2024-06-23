// LOGIN
const login_pop = document.getElementById("loginPop");

// REGISTRATION
const signup_pop = document.getElementById("signupPop");

const home = document.getElementById("home");
const aboutus = document.getElementById("aboutus");
const whycats = document.getElementById("whycats");



function loginPopup() {
    signup_pop.classList.remove("signupPopup");
    login_pop.classList.add("loginPopup");
    home.classList.add("blur");
    aboutus.classList.add("blur");
    whycats.classList.add("blur");
}

function closePopup() {
    login_pop.classList.remove("loginPopup");
    signup_pop.classList.remove("signupPopup");
    home.classList.remove("blur");
    aboutus.classList.remove("blur");
    whycats.classList.remove("blur");
}

function signupPopup() {
    login_pop.classList.remove("loginPopup");
    signup_pop.classList.add("signupPopup");
    home.classList.add("blur");
    aboutus.classList.add("blur");
    whycats.classList.add("blur");
}