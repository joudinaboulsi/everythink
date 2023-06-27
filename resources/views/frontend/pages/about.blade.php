@extends('frontend.layouts.app')

@section('content')

<!-- Page Header  -->
<?php 
    $img = getenv('S3_URL').'/about/'.$about[0]->header_img;
?>
<div class="parallax-section parallax-fx about-3 parallaxOffset no-padding" style="background-image: url({{$img}}); ">
    <div class="w100 ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="parallax-content clearfix  wow fadeInUp" data-wow-duration=".8s" data-wow-delay="0">
                        <h2 class="intro-heading ">{{$about[0]->header_title}}</h2>
                        <p>{{$about[0]->header_subtitle}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header  -->

<!-- About us Content  -->
<div class="container main-container headerOffset">

    <div class="row has-equal-height-child">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xxs-12 is-equal">

            <div class="hw100 display-table">
                <div class="hw100 display-table-cell">
                    <div class="content-inner wow fadeInRight" data-wow-duration=".8s" data-wow-delay="0">

                        <div class="about-content-text">

                            <h3>
                                Everythink
                            </h3>

                            {!! $about[0]->content !!}

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xxs-12 is-equal">
            <div class="content-inner wow fadeInLeft" data-wow-duration=".8s" data-wow-delay="0">
                <img src="/everythink/about.jpg" class="img-responsive abt-img" alt="Everyhtink">
            </div>
        </div>

    </div>

    <div style="clear:both"></div>

</div>
<!-- About us Content -->

<!-- Eideal Team  -->
<div class="section-people white-bg">
    <div class="container">

        <div style="clear:both;">
            <hr class="hr40 hide-on-gray-look">
        </div>

        <div class="row ">
            <div class="col-xs-12">

                <div class="row row-center preson-row">

                    <div class=" preson text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay="0.05">
                        <img src="/everythink/family1.png" class="img-responsive" alt="M. Achkar">
                    </div>

                    <div class=" preson text-center wow fadeInUp" data-wow-duration=".25s" data-wow-delay="0.07">
                        <img src="/everythink/family2.png" class="img-responsive" alt="John">
                    </div>

                    <div class=" preson text-center wow fadeInUp" data-wow-duration=".65s" data-wow-delay="0.1">
                        <img src="/everythink/family3.png" class="img-responsive" alt="Tracy">
                    </div>

                    <div class=" preson text-center wow fadeInUp" data-wow-duration=".65s" data-wow-delay="0.1">
                        <img src="/everythink/family4.png" class="img-responsive" alt="Rafaa">
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
<!-- End Eideal Team -->

@endsection
