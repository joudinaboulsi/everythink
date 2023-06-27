<?php use App\Http\Controllers\Frontend\ProductsController; ?>

@extends('frontend.layouts.app')

@section('content')

<!-- Mobile Categories  -->
<div class="container-fluid white-bg visible-xs visible-sm">
    <div class="row">
        <div class="col-lg-12 padd-10">
            <ul class="brand-carousel owl-carousel owl-theme">

                @foreach($data['highlights'] as $h)

                <!-- generate SEO URL link -->
                <?php $seo_link = ProductsController::generateSeoUrlLink($h->name, $h->category_id); ?>

                <li>
                    <a class="mobile-cat" href="{{ route('product_list_path', $seo_link) }}">
                        <div class="cat-img"><img src="{{getenv('S3_URL')}}/categories/{{$h->img}}" alt="{{$h->name}}">
                        </div>
                        <p>{{$h->name}}</p>
                    </a>
                </li>
                @endforeach

                @foreach($data['collections'] as $c)
                <li>
                    <a class="mobile-cat"
                        href="{{ route('product_of_collection_path', array($c->url_tag_name, $c->tag_id)) }}">
                        <div class="cat-img"><img src="{{getenv('S3_URL')}}/tags/{{$c->img}}" alt="{{$c->name}}"></div>
                        <p>{{$c->name}}</p>
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
<!-- End Mobile Categories-->

<!-- Slideshow  -->
<div class="banner">
    <div class="full-container">
        <div class="slider-content">

            <span class="prevControl sliderControl">
                <i class="fa fa-angle-left fa-3x "></i>
            </span>

            <span class="nextControl sliderControl">
                <i class="fa fa-angle-right fa-3x "></i>
            </span>

            <div class="slider slider-v1" data-cycle-swipe=true data-cycle-prev=".prevControl"
                data-cycle-next=".nextControl" data-cycle-loader="wait">

                @foreach($data['slides'] as $s)
                <!-- Slide  -->
                <div class="slider-item slider-item-img1">
                    @if(($s->title) || ($s->subtitle) || ($s->action))
                    <div class="sliderInfo">
                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-sm-12 sliderTextFull ">
                                <div class="inner text-center">
                                    @if($s->title)<h1 class="uppercase">{{$s->title}}</h1>@endif
                                    @if($s->subtitle)<h3 class="hidden-xs">{{$s->subtitle}}</h3>@endif
                                    @if($s->action)<a href="{{$s->action}}"
                                        class="btn btn-dark btn-lg">{{$s->button_name}}</a>@endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <img src="{{getenv('S3_URL').'/slides/'.$s->image}}" class="parallaximg sliderImg"
                        alt="{{$s->title}}">
                </div>
                <!-- End Slide  -->
                @endforeach

            </div>

        </div>
    </div>
</div>
<!-- End Slideshow -->

@if(!empty($data['highlights']))
<!-- CATEGORIES LIST  -->
<section class="section-hero white-bg" id="section-category">

    <div class="container-fluid">

        <div class="about-content-text text-center hidden-xs row">
            <h3 style="line-height: 20px">Product Categories<br>
                <a href="{{ route('all_categories_path') }}" style="font-size: 12px; color: rgba(18,112,184)">See All
                    Categories</a>
            </h3>
        </div>

        <div class="visible-xs row">
            <div class="col-xs-6 about-content-text text-left">
                <h3>Product Categories</h3>
            </div>
            <div class="col-xs-6 text-right">
                <a class="btn btn-stroke thin dark" href="{{ route('all_categories_path') }}">View All</a>
            </div>
        </div>

        <div class="row">
            @foreach($data['highlights'] as $h)
            <!-- generate SEO URL link -->
            <?php $seo_link = ProductsController::generateSeoUrlLink($h->name, $h->category_id); ?>
            <!-- Category  -->
            <div class="block-explore col-md-3 col-sm-4 col-xs-6">
                <div class="inner">
                    <a class="promotion" href="{{ route('product_list_path', $seo_link) }}">
                        <span class="categ">{{$h->name}}</span>
                    </a>
                    <a href="{{ route('product_list_path', $seo_link) }}" class="img-block">
                        <img alt="{{$h->name}}" src="{{getenv('S3_URL')}}/categories/{{$h->img}}"
                            class="img-responsive">
                    </a>
                </div>
            </div>
            <!-- End Category  -->
            @endforeach
        </div>

    </div>

