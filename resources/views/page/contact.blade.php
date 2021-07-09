@extends('layout.master')

@section('content')
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(frontend/image/lienhe2.jpg);">
		<h2 class="l-text2 t-center">
			Liên Hệ
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<iframe src="https://www.google.com/maps/embed?pb=" width="550" height="450" frameborder="0" style="border:0" ></iframe>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<form action="" method="POST" class="leave-comment">
						@csrf
						@if(Session::has('success'))
						<div class="alert alert-success">
							{{Session::get('success')}}
						</div>
						@endif
						<h4 class="m-text26 p-b-36 p-t-15">
							Gửi liên hệ cho chúng tôi
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Họ tên" required="">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" required="" type="text" name="phone" placeholder="Số điện thoại">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" required="" type="text" name="email" placeholder="Địa chỉ email">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Tin nhắn"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Gửi
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection