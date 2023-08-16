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
          <h3>Data Pasien</h3>
          <p class="text-subtitle text-muted">
            Berikut ini merupakan data pasien yang telah didaftar
          </p>
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
    <section class="section">
      <div class="card">
        <div class="card-body">
            <form action="/datapasien" method="GET">
                @csrf
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="filter_pasien">Nama Pasien:</label>
                    <input type="text" class="form-control" name="nama_pasien" id="filter_pasien" value="{{ old('nama_pasien', $pasiens_selected) }}">
                    <label for="filter_norek">Nomor Rekam Medis:</label>
                    <input type="text" class="form-control" name="rek_medis" id="filter_norek" value="{{ old('rek_medis', $medis_selected) }}">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Cari</button>
              </form>
          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th>No Rekam Medis</th>
                <th>Nama</th>
                <th>Alamat</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pasiens as $pasien)
              <tr>
                <td>{{ $pasien -> rek_medis }}</td>
                <td>{{ $pasien -> nama_pasien }}</td>
                <td>{{ $pasien -> alamat }}</td>
                <td style="text-align:center;">
                    <a href="/datapasien/{{ $pasien->rek_medis }}" class="badge bg-success"><span data-feather="eye"></span></a>
                    <a href="/datapasien/{{ $pasien->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="{{ route('datpas.destroy', $pasien->id) }}" method="post" class="d-inline">
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
          {{ $pasiens->links() }}
        </div>
      </div>
    </section>
      @if(session()->has('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
      @endif
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
      @if (session('ubah'))
      <script>
        Swal.fire(
          'Selamat!',
          'Data berhasil diubah!',
          'success'
        )
      </script>
      @endif

      @if (session('error_id'))
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Maaf',
          text: 'Data mahasiswa tidak ditemukan di database',
        })
      </script>
      @endif

      @if (session('error_ipk'))
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Maaf',
          text: 'IPK mahasiswa bermasalah',
        })
      </script>
      @endif

      
  </div>
</div>

    
@endsection