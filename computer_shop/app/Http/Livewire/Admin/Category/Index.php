<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($category_id) {
        //dd($category_id);
        $this->category_id = $category_id;
    }

    public function destroyCategory(){
        $category = Category::find($this->category_id);
        $path = 'upload/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('message','Xóa danh mục thành công');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render(Request $request)
    {
        $categories = Category::orderBy('id','DESC')
        // ->when($request->name != null, function($q) use ($request){
        //     return $q->where('name',$request->name);
        // })
        ->paginate(10);
        return view('livewire.admin.category.index',['categories' => $categories]);
    }
}
