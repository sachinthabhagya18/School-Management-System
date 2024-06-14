function addac_officer() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var accode = document.getElementById("accode");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");




    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var accode = document.getElementById("accode");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");



    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("mobile", mobile.value);
    form.append("email", email.value);
    form.append("accode", accode.value);
    form.append("password", password.value);
    form.append("gender", gender.value);





    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                window.location = "manage_acofficer.php";
            } else {
                alert(text);
            }

        }
    }

    r.open("POST", "addacofficerProces.php", true);
    r.send(form);

}

function deletemodel(id) {
    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm)
    k.show();
}

function deleteac_officer(id) {

    var productid = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "sucsess") {
                k.hide();
                window.location = "manage_acofficer.php";
            }

        }
    }
    requset.open("GET", "deleteacofficerprocess.php?id=" + productid, true);
    requset.send();
}


function sendid(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "update_acofficer.php";
            }
        }
    };
    requset.open("GET", "sendacofficerprocess.php?id=" + id, true);
    requset.send();
}


function updateac_officer(id) {

    var pid = id;
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var accode = document.getElementById("accode");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");




    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var accode = document.getElementById("accode");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");



    var form = new FormData();
    form.append("id", pid);
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("mobile", mobile.value);
    form.append("email", email.value);
    form.append("accode", accode.value);
    form.append("password", password.value);
    form.append("gender", gender.value);


    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "successfully") {
                window.location = "manage_acofficer.php";
            } else {
                alert(text1);
            }


        }
    }

    r1.open("POST", "updateacofficerProces.php", true);
    r1.send(form);
}

function sendemailid3(id) {

    var pid = id;

    var form = new FormData();
    form.append("id", pid);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "success") {
                window.location = "manage_acofficer.php";
                alert('Invate Email Sent Successfully')
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "sendemailAcofficer.php", true);
    r1.send(form);
}

function updatepassword() {

    var p1 = document.getElementById("password1");
    var p2 = document.getElementById("password2");

    var f = new FormData();

    f.append("p1", p1.value);
    f.append("p2", p2.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Update Password SuccessFully") {
                window.location = "ac_home.php";
                alert('Update Successfully')
            } else {
                alert(t);
            }

            // window.location = "userprofile.php";
        }
    }

    r.open("POST", "ac_UpdatePasswordProcess.php", true);
    r.send(f);


}

function updateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var img = document.getElementById("imguploader");

    var f = new FormData();

    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            window.location = "ac_updateprofile.php";
            alert(t);
            // window.location = "userprofile.php";
        }
    }

    r.open("POST", "ac_UpdateProfileProcess.php", true);
    r.send(f);


}

function signout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "sp_login.php";
            }

        }
    };

    r.open("GET", "sp_signout.php", true);
    r.send();

}