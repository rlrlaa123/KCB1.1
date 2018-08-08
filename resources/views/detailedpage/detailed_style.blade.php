<style>
    .content {
        margin: 1vw 15vw 1vw 15vw;
    }

    table {
        width: 100%;
    }

    .detailed li {
        padding: 1vw 2vw;
        font-size: 1vw;
        list-style: none;
        display: -moz-inline-block;
        display: inline-block;
    }

    .content_title {
        margin-top: 3vh;
        padding: 0.3vw 1vw;
        border-top: 1px solid;
        border-bottom: 1px solid;
        justify-content: space-between;
        display: flex;
        align-items: center;
        font-weight: lighter;
        font-size: 1vw;
    }

    .content_title strong {
        color: black;
    }

    .content_title span {
        font-size: 0.8vw;
    }

    .writer_and_filedownload {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .writer_and_filedownload span {
        font-size: 0.8vw;
    }

    .table_footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 5px;
    }

    .table_footer a {
        font-size:0.8vw;
        border: 1px solid lightgrey;
        color: grey;
        font-weight: 800;
        padding: 0.8vw 1.5vw;
        border-radius: 1vw;
        -webkit-border-radius: 1vw;
        -moz-border-radius: 1vw
    }

    .table_footer a:hover {
        text-decoration: none;
        color: grey;
    }

    .table_footer span > a {
        padding: 0.7vw;
        -webkit-border-radius: 0.5vw;
        -moz-border-radius: 0.5vw;
        border-radius: 0.5vw;
    }

    /*유권해석판례 CSS---------------------------------------------------------------------------------*/
    .jdetailedtable {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .jdetailed {
        text-align: left;
        width: 100%;
        padding: 0;
    }

    .jdetailed_table_content img {
        width: 100%;
        height: 100%;
        margin: 1vw;
    }

    .jdetailed_table_content p {
        justify-content: left;
        text-align: left;
        padding: 2vw 3vw;
        font-size:0.9vw;
        font-weight:600;
        color: dimgrey;

    }

    .jdetailed_table_content div {
        border-top: 0.1px solid lightgrey;
        border-bottom: 0.1px solid lightgrey;
        margin: 1px;
    }

    /*HOT 포커스 CSS---------------------------------------------------------------------------------*/
    .hfdetailedtable {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .hfdetailed {
        text-align: left;
        width: 100%;
        padding: 0;
    }

    .hfdetailed_table_content img {
        width: 100%;
        height: 100%;
        margin: 1vw;
    }

    .hfdetailed_table_content p {
        justify-content: left;
        text-align: left;
        padding: 2vw 3vw;
        font-size:0.9vw;
        font-weight:600;
        color: dimgrey;

    }

    .hfdetailed_table_content div {
        border-top: 0.1px solid lightgrey;
        border-bottom: 0.1px solid lightgrey;
        margin: 1px;
    }

    /*규정/지침 CSS---------------------------------------------------------------------------------*/
    .pdetailedtable {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .pdetailed {
        text-align: left;
        width: 100%;
        padding: 0;
    }

    .pdetailed_table_content img {
        width: 100%;
        height: 100%;
        margin: 1vw;
    }

    .pdetailed_table_content p {
        justify-content: left;
        text-align: left;
        padding: 2vw 3vw;
        font-size:0.9vw;
        font-weight:600;
        color: dimgrey;

    }

    .pdetailed_table_content div {
        border-top: 0.1px solid lightgrey;
        border-bottom: 0.1px solid lightgrey;
        margin: 1px;
    }

    /*관련뉴스 CSS---------------------------------------------------------------------------------*/
    .rndetailedtable {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .rndetailed {
        text-align: left;
        width: 100%;
        padding: 0;
    }

    .rndetailed_table_content img {
        width: 100%;
        height: 100%;
        margin: 1vw;
    }

    .rndetailed_table_content p {
        justify-content: left;
        text-align: left;
        padding: 2vw 3vw;
        font-size:0.9vw;
        font-weight:600;
        color: dimgrey;

    }

    .rndetailed_table_content div {
        border-top: 0.1px solid lightgrey;
        border-bottom: 0.1px solid lightgrey;
        margin: 1px;
    }

    /*자료실 CSS---------------------------------------------------------------------------------*/

    .library_detailedtable {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .library_detailed {
        text-align: left;
        width: 100%;
        padding: 0;
    }

    .librarydetailed_table_content img {
        width: 100%;
        height: 100%;
        margin: 1vw;

    }

    .librarydetailed_table_content p {
        justify-content: left;
        text-align: left;
        padding: 2vw 3vw;
        font-size:0.9vw;
        font-weight:600;
        color: dimgrey;

    }

    .tothedetailpage {
        cursor: pointer;
    }

    .tothedetailpage td {
        padding: 1vw;
        text-align: center;
        font-size: 1vw;
    }

    .librarydetailed_table_content div {
        border-top: 0.1px solid lightgrey;
        border-bottom: 0.1px solid lightgrey;
        margin: 1px;
    }

    /*공고/공시 CSS---------------------------------------------------------------------------------*/
    .noticedetailedtable {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .noticedetailed {
        text-align: left;
        width: 100%;
        padding: 0;
    }

    .noticedetailed_table_content img {
        width: 100%;
        height: 100%;
        margin: 1vw;
    }

    .noticedetailed_table_content p {
        justify-content: left;
        text-align: left;
        padding: 2vw 3vw;
        font-size:0.9vw;
        font-weight:600;
        color: dimgrey;

    }

    .noticedetailed_table_content div {
        border-top: 0.1px solid lightgrey;
        border-bottom: 0.1px solid lightgrey;
        margin: 1px;
    }

    /*공지사항 CSS---------------------------------------------------------------------------------*/

    .fyi_detailedtable {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .fyi_detailed {
        text-align: left;
        width: 100%;
        padding: 0;
    }

    .fyidetailed_table_content img {
        width: 100%;
        height: 100%;
        margin: 1vw;
    }

    .fyidetailed_table_content p {
        justify-content: left;
        text-align: left;
        padding: 2vw 3vw;
        font-size:0.9vw;
        font-weight:600;
        color: dimgrey;

    }

    .fyidetailed_table_content div {
        border-top: 0.1px solid lightgrey;
        border-bottom: 0.1px solid lightgrey;
        margin: 1px;
    }

    /*상담하기 CSS---------------------------------------------------------------------------------*/
    .askingdetailedtable {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .askingdetailed {
        text-align: left;
        width: 100%;
        padding: 0;
    }

    .askingdetailed_table_content img {
        width:100%;
        height:100%;
        margin: 1vw;
    }

    .askingdetailed_table_content p {
        justify-content: left;
        text-align: left;
        padding: 2vw 3vw;
        font-size:0.9vw;
        font-weight:600;
        color: dimgrey;

    }

    .askingdetailed_table_content div {
        border-top: 0.1px solid lightgrey;
        border-bottom: 0.1px solid lightgrey;
        margin: 1px;
    }

    .askingpage {
        margin: 1vw 5vw;
    }

    .askingpage th, .askingpage td {
        text-align: center;
        border: solid 1px lightgrey;
        padding: 1vw;
    }

    .askingpage table {
        border-collapse: collapse;
    }

    .text-center {
        text-align: center;
        justify-content: center;

    }

    .text-center li {
        display: inline;
        text-align: center;
        color: black;
    }

    .pagination a {
        color: black;
        text-decoration: none;
    }

    /*상담하기 CSS---------------------------------------------------------------------------------*/
    .reportdetailedtable {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .reportdetailed {
        text-align: left;
        width: 100%;
        padding: 0;
    }

    .reportdetailed_table_content img {
        width: 100%;
        height: 100%;
        margin: 1vw;
    }

    .reportdetailed_table_content p {
        justify-content: left;
        text-align: left;
        padding: 2vw 3vw;
        font-size:0.9vw;
        font-weight:600;
        color: dimgrey;

    }

    .reportdetailed_table_content div {
        border-top: 0.1px solid lightgrey;
        border-bottom: 0.1px solid lightgrey;
        margin: 1px;
    }

    .reportpage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .reportpage th, .askingpage td {
        text-align: center;
        border: solid 1px lightgrey;
        padding: 1vw;
    }

    .reportpage table {
        border-collapse: collapse;
    }

    /*회원정보 리스트 CSS---------------------------------------------------------------------------------*/

    .userinfopage {
        margin: 1vw;
        font-size: 1vw;
    }

    .userinfotable {
        padding: 1vw;
        text-align: center;
        font-size: 1vw;
    }

    .userinfopage th, .userinfopage td {
        text-align: center;
        border: solid 1px lightgrey;
        font-size: 1vw;
        font-weight: 700;
    }

    .userinfopage table {
        border-collapse: collapse;
    }

    #user_grade_control > select, #user_grade_control > button {
        font-size: 1vw;
    }

    #user_grade_control > button {
        background-color: #2278ff;
        border: #2278ff;
        -webkit-border-radius: 0.3vw;
        -moz-border-radius: 0.3vw;
        border-radius: 0.3vw;
        color: #ffffff;
    }

    /*회원정보 리스트 CSS---------------------------------------------------------------------------------*/
    .asking_detailedtable {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .asking_detailed {
        text-align: left;
        width: 100%;
        padding: 0;
    }

    .asking_detailed_table_content img {
        width: 100%;
        height: 100%;
        margin: 1vw;
    }

    .asking_detailed_table_content p {
        justify-content: left;
        text-align: left;
        padding: 2vw 3vw;
        font-size:0.9vw;
        font-weight:600;
        color: dimgrey;

    }

    .asking_detailed_table_content div {
        border-top: 0.1px solid lightgrey;
        border-bottom: 0.1px solid lightgrey;
        margin: 1px;
    }

</style>