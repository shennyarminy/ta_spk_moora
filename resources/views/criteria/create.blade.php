@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
  </div>
  <div class="card">
    <div class="card-header">
      <i class="fas fa-plus-circle"></i><h4>Tambah Data Kriteria</h4>
    </div>

  <div class="card-body">
    <form action="{{ url('criteria') }}" method="POST">
    @csrf
    
    <div class="row">
      <div class="col-12 col-lg-6">
          <div class="form-group">
              <label for="kode">Kode Kriteria</label>
              <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode') }}" >
              @error('kode')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
            <label for="nama_criteria">Nama Kriteria</label>
            <input type="text" name="nama_criteria" id="nama_criteria" class="form-control @error('nama_criteria') is-invalid @enderror" value="{{ old('nama_criteria') }}" >

            @error('nama_criteria')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
            <label for="bobot_criteria">Bobot Kriteria</label>
            <input type="number" name="bobot_criteria" id="bobot_criteria" class="form-control @error('bobot_criteria') is-invalid @enderror" value="{{ old('bobot_criteria')}}" >       
            @error('bobot_criteria')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
            <label for="tipe">Jenis Kriteria</label>
            <select name="tipe" id="tipe" class="form-control @error('tipe') is-invalid @enderror">
                <option value="">--Jenis Kriteria--</option>
                <option value="benefit"{{ $criteria->tipe=="benefit" ? 'selected' : '' }}>Benefit</option>
                <option value="cost"{{ $criteria->tipe=="cost" ? 'selected' : '' }}>Cost</option>
            </select>
            @error('tipe')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
      </div>

    </div>
    <div class="card-footer text-right">
      <a href="{{ url('criteria') }}" class="btn btn-danger float">Batal</a>
      <button type="submit" class="btn btn-primary float success" data-nama="{{ $criteria->nama }}" >Submit</button>
    </div>
    </form>   
  </div>   
  </div>
</section>
@endsection
@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
  </div>
  <div class="card">
    <div class="card-header">
      <i class="fas fa-plus-circle"></i><h4>Tambah Data Kriteria</h4>
    </div>

  <div class="card-body">
    <form action="{{ url('criteria') }}" method="POST">
    @csrf
    
    <div class="row">
      <div class="col-12 col-lg-6">
          <div class="form-group">
              <label for="kode">Kode Kriteria</label>
              <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode') }}" >
              @error('kode')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
            <label for="nama_criteria">Nama Kriteria</label>
            <input type="text" name="nama_criteria" id="nama_criteria" class="form-control @error('nama_criteria') is-invalid @enderror" value="{{ old('nama_criteria') }}" >

            @error('nama_criteria')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
            <label for="bobot_criteria">Bobot Kriteria</label>
            <input type="number" name="bobot_criteria" id="bobot_criteria" class="form-control @error('bobot_criteria') is-invalid @enderror" value="{{ old('bobot_criteria')}}" >       
            @error('bobot_criteria')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="form-group">
            <label for="tipe">Jenis Kriteria</label>
            <select name="tipe" id="tipe" class="form-control @error('tipe') is-invalid @enderror">
                <option value="">--Jenis Kriteria--</option>
                <option value="benefit"{{ $criteria->tipe=="benefit" ? 'selected' : '' }}>Benefit</option>
                <option value="cost"{{ $criteria->tipe=="cost" ? 'selected' : '' }}>Cost</option>
            </select>
            @error('tipe')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
      </div>

    </div>
    <div class="card-footer text-right">
      <a href="{{ url('criteria') }}" class="btn btn-danger float">Batal</a>
      <button type="submit" class="btn btn-primary float success" data-nama="{{ $criteria->nama }}" >Submit</button>
    </div>
    </form>   
  </div>   
  </div>
</section>
@endsection
