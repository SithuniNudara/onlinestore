function changeview() {
    var signInBox = document.getElementById("signIn_box");
    var signUpBox = document.getElementById("singUp_box");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var f = new FormData();
    f.append("f", fname);
    f.append("l", lname);
    f.append("e", email);
    f.append("m", mobile);
    f.append("u", username);
    f.append("p", password);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "Success") {
                document.getElementById("msg1").innerHTML = "Registeration Success!";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                fname = "";
                lname = "";
                email = "";
                mobile = "";
                username = "";
                password = "";

            } else {
                document.getElementById("msg1").innerHTML = t;
                document.getElementById("msgDiv1").className = "d-block";

            }
        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(f);

}
function signIn() {
    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");


    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);
    f.append("r", rm.checcked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                window.location = "index.php";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }
    request.open("POST", "signinProcess.php", true);
    request.send(f);

}

function adminSignIn() {
    var username = document.getElementById("un");
    var password = document.getElementById("pw");

    var f = new FormData();
    f.append("u", username.value);
    f.append("p", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "adminDashBoard.php";
            } else {
                document.getElementById("msg").innerHTML = t;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    }

    r.open("POST", "adminsignInProcess.php", true);
    r.send(f);
}

function loadUser() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            document.getElementById("tb").innerHTML = response;
        }
    }
    r.open("POST", "loadUserProcess.php", true);
    r.send();
}

function changeUserID() {
    //alert("ok");
    var id = document.getElementById("userID").value;

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "deactivated") {
                //alert("Successfully changed user status");
                document.getElementById("msg").innerHTML = "User Deactivate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";

                //id = "";
                loadUser();

            } else if (t == "activated") {
                //alert(t);
                document.getElementById("msg").innerHTML = "User Activate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                //id = "";
                loadUser();
            } else {
                document.getElementById("msg").innerHTML = t;
                document.getElementById("msg").className = "alert alert-danger";
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    }
    r.open("POST", "changeUserID.php", true);
    r.send(f);
}

function reload() {
    location.reload();
}

function registerBrand() {
    var brand = document.getElementById("brand").value;

    var f = new FormData();
    f.append("b", brand);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {

                document.getElementById("msg1").innerHTML = "Brand Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";


            } else {
                document.getElementById("msg1").innerHTML = t;
                document.getElementById("msg1").className = "alert alert-warning";
                document.getElementById("msgDiv1").className = "d-block";
            }
        } else {

        }
    }

    r.open("POST", "registerBrandProcess.php", true);
    r.send(f);
}

function registerCategory() {
    var category = document.getElementById("category").value;

    var f = new FormData();
    f.append("c", category);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "Success") {

                document.getElementById("msg2").innerHTML = "Brand Registration Successfully";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
            } else {
                document.getElementById("msg2").innerHTML = t;
                document.getElementById("msg2").className = "alert alert-warning";
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }
    r.open("POST", "registerCategoryProcess.php", true);
    r.send(f);
}

function registerColor() {
    var color = document.getElementById("color").value;

    var f = new FormData();
    f.append("col", color);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("msg3").innerHTML = "Brand Registration Successfully";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";
                color = "";
            } else {
                document.getElementById("msg3").innerHTML = t;
                document.getElementById("msg3").className = "alert alert-warning";
                document.getElementById("msgDiv3").className = "d-block";
            }
        }
    }

    r.open("POST", "RregisterColorProcess.php", true);
    r.send(f);
}

function registerSize() {
    var size = document.getElementById("size").value;

    var f = new FormData();
    f.append("size", size);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "Success") {
                document.getElementById("msg4").innerHTML = "Brand Registration Successfully";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";

            } else {
                document.getElementById("msg4").innerHTML = t;
                document.getElementById("msg4").className = "alert alert-warning";
                document.getElementById("msgDiv4").className = "d-block";
            }
        }
    }
    r.open("POST", "ResterSizeProcess.php", true);
    r.send(f);
}

function regProduct() {
    var pname = document.getElementById("pname");
    var brand = document.getElementById("brand");
    var cat = document.getElementById("cat");
    var color = document.getElementById("color");
    var size = document.getElementById("size");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var f = new FormData();
    f.append("pname", pname.value);
    f.append("brand", brand.value);
    f.append("cat", cat.value);
    f.append("color", color.value);
    f.append("size", size.value);
    f.append("desc", desc.value);
    f.append("image", file.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Success");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "productRegProcess.php", true);
    r.send(f);


}

function updateStock() {
    var pname = document.getElementById("selectProduct");
    var qty = document.getElementById("qty");
    var price = document.getElementById("uprice");
    // alert(pname.value);
    var f = new FormData();
    f.append("p", pname.value);
    f.append("q", qty.value);
    f.append("up", price.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            alert(t);
            location.reload();
        }
    }
    r.open("POST", "UpdateStockProcess.php", true);
    r.send(f);
}

function printDiv() {

    var originalContent = document.body.innerHTML;
    var printArea = document.getElementById("PrintArea").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = originalContent;

}


function loadProduct(x) {

    var page = x;

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            document.getElementById("pid").innerHTML = response;

        }
    }

    request.open("POST", "loadProductProcess.php", true);
    request.send(f);

}

function SearchProduct(x) {
    var page = x;
    var product = document.getElementById("product");

    var f = new FormData();
    f.append("p", product.value);
    f.append("pg", page);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            document.getElementById("pid").innerHTML = t;
        }
    }

    r.open("POST", "searchProductProcess.php", true);
    r.send(f);
}

function viewFilter() {
    document.getElementById("filterId").className = "d-block";
}

