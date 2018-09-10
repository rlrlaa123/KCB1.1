<style>
    html, body, div, a, li, span, b, strong, i, p{
        word-break:keep-all
    }
    @media screen and (orientation:portrait) {
        .basic_info_div {
            margin: 0!important;
        }
        .basic_info_div_img{
            width: 23vw;
            height: 17vh!important;
        }
        .dropdown1-content {
            height:22vh!important;
        }
        .dropdown1-content a{
            padding: 0.5vh 0!important;
        }
        .menu_btn1 {
            margin-right: 8vw!important;
        }

        .navigationheader img {
            width: 50%!important;
        }
        .dev_info_search {
            height: 25vh;
        }
        .dev_page .content1{
            height:21vh;
        }
        .dev_page .location_class_child{
            height:21vh;
        }
        .search_classes{
            height:25vh;
        }
        .dev_table_child {
            height:22vh;
        }

    }

    .display_content {
        width: 100%;
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 1fr 1vw 1fr 1vw 1fr 1vw 1fr;
        -ms-grid-rows: 1fr 1vw 1fr 1vw 1fr;
        grid-template-columns: 24% 24% 24% 24%;
        grid-row-gap: 3vh;
        grid-column-gap: 1vw;
        padding: 0;
        text-align: center;
    }

    .display_content .grid-item:nth-child(2) {
        -ms-grid-column: 3;
    }

    .display_content .grid-item:nth-child(3) {
        -ms-grid-column: 5;
    }

    .display_content .grid-item:nth-child(4) {
        -ms-grid-column: 7;
    }

    .display_content .grid-item:nth-child(5) {
        -ms-grid-row: 3;
        -ms-grid-column: 1;
    }

    .display_content .grid-item:nth-child(6) {
        -ms-grid-row: 3;
        -ms-grid-column: 3;
    }

    .display_content .grid-item:nth-child(7) {
        -ms-grid-row: 3;
        -ms-grid-column: 5;
    }

    .display_content .grid-item:nth-child(8) {
        -ms-grid-row: 3;
        -ms-grid-column: 7;
    }

    .display_content .grid-item:nth-child(9) {
        -ms-grid-row: 5;
        -ms-grid-column: 1;
    }

    .display_content .grid-item:nth-child(10) {
        -ms-grid-row: 5;
        -ms-grid-column: 3;
    }

    .display_content .grid-item:nth-child(11) {
        -ms-grid-row: 5;
        -ms-grid-column: 5;
    }

    .display_content .grid-item:nth-child(12) {
        -ms-grid-row: 5;
        -ms-grid-column: 7;
    }
    .judicialpage_list_onpage {
        color: #e85254;
    }

    .intro_content {
        display: grid;
        display: -ms-grid;
        -ms-grid-columns: 3fr 1vw 7fr;
        column-gap: 1vw;
        grid-template-columns: 29.5% 69.5%
    }

    .intro_desc {
        margin-top: 1em;
        margin-bottom: 1em;
        margin-left: 0;
        margin-right: 0;
        overflow: auto;
        text-align: left;
        font-weight: bold;
    }

    .intro_desc p {
        font-size: 1vw;
        line-height: 2vw;
        color: black;
        word-break: keep-all;
    }

    .introbody {
        width: 100%;
        padding: 2vw 15vw 1vw 15vw;
        text-align: center;
    }

    .CeoName {
        display: inline-block;
        overflow: hidden;
        width: 12vw;
        height: 5vh;
        font-size: 1.3vw;
        font-weight: 600;
    }

    .business_result {
        text-align: left;
        list-style: none;
    }

    .business_result li {
        line-height: 2.5vw;
        font-size: 1.2vw;
        list-style: none;
    }

    .intro_button {
        background: none;
        border: none;
        cursor: pointer;
        outline: none;
        overflow: hidden;
        text-align: left;
        font-size: 0.8vw;
        font-weight: 600;
        color: black;
    }

    .display_grid {
        width: 100%;
        display: grid;
        display: -ms-grid;
        -ms-grid-columns: 1fr 1vw 1fr 1vw 1fr 1vw 1fr;
        column-gap: 1vw;
        grid-row-gap: 2vw;
        grid-template-columns: 24.5% 24.5% 24.5% 24.5%;
    }

    .pre_tag{
        background-color:white;
        border:none;
    }

    /* Bottom right text */
    .text-block {
        background-color: black;
        bottom: 0;
        color: white;
        width: 100%;
        opacity: 0.6;
        text-align: center;
        padding: 0;
        margin: 0;
    }


    .text-block p {
        font-size:0.9vw;
        vertical-align: middle;
        margin: 0;
        text-align: center;
        -ms-text-overflow: ellipsis;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        width: 13.6vw;
        height: 15%;

    }
    html {
        background-color: white;
    }

    .body {
        width: 100%;
        height: 100%;
        min-height: 50%;
    }

    .image_text_container {
        cursor:pointer;
        text-align:left;
        position: relative;
        width: 100%;
        height: 19vh;
    }
    .image_text_container img {
        width: 100%;
        height: 85%;
        -ms-word-break: break-all;
        word-break: break-all;
    }




    .pagination > .disabled > a, .pagination > .disabled > a:focus,
    .pagination > .disabled > a:hover, .pagination > .disabled > span,
    .pagination > .disabled > span:focus, .pagination > .disabled > span:hover {
        color: #777;
        background-color: transparent;
        border: none;
        cursor: not-allowed;
    }

    .pagecontents_td {
        text-align: center;
        border: solid 1px #3b5493;
        margin: 1vw;
    }

    .tothedetailpage {
        cursor: pointer;
    }

    .judicialpage_list {
        width: 100%;
    }

    .judicialpage_list div {
        cursor: pointer;
        display: inline-block;
        display: -moz-inline-block;
        display: inline;
        padding: 0.7vw;
        font-weight: 700;
        justify-content: left;
        text-align: left;
        font-size: 1vw;
    }

    .judicialpage_list div:hover {
        font-size: 1.1vw;
        color: #e85254;
        font-weight: 800;
    }

    .detailpage_list div {
        cursor: pointer;
        display: inline-block;
        display: -moz-inline-block;
        display: inline;
        padding: 0.7vw;
        font-weight: 700;
        justify-content: left;
        text-align: left;
        font-size: 1vw;
    }

    .detailpage_list div:hover {
        font-size: 1.1vw;
        color: #e85254;
        font-weight: 800;
    }

    .table_id {
        width: 5%;
    }

    .table_dash_id {
        width: 15%;
    }

    .table_date {
        width: 15%;
    }

    .pagecontents {
        width: 100%;
        border-bottom: 1px solid;
        border-top: 1px solid black;
        font-size: 1.5vw;
    }

    .pagecontents th {
        padding: 0.9vw 0;
        font-size: 0.9vw;
        font-weight: 600;
        border-top: 1px solid lightgrey;
        border-bottom: 1px solid lightgrey;
        color: black;
        text-align: center;
    }

    .pagecontents td, .pagecontents a, .pagecontents a:hover {
        padding: 0.9vw 0;
        font-size: 0.8vw;
        font-weight: 600;
        color: black;
        text-decoration: none;
    }

    .th1 {
        background-color: #fae1da;

    }

    .th2 {
        background-color: #fcefec;

    }

    .td1 {
        background-color: #f6f7fb;
    }

    .td2 {
        background-color: #ededed;
    }

    .pagination > li > a, .pagination > li > span {
        position: relative;
        float: left;
        padding: 6px 12px;
        line-height: 1.6;
        color: black;
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    tbody {
        text-align: center;
    }

    hr {
        margin:4vh 0 !important;
        border: 0;
        border-top: 1px solid !Important;
    }

    a:hover {
        cursor: pointer;
    }

    body {
        font-family: 'NanumSquare', sans-serif!important;
        font-size:16px;

    }

    .normal {
        font-weight: 400
    }

    .bold {
        font-weight: 700
    }

    .bolder {
        font-weight: 800
    }

    .light {
        font-weight: 300
    }

    .menu_btn1 {
        margin-right: 15vw;
        background-color: #546eb4;
        border: 0.5px solid grey;
        font-size: 0.9vw;
        font-weight: 500;
        -webkit-border-radius: 0.8vw;
        -moz-border-radius: 0.8vw;
        border-radius: 0.8vw;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown1 {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown1-content {
        display: none;
        text-align: center;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 22%;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
        font-size: 1vw;
        max-height: 57vh;
        overflow-y: scroll;
    }

    .dropdown1-content::-webkit-scrollbar-track {
        background-color: transparent;
    }

    .dropdown1-content::-webkit-scrollbar-thumb {
        background-color: lightgrey;
    }

    .dropdown1-content::-webkit-scrollbar-button {
        background-color: transparent
    }

    .dropdown1-content::-webkit-scrollbar-corner {
        background-color: grey;
    }

    .dropdown1-content::-webkit-scrollbar {
        width: 2px !important;
        -ms-overflow-style: auto;
    }

    /* Links inside the dropdown */
    .dropdown1-content a {
        color: black;
        padding: 0.5vh 0.2vw;
        text-decoration: none;
        text-align: left;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown1-content a:hover {
        background-color: #a9a9a9;
    }

    /* Show the dropdown menu on hover */
    .dropdown1:hover .dropdown1-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown1:hover .dropbtn1 {
        background-color: transparent;

    }

    /*---------------드롭다운 메뉴------------------------------------------------------------------------------*/
    .menu_btn {
        background-color: transparent;
        border: 1px solid grey;
        padding: 4px 6px;
        -webkit-border-radius: 0.8vw;
        -moz-border-radius: 0.8vw;
        border-radius: 0.8vw;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 11vw;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 1vh 1vw;
        text-decoration: none;
        text-align: left;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #a9a9a9;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: transparent;
        border: 1.5px solid;
    }

    /*--------------------------------------------------------------------------------------*/
    .navigationheader {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: black;
        width: 75%;
        margin: 1vw 15vw 1vw 15vw;
        height: 7%;
    }

    .navigationheader img {
        width: 60%;

    }

    .navigationheader li {
        display: -moz-inline-block;
        display: inline-block;
        margin: 0 1.7vw;
        font-size: 0.9vw;
        font-weight: 700;
    }

    .navigationheader li a {
        color: black;
    }

    .mySlides {
        background-color: #7888c2;
    }

    .justify-content {
        display: flex;
        display: -ms-flex;
        justify-content: space-between;
        align-items: center;
    }

    .navigationmenu {
        position: relative;
    }

    .navigationmenu_sub > div {
        padding: 1vw 0;
    }

    .navigationmenu_sub {
        word-break: keep-all;
        color: black;
        cursor: pointer;
        background-color: #fdf7f5;
        padding: 0 15vw;
        border: 1px solid transparent;
        justify-content: center;
        -webkit-justify-content: center;
        display: grid;
        display: -ms-grid;
        -ms-grid-columns: 1fr 0 1fr 0 1fr 0 1fr 0 1fr 0 1fr;
        column-gap: 0;
        grid-template-columns: 16.6% 16.6% 16.6% 16.6% 16.6% 16.6%;
        text-align: center;
        font-weight: 700;
        font-size: 1.1vw;
    }

    .onPage {
        color: #556fb4!important;
        font-weight: 900;

    }

    .searchform {
        padding-left: 0;
        padding-right: 0;
        border-radius: 0.4vw;
        display: flex;
        -webkit-justify-content: center;
        justify-content: center;
    }

    .navbarotherpage {
        display: inline;
        color: white;
        text-align: center;
        justify-content: center;
        border-radius: 0.4vw;
        opacity: 0.91;
        background: #e85254;
        font-size: 0.7vw;
        font-weight: 700;
        padding: 0.5vh 0.5vw;
        margin: 1vw;
        width: 120px;
        height: 22px;
    }

    .navbarotherpage:hover {
        background-color: #000000;
        color: white;
        text-decoration: none;

    }

    .mainfooter {
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 1fr 0.5vw 1fr 0.5vw 1fr;
        grid-template-columns: 33.3% 33.3% 33.3%;
        margin: 1vw 15vw 1vw 15vw;
        text-align: center;
    }

    .grid-item:nth-child(2) {
        -ms-grid-column: 3;

    }

    .grid-item:nth-child(3) {
        -ms-grid-column: 5;

    }

    .grid-item:nth-child(4) {
        -ms-grid-column: 7;

    }

    .grid-item:nth-child(5) {
        -ms-grid-column: 9;

    }

    .grid-item:nth-child(6) {
        -ms-grid-column: 11;

    }

    .grid-item:nth-child(7) {
        -ms-grid-column: 13;

    }

    .grid-item:nth-child(8) {
        -ms-grid-column: 15;

    }

    .grid-item:nth-child(9) {
        -ms-grid-column: 17;

    }

    .grid-item:nth-child(10) {
        -ms-grid-column: 19;

    }

    .grid-item:nth-child(11) {
        -ms-grid-column: 21;

    }

    .grid-item:nth-child(12) {
        -ms-grid-column: 23;

    }

    .footerextra {
        text-align: left;
        padding:1vw 20vw;
    }

    .active {
        background-color: #e1e1e1 !important;
        text-decoration: underline;
    }

    .liactive {
        background-color: #f5f5f5 !important;
        text-decoration: underline;
    }

    .hide {
        display: none;
    }

    .pagecontent a {
        color: black;
        cursor: pointer;
    }

    .lens_button1 {
        padding: 0;
        margin: 0;
        border: transparent;
        background-color: transparent;
        border-radius: 0.4vw;
    }

    .lens_button1 img {
        background-color: transparent;
        padding: 3px;
        margin: 0;
        border: none;
        width: 1.7vw;
        height: 3.3vh;
        cursor: pointer;
        border-radius: 0.4vw;
        text-align: center;
        align-items: center;
        justify-content: center;
    }
</style>
