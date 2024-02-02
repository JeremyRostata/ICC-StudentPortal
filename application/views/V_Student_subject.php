<?php
$imagePath = 'try.webp';
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= base_url(); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css\V_Student_subject.css?<?= filemtime('css\V_Student_subject.css'); ?>">



    



    </head>





<body class="bg-blue-500">
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
                <h1 class="text-gray-100 mt-5"><span><?= $student_info['course_name'] ?></span></h1>              
            </div>            
          </div>

          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">       
            
          




            <!-- Profile dropdown -->             
            <div class="dropDown">
                <button class="dropbtn">
                <img src="<?php echo base_url();?>images/<?= $student_info
                ['profile_name']?>" alt="profile" style="width: 53px; height: 53px; border-radius: 20px;">   
                </button>
                <div class="dropDownContent">
                  <a href="/C_Student_Profile">Profile</a>
                  <a href="/C_Student_subject/logout">Log-out</a>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </nav>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <main class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mb-20">
        <div class="relative flex items-center justify-between">
        <div class=" rounded-lg shadow mt-20">
          <!-- -----------------------------------------------------------------------------DROPDOWN-------------------------------------------------------------------------------------------------------------------------------- -->
<div class="relative inline-block text-left">
  <div>
    <button type="button" onclick="toggleOptionsDropdown()" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-blue-200 text-gray-900 px-3 py-2 text-sm font-semibold shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-800 hover:text-gray-200" id="menu-button" aria-expanded="true" aria-haspopup="true">
      Options
      <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
      </svg>
    </button>
  </div>
  <div id="myOptionsDropdown" class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-blue-200 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
    <div class="py-1" role="none">
      <a href="http:/C_Student_subject" class="text-gray-900 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium font-mono">CHECKLIST</a>
          <a href="http:/C_Student_fyear" class="text-gray-900 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium font-mono">FIRST YEAR</a>
          <a href="http:/C_Student_syear" class="text-gray-900 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium font-mono">SECOND YEAR</a>
          <a href="http:/C_Student_tyear" class="text-gray-900 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium font-mono">THIRD YEAR</a>
          <a href="http:/C_Student_ftyear" class="text-gray-900 hover:bg-gray-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium font-mono">FOURTH YEAR</a>
      
    </div>
  </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
 <h1 class="text-center mt-4 bg-gray-800 text-gray-200  font-semibold text-xl ">First Year</h1>
        <section class="flex">
          <table class="w-full divide-x divide-gray-100 divide-y divide-gray-800">
        <caption class="bg-gray-200">FIRST SEM</caption>
            <thead class="bg-gray-200 border-b-2 border-gray-200 ">
                <tr>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Code</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Name</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>grades</pre></th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-800">
            <?php foreach ($Fsem1 as $row): ?>
              
                  <tr class="bg-gray-300">
        
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['subject_name'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>   <?= $row['subject_code'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['grade'] ?></pre></td>
                  
                  </tr>
                
                <?php endforeach; ?>
            </tbody>
            </table>

            <table class="w-full divide-x divide-gray-100 divide-y divide-gray-800">
            <caption class="bg-gray-200">SECOND SEM</caption>
            <thead class="bg-gray-200 border-b-2 border-gray-200 ">
                <tr>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Code</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Name</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>grades</pre></th>
                

                
                </tr>
            </thead>


            <tbody class="divide-y divide-gray-800">
            <?php foreach ($Fsem2 as $row): ?>
              
                  <tr class="bg-gray-300">
        
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['subject_name'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>   <?= $row['subject_code'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre></pre><?= $row['grade'] ?></td>
                  </tr>
                
                <?php endforeach; ?>
            </tbody>
            </table>
        </section>
        <h1 class="text-center mt-4 bg-gray-800 text-gray-200  font-semibold text-xl ">Second Year</h1>    
        <section class="flex">
          <table class="w-full divide-x divide-gray-100 divide-y divide-gray-800">
            <caption class="bg-gray-200">FIRST SEM</caption>
          <thead class="bg-gray-200 border-b-2 border-gray-200 ">
                <tr>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Code</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Name</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>grades</pre></th>
                </tr>
            </thead>
  
            <tbody class="divide-y divide-gray-800">
            <?php foreach ($Ssem2 as $row): ?>
              
                  <tr class="bg-gray-300">
        
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['subject_name'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>   <?= $row['subject_code'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre></pre><?= $row['grade'] ?></td>
                  </tr>
                
                <?php endforeach; ?>
            </tbody>
          </table>

          <table class="w-full divide-x divide-gray-100 divide-y divide-gray-800">
            <caption class="bg-gray-200">SECOND SEM</caption>
           <thead class="bg-gray-200 border-b-2 border-gray-200 ">
                <tr>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Code</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Name</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>grades</pre></th>
                </tr>
            </thead>
    
            <tbody class="divide-y divide-gray-800">
            <?php foreach ($Ssem2 as $row): ?>
              
                  <tr class="bg-gray-300">
        
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['subject_name'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>   <?= $row['subject_code'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['grade'] ?></pre></td>
                  </tr>
                
                <?php endforeach; ?>
            </tbody>
          </table>
        </section>
        <h1 class="text-center mt-4 bg-gray-800 text-gray-200  font-semibold text-xl ">Third Year</h1>
        <section class="flex">
          <table class="w-full divide-x divide-gray-100 divide-y divide-gray-800">
          <caption class="bg-gray-200">FIRST SEM</caption>
            <thead class="bg-gray-200 border-b-2 border-gray-200 ">
                <tr>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Code</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Name</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>grades</pre></th>
                </tr>
            </thead>
  
            <tbody class="divide-y divide-gray-800">
            <?php foreach ($Tsem1 as $row): ?>
              
                  <tr class="bg-gray-300">
        
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['subject_name'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>   <?= $row['subject_code'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['grade'] ?></pre></td>
                  </tr>
                
                <?php endforeach; ?>
            </tbody>
          </table>

          <table class="w-full divide-x divide-gray-100 divide-y divide-gray-800">
            <caption class="bg-gray-200">SECOND SEM</caption>
          <thead class="bg-gray-200 border-b-2 border-gray-200 ">
                <tr>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Code</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Name</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>grades</pre></th>
                </tr>
            </thead>
  
            <tbody class="divide-y divide-gray-800">
            <?php foreach ($Tsem2 as $row): ?>
              
                  <tr class="bg-gray-300">
        
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['subject_name'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>   <?= $row['subject_code'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['grade'] ?></pre></td>
                  </tr>
                
                <?php endforeach; ?>
            </tbody>
          </table>
        </section>
        <h1 class="text-center mt-4 bg-gray-800 text-gray-200  font-semibold text-xl ">Fourth Year</h1> 
         <section class="flex">
          <table class="w-full divide-x divide-gray-100 divide-y divide-gray-800">
            <caption class="bg-gray-200">FIRST SEM</caption>
            <thead class="bg-gray-200 border-b-2 border-gray-200 ">
                <tr>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Code</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Name</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>grades</pre></th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-800">
            <?php foreach ($Ftsem1 as $row): ?>
              
                  <tr class="bg-gray-300">
        
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['subject_name'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>   <?= $row['subject_code'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['grade'] ?></pre></td>
                  </tr>
                
                <?php endforeach; ?>
            </tbody>
          </table>

          <table class="w-full divide-x divide-gray-100 divide-y divide-gray-800">
            <caption class="bg-gray-200">SECOND SEM</caption>
           <thead class="bg-gray-200 border-b-2 border-gray-200 ">
                <tr>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Code</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>Subject Name</pre></th>
                <th class="w-32 p-5 text-sm font-semibold tracking-wide text-left"><pre>grades</pre></th>
                </tr>
            </thead>
    
            <tbody class="divide-y divide-gray-800">
            <?php foreach ($Ftsem2 as $row): ?>
              
                  <tr class="bg-gray-300">
        
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['subject_name'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>   <?= $row['subject_code'] ?></pre></td>
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre><?= $row['grade'] ?></pre></td>
                  </tr>
                
                <?php endforeach; ?>
            </tbody>
          </table>
         </section>   
          

        </div>
        </div>
        </main>
       

<!-- -------------------------------------------------------------------------------------JS FOR NAV BAR------------------------------------------------------------------------------------------------------------------------ -->
        <script>
      function toggleProfileDropdown() {
          var dropdown = document.getElementById("myProfileDropdown");
          dropdown.classList.toggle("hidden");
      }

      function toggleOptionsDropdown() {
          var dropdown = document.getElementById("myOptionsDropdown");
          dropdown.classList.toggle("hidden");
      }
      
  </script>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
</body>

</html>