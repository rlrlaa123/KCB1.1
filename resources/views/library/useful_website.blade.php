@extends('layouts.app')
<style>
    .useful_website {
        margin: 1vw 15vw 1vw 15vw;
    }

    .library_title {
        background-color: white;
    }

</style>
@section('content')
    <div class="useful_website">
        <div class="justify-content">
            @include('layouts.partials.library_list')
        </div>
        <hr/>
        <div>
            <table class="pagecontents">
                <thead>
                <tr>
                    <th class="th2" style="text-align:center; width:5%; min-width: 5%;">연번</th>
                    <th class="th1" style="text-align:center;width:20%; min-width: 20%;">기관명</th>
                    <th class="th2" style="text-align:center; width:50%; max-width: 50%;">링크</th>
                    <th class="th1" style="text-align:center;width:25%; min-width: 25%;">비고</th>
                </tr>
                </thead>
                @forelse($data as $value)
                    <tr>
                        <td class="td1" style="width:5%; min-width: 5%;  font-size:0.9vw;">{{$value->id}}</td>
                        <td class="library_title" style="width:20%; min-width: 20%; font-size:0.8vw;">{{$value->organization}}</td>
                        <td style="text-align: center; width:50%; max-width: 50%;">
                            <a class="tothedetailpage" href="{{$value->website_address}}" style="font-size:0.8vw;">{{$value->website_address}}</a>
                        </td>
                        <td class="library_title" style="width:25%; min-width: 25%; font-size:0.8vw;">{{$value->note}}</td>
                    </tr>
                @empty
                    <td colspan="3">해당 글이 없습니다.</td>
                @endforelse
            </table>
            @if($data->count())
                <div class="text-center">
                    {!! $data->render() !!}
                </div>
            @endif
        </div>
    </div>
@endsection