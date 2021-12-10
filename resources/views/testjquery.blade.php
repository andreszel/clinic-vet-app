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
title: 'Error!',
text: 'Do you want to continue',
icon: 'error',
confirmButtonText: 'Cool'
});
})
});
@endsection