<?php

require_once ( 'connection-details.php' );

function connections_table() {

	global $wpdb;
        $table_name = "users";
        $rows = $wpdb->get_results("SELECT Users.`firstname` AS `mentorName`, Users2.`firstname` AS `menteeName`, `connectionid`, `mentorId`, `menteeId`, `createdDate`, `lastConnected` FROM `Connections` INNER JOIN Users on Connections.mentorId=Users.ID INNER JOIN Users Users2 on Connections.menteeId=Users2.ID ");
	?>

		<div class="container">
		  <table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Connection</th>
		        <th>Last Checked In</th>
		        <th>Delete</th>
		        <th>Details</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php foreach ($rows as $row) { 
		      	$cid = $row->connectionid; ?>
		      <tr <?php 
		      		if(strtotime($row->lastConnected) < strtotime("-30 day"))
		      		echo "class='warning'"; ?>>
		        <td> 
		          Connection Id:
		          <a href=""><?php echo $cid; ?></a><br>
		          Mentor Name:
		          <a href="#"><?php echo $row->mentorName; ?></a><br>
		          Mentee Name:
		          <a href="#"><?php echo $row->menteeName; ?></a><br>
		        </td>
		        <td> 
		          Date Connected:
		          <?php echo $row->createdDate; ?><br>
		          Last Checked In:
		          <?php echo $row->lastConnected; ?><br>
		        </td>
		        <td> 
		          <form action="" method="post">
		          	<button type="submit" class="btn btn-default" name="delete_connection">
		          	<input type="hidden" name="connectionid" <?php echo "value=".$cid;?>>
		          	<span class="glyphicon glyphicon-remove" ></span> Deactivate Connection </button>
		          </form>
		        </td>
		        <td>
		          <form action="" method="post">
		          	<button type="submit" class="btn btn-default" name="connection_detail">
		          	<input type="hidden" name="connectionid" <?php echo "value=".$cid;?>>
		          	<span class="glyphicon glyphicon-info-sign" ></span> View Comments </button>
			      </form>
		         </td>
		      </tr>
			<?php } ?>
		    </tbody>
		  </table>
		</div>

<?php
}

add_shortcode('connections', 'connections_table');