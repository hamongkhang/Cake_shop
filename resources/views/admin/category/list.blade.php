@extends('admin.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh mục</li>
			</ol>
		</div><!--/.row-->
	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Sánh sách loại sản phẩm 
						<a href="{{route('add.category')}}" title=""><button type="button" class="btn btn-primary pull-right">Thêm mới danh mục</button></a>
					</div>
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif (Session::has('success'))
					    	<div class="alert alert-success">
						        <ul>
						            {{Session::get('success')}}
						        </ul>
						    </div>
						@endif
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>										
										<th>#</th>										
										<th>Tên danh mục</th>										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($category as $cate)
									<tr>
										<td>{{$cate->id}}</td>										
										<td>{{$cate->name}}</td>	
										<td>
											<a href="{{route('edit.category',$cate->id)}}" title="Sửa"><span class="glyphicon glyphicon-edit">edit</span> </a>
											<a href="{{route('del.category',$cate->id)}}"  title="Xóa" ><span class="glyphicon glyphicon-remove">remove</span> </a>
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
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection