<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();

            $filename = time() . '.' . $imgExt;
            $path = public_path('uploads/category');
            File::ensureDirectoryExists($path);
            $file->move($path, $filename);

            $data['image'] = $filename;
        }

        Category::create($data);

        return redirect('/admin/categories')->with('status', 'Category Created.!');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            if (File::exists($category->image)) {
                File::delete($category->image);
            }

            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();

            $filename = time() . '.' . $imgExt;
            $path = public_path('uploads/category');
            File::ensureDirectoryExists($path);
            $file->move($path, $filename);

            $data['image'] = $filename;
        }

        $category->update($data);

        return redirect('/admin/categories')->with('status', 'Category Updated.!');
    }

    // private function storeImage(UploadedFile $file): string
    // {
    //     $filename = time() . '.' . $file->getClientOriginalExtension();
    //     $path = public_path('uploads/category');
    //     File::ensureDirectoryExists($path);
    //     $file->move($path, $filename);

    //     return $filename;
    // }
}
