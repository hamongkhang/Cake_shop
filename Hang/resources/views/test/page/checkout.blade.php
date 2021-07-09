@extends('layout.master')

@section('content')
	<div class="inner-header">
		<div class="container">
			
			<div class="pull-left">
				<div class="beta-breadcrumb">
					<a href="{{route('trangchu')}}">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	@if(Session::has('success'))
	<div class="aler alert-success">
		{{Session::get('success')}}
	</div>		
	@endif
	<div class="container">
		
		<div id="content">
			
			@if(Session::has('flag'))
			<div class="aler alert-danger">
				{{Session::get('flag')}}
			</div>
			@endif
			<form action="{{route('post.checkout')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" name="fullname" id="name" placeholder="Họ tên" required value="{{get_data_user('web','name')}}">
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" name="email" id="email" required placeholder="expample@gmail.com" value="{{get_data_user('web','email')}}">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" name="address" id="adress"value="{{get_data_user('web','address')}}"  placeholder="Địa Chỉ" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" value="{{get_data_user('web','phone')}}" name="phone" id="phone" required placeholder="Số điện thoại">
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="notes" placeholder="Nhập..."></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<!-- {{dump(get_data_user('web','name'))}} -->
								<div class="your-order-item">
									@foreach($products as $pr)
									<div>
									<!--  one item	 -->
									

										<div class="media">
											<img width="25%" src="frontend/image/product/{{$pr->options->image}}" alt="" width="250px" height="150px" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$pr->name}}</p>
												<span class="color-gray your-order-info">Color: Red</span>
												<span class="color-gray your-order-info">Số lượng: {{$pr->qty}}</span>
											</div>
										</div>
									
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
									@endforeach
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{Cart::subtotal()}}</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 711AC0334673
											<br>- Chủ TK: BÀN HỮU QUỲNH
											<br>- Ngân hàng VTB, Chi nhánh Thủ Dầu Một
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="#" >Đặt hàng <i class="fa fa-chevron-right"></i></button>	
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection

@section('script')
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/dug.js"></script>
<script type="text/javascript" src="js/scripts.min.js"></script>
@endsection