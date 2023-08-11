@extends('layouts.master')

@section('content')






 <link href="assets/css/blogshow.css" rel="stylesheet"> {{-- this file css is style to blogshow page --}}




<body>

<section class="content-item" id="comments">
    <div class="container">
         <div class="row">
             <div class="col-sm-8">

             <h3>Last Blogs</h3>
			 @foreach($blog as $blogs)
			 <div class="media list-inline-item">
				<a class="pull-left" href="#"><img class="media-object" src={{$blogs->photo}} alt></a>
				       <div class="media-body  ">
						<h4 class="media-heading">{{$blogs->title}}</h4>
						<p>{{$blogs->body}}</p>
                        
						<ul class="list-unstyled list-inline-item media-detail pull-left">
							<li class="list-inline-item"><i class="fa fa-calendar"></i>{{$blogs->created_at}}</li>
						{{-- this code to count the like in the post --}}
								@php
									$like_count=0;
								@endphp
								@foreach ($likecount as $like)
	
	
								@php
								if($like->post_id==$blogs->id )
	
									$like_count++;
								@endphp
	
						@endforeach
	
						{{-- end code count --}}
	
							<li class="list-inline-item"><i class="fa fa-thumbs-up"></i>{{$like_count}}</li>
							
							   </ul>  

							   <ul class="list-unstyled  media-detail pull-right">
								<li class="list-inline-item"><a href="{{url('/liked/'.$blogs->id)}}" class="nav-link active">Like</a></li>
								<li class="list-inline-item"><a href="{{url('/disliked/'.$blogs->id)}}" class="nav-link active">Dislike</a></li>
								{{-- <li class><a href>Reply</a></li> --}}
		
						      </ul>


							  <div class="media-heading">
								<hr/>
								  <h4> Comments</h4>
							
							  </div>
							  <hr />
							  @include('commentsDisplay')
						  
						  
							  <h4>Add comment</h4>
							  <form method="post" action="{{ route('comments.store') }}">
								  @csrf
								  <div class="form-group">
									  <textarea class="form-control" name="body"></textarea>
									  <input type="hidden" name="post_id" value="{{ $blogs->id }}" />
								  </div>
								  <div class="form-group">
									  <input type="submit" class="btn btn-primary" value="Add Comment" />
								  </div>
							  </form>


					   </div>
			 </div>
@endforeach
			  
                        
				</div> 
		</div>
</div>
</section>


{{$blog->links()}}
</body>

@endsection