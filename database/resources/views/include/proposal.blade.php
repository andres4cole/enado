 
 <div class="col-md-4">
              <!-- general form elements -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Request proposal</h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
                 <!-- form start -->
                <form role="form" method="Post" action="{{ url('request/s') }}" enctype="multipart/form-data" id="form">
                  <div class="box-body">
                   <input type="hidden" name="_token"  value="{{ csrf_token() }}" >



                       <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}} ">
                      <input type="text" id="name" class="form-control" name="name"  placeholder="full name " value="{{ old('name')}}">
                      <div class="error help-block">{{ $errors->first('name')}}</div>
                       </div>

                         <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}} ">
                      <input type="email" id="email" class="form-control" name="email"  placeholder="yourname@example.com" value="{{ old('email')}}">
                      <div class="error help-block">{{ $errors->first('email')}}</div>
                       </div>




                      <div class="form-group {{{ $errors->has('phone') ? 'has-error' : '' }}} ">
                      <input type="number" id="phone" class="form-control" name="phone" maxlength="12"  placeholder="phone number" value="{{ old('phone')}}">
                      <div class="error help-block">{{ $errors->first('phone')}}</div>
                       </div>

                          <div class="form-group  {{{ $errors->has('country') ? 'has-error' : ''}}}">
                        <select  class="form-control" name="country"  value="{{ old('country')}}" id="">
                         @foreach($country as $country)
                         <option value="{{ $country->name }}">{{ $country->name}}</option>
                          @endforeach
                         </select>
                            <div class="error">{{ $errors->first('country') }}</div>
                         </div>


                <div class="form-group  {{{ $errors->has('proposal_type') ? 'has-error' : ''}}}">
							  <lable for="proposal_type">Select the kind of project You need</lable>
							  <select  class="form-control" name="proposal_type"  value="{{ old('proposal_type')}}" id="proposal_type">
							   <option>web development services </option>
							   <option>Mobile Application development</option>
							   <option>IT consulting </option>
							   <option>Upgrading of existing website</option>
							   </select>
							   <div class="error">{{ $errors->first('proposal_type') }}</div>
							 </div>


							 <h6>About the project<h6>
							 <p>Gives us the information about your product, company services or something else you want to create. 
							 	The more the better</p>

					  <div class="form-group {{{ $errors->has('description') ? 'has-error' : ''}}}">
                    	<textarea name="description" id="description" col="5" row="5" class="form-control">{{old('description')}}</textarea>
                     	<div class="error help-block">{{ $errors->first('description')}}</div>
          					 </div>

          		   <div class="form-group {{{ $errors->has('proposal_file') ? 'has-error' : '' }}}">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attach files
                      <input type="file" name="proposal_file" id="picture" />
                  </div>
                       <div class="error help-block">{{ $errors->first('proposal_file')}}</div>
                    
                    <p class="help-block">Max. 32MB we only accept zip files</p>
                  </div>


                   <div class="form-group  {{{ $errors->has('time_frame') ? 'has-error' : ''}}}">
							  <lable for="time_frame">Select Time Frames</lable>
							  <select  class="form-control" name="time_frame"  value="{{ old('time_frame')}}" id="time_frame">
							   <option>undetermined</option>
							   <option>immediately</option>
							   <option>one week</option>
							   <option>one month</option>
							   <option>'Six months</option>
							   </select>
							   <div class="error">{{ $errors->first('time_frame') }}</div>
							 </div>


                               <div class="form-group  {{{ $errors->has('budget') ? 'has-error' : ''}}}">
							  <lable for="budget"> Estimated Budget </lable>
							  <select  class="form-control" name="budget"  value="{{ old('budget')}}" id="budget">
							   <option>Less than $5000</option>
							   <option>$5000 - $10,000</option>
							   <option>$10,000 - $25,000</option>
							   <option>$25,000 - $50,000</option>
							   <option>$50,000 - $100,000</option>
							   <option>$100,000+</option>
							   <option>Not Sure</option>							
							   </select>
							   <div class="error">{{ $errors->first('budget') }}</div>
							 </div>


                     <div class="form-group {{{ $errors->has('pin') ? 'has-error' : '' }}} ">
                      <input type="text" id="pin" class="form-control" name="pin" maxlength="4" placeholder="enter 4 digit pin" value="{{ old('pin')}}">
                      <div class="error help-block">{{ $errors->first('pin')}}</div>
                      <div class="help-block">Enter 4 digit pin to access your proposal</div>
                       </div>



                      </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
        </div>


