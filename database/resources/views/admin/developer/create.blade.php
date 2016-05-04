@extends('admin')


@section('content')



 <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">create new developer</h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
                <form role="form" method="Post" action="{{ url('/admin/developer/store') }}" enctype="multipart/form-data" id="form" >
                  <div class="box-body">
                   <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
 				   <input type="hidden" name="userid"  value="{{ Auth::user()->id }}" >
                  

                    <div class="form-group {{{ $errors->has('firstname') ? 'has-error' : '' }}} ">
                      <label for="firstname">firstname</label>
                      <input type="text" id="firstname" class="form-control" name="firstname"  placeholder="firstname" value="{{ old('firstname')}}">
                      <div class="error help-block">{{ $errors->first('firstname')}}</div>
                       </div>

                        <div class="form-group {{{ $errors->has('lastname') ? 'has-error' : '' }}} ">
                      <label for="lastname">lastname</label>
                      <input type="text" id="" class="form-control" name="lastname"  placeholder="lastname" value="{{ old('lastname')}}">
                      <div class="error help-block">{{ $errors->first('lastname')}}</div>
                       </div>


                         <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}} ">
                      <label for="email">email</label>
                      <input type="email" id="email" class="form-control" name="email"  placeholder="yourname@example.com" value="{{ old('email')}}">
                      <div class="error help-block">{{ $errors->first('email')}}</div>
                       </div>


                         <div class="form-group {{{ $errors->has('position') ? 'has-error' : '' }}} ">
                      <label for="position">postion</label>
                      <input type="text" id="" class="form-control" name="position"  placeholder="position" value="{{ old('position')}}">
                      <div class="error help-block">{{ $errors->first('position')}}</div>
                       </div>

                         <div class="form-group {{{ $errors->has('skills') ? 'has-error' : '' }}} ">
                      <label for="skills">skills</label>
                      <input type="text" id="skills" class="form-control" name="skills"  placeholder="skills" value="{{ old('skills')}}">
                      <div class="error help-block">{{ $errors->first('skills')}}</div>
                       </div>

                         <div class="form-group {{{ $errors->has('about') ? 'has-error' : '' }}} ">
                      <label for="about">about</label>
                      <textarea id="about" row="5" col="10" class="form-control" name="about"  placeholder="about" value="">{{ old('about')}}</textarea>
                      <div class="error help-block">{{ $errors->first('about')}}</div>
                       </div>


                        <div class="form-group  {{{ $errors->has('gender') ? 'has-error' : ''}}}">
                        <lable for="country">select gender </lable>
                        <select  class="form-control" name="gender"  value="{{ old('gender')}}" id="">
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                         </select>
                            <div class="error">{{ $errors->first('gender') }}</div>
                      </div>




                           <div class="form-group {{{ $errors->has('phone') ? 'has-error' : '' }}} ">
                      <label for="phone">phone number</label>
                      <input type="number" id="phone" class="form-control" name="phone"  placeholder="phone number" value="{{ old('phone')}}">
                      <div class="error help-block">{{ $errors->first('phone')}}</div>
                       </div>

                          <div class="form-group  {{{ $errors->has('country') ? 'has-error' : ''}}}">
                        <lable for="country">select country </lable>
                        <select  class="form-control" name="country"  value="{{ old('country')}}" id="">
                         @foreach($country as $country)
                         <option value="{{ $country->id }}">{{ $country->name}}</option>
                          @endforeach
                         </select>
                            <div class="error">{{ $errors->first('country') }}</div>
                      </div>



                       <div class="form-group {{{ $errors->has('state') ? 'has-error' : '' }}} ">
                      <label for="state">state</label>
                      <input type="text" id="state" class="form-control" name="state"  placeholder="state" value="{{ old('state')}}">
                      <div class="error help-block">{{ $errors->first('state')}}</div>
                       </div>

                        <div class="form-group {{{ $errors->has('city') ? 'has-error' : '' }}} ">
                      <label for="city">city</label>
                      <input type="text" id="city" class="form-control" name="city"  placeholder="city" value="{{ old('city')}}">
                      <div class="error help-block">{{ $errors->first('city')}}</div>
                       </div>

                      <div class="form-group {{{ $errors->has('picture') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> display image
                      <input type="file" name="picture" id="picture" />
                       <div class="error help-block">{{ $errors->first('picture')}}</div>
                    </div>
                    <p class="help-block">Max. 2MB</p>
                  </div>

                    <div class="form-group {{{ $errors->has('cover') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i>cover picture
                      <input type="file" name="cover" id="cover" />
                       <div class="error help-block">{{ $errors->first('cover')}}</div>
                    </div>
                    <p class="help-block">Max. 2MB</p>

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