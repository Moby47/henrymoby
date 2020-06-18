<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//resource
use App\Http\Resources\projectResource as projectres;
use App\Http\Resources\blogResource as blogres;
use App\Http\Resources\reviewResource as reviewres;

use App\link;
use App\review;
use App\project;
use App\blog;
use App\maillist;
use App\like;
//export csv
use Excel;
//intervention
use Image;
//to access storage library 
use Illuminate\Support\Facades\Storage;
//mailing
use Mail;
use App\Mail\Contact;


class admincontroller extends Controller
{
    

    public function project(Request $request){

        $this->validate($request, [
            'Title'=> 'required|string|max:17',
            'Link'=> 'required|string|max:254',
            'ImageFile'=> 'required|image|max:15999',
        ]);

        $t = $request->input('Title');
        $c = $request->input('Category');
        $l = $request->input('Link');

    //.................compression algorithm...............//

    if($request->hasfile('ImageFile')){
        //get filename with extension
        $filenamewithextension = $request->file('ImageFile')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file('ImageFile')->getClientOriginalExtension();

        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;

            //#source
            $request->file('ImageFile')->storeAs('public/project', $filenametostore);
    
            //Resize image here
            $thumbnailpath = public_path('/storage/project/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(900, 690, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);
        
    }else{
        $filenametostore = 'noimage.jpg';
    }

    //.................compression algorithm...............//


        $save = new project;

        $save->title = $t;
        $save->category = $c;
        $save->image = $filenametostore;
        $save->link =$l;

        $save->save();

        return 1;
    }



    public function blog(Request $request){

        $this->validate($request, [
            'Title'=> 'required|string|max:49',
            'Description'=> 'required|string|max:4999',
            'ImageFile'=> 'required|image|max:15999',
        ]);

       $t = $request->input('Title');
        $c = $request->input('Category');
        $d = $request->input('Description');

        //.................compression algorithm...............//

    if($request->hasfile('ImageFile')){
        //get filename with extension
        $filenamewithextension = $request->file('ImageFile')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file('ImageFile')->getClientOriginalExtension();

        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;

            //#source
            $request->file('ImageFile')->storeAs('public/blog', $filenametostore);
    
            //Resize image here
            $thumbnailpath = public_path('/storage/blog/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(900, 690, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);
        
    }else{
        $filenametostore = 'noimage.jpg';
    }

    //.................compression algorithm...............//


        $save = new blog;

        $save->title = $t;
        $save->category = $c;
        $save->image = $filenametostore;
        $save->description =$d;
        $save->likes = 0;

        $save->save();

        return 1;
    }


    public function link(){
       $link = 'www.henrymoby.tech/review/';
       $num = mt_rand(50000,100000);

       $ori = $link.$num;

       //save link
        $save = new link;
        $save->link=$ori;
        $save->save();
       //send link to frontend
       return $ori;
    }


    public function Lvalidate(Request $request){
       
        $pass = $request->input('pass');
        $link = 'www.henrymoby.tech/review/';

        $res =$link.$pass;

        $find = link::where('link','=',$res)->first();

        if($find){
            return 1;
        }else{
            return 0;
        }
        
    }


    public function review(Request $request){

        $this->validate($request, [
            'Name'=> 'required|string|max:49',
            'Message'=> 'required|string|max:254'
        ]);

        $name = $request->input('Name');
        $message = $request->input('Message');

        $save = new review;

        $save->name = $name;
        $save->message = $message;
        $save->save();

        return 1;
    }


public function bcount(){
    return $cc = blog::where('id','!=',Null)->select('id')->count();
}


public function pcount(){
    return $cc = project::where('id','!=',Null)->select('id')->count();
}


public function ccount(){
    return $cc = maillist::select('source')->where('source','=','Contact')->count();
}


public function scount(){
    return $sc = maillist::select('source')->where('source','=','Subscription')->count();
}



public function contact(Request $request){

    $this->validate($request, [
        'Name'=> 'required|string|max:49',
        'Email'=> 'required|email|max:100',
    ]);

    $name = $request->input('Name');
    $mail = $request->input('Email');
    $sub = $request->input('Subject');
    $tel = $request->input('Telephone');
    $msg = $request->input('Message');

    //send mail
    try{
        
        //load intel to session
        session(['name' => $name]);
        session(['sub' => $sub]);
        session(['mail' => $mail]);
        session(['num' => $tel]);
        session(['msg' => $msg]);
     
        Mail::to('support@henrymoby.website')->send(new Contact());
         //email notification to henry #me
         
   }
   catch(\Exception $e){
       return response()->Json('Critical error!');
      }

    //save to mail list

$check = maillist::where('email','=',$mail)->first();
if($check){
    return 1;
}else{
    $save = new maillist;
    $save->name = $name;
    $save->email = $mail;
    $save->source = 'Contact';

    $save->save();
    return 1;
}
}






public function subscribe(Request $request){

      $this->validate($request, [
        'Email'=> 'required|email|max:100',
    ]);

    //save to mail list
    $mail = $request->input('Email');

$check = maillist::where('email','=',$mail)->first();
if($check){
    return 'exist';
}else{
    $save = new maillist;
    $save->email = $mail;
    $save->source = 'Subscription';

    $save->save();
    return 1;
}
   
}


    //manage projects
public function projectres(){
     //paginated projects
     $project = project::orderby('id','desc')->select('title','link','image','id','category')
     ->paginate(3);
     //return projects as res
     return projectres::collection($project);
}


    //manage blog
    public function blogres(){
        //paginated blog
        $blog = blog::orderby('id','desc')->select('title','image','id','category','description')
        ->paginate(3);
        //return blog as res
        return blogres::collection($blog);
   }




public function downloadExcel(){
    $type = 'csv';
    try{
		$data = maillist::orderby('id','desc')->select('name','email')->get()->toArray();
        }
        catch(\Exception $e){
            return 'Error! Maillist Table Not Retrieved';
        }//catch end

try{
		return Excel::create('Maillist', function($excel) use ($data) {
			$excel->sheet('Mail list', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });

		})->download($type);
	}

catch(\Exception $e){

	return 'Error! Download Failed';
}//catch end
}




public function update(Request $request){

    $this->validate($request, [
        'Title'=> 'required|string|max:17',
        'Link'=> 'required|string|max:254',
        'ImageFile'=> 'required|image|max:15999',
    ]);
    
    $id = $request->input('id');  
    
  $t = $request->input('Title');
  $c = $request->input('Category');
  $l = $request->input('Link');

  if($request->hasfile('ImageFile')){
      //get filename with extension
      $filenamewithextension = $request->file('ImageFile')->getClientOriginalName();

      //get filename without extension
      $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

      //get file extension
      $extension = $request->file('ImageFile')->getClientOriginalExtension();

      //filename to store
      $filenametostore = $filename.'_'.time().'.'.$extension;

      //store
          $request->file('ImageFile')->storeAs('public/project', $filenametostore);
  
  }else{
        $filenametostore = 'noimage.jpg';
  }

  $save = project::findorfail($id);

  if($save->image != 'noimage.jpg'){
    //delete image file
    Storage::delete('public/project/'.$save->image);
}

  $save->title = $t;
  $save->category = $c;
  $save->image = $filenametostore;
  $save->link =$l;

  $save->save();

  return 1;
}







public function destroy(Request $request){
     $id = $request->input('id');

     $go = project::findorfail($id);
     $go->delete();
     if($go->image != 'noimage.jpg'){
        //delete image file
        Storage::delete('public/project/'.$go->image);
    }

    return 1;
}





public function update_blog(Request $request){

    $this->validate($request, [
        'Title'=> 'required|string|max:49',
        'Description'=> 'required|string|max:4999',
        'ImageFile'=> 'required|image|max:15999',
    ]);

    $id = $request->input('id');  
    
    $t = $request->input('Title');
    $c = $request->input('Category');
    $d = $request->input('Description');
  
    if($request->hasfile('ImageFile')){
        //get filename with extension
        $filenamewithextension = $request->file('ImageFile')->getClientOriginalName();
  
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
  
        //get file extension
        $extension = $request->file('ImageFile')->getClientOriginalExtension();
  
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
  
        //store
            $request->file('ImageFile')->storeAs('public/blog', $filenametostore);
    
    }else{
          $filenametostore = 'noimage.jpg';
    }
  
    $save = blog::findorfail($id);
  
    if($save->image != 'noimage.jpg'){
      //delete image file
      Storage::delete('public/blog/'.$save->image);
  }
  
    $save->title = $t;
    $save->category = $c;
    $save->image = $filenametostore;
    $save->description =$d;
  
    $save->save();
  
    return 1;
}





public function destroy_blog(Request $request){
    $id = $request->input('id');

    $go = blog::findorfail($id);
    $go->delete();
    if($go->image != 'noimage.jpg'){
       //delete image file
       Storage::delete('public/blog/'.$go->image);
   }

   return 1;
}





    //all projects
    public function Allprojectres(){
        //paginated projects
        $project = project::orderby('id','desc')->select('title','link','image')
        ->paginate(6);
        //return projects as res
        return projectres::collection($project);
   }

     //On projects
     public function Onprojectres(){
        //paginated projects
        $project = project::orderby('id','desc')->where('category','=','Online')->select('title','link','image')
        ->paginate(6);
        //return projects as res
        return projectres::collection($project);
   }

     //Off projects
     public function Offprojectres(){
        //paginated projects
        $project = project::orderby('id','desc')->where('category','=','Offline')->select('title','link','image')
        ->paginate(6);
        //return projects as res
        return projectres::collection($project);
   }


    //reviews
    public function reviewres(){
        //revs
        $review = review::orderby('id','desc')->select('name','message','id','created_at')
        ->take(5)->get();
        //return reviews as res
        return reviewres::collection($review);
   }




       //readblog
       public function blogreadres(){
        //paginated blog
        $blog = blog::orderby('id','desc')->select('id','title','description','image','created_at','category')
        ->paginate(4);
        //return blog as res
        return blogres::collection($blog);
   }




       //search blog
       public function blogsearchres($query){
        //paginated blog
        $blog = blog::orderby('id','desc')->where('title','LIKE','%'.$query.'%')
        ->orwhere('description','LIKE','%'.$query.'%')
        ->select('id','title','description','image','created_at','category')
        ->paginate(4);
        //return blog as res
        return blogres::collection($blog);
   }


     //category page readblog
     public function categoryres($type){
        //paginated blog
        //send all
        if($type == 'all'){
            $blog = blog::orderby('id','desc')->select('title','description','category','image','created_at','id')
            ->paginate(4);
            //return blog as res
            return blogres::collection($blog); 
        }
        //send specific based on category
        $blog = blog::orderby('id','desc')->select('title','description','image','category','created_at','id')
        ->where('category','=',$type)
        ->paginate(4);
        
        //return blog as res
        return blogres::collection($blog);
   }





      //like
      public function like(Request $request){

        $userId = $request->input('userId');
        $postId = $request->input('postId');

        //check if user liked
        $like = like::where('userid','=',$userId)->where('postid','=',$postId)->first();

        if($like){
            //you liked already
            return 0;
        }else{
            //like the post
          $post = blog::findorfail($postId);
          $post->increment('likes');
            $post->save();
            //save state
            $save = new like;
            $save->userid= $userId;
            $save->postid= $postId;
            $save->save();
            return 1;
        }

   }



         //single blog
     public function singleres($title, $id){
         $singleblog = blog::findorfail($id);
          //meta tag 
         // $meta = $blog->title;
         //to return single post as resources
         return new blogres($singleblog);
       }






}//class end
