<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Setup our Gateway's id, description and other values
class WC_AlphaPay_Credit_Card extends WC_Payment_Gateway{


	public function __construct(){
		// The global ID for this Payment method
		$this->id = "alphapay_credit_card";

		// The Title shown on the top of the Payment Gateways Page next to all the other Payment Gateways
		$this->method_title='AlphaPay - Credit Card';

		// The description for this Payment Gateway, shown on the actual Payment options page on the backend
		$this->method_description=sprintf( __( 'All other general AlphaPay settings can be adjusted <a href="%s">here</a>.', 'woocommerce-gateway-alphapay' ), admin_url( 'admin.php?page=wc-settings&tab=checkout&section=alphapay' ) );

		// If you want to show an image next to the gateway's name on the frontend, enter a URL to an image.
		// $this->icon = ALPHAPAY_URL. '/assets/images/credit-card-logo.png';

        $this->has_fields = false;

        $main_settings              = get_option( 'woocommerce_alphapay_settings' );

        try {
            $partner_code = AlphaPay_API::get_partner_code();
            $credential_code = AlphaPay_API::get_credential_code();
        } catch (Exception $e) {
            $partner_code = '';
            $credential_code = '';
        }
        $this->partner_code             = $partner_code;
        $this->credential_code          = $credential_code;
        $this->instructions             = ! empty( $main_settings['instructions'] ) ? $main_settings['instructions'] : '';
        $this->transport_protocols      = ! empty( $main_settings['transport_protocols'] ) ? $main_settings['transport_protocols'] : '';

		// Supports
		$this->supports[]='refunds';

		// This basically defines your settings which are then loaded with init_settings()
		$this->init_form_fields ();

		// After init_settings() is called, you can get the settings and load them into variables, e.g:
		$this->init_settings ();

		// Turn these settings into variables we can use
		foreach ( $this->settings as $setting_key => $value ) {
			$this->$setting_key = $value;
		}

		if ( is_admin() ) {
			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		}

		add_action( 'woocommerce_api_wc_alphapay_notify', array( 'AlphaPay_API', 'wc_alphapay_notify' ) );
		add_action ( 'wp_enqueue_scripts', array($this, 'my_admin_scripts' ) );
		add_action( 'woocommerce_thankyou_alphapay', array($this, 'thankyou_page') );
	}

	public function my_admin_scripts() {
		wp_register_style( 'alphapay-style', plugins_url( 'assets/css/alphapay-style.css', ALPHAPAY_FILE ), array());
		wp_enqueue_style( 'alphapay-style' );
	}

	public function get_icon() {

		$icons_str = '<img src="' . ALPHAPAY_URL . '/assets/images/credit-card-logo.png" class="right-float" alt="CreditCard" />';

		return apply_filters( 'woocommerce_gateway_icon', $icons_str, $this->id );
	}


	public function is_available() {

    $order_currency = get_woocommerce_currency();
    $cny_request_currency = AlphaPay_API::get_currency();
    if($order_currency != 'CAD') {
        return false;
    }

		if(!$this->partner_code || !$this->credential_code ){
			return false;
		}

		if($this->enabled == 'no'){
			return false;
		}

		return $this->enabled;
	}


	function init_form_fields() {
		$this->form_fields = array (
				'enabled' => array (
						'title' => 'Enable/Disable',
						'type' => 'checkbox',
						'label' =>'Enable AlphaPay - Credit Card',
						'default' => 'no',
						'section'=>'default'
				),
				'title' => array (
						'title' => 'Title',
						'type' => 'text',
						'default' =>  'Credit Card',
						'desc_tip' => true,
						'css' => 'width:400px',
						'section'=>'default'
				),
				'description' => array (
						'title' => 'Description',
						'type' => 'textarea',
						'default' => 'Pay with your Credit Card',
						'desc_tip' => true,
						'css' => 'width:400px',
						'section'=>'default'
				)


			);
	}


	/**
	 * Output for the order received page.
	 */
	public function thankyou_page() {
		if ( $this->instructions ) {
			echo wpautop( wptexturize( $this->instructions ) );
		}
	}

	public  function is_wechat_client(){
		return strripos($_SERVER['HTTP_USER_AGENT'],'micromessenger')!=false;
	}

