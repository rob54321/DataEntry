<?php 
   include 'dataentry1_action.php';
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Data Form</title>
      <meta name="generator" content="Bluefish 2.2.12" />
      <link rel="stylesheet" href="css/style.css">
   </head>

   <body>
      <div>
         <h1 style="text-align: center;">Test form</h1>
         <form action="dataentry1.php" method="post" target="_self">
            <table>
               <tr>
                  <td>
                     <label for="title">Title</label>
                  </td>
                  <td>
                     <select id="title" name="title">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Dr">Dr</option>
                        <option value="Prof">Prof</option>
                        <option value="Rev">Rev</option>
                        <option value="Miss">Miss</option>
                        <option value="Master">Master</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <!-- Input elements for form -->
                  <td> 
                     <label for="first_name">First Name:</label>
                  </td>
                  <td>
                     <input type="text" id="first_name" name="first_name">
                  </td>
               </tr>
               <tr>
                  <td> 
                     <label for="surname">Surname:</label>
                  </td>
                  <td>
                     <input type="text" id="surname" name="surname">
                  </td>
               </tr>
               <tr>
                  
                  <!-- Buttons on the form -->
                  <td style="text-align: left;" >
                     <input type="submit" value="Insert" name="insert">
                  </td>
                  <td style="text-align: center;">
                     <input type="submit" value="Delete" name="delete">
                  </td>
                  <td style="text-align: right;" >
                     <input type="reset" value="Clear">
                  </td>
               </tr>
            </table>
         </form>
      </div>
      
      <hr>

      <!-- Results output -->
      <div>
         <h1 style="text-align: center;">Result</h1>
         <h3> Output</h3>
         <table>
            <tr>
               <td><label style="color:blue;">Title:</label></td>
               <td><?php echo "$title";?></td>
            </tr>
            <tr>
               <td><label style="color:blue;">First Name:</label></td>
               <td><?php echo "$first_name";?></td>
            </tr>
            <tr>
               <td><label style="color:blue;">Surname:</label></td>
               <td><?php echo "$surname";?></td>
            </tr>
            <tr>
            </tr>
         </table>

         <!-- output message -->
         <?php //check if it is an error message or not
            $pos = strpos($result_status, "Error:");
            if ($pos === 0) {
               // there was an error
               $colour = "#ff0000";
            } else {
               // there is no error
               $colour = "#20C040";
            }
         ?>
            <table style="background-color:white">
            <tr>
               <th style="color:black;">Status message</th>
            </tr>
            <tr>
               <td style="color:<?php echo $colour; ?>;"><b><?php echo "$result_status"; ?></b></td>
            </tr>
         </table>
      </div>
   </body>

</html>
