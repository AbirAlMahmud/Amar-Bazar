@extends('backend.layouts.master')

@section('main_content')


<div class="container">
    <div class="card">
        <div class="card-header">Color Details Informations</div>
        <div class="card-body">
            <p>Title: {{ $color->title ?? '' }}</p>
        </div>
        <div class="card-footer m-auto">
            <a class="btn btn-sm btn-primary" href="{{ route('color.index') }}"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>

@endsection
