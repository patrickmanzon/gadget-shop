<?php

    class Users extends CI_Controller{

        public function register(){


            $this->form_validation->set_rules("firstname", "First Name", "required|min_length[3]|max_length[10]");
            $this->form_validation->set_rules("lastname", "Last Name", "required|min_length[3]|max_length[10]");
            $this->form_validation->set_rules("contact", "Contact Number", "required|min_length[11]|max_length[11]");
            $this->form_validation->set_rules("email", "Email", "required|valid_email|callback_check_email");
            $this->form_validation->set_rules("password", "Password", "required|min_length[5]|max_length[20]");
            
            if(!$this->form_validation->run()){
                $this->load->view("templates/front/header");
                $this->load->view("users/register");                
                $this->load->view("templates/front/footer");
            }else{
                $this->user_model->register();
                $this->session->set_flashdata("user_registered", "You are now registered you can now login.");
                redirect("users/login");
            }

        }

        public function login(){

            $this->form_validation->set_rules("email", "Email", "required|valid_email");
            $this->form_validation->set_rules("password", "Password", "required");

            if(!$this->form_validation->run()){
                $this->load->view("templates/front/header");
                $this->load->view("users/login");                
                $this->load->view("templates/front/footer");
            }else{

                $user = $this->user_model->login($this->input->post("email"));
                if($user){
                    if(password_verify($this->input->post("password"), $user->password)){

                        $this->session->set_userdata([
                            "user_id" => $user->ua_id,
                            "role" => $user->role
                        ]);
                        
                        if($user->role === "1"){
                            redirect("admin/products/list");
                        }
                        redirect("shop");

                    }else{
                        $this->session->set_flashdata("invalid_login", "Invalid username or password");
                        redirect("users/login");
                    }
                }else{
                    $this->session->set_flashdata("invalid_login", "Invalid username or password");
                    redirect("users/login");
                }
            }

        }

        public function check_email($email){
            if($this->user_model->check_email($email)){
                $this->form_validation->set_message('check_email', 'email already taken');
                return false;
            }else{
                return true; 
            }
        }

        public function logout(){
            $this->session->unset_userdata(["user_id", "role"]);
            redirect("users/login");
        }

    }

?>