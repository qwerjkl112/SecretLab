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
        <label>Search:</label>
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class='table table-striped' id='profile_table'>
            <tr class="info">
                <th class="manage-column ss-list-width" onclick="sortTable(0)">ID</th>
                <th class="manage-column ss-list-width" onclick="sortTable(1)">Username</th>
                <th class="manage-column ss-list-width" onclick="sortTable(2)">Full Name</th>
                <th class="manage-column ss-list-width" onclick="sortTable(3)">Type of Member</th>
                <th class="manage-column ss-list-width" onclick="sortTable(4)">Interest</th>
                <th class="manage-column ss-list-width" onclick="sortTable(5)">Resource</th>
                <th class="manage-column ss-list-width" onclick="sortTable(6)">Status</th>
                <th class="manage-column ss-list-width" onclick="sortTable(7)">Job Title</th>
                <th class="manage-column ss-list-width" onclick="sortTable(8)">Job Responsibility</th>
                <th class="manage-column ss-list-width" onclick="sortTable(9)">Deactivate User</th>
                <th class="manage-column ss-list-width" onclick="sortTable(10)">Approve User</th>
                <th class="manage-column ss-list-width" onclick="sortTable(11)">Request Feedback</th>

            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr <?php if($row->status === 'Pending Review'){ echo "class='danger'"; }
                else if($row->status === 'Deactivated User'){ echo "class='warning'";} ?>>
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
                        <button type="submit" class="btn btn-default" name="deactivate_user">
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
    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("profile_table");
            switching = true;
            //Set the sorting direction to ascending:
            dir = "asc"; 
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.getElementsByTagName("TR");
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /*check if the two rows should switch place,
                based on the direction, asc or desc:*/
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch= true;
                    break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                    }
                }
                }
                if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                //Each time a switch is done, increase this count by 1:
                switchcount ++;      
                } else {
                /*If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again.*/
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
                }
            }
        }


        $( document ).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#profile_table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    
    </script>
    <?php
}
add_shortcode('list', 'profiles_list');
