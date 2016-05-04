@extends('admin')


@section('content')



   <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">create new title</h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
                <form role="form" method="Post" action="{{ url('/admin/portfolio/'.$pf->id.'/update') }}" enctype="multipart/form-data" id="form" class="form-horizontal">
                  <div class="box-body">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="id" value="{{ $pf->id }}"> 

   	 <div class="form-group {{ $errors->has('name')? 'has-error' : ''}}">
   	 	<lable for="name" class="col-md-4 control-lable">name</lable>
   	 	<div class="col-md-6">
   	 	<input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ $pf->name }}" required="required">
   	 	<div class="error">{{ $errors->first('name')}}</div>
   	 </div>
   	</div>

   	<div class="form-group {{ $errors->has('title')? 'has-error' : ''}}">
   	 	<lable for="title" class="col-md-4 control-lable">title</lable>
   	 	<div class="col-md-6">
   	 	<input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{ $pf->title }}" required="required">
   	 	<div class="error">{{ $errors->first('title')}}</div>
   	 </div>
   	</div>

   	<div class="form-group {{ $errors->has('client')? 'has-error' : ''}}">
   	 	<lable for="client" class="col-md-4 control-lable">client</lable>
   	 	<div class="col-md-6">
   	 	<input type="text" class="form-control" name="client" id="client" placeholder="" value="{{ $pf->client }}" required="required">
   	 	<div class="error">{{ $errors->first('client')}}</div>
   	 </div>
   	</div>

   	<div class="form-group {{ $errors->has('budget')? 'has-error' : ''}}">
   	 	<lable for="budget" class="col-md-4 control-lable">budget</lable>
   	 	<div class="col-md-6">
   	 	<input type="text" class="form-control" name="budget" id="budget" placeholder="budget" value="{{ $pf->budget }}" required="required">
   	 	<div class="error">{{ $errors->first('budget')}}</div>
   	 </div>
   	</div>
<div class="form-group {{ $errors->has('cost')? 'has-error' : ''}}">
   	 	<lable for="cost" class="col-md-4 control-lable">cost</lable>
   	 	<div class="col-md-6">
   	 	<input type="text" class="form-control" name="cost" id="cost" placeholder="cost" value="{{ $pf->cost }}" required="required">
   	 	<div class="error">{{ $errors->first('cost')}}</div>
   	 </div>
   	</div>

<div class="form-group {{ $errors->has('website')? 'has-error' : ''}}">
   	 	<lable for="website" class="col-md-4 control-lable">website</lable>
   	 	<div class="col-md-6">
   	 	<input type="text" class="form-control" name="website" id="website" placeholder="website" value="http://{{ $pf->website }}" required="required">
   	 	<div class="error">{{ $errors->first('website')}}</div>
   	 </div>
   	</div>


<div class="form-group {{ $errors->has('technologies')? 'has-error' : ''}}">
   	 	<lable for="technologies" class="col-md-4 control-lable">technologies</lable>
   	 	<div class="col-md-6">
   	 	<input type="text" class="form-control" name="technologies" id="technologies" placeholder="technologies" value="{{$pf->technologies }}" required="required">
   	 	<div class="error">{{ $errors->first('technologies')}}</div>
   	 </div>
   	</div>

 <div class="form-group {{ $errors->has('picture')? 'has-error' : ''}}">
   	 	<lable for="image" class="col-md-4 control-lable">image</lable>
   	 	<div class="col-md-6">
   	 	<input type="file" class="form-control" name="picture" id="image" placeholder="image" value="{{$pf->image}}">
   	 	<div class="error">{{ $errors->first('picture')}}</div>
   	 </div>
   	</div>

   	<div class="form-group {{ $errors->has('description')? 'has-error' : ''}}">
   	 	<lable for="description" class="col-md-4 control-lable">description</lable>
   	 	<div class="col-md-6">
   	 	<textarea class="form-control" name="description" id="description"  row="5" col="10" value=" " required="required">{{ $pf->description }}</textarea>
   	 	<div class="error">{{ $errors->first('description')}}</div>
   	 </div>
   	</div>

        <div class="form-group {{ $errors->has('start_time')? 'has-error' : ''}}">
   	 	<lable for="start_time" class="col-md-4 control-lable">start time</lable>
   	 	<div class="col-md-6">
   	 	<input type="text" class="form-control" name="start_time" id="start_time" placeholder="start time" value="{{ $pf->start_time }}" required="required">
   	 	<div class="error">{{ $errors->first('start_time')}}</div>
   	    </div>
   	   </div>


 <div class="form-group {{ $errors->has('end_time')? 'has-error' : ''}}">
   	 	<lable for="end_time" class="col-md-4 control-lable">end time</lable>
   	 	<div class="col-md-6">
   	 	<input type="text" class="form-control" name="end_time" id="end_time" placeholder="" value="{{ $pf->end_time }}" required="required">
   	 	<div class="error">{{ $errors->first('end_time')}}</div>
   	 </div>
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