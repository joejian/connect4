<!DOCTYPE html>
<html>
    <head>
	<title> Account Information </title>
	<!--<link href="<?php echo base_url();?>css/default.css" rel="stylesheet" type="text/css" />-->
    </head>
    <body>

	<h1>Account Information</h1>
	<?php
	    Print "<table>";
	    foreach ($users->result() as $info)
	    { 
		Print "<tr>"; 
		Print "<th>Id:</th> <td>".$info->id . " </td>";
		Print "<th>Login:</th> <td>".$info->login . " </td>";
		//Print "<th>Password:</th> <td>".$info->password . " </td>";
		Print "<th>First Name:</th> <td>".$info->first . " </td>";
		Print "<th>Last Name:</th> <td>".$info->last . " </td>";
		Print "<th>Email:</th> <td>".$info->email . " </td>";
		//Print "<th>Salt:</th> <td>".$info->salt . " </td>";
		Print "</tr>";
	    }
	    Print "</table>";

	?>
	<div>
	    <a href="<?php echo site_url('account/deleteAccounts') ?>">Delete All</a>
	    <a href="<?php echo site_url('account/loginForm') ?>">Back</a>
	</div>

    </body>
</html>
