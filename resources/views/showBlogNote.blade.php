@extends('layouts.master')

@section('content')






 <link href="../assets/css/blogshow.css" rel="stylesheet"> {{-- this file css is style to blogshow page --}}




<body>

<section class="content-item" id="comments">
    <div class="container">
         <div class="row">
             <div class="col-sm-8">

             <h3>Blog you don't show it</h3>
			
			 <div class="media list-inline-item">
				<a class="pull-left" href="#"><img class="media-object" src='../{{$blog->photo}}' ></a>
				       <div class="media-body  ">
						<h4 class="media-heading">{{$blog->title}}</h4>
						<p>{{$blog->body}}</p>
                        
						<ul class="list-unstyled list-inline-item media-detail pull-left">
							<li class="list-inline-item"><i class="fa fa-calendar"></i>{{$blog->created_at}}</li>
						{{-- this code to count the like in the post --}}
								@php
									$like_count=0;
								@endphp
								@foreach ($likecount as $like)
	
	
								@php
								if($like->post_id==$blog->id )
	
									$like_count++;
								@endphp
	
						@endforeach
	
						{{-- end code count --}}
	
							<li class="list-inline-item"><i class="fa fa-thumbs-up"></i>{{$like_count}}</li>
							
							   </ul>  

							   <ul class="list-unstyled  media-detail pull-right">
								<li class="list-inline-item"><a href="{{url('/liked/'.$blog->id)}}" class="nav-link active">Like</a></li>
								<li class="list-inline-item"><a href="{{url('/disliked/'.$blog->id)}}" class="nav-link active">Dislike</a></li>
								{{-- <li class><a href>Reply</a></li> --}}
		
						      </ul>


							  <div class="media-heading">
								<hr/>
								  <h4> Comments</h4>
							
							  </div>
							  <hr />
                              <div>
                                {{-- here we get the comment belongs to post by relashionship in laravel --}}
                                @foreach ($blog->comments as $comment)
                                  {{-- here we use the releation to get username --}}
                               
                                
                                <ul class="comments">
                                    <li class="clearfix">
                                        <img src="https://bootdey.com/img/Content/user_3.jpg" class="avatar" alt="">
                                        <div class="post-comments">
                                            <p class="meta"> {{ $comment->created_at }} <a href="#">  , {{ $comment->user_Name_to_comment->name}}</a> says : </p>
                                            <p>
                                               {{ $comment->body }}
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            
                            <hr/>
                               
                               
                               
                                @endforeach
                            </div>
						  
						  
							  <h4>Add comment</h4>
							  <form method="post" action="{{ route('comments.store') }}">
								  @csrf
								  <div class="form-group">
									  <textarea class="form-control" name="body"></textarea>
									  <input type="hidden" name="post_id" value="{{ $blog->id }}" />
								  </div>
								  <div class="form-group">
									  <input type="submit" class="btn btn-primary" value="Add Comment" />
								  </div>
							  </form>


					   </div>
			 </div>

			  
                        
				</div> 
		</div>
</div>
</section>



</body>

@endsection