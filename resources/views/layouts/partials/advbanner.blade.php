<style>
    .bannercontainer{
        display: -ms-grid;
        display: grid;
        height:5vh;
        width:100%;
        -ms-grid-columns: 1fr 0 1fr 0 1fr;
        grid-template-columns: 33.3% 33.3% 33.3%;
    }
    .bannercontainer .grid-item:nth-child(2) {
        -ms-grid-column: 3;
    }

    .bannercontainer .grid-item:nth-child(3) {
        -ms-grid-column: 5;
    }
    .bannercontainer > div{
        border-radius: 22%;
        font-size:1vw;
        font-weight:600;
        padding:0;
        margin: auto;
    }
    .advbanner {
        position: relative;

    }

    .mySlides {
        display: none;
    }

    .advbanner img {
        vertical-align: middle;
        width: 100%;
        height: 5vh;
    }

    .advbannernumbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    .advbannerdot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 3s;
        animation-name: fade;
        animation-duration: 3s;
    }

    @-webkit-keyframes fade {
        from {
            opacity: .4
        }
        to {
            opacity: 1
        }
    }

    @keyframes fade {
        from {
            opacity: .4
        }
        to {
            opacity: 1
        }
    }
</style>
<div class="bannercontainer">
    <div class="grid-item">
        <div style="cursor:pointer; width:100%;" onclick="location.href='{{url('http://www.bosangwon.com')}}'"><img src="/img/bosangwon_logo.png" style="width:100%; height:5vh;"></div>
    </div>
    <div class="grid-item">
        <div style="cursor:pointer;" onclick="location.href='{{url('http://blog.naver.com/bosangwon')}}'">한국보상원 네이버 블로그</div>
    </div>
    <div class="advbanner grid-item">
        <div class="mySlides fade">
            <div class="advbannernumbertext">1 / 3</div>
            <img src="/img/no_image.jpg" style="width:100%; height:5vh;">
        </div>

        <div class="mySlides fade">
            <div class="advbannernumbertext">2 / 3</div>
            <img src="/img/no_image.jpg" style="width:100%; height:5vh;">
        </div>

        <div class="mySlides fade">
            <div class="advbannernumbertext">3 / 3</div>
            <img src="/img/no_image.jpg" style="width:100%; height:5vh;">
        </div>
    </div>
</div>
{{--<div style="text-align:center">--}}
    {{--<span class="advbannerdot"></span>--}}
    {{--<span class="advbannerdot"></span>--}}
    {{--<span class="advbannerdot"></span>--}}
{{--</div>--}}
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        // var dots = document.getElementsByClassName("advbannerdot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        // for (i = 0; i < dots.length; i++) {
        //     dots[i].className = dots[i].className.replace(" active", "");
        // }
        slides[slideIndex - 1].style.display = "block";
        // dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 2 seconds
    }
</script>