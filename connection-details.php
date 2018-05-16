<?php

if(isset($_POST['connection_detail'])){
   $connectionId = $_POST["connectionid"];
   // echo "hihihi" . $connectionId;
	connections_details($connectionId);
}

function connections_details($connectionId) {

	global $wpdb;
        $table_name = "Connections";
        $rows = $wpdb->get_results("SELECT * FROM $table_name WHERE 1 ");
	?>

		<div class="container">
		  <table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Connection</th>
		        <th>Last Checked In</th>
		        <th>Delete</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php foreach ($rows as $row) { ?>
		      <tr>
		        <td> 
		          Connection Id:
		          <a href="#"><?php echo $row->connectionid; ?></a><br>
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
		          	<input type="hidden" name="connectionid" <?php echo "value=".$row->connectionid;?>>
		          	<span class="glyphicon glyphicon-remove" ></span> Deactivate Connection </button>
		          </form>
		        </td>
		      </tr>
			<?php } ?>
		    </tbody>
		  </table>
		</div>

<?php
}

add_shortcode('connections-details', 'connections_details');