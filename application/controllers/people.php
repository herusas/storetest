<?php
	session_start();
	Class People extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form'); //load form helper
			$this->load->library('form_validation'); //load form validation library
			$this->load->library('session'); //load session library
			$this->load->model('store_db'); //load database			
		}
//Address
		public function address(){
			$data = $this->session->userdata('logged_in');
			$list = false;
			$data['name'] = '';
			if($data['username'] == ''){	
				$data_header['logged_in'] = false;	
				return $this->logged_out();
			} else {
				$data_header['logged_in'] = true;
				$result = $this->store_db->get_user_id($data);
				$result = (array)$result[0];
				if($result != false){
					$data['name'] = $this->store_db->get_user_fullname($result)[0]['name'];
					$result = $this->store_db->get_user_address($result);
					if($result != false){
						$data['result'] = $result;
						$list = true;
					}
				}
			}
			if($list == false){
				$data['result'] = '';
			}
			
			$this->load->view('templates/header');
			$this->load->view('people/people_header', $data_header);
			$this->load->view('people/sidebar');
			$this->load->view('people/address', $data);
			$this->load->view('people/people_footer');
			$this->load->view('templates/footer');
		}
		
		public function address_new(){			
			$data = $this->session->userdata('logged_in');
			if($data['username'] == ''){		
				return $this->logged_out();
			} else {
				$uid = $this->store_db->get_user_id($data);
				if($this->input->post('uid') != ''){
					$this->form_validation->set_rules('alias', 'Simpan sebagai', 'trim|required|xss_clean');
					$this->form_validation->set_rules('receiver_name', 'Nama Penerima', 'trim|required|xss_clean');
					$this->form_validation->set_rules('address', 'Alamat', 'trim|required|xss_clean');
					$this->form_validation->set_rules('post_code', 'Kode Pos', 'trim|required|xss_clean');
					//$this->form_validation->set_rules('country_code', 'Negara', 'trim|required|xss_clean');
					$this->form_validation->set_rules('province_code', 'Provinsi', 'trim|required|xss_clean');
					$this->form_validation->set_rules('city_code', 'Kota/Kabupaten', 'trim|required|xss_clean');
					$this->form_validation->set_rules('district_code', 'Kecamatan', 'trim|required|xss_clean');
					$this->form_validation->set_rules('phone_number', 'Nomor Telepon', 'trim|required|xss_clean');
					
					$data = array(
						'user_id' => $this->input->post('uid'),
						'alias' => $this->input->post('alias'),
						'receiver_name' => $this->input->post('receiver_name'),
						'address' => $this->input->post('address'),
						'post_code' => $this->input->post('post_code'),
						'country_code' => $this->input->post('country_code'),
						'province_code' => $this->input->post('province_code'),
						'city_code' => $this->input->post('city_code'),
						'district_code' => $this->input->post('district_code'),
						'phone_number' => $this->input->post('phone_number')
					);
					if($this->form_validation->run() == FALSE){
						$updated = false;
					}
					else {
						$updated = $this->store_db->new_user_address($data);
					}
					
				}
				else {
					$data = array(
						'user_id' => $uid[0]['user_id'],
						'alias' => '',
						'receiver_name' => '',
						'address' => '',
						'post_code' => '',
						'country_code' => '107',
						'province_code' => '',
						'city_code' => '',
						'district_code' => '',
						'phone_number' => ''
					);
					$updated = false;
				}
				
				
				if($updated == false){
				
					$data['province_list'] = $this->store_db->get_address_list('107', 1);
					$data['city_list'] = $this->store_db->get_address_list($data['province_code'], 2);
					$data['district_list'] = $this->store_db->get_address_list($data['city_code'], 3) ;
					
					$data['message_display'] = ($updated) ? 'Anda berhasil mengubah password' : '';
					$data['message_error'] = (isset($passcheck) && !$passcheck) ? 'Kata Sandi tidak benar' : '';
					
					$this->load->view('templates/header');
					$this->load->view('people/address_new', $data);
					$this->load->view('templates/footer');
				} 		
				else redirect('people/address', 'refresh');
			}
		}
		
		public function get_address(){
			$data = array();
			if($this->input->get('province_code') != '')
				$data['options'] = $this->store_db->get_address_list($this->input->get('province_code'), 2);	//die(print_r($data['options']));		
			if($this->input->get('city_code') != '')
				$data['options'] = $this->store_db->get_address_list($this->input->get('city_code'), 3);
			$this->load->view('people/get_address', $data);
		}
