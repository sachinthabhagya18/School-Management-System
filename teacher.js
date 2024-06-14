function addteacher() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var tcode = document.getElementById("tcode");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");
    var subject = document.getElementById("subject");



    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var tcode = document.getElementById("tcode");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");
    var subject = document.getElementById("subject");


    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("mobile", mobile.value);
    form.append("email", email.value);
    form.append("tcode", tcode.value);
    form.append("password", password.value);
    form.append("gender", gender.value);
    form.append("subject", subject.value);




    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                window.location = "manage_teacher.php";
            } else {
                alert(text);
            }


        }
    }

    r.open("POST", "addteacherProces.php", true);
    r.send(form);

}






function deletemodel(id) {
    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm)
    k.show();
}

function deleteteacher(id) {

    var productid = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "sucsess") {
                k.hide();
                window.location = "manage_teacher.php";
            }

        }
    }
    requset.open("GET", "deleteteacherprocess.php?id=" + productid, true);
    requset.send();
}


function sendid(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "update_teacher.php";
            }
        }
    };
    requset.open("GET", "sendteacherprocess.php?id=" + id, true);
    requset.send();
}


function updateteacher(id) {

    var pid = id;
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var tcode = document.getElementById("tcode");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");
    var subject = document.getElementById("subject");



    var form = new FormData();
    form.append("id", pid);
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("mobile", mobile.value);
    form.append("email", email.value);
    form.append("tcode", tcode.value);
    form.append("password", password.value);
    form.append("gender", gender.value);
    form.append("subject", subject.value);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "successfully") {
                window.location = "manage_teacher.php";
            } else {
                alert(text1);
            }


        }
    }

    r1.open("POST", "updateteacherProces.php", true);
    r1.send(form);
}

function sendemailidteacher(id) {

    var pid = id;

    var form = new FormData();
    form.append("id", pid);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "success") {
                window.location = "manage_teacher.php";
                alert('Invite Email Sent Successfully')
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "sendemailTeacher.php", true);
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
            window.location = "t_updateprofile.php";
            alert(t);
            // window.location = "userprofile.php";
        }
    }

    r.open("POST", "t_UpdateProfileProcess.php", true);
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
                window.location = "teacherpanel.php";
                alert('Update Successfully')
            } else {
                alert(t);
            }

            // window.location = "userprofile.php";
        }
    }

    r.open("POST", "t_UpdatePasswordProcess.php", true);
    r.send(f);


}

function signout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "teacherlogin.php";
            }

        }
    };

    r.open("GET", "t_signout.php", true);
    r.send();

}

function basicSearch() {
    var searchSelect = document.getElementById("basic_search_subject").value;
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

    r.open("GET", "admin_t_basicSearchProccess.php?s=" + searchSelect, true);
    r.send();
}

function refresh() {
    window.location = "manage_teacher.php";
}