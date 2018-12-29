//type = ['','info','success','warning','danger'];

demo = {
    showNotification: function(type, message){
        

        $.notify({
            icon: "ti-gift",
            message: message

        },{
            type: type,
            timer: 4000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
    }
}


$('#modal-delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  var descricao = button.data('descricao') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Excluir ' + descricao+ ' ?')
  modal.find('#id').attr("value",id)
})



//Caixa

$('#codigodebarras').keyup(function(){
    var codigodebarras = $('#codigodebarras').val();

    $.ajax({
      url: 'getProduto-'+codigodebarras,
      type: 'get',
      dataType: "json",
      success: function(data){
        $('#descricao').val(data.descricao);
        $('#preco').val(data.preco);
        $('#quantidadeestoque').val(data.quantidade);
      }

    });

  
  });
  
  
  var array = new Array();
  $('#add').click(function(){
    var produto = {};
    if(!$('#descricao').val()){
      alert('nenhum produto selecionado');
      this.die();
    }
    // array.push($('#descricao').val());
    // console.log(array);

    produto.codigodebarras = $('#codigodebarras').val();
    produto.quantidade = $('#quantidadecompra').val();

    array.push(produto);
    console.log(array);
   
    
    $('#tableCarrinhoCompras').append('<tr><td>'+$('#descricao').val()+'</td>'+
                                      '<td>'+$('#quantidadecompra').val()+'</td>'+
                                      '<td><button type="button" class="ti-close remove"></button></td></tr>');
    
    $('#formulario').each (function(){
      this.reset();
    });
    $('#codigodebarras').focus();

    
  });


  $('table').on('click', '.remove', function (event) {
    var tr = $(this).closest('tr');
    alert(tr.html());
    $(this).closest('tr').remove();
  });