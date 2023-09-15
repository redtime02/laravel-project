<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status','0')->get();
        $trendingProducts = Product::where('trending','1')->latest()->take(15)->get();
        $newArrivalsProducts = Product::latest()->take(14)->get();
        $featuredProducts = Product::where('featured','1')->latest()->take(14)->get();
        return view('frontend.index', compact('sliders', 'trendingProducts','newArrivalsProducts','featuredProducts'));
    }

    public function categories(){
        $categories = Category::where('status','0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug){
        $category = Category::where('slug',$category_slug)->first();
        if($category){

            return view('frontend.collections.products.index', compact('category'));
        }else {
            return redirect()->back();
        }

    }

    public function productView(string $category_slug, string $product_slug){
        $category = Category::where('slug',$category_slug)->first();
        if($category){
            $product = $category->products()->where('slug',$product_slug)->where('status','0')->first();
            if($product){
                return view('frontend.collections.products.view', compact('product','category'));
            }else {
                return redirect()->back();
            }

        }else {
            return redirect()->back();
        }
    }

    public function newArrival(){
        $newArrivalsProducts = Product::latest()->take(16)->get();
        return view('frontend.pages.new-arrival', compact('newArrivalsProducts'));
    }

    public function featuredProducts(){
        $featuredProducts = Product::where('featured','1')->latest()->get();
        return view('frontend.pages.featured-products', compact('featuredProducts'));
    }
    public function thankyou(){
        return view('frontend.thank-you');
    }

    public function productList(){
        $products = Product::select('name')->where('status','0')->get();
        $data = [];
        foreach ($products as $item){
            $data[] = $item['name'];
        }
        return $data;
    }

    public function searchProducts(Request $request){
        if($request->search){
            $searchProducts = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProducts'));
        } else {
            return redirect()->back()->with('message','Không tìm thấy sản phẩm');
        }
    }
    public function aboutUs(){
        return view('frontend.pages.aboutus');
    }

    public function blogs(){
        return view('frontend.pages.blogs');
    }
}
