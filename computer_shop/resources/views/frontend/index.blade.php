@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')

<div class="container">

    <div id="carouselExampleCaptions" class="carousel slide" data-mdb-ride="carousel">
    {{-- <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div> --}}
    <div class="carousel-inner">
        @foreach ($sliders as $key => $sliderItem)
        <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
            @if ($sliderItem->image)
            <img src="{{ asset("$sliderItem->image") }}" style="height:500px; width:500px" class="d-block w-100" alt="...">
            @endif
            {{-- <div class="carousel-caption d-none d-md-block">
                <h5>{{ $sliderItem->title }}</h5>
                <p>{{ $sliderItem->description }}</p>
            </div> --}}
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>
                        {!! $sliderItem->title !!}
                    </h1>
                    <p>
                        {!! $sliderItem->description !!}
                    </p>
                    <div>
                        <a href="{{ url('collections') }}" class="btn btn-slider">
                            Mua Ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

  <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Các sản phẩm đang bán chạy</h4>
                <div class="underline mb-4"></div>
            </div>

            @if($trendingProducts)
            <div class="col-md-12">
                <div class="owl-carousel owl-theme four-carousel">
                @foreach ($trendingProducts as $productItem)
                    <div class="item">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>

                                @if ($productItem->productImages->count() > 0)
                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                    <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}" style="height:180px">
                                </a>
                                @endif

                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                   <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        {{ $productItem->name }}
                                   </a>
                                </h5>
                                <div>
                                    <span class="selling-price">{{ $productItem->selling_price }} VND</span>
                                    <span class="original-price">{{ $productItem->original_price }} VND</span>
                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>Không có sản phẩm bán chạy nào</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
  </div>

  <div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Các sản phẩm mới nhất
                    <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">Xem Thêm</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>

            @if($newArrivalsProducts)
            <div class="col-md-12">
                <div class="owl-carousel owl-theme four-carousel">
                @foreach ($newArrivalsProducts as $productItem)
                    <div class="item">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>

                                @if ($productItem->productImages->count() > 0)
                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                    <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}" style="height:180px">
                                </a>
                                @endif

                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                   <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        {{ $productItem->name }}
                                   </a>
                                </h5>
                                <div>
                                    <span class="selling-price">{{ $productItem->selling_price }} VND</span>
                                    <span class="original-price">{{ $productItem->original_price }} VND</span>
                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>Không có sản phẩm mới nào</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
  </div>

  <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Các sản phẩm nổi bật
                    <a href="{{ url('featured-products') }}" class="btn btn-warning float-end">Xem Thêm</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>

            @if($featuredProducts)
            <div class="col-md-12">
                <div class="owl-carousel owl-theme four-carousel">
                @foreach ($featuredProducts as $productItem)
                    <div class="item">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>

                                @if ($productItem->productImages->count() > 0)
                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                    <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}" style="height:180px">
                                </a>
                                @endif

                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                   <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        {{ $productItem->name }}
                                   </a>
                                </h5>
                                <div>
                                    <span class="selling-price">{{ $productItem->selling_price }} VND</span>
                                    <span class="original-price">{{ $productItem->original_price }} VND</span>
                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>Không có sản phẩm nổi bật nào</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
  </div>

@endsection

@section('script')

<script>
    $('.four-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:true,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>

@endsection
