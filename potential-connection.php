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
    <table class="table">
      <thead>
        <tr>
          <th>Potential Connection Id</th>
          <th>Connection</th>
          <th>Match Score</th>
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
              if($row->matchScore == '100'){
                echo 'class="label label-success"';
              }
              else if($row->matchScore == '60'){
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

<?php
}

add_shortcode('potential_connections', 'potential_connections_table');