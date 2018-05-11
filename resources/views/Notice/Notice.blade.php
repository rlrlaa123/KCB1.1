@extends('layouts.app')
<style>
    .noticepage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .noticepage table {
        width: auto;

    }

    .noticepage img {
        width: 8vw;
        height: 14vh;
    }

    .noticepage th, td {
        text-align: center;
        border: solid 1px black;
        padding: 1vw;
    }

    .noticelist li {
        display: inline;
        padding: 1vw 2vw;
        font-size: 1vw;
    }

    .notexpired {
        text-align: center;
        border: solid 1.5px blue;
        padding: 1vw;
    }
</style>
@section('content')
    <div class="noticepage">
        <h3>TODAY 공고/고시</h3>
        <hr/>
        <table>
            <tr>
                @forelse($data as $value)
                    @if(isset($notexpired))
                        @foreach($notexpired as $not_expired)
                            <td class="notexpired">
                                <a href="{{ url('notice/'.$not_expired->notice_id) }}">
                                    <table>
                                        <tr>
                                            <td>
                                                <img src="http://127.0.0.1:8000/{{ $not_expired->notice_thumbnails }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{$not_expired->notice_title}}
                                            </td>
                                        </tr>
                                    </table>
                                </a></td>
                        @endforeach
                    @else
                        <td>
                            <a href="{{ url('notice/'.$value->notice_id) }}">
                                <table>
                                    <tr>
                                        <td>
                                            <img src="http://127.0.0.1:8000/{{ $value->notice_thumbnails }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{$value->notice_title}}
                                        </td>
                                    </tr>
                                </table>
                            </a></td>
                    @endif
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