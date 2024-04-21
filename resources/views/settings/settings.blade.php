@extends('layouts.app')
@section('title', 'My settings')
@section('content')
    <div class="d-flex gap-2 justify-content-end mb-4">
        <button type="button" class="btn btn-success mr-5" data-bs-toggle="modal" data-bs-target="#add-setting">Add</button>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-user-td">User trading
            data</button>
    </div>
    <div class="scrollbar1 srollable-div container">
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
                                        action="{{ route('mysettings.destroy', $trd_setting->id_ts) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <div>
                                        <button type="button" class="btn btn-success"><i
                                                class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="modal fade" id="add-setting" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Add new setting</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <div class="modal-body">
                    <form action="{{ route('mysettings.store') }}" method="POST" id="setting-add-form">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label for="ts_sell_step_p" class="col-form-label">Sell step:</label>
                                <input type="number" type="number" class="form-control" id="ts_sell_step_p"
                                    name="ts_sell_step_p" placeholder="3">
                            </div>
                            <div class="col mb-3">
                                <label for="ts_balance_buy_amt_p" class="col-form-label">Balance buy amt:</label>
                                <input id="ts_balance_buy_amt_p" class="form-control" type="number"
                                    name="ts_balance_buy_amt_p" placeholder="2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="ts_profit_sell_amt_p" class="col-form-label">Profit sell:</label>
                                <input type="number" class="form-control" id="ts_profit_sell_amt_p"
                                    name="ts_profit_sell_amt_p" placeholder="100.00">
                            </div>
                            <div class="col mb-3">
                                <label for="ts_dca_buy_step_p_chain" class="col-form-label">Dca step:</label>
                                <input id="ts_dca_buy_step_p_chain" type="number" class="form-control"
                                    name="ts_dca_buy_step_p_chain" placeholder="Ex: 1">
                            </div>
                            <div class="col mb-3">
                                <label for="ts_buy_amt_mltp_chain" class="col-form-label">Buy amt mltp chain:</label>
                                <input id="ts_buy_amt_mltp_chain" type="number" class="form-control"
                                    name="ts_buy_amt_mltp_chain" placeholder="Ex: 1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="ts_bps_sell_retracement_p" class="col-form-label">Sell retracement:</label>
                                <input type="number" class="form-control" id="ts_bps_sell_retracement_p"
                                    name="ts_bps_sell_retracement_p" placeholder="Ex: bps">
                            </div>
                            <div class="col mb-3">
                                <label for="ts_isbpsactive" class="col-form-label">Is active:</label>
                                <select name="ts_isbpsactive" class="form-select" id="ts_isbpsactive">
                                    <option value="True">True</option>
                                    <option value="False">False</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="ts_cover_buy_step_p" class="col-form-label">Cover buy step:</label>
                                <input type="number" class="form-control" id="ts_cover_buy_step_p"
                                    name="ts_cover_buy_step_p" placeholder="Ex: libelle">
                            </div>
                            <div class="col mb-3">
                                <label for="ts_cover_balance_buy_amt_p" class="col-form-label">Cover balance buy:</label>
                                <input type="number" class="form-control" id="ts_cover_balance_buy_amt_p"
                                    name="ts_cover_balance_buy_amt_p" placeholder="Ex: libelle">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="ts_max_dca_step" class="col-form-label">Max dca step:</label>
                                <input type="number" class="form-control" id="ts_max_dca_step" name="ts_max_dca_step"
                                    placeholder="Ex: max dca step">
                            </div>
                            <div class="col mb-3">
                                <label for="ts_bps_buy_retracement_p" class="col-form-label">Bps buy retracement:</label>
                                <input type="number" class="form-control" id="ts_bps_buy_retracement_p"
                                    name="ts_bps_buy_retracement_p" placeholder="Ex: libelle">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="ts_cover_profit_sell_amt_p" class="col-form-label">Cover profit sell:</label>
                                <input type="number" class="form-control" id="ts_cover_profit_sell_amt_p"
                                    name="ts_cover_profit_sell_amt_p" placeholder="Ex: libelle">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Store</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
