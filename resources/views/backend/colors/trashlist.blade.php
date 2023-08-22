@extends('backend.layouts.master')


@section('main_content')

@include('backend.layouts.includes.message')


    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Color Trash Lists
                <a class="btn btn-sm btn-outline-danger ms-5" href="{{ route('color.restoreall') }}">Restore All</a>
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
                                <a class="btn btn-sm btn-primary" href="{{ route('color.restore', $color->id) }}"><i class="bi bi-arrow-repeat"></i> Restore</a>
                                <form action="{{ route('color.delete', $color->id) }}" method="POST" style="display: inline">
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
