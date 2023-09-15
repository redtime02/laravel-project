@extends('layouts.app')

@section('title', 'Sản phẩm mới')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Danh sách sản phẩm mới</h4>
                <div class="underline mb-4"></div>
            </div>

            @forelse ($newArrivalsProducts as $productItem)
            <div class="col-md-3">
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
            @empty
                <div class="col-md-12 p-2">
                    <h4>Không có sản phẩm mới nào</h4>
                </div>
            @endforelse

            <div class="text-center">
                <a href="{{ url('collections') }}" class="btn btn-warning px-3">Xem thêm</a>
            </div>

        </div>
    </div>
  </div>

@endsection
