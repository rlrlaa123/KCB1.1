@extends('layouts.app')
<style>
    .noticepage img {
        width: 100%;
        height: 80%;
    }

    .noticepage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .noticepage table {
        width: 100%;
    }

    .notexpired {
        text-align: center;
        border: solid 2px #e85254;
        margin: 1vw;
    }

    .expired {
        text-align: center;
        border: solid 1px #3b5493;
        margin: 1vw;

    }

    .notice-selector {
        cursor: pointer;
        padding: 0.7vw;
        font-weight: 600;
        justify-content: left;
        text-align: left;
        font-size: 1vw;
        width: 25%;
        color: black
    }
</style>
@section('content')
    <div class="noticepage">
        <div class="justify-content">
            <div class="notice-selector {{ $_SERVER['REQUEST_URI'] === '/notice' ? 'judicialpage_list_onpage' : ''}}"
                 onclick="location.href='/notice';">TODAY 공고/공시
            </div>
            <div>
                <form class="navbar-form searchform" method="GET" action="{{url('/noticesearch/')}}">
                    <input type="search" name="search" class="form-control" placeholder="검색어를 입력하세요."
                           style="height: 3vh; width: 15vw; padding:0;">
                    <button type="submit" class="lens_button1"><img
                                src="/img/searchbarbutton1.png"/>
                    </button>
                </form>
            </div>
        </div>
        <hr/>
        <div class="display_content">
            @forelse($data as $value)
                @if( $value->created_at > $sub_days )
                    <div onclick="tothedetailpage({{$value->notice_id}})" class="notexpired grid-item">
                        <table>
                            <tr>
                                <td>
                                    <div class="image_text_container"><img
                                                src="/{{$value->notice_thumbnails}}">
                                        <div class="text-block"><p>{{$value->notice_title}}</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                @else
                    <div onclick="tothedetailpage({{$value->notice_id}})" class="expired grid-item">
                        <table>
                            <tr>
                                <td>
                                    <div class="image_text_container"><img
                                                src="/{{$value->notice_thumbnails}}">
                                        <div class="text-block"><p>{{$value->notice_title}}</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endif
            @empty
            @endforelse
        </div>
        @if($data->count())
            <div class="text-center">
                {!! $data->render() !!}
            </div>
        @endif
    </div>
    <script>
        function tothedetailpage(id) {
            @if(\Illuminate\Support\Facades\Auth::guest())
            alert('회원 가입 후에 열람하실 수 있습니다.');
            @else
            // Premium 회원일 때만 접근 가능!
            console.log();
            var role = "{{ Auth::user()->checkPremium(Auth::user()->grade) }}";
            if (role === "1") {
                location.href = "/notice/" + id;
            }
            else {
                alert('프리미엄 회원만 열람이 가능합니다.');
            }
            @endif
        }
    </script>
@endsection