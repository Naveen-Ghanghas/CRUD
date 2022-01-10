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
      @if($message=Session::get('errmsg'))
      <div class="alert alert-danger">
          {{ $message }}
      </div>
      @endif
      @if($message=Session::get('succmsg'))
      <div class="alert alert-danger">
          {{ $message }}
      </div>
      @endif
<form method="post" action="{{url('/changepassword')}}">
  @csrf()

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">old password</label>
    <input type="password" class="form-control" name="op" id="exampleInputEmail1" >

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> new Password</label>
    <input type="password" class="form-control" name="np" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> Confirm Password</label>
    <input type="password" class="form-control" name="cp" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
  </body>
</html>
@endsection
