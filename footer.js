<script type="text/javascript">
  var _userType_selector = document.querySelector("#userType");
  var _connector_form = document.getElementById("connector_form");
  var _candidate_form = document.getElementById("candidate_form");

  _connector_form.style.display = (_userType_selector.value === "1") ? "block" : "none";
  _candidate_form.style.display = (_userType_selector.value === "0") ? "block" : "none";

  _userType_selector.addEventListener("change", function() {

    var value = _userType_selector.value;
    if(value === "1") {
      _connector_form.style.display = "block";
      _candidate_form.style.display = "none";
    } else if (value === "0") {
      _candidate_form.style.display = "block";
      _connector_form.style.display = 'none';
    }
  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#registration-form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
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
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Password must be at least 8 characters'
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
            },
            
            
        }})
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

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
});

</script>