<?php use App\Http\Repositories\Frontend\CategoriesApis;?>

<!-- Search Bar -->
<div id="search-overly" class="search-overly-mask">
    <a class=" search-close search-overly-close-trigger "> <i class=" fa fa-times-circle"> </i> </a>
    <div class="container">

        <form class="form-horizontal">
            <fieldset>
                <!-- Appended Input-->
                <div class="control-group">
                    <label class="control-label">Search into the shop..</label>

                    <div class="controls">
                        <div class="search " role="search" id="mySearch">
                            <input class="form-control" placeholder="Start typing " type="search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <span class="glyphicon glyphicon-search"></span>
                                    <span class="sr-only">Search</span>
                                </button>
                            </span>
                        </div>
                        <!-- for error or message -->
                        <p class="help-block hide">help</p>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>
</div>
<!-- End Search Bar -->

<!-- Fixed Menu -->
<div class="navbar navbar-default navbar-hero  navbar-fixed-top megamenu" role="navigation">

    <!-- Navbar Top -->
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-6">
                    <div class="pull-left colorWhite">
                        <ul class="userMenu hidden-xs">
                            <li style="padding:9px 10px 0 0;"><span class="colorWhite">48 Hours Delivery</span> &nbsp; | </li>
                            <li style="padding:9px 10px 0 0;"><span class="colorWhite">Cash on Delivery</span> &nbsp; | </li>
                            <li style="padding:9px 10px 0 0;"><span class="colorWhite">Secure Online Payment</span> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-6 no-margin no-padding">
                    <div class="pull-right">
                        <ul class="userMenu">
                            <li class="hide-xs"><a class="btn btn-nobg  search-trigger"><i class="fa fa-search"> </i></a></li>

                            @if(Auth::check())
                            
                            <li>
                                <a href="{{ route('user_account_path', Auth::user()->id) }}">
                                    <span class="hidden-xs"> {{ Auth::user()->name }}</span> 
                                    <i class="fa fa-user "></i>
                                </a>
                            </li>

                            <li class="hidden-xs">
                                <a href="{{route('user_logout_path')}}"> Sign out </a>
                                <i class="glyphicon glyphicon-log-out hide visible-xs"></i>
                            </li>

                            @else

                            <li>
                                <a href="/login"> 
                                    <span class="hidden-xs">Sign In</span>
                                    <i class="glyphicon glyphicon-log-in hide visible-xs "></i> 
                                </a>
                            </li>

                            @endif

                            <li class="hide-xs"><a href="{{ route('cart_path') }}"> Cart @if($count != 0)(<span class="cart_count">{{$count}}</span>) @endif<i class="glyphicon-shopping-cart glyphicon"></i> </a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar Top -->

    <!-- Navbar Header -->
    <div class="container static">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"> Toggle navigation </span>
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
            </button>

            <button type="button" class="navbar-toggle" onclick="location.href='/cart'">
                <i class="fa fa-shopping-cart colorWhite"> </i>
                <span class="cartRespons colorWhite"> Cart @if($count != 0)(<span class="cart_count">{{$count}}</span>) @endif </span>
            </button>

            <a class="navbar-brand " href="/"> <img src="/images/logo-dark.png" alt="Eideal" width="250"> </a>

            <!-- this part for mobile -->
            <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                <div class="input-group">
                    <button class="btn btn-nobg search-trigger" type="button"><i class="fa fa-search"> </i></button>
                </div>
            </div>

        </div>

        <!-- Menu -->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li class="{{ Route::currentRouteName() == 'home_path' ? 'active' : '' }}"><a href="/"> Home </a></li>

                <li class="dropdown {{ ((Route::currentRouteName() == 'product_list_path') || (Route::currentRouteName() == 'product_details_path')) ? 'active' : '' }}">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"> Shop <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content">
                            <?php $categories =  CategoriesApis::getParentCategories(); ?>
                            <ul class="noPaddingLR">
                                @foreach($categories as $c)
                                    <li><a href="{{ route('product_list_path', $c->category_id) }}"> {{$c->category_name}} </a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="{{ Route::currentRouteName() == 'about_path' ? 'active' : '' }}"><a href="{{ route('about_path') }}"> About us </a></li>

                <li class="dropdown {{ ((Route::currentRouteName() == 'media_path') || (Route::currentRouteName() == 'tutorials_path')) ? 'active' : '' }}">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"> Media <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content">
                            <ul class="noPaddingLR">
                                <li><a href="{{ route('media_path') }}">Media</a></li>
                                <li><a href="{{ route('tutorials_path') }}">Tutorials</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown {{ ((Route::currentRouteName() == 'brands_path') || (Route::currentRouteName() == 'brand_details_path')) ? 'active' : '' }}">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"> Brands <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content">
                            <ul class="noPaddingLR">
                                <li><a href="{{ route('brand_details_path') }}">Amazon Keratin</a></li>
                                <li><a href="{{ route('brand_details_path') }}">Davines</a></li>
                                <li><a href="{{ route('brand_details_path') }}">FacePro</a></li>
                                <li><a href="{{ route('brand_details_path') }}">Vern</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown {{ ((Route::currentRouteName() == 'services_path') || (Route::currentRouteName() == 'service_details_path')) ? 'active' : '' }}">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"> Services <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content">
                            <ul class="noPaddingLR">
                                <li><a href="{{ route('service_details_path') }}">Coatching</a></li>
                                <li><a href="{{ route('service_details_path') }}">Education & Training</a></li>
                                <li><a href="{{ route('service_details_path') }}">Salon Design</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="{{ ((Route::currentRouteName() == 'blog_path') || (Route::currentRouteName() == 'blog_details_path')) ? 'active' : '' }}"><a href="{{ route('blog_path') }}"> Blog </a></li>

                <li class="{{ Route::currentRouteName() == 'contact_path' ? 'active' : '' }}"><a href="{{ route('contact_path') }}" class="no-right-padding"> Contact </a></li>

            </ul>
        </div>
        <!-- End Menu -->

    </div>
    <!-- End Navbar Header -->

    <!-- Search Full -->
    <div class="search-full text-right">

        <a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>

        <div class="searchInputBox pull-right">
            <input type="search" data-searchurl="search?=" name="q" placeholder="start typing and hit enter to search"
                   class="search-input">
            <button class="btn-nobg search-btn" type="submit"><i class="fa fa-search"> </i></button>
        </div>

    </div>
    <!-- End Search Full -->

</div>
<!-- End Fixed Menu  -->