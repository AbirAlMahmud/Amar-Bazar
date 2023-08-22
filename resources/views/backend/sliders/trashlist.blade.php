@extends('backend.layouts.master')


@section('main_content')

@include('backend.layouts.includes.message')


    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Slider Trash Lists
                <a class="btn btn-sm btn-outline-danger ms-5" href="{{ route('slider.restoreall') }}">Restore All</a>
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
                                <a class="btn btn-sm btn-primary" href="{{ route('slider.restore', $slider->id) }}"><i class="bi bi-arrow-repeat"></i> Restore</a>
                                <form action="{{ route('slider.delete', $slider->id) }}" method="POST" style="display: inline">
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
