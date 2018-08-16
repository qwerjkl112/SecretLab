<?php

require_once ( 'update-profile-action.php' );
require_once ( 'profile-database.php' );
require_once ( 'admin-utils.php' );

function profile_edit() { ?>
    <?php
        if(isset($_SESSION['id'])){
            $profileId = $_SESSION['id'];
        }
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
    <div class="wrap">
        <form action="<?php echo esc_url( home_url())."/profile" ?>" method="post">
            <!-- BASIC INFO -->
            <div class="form-group row">

                <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" readonly name = "firstname" class="form-control" id="firstname" placeholder="First Name" value="<?php echo $row->firstname; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" readonly name = "lastname" class="form-control" id="lastname" placeholder="Last Name" value="<?php echo $row->lastname; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" readonly name = "username" class="form-control" id="username" placeholder="Username" value="<?php echo $row->username; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="otherInfo" class="col-sm-2 col-form-label">Is there any other information you would like to share?</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5" name="otherInfo" id="otherInfo" value=""><?php echo $row->otherInfo; ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="resource" class="col-sm-2 col-form-label">Please check which topic areas you are most interested in working on with your Career Candidates</label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" value="0" <?php echo (strpos($row->resource, 'Resume Writing') !== false) ? 'checked' : '' ?>>Resume Writing</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" value="1" <?php echo (strpos($row->resource, 'Networking') !== false) ? 'checked' : '' ?>>Networking</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" value="2" <?php echo (strpos($row->resource, 'Career Advancement') !== false) ?  'checked' : '' ?>>Career Advancement</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" value="3" <?php echo (strpos($row->resource, 'Career Change') !== false) ? 'checked' : '' ?>>Career Change</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" value="4" <?php echo (strpos($row->resource, 'General Professional Help') !== false) ? 'checked' : '' ?>>General Professional Help</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" onclick="toggle(this);" value="5" <?php echo (strpos($row->tcAffiliation, 'Other') !== false) ? 'checked' : '' ?>>Other</label>
                        <input type="text" name="resource_other" class="form-control" id="resource_other" style="display:none">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="tcAffiliation" class="col-sm-2 col-form-label">Please tell us your affiliation with Tuesday's Children.</label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox" name="tcAffiliation[]" value="0" <?php echo (strpos($row->tcAffiliation, '9/11 Family Member') !== false) ? 'checked' : '' ?>>9/11 Family Member</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="tcAffiliation[]" value="1" <?php echo (strpos($row->tcAffiliation, 'First Responder/First Responder Family Member') !== false) ? 'checked' : '' ?>>First Responder/First Responder Family Member</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="tcAffiliation[]" value="2" <?php echo (strpos($row->tcAffiliation, 'Military') !== false) ? 'checked' : '' ?>>Military</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="tcAffiliation[]" value="3" <?php echo (strpos($row->tcAffiliation, 'Volunteer') !== false) ? 'checked' : '' ?>>Volunteer</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="tcAffiliation[]" value="4" <?php echo (strpos($row->tcAffiliation, 'Prefer not to answer') !== false) ? 'checked' : '' ?>>Prefer not to answer</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="tcAffiliation[]" onclick="toggle(this);"  value="5" <?php echo (strpos($row->tcAffiliation, 'Other') !== false) ? 'checked' : '' ?>>Other</label>
                        <input type="text" name="tcAffiliation_other" id="tcAffiliation_other" class="form-control-plaintext" placeholder="Other" style="display:none"></input>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="interest" class="col-sm-2 col-form-label">Interest</label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox" value="0" name="interest[]" <?php echo (strpos($row->interest, 'Finance') !== false) ? 'checked' : '' ?>>Finance</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="1" name="interest[]" <?php echo (strpos($row->interest, 'Non Profit') !== false) ? 'checked' : '' ?>>Non Profit</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="2" name="interest[]" <?php echo (strpos($row->interest, 'Human Resource') !== false) ? 'checked' : '' ?>>Human Resource</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="3" name="interest[]" <?php echo (strpos($row->interest, 'Retail') !== false) ? 'checked' : '' ?>>Retail</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="4" name="interest[]" <?php echo (strpos($row->interest, 'Law') !== false) ? 'checked' : '' ?>>Law</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="5" name="interest[]" <?php echo (strpos($row->interest, 'Media') !== false) ? 'checked' : '' ?>>Media</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="6" name="interest[]" <?php echo (strpos($row->interest, 'Education') !== false) ? 'checked' : '' ?>>Education</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="7" name="interest[]" <?php echo (strpos($row->interest, 'Publishing') !== false) ? 'checked' : '' ?>>Publishing</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="8" name="interest[]" <?php echo (strpos($row->interest, 'Journalism') !== false) ? 'checked' : '' ?>>Journalism</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="9" name="interest[]" <?php echo (strpos($row->interest, 'Advertising') !== false) ? 'checked' : '' ?>>Advertising</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="10" name="interest[]" <?php echo (strpos($row->interest, 'Marketing') !== false) ? 'checked' : '' ?>>Marketing</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="11" name="interest[]" <?php echo (strpos($row->interest, 'PR') !== false) ? 'checked' : '' ?>>PR</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="12" name="interest[]" <?php echo (strpos($row->interest, 'Technology') !== false) ? 'checked' : '' ?>>Technology</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="13" onclick="toggle(this);" name="interest[]" <?php echo (strpos($row->interest, 'Other') !== false)? 'checked' : '' ?>>Other</label>
                        <input type="text" name="interest_other" id="interest_other" class="form-control-plaintext" placeholder="Other" style="display:none"></input>
                    </div>
                </div>
            </div>
            <input type="hidden" name="profileId" value="<?php echo $profileId; ?>">
            <div>
                <button type="submit" name='updateProfile' display="margin: auto" class="btn btn-primary btn-lg">Submit</button>
            </div>

        </form>

        <script type="text/javascript">
            $( document ).ready(function() {
                document.getElementById('otherInfo').value = '<?php echo ($row->otherInfo)?>';
            });
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

add_shortcode('edit-profile', 'profile_edit');
