<?php

require_once ( 'create-connection-action.php' );
require_once ( 'delete-connection-action.php' );
require_once ( 'admin-utils.php' );

function profiles_list() {
    if(isset($_SESSION['login_user'])){ ?>
    <div class="alert alert-success">
        <strong>Weclome</strong> <?php echo $_SESSION['login_user']; ?>
    </div>
    <?php }
    ?>

    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-plugin/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Members</h2>
        <div class="tablenav top">
        </div>
        <?php
        global $wpdb;
        $table_name = "users";
        $rows = $wpdb->get_results("SELECT `ID`, `username` , `firstname`, `lastname`, UserType.`description` AS `userType`, Interests.`description` as `interest`, Resources.`description` as `resources`, `status`, `jobTitle`, `jobResponisibility` from $table_name INNER JOIN UserType on Users.userType=UserType.typeId INNER JOIN Interests on Users.interest=Interests.interest_id INNER JOIN Resources on Users.resource=Resources.resourcesId");
        ?>

        <b>Create Connection</b>
        <form method="post" class="form-inline" action="../connections">
            <div class="form-group col-xs-6">
                <input type="text" class="form-control" name="mentorId" placeholder="MentorID"> 
                <input type="text" class="form-control" name="menteeId" placeholder="MenteeID">
            </div>
            <input type='submit' name='create_connection' value='Create Connection' class='button'>
        </form>
        <br>
        <table class='table table-striped'>
            <tr class="info">
                <th class="manage-column ss-list-width">ID</th>
                <th class="manage-column ss-list-width">Username</th>
                <th class="manage-column ss-list-width">Full Name</th>
                <th class="manage-column ss-list-width">Type of Member</th>
                <th class="manage-column ss-list-width">Interest</th>
                <th class="manage-column ss-list-width">Resource</th>
                <th class="manage-column ss-list-width">Status</th>
                <th class="manage-column ss-list-width">Job Title</th>
                <th class="manage-column ss-list-width">Job Responsibility</th>
                <th class="manage-column ss-list-width">Deactivate User</th>
                <th class="manage-column ss-list-width">Approve User</th>
                <th class="manage-column ss-list-width">Request Feedback</th>

            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->ID; ?></td>  
                    <td class="manage-column ss-list-width"><?php echo $row->username; ?></td>  
                    <td class="manage-column ss-list-width"><?php echo $row->firstname; echo " " . $row->lastname;?></td>  
                    <td class="manage-column ss-list-width"><?php echo $row->userType; ?></td>  
                    <td class="manage-column ss-list-width"><?php echo $row->interest; ?></td>  
                    <td class="manage-column ss-list-width"><?php echo $row->resources; ?></td>   
                    <td class="manage-column ss-list-width"><?php echo $row->status; ?></td>  
                    <td class="manage-column ss-list-width"><?php echo $row->jobTitle; ?></td>  
                    <td class="manage-column ss-list-width"><?php echo $row->jobResponisibility; ?></td> 
                    <td class="manage-column ss-list-width">
                        <form action="" method="post">
                        <button type="submit" class="btn btn-default" name="delete_user">
                        <input type="hidden" name="profileId" <?php echo "value=".$row->ID;?>>
                        <span class="glyphicon glyphicon-remove" ></span> Deactivate User </button>
                        </form>
                    </td>
                    <td>
                      <form action="" method="post">
                        <button type="submit" class="btn btn-default" name="approve_user">
                        <input type="hidden" name="profileId" <?php echo "value=".$row->ID;?>>
                        <span class="glyphicon glyphicon-ok" ></span> Approve User </button>
                      </form>
                    </td>
                    <td>
                      <form action="" method="post">
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" rows="2" id="comment" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default" name="request_feedback">
                        <input type="hidden" name="profileId" <?php echo "value=".$row->ID;?>>
                        <span class="glyphicon glyphicon-ok" ></span> Request Feedback </button>
                      </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}
add_shortcode('list', 'profiles_list');