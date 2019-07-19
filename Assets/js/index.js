$(document).ready(function(){
   
    $(document).on('click','.delete',function(){
        var selectedElement = $(this)

        if(confirm("Are you sure you want to delete this record?")){
            $.ajax({
                url: `${window.location.protocol}//${window.location.host}/myoop6/delete.registration.php`,
                type: 'POST',
                data: {
                    id : selectedElement.data('id')
                }
            })
            .done(function(res){

                selectedElement.parent().parent().remove()
                iziToast.success({
                    title: 'OK',
                    message: 'Successfully Deleted!',
                });
            })
            .fail(function(err){

            })
        }
    });
})