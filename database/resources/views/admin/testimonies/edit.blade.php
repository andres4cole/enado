@extends('admin')


@section('content')



               <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"> Edit {{ $testimony->title }}</h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
                <form role="form" method="Post" action="{{ url('/admin/testimonies/'.$testimony->id.'/update') }}" enctype="multipart/form-data" id="form">
                  <div class="box-body">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{ $testimony->id }}"> 


  
    <div class="form-group {{{ $errors->has('firstname') ? 'has-error' : '' }}}">
  <lable for="firstname">firstname</lable>
  <input type="text" class="form-control" name="firstname" id="firstname" placeholder="firstname" value="{{ $testimony->firstname }}" required="required">
  <div class="error">{{ $errors->first('firstname') }}</div>
  </div>

   <div class="form-group {{{ $errors->has('lastname') ? 'has-error' : '' }}}">
  <lable for="lastname">lastname</lable>
  <input type="text"  class="form-control" name="lastname" id="lastname" placeholder="lastname"  value="{{ $testimony->lastname }}" required="required">
   <div class="error">{{ $errors->first('lastname') }}</div>
  </div>


   <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
  <lable for="email">email</lable>
  <input type="email"  class="form-control" name="email" id="email" placeholder="email address"   value="{{ $testimony->email }}" required="required">
   <div class="error">{{ $errors->first('email') }}</div>
  </div>


 <div class="form-group {{{ $errors->has('company') ? 'has-error' : '' }}}">
  <lable for="company">company</lable>
  <input type="text"  class="form-control" name="company" id="company" placeholder="company name"  value="{{ $testimony->company }}" required="required">
    <div class="error">{{ $errors->first('company') }}</div>
  </div>


 <div class="form-group {{{ $errors->has('position') ? 'has-error' : '' }}}">
  <lable for="position">position</lable>
  <input type="text"  class="form-control" name="position" id="position" placeholder="position"  value="{{ $testimony->position }}" required="required">
   <div class="error">{{ $errors->first('position') }}</div>
   </div>

 <div class="form-group {{{ $errors->has('website') ? 'has-error' : '' }}}">
  <lable for="website">website</lable>
  <input type="text"  class="form-control" name="website" id="website" placeholder="website"  value="{{ $testimony->website }}" required="required">
   <div class="error">{{ $errors->first('website') }}</div>
  </div>

   <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
  <lable for="subject">subject</lable>
  <input type="text"  class="form-control" name="title" id="title" placeholder="enter title"  value="{{ $testimony->title }}" required="required">
    <div class="error">{{ $errors->first('title') }}</div>
  </div>



   <div class="form-group {{{ $errors->has('message') ? 'has-error' : '' }}}">
  <lable for="message">message</lable>
  <textarea class="form-control"  row="5" col="10" name="message" id="message" placeholder="message content here"  value="" required="required"> {{ $testimony->content }}</textarea>
    <div class="error">{{ $errors->first('message') }}</div>
  </div>


 <div class="form-group {{{ $errors->has('picture') ? 'has-error' : ''}}}">
  <lable for="picture">display picture</lable>
  <input type="file"  class="form-control" name="picture" id="pic" value="{{ $testimony->image }}">
    <div class="error">{{ $errors->first('picture') }}</div>
  </div>







     </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

          </div>


@endsection



@section('sidebar')




@endsection