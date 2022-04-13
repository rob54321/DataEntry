<?php
	ini_set("display_errors",1);
	error_reporting(E_ALL);

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
		<div id="main">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" target="_self">
				<!-- data entry box -->
				<div id="dataentrybox">
					<h1 style="text-align: center;">Data Entry form</h1>
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
									<option value="" <?php retain_select(""); ?> >None</option>
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
					</table>
					<table style="margin-top: 20px; border: 1px solid black; padding:5px;">
						<!-- new table for buttons
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
							<td>
								<input type="submit" value="Logout" name="logout">
							</td>
						</tr>
					</table>
				</div>
				<input type="hidden" name="dataentry" value="dataentry">
			</form>

			<!-- Results output -->
			<?php
				echo '<div id="resultbox">
					<h1 style="text-align: center;">', output_heading($result_status), '</h1>
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
					</table>
				</div>';

				// display the status message in the correct colour
				echo '<div id="statusmessagebox">
					<h1 style="text-align: center; color:',set_status_colour($result_status), ';">Status</h1>
					<table class="center" style="background-color:white;">
						<tr>
							<td style="color:',set_status_colour($result_status),';"><b>', $result_status, '</b></td>
						</tr>
					</table>
				</div>';
			?>
		</div>
	</body>
</html>
