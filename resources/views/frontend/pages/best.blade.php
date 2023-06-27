<?php use App\Http\Controllers\Frontend\ProductsController; ?>

@extends('frontend.layouts.app')

@section('content')

<div id="page-content">

    <div class="about-content-text text-center" style="position:relative; top:30px;">
        <h3>Best Sellers</h3>
    </div>

    <div class="container main-container headerOffset">
        <div class="row transitionfx">
            @foreach($data['best-sellers'] as $product)
                <div class="item col-sm-4 col-md-4 col-lg-3 col-xs-6">
                    <?php ProductsController::displayProductElement($product); ?>
                </div>
            @endforeach
        </div>
        <!--/.row-->
    </div>
</div>

@endsection