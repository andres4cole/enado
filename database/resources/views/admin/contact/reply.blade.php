@extends('admin')


@section('content')


<div class="col-md-8 offset-2">

  <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">reply {{ $reply->firstname }} {{ $reply->lastname }}</h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
    <form role="form" method="Post" action="{{ url('/admin/contact/store') }}" enctype="multipart/form-data" id="form" >
     <div class="box-body">

     	   <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
           <input type="hidden" name="userid"  value="{{ Auth::user()->id }}" >
           <input type="hidden" name="email" value="{{ $reply->email }}">
           <input type="hidden" name="firstname" value="{{ $reply->firstname }}">
           <input type="hidden" name="lastname" value="{{ $reply->lastname }}">

           <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}  ">
           	<label for="title">title</label>
           	<input type="text" name="title" id="title" class="form-control" placeholder="enter the tittle of the message" required="required" value="{{old('title')}}">
           	<div class="error help-block">{{ $errors->first('title') }}</div>
           </div>
           <div class="form-group {{{ $errors->has('message') ? 'has-error' : ''}}}">
           	<textarea name="message" id="message" col="5" row="5" class="form-control">{{old('message')}}</textarea>
           	<div class="error help-block">{{ $errors->first('message')}}</div>
           </div>

 			<button type="submit" class="btn btn-primary">send</button>

           </div>
             


                           </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->




</div>


@endsection



@section('sidebar')




@endsection