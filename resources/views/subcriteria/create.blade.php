@extends('layouts.main')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
  </div>
  <div class="card">
    <div class="card-header">
        <i class="fas fa-plus-circle"></i><h4>Tambah Data Subriteria</h4>
    </div>
  <div class="card-body">
    <form action="{{ url('subcriteria') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-12 ">
            <div class="form-group">
                <label for="criteria_id">Kriteria</label>
                <select name="criteria_id" id="criteria_id" class="form-control @error('criteria_id') is-invalid @enderror">
                    <option value="">--Pilih Kriteria--</option>
                    @foreach ($criterias as $criteria)
                    <option value="{{ $criteria->id }}">{{ $criteria->nama_criteria }}</option>
                    @endforeach

                    @error('criteria_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </select>
            </div>
        </div>
          <div class="col-12 ">
              <div class="form-group">
                <label for="nama_subcriteria">Nama Subkriteria</label>
                <input type="text" name="nama_subcriteria" id="nama_subcriteria" class="form-control @error('nama_subcriteria') is-invalid @enderror" value="{{ old('nama_subcriteria') ?? $subcriteria->nama_subcriteria ?? '' }}">
                @error('nama_subcriteria')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
          </div>

          <div class="col-12 ">
              <div class="form-group">
                  <label for="nilai_subcriteria">Nilai Subkriteria</label>
                  <input type="number" min="10" max="50" step="10" name="nilai_subcriteria" id="nilai_subcriteria" min="1" max="5" class="form-control @error('nilai_subcriteria') is-invalid @enderror" value="{{ old('nilai_subcriteria') }}">
                  @error('nilai_subcriteria')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
          </div>
      </div>

      {{-- CARD-FOOTER --}}
      <div class="card-footer text-right">
          <a href="{{ url('subcriteria') }}" class="btn btn-danger float">Batal</a>
          <button type="submit" class="btn btn-primary float success"> Submit</button>

      </div>
    </form>
  </div>
  </div>
</section>

@endsection