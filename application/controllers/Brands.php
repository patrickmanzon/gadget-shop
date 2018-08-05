<?php

    class Brands extends CI_Controller{

        public function list(){
            $data["title"] = "Brands";
            $data["brands"] = $this->brand_model->get_brands();

            $this->load->view("templates/admin/header");
            $this->load->view("brands/admin/brands", $data);            
            $this->load->view("templates/admin/footer");

        }

        public function add(){

            $this->form_validation->set_rules("name", "Brand Name", "required");

            if($this->form_validation->run()){
                $this->brand_model->add();
                $this->session->set_flashdata("brand_added", "Brand added");
            }else{
                $this->session->set_flashdata("error_data", "Somethin went wrong");
            }

            redirect("admin/brands/list");

        }

        public function edit($id){
            $this->form_validation->set_rules("name", "Brand Name", "required");

            if($this->form_validation->run()){
                $this->brand_model->update($id);
                $this->session->set_flashdata("brand_update", "Brand updated");
            }else{
                $this->session->set_flashdata("error_data", "Somethin went wrong");
            }

            redirect("admin/brands/list");
        }

        
    }




?>