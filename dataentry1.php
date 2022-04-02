<?php 
   include 'dataentry1_action.php';
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Data Entry</title>
      <meta name="generator" content="Bluefish 2.2.12" />
      <link rel="stylesheet" href="css/style.css">
   </head>

   <body>
      <div>
         <h1 style="text-align: center;">Data Entry form</h1>
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" target="_self">
            <table>
               <tr>
                  <td>
                     <label for="title">Title</label>
                  </td>
                  <td>
                     <select id="title" name="title">
                        <option value="Mr" <?php retain_select("Mr"); ?> >Mr</option>
                        <option value="Mrs" <?php retain_select("Mrs"); ?> >Mrs</option>
                        <option value="Dr" <?php retain_select("Dr"); ?> >Dr</option>
                        <option value="Prof" <?php retain_select("Prof"); ?> >Prof</option>
                        <option value="Rev" <?php retain_select("Rev"); ?> >Rev</option>
                        <option value="Miss" <?php retain_select("Miss"); ?> >Miss</option>
                        <option value="Master" <?php retain_select("Master"); ?> >Master</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <!-- Input elements for form -->
                  <td> 
                     <label for="first_name">First Name:</label>
                  </td>
                  <td>
                     <input type="text"
                           id="first_name"
                           name="first_name"
                           value="<?php retain_value("first_name"); ?>" >
                  </td>
               </tr>
               <tr>
                  <td> 
                     <label for="surname">Surname:</label>
                  </td>
                  <td>
                     <input type="text" 
                            id="surname"
                            name="surname"
                            value="<?php retain_value("surname"); ?>" >
                  </td>
               </tr>
               <tr>
                  
                  <!-- Buttons on the form -->
                  <td style="text-align: left;" >
                     <input type="submit" value="Insert" name="insert">
                  </td>
                  <td>
                     <input type="submit" value="Search" name="search">
                  </td>
                  <td>
                     <input type="submit" value="Delete" name="delete">
                  </td>
                  <td>
                     <input type="submit" value="Clear" name="clear">
                  </td>
               </tr>
            </table>
         </form>
      </div>
      
      <hr>

      <!-- Results output -->
   <?php
      echo '<div>
         <h1 style="text-align: center;">Result</h1>
         <table>
            <tr>
               <td><label>Title:</label></td>
               <td>',$title, '</td>
            </tr>
            <tr>
               <td><label>First Name:</label></td>
               <td>', $first_name, '</td>
            </tr>
            <tr>
               <td><label>Surname:</label></td>
               <td>', $surname, '</td>
            </tr>
            <tr>
            </tr>
         </table></div><hr>';

            // display the status message in the correct colour
            
            echo '<div><h1 style="text-align: center; color:',set_status_colour($result_status), ';">Status</h1>
               <table class="center" style="background-color:white;">
            <tr>
               <td style="color:',set_status_colour($result_status),';"><b>', $result_status, '</b></td>
            </tr>
         </table><hr>
      </div>';
   ?>
   </body>

</html>
