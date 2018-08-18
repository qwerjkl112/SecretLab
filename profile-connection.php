<?php

require_once ( 'create-feedback-action.php' );
require_once ('admin-utils.php');

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
		<style>
			.wrap {
				height: 80% !important;
				overflow: scroll;
			}
		</style>

		<div class="container">
			<h2>My Connections</h2>
			<br>
			<b>Filter</b>
			<form class="form-inline">
					<div class="form-group">
						<input class="form-control" id="myInput" type="text" placeholder="Type text to filter...">
					</div>
			</form>
			<div class="wrap">
			  <table id="my_connection_tb" class="table table-striped">
			    <thead>
			      <tr>
							<?php
							if ($userType == 0){ ?>
									<th>First Name</th>
									<th>Last Name</th>
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
								<button class="btn btn-default open-feedbackModal"
												data-toggle="modal"
												data-target="#feedbackModal"
												data-connection-id="<?php echo $row->connectionid ?>"
												data-sender-id="<?php echo $profileId ?>"
												data-receiver-name="<?php echo $row->firstname.' '.$row->lastname; ?>"
												data-receiver-id="<?php
													if($userType == '1') {
														echo $row->menteeId;
													}
													else {
														echo $row->mentorId;
													} ?>">
									<span class="glyphicon glyphicon-comment" ></span>
									Leave Feedback </button>
			        </td>
			        <td>
								<button class="btn btn-default open-emailModal"
												data-toggle="modal" data-target="#emailModal"
												data-recepient-name="<?php echo $row->firstname.' '.$row->lastname; ?>"
												data-recepient-email="<?php echo $row->email ?>">
									<span class="glyphicon glyphicon-envelope" ></span>
									Email
								</button>
			        </td>
			      </tr>
				<?php } ?>
			    </tbody>
			  </table>
			</div>
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

		<!-- Modal -->
		<div class="modal fade" id="emailModal" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="email-modal-title"></h4>
					</div>
					<div class="modal-body">
						<form action="" method="post" id="emailForm">
							<div class="form-group">
								<label>Message:</label>
								<textarea class="form-control" rows="10" id="email_message" name="txt" required></textarea>
							</div>
							<br>

							<button type="submit" class="btn btn-primary" id="email_btn" name="email_user">
								<input type="hidden" name="subject" value="Testing Subject" >
								<input type="hidden" name="email" id="email_input">
								Send
							</button>
							<button type="button" class="btn btn-default" id="email_close_btn" data-dismiss="modal">Close</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="feedbackModal" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content">

					<div class="modal-header">
						<h4 class="feedback-modal-title"></h4>
					</div>
					<div class="modal-body">
						<form action="" method="post" id="feedbackForm">
							<label for="Rating" class="control-label"> Rating: </label>
							<div class="form-group">
								<label class="radio-inline">
	                <input type="radio" name="Rating" value="1" required/> 1
		            </label>
								<label class="radio-inline">
	                <input type="radio" name="Rating" value="2" required/> 2
		            </label>
								<label class="radio-inline">
	                <input type="radio" name="Rating" value="3" required/> 3
		            </label>
								<label class="radio-inline">
	                <input type="radio" name="Rating" value="4" required/> 4
		            </label>
								<label class="radio-inline">
	                <input type="radio" name="Rating" value="5" required/> 5
		            </label>
							</div>

							<br>

							<div class="form-group">
								<label for="feedback_message">Feedback:</label>
								<textarea class="form-control" rows="8" id="feedback_message" name="Description" required></textarea>
							</div>

							<button type="submit" class="btn btn-primary" name="leave_feedback">
							<input type="hidden" name="connectionid" id="connection_input">
							<input type="hidden" name="SenderId" id="sender_input">
							<input type="hidden" name="ReceiverId" id="receiver_input">

							Submit</button>
							<button type="button" class="btn btn-default" id="feedback_close_btn" data-dismiss="modal">Close</button>

							<br>

						</form>

					</div>
				</div>
			</div>
		</div>

		<script>

			$(document).ready(function() {
		    $('#feedbackForm').bootstrapValidator({
					excluded: [':disabled'],
	        fields: {
						'Rating': {
							validators: {
								notEmpty: {
                  message: 'Please select a rating'
                }
							}
						},
            'Description': {
              validators: {
              	notEmpty: {
              		message: 'Please write a message'
                },
								stringLength: {
                  max: 3000
                },
              }
          	}
	        }
    		});

				$('#emailForm').bootstrapValidator({
					excluded: [':disabled'],
					fields: {
						'txt': {
							validators: {
								notEmpty: {
									message: 'Please write a message'
								},
								stringLength: {
									max: 3000
								},
							}
						},

					}
				});

			});


			$("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#my_connection_tb tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});

			$(document).on("click", ".open-emailModal", function () {
		     var name = $(this).data('recepient-name');
				 var email = $(this).data('recepient-email');
		     $(".modal-header .email-modal-title").html("Email Message to " + name);
				 $(".modal-body #email_input").val(email);
			});

			$("#emailModal").on("hidden.bs.modal", function(){
    			$("#email_message").val("");
					$('#emailForm').bootstrapValidator("resetForm",true);
			});

			$(document).on("click", ".open-feedbackModal", function () {
			     var name = $(this).data('receiver-name');
					 var connection_id = $(this).data('connection-id');
					 var sender_id = $(this).data('sender-id');
					 var receiver_id = $(this).data('receiver-id');

			     $(".modal-header .feedback-modal-title").html("Feedback about " + name);
					 $(".modal-body #connection_input").val(connection_id);
					 $(".modal-body #sender_input").val(sender_id);
					 $(".modal-body #receiver_input").val(receiver_id);
			});

			$("#feedbackModal").on("hidden.bs.modal", function(){
				$('input[name="Rating"]').prop('checked', false);
				$("#feedback_message").val("");
				$('#feedbackForm').bootstrapValidator("resetForm",true);
			});

		</script>
	<?php
	}
	else{
	    echo "<div id='loginmsg'>Please Log in first!</div>";
	}
}

add_shortcode('my_connection', 'profile_connection');
