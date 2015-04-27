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
			'birth_date' => date('Y-m-d', strtotime($data['birthday'])),
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

	}

?>