function sendid(id) {

    var id = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "success") {
                window.location = "update_batch.php";
            }
        }
    };
    requset.open("GET", "sendbatchprocess.php?id=" + id, true);
    requset.send();
}

function deletemodel(id) {
    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm)
    k.show();
}

function deletebatch(id) {

    var productid = id;

    var requset = new XMLHttpRequest();
    requset.onreadystatechange = function() {
        if (requset.readyState == 4) {
            var t = requset.responseText;
            if (t == "sucsess") {
                k.hide();
                window.location = "manage_batch.php";
            }

        }
    }
    requset.open("GET", "deletebatchprocess.php?id=" + productid, true);
    requset.send();
}






function updatebatch(id) {

    var pid = id;

    var batchname = document.getElementById("batchname");
    var section = document.getElementById("section");
    var image = document.getElementById("imguploader");

    var form = new FormData();
    form.append("id", pid);
    form.append("batchname", batchname.value);
    form.append("section", section.value);
    form.append("imguploader", image.files[0]);

    var r1 = new XMLHttpRequest();
    r1.onreadystatechange = function() {
        if (r1.readyState == 4) {
            var text1 = r1.responseText;
            if (text1 == "successfully") {
                window.location = "update_batch.php";
            } else {
                alert(text1);
            }
        }
    }

    r1.open("POST", "updatebatchProces.php", true);
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

function uploadans() {
    var a_id = document.getElementById("a_id");
    var s_nic = document.getElementById("s_nic");
    var subjectcode = document.getElementById("subjectcode");
    var l_file = document.getElementById("l_file");

    var form = new FormData();
    form.append("a_id", a_id.value);
    form.append("s_nic", s_nic.value);
    form.append("subjectcode", subjectcode.value);
    form.append("l_file", l_file.files[0]);




    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "ok") {
                window.location = "sp_home.php";
            } else {
                alert(text);
            }


        }
    }

    r.open("POST", "addansProces.php", true);
    r.send(form);

}