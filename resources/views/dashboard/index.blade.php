@extends('layouts.app_admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="text-center my-4">
            <h1 class="h1 text-uppercase mb-0">Pemesanan Tiket Traveling</h1>
            <small>Happy Traveling</small>
        </div>
        <div class="flex my-3">
            @foreach($rute as $val)
            <div class="card d-inline-block" style="border:1px dashed #0c0c0c;">
                <div class="card-body">
                    <div class="d-flex align-items-center position-relative">
                        <div class="position-absolute" style="right: 0; top: 0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="88" height="88" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="3" y="5" width="18" height="14" rx="3" />
                                <line x1="3" y1="10" x2="21" y2="10" />
                                <line x1="7" y1="15" x2="7.01" y2="15" />
                                <line x1="11" y1="15" x2="13" y2="15" />
                            </svg>
                        </div>
                        <div>
                            <small>Tujuan</small>
                            <h4>{{ $val->tujuan }}</h4>
                        </div>
                        <div style="border-left: 1px dashed #0A2647; height: 1.5rem;" class="mx-3"></div>
                        <div>
                            <small>Harga</small>
                            <h4>{{ $val->harga }}</h4>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="p-3 border rounded me-1">
                            <small>Rute Awal</small>
                            <h4>{{ $val->rute_awal }}</h4>
                        </div>
                        <div class="p-3 border rounded">
                            <small>Rute Akhir</small>
                            <h4>{{ $val->rute_akhir }}</h4>
                        </div>
                    </div>
                    <div class="mt-3 text-end">
                        <a href="{{ route('dashboard', ['id_rute' => $val->id_rute]) }}" class="btn btn-dark">Pesan Tiket</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if(isset($choiceTicket->tujuan))
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body border-bottom py-3">
                        <div class="h3 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle me-2" width="88" height="88" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="12" r="9" />
                                <line x1="12" y1="8" x2="12.01" y2="8" />
                                <polyline points="11 12 12 12 12 16 13 16" />
                            </svg>
                            Detail Tiket
                        </div>
                        <hr class="mt-0">
                        <div>
                            <div class="d-flex">
                                <div class="mt-1 rounded p-2 d-inline-block" style="border: 1px dashed #0c0c0c">
                                    <small>Tujuan</small>
                                    <span class="h2 mb-0">{{ $choiceTicket->tujuan }}</span>
                                </div>
                                <div class="mt-1 rounded p-2 d-inline-block" style="border: 1px dashed #0c0c0c">
                                    <small>Harga</small>
                                    <span class="h2 mb-0">Rp.{{ $choiceTicket->harga }}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <small>Rute Awal</small>
                                        <div>
                                            <span class="h2 mb-0">{{ $choiceTicket->rute_awal }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right-circle" width="88" height="88" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M18 15l3 -3l-3 -3" />
                                        <circle cx="5" cy="12" r="2" />
                                        <path d="M7 12h14" />
                                    </svg>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <small>Rute Akhir</small>
                                        <div>
                                            <span class="h2 mb-0">{{ $choiceTicket->rute_akhir }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="mt-3">
                                <a href="http://" class="btn btn-dark">Bayar Tiket</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection