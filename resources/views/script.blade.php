<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@if (Route::currentRouteName() == 'home')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endif

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {

        // add bot script
        $('#bot-add-form').submit(function(e) {
            e.preventDefault();
            var formdata = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('mybots.store') }}",
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status == 'success') {
                        $('#add-bot').modal('hide');
                        $('#bot-add-form')[0].reset();
                        // Load the content into a temporary container
                        var tempContainer = $('<div></div>').load(location.href +
                            ' #scrolablle-div',
                            function() {
                                // Replace the content of the scrollable div with the content from the temporary container
                                $('#scrolablle-div').html(tempContainer.find(
                                        '#scrolablle-div')
                                    .html());
                            });
                    }
                },
                error: function(data) {}
            });
        });

        // edit bot script
        $(document).on('click', '#update-bot-btn', function() {
            var mi_allocated_balance = $(this).data('mi_allocated_balance');
            var mi_available_balance = $(this).data('mi_available_balance');
            var mi_dca_step = $(this).data('mi_dca_step');
            var mi_mode = $(this).data('mi_mode');
            var mi_libelle_market = $(this).data('mi_libelle_market');
            var id_mi = $(this).data('id_mi');

            $("#edit-bot-container").slideDown();
            setTimeout(function() {
                $("html, body").animate({
                    scrollTop: $("#edit-bot-container").offset().top
                });
            }, 2);
            $('.id_mi').val(id_mi);
            $('.mi_allocated_balance').val(mi_allocated_balance);
            $('.mi_available_balance').val(mi_available_balance);
            $('.mi_dca_step').val(mi_dca_step);
            $('.mi_mode').val(mi_mode);
            $('.mi_libelle_market').val(mi_libelle_market);
        });

        $('#edit-bot-form').submit(function(e) {
            e.preventDefault();
            var formdata = new FormData(this);
            var id_mi = $('.id_mi').val();
            console.log(id_mi);
            $.ajax({
                type: 'POST',
                url: "{{ route('mybots.update', ':id') }}".replace(':id', id_mi),
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status == 'success') {
                        $("#edit-bot-container").slideUp();
                        $('#edit-bot-form')[0].reset();
                        // Load the content into a temporary container
                        var tempContainer = $('<div></div>').load(location.href +
                            ' #scrolablle-div',
                            function() {
                                // Replace the content of the scrollable div with the content from the temporary container
                                $('#scrolablle-div').html(tempContainer.find(
                                        '#scrolablle-div')
                                    .html());
                            });
                    }
                },
                error: function(data) {}
            });
        });

        // delete bot
        $('#bot-destroy-form').submit(function(e) {
            e.preventDefault();
            var id_mi = $(this).data('id_mi');
            console.log(id_mi);
            $.ajax({
                method: 'DELETE',
                url: "{{ route('mybots.destroy', ':id') }}".replace(':id', id_mi),
                data: id_mi,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status == 'success') {
                        // Load the content into a temporary container
                        var tempContainer = $('<div></div>').load(location.href +
                            ' #scrolablle-div',
                            function() {
                                // Replace the content of the scrollable div with the content from the temporary container
                                $('#scrolablle-div').html(tempContainer.find(
                                        '#scrolablle-div')
                                    .html());
                            });
                    }
                },
                error: function(data) {}
            });
        });
    });
</script>
