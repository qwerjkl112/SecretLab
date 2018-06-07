<?php

require_once ( 'connection-details.php' );

function connections_table() {

	global $wpdb;
        $table_name = "users";
        $rows = $wpdb->get_results("SELECT users.`firstname` AS `mentorName`, users2.`firstname` AS `menteeName`, `connectionid`, `mentorId`, `menteeId`, `createdDate`, `lastConnected` FROM `connections` INNER JOIN users on connections.mentorId=users.ID INNER JOIN users users2 on connections.menteeId=users2.ID ");
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
		      <tr id="<?php echo $row->connectionid; ?>_row" <?php 
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

		<script>
			$(document).ready( function () {
				if ($("#comments_display")) {
					var comments = $("#comments_display");
					comments.css("display","block");
					var connect_id = $("#comments_display").attr("name");
					var connection_row = $('#'+connect_id+'_row');
					var comment_row = $('<tr></tr>');
					comment_row.append('<td id="comment_info" colspan="4"></td>');
					connection_row.after(comment_row);
					$('#comment_info').append(comments);
				}

			} )
		
		</script>

<?php
}

add_shortcode('connections', 'connections_table');
