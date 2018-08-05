<?php


    class Product_model extends CI_Model{

        public function add_product($image){

            $data = [
                "cat_id" => (int)$this->input->post("category"),
                "brand_id" => (int)$this->input->post("brand"),
                "prod_name" => $this->input->post("prod_name"),
                "prod_price" => $this->input->post("prod_price"),
                "prod_stock" => $this->input->post("stock"),
                "prod_image" => $image,
                "prod_desc" => $this->input->post("prod_desc")
            ];

            return $this->db->insert("products", $data);
        }

        public function update($id, $image){

            $data = [
                "cat_id" => (int)$this->input->post("category"),
                "brand_id" => (int)$this->input->post("brand"),
                "prod_name" => $this->input->post("prod_name"),
                "prod_price" => $this->input->post("prod_price"),
                "prod_stock" => $this->input->post("stock"),
                "prod_image" => $image,
                "prod_desc" => $this->input->post("prod_desc")
            ];
            $this->db->where("prod_id", $id);
            return $this->db->update("products", $data);
        }

        public function get_products($id = FALSE){
            $this->db->join("categories", "categories.cat_id = products.cat_id");
            $this->db->join("brands", "brands.brand_id = products.brand_id");

            if($id === FALSE){
                $this->db->order_by("prod_id", "DESC");
                $query = $this->db->get("products");
                return $query->result();
            }

            $query = $this->db->get_where("products", ["prod_id" => $id]);
            return $query->row();
        }
        
        public function display_products($limit = FALSE, $offset = FALSE, $data = []){

            $this->db->join("categories", "categories.cat_id = products.cat_id");
            $this->db->join("brands", "brands.brand_id = products.brand_id");

            if($limit){
                $this->db->limit($limit, $offset);
            }

            if($data["sort"] === "price_high"){
                $this->db->order_by("prod_price", "DESC");
            }else if($data["sort"] === "price_low"){
                $this->db->order_by("prod_price", "ASC");                
            }else if($data["sort"] === "name"){
                $this->db->order_by("prod_name", "ASC");                                
            }else{
                $this->db->order_by("prod_id", "DESC");
            }

            if($data["cat"] != "false" && $data["brand"] != "false"){
                $this->db->where("products.cat_id", $data["cat"]);  
                $this->db->where("products.brand_id", $data["brand"]); 
            }else if($data["cat"] != "false"){
                $this->db->where("products.cat_id", $data["cat"]);                
            }else if($data["brand"] != "false"){
                $this->db->where("products.brand_id", $data["brand"]);                                 
            }
           
            $this->db->where("prod_stock >", 0);
            $query = $this->db->get("products");
            return $query->result();
        }

        public function product_count($brand = FALSE, $cat = FALSE){

            if($brand != 'false' && $cat != 'false'){
                $query = $this->db->get_where("products", ["prod_stock >" => 0,"brand_id" => $brand ,"cat_id" => $cat]);

            }else if($brand != 'false'){
                $query = $this->db->get_where("products", ["prod_stock >" => 0,"brand_id" => $brand]);

            }else if($cat != 'false'){
                $query = $this->db->get_where("products", ["prod_stock >" => 0,"cat_id" => $cat]);                      
            }else{
                $query = $this->db->get_where("products", ["prod_stock >" => 0]);
            }
            return $query->num_rows();
        }

        public function delete($id){
            $this->db->where("prod_id", $id);
            return $this->db->delete("products");
        }

        public function product_category_count(){
            $this->db->select("COUNT(cat_id) AS cats");
            $this->db->group_by("cat_id");
            $query = $this->db->get("products");
            return $query->result();
        }

        public function product_brand_count(){
            $this->db->select("COUNT(brand_id) AS brands");
            $this->db->group_by("brand_id");
            $query = $this->db->get("products");
            return $query->result();
        }


    }

?>