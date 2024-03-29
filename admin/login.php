<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.png">
    <link rel="stylesheet" href="css/login.css">
    <title>Login Admins</title>
</head>
<body>

    <div class="container-outer">
        <div class="container-inner">
            <img src="assets/images/user-profil.png" alt="Maybe Ange - Maybe Ange™ Corporation">
            <h1>Login Admin</h1>
            <form action="treatment/send-email.php" method="POST" id="first-step-form">
                <input type="text" name="username" placeholder="Username">
                <input type="email" name="email" placeholder="E-mail Address">
                <div class="btn">
                    <button type="button" onclick="sendEmail()">Next Step</button>
                </div>
            </form>

            <form action="treatment/login.php" method="POST" class="password-form" id="password-form">
                <p class="email-check">Please, check your e-mail address</p>
                <input type="password" name="password" placeholder="Security key">
                <div class="btn">
                    <button type="submit">Login</button>
                </div>
            </form>

            <a href="https://maybe-ange.com">Powered By Maybe Ange™ Corporation</a>
        </div>
    </div>

    <script src="javascript/index.js"></script>
    
</body>
</html>
