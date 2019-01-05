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

    // produto.codigodebarras = $('#codigodebarras').val();
    // produto.quantidade = $('#quantidadecompra').val();

    // array.push(produto);
    // console.log(array);

    
    $('#tableCarrinhoCompras > tbody').append('<tr>'+'<input type="hidden" value="'+$('#codigodebarras').val()+'">'+
      '<td>'+$('#descricao').val()+'</td>'+
      '<td>'+$('#quantidadecompra').val()+'</td>'+
      '<td><button type="button" class="ti-close remove"></button></td></tr>');
    
    $('#formulario').each (function(){
      this.reset();
    });
    $('#codigodebarras').focus();

    
  });


$('table').on('click', '.remove', function (event) {
    // var tr = $(this).closest('tr');
    // alert(tr.html());
    $(this).closest('tr').remove();
  });

$('#finalizar').on('click',function(){

  var table = $('#tableCarrinhoCompras > tbody');
  var array = new Array();
  if(table.find('input').length === 0){
    alert('Lista vazia.');
  }else{

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    table.find('tr').each(function(indice){
      //alert(indice)
      var codigodebarras = table.find('tr:nth-child('+(indice +1)+') input').val();
      var quantidade = table.find('tr:nth-child('+(indice +1)+') td:nth-child(3)').html();
      var produto = {};
      produto.codigodebarras = codigodebarras;
      produto.quantidade = quantidade;
      array.push(produto);
    });

    $.each(array, function (index, value) {
      $.ajax({
        type: "POST",
        url: '/movimentacao-saida',
        data: array[index],
        success: function(response){
          console.log('success');
        }

      });
    });
    $("#tableCarrinhoCompras > tbody > tr").detach();
    
    console.log(array);
    
    
  }
  

    // var tbody = $('#tableCarrinhoCompras > tr:nth-child($i) input').val();
    // alert(tbody);
  });



$('#btn').click(function () {




  var array = {
    'codigodebarras': 9000,
    'quantidade': 1
  }
  console.log(array);
  $.ajax({
    type: "POST",
    url: '/movimentacao-saida',
    data: array,
    success: function(response){
      console.log('success');
    }

  });
});