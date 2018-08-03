<?php

require_once ( 'create-feedback-action.php' );

function profile_connection() {
	global $wpdb;

        if(isset($_SESSION['id'])){
						$profileId = $_SESSION['id'];
            ?>
            <div class="alert alert-info">
  				<strong>Welcome</strong> <?php echo $_SESSION['login_user']?>
			</div>
			<?php
					if($_SESSION['userType'] == '1') {
						$rows = $wpdb->get_results("SELECT `connectionid`, `createdDate`, `lastConnected`, `menteeId`, `mentorId`,Users2.`firstname` AS `firstname`, Users2.`lastname` AS `lastname`, Users2.`email` AS `email`, Users2.`phonenumber` AS `phonenumber`, Users2.`resource` AS `resource`, Users2.`interest` AS `interest`, Users2.`tcAffiliation` AS `tcAffiliation` FROM Connections INNER JOIN Users on Connections.mentorId=Users.ID INNER JOIN Users Users2 on Connections.menteeId=Users2.ID WHERE `mentorId` = $profileId OR `menteeId` = $profileId ");
						$userType = '1';
					}
					else{
						$rows = $wpdb->get_results("SELECT `connectionid`, `createdDate`, `lastConnected`, `menteeId`, `mentorId`,Users.`firstname` AS `firstname`, Users.`lastname` AS `lastname`, Users.`email` AS `email`, Users.`phonenumber` AS `phonenumber`, Users.`jobTitle` AS `jobTitle`, Users.`companyName` AS `companyName` FROM Connections INNER JOIN Users on Connections.mentorId=Users.ID INNER JOIN Users Users2 on Connections.menteeId=Users2.ID WHERE `mentorId` = $profileId OR `menteeId` = $profileId ");
						$userType = '0';
					}
					//$user_rows = $wpdb->get_results("SELECT `connectionid`, Users.`firstname` AS `mentorName`, Users2.`firstname` AS `menteeName`, `createdDate`, `lastConnected`,`menteeId`,`mentorId` FROM Connections INNER JOIN Users on Connections.mentorId=Users.ID INNER JOIN Users Users2 on Connections.menteeId=Users2.ID WHERE `mentorId` = $profileId OR `menteeId` = $profileId ");
					$myFeedbacks = $wpdb->get_results("SELECT * FROM `Feedbacks` WHERE `ReceiverId` = $profileId");
	        $TCFeedBacks = $wpdb->get_results("SELECT * FROM `TC_Feedbacks` WHERE `profileId` = $profileId");
	?>

		<div class="container">
		  <table class="table table-striped">
		    <thead>
		      <tr>
						<?php
						if ($userType == 0){ ?>
								<th>First Name</th>
								<th>Last name</th>
								<th>Last Checked In</th>
								<th>Phone Number</th>
								<th>Job Title</th>
								<th>Company</th>
								<th>Feedback</th>
								<th>Email</th>
						<?php
						}
						else { ?>
								<th>First Name</th>
								<th>Last name</th>
								<th>Last Checked In</th>
								<th>Phone Number</th>
								<th>Status</th>
								<th>Interest</th>
								<th>Relation</th>
								<th>Feedback</th>
								<th>Email</th>
						<?php
						}
						?>
		      </tr>
		    </thead>
		    <tbody>
		      <?php foreach ($rows as $row) { ?>
		      <tr>
		        <td class="manage-column ss-list-width"><?php echo $row->firstname; ?></td>
						<td class="manage-column ss-list-width"><?php echo $row->lastname; ?></td>
						<td class="manage-column ss-list-width"><?php echo $row->lastConnected; ?></td>
						<td class="manage-column ss-list-width"><?php echo $row->phonenumber; ?></td>
						<?php
						if ($userType == 0){
							?>
							<td class='manage-column ss-list-width'><?php echo $row->jobTitle; ?></td>
							<td class='manage-column ss-list-width'><?php echo $row->companyName; ?></td>
							<?php
						}
						else {
							?>
							<td class='manage-column ss-list-width'><?php echo $row->resource; ?></td>
							<td class='manage-column ss-list-width'><?php echo $row->interest; ?></td>
							<td class='manage-column ss-list-width'><?php echo $row->tcAffiliation; ?></td>
							<?php
						}
						?>
		        <td>
		          <br>
		          <form action="" method="post">
		          	<span> Rating: </span>
		          	<input type="radio" name="Rating" value="1"/>
			        <label>1</label>
			        <input type="radio" name="Rating" value="2"/>
			        <label>2</label>
			        <input type="radio" name="Rating" value="3"/>
			        <label>3</label>
			        <input type="radio" name="Rating" value="4"/>
			        <label>4</label>
			        <input type="radio" name="Rating" value="5"/>
			        <label>5</label>
			        <div class="form-group">
					  <label for="comment">Feedback:</label>
					  <textarea class="form-control" rows="2" id="comment" name="Description"></textarea>
					</div>
		          	<button type="submit" class="btn btn-default" name="leave_feedback">
		          	<input type="hidden" name="connectionid" <?php echo "value=".$row->connectionid;?>>
		          	<input type="hidden" name="SenderId" <?php echo "value=".$profileId;?>>
		          	<input type="hidden" name="ReceiverId"
		          	<?php
		          		if($userType == '1') {
		          			echo "value=".$row->menteeId;
		          		}
		          		else {
		          			echo "value=".$row->mentorId;
		          		}
		          	?>
		          		>

		          	<span class="glyphicon glyphicon-comment" ></span> Leave Feedback </button>


			        <br>

		          </form>

		        </td>
		        <td>
		        	<button type="submit" class="btn btn-default" name="email">
		        		<span class="glyphicon glyphicon-envelope" ></span> Email </button>

		        </td>
		      </tr>
			<?php } ?>
		    </tbody>
		  </table>
		</div>

		<div class="list-group">

			<?php foreach ($myFeedbacks as $feedback) { ?>
 			<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
		    	<div class="d-flex w-100 justify-content-between">
			      <h5 class="mb-1">Sender: <?php echo $feedback->SenderId; ?></h5>
			      <small>Rating : <?php echo $feedback->Rating; ?></small>
			    </div>
			    <p class="mb-1">Feedback: <?php echo $feedback->Description; ?></p>
			    <small>From:  <?php echo $feedback->ReceiverId; ?></small>
			    <small>Date:  <?php echo $feedback->dateCommented; ?></small>

		  	</a>
		<?php } ?>
		</div>

		<div class="list-group">

			<?php foreach ($TCFeedBacks as $tcfeedback) { ?>
		  	<div class="alert alert-warning">
			  <strong>Feedback Requested</strong>
			  <br>
			  <?php echo $tcfeedback->Description; ?>
			  <br>
			  <small>Date:  <?php echo $tcfeedback->createdDate; ?></small>
			</div>
		<?php } ?>
		</div>
	<?php
	}
	else{
	    echo "<div id='loginmsg'>Please Log in first!</div>";
	}
}

add_shortcode('my_connection', 'profile_connection');
