@extends('admin')


@section('content')


    <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"> Edit {{ $user->name }}</h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
                <form role="form" method="Post" action="{{ url('/admin/account/'.$user->id.'/update') }}" enctype="multipart/form-data" id="form" >
                  <div class="box-body">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{ $user->id }}">
			  
                <div class="form-group {{{ $errors->has('firstname') ? 'has-error' : '' }}} ">
                      <label for="firstname">firstname</label>
                      <input type="text" id="firstname" class="form-control" name="firstname"  placeholder="firstname" value="{{ $user->firstname }}">
                      <div class="error help-block">{{ $errors->first('firstname')}}</div>
                       </div>
					   
					   <div class="form-group {{{ $errors->has('lastname') ? 'has-error' : '' }}} ">
                      <label for="lastname">lastname</label>
                      <input type="text" id="lastname" class="form-control" name="lastname"  placeholder="lastname" value="{{ $user->lastname }}">
                      <div class="error help-block">{{ $errors->first('lastname')}}</div>
                       </div> 
					    <div class="form-group {{{ $errors->has('occupation') ? 'has-error' : '' }}} ">
                      <label for="occupation">occupation</label>
                      <input type="text" id="occupation" class="form-control" name="occupation"  placeholder="occupation" value="{{ $user->occupation }}">
                      <div class="error help-block">{{ $errors->first('occupation')}}</div>
                       </div> 
					    <div class="form-group {{{ $errors->has('skills') ? 'has-error' : '' }}} ">
                      <label for="skills">skills</label>
                      <input type="text" id="skills" class="form-control" name="skills"  placeholder="skills" value="{{ $user->skills }}">
                      <div class="error help-block">{{ $errors->first('skills')}}</div>
                       </div> 
					     <div class="form-group {{{ $errors->has('phone') ? 'has-error' : '' }}} ">
                      <label for="phone">phone</label>
                      <input type="text" id="phone" class="form-control" name="phone"  placeholder="phone" value="{{ $user->phone }}">
                      <div class="error help-block">{{ $errors->first('phone')}}</div>
                       </div>
					   
					    <div class="form-group  {{{ $errors->has('sex') ? 'has-error' : ''}}}">
                        <lable for="">select gender </lable>
                        <select  class="form-control" name="sex"  value="{{ $user->sex }}" id="sex">
                         <option value="male">male</option>
						 <option value="female">female</option>
                         </select>
                            <div class="error">{{ $errors->first('sex') }}</div>
                      </div>
					   
					    <div class="form-group  {{{ $errors->has('country') ? 'has-error' : ''}}}">
                        <lable for="country">select country </lable>
                        <select  class="form-control" name="country"  value="{{ $user->country}}" id="country">
                         @foreach($country as $country)
                         <option value="{{ $country->name }}">{{ $country->name}}</option>
                          @endforeach
                         </select>
                            <div class="error">{{ $errors->first('country') }}</div>
                      </div>
					   <div class="form-group {{{ $errors->has('state') ? 'has-error' : '' }}} ">
                      <label for="state">state</label>
                      <input type="text" id="state" class="form-control" name="state"  placeholder="state" value="{{ $user->state }}">
                      <div class="error help-block">{{ $errors->first('state')}}</div>
                       </div>
					   
					   <div class="form-group {{{ $errors->has('city') ? 'has-error' : '' }}} ">
                      <label for="city">city</label>
                      <input type="text" id="city" class="form-control" name="city"  placeholder="city" value="{{ $user->city }}">
                      <div class="error help-block">{{ $errors->first('city')}}</div>
                       </div>
					   
					 <div class="form-group {{{ $errors->has('picture') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> profile picture
                      <input type="file" name="picture" id="picture" value="{{ $user->picture }}" />
                       <div class="error help-block">{{ $errors->first('picture')}}</div>
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>
				<div class="form-group {{{ $errors->has('cover') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> profile cover
                      <input type="file" name="cover" id="cover" value="{{ $user->cover }}" />
                       <div class="error help-block">{{ $errors->first('cover')}}</div>
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>
				     
					 <div class="form-group {{{ $errors->has('background') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> profile background
                      <input type="file" name="background" id="background" value="{{ $user->background }}" />
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



@section('sidbar')




@endsections