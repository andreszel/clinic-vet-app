$(function() {
    $('.delete').click(function() {
        Swal.fire({
            title: 'Czy na pewno chcesz usunąć rekord?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Tak',
            cancelButtonText: 'Anuluj'
        }).then((result) => {
            if(result.value) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: deleteUrl,
                    data: {
                        name: "John",
                        location: "Boston"
                    }
                })
                .done(function(data){
                    console.log('response status: ', data.status);
                    window.location.reload();
                })
                .fail(function(data){
                    Swal.fire('Oops...', data.responseJSON.message, 'error');
                });
            }
        });
    });
});