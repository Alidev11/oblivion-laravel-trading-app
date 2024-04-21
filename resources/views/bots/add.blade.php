<div class="modal fade" id="add-bot" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            {{-- <div class="modal-header">
                <div class="modal-title" id="exampleModalLabel">bot </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            {{-- <hr> --}}
            <div class="modal-body">
                <form action="javascript:void(0)" method="POST" id="bot-add-form">
                    @csrf
                    <div class="row">
                        <div class="col mb-3">
                            <label for="mi_allocated_balance" class="col-form-label">Assigned balance:</label>
                            <input id="mi_allocated_balance" class="form-control" type="number"
                                name="mi_allocated_balance" placeholder="100.00" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="mi_available_balance" class="col-form-label">Available balance:</label>
                            <input type="number" class="form-control" id="mi_available_balance"
                                name="mi_available_balance" placeholder="100.00" required>
                        </div>
                        <div class="col mb-3">
                            <label for="mi_dca_step" class="col-form-label">Dca step:</label>
                            <input id="mi_dca_step" type="number" class="form-control" name="mi_dca_step"
                                placeholder="Ex: 1" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="mi_mode" class="col-form-label">Mode:</label>
                            <input type="text" class="form-control" id="mi_mode" name="mi_mode"
                                placeholder="Ex: cycle" required>
                        </div>
                        <div class="col mb-3">
                            <label for="mi_is_active" class="col-form-label">Is active:</label>
                            <select name="mi_is_active" class="form-select" id="mi_is_active" required>
                                <option value="True">True</option>
                                <option value="False">False</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="mi_id_ts" class="col-form-label">Trading setting:</label>
                            <select name="mi_id_ts" class="form-select" id="mi_id_ts" required>
                                @foreach ($trd_settings as $setting)
                                    <option value="{{ $setting->id_ts }}">{{ $setting->id_ts }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="mi_libelle_market" class="col-form-label">Libelle:</label>
                            <input type="text" class="form-control" id="mi_libelle_market"
                                name="mi_libelle_market" placeholder="Ex: libelle" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="mi_base_coin" class="col-form-label">Base coin:</label>
                            <select name="mi_base_coin" class="form-select" id="mi_base_coin" required>
                                <option value="ETH">ETH</option>
                                <option value="BTC">BTC</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="mi_quote_coin" class="col-form-label">Quote coin:</label>
                            <select name="mi_quote_coin" class="form-select" id="mi_quote_coin" required>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="mi_id_platform" class="col-form-label">Platform:</label>
                            <select name="mi_id_platform" class="form-select" id="mi_id_platform" required>
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id_platform }}">{{ $platform->p_lib_platform }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="mi_allow_ew_pr" class="col-form-label">Allow er pr:</label>
                            <select name="mi_allow_ew_pr" class="form-select" id="mi_allow_ew_pr" required>
                                <option value="True">True</option>
                                <option value="False">False</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="mi_auto_compounding" class="col-form-label">Auto compounding:</label>
                            <select name="mi_auto_compounding" class="form-select" id="mi_auto_compounding" required>
                                <option value="True">True</option>
                                <option value="False">False</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Store</button>
                </form>
            </div>
        </div>
    </div>
</div>
