<nav id="site-navigation" class="main-navigation">
	<?php do_action( 'ultra_before_nav' ); ?>
	<?php if ( siteorigin_setting( 'navigation_primary_menu' ) ) 
	if (!isset($_SESSION['loggedin'])) {
		wp_nav_menu( array( 'menu' => 'logged-out' ) );
		}

	else {
		if ($_SESSION['userType'] == 2) {
		wp_nav_menu( array( 'menu' => 'admin' ) );
		} else {
		wp_nav_menu( array( 'menu' => 'user' ) );
		}
	}
		?>
	<?php if ( siteorigin_setting( 'navigation_menu_search' ) ) : ?>
		<div class="menu-search">
			<div class="search-icon"></div>
			<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" />
			</form>	
		</div><!-- .menu-search -->
	<?php endif; ?>				
</nav><!-- #site-navigation -->