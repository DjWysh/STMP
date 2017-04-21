<?php

/*
* SMTP
*
* @package   DjWysh SMTP - Postmark
* @author    Dj Wysh<djwysh@gmail.com>
* @license   GPL-2.0+
* @link      http://djwysh.rocks
* @copyright 2017 Dj Wysh
*
* @wordpress-plugin
* Plugin Name:       DjWysh SMTP - Postmark
* Plugin URI:        http://djwysh.rocks
* Description:       Simple PHPMailer Plugin for SMTP
* Version:           1.0
* Author:            Dj Wysh
* Author URI:        http://djwysh.rocks
* Text Domain:       smtp
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/

add_action( 'phpmailer_init', 'my_phpmailer_knoxweb' );
function my_phpmailer_knoxweb( $phpmailer ) {
    $postmark_api = 'dee5e5c2-b1fa-473e-b68f-b7dbc9065bf3';
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.postmarkapp.com';
    $phpmailer->SMTPAuth = true; // Force it to use Username and Password to authenticate
    $phpmailer->Port = 2525;
    $phpmailer->Username = $postmark_api;
    $phpmailer->Password = $postmark_api;

    // Additional settings…
    //$phpmailer->SMTPSecure = "SSL"; // Choose SSL or TLS, if necessary for your server
    $phpmailer->From = "no-reply@knoxweb.com";
    $phpmailer->FromName = get_bloginfo('name');
}

// ** EMAIL: FORCE HTML **
// -- forces email to send as html
add_filter( 'wp_mail_content_type', function( $content_type ) {
    return 'text/html';
});
