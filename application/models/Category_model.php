<?php


    class Category_model extends CI_Model{

        public function get_categories($id = FALSE){

            if($id === FALSE){
                $query = $this->db->get("categories");
                return $query->result();
            }

            $query = $this->db->get_where("categories", ["cat_id" => $id]);
            return $query->row();

        }

        public function add(){
            $data["cat_name"] = $this->input->post("name");

            return $this->db->insert("categories", $data);
        }

        public function delete($id){
            $this->db->where("cat_id", $id);
            return $this->db->delete("categories");
        }
        
        public function update($id){
            $data["cat_name"] = $this->input->post("name");
            $this->db->where("cat_id", $id);
            return $this->db->update("categories", $data);
        }

    }

?>