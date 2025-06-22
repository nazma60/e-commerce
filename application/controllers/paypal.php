<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller
{

    /*public function Paypal() {
        parent::Controller();
        $this->load->model( 'items_model', 'Item' );
        $this->load->library( 'Paypal_Lib' );
        $data['site_name'] = $this->config->item( 'site_name' );
        $this->load->vars( $data );
    }*/
    public function __construct()
    {
        parent:: __construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->model('items_model', 'Item');
        $this->load->library('Paypal_Lib');
        $data['site_name'] = $this->config->item('site_name');
        $this->load->vars($data);
    }

    public function index()
    {
        redirect('shopping');
    }

    public function success()
    {
        $this->session->set_flashdata('success', 'Your payment is being processed now.');
        redirect('shopping');
    }

    public function cancel()
    {
        $this->session->set_flashdata('success', 'Payment cancelled.');
        redirect('shopping');
    }

   /* public function ipn()
    {
        if ($this->paypal_lib->validate_ipn()) {

            $payer_email = $this->paypal_lib->ipn_data['payer_email'];
            $key = $this->paypal_lib->ipn_data['transaction_subject'];
            $this->Item->confirm_payment($key, $payer_email);
            $purchase = $this->Item->get_purchase_by_key($key);
            $item = $this->Item->get($purchase->order_id);


            $to = $purchase->email;
            $from = $this->config->item('no_reply_email');
            $name = $this->config->item('site_name');

            $segments = array('item', url_title($item->Serial, 'dash', true), $item->id);
            $message = '<p>Thanks for purchasing ' . anchor($segments, $item->Serial) . ' from ' . anchor('', $name) . '. Your download link is below.</p>';*/
            /*$message .= '<p>' . anchor( 'download/' . $key ) . '</p>';*/

           /* $this->email->from($from, $name);
            $this->email->to($to);

            $this->email->message($message);
            $this->email->send();
            $this->email->clear();

            // Send confirmation of purchase to admin
            $message = '<p><strong>New Purchase:</strong></p><ul>';
            $message .= '<li><strong>Item:</strong> ' . anchor($segments, $item->Serial) . '</li>';
            $message .= '<li><strong>Price:</strong> $' . $item->Sum . '</li>';
            $message .= '<li><strong>Email:</strong> ' . $purchase->email . '</li><li></li>';
            $message .= '<li><strong>PayPal Email:</strong> ' . $payer_email . '</li>';
            $this->email->from($from, $name);
            $this->email->to($this->config->item('admin_email'));
            $this->email->subject('A purchase has been made');
            $this->email->message($message);
            $this->email->send();
            $this->email->clear();
        }
    }*/
}