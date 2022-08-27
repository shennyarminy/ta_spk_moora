@extends('layouts.name')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
  </div>
  <div class="card">
    <div class="card-header">
      <i class="fas fa-plus-circle"></i><h4>Ubah Data Kriteria</h4>
    </div>

  <div class="card-body">
    <form action="{{ url('criteria/'.$criteria->id) }}" method="POST">
      @csrf
      @method('PUT')
        <input type="hidden" name="method" value="PATCH">
        <div class="row">
          <div class="col-12 col-lg-6">
              <div class="form-group">
                  <label for="kode">Kode Kriteria</label>
                  <input type="text" name="kode" id="kode" class="form-control" 
                  value="{{ $criteria->kode }}">
                  
              </div>
          </div>

          <div class="col-12 col-lg-6">
              <div class="form-group">
                  <label for="nama_criteria">Nama Kriteria</label>
                  <input type="text" name="nama_criteria" id="nama_criteria" class="form-control"
                  value="{{ $criteria->nama_criteria }}" >
              </div>
          </div>
          
            <div class="col-12 col-lg-6">
                <div class="form-group">
                    <label for="bobot_criteria">Bobot Kriteria</label>
                    <input type="number" name="bobot_criteria" id="bobot_criteria" class="form-control" 
                    value="{{ $criteria->bobot_criteria  }}" >
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="tipe">Jenis Kriteria</label>
                  <select name="tipe" id="tipe" class="form-control ">
                      <option value="{{ $criteria->tipe }} ">--Jenis Kriteria--</option>
                      <option value="benefit"{{ $criteria->tipe=="benefit" ? 'selected' : '' }}>Benefit</option>
                      <option value="cost"{{ $criteria->tipe=="cost" ? 'selected' : '' }}>Cost</option>
                  </select>
                </div>
            </div> 
        </div>
        <div class="card-footer text-right">
          <a href="{{ url('criteria') }}" class="btn btn-danger float">Batal</a>
          <button type="submit" class="btn btn-primary float ">Submit</button>
        </div>

    </form>


  </div>
  </div>
</section>

@endsection