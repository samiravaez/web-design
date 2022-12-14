@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" ><h5 style="float: right">تایید کد</h5></div>

                    <div class="card-body" style="direction: rtl">
                        @include("auth.errors")
                        @if(session('success'))
                            <div class="alert alert-success" style="direction: rtl">
                            {{session('success')}}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('code.check') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">کد چهار رقمی:</label>

                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                       ورود
                                    </button>

                                    <br>
                                </div>
                            </div>
                        </form>
                        @if($errors->has('expired'))
                            <form method="POST" action="{{route('code.send.again')}}">
                                @csrf
                                <input type="hidden" name="getid">
                                <input type="submit" name="submit" value="رسال مجدد کد تایید">

                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection