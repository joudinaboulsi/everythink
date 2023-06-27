<?php use App\Http\Controllers\Frontend\ProductsController; ?>

@extends('frontend.layouts.app')

@section('content')

<!-- Product Details  -->
<!-- Getting today's date -->
<?php $now = date("Y-m-d"); ?>

<input type="hidden" value="{{ csrf_token() }}" name="_token"> 

<div class="white-bg" style="padding-bottom: 50px;">
    <div class="container main-container headerOffset">
        
        <div class="row transitionfx">

            <div class="col-xs-12 visible-xs" style="margin-bottom: 15px">
                <!-- Product Name -->
                <h1 class="product-title"> {{$product[0]->name}}</h1>
                <!-- Product Brand -->
                <span class="new-product"> {{$product[0]->brand}}</span>
            </div>

            <!-- LEFT COLUMN with photos of the product-->
            <div class="col-lg-6 col-md-6 col-sm-6">
    
                <!-- product Image and Zoom -->
                <div class="main-image main-image-thumb-list sp-wrap col-lg-12 no-padding style3 sp-non-touch" style="display: inline-block;">
                    <!-- product Image and Zoom -->
                    <div class="main-image col-lg-12 no-padding">

                        <a href="{{getenv('S3_URL')}}/products/large/{{$product[0]->primary_img}}">
                            <img src="{{getenv('S3_URL')}}/products/{{$product[0]->primary_img}}" class="img-responsive" alt="img">
                        </a>

                        @foreach($images as $i)
                            @if($i->is_primary != 1)
                             <a href="{{getenv('S3_URL')}}/products/large/{{$i->img}}">
                                <img src="{{getenv('S3_URL')}}/products/{{$i->img}}" class="img-responsive" alt="img">
                             </a>
                            @endif
                        @endforeach
                   </div>
                </div>
            </div>
            <!--/ left column end -->


            <!-- RIGHT COLUMN -->
            <div class="col-lg-6 col-md-6 col-sm-5">
                <!-- General Information of the selected product -->
                <!-- Product Name -->
                <h1 class="product-title hidden-xs"> {{$product[0]->name}}</h1>

                <!-- Product Brand -->
                <h3 class="product-code hidden-xs"><b>Brand:</b> {{$product[0]->brand}}</h3>
               

                @if(isset($product[0]->width) OR isset($product[0]->height) OR isset($product[0]->weight) OR isset($product[0]->length))
                <h3 class="product-code"><b>Dimensions:</b> <br>
                    @if(isset($product[0]->width)) Width: {{$product[0]->width}} &nbsp; - &nbsp; @endif
                    @if(isset($product[0]->height)) Height: {{$product[0]->height}} <br> @endif
                    @if(isset($product[0]->weight)) Weight: {{$product[0]->weight}} &nbsp; - &nbsp; @endif
                    @if(isset($product[0]->length)) Length: {{$product[0]->length}} @endif
                </h3>
                @endif
                <br>
               
                @foreach ($tag as $t )
                
                
                <span style="background: #4bb777; padding: 5px; border-radius: 5px;"> {{$t->name}}</span>
                @endforeach
                <!-- Product Short Description -->
                <div class="details-description contentBox">
                    <p><?php echo htmlspecialchars_decode($product[0]->short_description); ?></p>
                </div>

                <div class="row contentBox">
                    <div class="col-sm-12 col-xs-7">
                        <div class="price" style="font-size:28px; color:#4bb777">
                            @if($actual_price != '')
                                <span class="pricetochange actual_price">{{ $actual_price }}</span>
                                <span class="price-standard old_price">{{ $old_price }}</span>
                            @else
                                 <span class="pricetochange actual_price">{{ $actual_price }}</span>
                                 <span class="price-standard old_price"></span>
                            @endif
                        </div>  
                    </div>

                    <div class="visible-xs col-xs-5 f-right">
                        <!-- If there is at least 1 attribute associated to the product, the stock status of the variant 
                        will be loaded dynamically from the Javascript in the in_stock class -->
                        @if(count($attributes) != 0)
                            <h3 class="incaps no-margin" id="in_stock"></h3>
                        <!-- If no attribute is linked to the product, the stock status will be the one of the unique variant associated to the product -->
                        @else
                            <!-- If Stock management is active (counting stock) -->
                            @if($product[0]->enable_stock_mgmt == 1)
                                <!-- If no stock quantity -->
                                @if($variants[0]->stock_qty == 0 OR  $variants[0]->stock_qty == null)
                                    <h3 class="incaps no-margin" id="in_stock"><i class="fa fa fa-times-circle color-out"></i> Out of stock</h3>
                                <!-- If stock available -->
                                @else
                                    <h3 class="incaps no-margin" id="in_stock"><i class="fa fa fa-check-circle-o color-in"></i> In stock </h3>
                                @endif
                            <!-- If stock management inactive (not counting stock) -->
                            @else
                                <!-- If out of stock -->
                                @if($variants[0]->stock_status_id == 0 OR  $variants[0]->stock_status_id == null)
                                    <h3 class="incaps no-margin" id="in_stock"><i class="fa fa fa-times-circle color-out"></i> Out of stock</h3>
                                <!-- If in stock -->
                                @else
                                    <h3 class="incaps no-margin" id="in_stock"><i class="fa fa fa-check-circle-o color-in"></i> In stock </h3>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
                
                <!-- Get all the attribute and attribute items of the product and loads automatically price and variant based on the attribute selection 
                Linked to JS and CSS product-details-attribute-selection -->
                <?php $i=1; ?>
                @foreach($attributes as $attr)
                    @if($attr->is_main == 1)
                        <label class="no-margin-bottom">{{$attr->name}}:</label>
                        <div class="row contentBox">
                            <div class="col-lg-12">
                                <div class="">
                                     @foreach($attrItems as $item)
                                        @if($attr->attribute_id == $item->attribute_id)
                                            <label class="radio_container" style="font-weight:500;">
                                            <input type="radio" id="attribute_item_{{$item->attribute_item_id}}" name="attribute_{{$attr->attribute_id}}" class="attribute_selection main_attribute" value="{{$item->attribute_item_id}}" dimmed="true">  <!-- DO NOT REMOVE INPUT -->
                                            <span class="checkmark" id="checkmark_{{$item->attribute_item_id}}" 
                                                style="background:url('{{getenv('S3_URL')}}/attribute_items/thumbs/{{$item->attribute_item_img}}'); 
                                                background-size: 50px 50px;
                                                height:50px;
                                                width:50px;"> </span>
                                            </label>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    @else
                    <label class="no-margin-bottom">{{$attr->name}}:</label>
                    <div class="row contentBox">
                        <div class="col-lg-12">
                            <div class="">
                                 @foreach($attrItems as $item)
                                    @if($attr->attribute_id == $item->attribute_id)
                                        <label class="radio_container" style="font-weight:500;">
                                        <input type="radio" id="attribute_item_{{$item->attribute_item_id}}" name="attribute_{{$attr->attribute_id}}" class="attribute_selection" value="{{$item->attribute_item_id}}" dimmed="true">  <!-- DO NOT REMOVE INPUT -->
                                        <span class="checkmark" id="checkmark_{{$item->attribute_item_id}}"> {{$item->item_name}} </span>
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    @endif
                @endforeach 


                <!-- Selection of quantity of products to order 
                PRODUCT QTY TO ORDER. Enabled only when all attributes are selected -->
                <div class="contentBox">
                    <span class="selected-color"><label>Quantity</label></span>
                    <!-- If there is at least 1 attribute associated to the product, we set the quantity input as disabled. We can only enable the quantity when all the attributes are selected -->
                    @if(count($attributes) != 0)
                        <input class="form-control qty_input_2" id="order_qty" type="number" value="1" max="100" min="0" disabled /> 
                    <!-- If no attribute is linked to the product, the quantity input will be enabled by default -->
                    @else
                        <!-- If Stock management is active (counting stock) -->
                        @if($product[0]->enable_stock_mgmt == 1)
                            <!-- If no stock quantity -->
                            @if($variants[0]->stock_qty == 0 OR  $variants[0]->stock_qty == null)
                                <input class="form-control qty_input_2" id="order_qty" type="number" value="1" max="100" min="0" disabled/> 
                            <!-- If stock available -->
                            @else
                                <input class="form-control qty_input_2" id="order_qty" type="number" value="1" max="100" min="0"/> 
                            @endif
                        <!-- If stock management inactive (not counting stock) -->
                        @else
                            <!-- If out of stock -->
                            @if($variants[0]->stock_status_id == 0 OR  $variants[0]->stock_status_id == null)
                                <input class="form-control qty_input_2" id="order_qty" type="number" value="1" max="100" min="0" disabled/>
                            <!-- If in stock -->
                            @else
                                <input class="form-control qty_input_2" id="order_qty" type="number" value="1" max="100" min="0"/>
                            @endif
                        @endif
                    @endif
                </div>

                <!-- Add to cart actions with control on stock availability -->
                <div class="cart-actions">
                    <div class="addto row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            @if(count($attributes) != 0)
                                <button class="button btn-block btn-cart cart first add_to_cart" title="Add to Cart" type="button" href="" qty="1" variantid="" disabled>
                                    Add to Cart
                                </button>
                            @else
                                <button class="button btn-block btn-cart cart first add_to_cart" title="Add to Cart" type="button" href="" qty="1" variantid="{{$variants[0]->variant_id}}">
                                    Add to Cart
                                </button>
                            @endif
                        </div>
                    </div>
                    <div style="clear:both"></div>

                    <div class="hidden-xs">
                    <!-- If there is at least 1 attribute associated to the product, the stock status of the variant 
                    will be loaded dynamically from the Javascript in the in_stock class -->
                    @if(count($attributes) != 0)
                        <h3 class="incaps" id="in_stock"></h3>
                    <!-- If no attribute is linked to the product, the stock status will be the one of the unique variant associated to the product -->
                    @else
                        <!-- If Stock management is active (counting stock) -->
                        @if($product[0]->enable_stock_mgmt == 1)
                            <!-- If no stock quantity -->
                            @if($variants[0]->stock_qty == 0 OR  $variants[0]->stock_qty == null)
                                <h3 class="incaps" id="in_stock"><i class="fa fa fa-times-circle color-out"></i> Out of stock</h3>
                            <!-- If stock available -->
                            @else
                                <h3 class="incaps" id="in_stock"><i class="fa fa fa-check-circle-o color-in"></i> In stock </h3>
                            @endif
                        <!-- If stock management inactive (not counting stock) -->
                        @else
                            <!-- If out of stock -->
                            @if($variants[0]->stock_status_id == 0 OR  $variants[0]->stock_status_id == null)
                                <h3 class="incaps" id="in_stock"><i class="fa fa fa-times-circle color-out"></i> Out of stock</h3>
                            <!-- If in stock -->
                            @else
                                <h3 class="incaps" id="in_stock"><i class="fa fa fa-check-circle-o color-in"></i> In stock </h3>
                            @endif
                        @endif
                    @endif
                    </div>
                </div>
                <div class="clear"></div>

                <!-- Add to cart actions with control on stock availability -->
                <div class="product-tab w100 clearfix">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- DESCRIPTION -->
                        <div class="tab-pane active" id="details"><?php echo htmlspecialchars_decode($product[0]->description); ?> </div>
                    </div>
                </div>
                <!--/.product-tab-->

                <div style="clear:both"></div>
                <div class="product-share clearfix">
                    <p> SHARE </p>
                    <div class="socialIcon">
                        <a class="facebook customer share" title="Facebook share" href="http://www.facebook.com/sharer.php?u={{url()->full()}}" target="_blank"> <i class="fa fa-facebook"></i> </a>
                        <a class="mail customer share" title="Mail share" href="mailto:?subject=Check%20out%20this%20item!&body=Hey,%0A%0ACheck%20ut%20this%20item%3A%20{{url()->full()}}" target="_blank"> <i class="fa fa-envelope-o"></i> </a>
                        <a href="https://api.whatsapp.com/send?text={{url()->full()}}" data-text="Take a look at this :" data-href="" class="whatsapp customer share" title="Whatsapp share" target="_blank"> <i class="fa fa-whatsapp"></i></a>
                        <!-- Print -->
                        <a href="javascript:;" onclick="window.print()"> <i class="fa fa-print"></i> </a>
                    </div>
                </div>
                <!--/.product-share-->          
            </div>
            <!--/ RIGHT COLUMN END -->
        </div>
        <!--/.row-->
    </div>
