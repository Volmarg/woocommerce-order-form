function amountButtons(){

  this.add=function(){
    $('.fa-plus-square').off().on('click',function(){
        $(this).prev().val(parseInt($(this).prev().val())+1);
      })
  }

  this.decrease=function(){
    $('.fa-minus-square').off().on('click',function(){
      $(this).next().val(parseInt($(this).next().val())-1);
    })
  }
}

function formUi(){

  this.showElements=function(){
    var product=$('[name^="product-name"]');
    var id=product.find('option:selected').data('product-id');
    var row=product.parent().parent();
    //show elements coresponding to startUp id
    row.find('input, div').each(function(){
        if($(this).data('product-id')==id){

          $(this).css('display','block');
        }
    })
  };
}

function componentsDisabler(){

  var firstRow=$('#order-table-form tbody tr').first();
  var select=firstRow.find('select option:selected');
  var activeNumber=select.data('product-id');

  $(firstRow).find('.categoryPack').each(function(){
    console.log(activeNumber+'||'+$(this).data('product-id'))
    if($(this).data('product-id')==activeNumber){
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

var _validFileExtensions = [".pdf", ".docx", ".jpg", ".xls", ".doc", ".xlsx", ".odt", ".ods"];
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert('Wgrywasz niepoprawny plik. Dopuszczalne rozszerzenia to: ".pdf", ".docx", ".jpg", ".xls", ".doc", ".xlsx", ".odt", ".ods" ');
                    return false;
                }
            }
        }
    }

    return true;
}
