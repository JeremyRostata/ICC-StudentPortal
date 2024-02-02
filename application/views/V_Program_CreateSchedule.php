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
    <link rel="stylesheet" href="css/Employee_D.css?<?= filemtime('css/Employee_D.css'); ?>">
</head>
<body>




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
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <h1 class="text-gray-100 mt-5">     <span> <?= $teacher_schedule_info['course_name'] ?></span></h1> 
            </div>
          </div>

          <div class="redirect">
            <a  href="http://localhost/C_Program_Dashboard/index">Student List ></a>
          </div>



          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <!-- Profile dropdown -->
            
            <div class="relative ml-3">
              <div>
                <button type="button" onclick="toggleProfileDropdown()" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img src="<?php echo base_url();?>images/pp.png" alt="" style="width: 55px;">
                </button>
              </div>
              <div id="myProfileDropdown" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
               <span> <?= $teacher_schedule_info['first_name'] . ' ' . $teacher_schedule_info['last_name'] ?></span>
               
               <br>
                          <form action="/C_MIS_Dashboard/logout" method="post">
                          <div>
                          <input class="hover:font-bold block pr-12 text-sm text-gray-700" type="submit" value="Logout">
                          </div>
                          </form>
              </div>
            </div>
          



          </div>
        </div>
      </div>
    </nav>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<div class="overflow-auto rounded-lg shadow mt-20 ">

    <form action=/C_Program_Dashboard/createTeacherSchedule method="post" target="_self">
        <h2>CREATE TEACHER SCHEDULE</h2>

        <div class="inputdiv">
        <label for="teacher" >Teachers:</label><br>
        <select class="text-gray-800" id="teacher" name="teacher">
            <option value="" hidden>-</option>
            <?php foreach ($teacher_list as $option) : ?>
            <option value="<?= $option['employee_id'] ?>">
            <?= $option['employee_number'] . ' - ' . $option['first_name'] . ' ' . $option['last_name'] ?>
            </option>
            <?php endforeach; ?>
        </select>
        </div>

        <div class="inputdiv">
        <label for="subject">Subject</label><br>
        <select class="text-gray-800" id="subject" name="subject">
            <option value="" hidden>-</option>
            <?php foreach ($subject_list as $option) : ?>
            <option value="<?= $option['subject_id'] ?>">
            <?= $option['subject_code'] . ' - ' . $option['subject_name']?>
            </option>
            <?php endforeach; ?>
        </select>
        </div>
        
        <div class="inputdiv">
        <label for="schedule">Schedule Remarks:</label><br>
        <input type="text" id="schedule" name="schedule">
        </div>
        
        <div class="inputdiv">
        <label for="room">Room Remarks:</label><br>
        <input type="text" id="room" name="room">
        </div>

        <div class="inputdiv">
        <label for="year_level">Year Level: </label><br>
        <select class="text-gray-800" id="year_level" name="year_level">
            <option value="" hidden>-</option>
            <option value="1">1st Year</option>
            <option value="2">2nd Year</option>
            <option value="3">3rd Year</option>
            <option value="4">4th Year</option>
        </select>
        </div>

        <div class="inputdiv">
        <label for="year_level">Semester: </label><br>
        <select class="text-gray-800" id="semester" name="semester">
            <option value="" hidden>-</option>
            <option value="1">1st Semester</option>
            <option value="2">2nd Semester</option>
        </select>
        </div>
        
        <input class="hover:bg-blue-200 hover:text-gray-800" type="submit" value="Create">    
    </form>

    <form action=/C_Program_Dashboard/scheduleList method="post" target="_self">
      <input class="hover:bg-blue-200 hover:text-gray-800" type="submit" value="Back">    
    </form>
</div>



 




<script>
      function toggleProfileDropdown() {
          var dropdown = document.getElementById("myProfileDropdown");
          dropdown.classList.toggle("hidden");
      }
    
  </script>
</body>

</html>