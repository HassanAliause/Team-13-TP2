// creatng the function for changing the header when logged in
// let isLoggedIn = false; // set this value based on your authentication logic
let isLoggedIn =$_SESSION["loggedin"] = true;

let loginLink = document.getElementById("login-link");
let logoutLink = document.getElementById("logout-link");


if (!isLoggedIn) {
    // if the user is not logged in, show the login and , and hide the logout button
    loginLink.style.display = "inline-block";
    logoutLink.style.display = "none";
    // orderLink.style.display = "none";
} else {
    
    // if the user is logged in, hide the login and , and show the logout button
    loginLink.style.display = "none";
    logoutLink.style.display = "inline-block";
    // orderLink.style.display = "inline-block";
 
}