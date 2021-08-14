@extends('userAccount.layouts.beyond')

@section('breadcrumb')
<li>
    <i class="fa fa-home"></i>
    <a href="{{ request()->root() }}/userAccount">حسابي</a>
</li>
<li>
    <a href="{{ request()->root() }}/userAccount/myOrders">طلباتي</a>
</li>
<li class="active">
    <span dir='ltr'>غرفة العمل [#{{ $order->id }}]</span> {{ $service->name }}
</li>
@endsection

@section('header-title')
    <i class="fa fa-fw fa-list" aria-hidden="true"></i> غرفة العمل : <span dir='ltr'>[#{{ $order->id }}]</span>
    {{ $service->name }}
@endsection

@section('row-title')
<h6 class="row-title before-blue"><i class="typcn typcn-cog-outline darkorange"></i> غرفة العمل <span dir='ltr'>[#{{ $order->id }}]</span> {{ $service->name }} <span class="badge badge-square badge-sky"> {{ $service->user->name }} </span></h6>
@endsection

@section('content')

<div class="well">
    @if($service != null)
    <div class="row">
        <div class="col-md-3 col-sm-3 col-lg-3">
            
            <hr />

        </div>
        <div class="col-md-9 col-sm-9 col-lg-9">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-justified" id="myTab5">
                    <li class="active">
                        <a data-toggle="tab" href="#chat" aria-expanded="true">
                            المحادثة
                        </a>
                    </li>

                    <li class="tab-red">
                        <a data-toggle="tab" href="#attachments" aria-expanded="false">
                            المرفقات
                        </a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div id="chat" class="tab-pane active">
                        <div class="overflow" style="height:300px; overflow-y: scroll;" id="chatAreaWrap">
                            <ul class="timeline" id="chatArea">
                                <li class="timeline-node">
                                    <a class="btn btn-palegreen">NOW</a>
                                </li>
                                @foreach($order->conversations as $conversation)
                                    <li class="@if($conversation->is_recieved) timeline-inverted @endif">
                                        <div class="timeline-datetime">
                                            <span class="timeline-time">
                                                {{ date('Y-m-d', strtotime($conversation->created_at)) }}
                                            </span><span class="timeline-date">{{ date('H:i', strtotime($conversation->created_at)) }}</span>
                                        </div>
                                        <div class="timeline-badge @if($conversation->is_received) darkorange @else sky @endif">
                                            <img src="{{ $conversation->user->picture }}" class="badge-picture">
                                        </div>
                                        <div class="timeline-panel @if($conversation->is_recieved) bordered-right-3 bordered-sky @else bordered-left-3 bordered-darkorange @endif">
                                            <div class="timeline-header bordered-bottom bordered-blue">
                                                <span class="timeline-title">
                                                    {{ $conversation->user->name }}
                                                </span>
                                                <p class="timeline-datetime">
                                                    <small class="text-muted">
                                                        <i class="glyphicon glyphicon-time">
                                                        </i>
                                                        <span class="timeline-date">{{ date('Y-m-d', strtotime($conversation->created_at)) }}</span>
                                                        -
                                                        <span class="timeline-time">{{ date('H:i', strtotime($conversation->created_at)) }}</span>
                                                    </small>
                                                </p>
                                            </div>
                                            <div class="timeline-body">
                                                <p>
                                                    {{ $conversation->txt }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div id="endOfChat"></div>
                        </div>
                        <hr />
                        <textarea id="message" class="form-control"></textarea>
                        <button id="send" type="buttom" class="btn btn-danger">أرسل</button>
                    </div>

                    <div id="attachments" class="tab-pane">
                        <div id="order-attachments-dropezone" class="dropzone"></div>
                        {{-- <div class="widget">
                            {{ Form::open(['route' => ['userAccount.storeOrderAttachments', $order->id], 'class'=>'form 1dropzone', 'enctype' => 'multipart/form-data', 'id' => 'addServicePicturesForm', 'role' => 'form']) }}
                                <div class="form-group">
                                    {{ Form::hidden('service_id', $service->id) }}
                                </div>
                            {{ Form::close() }}      
                        </div>                      --}}
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th>التاريخ</th>
                                    <th>المستخدم</th>
                                    <th>الحجم</th>
                                    <th>النوع</th>
                                    <th>الملف</th>
                                </tr>
                            </thead>
                            <tbody id="attachmentsTableBody">
                                @if($order->attachments->count() > 0)
                                    @foreach ($order->attachments as $attachment)
                                        <tr>
                                            <td scope="row">{{ $attachment->id }}</td>
                                            <td>{{ $attachment->created_at }}</td>
                                            <td>{{ $attachment->user->name }}</td>
                                            <td>{{ number_format($attachment->size / 1024, 2) }} KB</td>
                                            <td><i class="fa fa-2x fa-fw fa-{{ $attachment->icon }}"></i></td>
                                            <td style="direction:ltr;">
                                                <a class="btn btn-sm btn-sky" target="_blank" href="{{ request()->root() }}/public/orders/{{ $order->id }}/{{ $attachment->url }}">
                                                    {{ $attachment->url }} 
                                                </a>
                                            </td>
                                        </tr>                                    
                                        @endforeach
                                    @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
    @else
    <div class="well">
        <div class="row">
            <div class="alert alert-warning col-md-6 col-md-offset-3">
                <div class="col-md-6 col-sm-4">
                    <img src="{{ request()->root() }}/assets/crew/images/no-records1.png" class="img-responsive" />
                </div>
                <div class="col-md-6 col-sm-8" style="text-align:center;">
                    <h4 style="line-height:2em;">عفواً، لا يوجد أي طلبات واردة حالياً</h4>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

    @php
        if($order->conversations->count() > 0) {
            $lastConversationsId = $order->conversations()->latest()->first()->id;
        } else {
            $lastConversationsId = 0;
        }
        if($order->attachments->count() > 0) {
            $lastAttachmentsId = $order->attachments()->latest()->first()->id;
        } else {
            $lastAttachmentsId = 0;
        }
    @endphp

@endsection
@section('scripts')
<script src="{{ asset('public/assets/beyond/assets/js/dropzone/dropzone.min.js') }}"></script>
{{-- <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script> --}}
{{-- <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css"> --}}
<script src="{{ asset('public/assets/beyond/assets/js/textarea/jquery.autosize.js') }}"></script>


<script>

    last_id = {{ $lastConversationsId }};
    last_attachments_id = {{ $lastAttachmentsId }};

    function getAttachments(){
        $.ajax({
            type: "POST",
            url: "{{ request()->root() }}/userAccount/workRoom/{{ $order->id }}/updateAttachments",
            data: {
                "_token": "{{ csrf_token() }}",
                "last_id": parseInt(last_attachments_id),
                "order_id": "{{ $order->id }}"
            },
            success: function( data ) {
                last_attachments_id = data['last_id'];
                $('#attachmentsTableBody').append(data['attachmentsStr']);
                // console.log(data);
            }
        });
    }

    $(function() {
        // Now that the DOM is fully loaded, create the dropzone, and setup the
        // event listeners
        var myDropzone = new Dropzone("#order-attachments-dropezone", 
            { 
                url: "{{ route('userAccount.storeOrderAttachments', ['order_id' => $order->id, '_token' => csrf_token()]) }}",
                acceptedFiles: 'image/*,application/pdf,.psd,.doc,.docx,.xls,.xlsx,.mp3,.mp4'
            });
        myDropzone.on("success", function(file) {
            /* Maybe display some more file information on your page */
            getAttachments();
        });
    })

    $('#message').autosize({ append: "\n" });
    function  scrollChatDown(){
        document.querySelector('#endOfChat').scrollIntoView({ behavior: 'smooth' });
    }

    scrollChatDown();

    setInterval(getChats, 60000);
    

    function getChats(){
        $.ajax({
            type: "POST",
            url: "{{ request()->root() }}/userAccount/chat/{{ $order->id }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "last_id": parseInt(last_id),
                "order_id": "{{ $order->id }}"
            },
            success: function( data ) {
                last_id = data['last_id'];
                $('#chatArea').append(data['chatStr']);
                // console.log(data);
            }
        });
    }

   $('#send').on('click', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ request()->root() }}/userAccount/chat/{{ $order->id }}/send",
            data: {
                "_token": "{{ csrf_token() }}",
                "order_id": "{{ $order->id }}",
                "user_id": "{{ auth()->guard('user')->user()->id }}",
                "is_recieved": "@if (auth()->guard('user')->user()->id != $order->customer->id) 1 @endif",
                "txt": $('#message').val()
            },
            success: function( data ) {
                getChats();
                scrollChatDown();
            }
        });
        
    });

    $('#reject-btn').on('click', function(e){
				e.preventDefault();
				if(confirm('هل تريد حقاً إلغاء الطلب ?')){
					var orderId = $(this).data('order-id');
					var status = 6;
					$.ajax({
						type: "POST",
						url: "{{ request()->root() }}/userAccount/orderStatus/change",
						data: {
							"_token": "{{ csrf_token() }}",
							"orderId": orderId,
							"status": status
						},
						success: function( data ) {
							window.open('{{ url()->current() }}','_self');
						}
					});
				}else{
					return false;
				}
			}
		)
</script>
@endsection