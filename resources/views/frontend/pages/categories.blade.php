<?php use App\Http\Controllers\Frontend\ProductsController; ?>

@extends('frontend.layouts.app')

@section('content')

<!-- Categories  -->
<section class="section-hero white-bg" id="section-categories">
    <div class="container">

        <div class="about-content-text text-center">
            <h3>Categories</h3>
        </div>

        <div class="row">
            @foreach($data['categories'] as $c)
                <!-- generate SEO URL link -->
                <?php $seo_link = ProductsController::generateSeoUrlLink($c->name, $c->category_id); ?>
                <!-- Category  -->
                <div class="block-explore col-sm-3 col-xs-6">
                    <div class="inner">
                        <a class="promotion" href="{{ route('product_list_path', $seo_link) }}">
                            <span class="categ">{{$c->name}}</span>
                        </a>
                        <a href="{{ route('product_list_path', $seo_link) }}" class="img-block">
                            <?php 
                                if($c->img != null)
                                    $img = getenv('S3_URL').'/categories/'.$c->img;
                                else
                                    $img = '/images/default.png';
                            ?>
                            <img alt="{{$c->name}}" src="{{$img}}" class="img-responsive" style="border-radius:10px; height:176px">
                        </a>
                    </div>
                </div>
                <!-- End Category  -->
            @endforeach
        </div>

    </div>
</section>
<!-- End Categories  -->

@endsection