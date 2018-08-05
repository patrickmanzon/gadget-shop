<?php


    class Brand_model extends CI_Model{

        public function get_brands($id = FALSE){
            if($id === FALSE){
                $query = $this->db->get("brands");
                return $query->result();
            }

            $query = $this->db->get_where("brands", ["brand_id" => $id]);
            return $query->row();

        }

        public function add(){
            return $this->db->insert("brands", ["brand_name" => $this->input->post("name")]);
        }

        public function update($id){
            $this->db->where("brand_id", $id);
            return $this->db->update("brands", ["brand_name" => $this->input->post("name")]);
        }


    }

?>