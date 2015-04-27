<?php
	session_start();
	Class User_Auth extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form'); //load form helper
			$this->load->library('form_validation'); //load form validation library
			$this->load->library('session'); //load session library
			$this->load->model('store_db'); //load database			
		}
		
		public function login(){ //show login page
			$this->load->view('templates/header');
			$this->load->view('people/login');
			$this->load->view('templates/footer');
		}
		
		public function register(){ //show registration page
			$data = array(
			'name' => '',
			'mobile_phone' => '',
			'birthday' => '',
			'email_value' => '',
			'password' => '',
			'repassword' => ''
			);
			$this->load->view('templates/header');
			$this->load->view('people/register', $data);			
			$this->load->view('templates/footer');
		}
		
		public function new_user_reg(){ //validate registration data
			$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required|css_clean');
			$this->form_validation->set_rules('mobile_phone', 'Nomor HP', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthday', 'Tanggal Lahir', 'callback_checkDateFormat');
			$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Kata sandi', 'trim|required|xss_clean');
			// Check date format, if input date is valid return TRUE else returned FALSE.
			function checkDateFormat($date) {
			if (preg_match("/[0-31]{2}\/[0-12]{2}\/[0-9]{4}/", $date)) {
			if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
			return true;
			else
			return false;
			} else {
			return false;
			}
			}
			$data = array(
			'name' => $this->input->post('name'),
			'mobile_phone' => $this->input->post('mobile_phone'),
			'birthday' => $this->input->post('birthday'),
			'email_value' => $this->input->post('email_value'),
			'password' => $this->input->post('password'),
			'repassword' => $this->input->post('repassword'),
			'privilege' => '1',
			'status' => '1'
			);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/header');
				$this->load->view('people/register', $data);
				$this->load->view('templates/footer');
			} else {
			if($this->input->post('password') !== $this->input->post('repassword')){
				$data['pword_error'] = 'Kata sandi tidak sama';
				$this->load->view('templates/header');
				$this->load->view('people/register', $data);
				$this->load->view('templates/footer');				
			} else
				$result = $this->store_db->reg_insert_user($data);
				if($result == TRUE){
					$data['message_display'] = 'Registration Successfully!';
					$this->load->view('templates/header');
					$this->load->view('people/login', $data);
					$this->load->view('templates/footer');
				} else {
					$data['message_display'] = 'Email sudah digunakan!';
					$this->load->view('templates/header');
					$this->load->view('people/register', $data);
					$this->load->view('templates/footer');
				}
			}
		}
		
		public function user_login_process(){ //check user login
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/header');
				$this->load->view('login_form');
				$this->load->view('templates/footer');
			} else {
				$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
				$result = $this->store_db->login($data);
				if($result == TRUE){
					$this->home();
					/*
					$sess_array = array(
					'username' => $this->input->post('username')
					);
					
					//add user data session
					$this->session->set_userdata('logged_in', $sess_array);
					$result = $this->store_db->read_user_info($sess_array);
					if($result != false){
						$data = array(
						'user_id' =>$result[0]->user_id,
						'username' =>$result[0]->username,
						'password' =>$result[0]->password,
						'created_time' =>$result[0]->created_time
						);
						$this->load->view('templates/header');
						$this->load->view('people/home', $result[0]);
						$this->load->view('templates/footer');
					}*/
				} else {
					$data = array('error_message' => 'Invalid Username or Password');
					$this->load->view('templates/header');
					$this->load->view('people/login', $data);
					$this->load->view('templates/footer');
				}
			}
		}
		
		public function home(){
			$data = $this->session->userdata('logged_in');
			if($data['username'] == ''){		
				return $this->logged_out();
			} else {
				$result = $this->store_db->read_user_info($data);
				if($result != false){
					$this->load->view('templates/header');
					$this->load->view('people/home', $result[0]);
					$this->load->view('templates/footer');
				} 		
			}
		}
		
		public function logged_out(){ //logout
			$sess_array = array('username' => ''); //remove session data
			$this->session->unset_userdata('logged_in', $sess_array);
			$this->load->view('templates/header');
			$this->load->view('people/login');
			$this->load->view('templates/footer');
		}
		
		public function logout(){ //logout
			$sess_array = array('username' => ''); //remove session data
			$this->session->unset_userdata('logged_in', $sess_array);
			$data['message_display'] = 'Successfully logout';
			$this->load->view('templates/header');
			$this->load->view('people/login', $data);
			$this->load->view('templates/footer');
		}
	}
?>