@extends('admin.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Dơn đặt hàng</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel-heading">
					Danh sách đơn đặt hàng						
				</div>
				<div class="panel panel-default">					
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif (Session()->has('flash_level'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('flash_massage') !!}	
						        </ul>
						    </div>
						@endif
					<div class="panel-body" style="font-size: 13px;">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>										
										<th>#</th>										
										<th>Tên khách hàng</th>
										<th>Địa chỉ giao hàng</th>
										<th>Điện thoại</th>
										<th>Email</th>										
										<th>Ngày đặt</th>
										<th>Thành tiền</th>
										<th>Trạng thái</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($oders as $oder)

										<tr>
											<td>{{$oder->id}}</td>
											<td>{{$oder->user->name}}</td>
											<td>{{$oder->user->address}}</td>
											<td>{{$oder->user->phone}}</td>
											<td>{{$oder->user->email}}</td>											
											<td>{{$oder->date_order}}</td>
											<td>{{number_format($oder->total)}} VNĐ</td>
											<td>
												@if($oder->status ==0)
													<span style="color:#d35400;">Chưa xác nhận</span>
												@else
													<span style="color:#27ae60;"> Đã xác nhận</span>
												@endif
											</td>
											<td>
											    <a class="btn_customer_action " data-id="{{$oder->id}}" href="{{route('view.oder',$oder->id)}}" title="Chi tiết">Chi tiết </a> &nbsp;
											    <a href="{{route('del.oder',$oder->id)}}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"> Hủy bỏ</a>
											</td>
										</tr>
									@endforeach
																	
								</tbody>
							</table>
						</div>
						
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->

	
	<div class="modal fade" id="modalOder">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Chi tiết đơn hàng #<b class="oder_id"></b></h4>
				</div>
				<div class="modal-body" id="md_content">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection

@section('script')
	<script>
		$(function(){
			$(".js_oder_item").click(function(event){

				event.preventDefault();
				let $this =$(this);
				let url = $(this).attr('href');
				$(".oder_id").text('').text($this.attr('data-id'));

				$("#modalOder").modal('show');
				console.log(url);

				$.ajax({
					url: url,
				}).done(function(result){
					console.log(result);
					if (result) {
						$("#md_content").html('').append(result);
					}
				});
			});
		});
	</script>
@endsection