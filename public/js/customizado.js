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