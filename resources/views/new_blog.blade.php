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

{{--
<div class="container">


<form class="row g-3" action="upload_image" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="col-12">
      <label for="inputAddress" class="form-label">Name</label>
      <input type="text" class="form-control" name="name">
    </div>


    <div class="col-12">
        <label for="inputAddress" class="form-label">phone</label>
        <input type="text" class="form-control" name="phone">
      </div>


    <div class="col-12">
        <label for="inputAddress" class="form-label">Age</label>
        <input type="text" class="form-control" name="age">
      </div>

      <input type="file" name="photo" required/>
      <br>

    <div class="col-12">
      <button type="submit" class="btn btn-primary">upload </button>
    </div>
  </form> --}}


  <div>
    @if (session()->has('message'))
        
  {{session()->get('message')}}
        
    @endif
</div>



<form action="{{route('insert')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-6">
        <label for="inputAddress" class="form-label">title</label>
            <input type="text" name="title" class="form-control" required/>
      </div>
<br>
<br>
{{-- <div class="col-6">
    <label for="inputAddress" class="form-label">body</label>
        <input type="text" name="body" class="form-control" required/>
  </div> --}}
  <div class="form-outline w-50 mb-4">
    <label for="textAreaExample5" class="form-label">body</label>
    <textarea class="form-control" id="textAreaExample5"  name="body" rows="4"></textarea>
    
  </div>
  <br>
  <br>

  <div class="col-6 mb-3  ">
    <input type="file" name="photo" required/>
  </div>



<div class="col-6 mb-3  ">
    <button type="submit" class="btn btn-success  ">Save Data </button>
  </div>

</form>


{{-- <form action="{{route('store')}}" methed="POST" >
    @csrf
    @method('PUT')
    <input type="file" />
<br>
<br>
    <button type="submit" class="btn btn-primary">Send</button>
  </form>
 --}}
<a class="btn btn-primary" href='{{route('show')}}'>Go To BlOGS<a>

    @endsection
</div>
</div>