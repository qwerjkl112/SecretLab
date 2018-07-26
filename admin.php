<?php

require_once ( 'admin-utils.php' );

function admin_list() {
    if(("2" === $_SESSION['userType'])){ ?>
    <div class="alert alert-success">
        <strong>Welcome</strong> <?php echo $_SESSION['login_user']; ?>
    </div>

    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-plugin/style-admin.css" rel="stylesheet" />

    <h2>Create a new admin</h2>

    <form method="post" action="../">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username">  
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
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
                <th class="manage-column ss-list-width"">Username</th>
                <th class="manage-column ss-list-width"">Full Name</th>
                <th class="manage-column ss-list-width"">Delete User</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width">
                        <a href="../profile?user_id=<?php echo $row->ID; ?>"><?php echo $row->ID; ?></a></td>  
                    <td class="manage-column ss-list-width"><?php echo $row->username; ?></td>  
                    <td class="manage-column ss-list-width"><?php echo $row->firstname; echo " " . $row->lastname;?></td>  
                    <td class="manage-column ss-list-width">
                        <form action="" method="post">
                        <button type="submit" class="btn btn-default" name="delete_user">
                        <input type="hidden" name="profileId" <?php echo "value=".$row->ID;?>>
                        <span class="glyphicon glyphicon-remove" ></span> Delete User </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div>
        <h2>test Email</h2>
        <form action="" method="post">
            <button type="submit" class="btn btn-default" name="email_user">
            <input type="hidden" name="profileId" <?php echo "value=".$row->ID;?>>
            <span class="glyphicon glyphicon-envelope"></span> Email User</button>
    </div>
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
