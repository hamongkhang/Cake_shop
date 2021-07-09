@extends('master')
@section('content')

<!-- <div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="/index">Trang Chủ</a> / <span>Đặt Hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div> -->
	
	<div class="container">
		<div id="content">
			
			<form action="/dathang" method="post" class="beta-form-checkout">
			@csrf
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt Hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="your_first_name">Họ Tên*</label>
							<input type="text" id="name" name="name" required>
						</div>

						<div class="form-block">
							<label>Giới Tính</label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width:10%"><span style="margin-right:10%">Nam</span>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width:10%"><span style="margin-right:10%">Nữ</span>
						</div>

                        <div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" required placeholder="example@gmail.com">
						</div>

						<div class="form-block">
							<label for="adress">Địa Chỉ*</label>
							<input type="text" id="adress" name="address" placeholder="Street Address" required>
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi Chú</label>
							<textarea id="notes" name="notes"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn Hàng Của Bạn</h5></div>
							<div class="your-order-body" style="padding:0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
									@if(Session::has('cart'))
									@foreach($product_cart as $cart)
										<div class="media">
											<img width="35%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$cart['item']['name']}}</p>
												<span class="color-gray your-order-info">Đơn giá:{{number_format($cart['price'])}} đồng</span>
												<span class="color-gray your-order-info">Số lượng:{{$cart['qty']}}</span>
												<!-- <span class="color-gray your-order-info">Qty: 1</span> -->
											</div>
										</div>
									<!-- end one item -->
									@endforeach
									@endif
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@endif đồng</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình Thức Thanh Toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thamh toán khi nhận Hàng</label>
										<div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản</label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng 
										</div>						
									</li>
									
									<li class="payment_method_paypal">
										<input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal" data-order_button_text="Proceed to PayPal">
										<label for="payment_method_paypal">PayPal</label>
										<div class="payment_box payment_method_paypal" style="display: none;">
										@php
											echo $vnd_to_usd = 4,881.00/23083;
										@endphp
										<div id="paypal-button"></div>
										<input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd)}}">
										</div>						
									</li>
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	
	<!-- <div id="paypal-button"></div> -->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
	var usd = document.getElementById("vnd_to_usd").value
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>
		

@endsection