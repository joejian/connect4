 
<!DOCTYPE html>
<html>
    <head>
	<title> Board Information </title>
	<!--<link href="<?php echo base_url();?>css/default.css" rel="stylesheet" type="text/css" />-->
    </head>
    <body>

	<h1>Board Information</h1>
	<?php
	    
	    Print "<table>";
	    
	    foreach ($matchs->result() as $info)
	    { 
		Print "<tr>"; 
		
		Print "<th>Id:</th> <td>".$info->id . " </td>";
		Print "<th>User1:</th> <td>".$info->user1_id . " </td>";
		Print "<th>User2:</th> <td>".$info->user2_id . " </td>";
		Print "<th>User1 msg:</th> <td>".$info->u1_msg . " </td>";
		Print "<th>User2 msg:</th> <td>".$info->u2_msg . " </td>";
		Print "<th>Board State:</th> <td>".$info->board_state . " </td>";
		Print "<th>Match Status:</th> <td>".$info->match_status_id . " </td>";
		
		Print "</tr>";
	    }
	    
	    Print "</table>";
	    
	?>
	<div>
	    <a href="<?php echo site_url('account/loginForm') ?>">Back</a>
	</div>

    </body>
</html>
