@extends('layout.master')

@section('content')
@include('layout.slide')
<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105" style="margin-bottom:-92px">
	<div class="container">
		<div class="sec-title p-b-60">
			<h3 class="m-text5 t-center">
				@lang('home.newproduct')
			</h3>
			<p class="pull-left">Có tất cả {{count($new_product)}} sản phẩm</p>
		</div>
			
		<!-- Slide2 -->
		<div class="wrap-slick2">
			
			<div class="slick2">
				@foreach($new_product as $new)
				<div class="item-slick2 p-l-15 p-r-15">
					<!-- Block2 -->
					<div class="block2">
						@if($new->promotion_price !=0)
						<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
							<img src="frontend/image/product/{{$new->image}}" width="350px" height="350px">

							<div class="block2-overlay trans-0-4">
								<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
									<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
									<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
								</a>
			
								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									<a style="text-decoration: none" href="{{route('addcart',$new->id)}}">
									<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
										Thêm vào giỏ
									</button>
									</a>
								</div>
							</div>
						</div>
						@else
						<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
							<img src="frontend/image/product/{{$new->image}}" width="300px" height="350px">

							<div class="block2-overlay trans-0-4">
								<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
									<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
									<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
								</a>
			
								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									<a style="text-decoration: none" href="{{route('addcart',$new->id)}}">
									<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
										Thêm vào giỏ 
									</button>
									</a>
								</div>
							</div>
						</div>
						@endif
						<div class="block2-txt p-t-20">
							<a href="{{route('productdetail',$new->id)}}" class="block2-name dis-block s-text3 p-b-5">
								{{$new->name}}
							</a>
							@if($new->promotion_price==0)
							<span class="block2-newprice m-text8 p-r-5">
								{{number_format($new->unit_price)}} VNĐ
							</span>
							@else
							<span class="block2-oldprice m-text7 p-r-5">
								{{number_format($new->unit_price)}}VNĐ
							</span>
							<span class="block2-newprice m-text8 p-r-5">
								{{number_format($new->promotion_price)}} VNĐ
							</span>
							@endif
						</div>
						
					</div>
				</div>
				@endforeach
			</div>
		</div>

	</div>
</section>
<div class="container">
	<div class="row">       
        
                <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 786px; left: 0px; display: block;"><div class="owl-item" style="width: 393px;"><div class="item">
                    <a href="https://www.thegioididong.com/giam-soc-mua-nong" onclick="jQuery.ajax({ url: '//www.thegioididong.com/bannertracking?bid=27020&amp;r='+ (new Date).getTime(),   async: true, cache: false });"><img class=" lazyloaded" data-original="//cdn.tgdd.vn/qcao/13_04_2019_13_16_59_TGDD-maylanh-banner-desk.jpg" alt="" width="1200" height="172" src="//cdn.tgdd.vn/qcao/13_04_2019_13_16_59_TGDD-maylanh-banner-desk.jpg"></a>
                </div></div></div></div>
        <div class="owl-controls clickable" style="display: none;"><div class="owl-pagination"><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev">‹</div><div class="owl-next">›</div></div></div></div>

	</div>
</div>
<!--  Sản phẩm khuyến mãi -->
<section class="newproduct bgwhite p-t-45 p-b-105" style="margin-bottom:-92px">
	<div class="container">
		<div class="sec-title p-b-60">
			<h3 class="m-text5 t-center">
				@lang('home.saleproduct')
			</h3>
			<p class="pull-left">Có tất cả {{count($sale_product)}}  sản phẩm</p>
		</div>
			
		<!-- Slide2 -->
		<div class="wrap-slick2">
			
			<div class="slick2">
				@foreach($sale_product as $sale)
				<div class="item-slick2 p-l-15 p-r-15">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
							<img src="frontend/image/product/{{$sale->image}}" width="300px" height="350px">
							<div class="block2-overlay trans-0-4">
								<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
									<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
									<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
								</a>

								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									<a style="text-decoration: none" href="{{route('addcart',$sale->id)}}">
									<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
										Thêm vào giỏ
									</button>
									</a>
								</div>
							</div>
						</div>

						<div class="block2-txt p-t-20">
							<a href="{{route('productdetail',$sale->id)}}" class="block2-name dis-block s-text3 p-b-5">
								{{$sale->name}}
							</a>

							<span class="block2-oldprice m-text7 p-r-5">
								{{number_format($sale->unit_price)}}VNĐ
							</span>
							<span class="block2-newprice m-text8 p-r-5">
								{{number_format($sale->promotion_price)}}VNĐ
							</span>
						</div>
						
					</div>
				</div>
				@endforeach
			</div>
		</div>

	</div>
