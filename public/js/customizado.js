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

$('#collapse').collapse();