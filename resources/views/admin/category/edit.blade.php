@extends('layouts.admin')

@section('content')

    <div class="card mt-5">
        <div class="card-header">
            <div class="mb-0">
                Edit Categories
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

            <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Category Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" />
                    </div>
                    <div class="col-md-12">
                        <label for="">Desciption</label>
                        <textarea type="text" name="description" class="form-control"
                            rows="3">{!! $category->description !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <select class="form-control" name="status" id="statsu">
                            <option value="">__Select Status__</option>
                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Show</option>
                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Hide</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular" value="1" {{ $category->popular == 1 ? 'checked' : '' }} />
                        Check
                        if you want to as Popular
                    </div>
                    <div class="col-md-12">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                        @if ($category->image)
                            <img src="{{ asset('uploads/category/' . $category->image) }}" width="100" height="100">
                        @else
                            No Image Uploaded
                        @endif
                    </div>

                    <div class="col-md-12 mt-4">
                        <h4>SEO Details:-</h4>
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Desciption</label>
                        <textarea type="text" name="meta_description" class="form-control"
                            rows="3">{!! $category->meta_description !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Keyword</label>
                        <textarea type="text" name="meta_keyword" class="form-control"
                            rows="3">{!! $category->meta_keyword !!}</textarea>
                    </div>
                    <div class="col-md-12 text-end mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection