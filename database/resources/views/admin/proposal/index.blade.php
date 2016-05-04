@extends('admin')


@section('content')



 <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> proposals </h3>
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
                      <th>Fullname</th>
                      <th>company</th>
                      <th>Email</th>                    
                      <th>Phone</th>
                      <th>Country</th>
                      <th>website</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>View</th>
					  <th>reply</th>
                      <th>delete</th>
                      


                    </tr>
                    @foreach($proposals as $proposal)
                    <tr>
                      <td>{{ $proposal->id }}</td>
                      <td> {{ $proposal->fullname }} </td>
                       <td> {{ $proposal->company }} </td>
                      <td>{{ $proposal->email }} </td>
                       <td> {{ $proposal->phone }} </td>
                        <td> {{ $proposal->country }} </td>
                        <td> {{ $proposal->website }} </td>
                      <td>{{ $proposal->created_at->format('M d Y')}}</td>
                      <td><span class="label label-primary">{{ $proposal->status}}</span></td>               
                      <td><a href="{{ url('admin/proposal/v/'.$proposal->id.'') }}">view<a/></td>
					  <td><a href="{{ url('admin/proposal/'.$proposal->id.'/reply') }}"><i class="fa fa-edit"></i></a></td>
                     <td>
					  <form role="form" method="post" action="{{ url('admin/proposal/'.$proposal->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $proposal->id }}">
                      <button class="fa fa-trash-o"></button>
					  </form>
                      </td>
                      
                    </tr>

                    @endforeach

             
                  </table>
                  <div class="box-footer box-solid">
                   {!! $proposals->render() !!}
               </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>  


@endsection



@section('sidebar')


@endsection