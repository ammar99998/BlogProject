<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\adding_blog;
use Illuminate\Support\Facades\Auth;
use App\Models\like;
use App\Models\User;
use App\Models\comment;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CreateBlog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail; ///use this class to send mail
use App\Mail\testmail;//use email class to create new object 
class mm extends Controller
{
    public function index1(){
        return view ('index');
    }
    public function dashboard(){
        return view ('dashboard');
    }

    public function up_img(){
        return view('upload');
    }
    public function update_page($id){
        $emp=adding_blog::find($id);

        return view('update',compact('emp'));
    }
    public function edit_blogs(){
        $blog=adding_blog::latest()->paginate(5);

        return view('editBloge',compact('blog'));
       
    }
    public function insert_blog(){
        return view('new_blog');
    }
    public function display(){
        $emp=Employee::latest()->paginate(5);

        return view('display',compact('emp'));
    }

    
    public function all_blogs(){
        $blog=adding_blog::latest()->paginate(5);
if (! Auth::guard('admin')->check()){
    return view('allBlogs',compact('blog'));
}else{
    return view('editBloge',compact('blog'));
}
    
     
    }
    public function show(){
        $blog=adding_blog::latest()->paginate(5);

        return view('show_blogs',compact('blog'));
    }
    public function insert(){
        // $emp=Employee::paginate(10);

        // return view('index',compact('emp'));
        return redirect()->back()->with('message','you are insert new blog');

   }
    public function up_img_data(Request $r){
         $validatedData = $r->validate([

            'name'=>'required',
            'phone'=>'required ',
            'age'=>'required |integer',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'

           ]);
         $photo=$r->photo;
         $name=time().$r->photo->getClientOriginalName();
         $photo->move('uploads', $name);
//$photo->storeAS('public', $name);
         $post=Employee::create([

            'name_emp'=>$r->name,
            'age'=>$r->age,
            'phone'=>$r->phone,
            'photo'=>'uploads/'.$name


                                  ]);

          $emp=Employee::latest()->paginate(5);
//$emp->appends($emp->all());
//return view('/'.compact('emp'));
         return view('display',compact('emp'))->with('messege','you are insert new blog');
 // return view('index',compact('emp'));
//  return redirect('upload')->with("messge","you insert successfly");

}
public function new_blog(Request $r){
    $validatedData = $r->validate([

   
       'title'=>'required ',
       'body'=>'required ',
       'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'

      ]);
    $photo=$r->photo;
    $name=time().$r->photo->getClientOriginalName();
    $photo->move('uploads', $name);
//$photo->storeAS('public', $name);
    $post=adding_blog::create([

       'title'=>$r->title,
       'body'=>$r->body,
       'user_id'=>Auth::user()->id,
       'photo'=>'uploads/'.$name


                             ]);
 //return redirect()->back()->with('messege','you are insert new blog');
    // $emp=adding_blog::Paginate(5);
//$emp->appends($emp->all());
//return view('/'.compact('emp'));

############### notification method ##########

$user=User::where('id','!=',auth()->user()->id)->get();
$user_create=auth()->user()->name;
notification::send($user,new CreateBlog($post->id,$user_create,$post->title));



return redirect()->route('allblogs');

// return view('index',compact('emp'));
//  return redirect('upload')->with("messge","you insert successfly");

}
public function delete_blog($id){
 $blog=adding_blog::find($id);

 if(file_exists($blog->photo)){
unlink($blog->photo);///delete image from folder
 }
 $blog->delete();
return redirect()->back()->with('message','the blog deleted sccessflly');






// if(empty($blog)) {
//     return "this blog not exists";
// }


 //return redirect()->back();
}
public function update_blog($id){
    $emp=Employee::find($id);
   return view('update',compact('emp'));

}

public function update_info_blog (Request $r,$id){



    $validatedData = $r->validate([

        'title'=>'required',
        'body'=>'required' ,
        'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'

       ]);
    //    ///save a new picture
       $photo=$r->photo;
       $name_img=$r->file('photo')->hashname();///this way is more scuore to get the name
       //$name_img=time().$r->photo->getClientOriginalName();
       $photo->move('uploads', $name_img);
//update new information to the blog

$emp=adding_blog::find($id);
////////////////
if(file_exists($emp->photo)){
    unlink($emp->photo);///delete image from folder
     }

     //////////////////////
       $emp->title=$r['title'];
       $emp->photo='uploads/'.$name_img;
       $emp->body=$r['body'];
       $emp->save();

      return redirect()->route('update',$id)->with('message','the blog update sccessflly');
}
public function f1(Request $r){
    //$img = $r->file('photo')->getClientOriginalName();
    // $ext= $r->file('photo')->getClientOriginalExtension();

    $img=$r->file('photo')->hashname();///give new name to photo for security
    // $ext=$r->file('photo')->extension();
    // return $path. '******'.$ext;
   $path=$r->file('photo')->storeAs('public',$img);
    return 'you uploaded your image by sccessfly by name : '.$img;

}

public function my_blogs(Request $r){

    ###############here check the type of user to get id 
        if (Auth::guard('admin')->check()){
            $id=Auth::guard('admin')->user()->id;
        }
        else{
            $id=Auth::guard('web')->user()->id;
        }
 

$blog=adding_blog::where('user_id', $id)->paginate(5);

  
if($blog->isEmpty()){
    return redirect()->route('upload')->with('message','you do not have blogs please add one');
    
   
}else{
    
    return view('myblog',compact('blog'));
}
 

       
 }

