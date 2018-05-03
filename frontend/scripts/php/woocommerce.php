<?php

include_once 'wp-content/plugins/orderForms/frontend/libs/databaseConnection.php';
include_once 'wp-content/plugins/orderForms/frontend/libs/dataTransform.php';

class woocommerce_data{

  var $db='';
  var $catId='';
  var $catName='';
  var $transform='';

  function __construct($setter=false){

	.
	.
	.
	.

    #sql for cat ID
    $this->db= new askDatabase();
    $sql='SELECT `term_id` FROM `H7gVa_terms` WHERE `name`="'.$category.'"';
    $fetched=$this->db->getDataFromDatabase($sql);
    #get cat ID for global use
    $this->catId=$fetched[0][0][0];
    #get cat name
    $this->catName=$category;
    #handler for data transforms
    $this->transform=new attributes();
  }

  public function getProductsID(){# getting ID of products which belong to found ID of cat in construct
    $sql="SELECT `object_id` FROM `H7gVa_term_relationships` WHERE `term_taxonomy_id`='$this->catId'";
    $fetched=$this->db->getDataFromDatabase($sql);

    return $fetched[0];
  }

  public function getProductsName($idList){
	.
	.
	.
	.
  }

  public function getProductAttributes($idList,$setter=false){
    $productToAttributes=array(); #this contains ID of product and it's corresponding attributes

    foreach($idList as $singleProduct){#get data for each Id
      $sql="SELECT `meta_value` FROM `H7gVa_postmeta` WHERE `meta_key`='_product_attributes' AND `post_id`='$singleProduct[0]'";
      $fetched=$this->db->getDataFromDatabase($sql);
      $productToAttributes["$singleProduct[0]"]=$fetched[0][0][0];
    }

    $attributes=$this->transform->attributesListing($productToAttributes,$setter);


    return $attributes;

  }


  public function testing(){
    $sql='SELECT * FROM `H7gVa_users`';
    $fetched=$this->db->getDataFromDatabase($sql);
  }
}

?>
