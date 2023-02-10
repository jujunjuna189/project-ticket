@extends('layouts.app_admin')
@section('content')
<div class="row row-deck row-cards justify-content-center">
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="card-header font-weight-bold">
                <h3 class="card-title fw-bold">Edit Rute</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('rute.updated') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_rute" value="{{ $rute->id_rute }}">
                    <div class="mb-3">
                        <label class="form-label">Tujuan</label>
                        <input type="text" class="form-control" name="tujuan" value="{{ $rute->tujuan }}" placeholder="...">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Rute Awal</label>
                                <input type="text" class="form-control" name="rute_awal" value="{{ $rute->rute_awal }}" placeholder="...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Rute Akhir</label>
                                <input type="text" class="form-control" name="rute_akhir" value="{{ $rute->rute_akhir }}" placeholder="...">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Transportasi</label>
                        <select name="id_transportasi" class="form-control">
                            <option value="{{ $rute->id_transportasi }}">{{ App\Models\TransportasiModel::getById($rute->id_transportasi)->kode ?? '' }}</option>
                            @foreach($transportasi as $val)
                            @if($rute->id_transportasi != $val->id_transportasi)
                            <option value="{{ $val->id_transportasi }}">{{ $val->kode }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga" value="{{ $rute->harga }}" placeholder="0">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group float-end">
                        <a href="{{ url()->previous() }}" class="btn">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l14 0"></path>
                                <path d="M5 12l6 6"></path>
                                <path d="M5 12l6 -6"></path>
                            </svg>
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection