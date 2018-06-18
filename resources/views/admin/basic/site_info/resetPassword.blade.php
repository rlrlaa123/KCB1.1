@extends('layouts.admin')
@include('detailedpage.detailed_style')
@section('content')
    <div class="askingpage">
        <h3>{{$data->username}} : 비밀번호 변경</h3>
        <hr/>
        <form action="{{url('/admin/basic/reset')}}" method="POST">
            {{csrf_field()}}
            <input name="id" name="id" type="hidden" value="{{$data->id}}">
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('새 비밀번호') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           required style="font-family: sans-serif">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('비밀번호 확인') }}</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required style="font-family: sans-serif">
                </div>
            </div>
            <button type="submit" style="background-color: #e85254; border: #e85254; font-size:1vw; color:white; font-weight:600;">
                변경</button>
        </form>
    </div>
@endsection
