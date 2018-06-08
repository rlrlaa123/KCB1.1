<style>
    table {
        width: 100%;
    }

    table, tr, th, td {
        border-collapse: collapse;
        border: 1px solid black;
    }
    th{
        font-size: 1vw;

    }

    th, td {
        text-align: center;
        padding:1vw;
    }
    .media{
        padding:1vw;
    }
</style>

<div class="media">
    <div class="media-body">
        <table>
            <tr>
                <th>제목</th>
                <th>{{$article->title}}</th>
                <th>작성자</th>
                <th>{{$article->user->name}}</th>
                <th>작성일</th>
                <th>{{$article->created_at}}</th>
            </tr>
            <tr>
                <td>내용</td>
                <td colspan="5">
                    <p style="font-size:1.2vw; font-weight: 500; text-align:left; height:100%; max-height:250px; overflow-y: auto;">
                        {{$article->content}}
                    </p>
                    <div class="text-muted" style="vertical-align: bottom">

                        <p style="font-size:1vw; float:left;">{{$article->created_at->diffForHumans()}}</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>