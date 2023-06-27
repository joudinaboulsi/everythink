@extends('frontend.layouts.app')

@section('content')

@if(Session::has('msg'))
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-xs modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h2 class="text-center" style="position:relative; top:8px;">{!!Session::get('msg')!!}</h2>
            </div>

            <div class="modal-body">
                <p>Your message is sent. We will get back to you within 24h.</p>
            </div>

        </div>

    </div>
</div>
@endif

<!-- Page Content  -->
<div class="blog-wrapper headerOffset">
    <div class="container">
        <div class="row">
            <div class="blog-left">
                <div class="bl-inner">
                    <div class="item-blog-post">

                        <div class="about-content-text text-center">
                            <h3>Careers</h3>
                        </div>

                        <div class="post-main-view">

                            <div class="post-description wow fadeIn" data-wow-duration="0.2s" data-wow-delay=".1s">

                                <div class="row">

                                    <!-- Sidebar  -->
                                    <div class="col-sm-6">
                                        
                                        <div class="panel-group" role="tablist" aria-multiselectable="true">

                                            <!-- Position 1  -->
                                            <div class="panel panel-default">

                                                <div class="panel-heading" role="tab" id="headingOne">
                                                  <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        Sales Executive (Field-Based)
                                                    </a>
                                                  </h4>
                                                </div>

                                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                  <div class="panel-body">
                                                    <p>We are looking for a dynamic Sales Executive with proven sales results to join our existing sales team.</p>
                                                    <b>Principal Duties and Responsibilities:</b>
                                                    <ul>
                                                        <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Perform sales and meet targets</li>
                                                        <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Maintain a high-quality service by following company standards</li>
                                                        <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Follow standard operating procedures</li>
                                                        <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Follow all standards set for appearance, behavior in order to maintain the brand image</li>
                                                        <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Attend training and use the new knowledge and skills to achieve sales</li>
                                                        <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Maintain an updated knowledge of the market</li>
                                                        <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Provide a memorable customer experience</li>
                                                        <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Refer any issues related to products and customers to the sales manager</li>
                                                        <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Cooperate with colleagues and display a team spirit</li>
                                                    </ul>
                                                    <br>
                                                    <b>Requirements</b>
                                                    <ul>
                                                        <li>Industry Skills:
                                                            <ul>
                                                                <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Ideal business background would include: Experience in the Hair, Beauty & Cosmetics Industry</li>
                                                            </ul>
                                                        </li>
                                                        <li>Past Experience and Education
                                                            <ul>
                                                                <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; 1+ years of experience in face-to-face sales</li>
                                                                <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Knowledge of the Middle Eastern market</li>
                                                            </ul>
                                                        </li>
                                                        <li>Candidate Profile:
                                                            <ul>
                                                                <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; FEMALE with UAE Experience in Sales & Training</li>
                                                                <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Results driven to meet Sales Targets</li>
                                                                <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Generate potential clients and increase customer database</li>
                                                                <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Increase the distribution of the brands in the company’s portfolio by presenting and selling the company’s products to current and potential clients</li>
                                                                <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Knowledge in hair treatment and beauty tools</li>
                                                                <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Outgoing, friendly and exceptional at building rapport</li>
                                                                <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Excellent presentation & communication skills</li>
                                                                <li>&nbsp; &nbsp; <i class="fa fa-check"></i>&nbsp; Car owner with valid UAE Driving License</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <br>
                                                    <p>Successful candidates will be given basic salary + commission & other benefits.</p>
                                                    <p>Please send your CV accompanied by a recent photograph of yourself.</p>
                                                    <p>Only Shortlisted Candidates will be contacted.</p>
                                                  </div>
                                                </div>

                                            </div>
                                            <!-- End Position 1  -->

                                            <!-- Position 2  -->
                                            <div class="panel panel-default">

                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                  <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                      Collapsible Group Item #2
                                                    </a>
                                                  </h4>
                                                </div>

                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                  <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                  </div>
                                                </div>

                                            </div>
                                            <!-- End Position 2  -->

                                        </div>

                                    </div>
                                    <!-- End Sidebar  -->

                                    <!-- Form  -->
                                    <div class="col-sm-6 col-xs-12">

                                        <div class="panel panel-default ">

                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#collapse1" class="collapseWill"> Apply
                                                        <span class="pull-left"> <i class="fa fa-caret-right"></i></span>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse1" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    {!! Form::open(array('route' => 'careers_path', 'class' => 'form-horizontal', 'id' => 'contactform')) !!}
                                                        <fieldset>

                                                            <legend>Fill in the form to apply for a vacancy</legend>

                                                            <!-- Full Name -->
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="fullname">Full Name <sup>*</sup></label>

                                                                <div class="col-md-9">
                                                                    <input id="fullname" name="fullname" placeholder="Full Name" class="form-control required show-error-msg input-md" type="text">
                                                                </div>
                                                            </div>

                                                            <!-- Date of Birth -->
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="dob">Date of Birth <sup>*</sup></label>

                                                                <div class="col-md-9">
                                                                    <input id="dob" name="dob" class="form-control required show-error-msg input-md" type="date">
                                                                </div>
                                                            </div>

                                                            <!-- Position -->
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="position">Position <sup>*</sup></label>

                                                                <div class="col-md-9">
                                                                    <select id="position" name="position" class="form-control required show-error-msg input-md">
                                                                        <option value="Sales Executive (Field-Based)">Sales Executive (Field-Based)</option>
                                                                        <option value="Collapsible Group Item #2">Collapsible Group Item #2</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <!-- Phone -->
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="phone">Phone</label>

                                                                <div class="col-md-9">
                                                                    <input id="phone" name="phone" placeholder="Phone" class="form-control show-error-msg input-md" type="text">
                                                                </div>
                                                            </div>

                                                            <!-- Salary -->
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="salary">Salary</label>

                                                                <div class="col-md-9">
                                                                    <input id="salary" name="salary" placeholder="Salary" class="form-control show-error-msg input-md" type="text">
                                                                </div>
                                                            </div>

                                                            <!-- Mail -->
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="email">Mail <sup>*</sup></label>

                                                                <div class="col-md-9">
                                                                    <input id="email" name="email" placeholder="Mail" class="form-control required show-error-msg input-md" type="email">
                                                                </div>
                                                            </div>

                                                            <!-- Photo -->
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="photo">Photo</label>

                                                                <div class="col-md-9">
                                                                    <input id="photo" name="photo" class="form-control show-error-msg input-md" type="file">
                                                                </div>
                                                            </div>

                                                            <!-- CV -->
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="cv">CV <sup>*</sup></label>

                                                                <div class="col-md-9">
                                                                    <input id="cv" name="cv" class="form-control required show-error-msg input-md" type="file">
                                                                </div>
                                                            </div>

                                                            <!-- Experience -->
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="message">Experience</label>

                                                                <div class="col-md-9">
                                                                    <textarea class="form-control show-error-msg" id="message" name="message" rows="5" placeholder="Experience"></textarea>
                                                                </div>
                                                            </div>

                                                            <!-- Submit button -->
                                                            <div class="form-group">
                                                                <div class="text-center">
                                                                    <!-- recaptcha -->
                                                                    <div class="g-recaptcha" data-sitekey="{{env('NOCAPTCHA_SITEKEY')}}" data-size="invisible" data-callback="setResponse"></div>
                                                                    <input type="hidden" id="captcha-response" name="captcha-response" />
                                                                    <button type="submit" id="submit" class="btn btn-stroke-dark thin lite">Submit</button>
                                                                </div>
                                                            </div>

                                                        </fieldset>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- End Form  -->

                                </div>

                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="clear:both"></div>

</div>
<!-- End Page Content  -->

<div class="gap"></div>

<script src="js/jquery.validate.min.js"></script>

<script type="text/javascript">

    $("#contactform").validate({
        ignore: ".ignore",
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                minlength: 6,
            },
            location: {
                required: true
            },
            message: {
                minlength: 3
            }
        }
    });

</script>

@endsection