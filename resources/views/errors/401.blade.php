@extends('layouts.app')

@section('content')
    <script>
        function tothedetailpage() {
            var role = "{{ Auth::user()->checkPremium(Auth::user()->grade) }}";
            if (role === "1") {
                location.href = "/hotfocus/" + id;
            }
            else {
                alert('프리미엄 회원만 열람이 가능합니다.');
            }
        }
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align:center;">프리미엄 회원만 열람이 가능합니다.</div>

                    <div class="panel-body" style="text-align:center;">
                        {{ $exception->getMessage() }}
                    </div>
                    <div onclick="location.href='{{url('/home')}}'" style="text-align: center; cursor:pointer;">홈으로
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection