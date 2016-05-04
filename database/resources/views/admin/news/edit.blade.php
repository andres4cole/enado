@extends('admin')


@section('content')



<div class="col-md-8 offset-2">

  <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">edit news</h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
    <form role="form" method="Post" action="{{ url('/admin/news/'.$news->id.'/update') }}" enctype="multipart/form-data" id="form" >
     <div class="box-body">

     	   <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
                   <input type="hidden" name="userid"  value="{{ Auth::user()->id }}" >
                   

                   <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}} ">
                      <label for="title"></label>
                      <input type="text" id="title" class="form-control" name="title"  placeholder="title" value="{{ $news->title }}">
                      <div class="error help-block">{{ $errors->first('title')}}</div>
                       </div>

                           <div class="form-group {{{ $errors->has('mews') ? 'has-error' : ''}}}">
                    <textarea class="form-control" col="10" row="5"  name="news" id="new" placeholder="main news" value="" required="required"> {{ $news->news  }}</textarea>
                    <div class="error">{{ $errors->first('news') }}</div>
                    </div>
				   
				   
				   
				          <div class="form-group {{{ $errors->has('summary') ? 'has-error' : ''}}}">
                 <textarea class="form-control" col="5" row="5"  name="summary" id="summary" placeholder="main summary" value="" required="required"> {{ $news->summary }}</textarea>
                   <div class="error">{{ $errors->first('summary') }}</div>
                  </div>





				              <div class="form-group {{{ $errors->has('picture') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment image
                      <input type="file" name="picture" id="picture" />
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