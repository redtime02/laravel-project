<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(Request $request){
        $sliders = Slider::when($request->ssearch != null, function($q) use ($request){
            return $q->where('title', 'like', '%'.$request->ssearch.'%');
        })
        ->paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request){
        $validatedData = $request->validated();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('upload/slider/',$filename);
            $validatedData['image'] = "upload/slider/$filename";
        }

        $validatedData['status'] = $request->status == true ? '1':'0';

        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/sliders')->with('message','Thêm thanh trượt thành công');
    }

    public function edit(Slider $slider){
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(SliderFormRequest $request ,Slider $slider){
        $validatedData = $request->validated();

        if($request->hasFile('image')){

            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('upload/slider/',$filename);
            $validatedData['image'] = "upload/slider/$filename";
        }

        $validatedData['status'] = $request->status == true ? '1':'0';

        Slider::where('id',$slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $slider->image,
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/sliders')->with('message','Cập nhật thanh trượt thành công');
    }

    public function destroy(Slider $slider){
        if($slider->count() > 0){
            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $slider->delete();
            return redirect('admin/sliders')->with('message','Xóa thanh trượt thành công');
        }

        return redirect('admin/sliders')->with('message','Đã có lỗi xảy ra');
    }
}
