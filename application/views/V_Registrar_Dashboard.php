<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= base_url(); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="css/Employee_D.css?<?= filemtime('css/V_Registrar_Dashboard.css'); ?>"> -->
</head>
<body class="bg-gradient-to-r from-blue-400 to-blue-700">
 <!-- -----------------------------------------------------------------------------NAVIGATION BAR SECTION-------------------------------------------------------------------------------------------------------------------------------- -->
 <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
            <img src="<?php echo base_url();?>images/iccl.webp" alt="" style="width: 50px;">
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <a class="flex space-x-4">
                <h1 class="text-gray-100 mt-5">IMMACULADA CONCEPCION COLLEGE &nbsp;&nbsp; 
                | <span><?= $role_list['access_role_name'].' | '.$registrar_info['last_name']?></span></h1>    
            </div>
          </div>

        
              <div class="dropDown">
                <button class="dropbtn">
                <img src="<?php echo base_url();?>images/<?= $registrar_info['profile_name']?>" alt="profile" style="width: 53px; height: 53px; border-radius: 20px;">   
                </button>
                <div class="dropDownContent">
                  <a href="/C_Registrar_Profile">Profile</a>
                  <a href="/C_Registrar_Dashboard/logout">Log-out</a>
                </div>
              </div>
                

          </div>
        </div>
      </div>
    </nav>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="overflow-auto rounded-lg shadow mt-40">

            <div class="bg-gray-200 border-gray-200 text-center pt-2">
            <span>Welcome! <?= $registrar_info['last_name'] . ', ' . $registrar_info['first_name'] ?></span><br><br>

<span><?= !empty($message) ? $message : '' ?></span> 
            </div>

<div class="p-3 text-sm bg-blue-200">
<form action="/C_Registrar_Dashboard/studentUpload" method="post" enctype="multipart/form-data"> 
    Select Excel to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input class="hover:text-blue-800 hover:text-bold hover:underline" type="submit" value="Upload Excel" name="submit">
</form>
</div>
            </div>
        </div>
    </div>

    <br><br>
    
    <a class="p-2 rounded ml-12 bg-blue-200 border-gray-200 hover:bg-gray-800 hover:text-gray-200" href="C_Registrar_students">STUDENTS  ></a>
    
    <script>
      function toggleProfileDropdown() {
          var dropdown = document.getElementById("myProfileDropdown");
          dropdown.classList.toggle("hidden");
      }
    
  </script>
</body>

</html>