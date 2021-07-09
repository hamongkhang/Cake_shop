@if($oders)
<table class="table table-hover">
	<thead>
		<tr>										
			<th>ID</th>										
			<th>Hình ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Giá bán</th>
			<th> Số lượng </th>
			<th>Thành tiền</th>
			<th>Thao tác</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1  ?>
		@foreach($oders as $key=> $oder)
		<tr>
			<td>#{{$i}}</td>
			<td> <img src="{!!url('uploads/products/'.$row->images)!!}" alt="iphone" width="50" height="40"></td>
			<td>{!!$oder->name!!}</td>
			<td></td>
			<td> </td>
			<td> Vnđ</td>
			<td>
				<a href=""  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
			</td>
		</tr>
		@endforeach				
					
	</tbody>
</table>
@endif