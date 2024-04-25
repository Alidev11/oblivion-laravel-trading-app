@extends('layouts.app')
@section('title', 'My bots')
@section('content')
    <div class="d-flex justify-content-end mb-4">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-bot">Add bot</button>
    </div>
    <div id="scrolablle-div" class="scrollbar1 srollable-div container">
        <div class="session-result">
            @if (Session::has('success'))
                <div class="alert alert-success d-flex align-items-center alertDiv alert-dismissible fade show"
                    role="alert">
                    <div>
                        <i class="fa-solid fa-circle-check"></i>
                        {{ Session::get('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (Session::has('error'))
                <div class="alert alert-danger d-flex align-items-center alertDiv alert-dismissible fade show"
                    role="alert">
                    <div>
                        <i class="fa-solid fa-bug"></i>
                        {{ Session::get('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        @foreach ($invests->chunk(4) as $index => $investsChunk)
            <div id="bot-row" class="row">
                @foreach ($investsChunk as $invest)
                    <section class="col-3 card-delete">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('mysettings.show', $invest->mi_id_ts) }}">
                                    <h5 class="card-title text-primary  text-center mb-4">
                                        {{ $invest->mi_stacked_coin }}</h5>
                                    <p class="card-text"><span class="fw-bold text-dark">Profit:</span> 0</p>
                                    <p class="card-text"><span class="fw-bold text-dark">Assigned:</span>
                                        {{ number_format($invest->mi_allocated_balance, 2) }}</p>
                                    <p class="card-text"><span class="fw-bold text-dark">Available:</span>
                                        {{ number_format($invest->mi_available_balance, 2) }}</p>
                                    <p class="card-text"><span class="fw-bold text-dark">Platform</span></p>
                                </a>
                                <div class="row mt-3">
                                    <form class="col bot-destroy-form" action="javascript:void(0)" method="POST"
                                        data-id_mi_del="{{ $invest->id_mi }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger delete_bot_btn"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <a class="col" id="update-bot-btn" href="javascript:void(0)"
                                        data-id_mi="{{ $invest->id_mi }}"
                                        data-mi_available_balance="{{ $invest->mi_available_balance }}"
                                        data-mi_allocated_balance="{{ $invest->mi_allocated_balance }}"
                                        data-mi_dca_step="{{ $invest->mi_dca_step }}"
                                        data-mi_mode="{{ $invest->mi_mode }}"
                                        data-mi_libelle_market="{{ $invest->mi_libelle_market }}">
                                        <button type="button" class="btn btn-success"><i
                                                class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        @endforeach
    </div>
    {{-- add bot modal start --}}
    @include('bots.add')
    {{-- add bot modal end --}}

    {{-- edit bot modal start --}}
    @include('bots.edit')
    {{-- edit bot modal end --}}
@endsection
