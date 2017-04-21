<?php

/*
* SMTP
*
* @package   DjWysh SMTP
* @author    Michael Mizner<mike@miznerism.com>
* @license   GPL-2.0+
* @link      http://miznerism.com
* @copyright 2015 Michael Mizner
*
* @wordpress-plugin
* Plugin Name:       DjWysh SMTP
* Plugin URI:        http://miznerism.com
* Description:       Simple PHPMailer Plugin for SMTP
* Version:           1.0
* Author:            Michael Mizner
* Author URI:        http://miznerism.com
* Text Domain:       smtp
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/

add_action( 'phpmailer_init', 'my_phpmailer_knoxweb' );
function my_phpmailer_knoxweb( $phpmailer ) {
    $postmark_api = '57b0da66-1087-4822-8f5e-4515b6b03342';
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
