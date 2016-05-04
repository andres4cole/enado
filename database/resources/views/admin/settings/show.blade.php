@extends('admin')


@section('content')

				<div class="col-md-9">
              <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $setting->title }}</h3>
               <h5>{{ $setting->name }} <span class="mailbox-read-time pull-right"> {{ $setting->created_at->format('Y M D, h:i:s') }}</span></h5>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              {{ $setting->setting }}
              <br><strong>Description: </strong> {{$setting->description }}.</br>
               <br><strong>Address:</strong> {{$setting->address}}.</br>
                <br><strong>Email:</strong> {{$setting->email }}.</br>
                 <br><strong>Phone:</strong> {{$setting->phone }}.</br>
                  <br><strong>Fax:</strong> {{$setting->fax }}.</br>
                   <br><strong>Twitter:</strong> {{$setting->twitter }}.</br>
                    <br><strong>Facebook:</strong> {{$setting->facebook}}.</br>
                     <br><strong>Google:</strong> {{$setting->google}}.</br>
            </div><!-- /.box-body -->
            <div class="box-footer">

            	<ul class="mailbox-attachments clearfix">

            		   <li>
                      <span class="mailbox-attachment-icon has-img"><img src="{{asset('files/setting/logo/'.$setting->logo.'')}}" alt="Attachment" /></span>
                      <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> picture </a>
                        <span class="mailbox-attachment-size">
                          2.67 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                      </div>
                    </li>
                    <li>
					
					  <li>
                      <span class="mailbox-attachment-icon has-img"><img src="{{asset('files/setting/background/'.$setting->background_image.'')}}" alt="Attachment" /></span>
                      <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> background </a>
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
                    <a href="{{ url('admin/setting/'.$setting->id.'/edit') }}" class="btn btn-default"><i class="fa fa-edit"> </i>edit</a>

                     <form role="form" method="post" action="{{ url('admin/setting/'.$setting->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $setting->id }}">
                      <button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                     </form>

                 </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
      </div>

@endsection



@section('sidebar')




@endsection