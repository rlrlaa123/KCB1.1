<style>
    a:hover {
        cursor: pointer;
    }

    body {
        font-family: 'NanumSquare', sans-serif;
    !important
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

    /*---------------드롭다운 메뉴------------------------------------------------------------------------------*/
    .menu_btn {
        background-color: transparent;
        border: 1px solid grey;
        padding: 4px 6px;
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
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 1vh 1.5vw;
        text-decoration: none;
        text-align: left;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: darkgrey;
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
        color: black;
        width: 100%;
        margin-bottom: 1vw;
    }

    .navigationheader ul {
        text-align: right;
        margin: 1vw 8vw 1vw 1vw;
    }

    .navigationheader li {
        display: inline-block;
        margin-left: 2vw;
        margin-right: 2vw;
    }

    .navigationheader li a {
        color: black;
    }

    .navigationmenu {
        background-color: #fdf7f5;
        padding: 0.5vw;
        border: 1px solid transparent;
        text-align: center;

    }

    .navigationmenu ul {
        margin-bottom: 0px;
        text-align: center;
    }

    .navigationmenu li {
        display: inline-block;
        margin: 1vw 4vw;
        line-height: 0;
    }

    .navigationmenu li a {
        color: black;
    }

    .searchform {
        padding-left: 0;
        padding-right: 0;
        border-radius: 0.4vw;
        display: flex;
        -webkit-justify-content: center;
        justify-content: center;
    }

    .searchbarcontainer {
        text-align: center;
        margin: 0;
        padding: 5vw;
        background-image: url('/img/navbarbackgroundpicture.png');
        -webkit-background-size: 100%;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    .navbarotherpage {
        display: inline;
        color: white;
        text-align: center;
        justify-content: center;
        border-radius: 0.4vw;
        opacity: 0.85;
        background: #7888c2;
        font-size: 0.8vw;
        font-weight: bolder;
        padding: 0.5vw 0.5vw 0.5vw 0.5vw;
        margin: 1vw;
        width: 120px;
        height: 22px;
    }

    .navbarotherpage:hover {
        color: white;
        text-decoration: none;
        font-size: 0.9vw;
    }

    .mainfooter {
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 1fr 0.5vw 1fr 0.5vw 1fr 0.5vw 1fr 0.5vw 1fr;
        grid-column-gap: 0.5vw;
        grid-template-columns: 20% 20% 20% 20% 20%;
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

    .footerextra {
        text-align: left;
        margin-left: 18.8vw;
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
</style>
