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
        <th scope="row">name</th>
        <th scope="row">age</th>
        <th scope="row">phone</th>
        <th scope="row">pictuer</th>
        <th scope="row">Action</th>
    </tr>

        @foreach($emp as $item)
        <tr>
            <td scope="row">{{++$i}}</td>
            <td>{{$item->name_emp}} </td>
            <td>{{$item->age}} </td>
            <td>{{$item->phone}} </td>
            <td>
                 <img src={{$item->photo}} alt="{{$item->photo}}" width="100" height="100">
            </td>
            <td><a  class="btn btn-danger " href="delete/{{$item->id}}">Delete</a>
          <a  class="btn btn-success ml" href="update/{{$item->id}}">Update</a> </td>
        </tr>

        @endforeach

    </table>

    <div>

{{$emp->links()}}

    </div>
</div>
@endsection
