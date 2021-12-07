@section('footer')

    <!--/ footer Star /-->
    <section class="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">
                                @if($settingData){{$settingData->company_name}} @endif
                            </h3>
                        </div>
                        <div class="w-body-a">
                            <p class="w-text-a color-text-a">
                                @if($settingData){!!  $settingData->description !!} @endif
                            </p>
                        </div>
                        <div class="w-footer-a">
                            <ul class="list-unstyled">
                                <li class="color-a">
                                    <span class="color-text-a">Phone .</span>
                                    @if($settingData){{$settingData->company_phone}} @endif

                                </li>
                                <li class="color-a">
                                    <span class="color-text-a">Email .</span>

                                    @if($settingData){{$settingData->company_email}} @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 section-md-t3">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">The Company</h3>
                        </div>
                        <div class="w-body-a">
                            <div class="w-body-a">
                                <ul class="list-unstyled">
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="{{route('contact')}}">Site Map</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="{{route('service')}}">Service</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="{{route('about')}}">About us</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 section-md-t3">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">International sites</h3>
                        </div>
                        <div class="w-body-a">
                            <ul class="list-unstyled">
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> <a href="#">US</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="nav-footer">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{route('about')}}">About</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{route('property')}}">Property</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{route('blogs')}}">Blog</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            &copy; Copyright
                            <span class="color-a">
                                @if($settingData){{$settingData->company_name}} @endif
                            </span> All Rights Reserved.
                        </p>
                    </div>
                    <div class="credits">

                        Designed by <a
                            href="{{route('index')}}">@if($settingData){{$settingData->company_name}} @endif</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ Footer End /-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{url('frontend-assets/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{url('frontend-assets/lib/jquery/jquery-migrate.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

    <script src="{{url('frontend-assets/lib/popper/popper.min.js')}}"></script>
    <script src="{{url('frontend-assets/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('frontend-assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{url('frontend-assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{url('frontend-assets/lib/scrollreveal/scrollreveal.min.js')}}"></script>
    <!-- Contact Form JavaScript File -->
    <script src="{{url('frontend-assets/contactform/contactform.js')}}"></script>

    <script>
        var botmanWidget = {
            title: "Happy Dwell Real Estate",
            aboutText: "Happy Dwell Real Estate",
            introMessage: "Hi ! hwo can I help you?",

        };
    </script>

    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <!-- Template Main Javascript File -->
    <script src="{{url('frontend-assets/js/main.js')}}"></script>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0"
            nonce="IQc67Yn5"></script>

    <script>
        $(document).ready(function (){
            $("#input-id").rating();
        });
        $(function() {
            $('#themes').change(function() {
                this.form.submit();
            });
        });
    </script>



    </body>
    </html>

@endsection
