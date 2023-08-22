@extends('backend.layouts.master')

@section('main_content')


<div class="container">
    <div class="card">
        <div class="card-header">Size Details Informations</div>
        <div class="card-body">
            <p>Title: {{ $size->title ?? '' }}</p>
            <p>Price: {{ $size->description ?? '' }}</p>
        </div>
        <div class="card-footer m-auto">
            <a class="btn btn-sm btn-primary" href="{{ route('size.index') }}"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>

@endsection
