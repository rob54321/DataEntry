<?php
	ini_set("display_errors",1);
	error_reporting(E_ALL);

	if (!session_id()) session_start();
	include 'dataentry1_action.php';
?>
<!DOCTYPE html>
<html xml:lang="en" lang="en">

<head>
	<title>Database Login</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.37.1" />
	<link rel="stylesheet" href="css/loginform.css">
</head>

<body>
	<div id="main">
		<div id="loginbox">
			<h1>Database login</h1>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
					method="post"
					name="loginform"
					value="login"
					target="_self">
				<table>
					<tr>
						<td>Username:</td>
						<td><input type="text"
								id="username"
								name="username">
						</td>
					</tr>
					<tr>
						<td>     </td>
						<td>     </td>
					</tr>
					<tr>
					<tr>
						<td>     </td>
						<td>     </td>
					</tr>
						<td>Password:</td>
						<td><input type="password"
								id="password"
								name="password">
						</td>
					</tr>
					<tr>
						<td>     </td>
						<td>     </td>
					</tr>
					<tr>
						<td style="text-align:right;"> <input type="submit" value="Go" name="go"></td>
						<td> <input type="reset" name="reset" value="Clear"></td>
					</tr>
				</table>
				<input type="hidden" name="loginform" value="lform">
			</form>
		</div>
		<textarea style="margin-top: 20px; color:
					<?php set_status_colour($login_status); ?> ;"
					rows=4
					cols=40><?php echo $login_status ?>
		</textarea>
	</div>
</body>

</html>
