<?php use App\Http\Controllers\CategoryController;?>

@extends('cms.layouts.app')

@section('content')


{!! Form::open() !!} {!! Form::close() !!}
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-4">
    <h2>Products Management</h2>
    <ol class="breadcrumb active">
      <li>
          <strong><a href="">Create and Manage Your Products</a></strong>
      </li>
    </ol>
  </div>
  <div class="col-lg-8">
    <div class="title-action">
      <a href="{{ route('cms_create_products') }}" class="btn btn-primary">Add Product</a>
    </div>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Products</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="client_table" class="footable table table-striped table-hover toggle-arrow-tiny default footable-loaded" >
              <thead>
                <tr>
                  <th>Publish</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Min. Stock</th>
                  <th>Featured</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/cms/js/custom_functions.js"></script>
<script type="text/javascript">

//SCRIPT LOADING THE PRODUCT LIST ON THE SERVER SIDE
$(document).ready(function(){
    var s3_url = <?=json_encode(getenv('S3_URL')) ?>;
    var product_details_route = '{{ route("cms_product_details_path", ":product_id") }}';

    $('#client_table').DataTable({
   ordering: true,
  paging: true,
  dom: '<"html5buttons"B>lTfgitp',
       lengthMenu: [[100 , 50, 25], [100, 50, 25]],
       buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ProductsList'},
                {extend: 'pdf', title: 'ProductsList'},
                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ],
    
       ajax: {
           url: '/load-product-table',
           type: 'POST',
           headers: { 'X-CSRF-Token': $('input[name=_token]').val() }
       },
       columns: [
               { data: "hidden",
                     render: function (data, type, row)
                     {
                       if(row.hidden == 0)
                        checked = 'checked';
                       else
                        checked = '';

                       return `<div class="controls">
                                <div class="switch">
                                  <div class="onoffswitch">
                                    <input type="checkbox" onclick="ajaxPublish(`+ row.product_id +`)" class="onoffswitch-checkbox" id="sales`+ row.product_id +`" name="sales`+ row.product_id +`" data-toggle="collapse" data-target="#demo" value="1"`+ checked +`>
                                    <label class="onoffswitch-label" for="sales`+row.product_id+`">
                                      <span class="onoffswitch-inner"></span>
                                      <span class="onoffswitch-switch"></span>
                                    </label>
                                  </div>
                                </div>
                              </div>`;
                     }  
                    },
               { data: "prod_name",
                 render: function (data, type, row)
                 {
                   return '<img src="'+ s3_url +'/products/thumbs/'+ row.primary_img +'" width="50" style="border-radius:10px; margin-right:5px; ">  <a href="'+ product_details_route.replace(':product_id', row.product_id) +'">'+ row.prod_name +'</a>';
                 }
               },
               { data: "min_price",
                 render: function (data, type, row)
                 {         
                    if (row.sales_price == null)
                    {
                        if(row.min_price == row.max_price)
                          return '$'+row.min_price;
                        else
                          return '$'+row.min_price+' - $'+ row.max_price;
                    }
                    else
                    {
                        if(row.min_price == row.max_price)
                            return '$'+row.sales_price+'  <span class="label label-warning b_radius" style="margin-left:5px">On Sale</span>';
                        else
                            return '$'+row.min_price+' - $'+ row.max_price+'  <span class="label label-warning b_radius" style="margin-left:5px">On Sale</span>';
                    }                  
                 }
                },
               { data: "cat_name",
                 render: function (data, type, row)
                 {
                  cat_list = '';
                  if(row.cat_name != null)
                  {
                    categ = row.cat_name.split(',');
                  
                   categ.forEach(function(entry) {
                        cat_list = cat_list + '<span class="label label-success b_radius">'+entry+'</span> '
                    });
                  }
                   
                   return cat_list;
                 }        
               },
               { data: "brand"},
               { data: "min_stock_qty",
                 render: function (data, type, row)
                 {
                    //If we do not manage the stock
                    if(row.enable_stock_mgmt == 0)
                    {
                      //If the minimum stock status of all variant is 0. This means there is at least 1 variant that is out of stock. So we return out of stock.
                      if(row.stock_status_id == 0)
                        return '<span class="label label-danger b_radius">Danger</span>';
                      //If the minimum stock status of all variant is 1. All the variants are in stock.
                      else
                        return '<span class="label label-primary b_radius">In stock</span>';
                    }
                    // IF we manage the stock qty
                    else
                      // If the quantity of one variant at least is equal to 0 we return out of stock.
                      if(row.min_stock_qty == 0)
                        return '<span class="label label-danger b_radius">Danger</span>';
                      // If at least one variant has less than 10 items remaining
                      else if(row.min_stock_qty < 10)
                        return '<span class="label label-warning b_radius">Low stock</span>';
                      // If all variants have more than 10 items
                      else
                        return '<span class="label label-primary b_radius">In stock</span>';
                 }
               },
               { data: "featured",
                 render: function (data, type, row)
                 {
                   if(row.featured == 1)
                        checked = 'checked';
                       else
                        checked = '';

                       return `<div class="controls">
                                <div class="switch">
                                  <div class="onoffswitch">
                                    <input type="checkbox" onclick="ajaxFeatured(`+ row.product_id +`)" class="onoffswitch-checkbox" id="featured`+ row.product_id +`" name="featured`+ row.product_id +`" data-toggle="collapse" data-target="#demo" value="1"`+ checked +`>
                                    <label class="onoffswitch-label" for="featured`+row.product_id+`">
                                      <span class="onoffswitch-inner"></span>
                                      <span class="onoffswitch-switch"></span>
                                    </label>
                                  </div>
                                </div>
                              </div>`;
                 }
               },
               { data: "product_id",
                 render: function (data, type, row)
                 {
                   return '<button type="button" id=' + data + ' class="edit_btn delete_product" title="Delete product"><i class="fa fa-trash fa-lg"></i></button>';
                 }
               },
           ],
   });

    // ================== ladda loader for add ==================
    loadLadda('submit_add');

    // ================== ladda loader for edit =================
    loadLadda('submit_edit');

    // ==================== DELETE Product  =====================
    ajaxDeleteRefresh('.delete_product', 'delete-product');


});
</script>

<!-- Script to publish or unpublish the product in AJAX -->
<script src="/cms/js/products/product-details-ajax-publish-status.js"></script>
<!-- Script to publish or unpublish the product in AJAX -->
<script src="/cms/js/products/ajax-featured-products.js"></script>

@endsection
