function disableAll(){
  $('.systemPack, .sterowaniePack, .uchwytyPack, .mocowaniePack').each(function(){
    $(this).css('display','none');
  })
}

disableAll();

function gotowyWyrobPicker(element){
  //get Id of currently picked up model so it will be later used for showing possible options
  var selected=$(element).find('option:selected');
  var id=selected.data('product-id');

  //now show all the available corresponding options to the selected model
  $(element).closest('tr').find('.systemPack, .sterowaniePack, .uchwytyPack, .mocowaniePack').each(function(){
    if($(this).data('product-id')==id){
      $(this).css('display','block');
    }else{
      $(this).css('display','none');
    }
  })
}

//---> creating new table row
function addWyrobyRow(ev){//to mozna potenjalnie przerobic na uniwersala
  ev.preventDefault();
  //clone table row
  var tr=$('tr.pattern-row:first').clone(false);
  //calculate current values based on last tr
  var last=$('tr.pattern-row:last').clone(false);

  //add new values
	.
	.
	.
	.
  //calculate new group of radios
  var num=tr.find('[type="radio"]').data('num');
  var newNum=num+1;
  //set number for new radio group
  tr.find('[type="radio"]').attr('name','uchwyt['+newNum+']');
  //also set number for checkbox group
  tr.find('[type="checkbox"]').attr('name','cztery-uchwyty['+newNum+']');

  //find table
  var table=$('#order-table-form');
  var tbody=table.find('tbody');
  //insert new row
  tbody.append(tr);
  form.showElements();
  reinitializer();
}
