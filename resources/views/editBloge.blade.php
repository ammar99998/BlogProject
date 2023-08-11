@extends('layouts.master')

@section('content')

<div class="container">
    <div class="card w-75">
        <div class="card-body">
             <h1 class="card-title">You can read  and delete All Blogs</h1>

      <br/>
             <div class="col-sm">
                <a  class="btn btn-warning ml" href="{{route('deleteAll')}}">Delete All</a> 
                
            </div>

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
        <th scope="row">Action</th>
    </tr>

        @foreach($blog as $item)
        <tr>
            <td scope="row">{{++$i}}</td>
            <td>{{$item->title}} </td>
        
            <td>{{$item->body}} </td>
           
            <td>
                 <img src={{$item->photo}} alt="{{$item->photo}}" width="100" height="100">
            </td>
            
                <td >
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <form action="{{route('delete',[$item->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')" 
                                    type="submit" name="Delete">Delete</button>
                                    
                                </form>

                            </div>


                     
                     </div>
                    


                    
        
                </td>
        </tr>

        @endforeach

    </table>

    <div>

{{$blog->links()}}

    </div>
</div>
@endsection
