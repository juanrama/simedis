@extends('dashboard.layouts.main')

@section('container')
<div id="main">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Keterangan Pasien</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav
            aria-label="breadcrumb"
            class="breadcrumb-header float-start float-lg-end"
          >
          </nav>
        </div>
      </div>
    </div>
      <div class="row" id="table-borderless">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Pasien</h4>
            </div>
            <div class="card-content">
              <!-- table with no border -->
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead>
                      <tr>
                      </tr>
                  </thead>
                  <tbody>
                        <tr>
                            <td>Nama Pasien</td>
                            <td>{{ $pasiens -> nama_pasien }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Rekam Medis</td>
                            <td>{{ $pasiens-> rek_medis }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{ $pasiens -> alamat }}</td>
                        </tr>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="buttons mb-2">
        <a href={{ route('keterangan.create', $pasiens->rek_medis) }} class="btn btn-success rounded-pill btn-lg">Input Data Baru</a>
      </div>
    <div class="row" id="table-borderless">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Catatan Medis</h4>
          </div>
          <div class="card-content">
            <!-- table with no border -->
            <div class="table-responsive">
              <table class="table table-borderless mb-0">
                <thead>
                    <tr>
                        <th>Keluhan</th>
                        <th>Tindakan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keterangans as $keterangan)
                    <tr>
                        <td>{{ $keterangan -> keluhan}}</td>
                        <td>{{ $keterangan -> tindakan }}</td>
                        <td>{{ $keterangan -> tanggal }}</td>
                        <td>
                          <form action="{{ route('ketpas.destroy', $keterangan-> id) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Apakah kamu yakin?')">
                              <span data-feather="x-circle"></span>
                            </button>
                          </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $keterangans->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-inline-flex p-2">
          <a href="/datapasien" class="btn btn-primary btn-lg mr-auto">Back</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
  Swal.fire(
    'Selamat!',
    'Data berhasil ditambahkan!',
    'success'
  )
</script>
@endif

@if (session('hapus'))
      <script>
        Swal.fire(
          'Selamat!',
          'Data berhasil dihapus!',
          'success'
        )
      </script>
@endif

{{-- For Chart --}}
    
@endsection