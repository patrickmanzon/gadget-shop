<?php

    class User_model extends CI_Model{

        public function check_email($email){
            $query = $this->db->get_where("users_account", ["email" => $email]);
            return $query->num_rows > 0;            
        }   

        public function register(){
            $users_account = [
                "email" => $this->input->post("email"),
                "password" => password_hash($this->input->post("password"), PASSWORD_BCRYPT),
                "role" => 0
            ];
            $this->db->insert("users_account", $users_account);

            $user_id = $this->db->insert_id();

            $users_info = [
                "ui_id" => $user_id,
                "firstname" => $this->input->post("firstname"),
                "lastname" => $this->input->post("lastname"),
                "contact" => $this->input->post("contact"),
                "address" => $this->input->post("address")
            ];
            $this->db->insert("users_info", $users_info);

        }

        public function login($email){
            $this->db->join("users_info", "users_info.ui_id = users_account.ua_id");
            $this->db->select("ua_id, role, password, email");
            $query = $this->db->get_where("users_account", ["email"=>$email]);
            return $query->row();
        }


    }



?>