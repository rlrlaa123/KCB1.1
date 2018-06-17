@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align:center;">해당 권한이 없습니다.</div>

                    <div class="panel-body" style="text-align:center;">
                        {{ $exception->getMessage() }}
                    </div>
                    <div onclick="location.href='{{url('/home')}}'" style="text-align: center; cursor:pointer;">홈으로</div>
                </div>
            </div>
        </div>
    </div>
@endsection