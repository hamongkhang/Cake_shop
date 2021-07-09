
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
    <link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
    <link rel="stylesheet" href="source/assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
 </head>
 
 <body>
    <div>
       <h2>{{ $data['type'] }}</h2>
       <p>Cảm ơn {{ $data['thanks'] }} đã đến với cửa hàng chúng tôi</p>






       <div class="row">
					<div class="col-sm-6">
						<h4>Thông tin khách hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" name="fullname" id="name" placeholder="Họ tên" required value="{{ $data['thanks'] }}">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" name="address" id="adress"value="{{ $data['diachi'] }}"  placeholder="Địa Chỉ" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" value="{{ $data['sdt'] }}" name="phone" id="phone" required placeholder="Số điện thoại">
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="notes" placeholder="{{ $data['ghichu'] }}"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<!-- {{dump(get_data_user('web','name'))}} -->
								<div class="your-order-item">

								</div
                        >
								<div class="your-order-item">
									
									<div class="clearfix"></div>
								</div>
							</div>
							</div> <!-- .your-order -->
					</div>
				


               @foreach($data['cart'] as $pr)
									<div>
									<!--  one item	 -->
									

										<div class="media">
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
                           <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{Cart::subtotal()}}</h5></div>
                           <div class="clearfix"></div>



               




      </div>
 
       <p>{{ $data['content'] }}</p>
    </div>
 </body>

</html>



