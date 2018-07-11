<?php
require_once ( 'potential-connection-runner.php' );

function potential_connections_table() {

  global $wpdb;
        $table_name = "users";
        $rows = $wpdb->get_results("SELECT *, users.`firstname` AS `mentorName`, users2.`firstname` AS `menteeName` FROM `potentialconnections` INNER JOIN users on potentialconnections.mentorId=users.ID INNER JOIN users users2 on potentialconnections.menteeId=users2.ID ");
  
  ?>
  <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div class="form-group row">
        <div class="col-xs-3" margin-bottom="10px">
          <input class="form-control" id="myInput" type="text" placeholder="Type text to filter...">
        </div>
        <button type="button" id="export_connectionsList" class="btn btn-primary btn-md"> Export </button>
    </div>
    <table class="table" id="potential_connections_tb" >
      <thead>
        <tr>
          <th>Potential Connections Id</th>
          <th>Connection</th>
          <th onclick="sortMatches()" id="match_col">Match Score <span class="fa fa-sort"></span> </th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $row) { ?>
        <tr class="active">
          <td>
            connection id: <?php echo $row->PotentialConnectionsId; ?><br>
            Mentor Id = <a href="../profile?user_id=<?php echo $row->mentorId; ?>"><?php echo $row->mentorId; ?></a>
            <br>
            Mentee Id = <a href="../profile?user_id=<?php echo $row->menteeId; ?>"><?php echo $row->menteeId; ?></a>
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
      <input type='submit' name='clearMatch' value="Clear" class='button'>
    </div>
  </form>
  <script>
    function sortMatches() {
      var table, rows, header, switching, i, x, y, shouldSwitch, switchcount = 0;;
      table = document.getElementById("potential_connections_tb");
      switching = true;
      /*Make a loop that will continue until
      no switching has been done:*/
      dir = "asc"; 
      if (document.getElementById("current_filter_icon")) {
        prev_sort= document.getElementById("current_filter_icon")
        prev_sort.removeAttribute('id');
        prev_sort.setAttribute('class', "fa fa-sort");
      } 

      header = table.querySelector('#match_col');
      arrow_icon = header.getElementsByTagName("span")[0]
      arrow_icon.setAttribute('id', 'current_filter_icon');
      arrow_icon.setAttribute('class', 'fa fa-sort-asc');

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
          if (dir == "asc") {
            if (Number(x.innerHTML) < Number(y.innerHTML)) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
          } else if (dir == "desc") {
              if (Number(x.innerHTML) > Number(y.innerHTML)) {
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
          arrow_icon.setAttribute('class', 'fa fa-sort-desc')
          switching = true;
        }
      }
    }
    $( document ).ready(function() {
      $("#export_connectionsList").click(function () {
        $("#potential_connections_tb").table2excel({
            filename: "Table.xls"
          });
      });

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