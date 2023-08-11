


<div>
    {{-- here we get the comment belongs to post by relashionship in laravel --}}
    @foreach ($blogs->comments as $comment)
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







