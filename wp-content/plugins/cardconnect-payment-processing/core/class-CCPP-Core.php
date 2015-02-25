<?php
/**
 * =======================================
 * CardConnect Payment Processing
 * =======================================
 * 
 * 
 * @author Matt Keys <matt@mattkeys.me>
 */

if ( ! defined( 'CCPP_PLUGIN_FILE' ) ) {
	die();
}

class CCPP_Core
{
	static $pages;
	static $client_email;

	/**
	 *	Register all of our action hooks and filters
	 */
	public function init()
	{
		add_action( 'init', array( $this, 'config' ), 0 );
		add_action( 'init', array( $this, 'route_response' ), 1 );
		add_filter( 'page_template', array( $this, 'load_template' ) );
	}

	/**
	 *	All required plugin configuration settings
	 */
	public static function config()
	{
		// Are we in test mode? true = yes, false = no
		$test_mode = true;

		// Define the email notification settings
		self::$client_email = 'matt@mattkeys.me';

		// Define all the pages used by this plugin
		self::$pages = array(
			'make-a-payment' => array(
				'title' => 'Make a Payment',
				'template' => CCPP_PLUGIN_DIR . '/templates/make-a-payment.php'
			),
			'thank-you' => array(
				'title' => 'Payment Successful',
				'template' => CCPP_PLUGIN_DIR . '/templates/thank-you.php'
			),
			'payment-error' => array(
				'title' => 'Payment Error',
				'template' => CCPP_PLUGIN_DIR . '/templates/payment-error.php'
			)
		);

		// Define our CardConnect Information
		define( 'CCPP_SUCCESS_URL', home_url( '/?cardconnect=true' ) );

		if ( $test_mode ) {
			define( 'CCPP_POST_URL', 'https://securepaymentstest.cardconnect.com/hpp/payment/' );
			define( 'CCPP_ID', 'I2iP4irvKDM8MMN/RUnJY3cZn+tYF7arGdXVfzxeCESnFOsajsIcBEejW2tGwpzich5BTnLQ/lsAmzHlxh0X1efWqiyrKLe/jyZRWrcauMcwgNHhauIriWTxDvhIbJ2Fq6thni9sogy44RHvtV65KU23ghVjx6bzQ1ew4aFclbo=' );
		} else {
			define( 'CCPP_POST_URL', 'https://securepayments.cardconnect.com/hpp/payment/' );
			define( 'CCPP_ID', 'cvOKhVtJeFUH347D7XXL/tWymEyFjvsFYmhYgbnNBeBUgzLYGnv6Y6TP2jKRULLmUXeG+HrMAdP1L2Gfs8pT4L9snUzhuuePJTassZvgqTAJPhAWWYkiyMXo6mraHwDWjVucKxuhqDn9yuuuVboJ8RvkjL3nIHqqoWBLssWY2XE=' );
		}
	}

	/**
	 *	Receives response from CardConnect and routes user to the success or failure page
	 */
	public function route_response()
	{
		if ( ! isset( $_GET['cardconnect'] ) ) {
			return;
		}

		// Make sure this URL contains a response from CardConnect
		if ( ! isset( $_POST['errorCode'] ) ) {
			wp_redirect( home_url() );
			exit;
		}

		$transaction_details = array(
			'trans_id'	=> ( isset( $_POST['retref'] ) ) ? $_POST['retref'] : 'N/A',
			'amount'	=> ( isset( $_POST['amount'] ) ) ? $_POST['amount'] : 'N/A',
			'ccnum'		=> ( isset( $_POST['masked'] ) ) ? $_POST['masked'] : 'N/A',
			'ccexp'		=> ( isset( $_POST['expiry'] ) ) ? $_POST['expiry'] : 'N/A',
			'errorcode'	=> ( isset( $_POST['errorCode'] ) ) ? $_POST['errorCode'] : 'N/A',
			'errordesc'	=> ( isset( $_POST['errorDesc'] ) ) ? $_POST['errorDesc'] : 'N/A'
		);

		// We have a failed transation
		if ( $_POST['errorCode'] !== '00' ) {
			$this->payment_notification( $_POST, 'failure' );

			$error_url = add_query_arg( array( 'td' => urlencode( base64_encode( json_encode( $transaction_details ) ) ) ), home_url( 'payment-error' ) );
			wp_redirect( $error_url );
			exit;
		}

		// We have a successful transation
		$this->payment_notification( $_POST, 'success' );

		$success_url = add_query_arg( array( 'td' => urlencode( base64_encode( json_encode( $transaction_details ) ) ) ), home_url( 'thank-you' ) );
		wp_redirect( $success_url );
		exit;
	}

