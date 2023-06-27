<!-- Footer -->
<!-- Footer -->
<footer class="footer-content" style="background: url(/images/plastic.png);">
    <div class="container">

        <div class="row section-block">
            <div class="footer-col">
                <a href="/"><img src="/images/logo.png" alt="Beirut Duty Free" width="200"> </a>  
            </div>
        </div> 

        <div class="row section-block">

            <div class="footer-col">

                <ul class="list-unstyled list-inline footer-nav social-list footer-nav-inline">
                    <li>
                        <a href="https://www.instagram.com/everythink.me/" target="_blank" rel="noopener" title="Instagram" data-placement="top" data-toggle="tooltip">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/everythink.me" target="_blank" rel="noopener" title="Facebook" data-placement="top" data-toggle="tooltip">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@everythink.me" rel="noopener" title="Email" data-placement="top" data-toggle="tooltip">
                            <i class="fa fa-envelope"></i>
                        </a>
                    </li>
                </ul>

            </div>

        </div> 

        <div class="row section-block hidden-xs"> 

            <div class="footer-col col-sm-6 col-sm-push-3">
                <ul class="list-inline">
                    <li> <a href="https://goo.gl/maps/kAPAAABfERzV3BRv8" target="_blank"> Araya, Main Road </a></li>
                    <li> <a href="https://goo.gl/maps/MuZehAeZrQiKiF1g6" target="_blank"> Ashrafieh, ABC L1 </a></li>
                </ul>
            </div>

        </div>

        <div class="row section-block"> 

            <!-- Newsletter -->
            <div class="footer-col col-sm-6 col-sm-push-3">
                <!-- Begin Mailchimp Signup Form -->
                <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
                <style type="text/css">
                    #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
                    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                </style>
                <div id="mc_embed_signup">
                <form action="https://everythink.us11.list-manage.com/subscribe/post?u=6cbdb68298d1b780e76150716&amp;id=1f10e18008" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                    <label for="mce-EMAIL">NEWSLETTER SIGN UP</label>
                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6cbdb68298d1b780e76150716_1f10e18008" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </div>
                </form>
                </div>

                <!--End mc_embed_signup-->
            </div>
            <!-- End Newsletter -->

        </div>

    </div>

    <div class="container-fluid bg-black">

        <div class="container">

            <div class="copy-info">
                <div class="col-sm-9 col-xs-9">
                    <ul class="list-unstyled list-inline text-left text-xs-center">
                        <li class="{{ Route::currentRouteName() == 'faq_path' ? 'active' : '' }}"><a href="{{ route('faq_path') }}"> FAQ </a></li>
                        <li class="{{ Route::currentRouteName() == 'terms_path' ? 'active' : '' }}"><a href="{{ route('terms_path') }}"> Terms & Conditions </a></li>
                        <li class="{{ Route::currentRouteName() == 'privacy_path' ? 'active' : '' }}"><a href="{{ route('privacy_path') }}"> Privacy Policy </a></li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-3 text-right text-xs-center">
                    &copy; 2019 <a href="http://webneoo.com" target="_blank" rel="noopener">Webneoo</a>
                </div>
            </div>

        </div>
    </div>
    <!-- End Footer Final -->

</footer>