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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="lib/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="lib/fontawesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="lib/bootstrap-4-navbar/4.3.1/css/bootstrap-4-navbar.min.css">
    <link rel="stylesheet" href="lib/handsontable/7.1.0/css/handsontable.full.min.css">
    <link rel="stylesheet" href="css\V_Student_Create.css?<?= filemtime('css\V_Student_Create.css'); ?>">
    <script src="https://cdn.tailwindcss.com"></script> 
</script>
</head>
<body>
  <header>
        <h1>Immaculada Concepcion College</h1>
        <div class="redirect">
            <a href="/C_Employee_Management/">Employee Create ></a>
        </div>
        <div class="back">
        <a href="/C_MIS_Dashboard/">Back</a>
        </div>
    </header>

            <main>
                <div class="logo">
                <img src="images\icc logo.webp" alt="logo">  
            </div>

<!-- asd -->



    <div class="login">
        <h2>CREATE STUDENT ACCOUNT</h2>   
        <form action=/C_Student_Management/studentCreate method="post" target="_self">
        <div class="inputdiv">
        <label for="student_id">Student:</label><br>
        <select class="text-gray-800" id="student_id" name="student_id" >
            <option value="" hidden></option>
            <?php foreach ($student_list as $option) : ?> 
              <option value="<?= $option['student_id'] ?>">
                <?= $option['student_number'] . ' - ' . $option['first_name'] . ' ' . $option['last_name'] ?>
            </option>
            <?php endforeach; ?>
        </select><br>
        </div> 
        <div class="pass">
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" value="123" maxlength="16"><br><br>
        </div>
        <input class="hover:bg-blue-200 hover:text-gray-900" type="submit" value="Create">
        </form>
  </div>
</main>
</body>

</html>

  