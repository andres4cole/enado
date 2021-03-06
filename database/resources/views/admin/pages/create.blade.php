@extends('admin')


@section('content')



             <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">create new title</h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
                <form role="form" method="Post" action="{{ url('/admin/pages/store') }}" enctype="multipart/form-data" id="form" >
                  <div class="box-body">
                   <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
                   <input type="hidden" name="userid"  value="{{ Auth::user()->id }}" >
				   
				   
				   
				    <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}} ">
                      <label for="name">name</label>
                      <input type="text" id="name" class="form-control" name="name"  placeholder="name" value="{{ old('name')}}">
                      <div class="error help-block">{{ $errors->first('name')}}</div>
                       </div>
             
              <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}} ">
                      <label for="title"></label>
                      <input type="text" id="title" class="form-control" name="title"  placeholder="title" value="{{ old('title')}}">
                      <div class="error help-block">{{ $errors->first('title')}}</div>
                       </div>
           
           
                <div class="form-group {{{ $errors->has('url') ? 'has-error' : '' }}} ">
                      <label for="url">url</label>
                      <input type="text" id="url" class="form-control" name="url"  placeholder="url" value="{{ old('url')}}">
                      <div class="error help-block">{{ $errors->first('url')}}</div>
                       </div>


                        <div class="form-group {{{ $errors->has('content') ? 'has-error' : ''}}}">
                    <textarea class="form-control" col="10" row="5"  name="content" id="news" placeholder="main pages details" value="" required="required"> {{ old('content') }}</textarea>
                    <div class="error">{{ $errors->first('content') }}</div>
                    </div>

				   
				   
				   
				   
				   
				              <div class="form-group {{{ $errors->has('picture') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment image
                      <input type="file" name="picture" id="picture" />
                       <div class="error help-block">{{ $errors->first('picture')}}</div>
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>

                     <div class="form-group {{{ $errors->has('background') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> background image
                      <input type="file" name="background" id="backgroud" />
                       <div class="error help-block">{{ $errors->first('background')}}</div>
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