</section>
<!-- END CATEGORIES LIST  -->
@endif

<!-- SEPARATOR 0  -->

<!-- If separator is Parallax Picture  -->
<!-- <?php $img = getenv('S3_URL').'/slides/'.$data['separators'][0]->image; ?>
    <section class="section-hero-parallax parallax-section" style="background-image: url({{$img}}); background-size: cover !important; background-repeat: no-repeat;">
        <div class="overly-shade">
            <div class="container">
                <div class="hero-parallax-content ">
                    <h3 class="hero-section-title"> {{ $data['separators'][0]->title }} </h3>
                    <p>{{ $data['separators'][0]->subtitle }}</p>
                    <a class="btn btn-stroke thin lite" href="{{ $data['separators'][0]->action }}">Know More</a>
                </div>
            </div>
        </div>
    </section> -->
<!-- End Parallax Picture -->

<!-- End SEPARATOR 0 -->


<!-- DEALS PRODUCT LIST  -->
@if(!empty($data['deals']) && $data['deals'] != NULL)
<!-- Deals -->
<section class="section-hero" id="section-deals">

    <div class="container">

        <div class="about-content-text text-center hidden-xs row">
            <h3 style="line-height: 20px">Daily Deals<br>
                <a href="{{ route('deals_path') }}" style="font-size: 12px; color: rgba(18,112,184)">See All Deals</a>
            </h3>
        </div>

        <div class="visible-xs row">
            <div class="col-xs-6 about-content-text text-left">
                <h3>Deals</h3>
            </div>
            <div class="col-xs-6 text-right">
                <a class="btn btn-stroke thin dark" href="{{ route('deals_path') }}">View All</a>
            </div>
        </div>

        <div class="row">
            <div id="dealsSlider" class="owl-carousel owl-theme">
                @foreach($data['deals'] as $product)
                <div class="item">
                    <?php ProductsController::displayProductElement($product); ?>
                </div>
                @endforeach
            </div>
        </div>

    </div>

</section>
<!-- END DEALS PRODUCT LIST -->
@endif


<!-- SEPARATOR 1  -->

<!-- <?php $img = getenv('S3_URL').'/slides/'.$data['separators'][1]->image; ?>
    <section class="section-hero-parallax parallax-section" style="background-image: url({{$img}}); background-size: cover !important; background-repeat: no-repeat;">
        <div class="overly-shade">
            <div class="container">
                <div class="hero-parallax-content ">
                    <h3 class="hero-section-title"> {{ $data['separators'][1]->title }} </h3>
                    <p>{{ $data['separators'][1]->subtitle }}</p>
                    <a class="btn btn-stroke thin lite" href="{{ $data['separators'][1]->action }}">Know More</a>
                </div>
            </div>
        </div>
    </section> -->

<!-- End SEPARATOR 0 -->

@if(!empty($data['collections']))
<!-- Collections  -->
<section class="section-hero white-bg" id="section-collections">

    <div class="container-fluid">

        <div class="about-content-text text-center hidden-xs row">
            <h3 style="line-height: 20px">Shop by Collection<br>
                <a href="{{ route('collections_path') }}" style="font-size: 12px; color: rgba(18,112,184)">See All
                    Collections</a>
            </h3>
        </div>

        <div class="visible-xs row">
            <div class="col-xs-6 about-content-text text-left">
                <h3>Shop by Collection</h3>
            </div>
            <div class="col-xs-6 text-right">
                <a class="btn btn-stroke thin dark" href="{{ route('collections_path') }}">View All</a>
            </div>
        </div>

        <div class="row">
            @foreach($data['collections'] as $c)
            <div class="block-explore col-sm-4 col-xs-6">
                <div class="inner">
                    <a class="promotion"
                        href="{{ route('product_of_collection_path', array($c->url_tag_name, $c->tag_id)) }}">
                        <span class="categ">{{$c->name}}</span>
                    </a>
                    <a href="{{ route('product_of_collection_path', array($c->url_tag_name, $c->tag_id)) }}"
                        class="img-block">
                        <img alt="{{$c->name}}" src="{{getenv('S3_URL')}}/tags/{{$c->img}}" class="img-responsive"
                            width="100%">
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</section>
@endif
<!-- End Collections  -->


