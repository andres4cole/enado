
@extends('app')

 @section('headerapp')


 <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone "></i>
                        </div>
                        <div class="media-body">
                            <h2>Have a question or need a help?</h2>
                            <p>contacts us via email form below or call our phone line direct  <b> {{ $contact->phone}}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->
  @endsection

@section('content')

<div class="col-md-8">
			
	        			<!-- Map -->
	        			<!-- div id="contact-us-map" -->

	        			<div class="panel panel-default">
                <div class="gmap-area">
	        			<div class="panel-body">
	     
       
<form  id="contactus" class="form-horizontal" role="form" method="POST" action="{{ url('contact/e') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

           
 <div class="form-group {{{ $errors->has('firstname') ? 'has-error' : ''}}}">
  <lable class="col-md-4 control-label">firstname</lable>
  <div class="col-md-6">
  <input type="text" class="form-control" name="firstname" id="firstname" placeholder="firstname" value="{{ old('firstname')}}" >
   <div class="error">{{ $errors->first('firstname') }}</div>
  </div>
  </div>

   <div class="form-group  {{{ $errors->has('lastname') ? 'has-error' : ''}}}">
  <lable class="col-md-4 control-label">lastname</lable>
  <div class="col-md-6">
  <input type="text"  class="form-control" name="lastname" id="lastname" placeholder="lastname"  value="{{ old('lastname')}}">
     <div class="error">{{ $errors->first('lastname') }}</div>

  </div>
  </div>


   <div class="form-group  {{{ $errors->has('email') ? 'has-error' : ''}}}">
  <lable class="col-md-4 control-label">email</lable>
  <div class="col-md-6">
  <input type="email"  class="form-control" name="email" id="email" placeholder="email address"   value="{{ old('email')}}">
     <div class="error">{{ $errors->first('email') }}</div>

  </div>
  </div>


   <div class="form-group  {{{ $errors->has('subject') ? 'has-error' : ''}}}">
  <lable class="col-md-4 control-label">subject</lable>
  <div class="col-md-6">
  <input type="text"  class="form-control" name="subject" id="subject" placeholder="subject"  value="{{ old('subject')}}">
    <div class="error">{{ $errors->first('subject') }}</div>

  </div>
  </div>



   <div class="form-group  {{{ $errors->has('topic') ? 'has-error' : ''}}}">
  <lable class="col-md-4 control-label">contact type</lable>
   <div class="col-md-6">
  <select  class="form-control" name="topic"  value="{{ old('topic')}}" id="topic">
   <option> select topic </option>
   <option>General</option>
   <option>services</option>
   <option>order</option>
   </select>
      <div class="error">{{ $errors->first('topic') }}</div>

</div>
 </div>

   <div class="form-group  {{{ $errors->has('message') ? 'has-error' : ''}}}">
  <lable class="col-md-4 control-label">message</lable>
  <div class="col-md-6">
  <textarea class="form-control"  row="5" name="message" id="message" placeholder="message content here"  value=""> {{ old('message')}}</textarea>
    <div class="error">{{ $errors->first('message') }}</div>

  </div>
</div>


            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" id="sendnow" class="btn btn-primary">
                  send message
                </button>
              </div>
            </div>
           
          </form>

       <div id="error"></div>
         <div id="alert-success" class="status alert alert-success" style="display: none"></div>
        

	        </div>
          </div>			<!-- End Contact Info -->
		</div>
  </div>


@endsection



@section('sidebar')

         <div class="col-md-4">
		  <div class="gmap-area">
                <!-- Contact Info -->
                <div class="contact-us-details">
                <h2>Our address</h2>
                <p><address>
                  <i class="fa fa-globe"></i> <b>Address:</b> {{ $contact->address}}<br/>
                  <i class="fa fa-phone-square"></i> <b>Phone:</b> {{ $contact->phone}}<br/>
                  <i class="fa fa-book"></i> <b>Fax:</b> {{ $contact->fax }}<br/>
                  <i class="fa fa-mailbox"> </i><b>Email:</b> <a href="{{ $contact->email}}">{{ $contact->email}}</a>
              </address></p>
            <h2>Working Days</h2>
                <b>Days:</b>   Monday - friday </br>
                <b>Hours:</b>   9am - 5pm </br>
                <b>Saturday:</b>  10am - 3pm 
            </div>
          </div>        		
		</div>

@endsection