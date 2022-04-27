<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/connect.min.js') }}"></script>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 4000);
    });
</script>

@stack('script')