//Bank	
		public function bank(){
			$data = $this->session->userdata('logged_in');
			$list = false;
			$data['name'] = '';
			if($data['username'] == ''){		
				$data_header['logged_in'] = false;
				return $this->logged_out();
			} else {
				$data_header['logged_in'] = true;
				$result = $this->store_db->get_user_id($data);
				$result = (array)$result[0];
				if($result != false){
					$data['result'] = $this->store_db->get_user_bank_account($result);
					$data['name'] = $this->store_db->get_user_fullname($result)[0]['name'];
					if($data != false){
						$list = true;
					}
				}
			}
			if($list == false){
				$data['result'] = '';
			}//die(print_r($data));
			$this->load->view('templates/header');
			$this->load->view('people/people_header', $data_header);
			$this->load->view('people/sidebar');
			$this->load->view('people/bank', $data);
			$this->load->view('people/people_footer');
			$this->load->view('templates/footer');
			
		}
		
		public function bank_new(){			
			$data = $this->session->userdata('logged_in');
			if($data['username'] == ''){		
				return $this->logged_out();
			} else {
				$uid = $this->store_db->get_user_id($data);
				if($this->input->post('uid') != ''){
					$this->form_validation->set_rules('account_name', 'Nama Akun', 'trim|required|xss_clean');
					$this->form_validation->set_rules('account_number', 'Nomor Rekening', 'trim|required|xss_clean');
					$this->form_validation->set_rules('bank_id', 'Nama Bank', 'trim|required|xss_clean');
					$this->form_validation->set_rules('account_branch', 'Cabang', 'trim|required|xss_clean');
					$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required|xss_clean');
					
					$data_update = array(
						'user_id' => $this->input->post('uid'),
						'account_name' => $this->input->post('account_name'),
						'account_number' => $this->input->post('account_number'),
						'bank_id' => $this->input->post('bank_id'),
						'account_branch' => $this->input->post('account_branch')
					);
					
					if($this->form_validation->run() == FALSE){
						$updated = false;					
					}
					else {
						$data['password'] = $this->input->post('password');
						//die(print_r($data_update));
						$passcheck = $this->store_db->login($data);
						if($passcheck == TRUE){
							$updated = $this->store_db->new_user_bank_account($data_update);
						} else {
							$passcheck = false;
							$updated = false;
						}
					}
					$data = $data_update;
				}
				else {
					$data = array(
						'user_id' => $uid[0]['user_id'],
						'account_name' => '',
						'account_number' => '',
						'bank_id' => '',
						'account_branch' => ''
					);
					$updated = false;
				}
				
				
				if($updated == false){
				
					$data['bank_list'] = $this->store_db->get_bank_account_list();
					
					$data['message_display'] = ($updated) ? 'Anda berhasil mengubah password' : '';
					$data['message_error'] = (isset($passcheck) && !$passcheck) ? 'Kata Sandi tidak benar' : '';
					
					$this->load->view('templates/header');
					$this->load->view('people/bank_new', $data);
					$this->load->view('templates/footer');
				} 		
				else redirect('people/bank', 'refresh');
			}
		}
