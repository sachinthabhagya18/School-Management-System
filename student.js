function addstudent() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var nic = document.getElementById("nic");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");
    var batch = document.getElementById("batch");



    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var nic = document.getElementById("nic");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");
    var batch = document.getElementById("batch");


    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("mobile", mobile.value);
    form.append("email", email.value);
    form.append("nic", nic.value);
    form.append("password", password.value);
    form.append("gender", gender.value);
    form.append("batch", batch.value);




    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                window.location = "manage_student.php";
            } else {
                alert(text);
            }

        }
    }

    r.open("POST", "addstudentProces.php", true);
    r.send(form);

}

function deletemodel(id) {
    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm)
    k.show();
}

function deletestudent(id) {

    var productid = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "sucsess") {
                k.hide();
                window.location = "manage_student.php";
            }

        }
    }
    requset.open("GET", "deletestudentprocess.php?id=" + productid, true);
    requset.send();
}


function sendid(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "update_student.php";
            }
        }
    };
    requset.open("GET", "sendstudentprocess.php?id=" + id, true);
    requset.send();
}


function updatestudent(id) {

    var pid = id;
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var nic = document.getElementById("nic");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");
    var batch = document.getElementById("batch");


    var form = new FormData();
    form.append("id", pid);
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("mobile", mobile.value);
    form.append("email", email.value);
    form.append("nic", nic.value);
    form.append("password", password.value);
    form.append("gender", gender.value);
    form.append("batch", batch.value);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "successfully") {
                window.location = "manage_student.php";
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "updatestudentProces.php", true);
    r1.send(form);
}



function sendemailid(id) {

    var pid = id;

    var form = new FormData();
    form.append("id", pid);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "success") {
                window.location = "manage_student.php";
                alert('Invate Email Sent Successfully')
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "sendemailStudent.php", true);
    r1.send(form);
}

function changeImage() {
    var image = document.getElementById("imguploader"); //file chooser
    var view = document.getElementById("prev"); //image tag

    image.onchange = function() {
        var file = this.files[0]; //image eka thiyana file path eka
        var url = window.URL.createObjectURL(file); //file location eka tempary url ekak lesa sakasima

        view.src = url; //img tag eke src ekata url eka laba dima
    }
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
            window.location = "sp_updateprofile.php";
            alert(t);
            // window.location = "userprofile.php";
        }
    }

    r.open("POST", "sp_UpdateProfileProcess.php", true);
    r.send(f);


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
                window.location = "sp_home.php";
                alert('Update Successfully')
            } else {
                alert(t);
            }

            // window.location = "userprofile.php";
        }
    }

    r.open("POST", "sp_UpdatePasswordProcess.php", true);
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






//////////Admin Panel Option///////////////////////


function deletemodel2(id) {
    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm)
    k.show();
}

function deletestudent2(id) {

    var productid = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "sucsess") {
                k.hide();
                window.location = "admin_manage_student.php";
            }

        }
    }
    requset.open("GET", "admin_deletestudentprocess.php?id=" + productid, true);
    requset.send();
}


function sendid2(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "admin_update_student.php";
            }
        }
    };
    requset.open("GET", "admin_sendstudentprocess.php?id=" + id, true);
    requset.send();
}


function updatestudent2(id) {

    var pid = id;
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var nic = document.getElementById("nic");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");
    var batch = document.getElementById("batch");


    var form = new FormData();
    form.append("id", pid);
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("mobile", mobile.value);
    form.append("email", email.value);
    form.append("nic", nic.value);
    form.append("password", password.value);
    form.append("gender", gender.value);
    form.append("batch", batch.value);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "successfully") {
                window.location = "admin_manage_student.php";
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "admin_updatestudentProces.php", true);
    r1.send(form);
}



function sendemailid2(id) {

    var pid = id;

    var form = new FormData();
    form.append("id", pid);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "success") {
                window.location = "admin_manage_student.php";
                alert('Invate Email Sent Successfully')
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "admin_sendemailStudent.php", true);
    r1.send(form);
}

//searchUser

function searchUser() {
    var text = document.getElementById("searchtext").value;
    var table = document.getElementById("utable");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "empty") {
                alert("Please add a name to search.");
            } else {
                table.innerHTML = t;
            }
        }
    }

    r.open("GET", "searchuser.php?s=" + text, true);
    r.send();
}

function basicSearch() {
    var searchSelect = document.getElementById("basic_search_batch").value;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "empty") {
                alert(t);
                // window.location = "admin_manage_student.php";
            } else {
                document.getElementById("product_view_div").innerHTML = t;
            }
        }
    }

    r.open("GET", "admin_basicSearchProccess.php?s=" + searchSelect, true);
    r.send();
}

function refresh() {
    window.location = "admin_manage_student.php";
}