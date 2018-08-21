<?php
function profile_page() {
    ?>
    <div class="wrap">
        <style>
            .profile_page_label{
                font-weight: normal;
            }
            #profile__header{
              margin: 0px;
              padding: 0px;
            }
            #profile__header #user_overview{
              margin: 0px;
              padding: 0px;
            }
        </style>
        <?php
        if(isset($_GET['user_id'])){
            $userid = $_GET['user_id'];
            $username = "none";
        }
        else if(isset($_SESSION['login_user'])){
            $username = $_SESSION['login_user'];
            $userid = 0;
        }
        else{
            echo "<div id='loginmsg'>Please Log in first!</div>";
            exit();
        }
        global $wpdb;
        $row = $wpdb->get_row("SELECT *, `interest`, usertype.`description` AS `userType` FROM users INNER JOIN usertype on users.userType=usertype.typeId WHERE username = '$username' OR ID = $userid");
        ?>
        <div id="profile__header">
            <div id="user_overview">
                <b><?php echo $row->firstname; echo " " . $row->lastname;?></b>
                <div id="user_info">
                    Status: <?php echo $row->status; ?> <br>
                    Type: <?php echo $row->userType; ?>
                </div>
                <?php if($username != "none"){ ?>
                <div>
                    <form action="<?php echo esc_url( home_url())."/edit-profile" ?>">
                        <input type="submit" id="edit_profile_btn" value="Edit Profile" class="btn btn-info" style="margin:5px">
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
        <div id="profile__body">
            <div class="panel-group">
                <div class="panel panel-primary">
                    <!-- ABOUT ME -->
                    <div class="panel-heading" id="contact_info">
                        <h3 class="panel-title"> About Me </h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-24">
                              <label for="username" class="profile_page_label"><?php echo $row->username; ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-24">
                              <label for="email" class="profile_page_label"><?php echo $row->email; ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-24">
                              <label for="phonenumber" class="profile_page_label"><?php echo $row->phonenumber; ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">More Infomation</label>
                            <div class="col-sm-24">
                              <label for="otherInfo" class="profile_page_label"><?php echo $row->otherInfo; ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Interest</label>
                            <div class="col-sm-24">
                              <label for="interest" class="profile_page_label"><?php echo $row->interest; ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Affiliation with Tuesday's Children</label>
                            <div class="col-sm-24">
                              <label for="tcAffiliation" class="profile_page_label"><?php echo $row->tcAffiliation; ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Resources</label>
                            <div class="col-sm-24">
                              <label for="resource" class="profile_page_label"><?php echo $row->resource; ?></label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script type="text/javascript">
            function toggle (event) {
                var other_input = document.getElementById(event.name + '_other');
                if (event.checked) {
                    other_input.style.display = "inline-block";
                    other_input.setAttribute('required',true);
                }
                else {
                    other_input.style.display = "none";
                    other_input.removeAttribute('required');
                }
            }
        </script>


    </div>
    <?php
    }
add_shortcode('profile', 'profile_page');
