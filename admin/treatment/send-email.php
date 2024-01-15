


    <?php
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];

            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            include("treatment/bdd.php");

            $generatedPassword = generateRandomPassword();
            $hashedPassword = password_hash($generatedPassword, PASSWORD_DEFAULT);

            $stmtUpdatePassword = $conn->prepare("UPDATE YourTable SET password = ? WHERE email = ? AND username = ?");
            $stmtUpdatePassword->bind_param("sss", $hashedPassword, $email, $username);
            $stmtUpdatePassword->execute();

            
            // E-mail formatting:

            /*if ($stmtUpdatePassword->affected_rows > 0) {
                $to = $email;
                $subject = "Dear Admin From Maybe Ange™ Corporation";
                $message_body = '<html>
                    <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f2f2f2;
                            margin: 0;
                            padding: 0;
                        }

                        .email-container {
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #ffffff;
                            padding: 20px;
                            border: 1px solid #e0e0e0;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                        }

                        .header-banner {
                            background-color: #007bff;
                            color: #fff;
                            padding: 10px 0;
                            text-align: center;
                        }

                        h1 {
                            color: #fff;
                        }

                        h2 {
                            color: #fff;
                            width: 60%;
                            height: 30px;
                            margin: 0 auto;
                            text-align: center;
                            display: flex;
                            font-size: 14px;
                            border-radius: 10px;
                            align-items: center !important;
                            justify-content: center !important;
                            background-color: rgba(128, 128, 128, 0.739);
                        }

                        .code {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        }

                        p {
                            color: #555;
                        }

                        strong {
                            color: #EEEEEE;
                            font-weight: bold;
                        }

                        @media (min-width: 768px) {
                            strong {
                                color: #000;
                                font-weight: bold;
                            }
                        }
                    </style>
                    </head>
                        <body>
                            <div class="email-container">
                            <div class="header-banner">
                                <h1>Admin department</h1>
                            </div>
                            <p>Dear <strong>' . $username . '</strong></p>
                            <p>We are happy to see you again dear administrator. <br>You tried to log in via your administrator area, here is your security key to log in:</p>
                            <div class="code">
                                <h2 style="justify-content: center">' . $generatedPassword . '</h2>
                            </div>
                            <p>If this email is sent to you without any action on your part, please contact the director immediately.</p>
                            </div>
                        </body>
                    </html>';

                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: Maybe Ange™ Corporation <contact.support@maybe-ange.com>\r\n";
                    $headers .= "Reply-To: contact.support@maybe-ange.com\r\n";
                    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

                if (mail($to, $subject, $message_body, $headers,'-fcontact.support@maybe-ange.com')) {
                    echo "Email sent successfully.";
                } else {
                    echo "Failed to send email.";
                    header("Location: https://admin.maybe-ange.com");
                }
            } else {
                echo "User not found in the database or the provided username and email do not match.";
            }*/

            $stmtUpdatePassword->close();
            $conn->close();
        }

        function generateRandomPassword() {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $key = '';

            $total_length = array_sum([8, 4, 4, 4, 12]);

            for ($i = 0; $i < $total_length; $i++) {
                $key .= $characters[rand(0, strlen($characters) - 1)];
            }

            return $key;
        }
    ?>