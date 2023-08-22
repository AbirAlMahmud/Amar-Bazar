@extends('backend.layouts.master')


@section('main_content')

@include('backend.layouts.includes.message')


    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Category Lists
                <a class="btn btn-sm btn-outline-primary ms-5" href="{{ route('category.create') }}">Add New Category</a>
                <div>
                    <a class="btn btn-sm btn-primary ms-5" href="{{ route('category.pdf') }}" target="_blank">PDF</a>
                    <a class="btn btn-sm btn-success" href="{{ route('category.excel') }}" target="_blank">EXCEL</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('category.trashlist') }}">TRASH BIN</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Ser No</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sl=1;
                        @endphp
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td>{{ $category->title ?? '' }}</td>
                            <td>{{ $category->description ?? '' }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('category.show', $category->id) }}">Details</a>
                                <a class="btn btn-sm btn-warning" href="{{ route('category.edit', $category->id) }}">Edit</a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
