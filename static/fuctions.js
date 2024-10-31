
function deleteAllCookies() {
    // Get all cookies
    const cookies = document.cookie.split("; ");

    // Loop through all cookies and set each to expire
    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i];
        const eqPos = cookie.indexOf("=");
        const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie; // Get cookie name

        // Set the cookie to expire in the past
        document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
}

function redirect($dst) {
    window.location.href = $dst;
}