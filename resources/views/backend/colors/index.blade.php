@extends('backend.layouts.master')


@section('main_content')


@include('backend.layouts.includes.message')


    <div class="container">

        <div class="card">
            <div class="card-header d-flex">
                Color Lists
                <a class="btn btn-sm btn-outline-primary ms-5" href="{{ route('color.create') }}">Add New Color</a>
                <div>
                    <a class="btn btn-sm btn-primary ms-5" href="{{ route('color.pdf') }}" target="_blank">PDF</a>
                    <a class="btn btn-sm btn-success" href="{{ route('color.excel') }}" target="_blank">EXCEL</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('color.trashlist') }}">TRASH BIN</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Ser No</th>
                            <th scope="col">Color</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sl=1;
                        @endphp
                        @foreach ($colors as $color)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td>{{ $color->title ?? '' }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('color.show', $color->id) }}">Details</a>
                                <a class="btn btn-sm btn-warning" href="{{ route('color.edit', $color->id) }}">Edit</a>
                                <form action="{{ route('color.destroy', $color->id) }}" method="POST" style="display: inline">
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