//Biodata		
		public function change_email(){			
			$data = $this->session->userdata('logged_in');
			if($data['username'] == ''){		
				return $this->logged_out();
			} else {
				if($this->input->post('uid') != ''){
					$data_update = array(
						'user_id' => $this->input->post('uid'),
						'old_email' => $this->input->post('old_email'),
						'new_email' => $this->input->post('new_email')
					);
					$data['password'] = $this->input->post('password');
					//die(print_r($data_update));
					$passcheck = $this->store_db->login($data);
					if($passcheck == TRUE){
						$updated = $this->store_db->update_user_email($data_update);
					} else {
						$passcheck = false;
						$updated = false;
					}
				}
				else $updated = false;
				$result = $this->store_db->read_user_info($data);
				
				$result = (array)$result[0];
				if($result != false){
					$this->form_validation->set_rules('old_email', 'Email Lama', 'trim|required|xss_clean');
					$this->form_validation->set_rules('new_email', 'Email Baru', 'trim|required|xss_clean');
					
					$data = array(
						'user_id' => $result['user_id'],
						'old_email' => $result['username']
					);
					$data['message_display'] = ($updated) ? 'Anda berhasil mengubah email' : '';
					$data['message_error'] = (isset($passcheck) && !$passcheck) ? 'Kata Sandi tidak benar' : '';
					
					$this->load->view('templates/header');
					$this->load->view('people/change_email', $data);
					$this->load->view('templates/footer');
				} 		
				else redirect('people/logged_out', 'refresh');
			}
		}
		
		public function change_password(){			
			$data = $this->session->userdata('logged_in');
			if($data['username'] == ''){		
				return $this->logged_out();
			} else {
				if($this->input->post('uid') != ''){
					$data_update = array(
						'user_id' => $this->input->post('uid'),
						'old_password' => $this->input->post('old_password'),
						'new_password' => $this->input->post('new_password')
					);
					$data['password'] = $this->input->post('old_password');
					//die(print_r($data_update));
					$passcheck = $this->store_db->login($data);
					if($passcheck == TRUE){
						$updated = $this->store_db->update_user_password($data_update);
					} else {
						$passcheck = false;
						$updated = false;
					}
				}
				else $updated = false;
				$result = $this->store_db->read_user_info($data);
				
				$result = (array)$result[0];
				if($result != false){
					$this->form_validation->set_rules('old_email', 'Email Lama', 'trim|required|xss_clean');
					$this->form_validation->set_rules('new_email', 'Email Baru', 'trim|required|xss_clean');
					
					$data = array(
						'user_id' => $result['user_id']
					);
					$data['message_display'] = ($updated) ? 'Anda berhasil mengubah password' : '';
					$data['message_error'] = (isset($passcheck) && !$passcheck) ? 'Kata Sandi tidak benar' : '';
					
					$this->load->view('templates/header');
					$this->load->view('people/change_password', $data);
					$this->load->view('templates/footer');
				} 		
				else redirect('people/logged_out', 'refresh');
			}
		}
		
		public function edit(){			
			$data = $this->session->userdata('logged_in');
			if($data['username'] == ''){		
				return $this->logged_out();
			} else {
				$data_header['logged_in'] = true;
				if($this->input->post('uid') != ''){
					$data_update = array(
						'user_id' => $this->input->post('uid'),
						'birthday' => $this->input->post('birthday'),
						'gender' => $this->input->post('gender'),
						'hobby' => $this->input->post('hobby')
					);
					$data['password'] = $this->input->post('password');
					//die(print_r($data_update));
					$passcheck = $this->store_db->login($data);
					if($passcheck == TRUE){
						$updated = $this->store_db->update_user_info($data_update);
					} else {
						$passcheck = false;
						$updated = false;
					}
				}
				else $updated = false;
				$result = $this->store_db->read_user_info($data);
				//die(print_r((array)$result[0]));
				$result = (array)$result[0];
				if($result != false){
					$this->form_validation->set_rules('birthday', 'Tanggal Lahir', 'trim|required|xss_clean');
					$this->form_validation->set_rules('hobby', 'Hobi', 'trim|required|xss_clean');
					
					$data = array(
						'user_id' => $result['user_id'],
						'username' => $result['user_id'],
						'name' => $result['name'],
						'email' => $result['email'],
						'birthday' => date('d/m/Y', strtotime($result['birth_date'])),
						'gender' => $result['gender'],
						'hobby' => $result['hobby'],
					);
					$data['message_display'] = ($updated) ? 'Anda berhasil mengubah profil' : '';
					$data['message_error'] = (isset($passcheck) && !$passcheck) ? 'Kata Sandi tidak benar' : '';
					
					$this->load->view('templates/header');
					$this->load->view('people/people_header', $data_header);
					$this->load->view('people/sidebar');
					$this->load->view('people/edit', $data);
					$this->load->view('people/people_footer');
					$this->load->view('templates/footer');
				} 		
				else redirect('people/logged_out', 'refresh');
			}
		}
//Home		
		public function home(){
			$data = $this->session->userdata('logged_in');
			if($data['username'] == ''){		
				return $this->logged_out();
			} else {
				$data_header['logged_in'] = true;
				$result = $this->store_db->read_user_info($data);
				if($result != false){
					$this->load->view('templates/header');
					$this->load->view('people/people_header', $data_header);
					$this->load->view('people/home', $result[0]);
					$this->load->view('people/people_footer');
					$this->load->view('templates/footer');
				} 		
			}
		}
