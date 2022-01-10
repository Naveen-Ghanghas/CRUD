<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Session;
class home extends Controller
{
    function postdata(Request $req){
        $name=$req->name;
        $email=$req->email;
        $password=$req->password;
        $post= new post;
        $post->name=$name;
        $post->email=$email;
        $post->password=$password;
        if($post->save()){
            return redirect('/');
        }
        else{
            echo "post data not saved";
        }
    }
    function addpost(){
        return view('addpost');
    }
    function fetchpost(){
        $post=post::get();
        return view('main',['postdata'=>$post]);
    }
    function delpost($id){
       if(post::where('id',$id)->delete()){
           return redirect('/');
       }
       else
       {
           return redirect('/');
       }
    }
    function editpost($id){
        $post=post::where('id',$id)->first();
        return view('editpost',['post'=>$post]);
    }
    function updatepost(Request $req){
       $name=$req->name;
       $email=$req->email;
       $password=$req->password;
       $post=post::where('id',$req->id)->first();
       $post->name=$name;
       $post->email=$email;
       $post->password=$password;
       if($post->save()){
           return redirect(url('/'));
       }
       else{
           return redirect(url('/addpost'));
       }
    }
    function login(){
        return view('login');
    }
    function userlogin(Request $req){
       $email=$req->email;
       $password=$req->password;
       $data=post::where(['email' => $email, 'password' => $password])->get();
       if(count($data)>0){
           session::put('uid',$email);
           return redirect('/dashboard');
       }
       else{
           return redirect('/login')->with('errmsg','email and password is incorrect');
       }
    }
    function dashboard(){
        return view('dashboard');
    }
    public function logout()
    {
        Session::flush();

        // Auth::logout();

        return redirect('login');
    }

    function changePass(){
     return view('changePass');

    }
    function changePassword(Request $req){
        $op=$req->op;
        $np=$req->np;
        $cp=$req->cp;
        if($np==$cp){
          $sid=Session::get('uid');

          $data=post::where('email',$sid)->first();

           if($data->password==$op){
              if($op==$np){
                return redirect('/changepass')->with('errmsg',
                'old password and new password is not same');
              }
              else{
                  $data1=post::find($data->id);
                  $data1->password=$np;
                 if($data1->save()) {
                    return redirect('/changepass')->with('succmsg',
                    'password changed successfully');
                 }else{
                    return redirect('/changepass')->with('errmsg',
                    'something went wrong');
                 }
              }
           }else{
             return redirect('/changepass')->with('errmsg',
             'old password not correct');
           }
        }else{
            return redirect('/changepass')->with('errmsg',
            'new password and comform pssword is not same');
        }
}
}
