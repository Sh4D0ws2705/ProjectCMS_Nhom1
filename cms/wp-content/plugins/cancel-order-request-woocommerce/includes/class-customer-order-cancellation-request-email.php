<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly
}


if(!class_exists('WC_Email_Customer_Order_Cancel_Request')):

    class WC_Email_Customer_Order_Cancel_Request extends WC_Email {
        public $order_id;
        public $order_no;
        public $predefined_reason;
        public $cancellation_reason;
        /**
         * Constructor
         */
        function __construct() {

            $this->id = 'customer_order_cancel_request';
            $this->title = __( 'Customer Order Cancellation Request', 'cancel-order-request-woocommerce' );
            $this->description= __( 'Order cancellation request received confirmation send to the customer.', 'cancel-order-request-woocommerce' );
            $this->heading = __( 'Order cancellation request for order no. #{order_number_link} is submitted successfully', 'cancel-order-request-woocommerce' );
            $this->subject      = __( 'Order cancellation request for order no. #{order_number} is submitted successfully', 'cancel-order-request-woocommerce' );
            $this->template_base = PISOL_CORW_BASE_DIR.'/templates/';
            $this->template_html = 'emails/customer-order-cancel-request.php';
            $this->template_plain = 'emails/plain/customer-order-cancel-request.php';
            $this->customer_email = true;
	        $this->placeholders   = array(
		        '{site_title}'   => $this->get_blogname(),
		        '{order_date}'   => '',
		        '{order_number}' => '',
		        '{order_number_link}' => '',
                '{cancellation_reason}' => '',
                '{predefined_reason}' => '',
            );


            parent::__construct();
        }

        /**
         * trigger function.
         *
         * @access public
         * @return void
         */
        function trigger( $order_id ) {
	        $this->setup_locale();
            $order = wc_get_order( $order_id );
            $this->order_id = $order_id;
            $this->order_no = method_exists($order, 'get_order_number') ? $order->get_order_number() : $order->get_id();
            $this->cancellation_reason = $order->get_meta( 'order_cancel_reason', true);
            $this->predefined_reason = $order->get_meta( 'predefined_reason', true);
	        if ( is_a( $order, 'WC_Order' ) ) {
                $this->object                         = $order;
                $this->recipient                      = $this->object->get_billing_email();
		        $this->placeholders['{order_date}']   = wc_format_datetime( $this->object->get_date_created() );
                $this->placeholders['{order_number}'] = $this->object->get_order_number();
                $this->placeholders['{order_number_link}'] = sprintf('<a href="%s">%s</a>',  $this->object->get_checkout_order_received_url(), $this->object->get_order_number());
                $this->placeholders['{cancellation_reason}'] = wp_kses_post( $this->cancellation_reason );
                $this->placeholders['{predefined_reason}'] = wp_kses_post( $this->predefined_reason );  
	        }

	        if ( $this->is_enabled() && $this->get_recipient() ) {
		        $this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
	        }
	        $this->restore_locale();
        }

        /**
         * get_content_html function.
         *
         * @access public
         * @return string
         */
        function get_content_html() {

            return $this->format_string( wc_get_template_html(
                $this->template_html,
                array(
                'order' => $this->object,
                'email_heading' => $this->get_heading(),
                'sent_to_admin' => true,
                'plain_text'=>false,
                'email' => $this,
                'cancellation_reason' => $this->cancellation_reason,
                'order_no' => $this->order_no
                ),
                '',
	            $this->template_base) );

        }

        /**
         * get_content_plain function.
         *
         * @access public
         * @return string
         */
        function get_content_plain() {

            return $this->format_string( wc_get_template_html(
                $this->template_plain,
                array(
                'order' => $this->object,
                'email_heading' => $this->get_heading(),
                'sent_to_admin' => true,
                'plain_text'=>true,
                'email' => $this,
                'cancellation_reason' => $this->cancellation_reason,
                'order_no' => $this->order_no
                ),
                '',
	            $this->template_base) );

        }

        function init_form_fields() {
            $this->form_fields = array(
                'enabled' => array(
                    'title'         => __( 'Enable/Disable', 'cancel-order-request-woocommerce' ),
                    'type'          => 'checkbox',
                    'label'         => __( 'Enable this email notification', 'cancel-order-request-woocommerce' ),
                    'default'       => 'yes'
                ),
                'email_type' => array(
                    'title'         => __( 'Email type', 'cancel-order-request-woocommerce' ),
                    'type'          => 'select',
                    'description'   => __( 'Choose which format of email to send.', 'cancel-order-request-woocommerce' ),
                    'default'       => 'html',
                    'class'         => 'email_type wc-enhanced-select',
                    'options'       => $this->get_email_type_options(),
                    'desc_tip'      => true
                )
            );
        }

    }

endif;