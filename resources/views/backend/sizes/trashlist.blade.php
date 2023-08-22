@extends('backend.layouts.master')


@section('main_content')

@include('backend.layouts.includes.message')


    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Size Trash Lists
                <a class="btn btn-sm btn-outline-danger ms-5" href="{{ route('size.restoreall') }}">Restore All</a>
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
                            <td>{{ $size->description ?? 'No Description Set' }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('size.restore', $size->id) }}"><i class="bi bi-arrow-repeat"></i> Restore</a>
                                <form action="{{ route('size.delete', $size->id) }}" method="POST" style="display: inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash"></i> Permanent Delete</button>
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
