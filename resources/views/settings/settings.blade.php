@extends('layouts.app')
@section('title', 'My settings')
@section('content')
    <div class="d-flex gap-2 justify-content-end mb-4">
        <button type="button" class="btn btn-success mr-5" data-bs-toggle="modal" data-bs-target="#add-setting-modal">Add</button>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-user-td">User trading
            data</button>
    </div>
    <div class="scrollbar1 srollable-div container" id="srollable-div-set">
        <div class="session-result">
            @if (Session::has('success'))
                <div class="alert alert-success d-flex align-items-center alertDiv alert-dismissible fade show"
                    role="alert">
                    <div>
                        <i class="fa-solid fa-circle-check"></i>
                        {{ Session::get('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @elseif (Session::has('error'))
                <div class="alert alert-danger d-flex align-items-center alertDiv alert-dismissible fade show"
                    role="alert">
                    <div>
                        <i class="fa-solid fa-bug"></i>
                        {{ Session::get('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
        </div>
        @foreach ($trd_settings->chunk(3) as $index => $trd_settings_chunk)
            <div class="row">
                @foreach ($trd_settings_chunk as $trd_setting)
                    <div class="col-4">
                        <div class="card">
                            <div class="row card-body">
                                <h5 class="col card-title text-center mb-4">
                                    Trading setting: <span class="text-primary">{{ $trd_setting->id_ts }}</span>
                                </h5>

                                <div class="col d-flex justify-content-end gap-2">
                                    <form id="tdsetting-destroy-form" class=""
                                        action="{{ route('mysettings.destroy', $trd_setting->id_ts) }}" method="POST"
                                        data-id_ts_del="{{ $trd_setting->id_ts }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger delete_sett_btn"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <div>
                                        <a class="col" id="update-sett-btn" href="javascript:void(0)"
                                        data-id_ts="{{ $trd_setting->id_ts }}"
                                        data-ts_sell_step_p="{{ $trd_setting->ts_sell_step_p }}"
                                        data-ts_balance_buy_amt_p="{{ $trd_setting->ts_balance_buy_amt_p }}"
                                        data-ts_profit_sell_amt_p="{{ $trd_setting->ts_profit_sell_amt_p }}"
                                        data-ts_dca_buy_step_p_chain="{{ $trd_setting->ts_dca_buy_step_p_chain }}"
                                        data-ts_bps_sell_retracement_p="{{ $trd_setting->ts_bps_sell_retracement_p }}"
                                        data-ts_isbpsactive="{{ $trd_setting->ts_isbpsactive }}"
                                        data-ts_buy_amt_mltp_chain="{{ $trd_setting->ts_buy_amt_mltp_chain }}"
                                        data-ts_cover_buy_step_p="{{ $trd_setting->ts_cover_buy_step_p }}"
                                        data-ts_cover_balance_buy_amt_p="{{ $trd_setting->ts_cover_balance_buy_amt_p }}"
                                        data-ts_max_dca_step="{{ $trd_setting->ts_max_dca_step }}"
                                        data-ts_bps_buy_retracement_p="{{ $trd_setting->ts_bps_buy_retracement_p }}"
                                        data-ts_cover_profit_sell_amt_p="{{ $trd_setting->ts_cover_profit_sell_amt_p }}">
                                            <button type="button" class="btn btn-success" ><i
                                                    class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    {{-- add setting modal start --}}
    @include('settings.add')
    {{-- add setting modal end --}}

    {{-- edit bot modal start --}}
    @include('settings.edit')
    {{-- edit bot modal end --}}
@endsection
