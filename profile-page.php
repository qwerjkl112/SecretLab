<?php
function profile_page() {

    ?>
    <div class="wrap">
        <h2>My Profile</h2>
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
                        Status: <?php echo $row->status; ?> <br>
                        <!-- Matched: <?php echo $row->matchStatus; ?> -->
                        Type: <?php echo $row->userType; ?> 
                    </div>
                    <div>
                        <input type="button" id="edit_profile_btn" value="Edit Profile" class="btn btn-info" style="margin:5px">
                        <input type="button" id="save_profile_btn" value="Save Profile" class="btn btn-info" style="margin:5px; display:none">
                    </div>
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
                                        <label><input type="checkbox" name="interest" value="0" disabled required <?php echo ($row->interest == 'Finance') ? 'checked' : '' ?>>Finance</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="1" disabled required <?php echo ($row->interest == 'Non Profit') ? 'checked' : '' ?>>Non Profit</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="2" disabled required <?php echo ($row->interest == 'Human resource') ? 'checked' : '' ?>>Human resource</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="3" disabled required <?php echo ($row->interest == 'Retail') ? 'checked' : '' ?>>Retail</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="4" disabled required <?php echo ($row->interest == 'Law') ? 'checked' : '' ?>>Law</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="5" disabled required <?php echo ($row->interest == 'Media') ? 'checked' : '' ?>>Media</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="6" disabled required <?php echo ($row->interest == 'Education') ? 'checked' : '' ?>>Education</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="7" disabled required <?php echo ($row->interest == 'Publishing') ? 'checked' : '' ?>>Publishing</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="8" disabled required <?php echo ($row->interest == 'Journaling') ? 'checked' : '' ?>>Journaling</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="9" disabled required <?php echo ($row->interest == 'Advertising') ? 'checked' : '' ?>>Advertising</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="10" disabled required <?php echo ($row->interest == 'Marketing') ? 'checked' : '' ?>>Marketing</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="11" disabled required <?php echo ($row->interest == 'PR') ? 'checked' : '' ?>>PR</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="12" disabled required <?php echo ($row->interest == 'Technology') ? 'checked' : '' ?>>Technology</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="interest" value="13" disabled required <?php echo ($row->interest == 'Other') ? 'checked' : '' ?>>Other</label>
                                    </div>
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
                                    <input type="text" readonly class="form-control-plaintext" id="companyName" value="<?php echo $row->companyName; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="companyAddress" class="col-sm-2 col-form-label">Company Address</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="companyAddress" value="<?php echo $row->companyAddress; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jobTitle" class="col-sm-2 col-form-label">Job Title</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="jobTitle" value="<?php echo $row->jobTitle; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jobResponisibility" class="col-sm-2 col-form-label">Job Responsibility</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="jobResponisibility" value="<?php echo $row->jobResponisibility; ?>">
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label for="employmentType" class="col-sm-2 col-form-label">Employment Type</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="employmentType" value="<?php echo $row->employmentType; ?>">
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label for="yearsEmployed" class="col-sm-2 col-form-label">Years employed by current profession </label>
                                <div class="col-sm-10" id="yearsEmployed">
                                    <div class="form-check">
                                        <input type="checkbox" value="< 1 year" name="yearsEmployed" class="form-check-input" disabled <?php echo ($row->yearsProfession == '<1 year') ? 'checked' : '' ?>>
                                        <label class="form-check-label"> < 1 year</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="1 - 3 years" name="yearsEmployed" class="form-check-input" disabled <?php echo ($row->yearsProfession == '1 - 3 years') ? 'checked' : '' ?>>
                                        <label class="form-check-label"> 1 - 3 years</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="3 - 5 years" name="yearsEmployed" class="form-check-input" disabled <?php echo ($row->yearsProfession == '3 - 5 years') ? 'checked' : '' ?>>
                                        <label class="form-check-label"> 3 - 5 years</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="5 - 10 years" name="yearsEmployed" class="form-check-input" disabled <?php echo ($row->yearsProfession == '5 - 10 years') ? 'checked' : '' ?>>
                                        <label class="form-check-label"> 5 - 10 years</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="10+" name="yearsEmployed" class="form-check-input" disabled <?php echo ($row->yearsProfession == '10+') ? 'checked' : '' ?>>
                                        <label class="form-check-label"> 10+</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Previous Job" class="col-sm-2 col-form-label">Previous Job</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="prevJobs" value="<?php echo $row->prevJobs; ?>">
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label for="profession" class="col-sm-2 col-form-label">Professions</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="professions" value="<?php echo $row->professions; ?>">
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
                                    <input type="text" readonly class="form-control-plaintext" id="education" value="<?php echo $row->education; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="degree" class="col-sm-2 col-form-label">Degrees</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="degree" value="<?php echo $row->degree; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="otherDegree" class="col-sm-2 col-form-label">Other Degrees</label>
                                <div class="col-sm-10">
                                    <textarea readonly class="form-control-plaintext" rows="5" id="otherDegree" value="<?php echo $row->otherDegree; ?>"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pursuingDegree" class="col-sm-2 col-form-label">Pursuing Degrees</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="pursuingDegree" value="<?php echo $row->pursuingDegree; ?>">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
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
}
add_shortcode('profile', 'profile_page');
