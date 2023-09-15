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
    public function index(Request $request){
        $categories = Category::when($request->name != null, function($q) use ($request){
            return $q->where('name', 'like', '%'.$request->name.'%');
        })
        ->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){
        $validatedData = $request->validated();

        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        $uploadPath = 'upload/category/';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/category/', $filename);
            $category->image = $uploadPath.$filename;
        }
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1':'0';
        $category->save();

        return redirect('admin/category')->with('message','Thêm danh mục thành công');
    }

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category){
        $validatedData = $request->validated();

        $category = Category::findOrFail($category);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if($request->hasFile('image')){

            $uploadPath = 'upload/category/';
            $path = 'upload/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/category/', $filename);
            $category->image = $uploadPath.$filename;
        }
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1':'0';
        $category->update();

        return redirect('admin/category')->with('message','Cập nhật danh mục thành công');
    }

    // public $category_id;

    // public function deleteCategory($category_id) {
    //     dd($category_id);
    //     $this->category_id = $category_id;
    // }
    public function destroy(int $category_id){
        $category = Category::find($category_id);
        $path = 'upload/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        // session()->flash('message','Xóa danh mục thành công');
        // $this->dispatchBrowserEvent('close-modal');
        return redirect('/admin/category')->with('message','Xóa danh mục thành công');
    }
}