	public  function isIOS(){
	    $ua =$_SERVER['HTTP_USER_AGENT'];
	    return strripos($ua,'iphone')!=false||strripos($ua,'ipad')!=false;
	}

	public function is_app_client(){
	    if(!isset($_SERVER['HTTP_USER_AGENT'])){
			return false;
		}

		$u=strtolower($_SERVER['HTTP_USER_AGENT']);
		if($u==null||strlen($u)==0){
			return false;
		}

		preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/',$u,$res);

		if($res&&count($res)>0){
			return true;
		}

		if(strlen($u)<4){
			return false;
		}

		preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/',substr($u,0,4),$res);
		if($res&&count($res)>0){
			return true;
		}

		$ipadchar = "/(ipad|ipad2)/i";
		preg_match($ipadchar,$u,$res);
		if($res&&count($res)>0){
			return true;
		}

		return false;
	}


	/**
	 * Add content to the WC emails.
	 *
	 * @access public
	 * @param WC_Order $order
	 * @param bool $sent_to_admin
	 * @param bool $plain_text
	 */
	public function email_instructions( $order, $sent_to_admin, $plain_text = false ) {
	    $method = method_exists($order ,'get_payment_method')?$order->get_payment_method():$order->payment_method;
		if ( $this->instructions && ! $sent_to_admin && $this->id === $method ) {
			echo wpautop( wptexturize( $this->instructions ) ) . PHP_EOL;
		}
	}



	public function process_payment($order_id){
		$order = new WC_Order($order_id);
		if(!$order||!$order->needs_payment()){
			return array(
	             'result'   => 'success',
	             'redirect' => $this->get_return_url($order)
	         );
		}

		$partner_code = $this->partner_code;
		$credential_code = $this->credential_code;


		try {
			$result = AlphaPay_API::generate_alphapay_order($order,'CreditCard',"/api/v1.0/pay/thirdCard/%s/preOrder");

			$time=time().'000';
			$nonce_str = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0,10);
			$valid_string="$partner_code&$time&$nonce_str&$credential_code";
			$sign=strtolower(hash('sha256',$valid_string));


			return array(
				'result'   => 'success',
				'redirect' =>$result->pay_url.(strpos($result->pay_url, '?')==false?'?':'&')."time=$time&nonce_str=$nonce_str&sign=$sign&redirect=".urlencode($this->get_return_url($order))
			);

		} catch (Exception $e) {
			throw $e;
		}

	}


	public function process_refund( $order_id, $amount = null, $reason = ''){
		$order = new WC_Order ($order_id );
		if(!$order){
			return new WP_Error( 'invalid_order', 'Wrong Order' );
		}

		$total = ( int ) ($order->get_total () * 100);
		$amount = ( int ) ($amount * 100);
		if($amount<=0||$amount>$total){
			return new WP_Error( 'invalid_order','Invalid Amount ');
		}

		$ooid = get_post_meta($order_id, 'alphapay_order_id',true);
		$refund_id=time();


		if($amount == $total){
			// check real fee of order (include service charge)
			$queryresult = AlphaPay_API::query_order_status($ooid);
			$amount = $queryresult->real_fee;
		}

		$resArr = AlphaPay_API::alphapay_refund($amount,$ooid,$refund_id);

		$partner_refund_id = "";
		$partner_refund_id = $resArr->partner_refund_id;


		if(!$resArr){
			return new WP_Error( 'refuse_error', $result);
		}

		//Check if refund status is waiting, if yes, check again until status changes
    if($resArr->result_code == 'WAITING') {

      do{
        $refundResult = AlphaPay_API::query_refund_status($ooid, $partner_refund_id);

        if($refundResult->result_code == 'FINISHED') {
          return true;
        }

        sleep(5); // Make it sleep 5 seconds so as to not spam the server
      }
      while($refundResult->result_code == 'WAITING');
    }

		if($resArr->result_code!='SUCCESS' && $resArr->result_code!='FINISHED'){
			return new WP_Error( 'refuse_error', sprintf('ERROR CODE:%s',empty($resArr->result_code)?$resArr->return_code:$resArr->result_code));
		}
		return true;
	}


}
