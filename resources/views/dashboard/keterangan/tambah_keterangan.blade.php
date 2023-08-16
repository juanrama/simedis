@extends('dashboard.layouts.main')

@section('container')
<div id="main">
    <header class="mb-3">
      <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
      </a>
    </header>

    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Daftar Keterangan Baru</h3>
            <p class="text-subtitle text-muted">
              Silahkan isi form berikut ini
            </p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav
              aria-label="breadcrumb"
              class="breadcrumb-header float-start float-lg-end"
            >
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Form Layout
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <section id="basic-horizontal-layouts">
        <div class="row match-height">
          <div class="col-md-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <form action="{{ route("ketpas.store") }}" method="post" class="form form-horizontal">
                    @csrf
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="rek_m"
                            >Nomor Rekam Medis</label
                          >
                        </div>
                        <div class="col-md-8 form-group">
                          <input
                            type="text"
                            id="rek_m"
                            class="form-control @error('rek_m') is-invalid @enderror"
                            name="rek_m"
                            placeholder="Rekam Medis"
                            value="{{ old('rek_m', $pasiens -> rek_medis)  }}"
                          />
                          @error('rek_m')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="col-md-4">
                          <label for="keluhan"
                            >Keluhan</label
                          >
                        </div>
                        <div class="col-md-8 form-group">
                          <input
                            type="text"
                            id="keluhan"
                            class="form-control @error('keluhan') is-invalid @enderror"
                            name="keluhan"
                            placeholder="Keluhan"
                            value="{{ old('keluhan')  }}"
                          />
                          @error('keluhan')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-body">
                          <div class="row">
                        <div class="col-md-4">
                          <label for="tindakan">Tindakan</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input
                            type="text"
                            id="tindakan"
                            class="form-control @error('tindakan') is-invalid @enderror"
                            name="tindakan"
                            placeholder="Tindakan"
                            value="{{ old('tindakan')  }}"
                          />
                          @error('tindakan')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal">Tanggal</label>
                          </div>
                        <div class="col-md-8 form-group">
                          <input
                            type="text"
                            id="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            name="tanggal"
                            placeholder="Tanggal"
                            value="{{$tanggal}}"
                          />
                          @error('tanggal')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                          <button
                            type="submit"
                            class="btn btn-primary me-1 mb-1"
                          >
                            Submit
                          </button>
                          <button
                            type="reset"
                            class="btn btn-light-secondary me-1 mb-1"
                          >
                            Reset
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
    
@endsection