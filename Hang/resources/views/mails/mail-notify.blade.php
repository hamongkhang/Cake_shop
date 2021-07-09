
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

     
       <div>
          <div class="your-order-head">
             <h3>Your order </h3>
          </div>
          <div class="your-order-body">
             <div class="your-order-item">
                <div>
                   @if(isset($data['cart']))
                   @foreach($data['cart']->items as $product)
                   <div class="media">
                      <img width="35%" src="source/image/product/{{$product['item']['image']}}" alt="" class="pull-left">
                      <div class="media-body">
                         <p class="font-large">{{$product['item']['name']}}</p>
                         <span class="color-gray your-order-info">Quantity: {{$product['qty']}}</span>
                      </div>
                   </div>
                   @endforeach
                   @endif
                   <!-- end one item -->
                </div>
                <div class="clearfix"></div>
             </div>
             <div class="your-order-item">
                <div class="pull-left">
                   <p class="your-order-f18">Total:<h5 class="color-black">@if(isset($data['cart'])){{number_format($data['cart']->totalPrice)}}@else 0 @endif đồng</h5></p>
                </div>
                <div class="clearfix"></div>
             </div>
          </div>
       </div>
 
       <p>{{ $data['content'] }}</p>
    </div>
 </body>

</html>



