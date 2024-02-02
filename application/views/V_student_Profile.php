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
    <link rel="stylesheet" href="css\V_MIS_Profile.css?<?= filemtime('css\V_MIS_Profile.css'); ?>">
    <script>
        function toggleForm() {
            var form = document.querySelector('.changePass');
            form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
        }
    </script>
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
                |&nbsp;&nbsp;Profile&nbsp;&nbsp;|
            </div>
          </div>

        
              <div class="dropDown">
                <button class="dropbtn">
                <img src="<?php echo base_url();?>images/<?= $MIS_info['profile_name']?>" alt="profile" style="width: 53px; height: 53px; border-radius: 20px;"> 
                </button>
                <div class="dropDownContent">
                  <a href="/C_Student_subject">Dashboard</a> 
                  <a href="/C_Student_Profile/logout">Log-out</a>
                </div>
              </div>
                
 
          </div>
        </div>
      </div>
    </nav>

    <main>
      <div class="cont">
        <div class="profile">
          <img src="<?php echo base_url();?>images/<?= $MIS_info['profile_name']?>">
        </div>
        
        <div class="profile">
          <table>
            <tr>
              
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Last Name</th> 
            </tr>
            <tr>
              
              <td><?= $MIS_info['first_name']?></td>
              <td><?= $MIS_info['middle_name']?></td>
              <td><?= $MIS_info['last_name']?></td> 
            </tr>
          </table>
        

          <div class="profilePicture">
            <form action="/C_Student_Profile/imageUpload" method="post" enctype="multipart/form-data">
              <label class="pp" for="profile_pic">Select Image for Profile Picture</label>
              <input name="profile_pic" id="profile_pic" type="file">
              <input type="submit" name="submit" value="Upload">
            </form>
          </div>
          
          <div class="showHide">
          <button onclick="toggleForm()">Change Password?</button>

            <div class="formcon">
              <form action="/C_Student_Profile/resetPass" method="post" target="_self">
                <div class="hide">
                  <input type="password" id="password" name="password" value="123">
                </div>
                  <input type="submit" value="Reset Password?">
              </form>
            </div>
          </div>

          <div class="changePass" >
            <form action="/C_Student_Profile/changePass" method="post" target="_self">
              <input type="password" id="password" name="password" >
              <input type="submit" value="Save">
            </form>
          </div>
        </div>
      </div>
    </main>
</body>
</html>