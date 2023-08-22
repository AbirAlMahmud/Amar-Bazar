@extends('backend.layouts.master')


@section('main_content')

@include('backend.layouts.includes.message')


    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Users Lists
                <a class="btn btn-sm btn-outline-primary ms-5" href="">Add New User</a>
                <div>
                    <a class="btn btn-sm btn-primary ms-5" href="" target="_blank">PDF</a>
                    <a class="btn btn-sm btn-success" href="" target="_blank">EXCEL</a>
                    <a class="btn btn-sm btn-warning" href="">TRASH BIN</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Ser No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sl=1;
                        @endphp
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td>{{ $user->name ?? '' }}</td>
                            <td>{{ roleName($user->role_id) }}</td>
                            <td>{{ $user->contact->phone ?? '' }}</td>
                            <td>{{ $user->contact->address ?? '' }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="">Details</a>
                                <a class="btn btn-sm btn-warning" href="">Edit</a>
                                <form action="" method="POST" style="display: inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                                <a class="btn btn-sm btn-outline-dark" href="">Update Role</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
