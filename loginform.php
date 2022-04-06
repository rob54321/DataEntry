<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Database Login</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.37.1" />
	<link rel="stylesheet" href="css/login.css">
</head>

<body>
	<div id="main">
		<div id="loginbox">
			<h1>Database login</h1>
			<form method="post" action="login.php">
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
						<td style="text-align:right;"> <input type="submit" value="Login" name="login"></td>
						<td> <input type="submit" value="Cancel" name="cancel"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>

</html>
