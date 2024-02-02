<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<html> 

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= base_url(); ?>"> 

    <link rel="stylesheet" href="lib/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="lib/fontawesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="lib/bootstrap-4-navbar/4.3.1/css/bootstrap-4-navbar.min.css">
    <link rel="stylesheet" href="lib/handsontable/7.1.0/css/handsontable.full.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/Employee_Login.css?<?= filemtime('css/Employee_Login.css'); ?>">
</head>

<body>
    <header>
        <h1>Immaculada Concepcion College</h1>
        <div class="redirect">
            <a href="C_Student_Login">Student Login ></a>
        </div>
    </header>

        <main>
            <div class="logo">
            <img src="images\icc logo.webp" alt="logo">
            </div>
            <div class="login">
                <h2>Employee Portal Account</h2>
                <span><?= !empty($message) ? $message : '' ?></span>
                <form action="/C_Employee_Login/employeeLogin" method="post">
                    <div class="inputdiv">
                        <label for="employee_number">Employee Number</label><br>
                        <input class="text-gray-800" type="text" id="employee_number" name="employee_number" value=""><br>
                    </div>
                    <div class="inputdiv">
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password" value="" maxlength="12" require><br><br>
                    </div>
                    
                    <div class="login_button_container">
                        <input class="login_button hover:bg-blue-200 hover:text-gray-900" type="submit" value="Login">
                    </div>
                </form>
            </div>
        </main>
</body>

</html>
