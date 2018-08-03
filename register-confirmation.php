<?php 

function register_confirm() { ?>
    <div class="wrap">
        <h2>Thank you for submitting your application!</h2>
        <p style="font-size: 18px;">
            You will recieve an email from us informing you whether you have been accepted. <br> <br>
            For more information about your future connections, go to <a href="../my-connection" > My Connection </a>
        </p> 
        <br> <br>
        <form action="<?php echo esc_url( home_url())?>">
            <input type="submit" value="Return to Career Home Page" />
        </form>
    </div>
<?php
}

add_shortcode('confirm-page', 'register_confirm');
