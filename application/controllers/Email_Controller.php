<?php 
   class Email_controller extends CI_Controller { 
 
      function __construct() { 
         parent::__construct(); 
         $this->load->library('session'); 
         $this->load->helper('form'); 
      } 
		
      public function index() { 
	
         $this->load->helper('form'); 
         $this->load->view('email_form'); 
      } 
  
      // public function send_mail() { 
      //    $from_email = "agindo093ramadhan@gmail.com"; 
      //    $to_email = $this->input->post('email'); 
   
      //    //Load email library 
      //    $this->load->library('email'); 
   
      //    $this->email->from($from_email, 'Agindo'); 
      //    $this->email->to($to_email);
      //    $this->email->subject('Email Test'); 
      //    $this->email->message('Testing the email class.'); 
   
      //    //Send mail 
      //    if($this->email->send()) 
      //    $this->session->set_flashdata("email_sent","Email sent successfully."); 
      //    else 
      //    $this->session->set_flashdata("email_sent","Error in sending Email."); 
      //    $this->load->view('email_form'); 
      // }

      function send_mail(){
         $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'ramadhanagindo@gmail.com', // change it to yours
            'smtp_pass' => 'p@ssIsblu3', // change it to yours
            //'smtp_user' => 'agindo093ramadhan@gmail.com', // change it to yours
            //'smtp_pass' => 'p@ssisblu3', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
         );

         $message = 'email_sent","Email sent successfully';
         $this->load->library('email', $config);
         $this->email->set_newline("\r\n");
         $this->email->from('ramadhanagindo@gmail.com'); // change it to yours
         $this->email->to($this->input->post('email'));// change it to yours
         $this->email->subject('Resume from JobsBuddy for your Job posting');
         $this->email->message($message);
         if($this->email->send()){
            echo 'Email sent';
         }else{
            show_error($this->email->print_debugger());
         }

      } 
   } 
?>