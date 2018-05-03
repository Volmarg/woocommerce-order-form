<?php

include_once 'woocommerce.php';

class formData{

  public function getData($setter=false){
    $woo=new woocommerce_data($setter);
    $IDlist=$woo->getProductsID();
    $productsNames=$woo->getProductsName($IDlist);
    $attributes=$woo->getProductAttributes($IDlist,$setter);
		.
		.
		.
		.

    return $returnable;
  }

  public function getLang(){
    if(strstr($_SERVER['REQUEST_URI'],'/en/')){
      $lang='eng';
    }else{
      $lang='';
    }

    return $lang;

  }

}
?>
