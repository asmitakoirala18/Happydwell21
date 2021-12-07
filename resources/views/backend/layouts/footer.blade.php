@section('footer')
    <!-- footer content -->
    <footer>
        <div class="pull-right">
            <a href="{{route('company-backend')}}">Real Estate</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="{{url('backend-assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{url('backend-assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('backend-assets/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->

    <script src="{{url('backend-assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script
        src="{{url('backend-assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{url('backend-assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>

    <script src="{{url('backend-assets/vendors/nprogress/nprogress.js')}}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{url('backend-assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{url('backend-assets/vendors/google-code-prettify/src/prettify.js')}}"></script>

    <script type="text/javascript" src="{{url('backend-assets/tagsinput/src/bootstrap-tagsinput.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{url('backend-assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('backend-assets/build/js/custom.min.js')}}"></script>
    <script src="{{url('backend-assets/custom/custom.js')}}"></script>

    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert').hide('slow');
            }, 3000);
        });
    </script>

    </body>
    </html>
@endsection
