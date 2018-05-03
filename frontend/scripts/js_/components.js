$('.categoryPack').css('display','none');

function componentPicker(element){

  //get Id of currently picked up model so it will be later used for showing possible options
  var selected=$(element).find('option:selected');
  console.log(selected);

  var id=selected.data('product-id');

  //now show all the available corresponding options to the selected model
  $(element).closest('tr').find('.categoryPack').each(function(){
    if($(this).data('product-id')==id){
      $(this).css('display','block');
      $(this).children().attr('readonly','readonly');
      $(this).children().removeAttr('disabled','disabled');
    }else{
      $(this).css('display','none');
      $(this).children().removeAttr('readonly');
      $(this).children().attr('disabled','disabled');
    }
  })
}

//---> creating new table row
function addComponentRow(ev){//to mozna potenjalnie przerobic na uniwersala
  ev.preventDefault();
  //destroy the select2 so it can be cloned
  if($('[name^="product-name"]').select2()){
    $('[name^="product-name"]').select2("destroy")
    .removeAttr('data-live-search')
    .removeAttr('data-select2-id')
    .removeAttr('aria-hidden')
    .removeAttr('tabindex');

    $('[name^="product-name"]').find('option').removeAttr('data-live-search')
        .removeAttr('data-select2-id')
        .removeAttr('aria-hidden')
        .removeAttr('tabindex');
  }


  //clone table row
  var tr=$('tr.patternRow:first').clone(true);
  //calculate current values based on last tr
  var last=$('tr.patternRow:last').clone(true);
  var rowCount=$(last).find('.id');

  //add new values
	.
	.
	.
	.

  //Change selected option otherwise select gets messy - the first option will be always selected
  tr.find('[name^="product-name"]').find('option').removeAttr('selected','selected').first().attr('selected','selected');
  // now sets the kat model visibility so it is always the first option
  tr.find('.categoryPack').css('display','none');
  tr.find('.categoryPack').first().css('display','block');


  //Remove button
  var del=tr.find('.delete');
  del.html('<i class="fa fa-trash-o"></i>');
  del.click(function(){
    $(this).parent().remove();

  })

  //find table
  var table=$('#order-table-form');
  var tbody=table.find('tbody');
  //insert new row
  tbody.append(tr);

// Reinitialize SELECT 2
    $('[name^="product-name"]').select2();
  reinitializer();
}
