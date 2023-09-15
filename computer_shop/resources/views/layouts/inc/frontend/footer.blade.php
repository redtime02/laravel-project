<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{ $appSetting->website_name ?? 'website_name' }}</h4>
                    <div class="footer-underline"></div>
                    <p>

                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Đường Dẫn</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trang Chủ</a></div>
                    <div class="mb-2"><a href="{{ url('/about-us') }}" class="text-white">Giới Thiệu</a></div>
                    <div class="mb-2"><a href="{{ url('/contact-us') }}" class="text-white">Liên Hệ</a></div>
                    <div class="mb-2"><a href="{{ url('/blogs') }}" class="text-white">Tin Tức</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Mua Ngay</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Toàn Bộ Sản Phẩm</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Các Sản Phẩm Bán Chạy</a></div>
                    <div class="mb-2"><a href="{{ url('/new-arrivals') }}" class="text-white">Các Sản Phẩm Mới</a></div>
                    <div class="mb-2"><a href="{{ url('/featured-products') }}" class="text-white">Các Sản Phẩm Nổi Bật</a></div>
                    <div class="mb-2"><a href="{{ url('/cart') }}" class="text-white">Giỏ Hàng</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Liên Hệ Với Chúng Tôi</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{ $appSetting->address ?? 'address' }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? 'phone1' }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'email1' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <p class=""> &copy; 2022 - Computer Shop. All rights reserved.</p>
                </div>
                <div class="col-md-5">
                    <div class="social-media">
                        Get Connected:
                        {{ $appSetting->website_name ?? 'website_name' }}
                        @if ($appSetting->facebook)
                        <a href="{{ $appSetting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if ($appSetting->twitter)
                        <a href="{{ $appSetting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if ($appSetting->instagram)
                        <a href="{{ $appSetting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if ($appSetting->youtube)
                        <a href="{{ $appSetting->youtube }}" target="_blank"><i class="fa fa fa-youtube"></i></a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
