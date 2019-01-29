//type = ['','info','success','warning','danger'];

demo = {
    showNotification: function (type, message) {


        $.notify({
            icon: "ti-gift",
            message: message

        }, {
            type: type,
            timer: 4000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
    }
}


$('#modal-delete-produto').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var descricao = button.data('descricao') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Excluir ' + descricao + ' ?')
    modal.find('#id').attr("value", id)
});

$('#modal-delete-cliente').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var nome = button.data('nome') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Excluir ' + nome + ' ?')
    modal.find('#id').attr("value", id)
});

$('#modal-baixa-saldo').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var saldoDevedor = button.data('saldo-devedor') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Dar baixa em saldo devedor')
    modal.find('#id').attr("value", id)
    modal.find('#valorSaldoDevedor').attr("value", saldoDevedor)

});

$('#formulario').submit(function ( event ) {
    event.preventDefault();
});

//Caixa

$('#codigodebarras').keyup(function () {
    var codigodebarras = $('#codigodebarras').val();

    $.ajax({
        url: 'getProduto-' + codigodebarras,
        type: 'get',
        dataType: "json",
        success: function (data) {
            $('#descricao').val(data.descricao);
            $('#preco').val(data.preco);
            $('#quantidadeestoque').val(data.quantidade);
        }

    });


});
var precoTotalCompra = 0;

function atualizaPrecoTotal($totalProduto, $operacao) {
    if ($operacao === '+') {
        precoTotalCompra += $totalProduto;
        $('#valor_total').html('Total compra: ' + precoTotalCompra);
    }
    if ($operacao === '-') {
        precoTotalCompra -= $totalProduto;
        $('#valor_total').html('Total compra: ' + precoTotalCompra);
    }
}

function zeraPrecoTotalCompra() {
    precoTotalCompra = 0;
    $('#valor_total').html('Total compra: ' + precoTotalCompra);
}

var array = new Array();
$('#add').click(function () {
    var produto = {};

    if($("#quantidadecompra").val()== null || $("#quantidadecompra").val() ==""){
        $(document).ready(function () {
            demo.showNotification("danger", "Insira a quantidade de produtos");
        });
        return ;
    }

    if (!$('#descricao').val()) {
        $(document).ready(function () {
            demo.showNotification("danger", "Nenhum produto selecionado");
        });
        return
    }
    if (parseInt($('#quantidadeestoque').val()) === 0) {
        $(document).ready(function () {
            demo.showNotification("danger", "Não há produto em estoque");
        });
        return
    }

    // array.push($('#descricao').val());
    // console.log(array);

    // produto.codigodebarras = $('#codigodebarras').val();
    // produto.quantidade = $('#quantidadecompra').val();

    // array.push(produto);
    // console.log(array);
    $totalProduto = ($('#preco').val() * $('#quantidadecompra').val());


    $('#tableCarrinhoCompras > tbody').append('<tr>' + '<input type="hidden" value="' + $('#codigodebarras').val() + '">' +
        '<td>' + $('#descricao').val() + '</td>' +
        '<td>' + $('#quantidadecompra').val() + '</td>' +
        '<td class="preco">R$ ' + $totalProduto + '</td>' +
        '<td><button type="button" class="ti-close remove"></button></td></tr>');
    atualizaPrecoTotal($totalProduto, '+');
    $('#formulario').each(function () {
        this.reset();
    });
    $('#codigodebarras').focus();


});


$('table').on('click', '.remove', function (event) {
    $elemento = $(this).closest("tr");
    $totalProduto = parseFloat($elemento.find("td:eq(2)").html().replace(/[^0-9.,]/g, ''));
    atualizaPrecoTotal($totalProduto, '-');
    $elemento.remove();
});

$('#finalizar').on('click', function () {

    var table = $('#tableCarrinhoCompras > tbody');
    var array = new Array();
    if (table.find('input').length === 0) {
        $(document).ready(function () {
            demo.showNotification("danger", "Lista de compras vazia");
        });
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        table.find('tr').each(function (indice) {
            //alert(indice)
            var codigodebarras = table.find('tr:nth-child(' + (indice + 1) + ') input').val();
            var quantidade = table.find('tr:nth-child(' + (indice + 1) + ') td:nth-child(3)').html();
            var produto = {};
            produto.codigodebarras = codigodebarras;
            produto.quantidade = quantidade;
            array.push(produto);
        });

        var cliente = $('#pagamento').val();

        $.ajax({
            type: "POST",
            url: '/venda',
            data: {produtos: array, idCliente: cliente, totalCompra: precoTotalCompra},
            success: function (response) {
                if (response.success) {
                    $(document).ready(function () {
                        demo.showNotification("success", response.success);
                    });
                } else {
                    $(document).ready(function () {
                        demo.showNotification("danger", response.error);
                    });
                }
            }

        });
        $("#tableCarrinhoCompras > tbody > tr").detach();
        zeraPrecoTotalCompra();

    }


    // var tbody = $('#tableCarrinhoCompras > tr:nth-child($i) input').val();
    // alert(tbody);
});

