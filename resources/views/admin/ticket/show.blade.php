@extends('admin.main')

@section('title',"ticket")

@section("custom-style")
    <style>
        .chat-block .chat-content .messages .message-item .message-item-content {
            /*max-width: 50%;*/
        }

        .time {
            direction: ltr;
        }
    </style>

@endsection

@section('content')


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>تیکت ها</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">لیست تیکت ها</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page-header -->

    <!-- begin::page content -->
    <div class="container-fluid h-100">

        <div class="row no-gutters chat-block">
            <!-- begin::chat content -->
            <div class="col-md-12 chat-content">

                <!-- begin::chat header -->
                <div class="chat-header border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <div class="avatar avatar-sm">
                                <img
                                    src="{{($photo = auth()->user()->profile_photo)?$photo['url']:asset("assets/media/image/user/man_avatar1.jpg")}}"
                                    class="rounded-circle" alt="image">
                            </div>
                        </div>
                        <div>
                            <h6 class="mb-1">{{($ticket->user)?$ticket->user->name:"کاربر پاک شده"}}</h6>
                            <div class="m-0 small" dir="ltr">#{{$ticket->ticket_id}}</div>
                        </div>
                        <div class="m-auto">
                            {{--<h6 class="mb-1">{{$ticket->priority_text}}</h6>--}}
                            <div class="m-0 small badge-{{$ticket->status_color}} text-center badge"
                                 dir="ltr">{{$ticket->status}}</div>
                        </div>
                        <div class="ml-auto">
                            <ul class="nav align-items-center">
                                <li class="mr-4 d-sm-inline">
                                    <form action="{{ route('ticket.open',$ticket->id) }}" method="post">
                                        @csrf
                                        <button type="submit" title="" data-toggle="tooltip"
                                                data-original-title="باز کردن تیکت"
                                                class="btn btn-outline-success">
                                            باز کردن تیکت
                                        </button>
                                    </form>
                                </li>
                                <li class="mr-4 d-sm-inline">
                                    <form action="{{ route('ticket.answered',$ticket->id) }}" method="post">
                                        @csrf
                                        <button href="#" title="" data-toggle="tooltip"
                                                data-original-title="جواب داده شده"
                                                class="btn btn-outline-warning">
                                            جواب داده شده
                                        </button>
                                    </form>

                                </li>
                                <li class="mr-4 d-sm-inline">
                                    <form action="{{ route('ticket.close',$ticket->id) }}" method="post">
                                        @csrf
                                        <button href="#" title="" data-toggle="tooltip" data-original-title="بستن تیکت"
                                                class="btn btn-outline-danger">
                                            بستن تیکت
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end::chat header -->

                <!-- begin::messages -->
                <div class="messages" tabindex="2" style="overflow-y: hidden; outline: none;">
                    <div class="message-item me">
                        <div class="message-item-content">{{$ticket->message}}</div>
                        <span class="time small text-muted font-italic" dir="ltr">{{$ticket->created_at}}</span>
                    </div>
                    @if($ticket->replies->count()>0)
                        @foreach($ticket->replies as $reply)
                            <div class="message-item @if($ticket->user_id == $reply->user_id){{"me"}}@endif">
                                <div class="message-item-content">{{$reply->message}}</div>
                                <span class="time small text-muted font-italic" dir="ltr">{{$reply->created_at}}</span>
                            </div>
                        @endforeach
                    @endif

                </div>
                <!-- end::messages -->

                <!-- begin::chat footer -->
                <div class="chat-footer border-top">
                    <form class="d-flex" action="{{route("tickets.update",$ticket->id)}}" method="post">
                        @csrf
                        @method("put")
                        <div class="flex-grow-1">
                            <textarea class="form-control" name="message" placeholder="پیام خود را بنویسید"
                                      required></textarea>
                        </div>
                        <div class="chat-footer-buttons d-flex">
                            <button class="btn btn-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-send width-15 height-15">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- end::chat footer -->

            </div>
            <!-- begin::chat content -->

        </div>

    </div>
    <!-- end::page content -->


@endsection

@section("custom-script")
    @include("admin.flash")
@endsection
