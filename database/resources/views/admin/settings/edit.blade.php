@extends('admin')


@section('content')

     <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"> Edit {{ $setting->name }}</h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
                <form role="form" method="Post" action="{{ url('/admin/settings/'.$setting->id.'/update') }}" enctype="multipart/form-data" id="form" >
                  <div class="box-body">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{ $setting->id }}"> 

        

             <input type="hidden" name="userid"  value="{{ Auth::user()->id }}" >
                   

                    <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}} ">
                      <label for="title">title</label>
                      <input type="text" id="title" class="form-control" name="title"  placeholder="" value="{{ $setting->title }}">
                      <div class="error help-block">{{ $errors->first('title')}}</div>
                       </div>

                       <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}} ">
                      <label for="name">name</label>
                      <input type="text" id="name" class="form-control" name="name"  placeholder="" value="{{ $setting->name }}">
                      <div class="error help-block">{{ $errors->first('name')}}</div>
                       </div>
					   
					   <div class="form-group {{{ $errors->has('address') ? 'has-error' : '' }}} ">
                      <label for="address">address</label>
                      <input type="text" id="address" class="form-control" name="address"  placeholder="" value="{{ $setting->address }}">
                      <div class="error help-block">{{ $errors->first('address')}}</div>
                       </div>
					   
					      <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}} ">
                      <label for="description">description</label>
                      <input type="text" id="description" class="form-control" name="description"  placeholder="" value="{{ $setting->description }}">
                      <div class="error help-block">{{ $errors->first('description')}}</div>
                       </div>
					      <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}} ">
                      <label for="email">email</label>
                      <input type="text" id="email" class="form-control" name="email"  placeholder="" value="{{ $setting->email }}">
                      <div class="error help-block">{{ $errors->first('email')}}</div>
                       </div>
					      <div class="form-group {{{ $errors->has('fax') ? 'has-error' : '' }}} ">
                      <label for="fax">fax</label>
                      <input type="text" id="fax" class="form-control" name="fax"  placeholder="" value="{{ $setting->fax }}">
                      <div class="error help-block">{{ $errors->first('fax')}}</div>
                       </div>
					      <div class="form-group {{{ $errors->has('phone') ? 'has-error' : '' }}} ">
                      <label for="phone">phone</label>
                      <input type="text" id="phone" class="form-control" name="phone"  placeholder="" value="{{ $setting->phone }}">
                      <div class="error help-block">{{ $errors->first('phone')}}</div>
                       </div>
					      <div class="form-group {{{ $errors->has('facebook') ? 'has-error' : '' }}} ">
                      <label for="facebook">facebook</label>
                      <input type="text" id="facebook" class="form-control" name="facebook"  placeholder="" value="{{ $setting->facebook }}">
                      <div class="error help-block">{{ $errors->first('facebook')}}</div>
                       </div>
					      <div class="form-group {{{ $errors->has('twitter') ? 'has-error' : '' }}} ">
                      <label for="twitter">twitter</label>
                      <input type="text" id="twitter" class="form-control" name="twitter"  placeholder="" value="{{ $setting->twitter }}">
                      <div class="error help-block">{{ $errors->first('twitter')}}</div>
                       </div>
					     <div class="form-group {{{ $errors->has('google') ? 'has-error' : '' }}} ">
                      <label for="google">google</label>
                      <input type="text" id="google" class="form-control" name="google"  placeholder="" value="{{ $setting->google }}">
                      <div class="error help-block">{{ $errors->first('google')}}</div>
                       </div>
                      <div class="form-group {{{ $errors->has('logo') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> website logo
                      <input type="file" name="logo" id="logo"  value="{{ $setting->logo }}" />
                       <div class="error help-block">{{ $errors->first('logo')}}</div>
                    </div>
                    <p class="help-block">Max. 30KB</p>
                  </div>

                    <div class="form-group {{{ $errors->has('background') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> background image
                      <input type="file" name="background" id="background" value="{{ $setting->background }}" />
                       <div class="error help-block">{{ $errors->first('background')}}</div>
                    </div>
                    <p class="help-block">Max. 30Kb </p>
                  </div>


                   <div class="form-group {{{ $errors->has('type') ? 'has-error' : '' }}} ">
                      <label for="type">type</label>
                      <select id="type" class="form-control" name="type"  value="{{ $setting->type }}" >
                        <option value="frontend">frontend</option>
                        <option value="admin">admin</option>
                      </select>
                      <div class="error help-block">{{ $errors->first('type')}}</div>
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