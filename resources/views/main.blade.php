@extends('master')
@section('title','main page')
@section('content')

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  </head>
  <body>
  <table width="100%" cellspacing="1" cellpadding="1"class="table">
      <tr>
          <td colspan="4"><a class="btn btn-primary"href="{{url('/addpost')}}">Add post</A></a></td>
      </tr>

      <tr>
          <td>Sr No</td>
          <td>Name</td>
          <td>Email</td>
          <td>password</td>
          <td>Action</td>
      </tr>
      @php
      $sn=1;
      @endphp
      @foreach($postdata as $post)
      <tr>

          <td>{{$sn}}</td>
          <td>{{$post->name}}</td>
          <td>{{$post->email}}</td>
          <td>{{$post->password}}</td>
          <td>
              <a class="btn btn-info"href="{{url('/editpost/'.$post->id)}}">Edit</a>
              <a class="btn btn-danger"href="{{url('/delpost/'.$post->id)}}">Delete</a>
          </td>

      </tr>
      @php
          $sn++
          @endphp
          @endforeach
  </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>
@endsection
