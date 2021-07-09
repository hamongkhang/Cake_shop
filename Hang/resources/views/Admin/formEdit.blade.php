@extends('master')
@section('content')
<div class = " space50 "> &nbsp;</div> 
    <div class = "container beta-relative " > 
        <div class = "pull - left" > <h2>Add product</h2></div>
        <div class = "pull - right"><input type = "text" placeholder = " Search ID "></div></div> 
        <div class = "space50 ">&nbsp;</div> 
       
        <div class = "container">
        <img src = "source/image/product/{{$product->image}}" style = "height:150px;" alt = ""> 
            <form role = "form" style = "width:55%;" action = "/adminedit" method = "post" enctype = "multipart/form-data">
                @csrf 
                <div class = "form-group">
                    <label for = "exampleInputEmail1">Name</labe>
                    <input type = "text" class = "form-control" name = "name" id="exampleInputEmaill" placeholder = " Enter name " value="{{$product->name}}">
                </div>

                <div class = "form-group">
                    <label for = "1">Type</label > 
                    <input type = "number" class = "form-control" name = "type" id = "1" value="{{$product->id_type}}" placeholder = "Enter type"> 
                </div>

                <div class = "form-group">
                    <label for = "2"> Price </label> 
                    <input type = "text" class = "form-control" name = "unit_price" id = "2" placeholder = "Enter unit price " value="{{$product->unit_price}}">
                </div>

                <div class = "form-group">
                    <label for = "3"> Description</label>
                    <input type = "text" class = "form-control" name = "description" id = "3" value="{{$product->description}}" placeholder = "Enter unit price">
                </div>

                <div class = " form-group " >
                    <label for = "4"> Promotion </label > 
                    <input type = " text " class = "form-control" name = "promotion_price" id = "4" value="{{$product->promotion_price}}" placeholder = "Enter promotion price"> 
                </div >

                <div class=" form-group"> 
                    <label for = "5"> Unit</label > 
                    <input type = "text" class = "form-control" name = "unit" id = "5" value="{{$product->unit}}" placeholder = "Enter unit"> 
                </div >

                <div class = " form-group " > 
                    <label for = "6"> New </label> 
                    <input type = "number" class = "form-control" name = "new" id = "6" value="{{$product->new}}" placeholder = " Enter new " >
                </div> 

                <div class = "form-group">
                    <label for = "exampleFormControlFill"> Image file</label > 
                    <input type = "file" class = "form-control-file" name = "image" id = "exampleFormControlFill">
                </div >
                <input type = "text" class = "form-control" name = "id" hidden value="{{$product->id}}">
                <button type="submit" class = "btn btn-primary"> Submit </button > 
            </form>
        </div> 
    </div> 
    <div class = "space50"> &nbsp;</div>
@endsection