function advancedSearchProduct(x) {
    //alert("ok");
    var page = x;
    var color = document.getElementById("color");
    var cat = document.getElementById("cat");
    var brand = document.getElementById("brand");
    var size = document.getElementById("size");
    var min = document.getElementById("min");
    var max = document.getElementById("max");
    //alert(color.value);

    var f = new FormData();
    f.append("pg", page);
    f.append("co", color.value);
    f.append("cat", cat.value);
    f.append("b", brand.value);
    f.append("s", size.value);
    f.append("min", min.value);
    f.append("max", max.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            document.getElementById("pid").innerHTML = t;
        }
    }
    r.open("POST", "advanceSearchProductProcess.php", true);
    r.send(f);
}

function uploadImg() {
    var img = document.getElementById("ImageUploader");

    var f = new FormData();
    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "Select An Image") {
                alert("Select an image");
            } else {
                document.getElementById("i").src = t;
                img.value = "";
            }
        }
    };
    r.open("POST", "profileImgUpload.php", true);
    r.send(f);
}

function UpdateUserProfile() {
    var fname = document.getElementById("firstname");
    var lname = document.getElementById("lastname");
    var email = document.getElementById("Email");
    var mobile = document.getElementById("mobile");
    var password = document.getElementById("password");
    var no = document.getElementById("number");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");

    var f = new FormData();
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("email", email.value);
    f.append("mobile", mobile.value);
    f.append("password", password.value);
    f.append("no", no.value);
    f.append("line1", line1.value);
    f.append("line2", line2.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            alert(t);
            window.location.reload();
        }
    };
    r.open("POST", "UpdateUserProfile.php", true);
    r.send(f);
}

function signOut() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            alert(t);
            window.location.reload();
        }
    }

    r.open("POST", "signOutProcess.php", true);
    r.send();
}


function addtoCart(x) {

    var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var t = r.responseText;
                swal("Good job!", t, "success");
                //alert(t);
                qty.value = "";
            }
        };
        r.open("POST", "addtoCartProcess.php", true);
        r.send(f);
    } else {
        alert("Please Enter Valid Quantity");
    }
}

function loadCart() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            document.getElementById("cartBody").innerHTML = t;
        }
    };

    r.open("POST", "loadCartProcess.php", true);
    r.send();
}

function incrementCardquantity(x) {
    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) + 1;

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t = "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                alert(t);
            }
        }
    };
    r.open("POST", "updateCartQtyProcess.php", true);
    r.send(f);
}

function decrementCardQuantity(x) {
    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) - 1;

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {
        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var t = r.responseText;
                if (t = "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    alert(t);
                }
            }
        };

        r.open("POST", "updateCartQtyProcess.php", true);
        r.send(f);
    }
}

function removeCart(x) {

    if (confirm("Are you sure you want to remove the item")) {
        var f = new FormData();
        f.append("c", x);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var t = r.responseText;
                alert(t);
                reload();

            }
        };

        r.open("POST", "removeCartProcess.php", true);
        r.send(f);
    }


}

function checkOut() {
    // alert("Ok");

    var f = new FormData();
    f.append("cart", true);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            //alert(t);
            var payment = JSON.parse(t);
            doCheckout(payment, "checkoutProcess.php");
        }
    };

    r.open("POST", "paymentProcess.php", true);
    r.send(f);
}

function doCheckout(payment, path) {
    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                var order = JSON.parse(response);
                if (order.resp == "Success") {
                    //reload();
                    window.location = "invoice.php?orderId=" + order.order_id;
                } else {
                    alert(response);
                }
            }
        };

        request.open("POST", path, true);
        request.send(f);

    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    //document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    // };
}

function buyNow(stockId) {
    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        //alert("okay");

        var f = new FormData();
        f.append("cart", false);
        f.append("stockId", stockId);
        f.append("qty", qty.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var t = r.responseText;
                //alert(t);
                var payment = JSON.parse(t);
                payment.stock_id = stockId;
                payment.qty = qty.value;
                doCheckout(payment, "BuyNowProcess.php");
            }
        };

        r.open("POST", "paymentProcess.php", true);
        r.send(f);

    } else {
        alert("Please Enter Valid Quantity");
    }
}

function forgetpassword() {
    // alert("ok");
    var email = document.getElementById("e");
    if (email.value != "") {

        var f = new FormData();
        f.append("e", email.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var t = r.responseText;
                // alert(t);
                if (t == "success") {
                    document.getElementById("msg").innerHTML = "Email Sent! Please Chaeck Your Email";
                    document.getElementById("msg").className = "alert alert-success";
                    document.getElementById("msgDiv").className = "d-block";
                } else {
                    document.getElementById("msg").innerHTML = t;
                    document.getElementById("msg").className = "alert alert-danger";
                    document.getElementById("msgDiv").className = "d-block";
                }
            }
        };

        r.open("POST", "forgetpasswordProcess.php", true);
        r.send(f);
    } else {
        alert("Please Enter Your Valid Email");
    }



}

function resetpassword() {
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");

    var f = new FormData();
    f.append("vcode", vcode.value);
    f.append("np", np.value);
    f.append("np2", np2.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "signin.php";
            } else {
                document.getElementById("msg").innerHTML = t;
                document.getElementById("msg").className = "alert alert-danger";
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };

    r.open("POST", "ResetPasswordProcess.php", true);
    r.send(f);

}

function loadChart() {
    var ctx = document.getElementById('myChart');

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            //alert(t);
            var data = JSON.parse(t);

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        }
    };
    r.open("POST", "LoadChartProcess.php", true);
    r.send();


}

