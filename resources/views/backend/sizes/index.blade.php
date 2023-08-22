@extends('backend.layouts.master')


@section('main_content')

@include('backend.layouts.includes.message')


    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Size Lists
                <a class="btn btn-sm btn-outline-primary ms-5" href="{{ route('size.create') }}">Add New Size</a>
                <div>
                    <a class="btn btn-sm btn-primary ms-5" href="{{ route('size.pdf') }}" target="_blank">PDF</a>
                    <a class="btn btn-sm btn-success" href="{{ route('size.excel') }}" target="_blank">EXCEL</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('size.trashlist') }}">TRASH BIN</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Ser No</th>
                            <th scope="col">Size</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sl=1;
                        @endphp
                        @foreach ($sizes as $size)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td>{{ $size->title ?? '' }}</td>
                            <td>{{ $size->description ?? 'No Price Set' }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('size.show', $size->id) }}">Details</a>
                                <a class="btn btn-sm btn-warning" href="{{ route('size.edit', $size->id) }}">Edit</a>
                                <form action="{{ route('size.destroy', $size->id) }}" method="POST" style="display: inline">
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