 public function delete_alla_blogs(){
    $blog=adding_blog::get();
  
    foreach ($blog as $im){///loop to delete all image
        
        if(file_exists($im->photo)){
            unlink($im->photo);///delete image from folder
             }
    }
    //$blog->each->truncate();//another way to delete recodes
   $blog->each->delete();//delete all blog
 
   return redirect()->back()->with('message','you are delete all Blogs sccessflly');
   
   }
   public function search(Request $r){
            
            $search=$r->query('search');
            if($search){
            
            $blog=adding_blog::where('title','LIKE','%'.$search.'%')->paginate(5);;
            return view('allBlogs',compact('blog'));
           
        }
        return 'No result';

   }


   public function admin_all_blogs(){
    return 'ok';
   }
################### this function to add like to blog
   public function like($id){
$post_id=$id;

// if (auth::guard('admin')->check()){
//     $like=new like();
//     $like->post_id =$post_id;
//      $like->user_id=auth::guard('admin')->user()->id;
//      $like->liked=1;
//      $like->save();
//      return back();
   
// }

if (! Like::where(['user_id' => Auth::user()->id, 'post_id' => $post_id])->exists()){
    $like=new like();
   $like->post_id =$post_id;
    $like->user_id=Auth::user()->id;
    $like->liked=1;
    $like->save();
    return back();

}else{
  return back();  
}

}
################### this function to delete unklike from blog
public function likecount($id){
    $post_id=$id;
    $likecount = like::where('post_id', '=', $post_id)->count();
}


###########################
public function store_comments(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'body'=>'required',
        ]);

        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }
#################to make the notification read
public function notification_read($id){
        DB::table('notifications')->where('id',$id)->update(['read_at'=>now()]);//make this notification read
        $getID=DB::table('notifications')->where('id',$id)->value('data->post_id');///this line we get the selected notification
         $blog=adding_blog::findOrfail($getID);
         $likecount=like::get();
   $comments=comment::get();
    return view('showBlogNote',compact('blog','likecount','comments'));
            
}


    public function blog_comments(){
        $blog=adding_blog::latest()->paginate(5);
   $likecount=like::get();
   $comments=comment::get();
    return view('blogShow',compact('blog','likecount','comments'));
    }


    //////this function to delete all notification from current user
    public function make_all_notification(){
        $user=User::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $notification){
            // $notification->markAsRead();
            $notification->delete();
        }

    return redirect()->back();
}

######################### sent email to user
public function sent_email(){
    $name="Ammar programmer";
    Mail::to('ammar99998@gmail.com')->send(new testmail($name));
    return response('email was sent successfly  by user');

}
}
