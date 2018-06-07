<?php

session_start();

function profile_login() {
	
	if(isset($_SESSION['login_user'])){ ?><div class="updated"><p>you are logged in as <?php echo $_SESSION['login_user']; ?></p></div><?php }?>
	<form method="post" action="../">
	  <div class="form-group">
	    <label for="username">Username</label>
	    <input type="text" class="form-control" name="username" placeholder="Username">  
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" name="password" placeholder="Password">
	    <a href="#">Forgot Password?</a>
	  </div>
	  <div>
	    <input type='submit' name='login' class='button'>
	  </div>
	</form>
<?php
}

add_shortcode('login', 'profile_login');