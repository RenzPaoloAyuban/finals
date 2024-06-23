// LOGIN
const login_pop = document.getElementById("loginPop");

// REGISTRATION
const signup_pop = document.getElementById("signupPop");

const home = document.getElementById("home");
const aboutus = document.getElementById("aboutus");
const whycats = document.getElementById("whycats");

// Admin Page Buttons
const registered_users = document.getElementById("user-table");
const furfolio_feed = document.getElementById("feed-table");
const pop_message = document.getElementById("pop-message");

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

function registeredUsers() {
    registered_users.classList.remove("show-user-table");
    furfolio_feed.classList.remove("show-feed-table");
    pop_message.classList.add("pop-msg");
}

function furfolioFeed() {
    registered_users.classList.add("show-user-table");
    furfolio_feed.classList.add("show-feed-table");
    pop_message.classList.add("pop-msg");
}