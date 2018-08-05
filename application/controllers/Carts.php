<?php

    class Carts extends CI_Controller{

        public function add(){


            if($this->input->is_ajax_request()){

                $product = $this->product_model->get_products($this->input->post("prod_id"));

                if(empty($product)){
                    exit("Error Occurs");
                }

                $data = [
                    "item_id" => $this->input->post("prod_id"),
                    "quantity" => $this->input->post("prod_qty"),
                    "price" => $product->prod_price,
                    "name" => $product->prod_name,
                    "image" => $product->prod_image,
                    "stocks" => $product->prod_stock
                ];
                

                echo $this->mycart->addCartItem($data);
            }     
        }

        public function update(){
            if($this->input->is_ajax_request()){
                

                $this->mycart->updateCart($this->input->post("prod_qty"), NULL, $this->input->post("prod_id"));
                exit("Cart updated");
            }else{
                redirect("cart");
            }
        }

        public function total_items(){
            echo $this->mycart->total_items();
        }


        public function content(){
            $this->load->view("templates/front/header");
            $this->load->view("cart/content");
            $this->load->view("templates/front/footer");
        }

        public function ajaxContent(){
            if($this->input->is_ajax_request()){
                if($this->mycart->total_items() !== 0){
                    echo json_encode(array_values($this->mycart->cartContent()));
                }
            }else{
                redirect('cart');
            }
        }

        public function remove(){
            if($this->input->is_ajax_request() && !empty($this->input->post("item_id"))){
                echo $this->mycart->removeItem($this->input->post("item_id"));
                if(empty($this->mycart->cartContent())){
                    $this->mycart->emptyCart();
                }
            }else{
                redirect("cart");
            }
            
        }

        public function clear(){
            $this->mycart->emptyCart();
            redirect("cart");
        }

    }

?>