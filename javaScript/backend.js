function register() {
    var form = document.getElementById("register");
    var formData = new FormData(form);
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
           if(ajax.responseText == "true") {
               window.location = "pages/home.php";
           } else {
            alert(ajax.responseText);
           }
        }
    }
    ajax.open("POST", "php/backend.php");
    ajax.send(formData);

}



function login() {
    var form = document.getElementById("login");
    var formData = new FormData(form);
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
           if(ajax.responseText == "true") {
               window.location = "../pages/home.php";
           } else {
            alert(ajax.responseText);
           }
        }
    }
    ajax.open("POST", "../php/backend.php");
    ajax.send(formData);

}