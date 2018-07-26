<?php
require_once ( 'update-profile-action.php' );

function profile_page() {
    ?>
    <div class="wrap">
            <style>
            input[readonly] { 
                background-color: transparent;
                color:black;
            }
            textarea[readonly] {
                background-color: transparent;
                color:black;     
                border-style: none;
            }
            textarea{ 
                width: 80%; 
                height:200px; 
                min-height:200px;  
                max-height:200px;
            }
        </style>
    </div>
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
        $row = $wpdb->get_row("SELECT * FROM users INNER JOIN usertype on users.userType=usertype.typeId WHERE username = '$username' OR ID = $userid");
        ?>
    <div>
        <div id="profile__header"> 
            <img id="user_img" />
            <div id="user_overview"> 
                <b><?php echo $row->firstname; echo " " . $row->lastname;?></b>
                <div id="user_info">
                    Status: <?php echo $row->status; ?> <br>
                    <!-- Matched: <?php echo $row->matchStatus; ?> -->
                    Type: <?php echo $row->userType; ?> 
                </div>

            </div>
        </div>
    <form method="post" action="">
            <div id="profile__body">
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <!-- ABOUT ME -->
                        <div class="panel-heading" id="contact_info">
                            <h3 class="panel-title"> About Me </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="username" value="<?php echo $row->username; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" readonly class="form-control-plaintext" id="email" value="<?php echo $row->email; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phonenumber" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="phonenumber" value="<?php echo $row->phonenumber; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="otherInfo" class="col-sm-2 col-form-label">Other Infomation</label>
                                <div class="col-sm-10">
                                    <textarea type="text" readonly class="form-control-plaintext" id="otherInfo" value="<?php echo $row->otherInfo; ?>"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="interest" class="col-sm-2 col-form-label">Interest</label>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="0" disabled required <?php echo (strpos($row->interest, 'Finance') !== false) ? 'checked' : '' ?>>Finance</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="1" disabled required <?php echo (strpos($row->interest, 'Non Profit') !== false) ? 'checked' : '' ?>>Non Profit</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="2" disabled required <?php echo (strpos($row->interest, 'Human Resource') !== false) ? 'checked' : '' ?>>Human Resources</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="3" disabled required <?php echo (strpos($row->interest, 'Retail') !== false) ? 'checked' : '' ?>>Retail</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="4" disabled required <?php echo (strpos($row->interest, 'Law') !== false) ? 'checked' : '' ?>>Law</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="5" disabled required <?php echo (strpos($row->interest, 'Media') !== false) ? 'checked' : '' ?>>Media</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="6" disabled required <?php echo (strpos($row->interest, 'Education') !== false) ? 'checked' : '' ?>>Education</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="7" disabled required <?php echo (strpos($row->interest, 'Publishing') !== false) ? 'checked' : '' ?>>Publishing</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="8" disabled required <?php echo (strpos($row->interest, 'Journaling') !== false) ? 'checked' : '' ?>>Journalism</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="9" disabled required <?php echo (strpos($row->interest, 'Advertising') !== false) ? 'checked' : '' ?>>Advertising</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="10" disabled required <?php echo (strpos($row->interest, 'Marketing') !== false) ? 'checked' : '' ?>>Marketing</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="11" disabled required <?php echo (strpos($row->interest, 'PR') !== false) ? 'checked' : '' ?>>PR</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest[]" value="12" disabled required <?php echo (strpos($row->interest, 'Technology') !== false) ? 'checked' : '' ?>>Technology</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" onclick="toggle(this);" name="interest[]" value="13" disabled required <?php echo ($row->interest == 'Other') ? 'checked' : '' ?>>Other</label>
                                        <input type="text" name="interest_other" id="interest_other" class="form-control-plaintext" placeholder="Other" style="display:none">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tcAffiliation" class="col-sm-2 col-form-label">Please tell us your affiliation with Tuesday's Children.</label>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="tcAffiliation[]" value="0" disabled required <?php echo (strpos($row->tcAffiliation , '9/11 Family Member') !== false) ? 'checked' : '' ?>>9/11 Family Member</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="tcAffiliation[]" value="1" disabled required <?php echo (strpos($row->tcAffiliation , 'First Responder/First Responder Family Member') !== false) ? 'checked' : '' ?>>First Responder/First Responder Family Member</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="tcAffiliation[]" value="2" disabled required <?php echo (strpos($row->tcAffiliation , 'Military') !== false) ? 'checked' : '' ?>>Military</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="tcAffiliation[]" value="3" disabled required <?php echo (strpos($row->tcAffiliation , 'Volunteer') !== false) ? 'checked' : '' ?>>Volunteer</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="tcAffiliation[]" value="4" disabled required <?php echo (strpos($row->tcAffiliation , 'Prefer not to answer') !== false) ? 'checked' : '' ?>>Prefer not to answer</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" onclick="toggle(this);" name="tcAffiliation[]" value="5" disabled required <?php echo (strpos($row->tcAffiliation, 'Other') !== false) ? 'checked' : '' ?>>Other</label>
                                        <input type="text" name="tcAffiliation_other" id="tcAffiliation_other" class="form-control-plaintext" placeholder="Other" style="display:none">
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="resource" class="col-sm-2 col-form-label">Please check which topic areas you are most interested in working on with your Career Candidates</label>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="resource[]" value="0" disabled required <?php echo (strpos($row->resource , 'Resume Writing') !== false) ? 'checked' : '' ?>>Resume Writing</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="resource[]" value="1" disabled required <?php echo (strpos($row->resource , 'Networking') !== false) ? 'checked' : '' ?>>Networking</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="resource[]" value="2" disabled required <?php echo (strpos($row->resource , 'Career Advancement') !== false) ? 'checked' : '' ?>>Career Advancement</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="resource[]" value="3" disabled required <?php echo (strpos($row->resource , 'Career Change') !== false) ? 'checked' : '' ?>>Career Change</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="resource[]" value="4" disabled required <?php echo (strpos($row->resource , 'General Professional Help') !== false) ? 'checked' : '' ?>>General Professional Help</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" onclick="toggle(this);" name="resource[]" value="5" disabled required <?php echo ($row->resource == 'Other') ? 'checked' : '' ?>>Other</label>
                                        <input type="text" name="resource_other" class="form-control" id="resource_other" style="display:none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php if($username != "none"){ ?>
            <div>
                <input type="button" id="edit_profile_btn" value="Edit Profile" class="btn btn-info" style="margin:5px">
                <input type="submit" id="save_profile_btn" name="updateProfile" value="Save Profile" class="btn btn-info" style="margin:5px; display:none">
                <input type="hidden" name="profileId" <?php echo "value=".$userid?>>
            </div>
            <?php } ?>
    </form>
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
            $(document).ready(function() {
                $("#edit_profile_btn").click(function (event) {
                    var inputs = $("#profile__body").find(":input");
                    inputs.toArray().forEach(function(input){
                        if (input.type === 'radio' || input.type === 'checkbox') {
                            input.removeAttribute("disabled");
                        } else {
                            input.removeAttribute("readonly");
                            input.setAttribute("class", "form-control");
                        }
                    });
                    $("#edit_profile_btn").hide();
                    $("#save_profile_btn").show();

                });

                $("#save_profile_btn").click(function (event) {
                    var inputs = $("#profile__body").find(":input");
                    var checked_values = {}; //  { 'interest' : ['PR'] }
                    inputs.toArray().forEach(function(input){
                        if (input.type === 'radio' || input.type === 'checkbox') {
                            input.setAttribute("disabled",true);
                            if (input.checked){
                                if (checked_values[input.name] === undefined) {
                                    checked_values[input.name] = [];
                                }
                                checked_values[input.name].push(input.value);
                            }
                        } else {
                            input.setAttribute("readonly",true);
                            input.setAttribute("class", "form-control-plaintext");
                        }
                    });
                    console.log(checked_values);
                    $("#edit_profile_btn").show();
                    $("#save_profile_btn").hide();
                });
            });
        </script> 


    </div>
    <?php
}
add_shortcode('profile', 'profile_page');