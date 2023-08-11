@extends('layouts.master')
@section('content')
<div class='container'>
 @if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
   </div>
@endif


    @if (session()->has('message'))
    <div class="alert alert-success">
  {{session()->get('message')}}
</div>
    @endif

  {{-- <div>
    @if (session()->has('message'))

  {{session()->get('message')}}

    @endif
</div> --}}

<form action="{{route('update_info',$emp->id)}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="col-6">
        <img src="/{{$emp->photo}}" alt="{{$emp->photo}}" width="100" height="100">

      </div>

    <div class="col-6">
        <label for="inputAddress" class="form-label">title</label>
            <input type="text" name="title" class="form-control" value="{{$emp->title}}" required/>
      </div>
{{-- 
      <div class="col-6">
        <label for="inputAddress" class="form-label">body</label>
            <input type="text" name="body" class="form-control" value="{{$emp->body}}" required/>

      </div> --}}
<!-- Textarea with class .w-50 -->
<div class="form-outline w-50 mb-4">
  <label for="textAreaExample5" class="form-label">body</label>
  <textarea class="form-control" id="textAreaExample5"  name="body" rows="3">{{$emp->body}}</textarea>
  
</div>




<br>
<br>

  <div class="col-6">
    <input  class="mt-3"  type="file" name="photo" required/>

  </div>


<br>
<br>
<div class="col-6 mb-3  ">
    <button type="submit" class="btn btn-success  ">Update Data </button>
  </div>

</form>



{{-- <a class="btn btn-primary" href='{{route('display')}}'>Go To BlOGS<a> --}}

    @endsection
</div>
</div>
