<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ribalta-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ribalta-theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
			<div class="menu-l">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-3',
							'menu_id'        => 'menu-3',
							
						)
					);
				?>
			</div>
			<div class="svg-wrapper">
				<div class="svg-ham">
					<svg class="svg-1" width="40" height="20" viewBox="0 0 63 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect y="24.4443" width="62.069" height="4" fill="black"/>
						<rect width="62.069" height="4.44444" fill="black"/>
						<rect y="12" width="62.069" height="4" fill="black"/>
					</svg>
					<svg class="svg-2" width="40" height="28" viewBox="0 0 46 44" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect y="40.4353" width="57.0731" height="3.67804" transform="rotate(-45 0 40.4353)" fill="#494033"/>
						<rect x="5.02734" width="57.0731" height="4.08671" transform="rotate(45 5.02734 0)" fill="#494033"/>
					</svg>
				</div>
			</div>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->
	<nav id="site-navigation" class="main-navigation">
		<div class="nav-content-wrapper">
			<div class="menu-left">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'menu-1',
						
					)
				);
				?>
			</div>
			<div class="menu-right">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'menu-2',
						
					)
				);
				?>
				<div>
				<div class="inner-nav--icons">
						<a href="https://www.youtube.com/@laribaltateatro9494" target="_blank">
							<svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.3633 0.547363H7.78776C3.1151 0.547363 0 3.66247 0 8.33512V17.6804C0 22.3531 3.1151 25.4682 7.78776 25.4682H23.3633C28.0359 25.4682 31.151 22.3531 31.151 17.6804V8.33512C31.151 3.66247 28.0359 0.547363 23.3633 0.547363ZM18.5193 14.6121L14.6721 16.9172C13.1146 17.8518 11.8374 17.1353 11.8374 15.313V10.687C11.8374 8.86471 13.1146 8.14823 14.6721 9.08276L18.5193 11.3879C19.999 12.2913 19.999 13.7243 18.5193 14.6121Z" fill="#CAB089"/>
							</svg>
						</a>
						<a href="https://www.instagram.com/laribaltateatro" target="_blank">
							<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20.0587 0.0395508H8.69808C3.76338 0.0395508 0.821533 2.98139 0.821533 7.9161V19.2632C0.821533 24.2115 3.76338 27.1533 8.69808 27.1533H20.0452C24.9799 27.1533 27.9217 24.2115 27.9217 19.2768V7.9161C27.9353 2.98139 24.9934 0.0395508 20.0587 0.0395508ZM14.3784 18.8565C11.4772 18.8565 9.11834 16.4976 9.11834 13.5964C9.11834 10.6953 11.4772 8.33636 14.3784 8.33636C17.2796 8.33636 19.6385 10.6953 19.6385 13.5964C19.6385 16.4976 17.2796 18.8565 14.3784 18.8565ZM22.4041 6.65531C22.3363 6.81799 22.2414 6.96712 22.1194 7.10268C21.9838 7.2247 21.8347 7.31959 21.672 7.38738C21.5093 7.45516 21.3331 7.49583 21.1568 7.49583C20.7908 7.49583 20.4519 7.36026 20.1943 7.10268C20.0723 6.96712 19.9774 6.81799 19.9096 6.65531C19.8418 6.49262 19.8012 6.31638 19.8012 6.14015C19.8012 5.96391 19.8418 5.78767 19.9096 5.62498C19.9774 5.44874 20.0723 5.31318 20.1943 5.17761C20.5061 4.8658 20.9806 4.71667 21.4144 4.81157C21.5093 4.82513 21.5907 4.85224 21.672 4.89291C21.7533 4.92003 21.8347 4.9607 21.916 5.01493C21.9838 5.0556 22.0516 5.12338 22.1194 5.17761C22.2414 5.31318 22.3363 5.44874 22.4041 5.62498C22.4719 5.78767 22.5125 5.96391 22.5125 6.14015C22.5125 6.31638 22.4719 6.49262 22.4041 6.65531Z" fill="#CAB089"/>
							</svg>
						</a>
						<a href="https://www.facebook.com/laribaltateatrocompagnia/" target="_blank">
							<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M27.9999 19.2276C27.9999 24.1599 25.0595 27.1002 20.1273 27.1002H18.5148C17.7696 27.1002 17.1598 26.4905 17.1598 25.7452V17.9268C17.1598 17.561 17.4579 17.2493 17.8238 17.2493L20.2086 17.2087C20.3983 17.1951 20.5609 17.0596 20.6015 16.8699L21.0758 14.2818C21.1164 14.0379 20.9267 13.8076 20.6693 13.8076L17.7831 13.8482C17.4037 13.8482 17.1056 13.5501 17.0921 13.1843L17.0379 9.86449C17.0379 9.64769 17.214 9.458 17.4444 9.458L20.6964 9.40378C20.9267 9.40378 21.1029 9.22765 21.1029 8.99729L21.0487 5.74524C21.0487 5.51489 20.8725 5.33875 20.6422 5.33875L16.9837 5.39296C14.7343 5.43361 12.9457 7.27641 12.9864 9.52573L13.0541 13.252C13.0677 13.6314 12.7696 13.9295 12.3902 13.9431L10.7641 13.9702C10.5338 13.9702 10.3577 14.1463 10.3577 14.3767L10.3983 16.9512C10.3983 17.1816 10.5744 17.3577 10.8048 17.3577L12.4308 17.3306C12.8102 17.3306 13.1083 17.6287 13.1219 17.9946L13.2438 25.7181C13.2574 26.4769 12.6476 27.1002 11.8888 27.1002H8.77228C3.84003 27.1002 0.899658 24.1599 0.899658 19.2141V7.87262C0.899658 2.94038 3.84003 0 8.77228 0H20.1273C25.0595 0 27.9999 2.94038 27.9999 7.87262V19.2276Z" fill="#CAB089"/>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</nav><!-- #site-navigation -->
<div class="spacer"></div>
