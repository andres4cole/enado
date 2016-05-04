@extends('admin')


@section('content')


	<div class="col-md-8 col-sm-12">
                    <div class="user-header" style="background-image: url({{ asset('files/user/'.$user->id.'/cover/'.$user->cover_image.'')}});">
                    <img src=" {{ asset('files/user/'.$user->id.'/picture/'.$user->picture.'')}}" class="img-circle " alt=" {{ $user->firstname }} {{ $user->lastname }}" />
                    <p class="buttons">
                      {{ $user->firstname }} {{ $user->lastname }} - {{ $user->occupation }} 
                      <small>Member since {{ $user->created_at->format('M Y') }}.</small>
                    </p>
                  </div>
                  <!-- Menu Body -->
                  <div class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>

                          <h2>contact Details</h2>
                    <br><span>Email:</span> {{ $user->email }}</br>
                    <br><span>Phone number:</span> {{ $user->phone }}</br>
                    
                    <h2>About me</h2>
                    <p>{{ $user->about }}</p>
                    <br><strong>skills:</strong> {{ $user->skills }}</br>
                    <br><span>Gender:</span> {{ $user->gender }}</br>
                    <h2>location</h2>
                    <br><strong>Country:</strong> {{ $user->country }}</br>
                    <br><strong>State:</strong> {{ $user->state }}</br>
                    <br><strong>City:</strong> {{ $user->city }}</br>
                    <br><strong>Status:</strong> {{ $user->status }} member</br>
                    <a href="{{url('admin/account/edit/'.$user->id.'')}}" class="btn btn-primary">edit profile</a>

                  </div> 
              </div> 

          </div>


@endsection



@section('sidebar')




@endsection