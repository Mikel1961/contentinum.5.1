<?php


/**
 * Installation path (/var/www/tcpdf/).
 * By default it is automatically calculated but you can also set it as a fixed string to improve performances.
 */
define ('K_PATH_MAIN', CON_ROOT_PATH . '/data/usr/tcpdf/');

/**
 * URL path to tcpdf installation folder (http://localhost/tcpdf/).
 * By default it is automatically set but you can also set it as a fixed string to improve performances.
 */
//define ('K_PATH_URL', '');

/**
 * Path for PDF fonts.
 * By default it is automatically set but you can also set it as a fixed string to improve performances.
 */
define ('K_PATH_FONTS', K_PATH_MAIN.'fonts/');


/**
 * Cache directory for temporary files (full path).
 */
define ('K_PATH_CACHE',CON_ROOT_PATH . '/temp/');

/**
 * Set to true to enable the special procedure used to avoid the overlappind of symbols on Thai language.
*/
define('K_THAI_TOPCHARS', true);

/**
 * If true allows to call TCPDF methods using HTML syntax
 * IMPORTANT: For security reason, disable this feature if you are printing user HTML content.
*/
define('K_TCPDF_CALLS_IN_HTML', false);

/**
 * If true and PHP version is greater than 5, then the Error() method throw new exception instead of terminating the execution.
*/
define('K_TCPDF_THROW_EXCEPTION_ERROR', false);

/**
 * Default timezone for datetime functions
*/
define('K_TIMEZONE', 'UTC');