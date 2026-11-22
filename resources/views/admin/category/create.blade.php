@extends('layouts.admin')

@section('content')

    <div class="card mt-5">
        <div class="card-header">
            <div class="mb-0">
                Add Categories
                <a href="{{ url('/admin/categories') }}" class="btn btn-danger float-end">Back</a>
            </div>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="col-md-12">
                        <label for="">Desciption</label>
                        <textarea type="text" name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <select class="form-control" name="status" id="statsu">
                            <option value="">__Select Status__</option>
                            <option value="0">Show</option>
                            <option value="1">Hide</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular" value="1" /> Check if you want to as Popular
                    </div>
                    <div class="col-md-12">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-12 mt-4">
                        <h4>SEO Details:-</h4>
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Desciption</label>
                        <textarea type="text" name="meta_description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Keyword</label>
                        <textarea type="text" name="meta_keyword" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-12 text-end mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection