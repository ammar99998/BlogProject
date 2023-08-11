@extends('layouts.master')

@section('content')

<div class="container">
    <div class="card w-75">
        <div class="card-body">
             <h1 class="card-title">You can read All Blogs</h1>

      

        </div>

      </div>
      @if (session()->has('message'))
      <div class="w-75 alert alert-danger">
    {{session()->get('message')}}
    </div>
      @endif

</div>

   @php
   $i=0;
@endphp
<div class="container mt-3">
   <table class="table">
    <thead class="thead-dark">

    <tr>
        <th scope="row">NO.</th>
        <th scope="row">title</th>
        <th scope="row">body</th>
        <th scope="row">pictuer</th>
 
    </tr>

        @foreach($blog as $item)
        <tr>
            <td scope="row">{{++$i}}</td>
            <td>{{$item->title}} </td>
        
            <td>{{$item->body}} </td>
           
            <td>
                 <img src={{$item->photo}} alt="{{$item->photo}}" width="100" height="100">
            </td>
            
               
        </tr>

        @endforeach

    </table>

    <div>

{{$blog->links()}}

    </div>
</div>
@endsection
