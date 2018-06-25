<?php 

function profile_logout() {
	session_destroy();
	echo '<script type="text/javascript">
           window.location.href = "../"
      </script>';
}

add_shortcode('logout', 'profile_logout');