</section>
<!-- sản phẩm bán chạy -->
<section class="newproduct bgwhite p-t-45 p-b-105" style="margin-bottom:-92px">
	<div class="container">
		<div class="sec-title p-b-60">
			<h3 class="m-text5 t-center">
				@lang('home.hotproduct')
			</h3>
			<p class="pull-left">Có tất cả {{count($hot_product)}}  sản phẩm</p>
		</div>
			
		<!-- Slide2 -->
		<div class="wrap-slick2">
			
			<div class="slick2">
				@foreach($hot_product as $hot)
				<div class="item-slick2 p-l-15 p-r-15">
					<!-- Block2 -->
					<div class="block2">
						@if($hot->promotion_price !=0)
						<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
							<img src="frontend/image/product/{{$hot->image}}" width="300px" height="350px">

							<div class="block2-overlay trans-0-4">
								<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
									<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
									<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
								</a>

								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									<a style="text-decoration: none" href="{{route('addcart',$hot->id)}}">
									<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
										Thêm vào giỏ
									</button>
									</a>
								</div>
							</div>
						</div>
						@else
						<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
							<img src="frontend/image/product/{{$hot->image}}" width="300px" height="350px">

							<div class="block2-overlay trans-0-4">
								<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
									<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
									<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
								</a>

								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									<a style="text-decoration: none" href="{{route('addcart',$hot->id)}}">
									<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
										Thêm vào giỏ
									</button>
									</a>
								</div>
							</div>
						</div>
						@endif
						<div class="block2-txt p-t-20">
							<a href="{{route('productdetail',$hot->id)}}" class="block2-name dis-block s-text3 p-b-5">
								{{$hot->name}}
							</a>

							@if($hot->promotion_price==0)
							<span class="block2-newprice m-text8 p-r-5">
								{{number_format($hot->unit_price)}}VNĐ
							</span>
							@else
							<span class="block2-oldprice m-text7 p-r-5">
								{{number_format($hot->unit_price)}}VNĐ
							</span>
							<span class="block2-newprice m-text8 p-r-5">
								{{number_format($hot->promotion_price)}}VNĐ
							</span>
							@endif
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>

	</div>
</section>
<!-- Banner2 -->
	<!-- <section class="banner2 bg5 p-t-55 p-b-55">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="hov-img-zoom pos-relative">
						<img src="frontend/images/banner-08.jpg" alt="IMG-BANNER">
	
						<div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
							<span class="m-text9 p-t-45 fs-20-sm">
								The Beauty
							</span>
	
							<h3 class="l-text1 fs-35-sm">
								Lookbook
							</h3>
	
							<a href="#" class="s-text4 hov2 p-t-20 ">
								View Collection
							</a>
						</div>
					</div>
				</div>
	
				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
						<img src="frontend/images/shop-item-09.jpg" alt="IMG-BANNER">
	
						<div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
							<div class="t-center">
								<a href="product-detail.html" class="dis-block s-text3 p-b-5">
									Gafas sol Hawkers one
								</a>
	
								<span class="block2-oldprice m-text7 p-r-5">
									$29.50
								</span>
	
								<span class="block2-newprice m-text8">
									$15.90
								</span>
							</div>
	
							<div class="flex-c-m p-t-44 p-t-30-xl">
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 days">
										69
									</span>
	
									<span class="s-text5">
										days
									</span>
								</div>
	
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 hours">
										04
									</span>
	
									<span class="s-text5">
										hrs
									</span>
								</div>
	
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 minutes">
										32
									</span>
	
									<span class="s-text5">
										mins
									</span>
								</div>
	
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 seconds">
										05
									</span>
	
									<span class="s-text5">
										secs
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	 -->

	<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					@lang('home.article')
				</h3>
			</div>

			<div class="row">
				@foreach($news as $new)
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
							<img src="frontend/image/product/{{$new->image}}" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									{{$new->title}}
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
							<span class="s-text6">on</span> <span class="s-text7">July 22, 2017</span>

							<p class="s-text8 p-t-16">
								{{$new->content}}
							</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>

	<!-- Instagram -->
	<!-- <section class="instagram p-t-20">
		<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">
				@ Theo dõi chúng tôi trên Instagram
			</h3>
		</div>
	
		<div class="flex-w">
			Block4
			<div class="block4 wrap-pic-w">
				<img src="frontend/images/gallery-03.jpg" alt="IMG-INSTAGRAM">
	
				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>
	
					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>
	
						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
			</div>
	
			Block4
			<div class="block4 wrap-pic-w">
				<img src="frontend/images/gallery-07.jpg" alt="IMG-INSTAGRAM">
	
				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>
	
					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>
	
						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
			</div>
	
			Block4
			<div class="block4 wrap-pic-w">
				<img src="frontend/images/gallery-09.jpg" alt="IMG-INSTAGRAM">
	
				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>
	
					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>
	
						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
			</div>
	
			Block4
			<div class="block4 wrap-pic-w">
				<img src="frontend/images/gallery-13.jpg" alt="IMG-INSTAGRAM">
	
				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>
	
					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>
	
						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
			</div>
	
			Block4
			<div class="block4 wrap-pic-w">
				<img src="frontend/images/gallery-15.jpg" alt="IMG-INSTAGRAM">
	
				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>
	
					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>
	
						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
			</div>
		</div>
	</section> -->

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Giao hàng miễn phí
				</h4>

				<a href="#" class="s-text11 t-center">
					Nhấn để xem chi tiết
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					30 Ngày đổi trả
				</h4>

				<span class="s-text11 t-center">
					Hoàn trả lại sản phẩm trong 30 ngày đơn giản.
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Ngày mở cửa
				</h4>

				<span class="s-text11 t-center">
					Cửa hàng mở cửa tất cả các ngày trong tuần
				</span>
			</div>
		</div>
	</section>

@endsection