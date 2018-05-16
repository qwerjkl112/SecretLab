<?php

if(isset($_POST['connection_detail'])){
    $connectionId = $_POST["connectionid"];
    // echo "connectionid = " . $connectionId;
	connections_details($connectionId);
}

function connections_details($connectionId) {

	global $wpdb;
    $table_name = "Connections";

    $myFeedbacks = $wpdb->get_results("SELECT *, Users.`firstname` AS `sender`, Users2.`firstname` AS `receiver` FROM `Feedbacks` INNER JOIN Users on Feedbacks.SenderId=Users.ID INNER JOIN Users Users2 on Feedbacks.ReceiverId=Users2.ID WHERE `connectionId` = $connectionId");

	?>

		<div class="list-group">
			<?php foreach ($myFeedbacks as $feedback) { ?>
 			<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
		    	<div class="d-flex w-100 justify-content-between">
			      <h5 class="mb-1">Sender: <?php echo $feedback->sender; ?></h5>
			      <small>Rating : <?php echo $feedback->Rating; ?></small>
			    </div>
			    <p class="mb-1">Comment: <?php echo $feedback->Description; ?></p>
			    <small>To:  <?php echo $feedback->receiver; ?></small>
			    <small>Date:  <?php echo $feedback->dateCommented; ?></small>
		  	</a>
		<?php } ?>
		</div>

<?php
}
