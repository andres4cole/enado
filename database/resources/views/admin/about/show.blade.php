@extends('admin')


@section('content')

				<div class="col-md-9">
              <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $about->title }}</h3>
               <h5>{{ $about->name }} <span class="mailbox-read-time pull-right"> {{ $about->created_at->format('Y M D, h:i:s') }}</span></h5>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              {{ $about->about }}
            </div><!-- /.box-body -->
            <div class="box-footer">

            	<ul class="mailbox-attachments clearfix">

            		   <li>
                      <span class="mailbox-attachment-icon has-img"><img src="{{asset('files/about/'.$about->picture.'')}}" alt="Attachment" /></span>
                      <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> picture </a>
                        <span class="mailbox-attachment-size">
                          2.67 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                      </div>
                    </li>
                    <li>

            	</ul>
            	</div> {{-- div box footer --}}
            	 <div class="box-footer">	
                  <div class="pull-right">
                    <a href="{{ url('admin/about/'.$about->id.'/edit') }}" class="btn btn-default"><i class="fa fa-edit"> </i>edit</a>

                     <form role="form" method="post" action="{{ url('admin/about/'.$about->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $about->id }}">
                      <button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                     </form>

                 </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
      </div>

@endsection



@section('sidebar')




@endsection


 