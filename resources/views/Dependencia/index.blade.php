@extends('layouts/contentNavbarLayout')

@section('title') Dependencia @endsection

@section('css')

@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="row row-bordered g-0">
        <!-- Title -->
        <div class="col-md-12">
            <h5 class="card-header m-0 me-2 pb-3">Dependencias</h5>
        </div>
        <div class="col-md-12">
            <div class="card-body" id="app">
                <index-dependencia></index-dependencia>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
