<div class="box">
  <p class="title"><? pll_e('zamowienia_zamowienie') ?></p>
  <div>
    <label><? pll_e('zamowienia_sugerowany_slowo') ?>
      <span><? pll_e('zamowienia_termin_slowo') ?></span>
    </label>
    <div class="input">
      <input type="date" class="datepicker" name="order-date" value="" />
    </div>
  </div>
</div>
<div class="box">
  <div>
    <label><? pll_e('zamowienia_nr') ?></label>
    <div class="input">
      <input type="text" name="order-number" value="" required/>
    </div>
    <label><? pll_e('zamowienia_osoba_zamawiajaca_slowo_osoba') ?>
      <span><? pll_e('zamowienia_osoba_zamawiajaca_slowo_zamawiajaca') ?></span>
    </label>
    <div class="input">
      <input type="text" name="order-person" value="" required/>
    </div>
  </div>
</div>
