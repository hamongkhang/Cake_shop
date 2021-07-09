@extends('admin.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản trị viên</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel-heading">
					Danh sách quản trị viên						
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
										<th>ID</th>										
										<th>Tên quản trị</th>
										<th>Email</th>
										<th>Quyền</th>										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									
										<tr>
											<td>{{$data->id}} </td>
											<td>{{$data->name}} </td>
											<td>{{$data->email}}</td>
											<td>
												@if($data->level==100)
													<span style="color:#d35400;">Quản trị hệ thống</span>
												@else
													<span style="color:#27ae60;">Quản trị viên</span>
												@endif
											</td>											
											<td>
												<a href="" title="Chi tiết"> Cập nhật</a> &nbsp;
												
												<a href=""  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')">Xóa bỏ</a>
												
											</td>
										</tr>
															
								</tbody>
							</table>
						</div>
						
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection