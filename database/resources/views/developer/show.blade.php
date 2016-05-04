
@extends('app')

@section('headerapp')
<section class="user-header" style="background-image: url({{ asset('files/developer/cover/'.$developer->cover_image.'')}});">
  <img src=" {{ asset('files/developer/picture/'.$developer->picture.'')}}" class="img-circle " alt="{{ $developer->firstname }}" />
                    <p>
                      {{ $developer->firstname }} {{ $developer->lastname }} - {{ $developer->position }} 
                      {{--<small>Member since {{ $developer->created_at->format('M Y') }}.</small>--}}
                    </p>    

</section>
@endsection

@section('content')

 
        <div class="col-md-4 col-sm-6">
     <div class="user-developer-details">
       <img src="{{ asset('files/developer/picture/'.$developer->picture.'')}}"  alt="{{ $developer->firstname }}" />
       <div class="developer-info">
     <h4>{{$developer->firstname}} {{$developer->lastname}}</h4>
     <p><i class="glyphicon  glyphicon glyphicon-map-marker"></i> from {{$developer->city}}, {{$developer->state}}
     <br>{{$country->name}} </br></p>
   </div>
   </div>


               </div>

	                  <div class="col-md-4 col-sm-6">
                  <!-- Menu Body -->
                  <div class="user-body">
                     <h2>contact Details</h2>
                    <br><span>Email:</span> {{ $developer->email }}</br>
                    <br><span>Phone number:</span> {{ $developer->phone }}</br>
                    <div id="fb-root"></div>



                    
                    <h2>About me</h2>
                    <p>{{ $developer->about }}</p>
                    <span>Skills:</span> <strong> {{ $developer->skills }}</strong>
                  </div> 
              </div>			



@endsection



@section('sidebar')

@include('include.proposal')
@endsection