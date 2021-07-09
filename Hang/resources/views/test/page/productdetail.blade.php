@extends('layout.master')
@section('content')
	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Trang chủ
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.html" class="s-text16">
			Cửa hàng
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="#" class="s-text16">
			Bánh Ngọt
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			{{$productdetail->name}}
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						
						<div class="item-slick3" data-thumb="frontend/image/product/{{$productdetail->image}}">
							<div class="wrap-pic-w">
								<img src="frontend/image/product/{{$productdetail->image}}" alt="IMG-PRODUCT">
							</div>
						</div>
						
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					{{$productdetail->name}}
				</h4>

				@if($productdetail->promotion_price==0)
				<span class="block2-newprice m-text8 p-r-5">
					{{number_format($productdetail->unit_price)}}
				</span>
				@else
				<span class="block2-oldprice m-text7 p-r-5">
					{{number_format($productdetail->unit_price)}}
				</span>
				<span class="block2-newprice m-text8 p-r-5">
					{{number_format($productdetail->promotion_price)}}
				</span>
				@endif

				<p class="s-text8 p-t-10">
					{{$productdetail->description}}
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Kích cỡ
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>Chọn</option>
								<option>Size S</option>
								<option>Size M</option>
								<option>Size L</option>
								<option>Size XL</option>
							</select>
						</div>
					</div>

					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Màu sắc
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="color">
								<option>Chọn</option>
								<option>Gray</option>
								<option>Red</option>
								<option>Black</option>
								<option>Blue</option>
							</select>
						</div>
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<a style="text-decoration: none" href="{{route('addcart',$productdetail->id)}}">
									<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
										Thêm vào giỏ 
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">mã sản phẩm: MUG-01</span>
					<span class="s-text8">Danh mục: </span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Mô tả sản phẩm
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							{{$productdetail->description}}
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Thông tin thêm
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							{{$productdetail->description}}
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row bootstrap snippets">
			<div class="col-md-6 col-md-offset-2 col-sm-12">
				<div class="comment-wrapper">
					<div class="panel panel-info">
						@if(Auth::check())
						
						<form action="comment/{{$productdetail->id}}" method="POST" class="form-horizontal" role="form">
							@csrf
							@if(Session::has('success'))
								<div class="alert alert-success">
									{{Session::get('success')}}
								</div>
							@endif
							<div class="panel-heading">
								Viết bình luận tại đây
							</div>
							<div class="panel-body">
								<textarea name="content" class="form-control" placeholder="write a comment..." rows="3"></textarea>
								<br>
								<button type="submit" class="btn btn-info pull-right">Gửi</button>
								<div class="clearfix"></div>
								<hr>
								@endif
								<ul class="media-list">
									@foreach($productdetail->comment as $cm)

									<li class="media">
										<a href="#" class="pull-left">
											<img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
										</a>
										<div class="media-body">
											<span class="text-muted pull-right">
												<small class="text-muted">30 min ago</small>
											</span>
											<strong class="text-success">{{$cm->user->name}}</strong>
											<p>
												{{$cm->content}}
											</p>
										</div>
									</li>
									<hr>
									@endforeach
								</ul>
							</div>
						</form>
						
					</div>
				</div>

			</div>
		</div>
	</div>
	
	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Sản phẩm liên quan
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					@foreach($relatied as $rela)
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							@if($rela->promotion_price != 0)
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
								<img src="frontend/image/product/{{$rela->image}}" width="300px" height="350px" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<a style="text-decoration: none" href="{{route('addcart',$rela->id)}}">
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Thêm vào giỏ
											</button>
										</a>
									</div>
								</div>
							</div>
							@elseif($rela->new!=0)
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="frontend/image/product/{{$rela->image}}" width="300px" height="350px" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<a style="text-decoration: none" href="{{route('addcart',$rela->id)}}">
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Thêm vào giỏ
											</button>
										</a>
									</div>
								</div>
							</div>
							@else
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="frontend/image/product/{{$rela->image}}" width="300px" height="350px" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<a style="text-decoration: none" href="{{route('addcart',$rela->id)}}">
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Thêm vào giỏ
											</button>
										</a>
									</div>
								</div>
							</div>
							@endif
							<div class="block2-txt p-t-20">
								<a href="{{route('productdetail',$rela->id)}}" class="block2-name dis-block s-text3 p-b-5">
									{{$rela->name}}
								</a>

								@if($rela->promotion_price==0)
								<span class="block2-newprice m-text8 p-r-5">
									{{number_format($rela->unit_price)}}
								</span>
								@else
								<span class="block2-oldprice m-text7 p-r-5">
									{{number_format($rela->unit_price)}}
								</span>
								<span class="block2-newprice m-text8 p-r-5">
									{{number_format($rela->promotion_price)}}
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
	

@endsection