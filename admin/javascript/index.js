  
  

    /*
    *
    *  © Maybe Ange™ Corporation - All rights reserved.
    *
    *  This website is protected by copyright laws and is the property of Maybe Ange™ Corporation.
    *  Any reproduction, modification, distribution or exploitation of all or part of the content of this site, in any form whatsoever, without prior written authorization, is strictly prohibited.
    *  For any request for authorization or to obtain additional information on the rights to use the content of this site, please contact us via https://maybe-ange.com/#contact
    *
    *  License: CC-BY-ND-4.0
    *
    */


    
    // Send e-mail > login.php
    
    function sendEmail() {
        var username = document.getElementById("first-step-form").elements["username"].value;
        var email = document.getElementById("first-step-form").elements["email"].value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "treatment/send-email.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText);

                document.getElementById("first-step-form").style.display = "none";
                document.getElementById("password-form").style.display = "block";
            }
        };
        xhr.send("username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email));

        return false;
    }