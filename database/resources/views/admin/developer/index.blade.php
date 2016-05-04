@extends('admin')


@section('content')


   					@foreach($developers as $developer)
            


   					<div class="col-md-4 col-sm-6">
                    <div class="user-header" style="background-image: url({{ asset('files/developer/cover/'.$developer->cover_image.'')}});">
                    <img src=" {{ asset('files/developer/picture/'.$developer->picture.'')}}" class="img-circle " alt="{{ $developer->firstname }} {{ $developer->lastname }}" />
                    <p class="buttons-sm">
                      {{ $developer->firstname }} {{ $developer->lastname }} - {{ $developer->position }} 
                      <small>Member since {{ $developer->created_at->format('M Y') }}.</small>
                    </p>
                  </div>
                  <!-- Menu Body -->
                  <div class="user-body">
                    <div class="col-xs-4 text-center">
                    <a href="{{url('/admin/developer/v/'.$developer->id.'') }}">Profile</a>
                    </div>
                    <div class="col-xs-4 text-center">
                       <a href="{{url('/admin/developer/'.$developer->id.'/edit') }}">Edit</a> 
                    </div>
                    <div class="col-xs-4 text-center">
                   <a href="">hire Me</a>
                    </div>
                  </div>
         
                 
              </div>
              @endforeach

              {{ $developers->render() }}
 


@endsection



@section('sidebar')




@endsection