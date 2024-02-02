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
    <link rel="stylesheet" href="css\V_MIS_Dashboard.css?<?= filemtime('css\V_MIS_Dashboard.css'); ?>">
</head>

<body>
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
                | <span><?= $role_list['access_role_name'].' | '.$MIS_info['last_name']?></span></h1>    
            </div>
          </div>

        <!--  -->
              <div class="dropDown">
                <button class="dropbtn">
                <img src="<?php echo base_url();?>images/<?= $MIS_info['profile_name']?>" alt="profile" style="width: 53px; height: 53px; border-radius: 20px;">   
                </button>
                <div class="dropDownContent">
                  <a href="/C_MIS_Profile">Profile</a>
                  <a href="/C_MIS_Dashboard/logout">Log-out</a>
                </div>
              </div>
                
      <!--  -->
          </div>
        </div>
      </div>
    </nav>


    <main>
      <div class="create">
        <form action="/C_Employee_Management/" method=""post>
          <input type="submit" value="Create Manager Account"> 
        </form>
        <form action="/C_Student_Management/" method=""post>
          <input type="submit" value="Create Student Account"> 
        </form>
      </div>
    </main>

</body>
</html>