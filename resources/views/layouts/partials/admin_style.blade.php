<style>

    body {
        font-family: 'NanumSquare', sans-serif;
    !important margin: 0;
    }

    .normal {
        font-weight: 400;
    }

    .bold {
        font-weight: 700;
    }

    .bolder {
        font-weight: 800;
    }

    .light {
        font-weight: 300;
    }

    #wrapper {
        width: 100%;
        text-align: left;
        min-height: 650px;
        margin: 0 auto;
    }

    /* Navbar */

    .navbar {
        display: grid;
        grid-template-columns: 15% 70% 15%;
        background-color: black;
    }

    .navbar div {
        color: grey;
        padding: 14px 16px;
        display: flex;
        align-items: center;
    }

    .navbardiv {
        justify-content: center;
    }

    .navbar div a {
        color: grey;
        text-decoration: none;
        font-weight: lighter;
    }

    .navbar div a:hover {
        color: white;
    }

    #appname {
        font-size: 20px;
    }

    #userdate {
        font-size: 11px;
        text-decoration: none;
    }

    #logout {
        font-size: 12px;
    }

    /* NavSubbar */

    .navsubbar {
        display: grid;
        grid-template-columns: 14.28% 14.28% 14.28% 14.28% 14.28% 14.28% 14.28%;
        border: 1px solid #e1e1e1;
    }

    .navsubbar div {
        background-color: white;
        padding: 14px 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .navsubbar div:hover {
        background-color: #e1e1e1;
        text-decoration: underline;
        cursor: pointer;
    }

    .navsubbar div a {
        color: black;
        text-decoration: none;
    }

    /* NavLayout */

    .navlayout {
        display: grid;
        grid-template-columns: 20% 80%;
        min-height: 550px;
    }

    .sidebar {
        display: grid;
        grid-template-rows: 12% 10% 25%;
        border-right: 1px solid #ccc;
    }

    .sidebar div {
        align-items: center;
    }

    .sidemenu {
        display: flex;
        justify-content: center;
        font-weight: bold;
    }

    .sideuser {
        justify-content: left;
        text-align: center;
        padding: 25px;
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        background-color: #FFFFF0;
    }

    .sidesubmenu {
        align-items: normal;
    }

    .sidesubmenu ul {
        list-style: none;
        margin: 0;
        width: 100%;
        padding: 0;
    }

    .sidesubmenu ul li:before {
        content: "\2023";
    }

    .sidesubmenu ul li {
        padding: 20px;
        cursor: pointer;
        color: black;
    }

    .sidesubmenu ul li:hover {
        background-color: #f5f5f5;
        text-decoration: underline;
    }

    .sidesubmenu ul li:last-child {
        border-bottom: 1px solid #ccc;
    }

    /*.sidesubmenu ul li a{*/
    /*color:black;*/
    /*text-decoration:none;*/
    /*}*/

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

    .sidesubmenu li:hover {
        text-decoration: underline;
    }

    .infoput {
        width: 100%;
    }

    .infoput table, td {
        border: 1px solid;
    }

    .infoput table {
        border-collapse: collapse;
    }

    .container {
        text-align: center;
    }

    .infoputheader {
        font-weight: normal;
        font-size: 1.4em;
        text-align: left;
    }

    .datainput {
        font-size: 1vw;
        padding: 1vw 1vw 1vw 1vw;
        background-color: #FFFFF0;
    }

    .savebutton {
        text-align: center;
    }

    .selector a {
        text-underline: none;
        color: black;
    }

</style>
