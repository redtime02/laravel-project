<div>
    <div class="row">
        <div class="col-md-3">
            @if ($category->brands)
            <div class="card">
                <div class="card-header"><h4>Hãng sản xuất</h4></div>
                <div class="card-body">
                    @foreach ($category->brands as $brandItem)
                    <label for="" class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}"/> {{ $brandItem->name }}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="card mt-3">
                <div class="card-header"><h4>Giá cả</h4></div>
                <div class="card-body">
                    <label for="" class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="high-to-low"/> Cao đến Thấp
                    </label>
                    <label for="" class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="low-to-high"/> Thấp đến Cao
                    </label>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productItem)

                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if ($productItem->quantity > 0)
                            <label class="stock bg-success">Còn hàng</label>
                            @else
                            <label class="stock bg-danger">Hết hàng</label>
                            @endif

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
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Không có sản phẩm nào thuộc danh mục {{ $category->name }}</h4>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
