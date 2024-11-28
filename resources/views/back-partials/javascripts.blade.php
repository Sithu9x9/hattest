<script src="{{ url('admin/js') }}/jquery-1.11.3.min.js"></script>
<script src="{{ url('admin/js') }}/jquery.dataTables.min.js"></script>
<script src="{{ url('admin/js') }}/dataTables.buttons.min.js"></script>
<script src="{{ url('admin/js') }}/buttons.flash.min.js"></script>
<script src="{{ url('admin/js') }}/jszip.min.js"></script>
<script src="{{ url('admin/js') }}/pdfmake.min.js"></script>
<script src="{{ url('admin/js') }}/vfs_fonts.js"></script>
<script src="{{ url('admin/js') }}/buttons.html5.min.js"></script>
<script src="{{ url('admin/js') }}/buttons.print.min.js"></script>
<script src="{{ url('admin/js') }}/buttons.colVis.min.js"></script>
<script src="{{ url('admin/js') }}/dataTables.select.min.js"></script>
<script src="{{ url('admin/js') }}/jquery-ui.min.js"></script>
<script src="{{ url('admin/adminlte/js') }}/bootstrap.min.js"></script>
<script src="{{ url('admin/adminlte/js') }}/select2.full.min.js"></script>
<script src="{{ url('admin/adminlte/js') }}/jquery.table2excel.js"></script>
<script src="{{ url('admin/adminlte/js') }}/main.js"></script>
<script src="{{ url('admin/adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('admin/adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ url('admin/adminlte/js/app.min.js') }}"></script>
<script src="{{ url('admin/js') }}/jquery.printPage.js"></script>
<script src="{{ url('admin/js') }}/moment.min.js"></script>
<script src="{{ url('admin/js') }}/daterangepicker.min.js"></script>
<script>
    window._token = '{{ csrf_token() }}';
</script>
<!-- jQuery
    ====================================================================== -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
<script src="{{ asset('summernote-0.8.18-dist/summernote-bs4.min.js') }}"></script>
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="{{asset('admin/plugin/fine-uploader/jquery.fine-uploader.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $(".se-pre-con").hide();
    })
</script>
@yield('javascript')
