<?php

  class formOptions{

    function paymentSwitch(){
      echo '<h3>Brak przedpłaty na konto</h3>';

      echo '<form action="/wp-content/plugins/orderForms/backend/userActions.php?type=payment" method="POST">';
        echo 'Tak <input type="radio" value="1" name="paymentInput" required/>';
        echo 'Nie <input type="radio" value="0" name="paymentInput" required/>';
        echo '<input type="submit" value="zapisz" class="button"/>';
      echo '</form>';
    }

  }

  $f=new formOptions;
  $f->paymentSwitch();

?>
