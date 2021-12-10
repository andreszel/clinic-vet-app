@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        Test jQuery

        <button class="btn btn-sm btn-primary delete">Test click</button>
    </div>
</div>
@endsection

@section('javascript')
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
url: "http://clinicvet.test/testajax",
data: {
name: "John",
location: "Boston"
}
})
.done(function(response){
console.log('response status: ', response.status);
window.location.reload();
})
.fail(function(error){
Swal.fire('Oops...', 'Coś poszło nie tak!','error');
});
}
});
});
});
@endsection