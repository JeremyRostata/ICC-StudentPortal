<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<base href="<?= base_url(); ?>">
<link rel="stylesheet" href="css\V_Employee_Create.css?<?= filemtime('css\V_Employee_Create.css'); ?>">
<script src="https://cdn.tailwindcss.com"></script> 
</head>
<body>
<main>
    <header>
        <h1>Immaculada Concepcion College</h1>  
        <div class="redirect">
            <a href="/C_Student_Management/">Student Create ></a>
        </div>
        <div class="back">
        <a href="/C_MIS_Dashboard/">Back</a>
        </div>
    </header>
    
    <div class="logo">
        <img src="images\icc logo.webp" alt="logo">  
    </div>

    <div class="login">
        <form action=/C_Employee_Management/employeeCreate method="post" target="_self">
            <h2>CREATE EMPLOYEE ACCOUNT</h2>
                        <!-- <p>?= $employee_count?></p> -->
            <label for="access_role_id">Role :</label><br>
            <select id="access_role_id" name="access_role_id">
                <option value="" hidden></option>
                <option value="1">Teacher</option>
                <option value="2">Program Head</option>
                <option value="3">Registrar</option>
                <option value="4">MIS Staff</option>
            </select><br>

            <label for="employee_number">Employee Number :</label><br>
            <input type="text" id="employee_number" name="employee_number"><br>
            <label for="first_name">First Name :</label><br>
            <input type="text" id="first_name" name="first_name"><br>
            <label for="middle_name">Middle Name :</label><br>
            <input type="text" id="middle_name" name="middle_name"><br>
            <label for="last_name">Last Name :</label><br>
            <input type="text" id="last_name" name="last_name"><br>

            <label for="course_id">Course :</label><br>
            <select id="course_id" name="course_id">
                <option value="" hidden></option>
                <?php foreach ($course_list as $option) : ?>
                    <option value="<?= $option['course_id'] ?>">
                    <?= $option['course_id'] . ' - ' . $option['course_code'] ?>
                </option>
                <?php endforeach; ?>
            </select><br>
            <!-- <label for="course_id">Course ID :</label><br>
            <input type="number" id="course_id" name="course_id"><br> -->
            <div class="hide" style="display: none;">
            <label for="employee_id">Employee ID:</label><br>
            <input type="number" id="employee_id" name="employee_id" value="<?= $employee_count?>"><br>
            <!-- <input type="number" id="employee_id" name="employee_id" value="?= $employee_user_id['employee_id'] ?>"><br> -->
            </div><br>

            <div class="pass">
                <label for="password" class="block text-base">Password</label>
                <input type="password" id="password" name="password" value="123"><br><br>       
            </div>
            <input id="submit" class="hover:bg-blue-200 hover:text-gray-800" type="submit" value="Create">    
        </form>
    </div>
    </div>

    </div>
    </div>

</body>

</html>