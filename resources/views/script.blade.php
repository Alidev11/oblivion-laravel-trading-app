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

        // ------------------------------------------------------- Bot CRUD -------------------------------------------------------
        // add bot script
        $('#bot-add-form').submit(function(e) {
            e.preventDefault();

            // Show overlay and spinner
            $('#overlay').show();
            $('#spinner').show();

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

                        // Hide overlay and spinner
                        $('#overlay').hide();
                        $('#spinner').hide();
                    } else {
                        alert('An error occurred: ' + res.error); // Display error message

                        // Hide overlay and spinner
                        $('#overlay').hide();
                        $('#spinner').hide();
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error); // Display error message

                    // Hide overlay and spinner
                    $('#overlay').hide();
                    $('#spinner').hide();
                }
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
            // Show overlay and spinner
            $('#overlay').show();
            $('#spinner').show();
            var formdata = new FormData(this);
            var id_mi = $('.id_mi').val();
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

                        // Hide overlay and spinner
                        $('#overlay').hide();
                        $('#spinner').hide();
                    } else {
                        alert('An error occurred: ' + res.error);

                        // Hide overlay and spinner
                        $('#overlay').hide();
                        $('#spinner').hide();
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);

                    // Hide overlay and spinner
                    $('#overlay').hide();
                    $('#spinner').hide();
                }
            });
        });

        // delete bot
        $(document).on('click', '.delete_bot_btn', function(e) {
            e.preventDefault();

            // Show overlay and spinner
            $('#overlay').show();
            $('#spinner').show();
            var id_mi = $(this).closest('form').data('id_mi_del');
            if (confirm('Are you sure to delete the bot?')) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('mybots.destroy', ':id') }}".replace(':id', id_mi),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            var tempContainer = $('<div></div>').load(location.href +
                                ' #scrolablle-div',
                                function() {
                                    // Replace the content of the scrollable div with the content from the temporary container
                                    $('#scrolablle-div').html(tempContainer.find(
                                            '#scrolablle-div')
                                        .html());
                                });
                            // Hide overlay and spinner
                            $('#overlay').hide();
                            $('#spinner').hide();
                        } else {
                            alert('An error occurred: ' + res
                                .error);
                            // Hide overlay and spinner
                            $('#overlay').hide();
                            $('#spinner').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                        // Hide overlay and spinner
                        $('#overlay').hide();
                        $('#spinner').hide();
                    }

                });
            } else {
                $('#overlay').hide();
                $('#spinner').hide();
            }
        });



        // ---------------------------------------------------- Settings CRUD -----------------------------------------------------

        // add settings script
        $('#setting-add-form').submit(function(e) {
            e.preventDefault();

            // Show overlay and spinner
            $('#overlay').show();
            $('#spinner').show();

            var formdata = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('mysettings.store') }}",
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status == 'success') {
                        $('#add-setting-modal').modal('hide');
                        $('#setting-add-form')[0].reset();
                        // Load the content into a temporary container
                        var tempContainer = $('<div></div>').load(location.href +
                            ' #srollable-div-set',
                            function() {
                                // Replace the content of the scrollable div with the content from the temporary container
                                $('#srollable-div-set').html(tempContainer.find(
                                        '#srollable-div-set')
                                    .html());
                            });

                        // Hide overlay and spinner
                        $('#overlay').hide();
                        $('#spinner').hide();
                    } else {
                        alert('An error occurred: ' + res.error); // Display error message

                        // Hide overlay and spinner
                        $('#overlay').hide();
                        $('#spinner').hide();
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error); // Display error message

                    // Hide overlay and spinner
                    $('#overlay').hide();
                    $('#spinner').hide();
                }
            });
        });

        // edit bot script
        $(document).on('click', '#update-sett-btn', function() {

            var ts_sell_step_p = $(this).data('ts_sell_step_p');
            var ts_balance_buy_amt_p = $(this).data('ts_balance_buy_amt_p');
            var ts_profit_sell_amt_p = $(this).data('ts_profit_sell_amt_p');
            var ts_dca_buy_step_p_chain = $(this).data('ts_dca_buy_step_p_chain');
            var ts_buy_amt_mltp_chain = $(this).data('ts_buy_amt_mltp_chain');
            var ts_bps_sell_retracement_p = $(this).data('ts_bps_sell_retracement_p');
            var ts_isbpsactive = $(this).data('ts_isbpsactive');
            var ts_cover_buy_step_p = $(this).data('ts_cover_buy_step_p');
            var ts_cover_balance_buy_amt_p = $(this).data('ts_cover_balance_buy_amt_p');
            var ts_max_dca_step = $(this).data('ts_max_dca_step');
            var ts_bps_buy_retracement_p = $(this).data('ts_bps_buy_retracement_p');
            var ts_cover_profit_sell_amt_p = $(this).data('ts_cover_profit_sell_amt_p');
            var id_ts = $(this).data('id_ts');

            $("#edit-sett-container").slideDown();
            setTimeout(function() {
                $("html, body").animate({
                    scrollTop: $("#edit-sett-container").offset().top
                });
            }, 2);

            $('.id_ts').val(id_ts);
            $('.ts_sell_step_p').val(ts_sell_step_p);
            $('.ts_balance_buy_amt_p').val(ts_balance_buy_amt_p);
            $('.ts_profit_sell_amt_p').val(ts_profit_sell_amt_p);
            $('.ts_dca_buy_step_p_chain').val(ts_dca_buy_step_p_chain);
            $('.ts_buy_amt_mltp_chain').val(ts_buy_amt_mltp_chain);
            $('.ts_bps_sell_retracement_p').val(ts_bps_sell_retracement_p);
            $('.ts_isbpsactive').val(ts_isbpsactive);
            $('.ts_cover_buy_step_p').val(ts_cover_buy_step_p);
            $('.ts_cover_balance_buy_amt_p').val(ts_cover_balance_buy_amt_p);
            $('.ts_max_dca_step').val(ts_max_dca_step);
            $('.ts_bps_buy_retracement_p').val(ts_bps_buy_retracement_p);
            $('.ts_cover_profit_sell_amt_p').val(ts_cover_profit_sell_amt_p);
        });

        $('#edit-sett-form').submit(function(e) {
            e.preventDefault();
            // Show overlay and spinner
            $('#overlay').show();
            $('#spinner').show();
            var formdata = new FormData(this);
            var id_ts = $('.id_ts').val();
            $.ajax({
                type: 'POST',
                url: "{{ route('mysettings.update', ':id') }}".replace(':id', id_ts),
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status == 'success') {
                        $("#edit-sett-container").slideUp();
                        $('#edit-sett-form')[0].reset();
                        // Load the content into a temporary container
                        var tempContainer = $('<div></div>').load(location.href +
                            ' #srollable-div-set',
                            function() {
                                // Replace the content of the scrollable div with the content from the temporary container
                                $('#srollable-div-set').html(tempContainer.find(
                                        '#srollable-div-set')
                                    .html());
                            });

                        // Hide overlay and spinner
                        $('#overlay').hide();
                        $('#spinner').hide();
                    } else {
                        alert('An error occurred: ' + res.error);
                        var tempContainer = $('<div></div>').load(location.href +
                            ' #srollable-div-set',
                            function() {
                                // Replace the content of the scrollable div with the content from the temporary container
                                $('#srollable-div-set').html(tempContainer.find(
                                        '#srollable-div-set')
                                    .html());
                            });
                        // Hide overlay and spinner
                        $('#overlay').hide();
                        $('#spinner').hide();
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                    var tempContainer = $('<div></div>').load(location.href +
                        ' #srollable-div-set',
                        function() {
                            // Replace the content of the scrollable div with the content from the temporary container
                            $('#srollable-div-set').html(tempContainer.find(
                                    '#srollable-div-set')
                                .html());
                        });
                    // Hide overlay and spinner
                    $('#overlay').hide();
                    $('#spinner').hide();
                }
            });
        });

        // delete bot
        $(document).on('click', '.delete_sett_btn', function(e) {
            e.preventDefault();

            // Show overlay and spinner
            $('#overlay').show();
            $('#spinner').show();
            var id_ts = $(this).closest('form').data('id_ts_del');
            if (confirm('Are you sure to delete the trading setting?')) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('mysettings.destroy', ':id') }}".replace(':id', id_ts),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            var tempContainer = $('<div></div>').load(location.href +
                                ' #srollable-div-set',
                                function() {
                                    // Replace the content of the scrollable div with the content from the temporary container
                                    $('#srollable-div-set').html(tempContainer.find(
                                            '#srollable-div-set')
                                        .html());
                                });
                            // Hide overlay and spinner
                            $('#overlay').hide();
                            $('#spinner').hide();
                        } else {
                            alert('An error occurred: ' + res
                                .error);
                            // Hide overlay and spinner
                            $('#overlay').hide();
                            $('#spinner').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                        // Hide overlay and spinner
                        $('#overlay').hide();
                        $('#spinner').hide();
                    }

                });
            } else {
                $('#overlay').hide();
                $('#spinner').hide();
            }
        });

    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Extracting data from JSON
        const data = [
            {
                "mi_libelle_market": "ETH/EUR",
                "mi_top_balance": 87
            },
            {
                "mi_libelle_market": "SOL-USDT",
                "mi_top_balance": 1221.479
            },
            {
                "mi_libelle_market": "BTC/EUR",
                "mi_top_balance": 52
            },
            {
                "mi_libelle_market": "ETH/USD",
                "mi_top_balance": 81
            }
        ];

        // Extracting labels and data
        const labels = data.map(entry => entry.mi_libelle_market);
        const balances = data.map(entry => entry.mi_top_balance);

        // Chart.js configuration
        const ctx = document.getElementById('balanceChart').getContext('2d');
        const balanceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Top Balance',
                    data: balances,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
