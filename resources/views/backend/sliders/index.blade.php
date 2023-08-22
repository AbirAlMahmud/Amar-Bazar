@extends('backend.layouts.master')


@section('main_content')

@include('backend.layouts.includes.message')


    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Slider Lists
                <a class="btn btn-sm btn-outline-primary ms-5" href="{{ route('slider.create') }}">Add New Slider</a>
                <div>
                    <a class="btn btn-sm btn-primary ms-5" href="" target="_blank">PDF</a>
                    <a class="btn btn-sm btn-success" href="" target="_blank">EXCEL</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('slider.trashlist') }}">TRASH BIN</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Ser No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sl=1;
                        @endphp
                        @foreach ($sliders as $slider)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td>{{ $slider->title ?? '' }}</td>
                            <td>
                                @if (file_exists(storage_path() . '/app/public/sliders/' . $slider->image))
                                    <img src="{{ asset('storage/sliders/' . $slider->image) }}"
                                        height="100">
                                @else
                                    iamge nai
                                    <!-- <img src="{{ asset('img/default.png') }}"> -->
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('slider.show', $slider->id) }}">Details</a>
                                <a class="btn btn-sm btn-warning" href="{{ route('slider.edit', $slider->id) }}">Edit</a>
                                <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display: inline">
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
