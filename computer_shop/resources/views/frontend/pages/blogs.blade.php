@extends('layouts.app')

@section('title', 'Tin tức')

@section('content')

<div class="container ">
    <div class="row">
        <div class="col-9">

            <div class="news__col">
                <div class="news__card">
                    <div class="news__left__item ">
                        <a class="news__left__item-img"
                            href="https://fptshop.com.vn/tin-tuc/for-gamers/4-chiec-laptop-do-hoa-danh-cho-nhung-ai-yeu-thich-thuong-hieu-dell-151663">
                            <img src="{{ asset('assets/img/tintuc/638041246567489231_dell-inspiron-n5420-cover-1.webp') }}"
                                alt="">
                        </a>
                        <a
                            href="https://fptshop.com.vn/tin-tuc/for-gamers/4-chiec-laptop-do-hoa-danh-cho-nhung-ai-yeu-thich-thuong-hieu-dell-151663" class="text-decoration-none">
                            <h3 class="news__left__item--title">4 chiếc Laptop đồ họa dành cho những ai yêu
                                thích thương hiệu Dell</h3>
                        </a>
                        <p class="news__left--item--time">0-1 ngày trước </p>
                    </div>
                    <div class="news__right__item">
                        <div class="news__hor--item">
                            <a class="news__hor--item--img" href="">
                                <img src="{{ asset('assets/img/tintuc/xiaomi.webp') }}" alt="">
                            </a>

                            <div class="news__hor--item--info">
                                <a
                                    href="https://fptshop.com.vn/tin-tuc/danh-gia/xiaomi-12t-pro-lieu-co-xung-dang-voi-so-tien-bo-ra-151642" class="text-decoration-none">
                                    <h3 class="news__hor--item--title">Xiaomi 12T Pro: Liệu có xứng đáng với
                                        số
                                        tiền bỏ ra? </h3>
                                </a>
                                <p class="news__hor--item--time">0 - 1 ngày trước </p>
                            </div>
                        </div>
                        <div class="news__hor--item">
                            <a class="news__hor--item--img" href="">
                                <img src="{{ asset('assets/img/tintuc/taskbar.webp') }}" alt="">
                            </a>

                            <div class="news__hor--item--info">
                                <a
                                    href="https://fptshop.com.vn/tin-tuc/thu-thuat/thu-thuat-lam-cho-thanh-taskbar-nho-hon-trong-windows-11-151605" class="text-decoration-none">
                                    <h3 class="news__hor--item--title">
                                        Thủ thuật làm cho thanh Taskbar nhỏ hơn trong Windows 11</h3>
                                </a>
                                <p class="news__hor--item--time">0 - 2 ngày trước </p>
                            </div>
                        </div>
                        <div class="news__hor--item">
                            <a class="news__hor--item--img" href="">
                                <img src="{{ asset('assets/img/tintuc/sleep-windows-11.webp') }}" alt="">
                            </a>

                            <div class="news__hor--item--info">
                                <a
                                    href="https://fptshop.com.vn/tin-tuc/thu-thuat/neu-khong-muon-su-dung-hay-tat-che-do-sleep-windows-11-de-may-luon-chay-on-dinh-151604" class="text-decoration-none">
                                    <h3 class="news__hor--item--title">Nếu không muốn sử dụng, hãy tắt chế
                                        độ Sleep Windows 11 để máy luôn chạy ổn định</h3>
                                </a>
                                <p class="news__hor--item--time">0 - 2 ngày trước </p>
                            </div>
                        </div>
                        <div class="news__hor--item">
                            <a class="news__hor--item--img" href="">
                                <img src="{{ asset('assets/img/tintuc/smartphone-galaxy-cover.webp') }}" alt="">
                            </a>

                            <div class="news__hor--item--info">
                                <a
                                    href="https://fptshop.com.vn/tin-tuc/danh-gia/khi-nao-thi-cac-smartphone-samsung-tiep-theo-se-ra-mat-151538" class="text-decoration-none">
                                    <h3 class="news__hor--item--title">Khi nào thì các smartphone Samsung
                                        Galaxy tiếp theo sẽ ra mắt? </h3>
                                </a>
                                <p class="news__hor--item--time">0- 2 ngày trước </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 ">
            <div class="card__header">
                <h2 class="car__title">Xem nhiều</h2>
            </div>
            <div class="card__body">
                <ul class="news__mostView">
                    <li>
                        <span>1</span>
                        <a
                            href="https://fptshop.com.vn/tin-tuc/danh-gia/5-san-pham-da-bi-apple-ngung-san-xuat-trong-nam-nay-151497" class="text-decoration-none">
                            <h3 class="">5 sản phẩm đã bị Apple ngừng sản xuất trong năm nay </h3>
                        </a>
                    </li>
                    <li>
                        <span>2</span>
                        <a
                            href="https://fptshop.com.vn/tin-tuc/danh-gia/iphone-se-4-co-gi-moi-thiet-ke-tran-vien-chip-a16-151530" class="text-decoration-none">
                            <h3> iPhone SE 4 có gì mới: Thiết kế tràn viền, chip A16 và sử dụng Face ID?
                            </h3>
                        </a>
                    </li>
                    <li>
                        <span>3</span>
                        <a
                            href="https://fptshop.com.vn/tin-tuc/tin-moi/apple-bat-ngo-phat-hanh-ios-16-1-1-va-ipados-16-1-1-de-sua-cac-loi-con-ton-dong-151495" class="text-decoration-none">
                            <h3>Apple bất ngờ phát hành iOS 16.1.1 và iPadOS 16.1.1 để sửa các lỗi còn tồn
                                đọng </h3>
                        </a>
                    </li>
                    <li>
                        <span>4</span>
                        <a
                            href="https://fptshop.com.vn/tin-tuc/danh-gia/6-san-pham-sang-tao-nhat-the-ky-21-cua-apple-151503" class="text-decoration-none">
                            <h3>6 sản phẩm sáng tạo nhất thế kỷ 21 của Apple</h3>
                        </a>
                    </li>
                    <li>
                        <span>5</span>
                        <a
                            href="https://fptshop.com.vn/tin-tuc/thu-thuat/vi-sao-bieu-tuong-pin-iphone-lai-chuyen-sang-mau-vang-151588" class="text-decoration-none">
                            <h3>Vì sao biểu tượng pin iPhone lại chuyển sang màu vàng?</h3>
                        </a>

                    </li>
                    <li>
                        <span>6</span>
                        <a
                            href="https://fptshop.com.vn/tin-tuc/thu-thuat/neu-khong-thich-menu-show-more-options-windows-11-ban-co-the-tro-ve-menu-cu-bang-cach-nay-151537" class="text-decoration-none">
                            <h3>Nếu không thích menu Show more options Windows 11, bạn có thể trở về menu cũ
                                bằng cách này</h3>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- newupdate -->
