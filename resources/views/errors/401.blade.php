@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">해당 권한이 없습니다.</div>

                    <div class="panel-body">
                        {{ $exception->getMessage() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection