<?php
include_once 'databaseConnection.php';

class attributes{

  var $db='';

  public function __construct(){
    $this->db= new askDatabase();
  }

  public function attributesListing($listing,$setter=false){
    #check what type is it
	.
	.
	.

    #select which function resposnsible for type data should be ran
    if($type=='tkaniny'){
      $attributes=$this->tkaninyAttributes($listing);
    }elseif($type=='gotowe'){
      $attributes=$this->wyrobyGotoweAttributes($listing);
    }elseif($type=='komponenty'){
      $attributes=$this->komponentAttributes($listing);
    }
	   return $attributes;
  }

  private function komponentAttributes($listing){# product type ->komponenty
    $colorsArray=array();
    $colorsIdToNameArray=array();

	.
	.
	.
	.

    $colorsArray_=$this->getColors();

    foreach($listing as $key => $single){
      $unserialized=unserialize($single);

      #addColors
      array_push($colorsArray,$unserialized['kolor']['value']);
      $colorsIdToNameArray[$key]=$unserialized['kolor']['value'];
      #addPackage
      array_push($opakowanieArray,$unserialized['opakowanie']['value']);
      $opakowanieIdToNameArray[$key]=$unserialized['opakowanie']['value'];
      #addCatalogueNum
      array_push($catalogNumber,$unserialized['nr-katalogowy']['value']);
      $catalogIdToNameArray[$key]=$unserialized['nr-katalogowy']['value'];
    }


        $allAttributes=array(
        'colorNames'=>        $colorsArray,
        'colorIdNames'=>      $colorsIdToNameArray,
        'opakowanieNames'=>   $opakowanieArray,
        'opakowanieIdNames'=> $opakowanieIdToNameArray,
        'catalogNum'=>        $catalogNumber,
        'catalogIdNum'=>      $catalogIdToNameArray,
        'colors' =>           $colorsArray_
        );

        return $allAttributes;

  }

  private function wyrobyGotoweAttributes($listing){# product type ->wyroby gootwe
    $systemArray=array();
    $systemIdToNameArray=array();

    $sterowanieArray=array();
    $sterowanieIdToNameArray=array();

    $mocowanieArray=array();
    $mocowanieIdToNameArray=array();

    $rodzajUchwytuArray=array();
    $uchwytIdToNameArray=array();

    $colorsArray=$this->getColors();
    
    foreach($listing as $key => $single){
	.
	.
	.
	.
    }


    $allAttributes=array(
    'systemNames'=>       $systemArray,
    'systemIdNames'=>     $systemIdToNameArray,
    'sterowanieNames'=>   $sterowanieArray,
    'sterowanieIdNames'=> $sterowanieIdToNameArray,
    'mocowanieNames'=>    $mocowanieArray,
	.
	.
	.
    'uchwytyIdNames'=>    $uchwytIdToNameArray,
    'colors' =>           $colorsArray
    );

    return $allAttributes;
  }

  private function tkaninyAttributes($listing){# product type ->tkanina
    $kolekcjaArray=array();
    $kolekcjaIdToNameArray=array();

    foreach($listing as $key => $single){
      $unserialized=unserialize($single);

      #addKolekca
      array_push($kolekcjaArray,$unserialized['kolekcja']['value']);
      $kolekcjaIdToNameArray[$key]=$unserialized['kolekcja']['value'];
    }

  	$allAttributes=array(
  	'kolekcjaNames'=>$kolekcjaArray,
    'kolekcjaIdToName'=>$kolekcjaIdToNameArray
  	);

  	return $allAttributes;

  }

  private function getColors(){

    #check what language version is it
    $lang='pl';
    if(strstr($_SERVER['REQUEST_URI'],'/en/')){
      $lang='eng';
    }

    $sql="SELECT `$lang` FROM `wp_colors`";
    $fetched=$this->db->getDataFromDatabase($sql);
    return $fetched[0];
  }

}

?>
