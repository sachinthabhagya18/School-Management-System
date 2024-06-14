function signInteacher() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var remember = document.getElementById("remember");

    var formData = new FormData();
    formData.append("username", username.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "teacherpanel.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }
        }
    };

    r.open("POST", "teachersignInProcess.php", true);
    r.send(formData);
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

    r.open("GET", "teachersignout.php", true);
    r.send();

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




function addlessonnote() {
    var l_name = document.getElementById("l_name");
    var l_id = document.getElementById("l_id");
    var batch = document.getElementById("batch");
    var l_file = document.getElementById("l_file");




    var form = new FormData();
    form.append("l_name", l_name.value);
    form.append("l_id", l_id.value);
    form.append("batch", batch.value);
    form.append("l_file", l_file.files[0]);




    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Lesson added successfully") {
                window.location = "manage_lessonnote.php";
            } else {
                alert(text);
            }


        }
    }

    r.open("POST", "addlessonnotetProces.php", true);
    r.send(form);

}

function addassignment() {
    var a_name = document.getElementById("a_name");
    var a_unic_id = document.getElementById("a_unic_id");
    var a_release_date = document.getElementById("a_release_date");
    var a_end_date = document.getElementById("a_end_date");
    var batch = document.getElementById("batch");
    var l_file = document.getElementById("l_file");




    var form = new FormData();
    form.append("a_name", a_name.value);
    form.append("a_unic_id", a_unic_id.value);
    form.append("a_release_date", a_release_date.value);
    form.append("a_unic_id", a_unic_id.value);
    form.append("a_end_date", a_end_date.value);
    form.append("batch", batch.value);
    form.append("l_file", l_file.files[0]);




    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Lesson added successfully") {
                window.location = "manage_assignment.php";
            } else {
                alert(text);
            }


        }
    }

    r.open("POST", "addassignmentProces.php", true);
    r.send(form);

}

function sendid(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "update_lessonnote.php";
            }
        }
    };
    requset.open("GET", "sendlessonnoteprocess.php?id=" + id, true);
    requset.send();
}

function deletemodel(id) {
    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm)
    k.show();
}

function deletelessonnote(id) {

    var productid = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "sucsess") {
                k.hide();
                window.location = "manage_lessonnote.php";
            }

        }
    }
    requset.open("GET", "deletelessonnoteprocess.php?id=" + productid, true);
    requset.send();
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



function sendid3(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "update_assignment.php";
            }
        }
    };
    requset.open("GET", "sendassignmentprocess.php?id=" + id, true);
    requset.send();
}

function deletemodel3(id) {
    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm)
    k.show();
}

function deleteassignment(id) {

    var productid = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "sucsess") {
                k.hide();
                window.location = "manage_assignment.php";
            }

        }
    }
    requset.open("GET", "deleteassignmentprocess.php?id=" + productid, true);
    requset.send();
}

function updatelessonnote(id) {

    var pid = id;

    var l_name = document.getElementById("l_name");
    var l_id = document.getElementById("l_id");
    var batch = document.getElementById("batch");
    var l_file = document.getElementById("l_file");

    var form = new FormData();
    form.append("id", pid);
    form.append("l_name", l_name.value);
    form.append("l_id", l_id.value);
    form.append("batch", batch.value);
    form.append("l_file", l_file.files[0]);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "Lesson added successfully") {
                window.location = "manage_lessonnote.php";
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "updatelessonnoteProces.php", true);
    r1.send(form);
}


function updateassignment(id) {

    var pid = id;
    var a_release_date = document.getElementById("a_release_date");
    var a_end_date = document.getElementById("a_end_date");
    var a_unic_id = document.getElementById("a_unic_id");
    var a_name = document.getElementById("a_name");
    var batch = document.getElementById("batch");
    var l_file = document.getElementById("l_file");

    var form = new FormData();
    form.append("id", pid);
    form.append("a_release_date", a_release_date.value);
    form.append("a_end_date", a_end_date.value);
    form.append("a_unic_id", a_unic_id.value);
    form.append("a_name", a_name.value);
    form.append("batch", batch.value);
    form.append("l_file", l_file.files[0]);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "successfully") {
                window.location = "manage_assignment.php";
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "updateassingmentProces.php", true);
    r1.send(form);
}


function addmarks() {
    var s_nic = document.getElementById("s_nic");
    var a_id = document.getElementById("a_id");
    var marks = document.getElementById("marks");


    var form = new FormData();
    form.append("s_nic", s_nic.value);
    form.append("a_id", a_id.value);
    form.append("marks", marks.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Marks added successfully") {
                window.location = "t_view_marks.php";
            } else {
                alert(text);
            }

        }
    }

    r.open("POST", "t_addmarksProcess.php", true);
    r.send(form);

}


function sendid3(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "t_update_marks.php";
            }
        }
    };
    requset.open("GET", "t_sendmarksprocess.php?id=" + id, true);
    requset.send();
}

function deletemodel3(id) {
    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm)
    k.show();
}

function deleteMarks(id) {

    var productid = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "sucsess") {
                k.hide();
                window.location = "t_view_marks.php";
            }

        }
    }
    requset.open("GET", "t_deletemarksprocess.php?id=" + productid, true);
    requset.send();
}

function updateMarks(id) {

    var pid = id;
    var marks = document.getElementById("marks");

    var form = new FormData();
    form.append("id", pid);
    form.append("marks", marks.value);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "Marks updated successfully") {
                window.location = "t_view_marks.php";
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "updateMarksProces.php", true);
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
                window.location = "ac_view_assment_result.php";
                alert('Invate Email Sent Successfully')
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "ac_sendemailStudent.php", true);
    r1.send(form);
}

function sendid2(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "sp_upload_answear.php";
            }
        }
    };
    requset.open("GET", "sp_sendansprocess.php?id=" + id, true);
    requset.send();
}

function uploadans() {
    var a_id = document.getElementById("a_id");
    var s_nic = document.getElementById("s_nic");
    var subjectcode = document.getElementById("subjectcode");
    var l_file = document.getElementById("l_file");

    alert(a_id);



    var form = new FormData();
    form.append("a_id", a_id.value);
    form.append("s_nic", s_nic.value);
    form.append("subjectcode", subjectcode.value);
    form.append("l_file", l_file.files[0]);




    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Uploded successfully") {
                window.location = "sp_upload_assment.php";
            } else {
                alert(text);
            }


        }
    }

    r.open("POST", "addansProces.php", true);
    r.send(form);

}

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

    r.open("GET", "t_searchuser.php?s=" + text, true);
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

    r.open("GET", "t_basicSearchProccess.php?s=" + searchSelect, true);
    r.send();
}

function refresh() {
    window.location = "manage_assignment.php";
}


function basicSearch2() {
    var searchSelect = document.getElementById("basic_search_subject2").value;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "empty") {
                alert(t);
                // window.location = "admin_manage_student.php";
            } else {
                document.getElementById("product_view_div2").innerHTML = t;
            }
        }
    }

    r.open("GET", "a_result_basicSearchProccess.php?s=" + searchSelect, true);
    r.send();
}

function refresh2() {
    window.location = "a_result.php";
}