<div class="container mt-5 bg-light p-4 rounded border border-1 shadow-sm " id="edit-bot-container" style="display: none;">

    <h3 class="text-primary">Edit bot informations</h3>
    <hr>

    <form action="javascript:void(0)" method="POST" id="edit-bot-form" class="text-dark">
        @csrf
        @method('PUT')
        <div class="row">
            <input type="hidden" name="id_mi" value="" class="id_mi">
            <div class="col mb-3">
                <label for="mi_allocated_balance" class="col-form-label">Assigned balance:</label>
                <input id="mi_allocated_balance" class="mi_allocated_balance form-control bg-white" type="text"
                    name="mi_allocated_balance" value="">
            </div>
            <div class="col mb-3">
                <label for="mi_id_platform" class="col-form-label">Platform:</label>
                <select name="mi_id_platform" class="form-select bg-white" id="mi_id_platform">
                    @foreach ($platforms as $platform)
                        <option value="{{ $platform->id_platform }}">{{ $platform->p_lib_platform }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-3">
                <label for="mi_available_balance" class="col-form-label">Available balance:</label>
                <input type="text" class="mi_available_balance form-control bg-white" id="mi_available_balance"
                    name="mi_available_balance" placeholder="100.00" value="" step="1">
            </div>
        </div>
        <div class="row">

            <div class="col mb-3">
                <label for="mi_dca_step" class="col-form-label">Dca step:</label>
                <input id="mi_dca_step" type="text" class="mi_dca_step form-control bg-white" name="mi_dca_step"
                    placeholder="Ex: 1" value="">
            </div>
            <div class="col mb-3">
                <label for="mi_mode" class="col-form-label">Mode:</label>
                <input type="text" class="mi_mode form-control bg-white" id="mi_mode" name="mi_mode"
                    placeholder="Ex: cycle" value="">
            </div>
            <div class="col mb-3">
                <label for="mi_is_active" class="col-form-label">Is active:</label>
                <select name="mi_is_active" class="form-select bg-white" id="mi_is_active">
                    <option value="True">True</option>
                    <option value="False">False</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="mi_id_ts" class="col-form-label">Trading setting:</label>
                <select name="mi_id_ts" class="form-select bg-white" id="mi_id_ts">
                    @foreach ($trd_settings as $setting)
                        <option value="{{ $setting->id_ts }}">{{ $setting->id_ts }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-3">
                <label for="mi_libelle_market" class="col-form-label">Libelle market:</label>
                <input type="text" class="mi_libelle_market form-control bg-white" id="mi_libelle_market"
                    name="mi_libelle_market" placeholder="Ex: libelle" value="">
            </div>
            <div class="col mb-3">
                <label for="base_currency" class="col-form-label">Base coin:</label>
                <select name="base_currency" class="form-select bg-white" id="base_currency">
                    <option value="BTC">BTC</option>
                    <option value="ETH">ETH</option>
                </select>
            </div>
        </div>

        <div class="row">

            <div class="col mb-3">
                <label for="quote_currency" class="col-form-label">Quote coin:</label>
                <select name="quote_currency" class="form-select bg-white" id="quote_currency">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                </select>
            </div>

            <div class="col mb-3">
                <label for="mi_allow_ew_pr" class="col-form-label">Allow er pr:</label>
                <select name="mi_allow_ew_pr" class="form-select bg-white" id="mi_allow_ew_pr">
                    <option value="True">True</option>
                    <option value="False">False</option>
                </select>
            </div>
            <div class="col mb-3">
                <label for="mi_auto_compounding" class="col-form-label">Auto compounding:</label>
                <select name="mi_auto_compounding" class="form-select bg-white" id="mi_auto_compounding">
                    <option value="True">True</option>
                    <option value="False">False</option>
                </select>
            </div>
        </div>
        <button type="submit" class="justify-content-end btn btn-success">Edit</button>
    </form>
</div>
