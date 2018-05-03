/* These scripts are used for the proper "start" - upon page load, like forms auto fill etc. */

function initializer(){
  //set start values for inputs
  var form = new formUi();
  form.showElements();

}

function reinitializer(){

  // set plus minus button actions
  var a = new amountButtons();
  a.add();
  a.decrease();

  //disable categories on wyroby gotowe
  componentsDisabler();

}
initializer();
reinitializer();
.
.
.