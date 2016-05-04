@extends('admin')


@section('content')



  <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">create new services </h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
    <form role="form" method="Post" action="{{ url('/admin/services/store') }}" enctype="multipart/form-data" id="form" >
     <div class="box-body">

     	   <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
                   <input type="hidden" name="userid"  value="{{ Auth::user()->id }}" >
                   


                    <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}} ">
                      <label for="title">title</label>
                      <input type="text" id="title" class="form-control" name="title"  placeholder="title" value="{{ old('title')}}">
                      <div class="error help-block">{{ $errors->first('title')}}</div>
                       </div>

                         <div class="form-group  {{{ $errors->has('services') ? 'has-error' : '' }}}">
                       <label for="services" >services</label>
                      <textarea name="services" id="" class="form-control" rows="3" placeholder="Enter ..." style="height: 300px">{{ old('services')}}</textarea>
                    <div class="error help-block">{{ $errors->first('services')}}</div>
                    </div>


                       <div class="form-group {{{ $errors->has('picture') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment image
                      <input type="file" name="picture" id="picture" value="{{ old('picture') }}" />
                       <div class="error help-block">{{ $errors->first('picture')}}</div>
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