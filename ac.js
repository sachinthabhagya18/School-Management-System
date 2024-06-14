function signIn() {
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var remember = document.getElementById("remember");

    var formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "ac_home.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }
        }
    };

    r.open("POST", "ac_signInProcess.php", true);
    r.send(formData);
}


function signout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "ac_login.php";
            }

        }
    };

    r.open("GET", "ac_signout.php", true);
    r.send();

}