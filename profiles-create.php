<?php

require_once ( 'profile-database.php' );


function profile_create() {
    ?>

    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-plugin/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Add New Profile</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="../confirm-page" id="registration-form" novalidate="">
            <p><font color="red"><b>*All Fields Required</b></font></p>
            <!-- BASIC INFO -->
            <div class="form-group row">
                <label for="userType" class="col-sm-2 col-form-label">I am applying for </label>
                <div class="col-sm-10">
                    <select class="form-control" name="userType" id="userType">
                        <option value="0">Mentee</option>
                        <option value="1">Mentor</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" name = "firstname" class="form-control" id="firstname" placeholder="First Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" name = "lastname" class="form-control" id="lastname" placeholder="Last Name" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name = "username" class="form-control" id="username" placeholder="Username" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="passwordConfirm" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name = "email" class="form-control" id="email" placeholder="Email" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="date_of_birth" class="col-sm-2 col-form-label">Date of Birth</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="dob" id="date_of_birth" placeholder="Date of Birth" required>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="phonenumber" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="tel" name="phonenumber" class="form-control" id="phonenumber" placeholder="Phone Number" required>
                </div>
            </div> 

            <div class="form-group row">
                <label for="resource" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" value="0">Resume Writing</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" value="1">Networking</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" value="2">Career Advancement</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" value="3">Career Change</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" value="4">General Professional Help</label>
                    </div> 
                    <div class="checkbox">
                        <label><input type="checkbox" name="resource[]" value="5" onclick="otherToggle(this);">Other</label>
                    </div> 
                    <div>
                        <input type="text" name="resource_other" id="resource_other" class="form-control-plaintext" placeholder="Other" style="display:none"></input>
                    </div> 
                </div>
            </div>

            <div class="form-group row">
                <label for="tcAffiliation" class="col-sm-2 col-form-label">Please tell us your affiliation with Tuesday's Children.</label>
                
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox" name="tcAffiliation[]" value="0">9/11 Family Member</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="tcAffiliation[]" value="1">First Responder/First Responder Family Member</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="tcAffiliation[]" value="2">Military</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="tcAffiliation[]" value="3">Volunteer</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="tcAffiliation[]" value="4">Prefer not to answer</label>
                    </div> 
                    <div class="checkbox">
                        <label><input type="checkbox" onclick="otherToggle(this)" name="tcAffiliation[]" value="5">Other</label>
                    </div>
                    <div>
                        <input type="text" name="tcAffiliation_other" id="tcAffiliation_other" class="form-control-plaintext" placeholder="Other" style="display:none"></input>
                    </div> 
                </div>
            </div> 

            <div class="form-group row">
                <label for="interest" class="col-sm-2 col-form-label">Interest</label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="0">Finance</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="1">Non Profit</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="2">Human Resource</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="3">Retail</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="4">Law</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="5">Media</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="6">Education</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="7">Publishing</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="8">Journalism</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="9">Advertising</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="10">Marketing</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="11">PR</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" value="12">Technology</label>
                    </div> 
                    <div class="checkbox">
                        <label><input type="checkbox" name="interest[]" onclick="otherToggle(this);" value="13">Other</label>
                    </div>
                    <div>
                        <input type="text" name="interest_other" id="interest_other" class="form-control-plaintext" placeholder="Other" style="display:none"></input>
                    </div> 
                </div>
            </div>
                        
            

                <!-- MENTOR QUESTIONS -->
            <div id="mentor_form">
                <div class="form-group row">
                    <label for="companyName" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="companyName" class="form-control" id="company" placeholder="Company Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="companyAddress" class="col-sm-2 col-form-label" >Company Address</label>
                    <div class="col-sm-10">
                        <input type="text" name="companyAddress" class="form-control" id="companyAddress" placeholder="Company Address" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jobTitle" class="col-sm-2 col-form-label">Job Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="jobTitle" class="form-control" id="jobTitle" placeholder="Job Title" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jobResponisibility" class="col-sm-2 col-form-label">Job Responsibility</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="jobResponisibility" rows="5" id="jobResponisibility" required></textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="yearsEmployed" class="col-sm-2 col-form-label">Years in current employeer</label>
                    <div class="col-sm-10">
                        <select name="yearsEmployed" class="form-control" id="yearsEmployed" required>
                            <option><1 year</option>
                            <option>1 - 3 years</option>
                            <option>3 - 5 years</option>
                            <option>5 - 10 years</option>
                            <option>10+</option>
                        </select>
                    </div>
                </div> 
            
                <div class="form-group row">
                    <label for="yearsProfession" class="col-sm-2 col-form-label">Years in current profession</label>
                    <div class="col-sm-10">
                        <select name="yearsProfession" class="form-control" id="yearsProfession" required>
                            <option><1 year</option>
                            <option>1 - 3 years</option>
                            <option>3 - 5 years</option>
                            <option>5 - 10 years</option>
                            <option>10+</option>
                        </select>
                    </div>
                </div> 

                <div class="form-group row">
                    <label for="professions" class="col-sm-2 col-form-label">Profession Associations/ Affiliations</label>
                    <div class="col-sm-10">
                        <input type="text" name="professions" class="form-control" id="professions" placeholder="Professions" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="numCandidate" class="col-sm-2 col-form-label">How many Career Candidates would you like to be paired with?</label>
                    <div class="col-sm-10">
                        <select name="numCandidate" class="form-control" id="numCandidate" required>
                            <option>1 - 2</option>
                            <option>3 - 4</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="prevJobs" class="col-sm-2 col-form-label">Did you have any jobs in the past? Please list past companies and titles</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="prevJobs" id="prevJobs" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="education" class="col-sm-2 col-form-label">What college did you attend?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="education" id="education" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="otherDegree" class="col-sm-2 col-form-label">Do you have any other degrees? Please list the degree and school you attended.</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="otherDegree" id="otherDegree" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pursuingDegree" class="col-sm-2 col-form-label">Are you currently pursuing a degree? If so, in what and from which institution?</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="pursuingDegree" id="pursuingDegree" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="otherInfo" class="col-sm-2 col-form-label">Is there any other information you would like to share?</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="otherInfo" id="otherInfo" required></textarea>
                    </div>
                </div>
            </div>
                <!-- MENTEE QUESTIONS -->
            <div id="mentee_form">
                <div class="form-group row">
                    <label for="employmentType" class="col-sm-2 col-form-label">Are you: </label>
                    <div class="col-sm-10">
                        <select name="employmentType" class="form-control" id="employmentType" required>
                            <option>Looking for employment</option>
                            <option>Currently employed, looking to make a change</option>
                            <option>Not looking but interested in networking</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div> 

                <div class="form-group row">
                    <label for="currentEducation" class="col-sm-2 col-form-label">Are you: </label>
                    <div class="col-sm-10">
                        <select name="currentEducation" class="form-control" id="currentEducation" required>
                            <option>In High School</option>
                            <option>In college</option>
                            <option>In the workforce/post college</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div> 

                <div id="education_form">
                    <div class="form-group row">
                        <label for="college" class="col-sm-2 col-form-label">What college did you attend?</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="college" id="college" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="locationCollege" class="col-sm-2 col-form-label">Where is your school located?</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="locationCollege" id="locationCollege" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="graduationDate" class="col-sm-2 col-form-label">What is your anticipated graduation Date?</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="graduationDate" id="graduationDate" required>
                        </div>
                    </div>
                </div>

                
               
                <div class="form-group row">
                    <label for="degree" class="col-sm-2 col-form-label">What is the highest grade or level of school you have completed? Example: If you are currently in college, you would select High School or GED</label>
                    <div class="col-sm-10">
                        <select name="degree" class="form-control" id="degree" required>
                            <option>Did not graduate High School</option>
                            <option>High School</option>
                            <option>Associates Degree</option>
                            <option>Bachelors Degree</option>
                            <option>Masters Degree</option>
                            <option>Doctoral Degree</option>
                            <option>Postdoc</option>
                            <option>Prefer not to answer</option>
                        </select>
                    </div>
                </div>  
            </div>
            <div>
                <button type="submit" name='register' value='register' display="margin: auto" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
    <script>
    
        $( document ).ready(function() {
            var _userType_selector = $("#userType");
            var _mentor_form = $("#mentor_form");
            var _mentee_form = $("#mentee_form");

            if (_userType_selector.val() === "1") {
                _mentor_form.css('display', 'block');
                _mentee_form.css('display', 'none');
                $('label[for="resource"]').html("Please check which topic areas you are most interested in working on with your Career Mentors ");
            }
            else {
                _mentee_form.css('display', 'block');
                _mentor_form.css('display', 'none');
                $('label[for="resource"]').html("What are the career resources that you're looking to get out of the program?");
            }

            _userType_selector.change(function() {
                var value = _userType_selector.val();
                if(value === "1") {
                    // User selected type Mentor
                    _mentor_form.css('display', 'block');
                    _mentee_form.css('display', 'none');
                    $('label[for="resource"]').html("Please check which topic areas you are most interested in working on with your Career Mentors ");
                } else if (value === "0") {
                    // User selected type Mentee
                    _mentee_form.css('display', 'block');
                    _mentor_form.css('display', 'none');
                    $('label[for="resource"]').html("What are the career resources that you're looking to get out of the program?");
                }
            });

            $('#currentEducation').change(function(){
                if ($('#currentEducation').val() === 'In High School' || $('#currentEducation').val() === 'In college'){
                    $('#education_form').css('display','block');
                }
                else{
                    $('#education_form').css('display','none');
                }
            })
        });
        function otherToggle (event) {
            var other_input = document.getElementById(event.name.replace('[]','') + '_other');
            if (event.checked) {
                other_input.style.display = "inline-block";
                other_input.setAttribute('required',true);
            }
            else {
                other_input.style.display = "none";
                other_input.removeAttribute('required');
            }
        }
        $('#registration-form').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                firstname: {
                    validators: {
                            stringLength: {
                            min: 2,
                        },
                            notEmpty: {
                            message: 'Please supply your first name'
                        }
                    }
                },
                lastname: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Please supply your last name'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your email address'
                        },
                        emailAddress: {
                            message: 'Please supply a valid email address'
                        }
                    }
                },
                phonenumber: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your phone number'
                        },
                        phone: {
                            country: 'US',
                            message: 'Please supply a vaild phone number with area code'
                        }
                    }
                },
                username: {
                    validators: {
                        stringLength: {
                            min: 5,
                        },
                        notEmpty: {
                            message: 'Please supply a username'
                        }
                    }
                },
                password: {
                    validators: {
                        identical: {
                            field: 'passwordConfirm',
                            message: 'Password does not match'
                        },
                        stringLength: {
                            min: 8,
                        },
                        notEmpty: {
                            message: 'Password must be at least 8 characters'
                        }
                    }
                },
                passwordConfirm: {
                    validators: {
                        identical: {
                            field: 'password',
                            message: 'Password does not match'
                        },
                        notEmpty: {
                            message: 'Password must be at least 8 characters'
                        }
                    }
                },
                'interest[]': {
                    validators: {
                        choice: {
                            min: 1,
                            message: 'Please choose at least 1 interest'
                        }
                    }
                },
                'resource[]': {
                    validators: {
                        choice: {
                            min: 1,
                            message: 'Please choose at least 1 resource'
                        }
                    }
                },
                'tcAffiliation[]': {
                    validators: {
                        choice: {
                            min: 1,
                            message: 'Please choose at least 1 option'
                        }
                    }
                },
                companyName: {
                    validators: {
                        stringLength: {
                            min: 5,
                        },
                        notEmpty: {
                            message: 'Please supply your company name'
                        }
                    }
                },
                companyAddress: {
                    validators: {
                        stringLength: {
                            min: 5,
                        },
                        notEmpty: {
                            message: 'Please supply your company address'
                        }
                    }
                },
                jobTitle: {
                    validators: {
                        stringLength: {
                            min: 5,
                        },
                        notEmpty: {
                            message: 'Please supply your job title'
                        }
                    }
                },
                professions: {
                    validators: {
                        stringLength: {
                            min: 5,
                        },
                        notEmpty: {
                            message: 'Please supply your professions'
                        }
                    }
                },
                education: {
                    validators: {
                        stringLength: {
                            min: 5,
                        },
                        notEmpty: {
                            message: 'Please supply your education'
                        }
                    }
                },
                jobResponisibility: {
                    validators: {
                        stringLength: {
                            min: 10,
                            max: 200,
                            message:'Please enter at least 10 characters and no more than 200'
                        },
                        notEmpty: {
                            message: 'Please supply a description of your job responsibilities'
                        }
                    }
                },

                otherInfo: {
                    validators: {
                        stringLength: {
                            min: 10,
                            max: 200,
                            message:'Please enter at least 10 characters and no more than 200'
                        },
                        notEmpty: {
                            message: 'Please supply other info'
                        }
                    }
                }
            }})
            .on('success.form.bv', function(e) {
                $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                    $('#contact_form').data('bootstrapValidator').resetForm();
                console.log("oppo")
                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function(result) {
                    console.log(result);
                }, 'json');
            })
    </script>
    <?php
}

add_shortcode('register', 'profile_create');
