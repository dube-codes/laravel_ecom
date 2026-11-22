@extends('layouts.admin')

@section('content')

    <div class="card mt-5">
        <div class="card-header">
            <div class="mb-0">
                Categories
                <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary float-end">Create Categories</a>
            </div>
        </div>

        <div class="card-body">
            @session('status')
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endsession

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Categories Name</th>
                        <th>Status</th>
                        <th>Popular</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td scope="row"> {{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->status == 0 ? 'Show' : 'Hide' }}</td>
                            <td>{{ $item->popular == 1 ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('categories.show', $item->id) }}" class="btn btn-info btn-small">Show</a>
                                <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-info btn-warning">Edit</a>
                                {{-- <a href="{{ route('categories.show') }}" class="btn btn-danger btn-small">Delete</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection