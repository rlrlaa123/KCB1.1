@extends('layouts.app')
<style>
    .RNpage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .RNpage table {
        width: auto;

    }

    .RNpage img {
        width: 8vw;
        height: 14vh;
    }

    .RNpage th, td {
        text-align: center;
        border: solid 1px black;
        padding: 1vw;
    }

    .RNlist {
        text-align: left;
        width: 100%;
        list-style: none;
        padding: 0vw;
    }

    .RNlist li {
        display: inline;
        padding: 1vw 2vw;
        font-size: 1vw;

    }
</style>
@section('content')

    <div class="RNpage">
        <div>
            <ul class="RNlist">
                <li><a href="{{url('judicial')}}">유권 해석/판례</a></li>
                <li><a href="{{url('hotfocus')}}">HOT 포커스</a></li>
                <li><a href="{{url('policy')}}">규정 지침</a></li>
                <li style="font-weight:bolder; color:#e84e4e; font-size:1.1vw;"><a href="{{url('relatednews')}}">관련
                        뉴스</a></li>
            </ul>
        </div>
        <hr/>
        <table>
            <tr>
                @forelse($data as $value)
                    <td>
                        <a href="{{ url('relatednews/'.$value->rn_id) }}">
                            <table>
                                <tr>
                                    <td>
                                        <img src="http://127.0.0.1:8000/{{ $value->rn_thumbnails }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{$value->rn_title}}
                                    </td>
                                </tr>
                            </table>
                            {{--@foreach($data as $value)--}}
                            {{--<tr>--}}
                            {{--<td>{{$value['id']}}</td>--}}
                            {{--<td>{{$value['dash_id']}}</td>--}}
                            {{--<td>{{$value['title']}}</td>--}}
                            {{--<td>{{$value['date']}}</td>--}}
                            {{--</tr>--}}
                            {{--@endforeach--}}
                        </a>
                    </td>
                @empty
                    <div>해당 글이 없습니다.</div>
                @endforelse
            </tr>
        </table>
        @if($data->count())
            <div class="text-center">
                {!! $data->render() !!}
            </div>
        @endif
    </div>
@endsection