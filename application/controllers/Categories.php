<?php
    class Categories extends CI_Controller{

        public function list(){

            $data["title"] = "Catgories";
            $data["categories"] = $this->category_model->get_categories();

            $this->load->view("templates/admin/header");
            $this->load->view("categories/admin/categories", $data);
            $this->load->view("templates/admin/footer");

        }

        public function add(){
            $this->form_validation->set_rules("name", "Category Name", "required");

            if($this->form_validation->run()){
                $this->category_model->add();
                $this->session->set_flashdata("catgory_added", "Category added");
            }else{
                $this->session->set_flashdata("cat_error", "Something went wrong on adding category");            
            }
            redirect("admin/categories/list");
        }

        public function edit($id){

            $this->form_validation->set_rules("name", "Category Name", "required");

            if($this->form_validation->run()){
                $this->category_model->update($id);
                $this->session->set_flashdata("category_updated", "Category updated");
            }else{
                $this->session->set_flashdata("cat_error", "Something went wrong on adding category");            
            }
            redirect("admin/categories/list");
        }
        

        public function delete($id){
            $this->category_model->delete($id);
            $this->session->set_flashdata("category_deleted", "Category deleted");
            redirect("admin/categories/list");
        }
    }




?>