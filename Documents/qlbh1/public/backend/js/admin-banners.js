$(document).ready(function () {
    $('.dltBtn').click(function (event) { 
        //event.preventDefault();
        var form=$(this).closest('form');
        var dataID=$(this).data('id');
        console.log(dataID);
        event.preventDefault();
        swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this data!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
               form.submit();
            } else {
                swal("Your data is safe!");
            }
        });
    })
});


