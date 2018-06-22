<?php


class Email extends CI_Model
{
	public function sent_email($name,$lastname,$email,$tel)
	{
		$config = Array(
  				'protocol' => 'smtp',
  				'smtp_host' => 'ssl://smtp.googlemail.com',
  				'smtp_port' => 465,
  				'smtp_user' => 'anuchit.psu@gmail.com',
 			    'smtp_pass' => 'moominburnbim.mm',
                'mailtype' => 'html',
                'charset' => 'tis620_thai_ci',
                'wordwrap' => TRUE
);
	     $this->load->library('email', $config); 
         $this->email->set_newline("\r\n");
         $this->email->from('anuchit.psu@gmail.com');
         $this->email->to($email);
         $this->email->subject('Infomation'); 
         $this->email->message($name.' '.$lastname.' '.$email.' '.$tel); 
        if($this->email->send()) {
            return true; 
        }
         else {
         	return false;
        }
	}
	
}

?>