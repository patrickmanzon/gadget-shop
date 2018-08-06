<?php

    class Products extends CI_Controller{

        public function shop(){

            $data["brands"] = $this->brand_model->get_brands();
            $data["categories"] = $this->category_model->get_categories();

            $this->load->view("templates/front/header");
            $this->load->view("products/front/shop", $data);
            $this->load->view("templates/front/footer");
        }

        public function ajaxShop(){
            if($this->input->is_ajax_request()){

                $option = [
                    "cat" => $this->input->post("cat"),
                    "brand" => $this->input->post("brand"),
                    "sort" => $this->input->post("sort")
                ];   

                $pagination = $this->prod_pagination($this->product_model->product_count($option["brand"], $option["cat"]));

                $this->pagination->initialize($pagination);
                $page = $this->uri->segment(3);

                $data = [ 
                    "products" => $this->product_model->display_products($pagination["per_page"],$page,$option),
                    "pagination" => $this->pagination->create_links(),
                    "options" => $option
                ];
                echo json_encode($data);
            }else{
                redirect("shop");
            }
        }

        public function ajax_preview_product($id){
            if($this->input->is_ajax_request()){
                echo json_encode($this->product_model->get_products($id));
            }
        }

        public function list(){

            $data["title"] = "Products";
            $data["products"] = $this->product_model->get_products();

            $this->load->view('templates/admin/header');
            $this->load->view('products/admin/product_list', $data);
            $this->load->view('templates/admin/footer');

        }

        public function add(){

            $data["title"] = "Add Product";
            $data["brands"] = $this->brand_model->get_brands();
            $data["categories"] = $this->category_model->get_categories();

            $this->form_validation->set_rules("prod_name", "Product Name", "required");
            $this->form_validation->set_rules("stock", "Stock", "required");
            $this->form_validation->set_rules("prod_price", "Product Price", "required");
            $this->form_validation->set_rules("prod_desc", "Product Description", "required");

            // if the form not yet submitted
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/admin/header');
                $this->load->view('products/admin/add_product', $data);
                $this->load->view('templates/admin/footer');
            }else{
                // Add the product
                $config["upload_path"] = "./assets/images/upload/products/"; 
                $config["allowed_types"] = "gif|png|jpg|jpeg";
                $config["file_name"] = md5($this->upload->data("file_name").time());

                $this->upload->initialize($config);

                if($this->upload->do_upload("userfile")){
                    // insert into database
                    $image = $config["upload_path"].$config["file_name"].$this->upload->data("file_ext");
                    $this->product_model->add_product($image);
                    $this->session->set_flashdata("product_added", "Product added");
                    redirect("admin/products/list");
                }else{
                    redirect("admin/products/add");
                }

                
            }
        }

        public function edit($id){

            $data["title"] = "Edit Product";
            $data["prod"] = $this->product_model->get_products($id);
            $data["category"] = $this->category_model->get_categories($data["prod"]->cat_id);
            $data["brand"] = $this->brand_model->get_brands($data["prod"]->brand_id);            
            $data["categories"] = $this->category_model->get_categories();
            $data["brands"] = $this->brand_model->get_brands();

            $this->form_validation->set_rules("prod_name", "Product Name", "required");
            $this->form_validation->set_rules("stock", "Stock", "required");
            $this->form_validation->set_rules("prod_price", "Product Price", "required");
            $this->form_validation->set_rules("prod_desc", "Product Description", "required");

            // if the form not yet submitted
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/admin/header');
                $this->load->view('products/admin/edit_product', $data);
                $this->load->view('templates/admin/footer');
            }else{
                // Add the product
                $config["upload_path"] = "./assets/images/upload/products/"; 
                $config["allowed_types"] = "gif|png|jpg|jpeg";
                $config["file_name"] = md5($this->upload->data("file_name").time());

                $this->upload->initialize($config);

                if($this->upload->do_upload("userfile")){
                    // delete the old image
                    unlink($data["prod"]->prod_image);
                    // new image
                    $image = $config["upload_path"].$config["file_name"].$this->upload->data("file_ext");
                    
                }else{
                    // old image
                    $image = $data["prod"]->prod_image;

                }

                $this->product_model->update($id, $image);
                $this->session->set_flashdata("product_updated", "Product updated");
                redirect("admin/products/list");

            }

        }

        public function delete($id){
            $delete_image = $this->product_model->get_products($id)->prod_image;
            unlink($delete_image);
            $this->product_model->delete($id);
            $this->session->set_flashdata("product_deleted", "Product deleted");
            redirect("admin/products/list");
        }

        public function prod_pagination($rows){
                $config["base_url"] = "";
                $config["total_rows"] = $rows;
                $config["per_page"] = 9;
                $config["uri_segment"] = 3;
                //$confif["use_page_numbers"] = true;
               // Bootstrap 4 Pagination fix
                $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
                $config['full_tag_close'] 	= '</ul></nav></div>';
                $config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
                $config['num_tag_close'] 	= '</span></li>';
                $config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close'] 	= '</span></li>';
                $config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close'] 	= '</span></li>';
                $config["num_links"] = 1;

                return $config;
        }


    }


?>