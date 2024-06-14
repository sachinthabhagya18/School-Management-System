function addsubject() {
    var subjectname = document.getElementById("subjectname");
    var subjectcode = document.getElementById("subjectcode");



    var form = new FormData();
    form.append("subjectname", subjectname.value);
    form.append("subjectcode", subjectcode.value);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Subject added successfully") {
                window.location = "create_subject.php";
            } else {
                alert(text);
            }


        }
    }

    r.open("POST", "addsubjectprocess.php", true);
    r.send(form);

}



function sendid(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "update_subject.php";
            }
        }
    };
    requset.open("GET", "sendsubjectprocess.php?id=" + id, true);
    requset.send();
}

function deletemodel(id) {
    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm)
    k.show();
}

function deletesubject(id) {

    var productid = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "sucsess") {
                k.hide();
                window.location = "manage_subject.php";
            }

        }
    }
    requset.open("GET", "deletesubjectprocess.php?id=" + productid, true);
    requset.send();
}






function updatesubject(id) {

    var pid = id;

    var subjectname = document.getElementById("subjectname");
    var subjectcode = document.getElementById("subjectcode");

    var form = new FormData();
    form.append("id", pid);
    form.append("subjectname", subjectname.value);
    form.append("subjectcode", subjectcode.value);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "Subject added successfully") {
                window.location = "manage_subject.php";
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "updatesubjectProces.php", true);
    r1.send(form);
}