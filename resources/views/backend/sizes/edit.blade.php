@extends('backend.layouts.master')

@section('main_content')

@include('backend.layouts.includes.message')


<div class="container">
    <div class="card">
        <div class="card-header">Edit Size</div>
        <div class="card-body">
            <form action="{{ route('size.update', $size->id) }}" method="POST">
                @csrf
                <div>
                    <label class="form-label">Size</label>
                    <input type="text" name="title" class="form-control" value="{{ $size->title }}">
                    @error('title')
                    <div class="text-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $size->description }}">
                    @error('description')
                    <div class="text-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="bi bi-check"></i> Save</button>
                <a href="{{ route('size.index') }}" class="btn btn-sm btn-danger mt-3"><i class="bi bi-x"></i> Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection