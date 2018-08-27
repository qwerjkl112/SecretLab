<?php

require_once ( 'admin-utils.php' );

function admin_list() {
    if(("2" === $_SESSION['userType'])){ ?>
    <div class="alert alert-success">
        <strong>Welcome</strong> <?php echo $_SESSION['login_user']; ?>
    </div>

    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-plugin/style-admin.css" rel="stylesheet" />

    <h2>Create a new admin</h2>

    <form method="post" action="../" id="adminForm">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
      </div>
      <div>
        <input type='submit' name='admin_create' class='button'>
      </div>
    </form>

    <div class="wrap">
        <h2>Members</h2>
        <div class="tablenav top">
        </div>
        <?php
        global $wpdb;
        $table_name = "users";
        $rows = $wpdb->get_results("SELECT `ID`, `username` , `firstname`, `lastname` from $table_name");
        ?>

        <br>
        <table class='table table-striped' id='profile_table'>
            <tr class="info">
                <th class="manage-column ss-list-width">ID</th>
                <th class="manage-column ss-list-width">Username</th>
                <th class="manage-column ss-list-width">Full Name</th>
                <th class="manage-column ss-list-width">Delete User</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width">
                        <a href="../profile?user_id=<?php echo $row->ID; ?>"><?php echo $row->ID; ?></a></td>
                    <td class="manage-column ss-list-width"><?php echo $row->username; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->firstname; echo " " . $row->lastname;?></td>
                    <td class="manage-column ss-list-width">
                      <button class="btn btn-default open-deleteUserModal"
                              data-toggle="modal"
                              data-target="#deleteUserModal"
                              data-profile-id="<?php echo $row->ID ?>"
                              data-name="<?php echo $row->firstname." ".$row->lastname; ?>">
                        <span class="glyphicon glyphicon-remove" ></span>
                        Delete User </button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div class="modal fade" id="deleteUserModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
          <div class="modal-header">
            <span class="glyphicon glyphicon-warning-sign"></span> <strong> Delete User Account </strong>
          </div>
					<div class="modal-body">
            <div id="delete_user_msg"></div>
          </div>
          <div class="modal-footer">
            <form action="" method="post">
              <button type="submit" class="btn btn-primary" name="delete_user">
                <input type="hidden" name="profileId" id="profile_input">
                Confirm
              </button>
              <button type="button" class="btn btn-default" id="deleteUser_close_btn" data-dismiss="modal">Close</button>
            </form>

					</div>
				</div>
			</div>
		</div>

    <script type="text/javascript">
        $(document).on("click", ".open-deleteUserModal", function () {
             var profile_id = $(this).data('profile-id');
             var name = $(this).data('name');

             $(".modal-body #delete_user_msg").html("Are you sure you want to delete " + name + "'s account?");
             $(".modal-footer #profile_input").val(profile_id);
        });
        $( document ).ready(function() {
            $('#adminForm').bootstrapValidator({
              fields: {
                username: {
                    validators: {
                        stringLength: {
                            min: 5,
                        },
                        notEmpty: {
                            message: 'Please supply a username'
                        }
                    }
                },
                password: {
                    validators: {
                        identical: {
                            field: 'confirm_password',
                            message: 'Password does not match'
                        },
                        stringLength: {
                            min: 8,
                            message: 'Minimum 8 characters',
                        },
                        notEmpty: {
                            message: 'Minimum 8 characters'
                        }
                    }
                },
                confirm_password: {
                    validators: {
                        identical: {
                            field: 'password',
                            message: 'Password does not match'
                        },
                        stringLength: {
                            min: 8,
                            message: 'Minimum 8 characters',
                        },
                        notEmpty: {
                            message: 'Minimum 8 characters'
                        }
                    }
                }
              }
            });
        });
    </script>
    <?php
    }
    else{
        ?>
        <div class="alert alert-danger">
            <strong>Admin access only</strong>
        </div>
    <?php
    }
}
add_shortcode('admin', 'admin_list');
