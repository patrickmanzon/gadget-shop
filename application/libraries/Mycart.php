<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Mycart{

        // private $cart;

        public function cartContent(){
            if(isset($_SESSION["cart"])){
                return $_SESSION["cart"];
            }else{
                return 0;
            }
        }

        public function addCartItem($item = []){
            if(isset($_SESSION["cart"])){ 
                $item_ids = array_column($_SESSION["cart"], "item_id");

                if(in_array($item["item_id"], $item_ids)){
                    foreach($_SESSION["cart"] as $cart => $val){
                        if($val["item_id"] === $item["item_id"]){
                            if($val["quantity"] >= $val["stocks"]){
                                return "There is only ".$item["stocks"]." stock(s) left";
                            }
                            $this->updateCart($item["quantity"], $cart);
                            return "The Item has been added to your Cart";
                        }  
                    }
                }else{
                    if($item["quantity"] > $item["stocks"]){
                        return "There is only ".$item["stocks"]." stock(s) left";
                    }

                    array_push($_SESSION["cart"], $item);
                    return "The Item has been added to your Cart";
                }      

            }else{
                if($item["quantity"] > $item["stocks"]){
                    return "There is only ".$item["stocks"]." stock(s) left";
                }

                $_SESSION["cart"][0] = $item;
                return "The Item has been added to your Cart";

            }

        }

        public function emptyCart(){
            unset($_SESSION["cart"]);
        }

        public function updateCart($quantity, $index = NULL, $item_id = NULL){

            if($index === NULL){
                for($i = 0; $i < $this->total_items(); $i++){
                    if(in_array($item_id,$_SESSION["cart"][$i])){
                        $_SESSION["cart"][$i]["quantity"] = $quantity;
                    }
                }
            }else{
                $_SESSION["cart"][$index]["quantity"] += $quantity;
                
            }
            
        }

        public function total_items(){
            if(isset($_SESSION["cart"])){
                return count($_SESSION["cart"]);
            }else{
                return 0;
            }
            
        }

        public function removeItem($item_id){
            
           
            foreach($_SESSION["cart"] as $cart => $val){
                if($val["item_id"] == $item_id){
                    // unset();
                    unset($_SESSION["cart"][$cart]);
                    // return true;
                }
            }
            // for($i = 0; $i < count($_SESSION["cart"]); $i++){
            //     if(in_array($item_id, $_SESSION["cart"][$i])){   
            //         unset($_SESSION["cart"][$i]);
            //     } 
            // }

            //array_values($_SESSION["cart"]);
            
        }

    }


?>