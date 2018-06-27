<?php 

function register_confirm() { ?>
    <div class="wrap">
        <h2>Thank you for submitting your application!</h2>
        <p>
            A confirmation email will be sent to your email address shortly. Please confirm so that we can begin reviewing your application.
        </p> 
        <br> <br>
        <form action="<?php echo esc_url( home_url())?>">
            <input type="submit" value="Return to Career Home Page" />
        </form>
    </div>
<?php
}

add_shortcode('confirm-page', 'register_confirm');