@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
@endphp


@extends('layouts/contentNavbarLayout')

@section('title', 'Home')

@section('vendor-style')
@endsection

@section('vendor-script')
@endsection

@section('page-script')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card" id="app">
            <example-component></example-component>
        </div>
    </div>
</div>

@endsection
