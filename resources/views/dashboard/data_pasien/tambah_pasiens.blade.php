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
            <h3>Daftar Pasien Baru</h3>
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
                  <form action="{{ route("datpas.store") }}" method="post" class="form form-horizontal">
                    @csrf
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="rek_medis"
                            >Nomor Rekam Medis</label
                          >
                        </div>
                        <div class="col-md-8 form-group">
                          <input
                            type="text"
                            id="rek_medis"
                            class="form-control @error('rek_medis') is-invalid @enderror"
                            name="rek_medis"
                            placeholder="Rekam Medis"
                            value="{{ old('rek_medis')  }}"
                          />
                          @error('rek_medis')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="col-md-4">
                          <label for="nama_pasien"
                            >Nama</label
                          >
                        </div>
                        <div class="col-md-8 form-group">
                          <input
                            type="text"
                            id="nama_pasien"
                            class="form-control @error('nama_pasien') is-invalid @enderror"
                            name="nama_pasien"
                            placeholder="Nama"
                            value="{{ old('nama_pasien')  }}"
                          />
                          @error('nama_pasien')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-body">
                          <div class="row">
                        <div class="col-md-4">
                          <label for="alamat">Alamat</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input
                            type="text"
                            id="alamat"
                            class="form-control @error('alamat') is-invalid @enderror"
                            name="alamat"
                            placeholder="Alamat"
                            value="{{ old('alamat')  }}"
                          />
                          @error('alamat')
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