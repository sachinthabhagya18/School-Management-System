function changeView() {

    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var f = new FormData();
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("email", email.value);
    f.append("password", password.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                password.value = "";
                document.getElementById("msg").innerHTML = text;

                changeView();

            } else {
                document.getElementById("msg").innerHTML = text;

            }
        }
    };

    r.open("POST", "signUpProcess.php", true);
    r.send(f);
}

function signInadmin() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    // var remember = document.getElementById("remember");

    var formData = new FormData();
    formData.append("username", username.value);
    formData.append("password", password.value);
    // formData.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "adminpanel.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }
        }
    };

    r.open("POST", "adminsignInProcess.php", true);
    r.send(formData);
}

function signout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "adminlogin.php";
            }

        }
    };

    r.open("GET", "signout.php", true);
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
var bm;

function fogotPassword() {
    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == "Success") {

                alert("Verification email sent.Please check your inbox");
                var m = document.getElementById("forgetPasswordModal");
                var bm = new bootstrap.Modal(m);
                bm.show();

            } else {
                alert(text);
            }
        }
    }
    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

function showPassword1() {
    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (npb.innerHTML == "Show") {
        np.type = "text";
        npb.innerHTML = "Hide";
    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }

}

function showPassword2() {
    var np = document.getElementById("rnp");
    var npb = document.getElementById("rnpb");

    if (npb.innerHTML == "Show") {
        np.type = "text";
        npb.innerHTML = "Hide";
    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }

}

function resetPassword() {
    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var formData = new FormData();
    formData.append("e", e.value);
    formData.append("np", np.value);
    formData.append("rnp", rnp.value);
    formData.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Success") {
                alert("Password Reset Success");
                bm.hide();

            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "resetPassword.php", true);
    r.send(formData);
}

function loadmainimg(id) {

    var pid = id;
    var img = document.getElementById("pimg" + pid).src;
    var mainimg = document.getElementById("mainimg");

    mainimg.style.backgroundImage = "url(" + img + ")";

}

// qty update

function qty_inc(qty) {

    var pqty = qty;

    var input = document.getElementById("qtyinput");

    if (input.value < pqty) {
        var newvalue = parseInt(input.value) + 1;
        input.value = newvalue.toString();
    } else {
        alert("Maximum quantity count has been achieved.");
    }

}

function qty_dec() {

    var input = document.getElementById("qtyinput");

    if (input.value > 1) {
        var newvalue = parseInt(input.value) - 1;
        input.value = newvalue.toString();
    } else {
        alert("Minimum quantity count has been achieved.");
    }

}

// function paynow(id) {

//     var qty = document.getElementById("qtyinput").value;

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;
//             var obj = JSON.parse(text);

//             var mail = obj["email"];
//             var amount = obj["amount"];

//             if (text == "1") {
//                 alert("Please sign in first");
//                 window.location = "index.php";
//             } else if (text == "2") {
//                 alert("Please update your profile first");
//                 window.location = "userprofile.php";
//             } else {

//                 // Called when user completed the payment. It can be a successful payment or failure
//                 payhere.onCompleted = function onCompleted(orderId) {
//                     console.log("Payment completed. OrderID:" + orderId);

//                     saveInvoice(orderId, id, mail, amount, qty);

//                     //Note: validate the payment and show success or failure page to the customer
//                 };

//                 // Called when user closes the payment without completing
//                 payhere.onDismissed = function onDismissed() {
//                     //Note: Prompt user to pay again or show an error page
//                     console.log("Payment dismissed");
//                 };

//                 // Called when error happens when initializing payment such as invalid parameters
//                 payhere.onError = function onError(error) {
//                     // Note: show an error page
//                     console.log("Error:" + error);
//                 };

//                 // Put the payment variables here
//                 var payment = {
//                     "sandbox": true,
//                     "merchant_id": "1218051", // Replace your Merchant ID
//                     "return_url": "http://localhost/eshop/singleproductview.php?id=" + id, // Important
//                     "cancel_url": "http://localhost/eshop/singleproductview.php?id=" + id, // Important
//                     "notify_url": "http://sample.com/notify",
//                     "order_id": obj["id"],
//                     "items": obj["item"],
//                     "amount": obj["amount"] + ".00",
//                     "currency": "LKR",
//                     "first_name": obj["fname"],
//                     "last_name": obj["lname"],
//                     "email": mail,
//                     "phone": obj["mobile"],
//                     "address": obj["address"],
//                     "nic": obj["nic"],
//                     "country": "Sri Lanka",
//                     "delivery_address": obj["address"],
//                     "delivery_nic": obj["nic"],
//                     "delivery_country": "Sri Lanka",
//                     "custom_1": "",
//                     "custom_2": ""
//                 };