</div>

<div class="container">

    <!-- Recommended Products -->
    @if($similarProducts)
    <div class="section-hero row recommended">

        <div class="about-content-text text-center row">
            <h3>related items</h3>
        </div>

        <div id="SimilarProductSlider">

            @foreach($similarProducts as $p)
            <div class="item">
                <?php ProductsController::displayProductElement($p); ?>
            </div>
            <!--/.item-->
            @endforeach

        </div>

    </div>
    <!--/.recommended-->

    <div style="clear:both"></div>
    @endif


    <!-- Linked Products -->
    @if($linkedProducts)
    <div class="section-hero row recommended">

        <div class="about-content-text text-center row">
            <h3>linked items</h3>
        </div>

        <div id="LinkedProductSlider">

            @foreach($linkedProducts as $prod)
            <div class="item">
                <?php ProductsController::displayProductElement($prod); ?>
            </div>
            <!--/.item-->
            @endforeach

        </div>

    </div>
    <!--/.recommended-->

    <div style="clear:both"></div>    
    @endif

</div>

<div class="gap"></div>

<!-- Modal after add to cart start -->
@include('frontend.products.includes.modal-add-to-cart') 

<script src="/js/jquery/jquery-2.1.3.min.js"></script>
<!-- JS to manage dynamically the selection of attributes, variants and prices of the product -->

<script type="text/javascript">
    var product_id = <?=json_encode($product[0]->product_id);?>;
    //List of attributes of the product
    var attributes = <?=json_encode($attributes);?>;

    $( "#order_qty" ).keyup(function() {
      $('#add_to_cart').attr('qty', this.value);
    });

    function restrictMinus(e) {
        var inputKeyCode = e.keyCode ? e.keyCode : e.which;

        if (inputKeyCode != null) {
            if (inputKeyCode == 45) e.preventDefault();
        }
    }

</script>

<script src="/js/products/product-details-attribute-selection.js"></script>
<script src="/js/products/product-details-add-to-cart.js"></script>


@endsection