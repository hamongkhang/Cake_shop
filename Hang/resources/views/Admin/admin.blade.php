@extends('master')
@section('content')

<div class = "space50">&nbsp;</div> 
    <div class = "container beta-relative">
        <div class = "pull-left"><h2> Danh sách </h2></div>
        <div class = "pull-right"><input type ="text" placeholder ="Search ID"> </div>
    </div> 

    <div class ="container"> 
        <table class ="table table-striped table-dark"> 
            <thead>
                <tr> 
                    <th scope = "col">ID</th> 
                    <th scope = "col">Image</th> 
                    <th scope = "col">Name</th>
                    <th scope = "col">Type</th> 
                    <th scope = "col">Description</th>
                    <th scope = "col">Unit_price</th>
                    <th scope = "col">Promotion_price</th> 
                    <th scope = "col">Unit</th> 
                    <th scope = "col">New</th> 
                    <th scope = "col1"><a href ="/getadminadd" class =" btn btn-primary" style ="width:80px;">Add</a></th> 
                </tr>
            </thead> 
            <tbody> 
                @foreach($products as $product) 
                <tr> 
                    <th scope ="row">{{$product->id}}</th> 
                    <td> <img src = "source/image/product/{{$product->image}}" style = "height:150px;" alt = ""> </td>
                    <td>{{$product->name}}</td> 
                    <td>{{$product->id_type}}</td> 
                    <td>{{$product->description}}</td> 
                    <td>{{$product->unit_price}}</td> 
                    <td>{{$product->promotion_price}}</td> 
                    <td>{{$product->unit}}</td> 
                    <td>{{$product->new}}</td> 
                    <td>
                        <form role = "form" action = "/getadminedit/{{$product->id}}" method ="get"> 
                           
                            <button name ="edit" class ="btn btn-warning" style="width:80px;"> Edit </button> 
                        </form> 
                        <form role = "form" action = "/admindelete/{{$product->id}}" method = "post"> 
                            @csrf 
                            <button name = "delete" class ="btn btn-risk" style = "width: 80px;"> Delete </button>
                        </form> 
                    </td>
                </tr> 
                @endforeach 
            </tbody> 
        </table> 
    </div> 
    <div class ="space50">&nbsp;</div> 

@endsection
