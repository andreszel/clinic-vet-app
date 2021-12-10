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
const deleteUrl = "{{ url('testajax') }}";
@endsection
@section('js-files')
<script src="{{ asset('js/delete.js') }}"></script>
@endsection