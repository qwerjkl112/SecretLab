<?php
require_once ( 'potential-connection-runner.php' );

function potential_connections_table() {

  global $wpdb;
        $table_name = "users";
        $rows = $wpdb->get_results("SELECT *, Users.`firstname` AS `mentorName`, Users2.`firstname` AS `menteeName` FROM `PotentialConnections` INNER JOIN Users on PotentialConnections.mentorId=Users.ID INNER JOIN Users Users2 on PotentialConnections.menteeId=Users2.ID ");
  
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

  <div class="container">
    <label>Search:</label>
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <table class="table" id="potential_connections_tb" >
      <thead>
        <tr>
          <th>Potential Connections Id</th>
          <th>Connection</th>
          <th onclick="sortMatches()">Match Score</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $row) { ?>
        <tr class="active">
          <td>
            id: <?php echo $row->PotentialConnectionsId; ?>
          </td>
          <td> 
            Mentor Name:
            <a href="#"><?php echo $row->mentorName; ?></a><br>
            Mentee Name:
            <a href="#"><?php echo $row->menteeName; ?></a><br>
          </td>
          <td> 
            <span style="font-size: 100%"<?php 
              if($row->matchScore >= '75'){
                echo 'class="label label-success"';
              }
              else if($row->matchScore >= '50'){
                echo 'class="label label-warning"';
              }
              else {
                echo 'class="label label-danger"';
              }
              ?>><?php echo $row->matchScore; ?></span>
          </td>
          <td> 
            <form action="" method="post">
              <button type="submit" class="btn btn-default" name="create_connection">
              <input type="hidden" name="mentorId" <?php echo "value=".$row->mentorId;?>>
              <input type="hidden" name="menteeId" <?php echo "value=".$row->menteeId;?>>
              <span class="glyphicon glyphicon-ok" ></span> Make Connection </button>
            </form>
            <form action="" method="post">
              <button type="submit" class="btn btn-default" name="delete_potential_connections">
              <input type="hidden" name="mentorId" <?php echo "value=".$row->mentorId;?>>
              <input type="hidden" name="menteeId" <?php echo "value=".$row->menteeId;?>>
              <span class="glyphicon glyphicon-remove" ></span> Delete </button>
            </form>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
  <b>Generate Potential Matches</b>
  <form method="post" action="">
    <div>
      <input type='submit' name='findMatch' value="Generate" class='button'>
    </div>
  </form>
  <script>
    function sortMatches() {
      console.log('hello');
      var table, rows, switching, i, x, y, shouldSwitch, switchcount = 0;;
      table = document.getElementById("potential_connections_tb");
      switching = true;
      /*Make a loop that will continue until
      no switching has been done:*/
      dir = "asc"; 
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
          x = rows[i].getElementsByTagName("TD")[2];
          x = x.getElementsByTagName("span")[0];
          y = rows[i + 1].getElementsByTagName("TD")[2];
          y = y.getElementsByTagName("span")[0];
          //check if the two rows should switch place:
          console.log(x.innerHTML);
          if (dir == "asc") {
            if (Number(x.innerHTML) < Number(y.innerHTML)) {
                console.log('sorting');
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
          } else if (dir == "desc") {
              if (Number(x.innerHTML) > Number(y.innerHTML)) {
                console.log('sorting');
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
          switchcount ++; 
        }

        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
    $( document ).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#potential_connections_tb tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
  
  </script>
<?php
}

add_shortcode('potential_connections', 'potential_connections_table');