<div class="tdc-row">
    <div class="news__update p-5">
        <div class="news__update--column">
            <div class="title__wrap">
                <h4 class="td-title__wrap">
                    <span class=""> MỚI CẬP NHẬT</span>
                </h4>
            </div>
            <div class="td__iner">
                <div class="td__module">
                    <div class="td__module--thumb">
                        <a class="td__image--wrap" href="">
                            <img class="img--module" src="{{ asset('assets/img/tintuc/tincapnhat/retrogame.jpg') }}"
                                alt="">
                        </a>
                    </div>
                    <div class="item__details">
                        <h3 class="td__module--title">
                            <a href="" class="text-decoration-none">Vì cũ mà vẫn hay, hướng dẫn chơi lại các tựa game xưa miễn phí ngay
                                trên
                                trình duyệt</a>
                        </h3>
                        <div class="td__module--info">
                            <span class="td-post-author-name">Axium Fox</span>
                            <span class="td-post-date">- 16/11/2022</span>
                            <div class="td-excerpt"> Hướng dẫn chơi lại các tựa game xưa cũ siêu hay một
                                thời
                                chúng ta từng mê mệt. Không phủ nhận việc các tựa game xưa cũ dù đã có...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="td__module">
                    <div class="td__module--thumb">
                        <a class="td__image--wrap"
                            href="https://gvn360.com/cong-nghe/corsair-cong-bo-dai-san-pham-tuong-thich-voi-card-do-hoa-nvidia-rtx-40-series/">
                            <img class="img--module" src="{{ asset('assets/img/tintuc/tincapnhat/Corsair.jpg') }}"
                                alt="">
                        </a>
                    </div>
                    <div class="item__details">
                        <h3 class="td__module--title">
                            <a
                                href="https://gvn360.com/cong-nghe/corsair-cong-bo-dai-san-pham-tuong-thich-voi-card-do-hoa-nvidia-rtx-40-series/" class="text-decoration-none">Corsair
                                công bố dải sản phẩm tương thích với card đồ họa NVIDIA RTX 40
                                series</a>
                        </h3>
                        <div class="td__module--info">
                            <span class="td-post-author-name">Axium Fox</span>
                            <span class="td-post-date">- 16/11/2022</span>
                            <div class="td-excerpt"> Hướng dẫn chơi lại các tựa game xưa cũ siêu hay một
                                thời
                                chúng ta từng mê mệt. Không phủ nhận việc các tựa game xưa cũ dù đã có...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="td__module">
                    <div class="td__module--thumb">
                        <a class="td__image--wrap"
                            href="https://gvn360.com/cong-nghe/moi-ban-chung-kien-suc-manh-khung-khiep-cua-7-con-card-rtx-4090-ngon-gan-3000w-dien/">
                            <img class="img--module" src="{{ asset('assets/img/tintuc/tincapnhat/GTX.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="item__details">
                        <h3 class="td__module--title">
                            <a
                                href="https://gvn360.com/cong-nghe/moi-ban-chung-kien-suc-manh-khung-khiep-cua-7-con-card-rtx-4090-ngon-gan-3000w-dien/" class="text-decoration-none">Mời
                                bạn chứng kiến sức mạnh khủng khiếp của 7 con card RTX 4090 ngốn gần 3000W
                                điện
                            </a>
                        </h3>
                        <div class="td__module--info">
                            <span class="td-post-author-name">Axium Fox</span>
                            <span class="td-post-date">- 17/11/2022</span>
                            <div class="td-excerpt">Nvidia RTX 4090 quả thật là một con quái vật ngốn điện,
                                và
                                bây giờ đã có dàn máy gắn tới 7 con quái vật này các bạn ạ. NVIDIA...</div>
                        </div>
                    </div>
                </div>
                <div class="td__module">
                    <div class="td__module--thumb">
                        <a class="td__image--wrap"
                            href="https://gvn360.com/cong-nghe/tong-hop-pc-custom-p-78-moi-cac-ban-chiem-nguong-1/">
                            <img class="img--module" src="{{ asset('assets/img/tintuc/tincapnhat/pccustom.jpg') }}"
                                alt="">
                        </a>
                    </div>
                    <div class="item__details">
                        <h3 class="td__module--title">
                            <a
                                href="https://gvn360.com/cong-nghe/tong-hop-pc-custom-p-78-moi-cac-ban-chiem-nguong-1/" class="text-decoration-none">Tổng
                                hợp PC custom (P.78), mời các bạn chiêm ngưỡng</a>
                        </h3>
                        <div class="td__module--info">
                            <span class="td-post-author-name">Axium Fox</span>
                            <span class="td-post-date">- 18/11/2022</span>
                            <div class="td-excerpt">Sau đây là bài tổng hợp 5 bộ PC custom đẹp nhất trong
                                tuần
                                P.78 được độ bởi các modder tài ba mà mình sưu tầm được, mời các...</div>
                        </div>
                    </div>
                </div>
                <div class="td__module">
                    <div class="td__module--thumb">
                        <a class="td__image--wrap"
                            href="https://gvn360.com/cong-nghe/ro-ri-benchmark-ryzen-9-7845hx-apu-mobile-gaming-co-nhieu-nhan-hieu-nang-cao-nhat-tu-truoc-den-nay/">
                            <img class="img--module" src="{{ asset('assets/img/tintuc/tincapnhat/admryzen9.jpg') }}"
                                alt="">
                        </a>
                    </div>
                    <div class="item__details">
                        <h3 class="td__module--title">
                            <a
                                href="https://gvn360.com/cong-nghe/ro-ri-benchmark-ryzen-9-7845hx-apu-mobile-gaming-co-nhieu-nhan-hieu-nang-cao-nhat-tu-truoc-den-nay/" class="text-decoration-none">Rò
                                rỉ benchmark Ryzen 9 7845HX – APU mobile gaming có nhiều nhân “hiệu năng
                                cao”
                                nhất từ trước đến nay</a>
                        </h3>
                        <div class="td__module--info">
                            <span class="td-post-author-name">Axium Fox</span>
                            <span class="td-post-date">- 17/11/2022</span>
                            <div class="td-excerpt"> AMD Ryzen 9 7845HX có tới 12 nhân 24 luồng, và đây sẽ
                                là
                                APU Ryzen HX đầu tiên được trang bị nhiều hơn 8 nhân. Có một con APU...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="td__module">
                    <div class="td__module--thumb">
                        <a class="td__image--wrap"
                            href="https://gvn360.com/cong-nghe/corsair-cong-bo-dai-san-pham-tuong-thich-voi-card-do-hoa-nvidia-rtx-40-series/">
                            <img class="img--module" src="{{ asset('assets/img/tintuc/tincapnhat/itelcore13.jpg') }}"
                                alt="">
                        </a>
                    </div>
                    <div class="item__details">
                        <h3 class="td__module--title">
                            <a
                                href="https://gvn360.com/cong-nghe/corsair-cong-bo-dai-san-pham-tuong-thich-voi-card-do-hoa-nvidia-rtx-40-series/" class="text-decoration-none">Rò
                                rỉ dòng CPU mobile Intel Raptor Lake-HX cao cấp, dẫn đầu là Core i9-13900HX
                                với
                                24 nhân và xung 5,4GHz</a>
                        </h3>
                        <div class="td__module--info">
                            <span class="td-post-author-name">Axium Fox</span>
                            <span class="td-post-date">- 16/11/2022</span>
                            <div class="td-excerpt"> Những con chip Intel Raptor Lake-HX sở hữu thông số khá
                                là
                                ấn tượng các bạn ạ. Tiếp nối CPU Intel thế hệ 12 Alder Lake-HX, Raptor
                                Lake-HX
                                sẽ sử...</div>
                        </div>
                    </div>
                </div>
                <div class="td__module">
                    <div class="td__module--thumb">
                        <a class="td__image--wrap"
                            href="https://gvn360.com/cong-nghe/nvidia-khang-dinh-cong-nguon-16-pin-bi-chay-la-do-nguoi-dung-cam-khong-chat/">
                            <img class="img--module" src="{{ asset('assets/img/tintuc/tincapnhat/nvidia.jpg') }}"
                                alt="">
                        </a>
                    </div>
                    <div class="item__details">
                        <h3 class="td__module--title">
                            <a
                                href="https://gvn360.com/cong-nghe/nvidia-khang-dinh-cong-nguon-16-pin-bi-chay-la-do-nguoi-dung-cam-khong-chat/" class="text-decoration-none">Nvidia
                                khẳng định cổng nguồn 16-pin bị cháy là do người dùng cắm không chặt</a>
                        </h3>
                        <div class="td__module--info">
                            <span class="td-post-author-name">Axium Fox</span>
                            <span class="td-post-date">- 19/11/2022</span>
                            <div class="td-excerpt">Nvidia ghi nhận tới 50 trường hợp bị cháy cổng nguồn
                                16-pin các bạn ạ. Sau vài tuần phân tích các trường hợp bị cháy đầu cắm
                                nguồn 16-pin 12VHPWR...
                            </div>
                        </div>
                    </div>
                </div>
                <!-- loadmore -->
                <div class="none__more">
                    <div class="td__module td__module-wrap">
                        <div class="td__module--thumb">
                            <a class="td__image--wrap"
                                href="https://gvn360.com/cong-nghe/amd-cong-bo-thong-so-cua-card-rx-7900-series-san-tien-so-gang-voi-nvidia-rtx-4080-1/">
                                <img class="img--module" src="{{ asset('assets/img/tintuc/tincapnhat/admrx7900.jpg') }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="item__details">
                            <h3 class="td__module--title">
                                <a
                                    href="https://gvn360.com/cong-nghe/amd-cong-bo-thong-so-cua-card-rx-7900-series-san-tien-so-gang-voi-nvidia-rtx-4080-1/" class="text-decoration-none">AMD
                                    công bố thông số của card RX 7900 series, sẵn tiện so găng với
                                    Nvidia
                                    RTX
                                    4080Ts</a>
                            </h3>
                            <div class="td__module--info">
                                <span class="td-post-author-name">Axium Fox</span>
                                <span class="td-post-date">- 16/11/2022</span>
                                <div class="td-excerpt">AMD Radeon RX 7900 series sẽ là đối thủ đáng gờm
                                    của
                                    Nvidia
                                    GeForce RTX 4080 đó nha. Vừa rồi, AMD đã có một buổi thuyết trình về
                                    thông
                                    số...
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="td__module td__module-wrap">
                        <div class="td__module--thumb">
                            <a class="td__image--wrap"
                                href="https://gvn360.com/cong-nghe/lo-bang-chung-cho-thay-sony-hung-thu-voi-nft-va-blockchain-ke-thu-khong-doi-troi-chung-cua-game-thu/">
                                <img class="img--module" src="{{ asset('assets/img/tintuc/tincapnhat/sonynft.jpg') }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="item__details">
                            <h3 class="td__module--title">
                                <a
                                    href="https://gvn360.com/cong-nghe/lo-bang-chung-cho-thay-sony-hung-thu-voi-nft-va-blockchain-ke-thu-khong-doi-troi-chung-cua-game-thu/" class="text-decoration-none">Lộ
                                    bằng chứng cho thấy Sony hứng thú với NFT và blockchain – kẻ thù không
                                    đội trời chung của game thủT</a>
                            </h3>
                            <div class="td__module--info">
                                <span class="td-post-author-name">Axium Fox</span>
                                <span class="td-post-date">- 16/11/2022</span>
                                <div class="td-excerpt">Mặc dù thời gian qua game thủ đã phản đối sự xuất
                                    hiện của NFT trong game một cách kịch liệt, có vẻ Sony lại có suy nghĩ
                                    ngược...
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="td__load--more">
                        <a class="td__load--more-click" onclick="click__more()">
                            Xem thêm
                            <i class="fa-solid fa-caret-down"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="post__banner p-2">
        <div class="post__wrapper">
            <div class="post__wapper--banner">
                <a
                    href="https://gearvn.com/collections/laptop-asus-tuf-gaming-series?utm_source=website&utm_medium=banner&utm_campaign=gvn360">
                    <img class="img__banner" src="{{ asset('assets/img/tintuc/tincapnhat/Gear_300x600.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>

</div>

@endsection
