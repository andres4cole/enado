@extends('admin')


@section('content')


 <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> sliders </h3>
                  <a href="{{ url('admin/sliders/create') }}"><strong class="btn btn-primary fa fa-plus">  create</strong></a>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" />
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding solid">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>image</th>
                      <th>title</th>                    
                      <th>date </th>
                      <th>Status</th>
                      <th>View</th>
					  <th>Edit</th>
                      <th>delete</th>
                      


                    </tr>
                    @foreach($sliders as $slide)
                    <tr>
                      <td>{{ $slide->id }}</td>
                      <td><img src="{{asset('files/sliders/picture/'.$slide->picture.'')}}" class="img-td" alt="" /></td>
                      <td><h4> {{ $slide->title }} </h4>
                            <p>{{ substr($slide->description, 0, 200) }} </p></td>
                      <td>{{ $slide->created_at->format('M d Y')}}</td>
                      <td><span class="label label-success">{{ $slide->status}}</span></td>
                      <td><a href="{{ url('admin/sliders/v/'.$slide->id.'') }}">view<a/></td>
					  <td><a href="{{ url('admin/sliders/'.$slide->id.'/edit') }}"><i class="fa fa-edit"></i></a></td>

                     <td>
					  <form role="form" method="post" action="{{ url('admin/sliders/'.$slide->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $slide->id }}">
                      <button class="fa fa-trash-o"></button>
					  </form>
                      </td>
                      
                    </tr>

                    @endforeach

             
                  </table>
                  <div class="box-footer box-solid">
                   {!! $sliders->render() !!}
               </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>  



@endsection



@section('sidebar')




@endsection