//Login		
		public function login(){ //show login page
			$data_header['logged_in'] = false;
			$this->load->view('templates/header');
			$this->load->view('people/people_header', $data_header);
			$this->load->view('people/login');
			$this->load->view('people/people_footer');
			$this->load->view('templates/footer');
		}
		
		public function user_login_process(){ //check user login
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			
			if ($this->form_validation->run() == FALSE) {
				$data_header['logged_in'] = false;
				$this->load->view('templates/header');
				$this->load->view('people/people_header', $data_header);
				$this->load->view('people/login');
				$this->load->view('people/people_footer');
				$this->load->view('templates/footer');
			} else {
				$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
				$result = $this->store_db->login($data);
				if($result == TRUE){
					$sess_array = array(
					'username' => $this->input->post('username')
					);
					
					//add user data session
					$this->session->set_userdata('logged_in', $sess_array);
					redirect('people/home', 'refresh');
					/*
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
					$data_header['logged_in'] = false;
					$this->load->view('templates/header');
					$this->load->view('people/people_header', $data_header);
					$this->load->view('people/login', $data);
					$this->load->view('people/people_footer');
					$this->load->view('templates/footer');
				}
			}
		}
		
		public function logged_out(){ //logout
			$sess_array = array('username' => ''); //remove session data
			$this->session->unset_userdata('logged_in', $sess_array);
			$data_header['logged_in'] = false;
			$this->load->view('templates/header');
			$this->load->view('people/people_header', $data_header);
			$this->load->view('people/login');
			$this->load->view('people/people_footer');
			$this->load->view('templates/footer');
		}
		
		public function logout(){ //logout
			$sess_array = array('username' => ''); //remove session data
			$this->session->unset_userdata('logged_in', $sess_array);
			$data['message_display'] = 'Successfully logout';
			$data_header['logged_in'] = false;
			$this->load->view('templates/header');
			$this->load->view('people/people_header', $data_header);
			$this->load->view('people/login', $data);
			$this->load->view('people/people_footer');
			$this->load->view('templates/footer');
		}
//Notification
		public function notification(){
			$data['user_id'] = '4';
			$result = $this->store_db->get_notification_list($data);
			
			$data_header['logged_in'] = true;
			$this->load->view('templates/header');
			$this->load->view('people/people_header', $data_header);
			$this->load->view('people/sidebar');
			$this->load->view('people/notification');
			$this->load->view('people/people_footer');
			$this->load->view('templates/footer');
		}
//Register		
		public function register(){ //show registration page
			$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required|css_clean');
			$this->form_validation->set_rules('mobile_phone', 'Nomor HP', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthday', 'Tanggal Lahir', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email_value', 'Alamat Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Kata sandi', 'trim|required|xss_clean');
		
			$data = array(
				'name' => $this->input->post('name'),
				'mobile_phone' => $this->input->post('mobile_phone'),
				'birthday' => $this->input->post('birthday'),
				'email_value' => $this->input->post('email_value'),
				'gender' => $this->input->post('gender'),
				'password' => $this->input->post('password'),
				'repassword' => $this->input->post('repassword'),
				'register_tos' => $this->input->post('register_tos'),
				'privilege' => '1',
				'status' => '1'
			);
			$error = false;
			if($this->input->post('password') !== $this->input->post('repassword')){
				$data['pword_error'] = 'Kata sandi tidak sama';
				$error = true;
			}
				
			if($this->form_validation->run() == FALSE){
				$error = true;		
			}
			
			
			if($error){
				$data_header['logged_in'] = false;
				$this->load->view('templates/header');
				$this->load->view('people/people_header', $data_header);
				$this->load->view('people/register', $data);			
				$this->load->view('people/people_footer');			
				$this->load->view('templates/footer');	
			}
			else  if ($this->input->post('register_tos') != '1'){
				$data['message_display'] = 'Anda harus menyetujui Syarat dan Ketentuan dari JStore Online';
				$data_header['logged_in'] = false;
				$this->load->view('templates/header');
				$this->load->view('people/people_header', $data_header);
				$this->load->view('people/register', $data);			
				$this->load->view('people/people_footer');			
				$this->load->view('templates/footer');	
			}
			else {
				$result = $this->store_db->reg_insert_user($data);
				if($result == TRUE){
					$sess_array = array(
					'username' => $data['email_value']
					);
					
					//registration success then automatically login by adding session
					$this->session->set_userdata('logged_in', $sess_array);
					redirect('people/home', 'refresh');
				} else {
					$data['message_display'] = 'Email sudah digunakan!';
					$data_header['logged_in'] = false;
					$this->load->view('templates/header');
					$this->load->view('people/people_header', $data_header);
					$this->load->view('people/register', $data);
					$this->load->view('people/people_footer');
					$this->load->view('templates/footer');
				}
			}
		}
	}
?>