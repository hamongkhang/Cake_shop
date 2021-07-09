@extends('layout.master')

@section('content')
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(frontend/images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Giỏ hàng
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1">hình ảnh</th>
							<th class="column-2">Sản phẩm</th>
							<th class="column-3">Giá</th>
							<th class="column-4 p-l-70">Số Lượng</th>
							<th class="column-5">Tổng tiền</th>
							<th class="column-4">Thao tác</th>
						</tr>
						@foreach($products as $key=> $pr)
						
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="frontend/image/product/{{$pr->options->image}}" alt="IMG-PRODUCT">
								</div>
							</td>	
							<td class="column-2">{{$pr ->name}}</td>
							@if($pr->options->sale !=0)
							<td class="column-3">{{number_format($pr->options->sale)}} VNĐ</td>
							@else
							<td class="column-3">{{number_format($pr->price)}} VNĐ</td>
							@endif
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="{{$pr->qty}}">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">
								<span>
									@if($pr->options->sale !=0)
									{{number_format($pr->options->sale*$pr->qty)}} VNĐ
									@else
									{{number_format($pr->price*$pr->qty)}} VNĐ
									@endif
								</span>
							</td>
							<td class="column-2">
								<a href=""> <i class="fa fa-pencil"></i> Sửa</a>
								<a href="{{route('deletecart',$key)}}"> <i class="fa fa-trash-o"></i> Xóa</a>
								
							</td>
						</tr>			
						@endforeach			
					</table>

				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Nhập mã code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Mã giảm giá
						</button>
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Cập nhật giỏ hàng
					</button>
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Tổng giỏ hàng
				</h5>

				<!--  -->
				<!-- <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Tổng giá:
					</span>
				
					<span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
				</div>
				 -->
				<!--  -->
				<!-- <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Vận chuyển:
					</span>
				
					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							There are no shipping methods available. Please double check your address, or contact us if you need any help.
						</p>
				
						<span class="s-text19">
							Calculate Shipping
						</span>
				
						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select class="selection-2" name="country">
								<option>Select a country...</option>
								<option>US</option>
								<option>UK</option>
								<option>Japan</option>
							</select>
						</div>
				
						<div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
						</div>
				
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
						</div>
				
						<div class="size14 trans-0-4 m-b-10">
							Button
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Update Totals
							</button>
						</div>
					</div>
				</div> -->

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Tổng tiền:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						{{Cart::subtotal()}} VNĐ
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<a href="{{route('checkout')}}" class="btn flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Tiến hành thanh toán</a>
				</div>
			</div>
		</div>
	</section>
@endsection