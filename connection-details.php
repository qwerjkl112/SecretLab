<?php

if(isset($_POST['connection_detail'])){
	$connectionId = $_POST["connectionid"];
    // echo "connectionid = " . $connectionId;
	connections_details($connectionId);
}

function connections_details($connectionId) {

	global $wpdb;
    $table_name = "connections";

    $myFeedbacks = $wpdb->get_results("SELECT *, users.`firstname` AS `sender`, users2.`firstname` AS `receiver` FROM `feedbacks` INNER JOIN users on feedbacks.SenderId=users.ID INNER JOIN users users2 on feedbacks.receiverId=users2.ID WHERE `connectionId` = $connectionId");

	?>
		<div id="comments_display" name="<?php echo $connectionId; ?>" style="display:none" class="list-group">
			<?php foreach ($myFeedbacks as $feedback) { ?>
 			<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
		    	<div class="d-flex w-100 justify-content-between">
			      <h5 class="mb-1">Sender: <?php echo $feedback->sender; ?></h5>
			      <!--<small>Rating : <?php echo $feedback->Rating; ?></small>-->
			    </div>
			    <p class="mb-1">Comment: <?php echo $feedback->Description; ?></p>
			    <small>To:  <?php echo $feedback->receiver; ?></small>
			    <small>Date:  <?php echo $feedback->dateCommented; ?></small>
		  	</a>
		<?php } ?>
		</div>
<?php

}


