<?php
  #this one is used for showing table data
  include_once 'wp-content/plugins/orderForms/frontend/forms/komponenty/showData.php';
  $show= new showPartialData();

?>

<table class="components" id="order-table-form">
  <thead>
    <tr>
      <th class="id"><? pll_e('zamowienia_numer') ?></th>
      <th class="name"><? pll_e('zamowienia_nazwa_produktu') ?></th>
      <th class="medium"><? pll_e('zamowienia_numer_katalogu') ?></th>
      <th class="medium"><? pll_e('zamowienia_Kolor_profila') ?></th>
      <th class="medium"><? pll_e('zamowienia_opakownie') ?></th>
      <th class="medium"><? pll_e('zamowienia_Ilość') ?></th>
      <th class="desc"><? pll_e('zamowienia_uwagi') ?></th>
      <th class="delete">
        <i class="fa fa-trash-o"></i>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr class="patternRow" id="po48581">
      <td class="id">1</td>

      <td class="name">
        <select onchange="componentPicker(this)"  name="product-name[]" data-live-search="true" class="selectpicker" required ="required ">
          <?php
            $show->productModel($data['names']['idToName']);
          ?>
        </select>
      </td>

      <td class="medium">
        <?php
          $show->showCategory($data['attributes']['catalogIdNum']);
        ?>

      </td>
      <td class="medium">
        <?php
          $show->showColor($data['attributes']['colors']);
        ?>
      </td>
      <td class="medium"><input type="text" name="size[]" required/> m.</td>
      <td class="medium quantity flexer">
        <i class="fa fa-minus-square"></i>
        <input name="product-quantity[]" value="1" type="text" required style="margin-top:-10px !important;">
          <i class="fa fa-plus-square"></i>
        </td>
        <td class="desc">
          <textarea name="product-desc[]"></textarea>
        </td>
        <td class="delete" data-id="48581">
        </td>
      </tr>
    </tbody>
</table>
