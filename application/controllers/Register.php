<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
  public function __construct(){
    parent::__construct();
  }
  public function index(){
    $this->load->view('manager/register');
  }
  public function create(){
    $this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'პაროლი', 'trim|required|min_length[5]|md5',
			array(
				'required' => 'პაროლის შევსება უცილებელია',
				'min_length' => 'პაროლის სიგრძე უნდა იყოს 5 სიმბოლოზე მეტი',
				)
			);
		$this->form_validation->set_rules('cf_password', 'გაიმეორეთ პაროლი', 'trim|required|md5|matches[password]',
			array(
				'required' => '%s ველის შევსება აუცილებელია',
				'matches' => 'პაროლები ერთმანეთს არ ემთხვევა'
				)
			);
		$this->form_validation->set_rules('email', 'ელ.ფოსტა', 'trim|required|valid_email|is_unique[users.email]',
			array(
				'required' => '%s ველის შევსება აუცილებელია',
				'valid_email' => 'გთხოვთ შეიყვანოთ %s სწორად',
				'is_unique' => 'მომხმარებელი მსგავსი ელ.ფოსტით უკვე დარეგისტრირებულია'
				)
			);

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' && !$this->form_validation->run() == FALSE ){
		$password 	 = $this->input->post('password');
		$email    	 = $this->input->post('email');
		$name  	 = $this->input->post('fullname');
		$data = array(
			'password' => $password,
			'email' => $email,
			'name_en' => $name,
			);
		$this->db->insert('users', $data);
		$_SESSION['message'] = 'მომხმარებელი შექმნილია!შეგიძლიათ სისტემაში შესვლა';
		$this->session->mark_as_flash('message');
    redirect('manager/login');
    }else{
      $_SESSION['message'] = validation_errors();
      $this->session->mark_as_flash('message');
      redirect('register');
    }
  }
}
