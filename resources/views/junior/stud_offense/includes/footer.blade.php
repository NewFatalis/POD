<script>var resizefunc = [];</script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/detect.js') }}"></script>
<script src="{{ asset('assets/js/fastclick.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.app.js') }}"></script>
<!-- Modal-Effect -->
<script src="{{ asset('assets/plugins/modal-effect/js/classie.js') }}"></script>
<script src="{{ asset('assets/plugins/modal-effect/js/modalEffects.js') }}"></script>
<!-- Datatables-->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
{{-- <script src="{{ asset('assets/plugins/datatables/dataTables.fixedHeader.min.js') }}"></script> --}}
<script src="{{ asset('assets/plugins/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.scroller.min.js') }}"></script>
<!-- Datatable init js -->
<script src="{{ asset('assets/pages/datatables.init.js') }}"></script>
{{-- Multi Select --}}
<script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/plugins/toggles/toggles.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-multi-select/jquery.multi-select.js') }}"></script>

<script>
    jQuery(document).ready(function() {

        // Tags Input
        jQuery('#tags').tagsInput({width:'auto'});

        // Form Toggles
        jQuery('.toggle').toggles({on: true});

        //multiselect start
        $('#my_multi_select1').multiSelect();
        $('#my_multi_select2').multiSelect({
            selectableOptgroup: true
        });

        // Select2
        jQuery(".select2").select2({
            width: '100%'
        });


    });
</script>
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable( { keys: true } );
        $('#datatable-responsive').DataTable();
        $('#datatable-scroller').DataTable( { ajax: "{{ asset('assets/plugins/datatables/json/scroller-demo.json') }}", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
        var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
        $('[data-tooltip="tooltip"]').tooltip({trigger : 'hover'});
    });
    TableManageButtons.init();
</script>


