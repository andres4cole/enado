@extends('admin')


@section('content')


  <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">create portfolio</h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
    <form role="form" method="Post" action="{{ url('/admin/portfolio/store') }}" enctype="multipart/form-data" id="form" >
     <div class="box-body">

     	   <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
                   <input type="hidden" name="userid"  value="{{ Auth::user()->id }}" >
                   


  	 <div class="form-group {{{ $errors->has('name') ? 'has-error' : ''}}}">
   	 	<lable class="col-md-4 control-lable">name</lable>
   	 	<input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ old('name') }}" required="required">
   	 	<div class="error">{{ $errors->first('name')}}</div>
   	</div>

      <div class="form-group {{{ $errors->has('title') ? 'has-error' : ''}}}">
      <lable class="col-md-4 control-lable">title</lable>
      <input type="text" class="form-control" name="title" id="budget" placeholder="title" value="{{ old('title') }}" required="required">
      <div class="error">{{ $errors->first('title')}}</div>
     </div>


   	<div class="form-group {{{ $errors->has('client') ? 'has-error' : ''}}}">
   	 	<lable  class="col-md-4 control-lable">client</lable>
   	 	<input type="text" class="form-control" name="client" id="client" placeholder="client" value="{{ old('client') }}" required="required">
   	 	<div class="error">{{ $errors->first('client')}}</div>
   	 </div>

   	<div class="form-group {{{ $errors->has('budget') ? 'has-error' : ''}}}">
   	 	<lable class="col-md-4 control-lable">budget</lable>
   	 	<input type="text" class="form-control" name="budget" id="budget" placeholder="budget" value="{{ old('budget') }}" required="required">
   	 	<div class="error">{{ $errors->first('budget')}}</div>
   	 </div>

          <div class="form-group {{{ $errors->has('cost') ? 'has-error' : ''}}}">
   	 	<lable  class="col-md-4 control-lable">cost</lable>
   	 	<input type="text" class="form-control" name="cost" id="cost" placeholder="cost" value="{{ old('cost') }}" required="required">
   	 	<div class="error">{{ $errors->first('cost')}}</div>
   	 </div>

          <div class="form-group {{{ $errors->has('website') ? 'has-error' : ''}}}">
   	 	<lable  class="col-md-4 control-lable">website</lable>
   	 	<input type="url" class="form-control" name="website" id="website" placeholder="website" value="{{ old('website') }}" required="required">
   	 	<div class="error">{{ $errors->first('website')}}</div>
   	</div>


         <div class="form-group {{{ $errors->has('technologies') ? 'has-error' : ''}}}">
   	 	<lable class="col-md-4 control-lable">technologies</lable>
   	 	<input type="text" class="form-control" name="technologies" id="technologies" placeholder="technologies" value="{{ old('technologies') }}" required="required">
   	 	<div class="error">{{ $errors->first('technologies')}}</div>
   	</div>

         

   	<div class="form-group {{{ $errors->has('description') ? 'has-error' : ''}}}">
   	 	<lable  class="col-md-4 control-lable">description</lable>
   	 	<textarea class="form-control" name="description" id="description"  row="5" col="10" placeholder="description" value="" required="required">{{ old('description') }}</textarea>
   	 	<div class="error">{{ $errors->first('description')}}</div>
   	</div>

         <div class="form-group {{{ $errors->has('start_time') ? 'has-error' : ''}}}">
   	 	<lable class="col-md-4 control-lable">start time</lable>
   	 	<input type="text" class="form-control" name="start_time" id="start" placeholder="start time" value="{{ old('start_time') }}" required="required">
   	 	<div class="error">{{ $errors->first('start_time')}}</div>
   	</div>


       <div class="form-group {{{ $errors->has('end_time') ? 'has-error' : ''}}}">
   	 	<lable class="col-md-4 control-lable">end time</lable>
   	 	<input type="text" class="form-control" name="end_time" id="end" pltaceholder="end time" value="{{ old('end_time') }}" required="required">
   	 	<div class="error">{{ $errors->first('end_time')}}</div>
   	</div>



   <div class="form-group {{{ $errors->has('picture') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment image
                      <input type="file" name="picture" id="picture" />
                       <div class="error help-block">{{ $errors->first('')}}</div>
                    </div>
                    <p class="help-block">Max. 32MB</p>
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