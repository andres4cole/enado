
@extends('app')

@section('headerapp')
<section id="headerapp" style="background-image: url('{{ asset('/frontend/images/dev1.jpg')}}')">
    <h2 class="newsh">Our Developer team</h2>
</section>
@endsection

@section('content')

            <div class="col-md-8">
			@foreach($developers as $developer)

 
   					<div class="col-md-6 col-sm-6">

                    <div class="user-header" style="background-image: url({{ asset('files/developer/cover/'.$developer->cover_image.'')}});">
                   <img src=" {{ asset('files/developer/picture/'.$developer->picture.'')}}" class="img-circle " alt="{{ $developer->firstname }}"/>
                    <p>
                      <a href="{{url('/developer/'.$developer->id.'') }}">{{ $developer->firstname }} {{ $developer->lastname }}</a> 
                      	<br> {{ $developer->position }} 
                      <small class="hidden-xs">Member since {{ $developer->created_at->format('M Y') }}.</small>
                    </p>
                  </div>
                  <!-- Menu Body --> 
                      
              </div>
              @endforeach
              {!! $developers->render() !!}
              </div>

@endsection



@section('sidebar')

@include('include.proposal')
@endsection