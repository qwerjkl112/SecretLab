<?php

require_once ( 'create-connection-action.php' );
require_once ( 'delete-connection-action.php' );
require_once ( 'admin-utils.php' );

function profiles_list() {
    if(isset($_SESSION['login_user'])){ ?>
    <div class="alert alert-success">
        <strong>Welcome</strong> <?php echo $_SESSION['login_user']; ?>
    </div>
    <?php }
    ?>
    <style>
        th {
            font-size: small;
        }
        .table{
            white-space: nowrap;
            width: 1%;
        }
        #content {
            margin:0px;
            width: 100%;
            overflow: scroll;
        }
        .wrap {
          height: 80% !important;
          overflow: scroll;
        }
    </style>
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-plugin/style-admin.css" rel="stylesheet" />

    <div id="top_bar">
        <h2>Members</h2>
        <div class="tablenav top">
        </div>
        <?php
        global $wpdb;
        $table_name = "users";
        $rows = $wpdb->get_results("SELECT `ID`, `username` , `firstname`, `lastname`, usertype.`description` AS `userType`, `interest`, `resource`, `status`, `tcAffiliation`, `jobResponisibility` from $table_name INNER JOIN usertype on users.userType=usertype.typeId");
        ?>

        <div style="display:flex; justify-content:space-between">
          <div>
            <b>Filter</b>
            <form class="form-inline">
                <div class="form-group">
                  <input class="form-control" id="myInput" type="text" placeholder="Type text to filter...">
                  <input type="submit" id="export_profileList" value="Export" class="form-control">
                </div>
            </form>
          </div>
          <div>
            <b>Create Connection</b>
            <form method="post" class="form-inline" action="../connections">
                <div class="form-group">
                  <input class="form-control" type="text" name="mentorId" placeholder="MentorID">
                  <input class="form-control" type="text" name="menteeId" placeholder="MenteeID">
                  <input type='submit' name='create_connection' value='Create Connection' class="form-control">
                </div>
            </form>
          </div>
        </div>
    </div>
    <br>
        <div id="dvData" class="wrap">
        <table class='table table-striped' id='profile_table'>
            <tr class="info">
                <th class="manage-column ss-list-width" onclick="sortTable(0)">ID <span class="fa fa-sort"></span></th>
                <th class="manage-column ss-list-width" onclick="sortTable(1)">Username <span class="fa fa-sort"></span></th>
                <th class="manage-column ss-list-width" onclick="sortTable(2)">Full Name <span class="fa fa-sort"></span></th>
                <th class="manage-column ss-list-width" onclick="sortTable(3)">Type of Member <span class="fa fa-sort"></span></th>
                <th class="manage-column ss-list-width" onclick="sortTable(4)">Status <span class="fa fa-sort"></span></th>
                <th class="manage-column ss-list-width" onclick="sortTable(5)">Interest <span class="fa fa-sort"></span></th>
                <th class="manage-column ss-list-width" onclick="sortTable(6)">Resource <span class="fa fa-sort"></span></th>
                <th class="manage-column ss-list-width" onclick="sortTable(7)">Tuesday Children Affiliation<span class="fa fa-sort"></span></th>
                <th class="manage-column ss-list-width" onclick="sortTable(8)">Deactivate User</th>
                <th class="manage-column ss-list-width" onclick="sortTable(9)">Approve User</th>
                <th class="manage-column ss-list-width" onclick="sortTable(10)">Request Feedback</th>

            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr <?php if($row->status === 'Pending Review'){ echo "class='danger'"; }
                else if($row->status === 'Deactivated User'){ echo "class='warning'";} ?>>
                    <td class="manage-column ss-list-width">
                       <a href="../profile?user_id=<?php echo $row->ID; ?>"><?php echo $row->ID; ?></a></td>
                    <td class="manage-column ss-list-width"><?php echo $row->username; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->firstname; echo " " . $row->lastname;?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->userType; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->status; ?></td>
                    <td class="manage-column ss-list-width"><?php echo str_replace(",",",<br>",$row->interest); ?></td>
                    <td class="manage-column ss-list-width"><?php echo str_replace(",",",<br>",$row->resource); ?></td>
                    <td class="manage-column ss-list-width"><?php echo str_replace(",",",<br>",$row->tcAffiliation); ?></td>
                    <td class="manage-column ss-list-width">
                        <form action="" method="post">
                        <input type="hidden" name="profileId" <?php echo "value=".$row->ID;?>>
                        <?php
                            if($row->status !== 'Deactivated User') {
                                echo '<button type="submit" class="btn btn-default" name="deactivate_user">';
                                echo '<span class="glyphicon glyphicon-remove" ></span> Deactivate User </button>';
                            }
                        ?>
                        </form>
                    </td>
                    <td>
                      <form action="" method="post">
                        <input type="hidden" name="profileId" <?php echo "value=".$row->ID;?>>
                        <?php
                            if($row->status !== 'Approved Member'){
                                    echo '<button type="submit" class="btn btn-default" name="approve_user">';
                                if($row->status === 'Deactivated User') {
                                    echo '<span class="glyphicon glyphicon-ok" ></span> Reactivate User </button>';
                                }
                                else {
                                    echo '<span class="glyphicon glyphicon-ok" ></span> Approve User </button>';
                                }
                            }
                        ?>
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
            var table, rows, header, switching, i, x, y, shouldSwitch, dir, arrow, switchcount = 0;
            table = document.getElementById("profile_table");
            switching = true;
            //Set the sorting direction to ascending:
            dir = "asc";
            if (document.getElementById("current_filter_icon")) {
                prev_sort= document.getElementById("current_filter_icon")
                prev_sort.removeAttribute('id');
                prev_sort.setAttribute('class', "fa fa-sort");
            }

            header = table.getElementsByTagName("TH")[n];
            arrow_icon = header.getElementsByTagName("span")[0]
            console.log(header);
            arrow_icon.setAttribute('id', 'current_filter_icon');
            arrow_icon.setAttribute('class', 'fa fa-sort-asc')
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
                        arrow_icon.setAttribute('class', 'fa fa-sort-desc')
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }


        $( document ).ready(function() {
            $("#export_profileList").click(function () {
                $("#profile_table").table2excel({
                    filename: "User_Table.xls"
                });
            });

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
