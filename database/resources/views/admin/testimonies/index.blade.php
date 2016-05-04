@extends('admin')


@section('content')

 <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">testimony</h3>
          <a href="{{ url('admin/testimonies/create') }}"><h4 class="btn btn-primary fa fa-plus">  create testimony</h4></a>
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
                    @foreach($testimony as $ts)
                    <tr>
                      <td>{{ $ts->id }}</td>
                      <td><img src="{{asset('files/testimony/'.$ts->image.'')}}" class="img-td" alt="Web Design Trends" /></td>
                      <td style="width:300px"> 
                        <strong>{{ $ts->title }}</strong>
                        <p>{{ substr($ts->content, 0, 171) }}</p>

                      </td>
                      <td>{{ $ts->created_at->format('M d Y')}}</td>
                      <td><span class="label label-success">{{ $ts->status}}</span></td>
                      <td><a href="{{ url('admin/testimonies/v/'.$ts->id.'') }}">view<a/></td>
            <td><a href="{{ url('admin/testimonies/'.$ts->id.'/edit') }}"><i class="fa fa-edit"></i></a></td>

                     <td>
            <form role="form" method="post" action="{{ url('admin/testimonies/'.$ts->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $ts->id }}">
                      <button class="fa fa-trash-o"></button>
            </form>
                      </td>
                      
                    </tr>

                    @endforeach
                
                  </table>

             <div class="box-footer box-solid">
                   {!! $testimony->render() !!}
               </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>  



@endsection



@section('sidebar')




@endsection