<style>
    .advbanner {

        position: relative;
        margin: 1vw 9vw 1vw 15vw;
        height: 11vh;
        background-color: #bcc1e1;
    }

    .mySlides {
        display: none;
    }

    .advbanner img {
        vertical-align: middle;
        width: 1000px;
        height: 600px;
    }

    .advbannertext {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
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
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
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
<div class="advbanner">
    <div class="mySlides fade">
        <div class="advbannernumbertext">1 / 3</div>
        {{--<img src="/img/poster_1.jpg" width="50%">--}}
        <div class="advbannertext">Caption Text</div>
    </div>

    <div class="mySlides fade">
        <div class="advbannernumbertext">2 / 3</div>
        {{--<img src="/img/poster_2.jpg" width="50%">--}}
        <div class="advbannertext">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="advbannernumbertext">3 / 3</div>
        {{--<img src="/img/poster_3.jpg" width="50%">--}}
        <div class="advbannertext">Caption Three</div>
    </div>

</div>
<div style="text-align:center">
    <span class="advbannerdot"></span>
    <span class="advbannerdot"></span>
    <span class="advbannerdot"></span>
</div>
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("advbannerdot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 10000); // Change image every 2 seconds
    }
</script>