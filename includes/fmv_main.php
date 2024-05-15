<?php

/**
 * Custom contact form class
 * 
 * @since 1.0
 * @package Form_Message_Validator
 * @category Class
 * @link https://www.linkedin.com/in/andre-ranulfo/
 */

if (!defined('ABSPATH')) {
     exit;
}

if (!defined('WPINC')) {
     exit;
}


new Custom_Contact_Form();

class Custom_Contact_Form
{

     public function __construct()
     {
          add_action('init', array($this, 'add_shortcode'));
          add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
          add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
          add_shortcode('custom_contact_form', array($this, 'display_form'));
          add_action('init', array($this, 'process_form'));
     }

     public function add_shortcode()
     {
          add_shortcode('custom_contact_form', array($this, 'display_form'));
     }
     public function enqueue_styles()
     {
          wp_enqueue_style('fmv-css', FMV_CSS . 'style.css');
     }
     public function enqueue_scripts()
     {
          wp_enqueue_script('fmv-js', FMV_JS . 'main.js', array('jquery'), null, true);
     }
     public function display_form()
     {
          ob_start();
          require(FMV_PLUGIN_DIR . 'templates/form.php');

          return ob_get_clean();
     }
     public function process_form()
     {
          if (isset($_POST['name'])) {
               $data = array(
                    'name' => sanitize_text_field($_POST['name']),
                    'email' => sanitize_email($_POST['email']),
                    'telephone' => sanitize_text_field($_POST['telephone'])
               );
               $this->save_data($data);
               $this->send_email($data);
          }


          if ($_SERVER['REQUEST_METHOD'] == 'POST') {

               $_SESSION['name'] = $_POST['name'] ? $_POST['name'] : false;
               $_SESSION['email'] = $_POST['email'] ? $_POST['email'] : false;
               $_SESSION['telephone'] = $_POST['telephone'] ? $_POST['telephone'] : false;

               $redirect_url = 'http://localhost:8888/sample-page';

     
               wp_redirect($redirect_url);
               exit;
          }
     }








     public function save_data($data)
     {

          $saved_data = get_option('fmv_data');
          if (!$saved_data) {
               $saved_data = array();
          }
          array_push($saved_data, $data);
          update_option('fmv_data', $saved_data);
     }

     public function send_email($data)
     {
          $to = get_option('admin_email');
          $subject = 'New contact form submission';
          $message = 'Name: ' . $data['name'] . "\r\n";
          $message .= 'Email: ' . $data['email'] . "\r\n";
          $message .= 'Telephone: ' . $data['telephone'] . "\r\n";
          wp_mail($to, $subject, $message);
     }
}
