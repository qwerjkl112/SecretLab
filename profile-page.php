<?php
function profile_page() {

    ?>
    <div class="wrap">
        <h2>My Profile</h2>
        <?php
        if(isset($_SESSION['login_user'])){
            $username = $_SESSION['login_user'];
            global $wpdb;
            $row = $wpdb->get_row("SELECT *, Interests.`description` AS `interest`, UserType.`description` AS `userType` FROM Users INNER JOIN UserType on Users.userType=UserType.typeId INNER JOIN Interests on Users.interest=Interests.interest_id WHERE username = '$username'");
            ?>
            <div id="profile__header"> 
                <img id="user_img" />
                <div id="user_overview"> 
                    <b><?php echo $row->firstname; echo " " . $row->lastname;?></b>
                    <div id="user_info">
                        Status: <?php echo $row->status; ?> 
                        <!-- Match: <?php echo $row->matchStatus; ?> -->
                        Type: <?php echo $row->userType; ?> 
                    </div>
                    <div>
                        <a href="../complete-profile"><input type="button" id="edit_profile" value="Edit Profile" class="btn btn-info" style="margin:5px"></a>
                    </div>
                </div>
            </div>
            <div id="profile__body">
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="contact_info">
                            <h3 class="panel-title"> About Me </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->username; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->email; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phonenumber" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->phonenumber; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phonenumber" class="col-sm-2 col-form-label">Other Infomation</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->otherInfo; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" id="profession_info">
                            <h3 class="panel-title"> Employment </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="companyName" class="col-sm-2 col-form-label">Company Name</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->companyName; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="companyName" class="col-sm-2 col-form-label">Company Address</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->companyAddress; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jobTitle" class="col-sm-2 col-form-label">Job Title</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->professions; ?></span>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jobResponisibility" class="col-sm-2 col-form-label">Job Responsibility</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->jobResponisibility; ?></span>
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label for="jobResponisibility" class="col-sm-2 col-form-label">Employment Type</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->employmentType; ?></span>
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label for="yearsEmployed" class="col-sm-2 col-form-label">Years employed by current employer </label>
                                <div class="col-sm-10" id="yearsEmployed">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" <?php echo ($row->yearsProfession == '<1 year') ? 'checked' : '' ?>>< 1 year</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" <?php echo ($row->yearsProfession == '1 - 3 years') ? 'checked' : '' ?>>1 - 3 years</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" <?php echo ($row->yearsProfession == '3 - 5 years') ? 'checked' : '' ?>>3 - 5 years</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" <?php echo ($row->yearsProfession == '5 - 10 years') ? 'checked' : '' ?>>5 - 10 years</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" <?php echo ($row->yearsProfession == '10+') ? 'checked' : '' ?>>10+</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Previous Job" class="col-sm-2 col-form-label">Previous Job</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->prevJobs; ?></span>
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label for="profession" class="col-sm-2 col-form-label">Professions</label>
                                <div class="col-sm-10">
                                <span><?php echo $row->professions; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading" id="education_info">
                            <h3 class="panel-title"> Education </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="education" class="col-sm-2 col-form-label">College Attended</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->education; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="degree" class="col-sm-2 col-form-label">Degrees</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->degree; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="degree" class="col-sm-2 col-form-label">Other Degrees</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->otherDegree; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="degree" class="col-sm-2 col-form-label">Pursuing Degrees</label>
                                <div class="col-sm-10">
                                    <span><?php echo $row->pursuingDegree; ?></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
add_shortcode('profile', 'profile_page');