<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require 'system/third_party/phpmailer/PHPMailer.php';
require 'system/third_party/phpmailer/SMTP.php';
require 'system/third_party/phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Email Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/email_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Validate email address
 *
 * @access	public
 * @return	bool
 */
if (!function_exists('valid_email')) {
	function valid_email($address)
	{
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $address)) ? FALSE : TRUE;
	}
}

// ------------------------------------------------------------------------

/**
 * Send an email
 *
 * @access	public
 * @return	bool
 */
if (!function_exists('send_email')) {
	function send_email($recepient_name, $recepient_email, $subject, $message, $sender_name, $sender_username, $sender_password)
	{
		// Create a new PHPMailer instance
		$mail = new PHPMailer(true);

		try {
			// SMTP configuration for Gmail
			$mail->isSMTP();
			$mail->Host       = 'smtp.gmail.com';
			$mail->SMTPAuth   = true;
			$mail->Username   = $sender_username;
			$mail->Password   = $sender_password;
			$mail->SMTPSecure = 'tls';
			$mail->Port       = 587;
			$mail->isHTML(true);
			$mail->setFrom($sender_username, $sender_name);
			$mail->addAddress($recepient_email, $recepient_name);
			$mail->Subject = $subject;
			$mail->Body = $message;

			// Send the email
			$mail->send();

			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}


/* End of file email_helper.php */
/* Location: ./system/helpers/email_helper.php */