//                 // Show the payhere.js popup, when "PayHere Pay" is clicked
//                 document.getElementById('payhere-payment').onclick = function(e) {
//                     payhere.startPayment(payment);
//                 };

//             }
//         }
//     }

//     r.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true);
//     r.send();

// }




function updateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var batch = document.getElementById("batch");
    var gender = document.getElementById("gender");
    var nic = document.getElementById("nic");
    var password = document.getElementById("password");
    var img = document.getElementById("profileimg");

    var f = new FormData();

    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("m", mobile.value);
    f.append("b", batch.value);
    f.append("g", gender.value);
    f.append("p", password.value);
    f.append("nic", nic.value);
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

    r.open("POST", "UpdateProfileProcess.php", true);
    r.send(f);


}


function updateprofileimg() {
    var image = document.getElementById("profileimg");
    var view = document.getElementById("prevf");

    image.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    };
}


function verify() {

    var verificationcode = document.getElementById("v").value;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                k.hide();
                window.location = "adminpanel.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "verificationprocess.php?v=" + verificationcode, true);
    r.send();
}

//block user

function blockuser(email) {
    var mail = email;
    var blockbtn = document.getElementById("blockbtn" + mail);

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {
                window.location = "manageusers.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock"
            } else if (t == "success2") {
                window.location = "manageusers.php";
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block"
            }
        }
    }

    r.open("POST", "userBlockProcess.php", true);
    r.send(f);
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

//block poduct

function blockproduct(id) {
    var id = id;
    var blockbtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {
                window.location = "manageproduct.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock"
            } else if (t == "success2") {
                window.location = "manageproduct.php";
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block"
            }
        }
    }

    r.open("POST", "productBlockProcess.php", true);
    r.send(f);
}

function dailyselling() {
    var from = document.getElementById("fromdate").value;
    var to = document.getElementById("todate").value;

    var mainrow = document.getElementById("mainrow");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                alert("Please enter From Date");
            } else if (t == 2) {
                alert("Please enter To Date");
            } else if (t == 3) {
                alert("Please enter From date & To date correctly");
            } else {
                window.location = "sellinghistory.php";
            }
        }
    }

    r.open("GET", "dailySellingProcess.php?f=" + from + "&t=" + to, true);
    r.send();
}

function dailyselling() {

    var from = document.getElementById("fromdate").value;
    var to = document.getElementById("todate").value;
    var link = document.getElementById("historylink");

    link.href = "sellinghistory.php?f=" + from + "&t=" + to;

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////

// sendmessage

function sendmessage(mail) {

    var email = mail;
    var msgtxt = document.getElementById("msgtxt").value;

    var f = new FormData();
    f.append("e", email);
    f.append("t", msgtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alert("Message Sent Successfully");

            } else {
                alert("t");
            }
        }
    }

    r.open("POST", "sendmessageprocess.php", true);
    r.send(f);

}

// refresher

function refresher(email) {

    setInterval(refreshmsgare(email), 500);
    setInterval(refreshrecentarea, 500);
}

// refres msg view area

function refreshmsgare(mail) {

    var chatrow = document.getElementById("chatrow");

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            chatrow.innerHTML = t;

        }
    }

    r.open("POST", "refreshmsgareaprocess.php", true);
    r.send(f);

}

// refreshrecentarea

function refreshrecentarea() {

    var rcv = document.getElementById("rcv");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rcv.innerHTML = t;
        }
    }

    r.open("POST", "refreshrecentareaprocess.php", true);
    r.send();

}

//viewmsgmodal

function viewmsgmodal() {
    var pop = document.getElementById("msgmodal");

    k = new bootstrap.Modal(pop);
    k.show();
}

function addnewmodal() {
    var pop = document.getElementById("addnewmodal");

    k = new bootstrap.Modal(pop);
    k.show();
}

function savecategory() {

    var txt = document.getElementById("categorytxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "sucess") {
                k.hide();
                alert("Category saved successfully.");
                window.location = "manageproduct.php";
            }
        }
    }

    r.open("GET", "addNewcategoryProcess.php?t=" + txt, true);
    r.send();

}

function singleviewmodal(id) {
    var pop = document.getElementById("singleproductview" + id);

    k = new bootstrap.Modal(pop);
    k.show();
}