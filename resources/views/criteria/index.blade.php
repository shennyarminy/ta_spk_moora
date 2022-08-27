@extends('layouts.main')
@section('content')

<section class="section">
  <div class="section-header ">
    <h1>{{ $judul }}</h1>
    <a href=" {{ url('criteria/create') }}" title="Tambah Kriteria" class="btn btn-success ml-auto"> Tambah Kriteria</a>
  </div>

<div class="card">   
  <div class="card-header">
    <i class="fas fa-plus"></i><h4>Daftar Data Kriteria</h4>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="table-1" class="table table-striped">
        <thead>
          <tr>
            <th class="col-1">No.</th>
            <th class="col-2">Kode Kriteria</th>
            <th class="col-2">Nama Kriteria</th>
            <th class="col-2">Bobot</th>
            <th class="col-2">Jenis</th>
            <th class="col-3">Aksi</th>
          </tr>
        </thead>
        <tbody>

      @foreach ($criterias as $criteria)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $criteria->kode}}</td>
        <td>{{ $criteria->nama_criteria}}</td>
        <td>{{ $criteria->bobot_criteria}}</td>
        <td>{{ $criteria->tipe}}</td>
        <td >
        <!-- Button trigger modal -->
        <button type="button" title="Detail Kriteria" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal{{ $criteria->id }}" >
          <i class="fas fa-eye"></i>
        </button>
        <button type="button" title="Edit Kriteria" class="d-inline btn btn-primary btn-sm " data-toggle="modal" data-target="#Modal{{ $criteria->id }}" >
            <i class="fas fa-edit"></i>
        </button>

        <!-- MODAL VIEW KRITERIA -->
        <div class="modal fade" id="exampleModal{{ $criteria->id }}" tabindex="-1"
        data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title  w-100 text-center" id="exampleModalLabel">{{ $criteria->nama_criteria }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-link active" id="exampleModal{{ $criteria->id }}-tab"
                          data-toggle="tab" href="#exampleModal{{ $criteria->id }}" role="tab"
                          aria-controls="exampleModal{{ $criteria->id }}" aria-selected="true">Detail</a>
                  </div>
              </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="exampleModal{{ $criteria->id }}" role="tabpanel" aria-labelledby="exampleModal{{ $criteria->id }}">
                    
                    {{-- ISI DARI VIEW --}}
                    <div class="card">
                      <div class="card-body">
                        <div class="row text-left">
                          <div class="col-6">
                            <p>Kode Kriteria</p>
                          </div>
                          <div class="col-6">
                            <p class="card-text">
                              : &nbsp; {{ $criteria->kode }}
                            </p>
                          </div>
                          <div class="col-6">
                            <p>Nama Kriteria</p>
                          </div>
                          <div class="col-6">
                            <p class="card-text">
                              : &nbsp; {{ $criteria->nama_criteria }}
                            </p>
                          </div>
                          <div class="col-6">
                            <p>Bobot Kriteria</p>
                          </div>
                          <div class="col-6">
                            <p class="card-text">
                              : &nbsp; {{ $criteria->bobot_criteria }}
                            </p>
                          </div>
                          <div class="col-6">
                            <p>Jenis Kriteria</p>
                          </div>
                          <div class="col-6">
                            <p class="card-text">
                              : &nbsp; {{ $criteria->tipe }}
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>      
              </div>
            </div>
          </div>
        </div>

        {{-- EDIT KRITERIA --}}
        <div class="modal fade" id="Modal{{ $criteria->id }}" tabindex="-1"
            data-backdrop="static" data-keyboard="false" aria-labelledby="ModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title  w-100 text-center" id="ModalLabel">{{ $criteria->nama_criteria }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="modal{{  $criteria->id }}" role="tabpanel" aria-labelledby="modal{{  $criteria->id }}">

                        <form action="{{ url('criteria/'.$criteria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                          <input type="hidden" name="method" value="PATCH">
                          <div class="row">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="kode">Kode Kriteria</label>
                                      <input type="text" name="kode" id="kode" class="form-control" 
                                      value="{{ $criteria->kode }}">
                                      
                                  </div>
                              </div>
          
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="nama_criteria">Nama Kriteria</label>
                                      <input type="text" name="nama_criteria" id="nama_criteria" class="form-control"
                                      value="{{ $criteria->nama_criteria }}" >
                                  </div>
                              </div>
          
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="bobot_criteria">Bobot Kriteria</label>
                                      <input type="number" name="bobot_criteria" id="bobot_criteria" min="0.01" max="1.00" step="0.01" class="form-control" 
                                      value="{{ $criteria->bobot_criteria  }}" >
          
                                  </div>
                              </div>
          
                              <div class="col-12">
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
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                          
          
                      </form>
                      </div>
                    </div>
                  </div>                      
                </div>
              </div>
            </div>
      {{-- HAPUS KRITERIA --}}
      <a href="#" data-id = "{{ $criteria->id }}" data-nama="{{ $criteria->nama_criteria }}"  class="btn btn-danger btn-sm delete">
          <form action="{{ url('criteria/'.$criteria->id) }}" id="delete{{ $criteria->id }}" method="POST">
            @csrf
            @method('DELETE')
          </form>
        <i class="fas fa-trash" ></i>
      </a>
        </td>
      </tr>         
      @endforeach
        </tbody> 
      </table>
    </div>
  </div> 
  </div>
</div>
</section>

<script>
$(document).ready(function() {
    $('#table-1').DataTable( {
        "order":[[ 1, "asc" ]] 
    } );
} );
</script>

<script>
$(".delete").click(function() {

  var id = $(this).attr('data-id');
  var nama_criteria = $(this).attr('data-nama');
  swal({
      title: 'Hapus Data Kriteria '+nama_criteria,
      // text: 'Once deleted, you will not be able to recover this imaginary file! ',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
        swal('Berhasil dihapus', {
          icon: 'success',
        });
        $(`#delete${id}`).submit();

      } 
    });
});
</script>
@endsection