	/**
	 *	Directs wordpress to load the proper template for each of our pages
	 */
	public function load_template( $page_template )
	{
		$slug = basename( get_permalink() );

		if ( $slug && isset( self::$pages[ $slug ] ) ) {
			$page_template = self::$pages[ $slug ]['template'];
		}
		
		return $page_template;
	}

	/**
	 *	Emails the client to notify them of the status of any new payments
	 */
	public function payment_notification( $payment_details, $payment_status )
	{
		switch ( $payment_status) {
			case 'success':
				$subject = 'CardConnect Successful Payment';
				$message = '<p>A successful payment has been processed on DNAPain.com.</p>';
				$message .= '<p>Payment Information: <br /><br />';
				$message .= 'Transaction ID: ' . $payment_details['retref'] . '<br />';
				$message .= 'Amount: ' . $payment_details['amount'] . '<br />';
				$message .= 'Name: ' . $payment_details['cardholderName'] . '<br />';
				$message .= 'Street: ' . $payment_details['address'] . ' ' . $payment_details['address2'] . '<br />';
				$message .= 'City: ' . $payment_details['city'] . '<br />';
				$message .= 'State: ' . $payment_details['state'] . '<br />';
				$message .= 'Zip: ' . $payment_details['zip'] . '</p>';
				break;
			
			default:
				$subject = 'CardConnect Failed Payment';
				$message = '<p>A payment has been attempted on DNAPain.com but the payment was not successful.</p>';
				$message .= '<p>Payment Information: <br /><br />';
				$message .= 'Transaction ID: ' . $payment_details['retref'] . '<br />';
				$message .= 'Error Code: ' . $payment_details['errorCode'] . '<br />';
				$message .= 'Error Description: ' . $payment_details['errorDesc'] . '<br />';
				$message .= 'Amount: ' . $payment_details['amount'] . '<br />';
				$message .= 'Name: ' . $payment_details['cardholderName'] . '<br />';
				$message .= 'Street: ' . $payment_details['address'] . ' ' . $payment_details['address2'] . '<br />';
				$message .= 'City: ' . $payment_details['city'] . '<br />';
				$message .= 'State: ' . $payment_details['state'] . '<br />';
				$message .= 'Zip: ' . $payment_details['zip'] . '</p>';
				break;
		}

		wp_mail( self::$client_email, $subject, $message, array('Content-Type: text/html; charset=UTF-8') );
	}

	/**
	 *	Fires once during plugin activation to create any missing pages
	 */
	public static function create_pages()
	{
		self::config();

		foreach ( self::$pages as $slug => $details ) {
			if ( get_page_by_path( $slug ) ) {
				continue;
			}

			$args = array(
				'post_title'    => $details['title'],
				'post_name'		=> $slug,
				'post_content'  => '',
				'post_status'   => 'publish',
				'post_type'		=> 'page'
			);
			wp_insert_post( $args );
		}
	}

}

add_action(	'plugins_loaded', array( new CCPP_Core, 'init' ) );
register_activation_hook( CCPP_PLUGIN_FILE, array( 'CCPP_Core', 'create_pages' ) );
