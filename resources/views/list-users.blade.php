@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             
            <a href="{{route('export',['1','type'=>'xlsx'])}}" class="btn btn-success">Export Excel</a>
            <a href="{{route('export',['1','type'=>'csv'])}}" class="btn btn-info">Export CSV</a>
            <a href="{{route('export',['1','type'=>'tsv'])}}" class="btn btn-warning">Export TSV</a>
         
             
            <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Export Query theo ngày
                    </button>
                    <div class="dropdown-menu">
                        @foreach($users as $user)
                                <a href="{{route('export',['1','type'=>'xlsx','created'=>$user->created_at->format('Y-m-d')])}}" class="dropdown-item">
                                       {{$user->created_at->format('Y-m-d')}}
                                </a>
                        @endforeach
                            
                    </div>
            </div>
            <a href="{{route('export',['1','type'=>'xlsx','template'=>'template-export-excel'])}}" class="btn btn-warning">Export Excel to View</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
