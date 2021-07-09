<section class="slide1">
	<div class="wrap-slick1">
		<div class="slick1">
			@foreach($slide as $sl)
			<div class="item-slick1 item1-slick1" style="background-image: url(frontend/image/slide/{{$sl->image}});">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
						{{$sl->name}}
					</h2>
				</div>
			</div>				
			@endforeach
		</div>
	</div>
</section>