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

                $("input[name='demo1']").TouchSpin({
                    min: 0,
                    max: 100,
                    step: 0.1,
                    decimals: 2,
                    boostat: 5,
                    maxboostedstep: 10,
                    postfix: '%'
                });
                $("input[name='demo2']").TouchSpin({
                    min: -1000000000,
                    max: 1000000000,
                    stepinterval: 50,
                    maxboostedstep: 10000000,
                    prefix: '$'
                });
                $("input[name='demo3']").TouchSpin();
                $("input[name='demo3_21']").TouchSpin({
                    initval: 40
                });
                $("input[name='demo3_22']").TouchSpin({
                    initval: 40
                });

                $("input[name='demo0']").TouchSpin({});
            });
</script>



