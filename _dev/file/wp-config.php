<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

define( 'ITSEC_ENCRYPTION_KEY', 'Nz14KWUsX0pLdW5dd01OVj14SSpxQCEje1QvM25pdVE/TyV0UEsxSDp3SSp1c0R8NmtXbyRQc1ktbEBXZ3FoZA==' );

/**
 * #ddev-generated: Automatically generated WordPress settings file.
 * ddev manages this file and may delete or overwrite the file unless this comment is removed.
 * It is recommended that you leave this file alone.
 *
 * @package ddevapp
 */

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/** Authentication Unique Keys and Salts. */
define( 'AUTH_KEY', 'UYstulSJZAakZwdRanNEithDXNQrMrVVKppAKQffgvppMAWQDXazMENUpqiEqmKv' );
define( 'SECURE_AUTH_KEY', 'KTqAQhhixTxNLiVHruLvcsiHkRiFxzJUbQTEnFYGVwGOPPXbJfpKypKCTpFLTbLX' );
define( 'LOGGED_IN_KEY', 'JlMNBSlmUsiAzHkOXtzFCCgmXPVdUZhMSARSrObjHOFKwVWzrwVZNVyvEtxMFImX' );
define( 'NONCE_KEY', 'eoPwOirxKMaTxLPygAoREjdtVFWkzvOPIlkLuldvpkSeYyRBeBIqNpMULiejaKfw' );
define( 'AUTH_SALT', 'GPilgbbayzAHPdpdJHbvxdezultVyoqzzqSjMYtBdnsMOKvkcKWmfmJqjMSMSXjq' );
define( 'SECURE_AUTH_SALT', 'zGUsitnDeaLyTScuzLPNCVIsgezMvUERXtRRLPahhoXODcvIjPslpWcbjOWyoouP' );
define( 'LOGGED_IN_SALT', 'FDcREWHNIQqgjHscDMFJWmlGiOhqRAlSmQhAXknkHDRUvWKAcwLkBUHQwhuohaHC' );
define( 'NONCE_SALT', 'bAntZGrFhZlFJbpdAQhmDmqqLWxdAYlQuGSmMCaoUybbIVrmXePsCoVwndORWYgo' );

/** Absolute path to the WordPress directory. */
defined( 'ABSPATH' ) || define( 'ABSPATH', dirname( __FILE__ ) . '/' );

// Include for settings managed by ddev.
$ddev_settings = dirname( __FILE__ ) . '/wp-config-ddev.php';
if ( ! defined( 'DB_USER' ) && getenv( 'IS_DDEV_PROJECT' ) == 'true' && is_readable( $ddev_settings ) ) {
	require_once( $ddev_settings );
}

/** Include wp-settings.php */
if ( file_exists( ABSPATH . '/wp-settings.php' ) ) {
	require_once ABSPATH . '/wp-settings.php';
}
