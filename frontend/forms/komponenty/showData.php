<?php

    class showPartialData{

    public function productModel($data){
        $x=0;
        foreach($data as $key=>$oneName){
          if($x==0){
              echo "<option value='$key' data-product-id='$oneName' selected>$key</option>";
          }else{
              echo "<option value='$key' data-product-id='$oneName'>$key</option>";
          }

          $x++;
        }
    }

    public function showCategory($data){
      $this->showInputs($data,'categoryPack wrapperCategoryPack','category[]','hidden','style="margin-top: -10px !important;"');
    }

    public function showColor($data){
        echo '<div class="colorPack wrapperColorPack" data-product-id="'.$key.'" >';
          echo '<select name="color[]">';
      foreach($data as $key=>$oneName){
          foreach($oneName as $oneColor){
                echo "<option value='$oneColor'/>$oneColor</option>";
          }
      }
          echo '</select>';
        echo '</div>';
    }


  #Helpers
  private function showInputs($data,$classes='',$name='',$type='',$style=''){ #this one is used to print options/check/radion in normal cases
    foreach($data as $key=>$oneName){
      echo '<div class="'.$classes.'" data-product-id="'.$key.'" '.$style.'>';

        if($type=='option'){
          echo '<select class="product-fixing"  name="'.$name.'">';
        }
            $explodedArray=explode('|',$oneName);
            foreach($explodedArray as $oneItem){
              if($type=='radio'){
                echo '<legend for="productSystem">'.$oneItem.'</legend>';
                echo "<input type='radio' name='productSystem' value='$oneItem' required ;/>";
              }elseif($type=='option'){
                echo "<option value='$oneItem'/>$oneItem</option>";
              }elseif($type=='hidden'){
                echo "<input type='text' value=".$oneItem." name='".$name."' readonly/>";
              }
            }

      if($type=='option'){
        echo '</select>';
      }

      echo '</div>';
    }
  }

  }#--> class end

?>
