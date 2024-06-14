function addbatch() {
    var bname = document.getElementById("bname");
    var section = document.getElementById("section");
    var image = document.getElementById("imguploader");


    var form = new FormData();
    form.append("bname", bname.value);
    form.append("section", section.value);
    form.append("imguploader", image.files[0]);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "batch added successfully") {
                window.location = "create_batch.php";
            } else {
                alert(text);
            }


        }
    }

    r.open("POST", "addbatchprocess.php", true);
    r.send(form);

}