@extends('admin')


@section('content')

   <div class="col-md-8 col-sm-12">
                    <div class="user-header" style="background-image: url({{ asset('files/developer/cover/'.$developer->cover_image.'')}});">
                    <img src=" {{ asset('files/developer/picture/'.$developer->picture.'')}}" class="img-circle " alt=" {{ $developer->firstname }} {{ $developer->lastname }}" />
                    <div class="buttons-sm">
                    <p>
                      {{ $developer->firstname }} {{ $developer->lastname }} - {{ $developer->position }} 
                      <small>Member since {{ $developer->created_at->format('M Y') }}.</small>
                    </p>
                  </div>
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
                    <br><span>Email:</span> {{ $developer->email }}</br>
                    <br><span>Phone number:</span> {{ $developer->phone }}</br>
                    
                    <h2>About me</h2>
                    <p>{{ $developer->about }}</p>
                    <br><strong>skills:</strong> {{ $developer->skills }}</br>
                    <br><span>Gender:</span> {{ $developer->gender }}</br>
                    <h2>location</h2>
                    <br><strong>Country:</strong> {{ $developer->country }}</br>
                    <br><strong>State:</strong> {{ $developer->state }}</br>
                    <br><strong>City:</strong> {{ $developer->city }}</br>
                    <br><strong>Status:</strong> {{ $developer->status }} member</br>

                  </div> 

            
                  <!-- Menu Footer-->
                  <div class="user-footer">
                      <a href="{{url('/admin/developer/'.$developer->id.'') }}" class="btn btn-default btn-flat">Profile</a>
                       <a href="{{url('/admin/developer/'.$developer->id.'/edit') }}" class="btn btn-default btn-flat btn-line">Edit</a> 
                        <form role="form" method="post" action="{{ url('admin/developer/'.$developer->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $developer->id }}">
                      <button class="btn btn-default fa fa-trash-o"></button>
					  </form>
                    </div>
                 
              </div>



@endsection



@section('sidebar')




@endsection