<!-- SEPARATOR 2  -->

<!-- <?php $img = getenv('S3_URL').'/slides/'.$data['separators'][2]->image; ?>
    <section class="section-hero-parallax parallax-section" style="background-image: url({{$img}}); background-size: cover !important; background-repeat: no-repeat;">
        <div class="overly-shade">
            <div class="container">
                <div class="hero-parallax-content ">
                    <h3 class="hero-section-title"> {{ $data['separators'][2]->title }} </h3>
                    <p>{{ $data['separators'][2]->subtitle }}</p>
                    <a class="btn btn-stroke thin lite" href="{{ $data['separators'][2]->action }}">Know More</a>
                </div>
            </div>
        </div>
    </section> -->

<!-- End SEPARATOR 2 -->


<!-- BEST SELLERS PRODUCTS -->
@if( (!empty($data['new']) && $data['new'] != NULL) || (!empty($data['featured']) && $data['featured'] != NULL) )
<section class="section-hero" id="section-best">

    <div class="container">

        <div class="about-content-text text-center hidden-xs row">
            <h3 style="line-height: 20px">New Arrivals<br>
                <!-- @if($data['new'])<a href="{{ route('best_path') }}" style="font-size: 12px; color: rgba(18,112,184)">See All Best Sellers</a>@endif -->
            </h3>
        </div>

        <div class="visible-xs row">
            <div class="col-xs-6 about-content-text text-left">
                <h3>New Arrivals</h3>
            </div>
            <!-- @if($data['new'])
            <div class="col-xs-6 text-right">
                <a class="btn btn-stroke thin dark" href="{{ route('best_path') }}">View All</a>
            </div>
            @endif -->
        </div>
<div class="section-content">
    <div class="row has-equal-height-child">
      @foreach($data['new'] as $product)
        <div class="item col-sm-4 col-md-3 col-xs-6">
           <?php ProductsController::displayProductElement($product); ?>
        </div>
        @endforeach
    </div>
</div>
      
    </div>

</section>
<!-- END BEST SELLERS PRODUCTS -->

@endif


<!-- SEPARATOR 3  -->

<?php $img = getenv('S3_URL').'/slides/'.$data['separators'][3]->image; ?>
<section class="section-hero-parallax parallax-section"
    style="background-image: url({{$img}}); background-size: cover !important; background-repeat: no-repeat;">
    <div class="overly-shade">
        <div class="container">
            <div class="hero-parallax-content ">
                <h3 class="hero-section-title"> {{ $data['separators'][3]->title }} </h3>
                <p>{{ $data['separators'][3]->subtitle }}</p>
                <a class="btn btn-stroke thin lite" href="{{ $data['separators'][3]->action }}">Know More</a>
            </div>
        </div>
    </div>
</section>

<!-- End SEPARATOR 3 -->


<!-- FEATURED PRODUCTS -->
@if(!empty($data['featured']) && $data['featured'] != NULL)
<section class="section-hero">

    <div class="container">

        <div class="about-content-text text-center hidden-xs row">
            <h3 style="line-height: 20px">Trendy Products</h3>
        </div>

        <div class="visible-xs row">
            <div class="col-xs-6 about-content-text text-left">
                <h3>Trendy Products</h3>
            </div>
        </div>

        <div class="section-content">
            <div class="row has-equal-height-child">
                @foreach($data['featured'] as $product)
                <div class="item col-sm-4 col-md-3 col-xs-6">
                    <?php ProductsController::displayProductElement($product); ?>
                </div>
                @endforeach
            </div>
        </div>

    </div>

</section>
@endif
<!-- END FEATURED PRODUCTS -->

@endsection