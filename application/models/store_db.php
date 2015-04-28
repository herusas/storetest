<?php

	Class Store_Db extends CI_Model {

		// Insert registration data in database
		public function reg_insert_user($data) {
			$data_user = array(
			'user_id' => '',
			'username' => $data['email_value'],
			'password' => md5($data['password']),
			'privilege' => $data['privilege'],
			'status' => $data['status'],
			'created_time' => date('Y-m-d H:i:s')
			);
			$data_phone = array(
				'contact_detail_id' => '',
				'contact_id' => '3',
				'detail' => $data['mobile_phone'],
				'status' => '1'
			);
			$data_profile = array(
			'name' => $data['name'],
			'email' => $data['email_value'],
			'birth_date' => date('Y-m-d', strtotime(str_replace('/', '-', $data['birthday']))),
			'birth_place' => '',
			'photo_user' => '',
			'photo_thumb' => '',
			'gender' => '',
			'hobby' => '',
			'last_modified_datetime' => date('Y-m-d H:i:s')
			);
			// Query to check whether username already exist or not
			$condition = "username =" . "'" . $data['email_value'] . "'";
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0) {
				// Query to insert data in database
				$this->db->trans_start();
				$this->db->insert('user', $data_user);
				$uid = $this->db->insert_id();
				$data_phone['user_id'] = $uid;
				$data_profile['user_id'] = $uid;
				$this->db->insert('user_contact_detail', $data_phone);
				$this->db->insert('profile', $data_profile);
				$this->db->trans_complete();
				return $this->db->trans_status();
			}
		}

		// Read data using username and password
		public function login($data) {

			$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . md5($data['password']) . "'";
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return true;
			} else {
				return false;
			}
		}
		
		public function get_user_id($data){
			$this->db->select('user_id');
			$this->db->from('user');
			$this->db->where('username', $data['username']);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result(0);
			} else {
				return false;
			}
		}

		// Read data from database to show data in admin page
		public function read_user_info($sess_array) {

			$condition = "a.username =" . "'" . $sess_array['username'] . "' AND a.user_id = b.user_id AND a.username = b.email";
			$this->db->select('a.*, b.*');
			$this->db->from('user a');
			$this->db->join('profile b', 'a.user_id = b.user_id', 'outer right');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}
		
		public function update_user_info($data){
			$this->db->trans_start();
			$this->db->set('birth_date', "'".date('Y-m-d', strtotime(str_replace('/', '-', $data['birthday'])))."'", FALSE);
			$this->db->set('gender', $data['gender'], FALSE);
			$this->db->set('hobby', "'".$data['hobby']."'", FALSE);
			$this->db->where('user_id', $data['user_id']);
			$this->db->update('profile');
			$this->db->trans_complete();
			return $this->db->trans_status();
		}
		
		public function update_user_email($data){
			$condition1 = array('user_id' => $data['user_id'], 'username' => $data['old_email']);
			$condition2 = array('user_id' => $data['user_id'], 'email' => $data['old_email']);
			
			$this->db->trans_start();
			$this->db->set('username', "'".$data['new_email']."'", FALSE);
			$this->db->where($condition1);
			$this->db->update('user');
			$this->db->set('email', "'".$data['new_email']."'", FALSE);
			$this->db->where($condition2);
			$this->db->update('profile');
			$this->db->trans_complete();
			return $this->db->trans_status();
		}
		
		public function update_user_password($data){
			$this->db->trans_start();
			$this->db->set('password', "'".md5($data['new_password'])."'", FALSE);
			$this->db->where('user_id', $data['user_id']);
			$this->db->update('user');
			$this->db->trans_complete();
			return $this->db->trans_status();
		}
		
		public function get_user_address($data){
			$this->db->select('a.user_address_id, a.user_id, a.alias, a.receiver_name, a.phone_number, a.address, a.post_code, (select b.name from address_list b where b.address_list_id = a.district_code) as district, (select b.name from address_list b where b.address_list_id = a.city_code) as city, (select b.name from address_list b where b.address_list_id = a.province_code) as province, (select b.name from address_list b where b.address_list_id = a.country_code) as country');
			$this->db->from('user_address a');
			$this->db->where('a.user_id', $data['user_id']);
			$this->db->limit(5);
			$query = $this->db->get();

			if ($query->num_rows() >= 1) {
				return $query->result(0);
			} else {
				return false;
			}
		}
		
		public function new_user_address($data){
			$data['user_address_id'] = '';
			$data['status'] = '1';		
			
			return $this->db->insert('user_address', $data);
		}
		
		public function get_address_list($parent_id, $level){
			$result = array('' => 'Pilih '.($level == 1 ? 'Provinsi' : ($level == 2 ? 'Kota / Kabupaten' : ($level == 3 ? 'Kecamatan' : 'Negara'))));
			if($parent_id != ''){
				$cond = array('parent_id' => $parent_id, 'status' => '1');
				$this->db->select('address_list_id, name');
				$this->db->from('address_list');
				$this->db->where($cond);
				$query = $this->db->get();
				if ($query->num_rows() >= 1) {
					foreach($query->result() as $data)
						$result[$data->address_list_id] = $data->name;
				}
			}

			return $result;
			
		}
		
		public function get_user_bank_account($data){
			$this->db->select('a.bank_account_id, a.user_id, a.account_name, a.account_number, a.account_branch, a.status, (select b.bank_name from bank_account b where b.bank_id = a.bank_id) as bank_name');
			$this->db->from('user_bank_account a');
			$this->db->where('a.user_id', $data['user_id']);
			$this->db->limit(5);
			$query = $this->db->get();

			if ($query->num_rows() >= 1) {
				return $query->result(0);
			} else {
				return false;
			}
		}
		
		public function new_user_bank_account($data){
			$data['bank_account_id'] = '';
			$data['status'] = '1';		
			
			return $this->db->insert('user_bank_account', $data);
		}
		
		public function get_bank_account_list(){
			$result = array('' => 'Pilih Bank Anda');
			$cond = array('status' => '1');
			$this->db->select('bank_id, bank_name');
			$this->db->from('bank_account');
			$this->db->where($cond);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				foreach($query->result() as $data)
					$result[$data->bank_id] = $data->bank_name;
			}

			return $result;
			
		}

	}

?>