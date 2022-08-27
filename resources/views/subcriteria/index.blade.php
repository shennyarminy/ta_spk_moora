@extends('layouts.main')
@section('content')


<section class="section">
  <div class="section-header">
    <h1>{{ $judul }}</h1>
    <a href="{{ url('subcriteria/create') }}" title="Tambah Subkriteria" class="btn btn-success ml-auto">Tambah Subkriteria</a> 
  </div>


  {{-- PENGULANGAN UNTUK CARD TABEL KRITERIA --}}
  @foreach ($criterias as $criteria)
  <div class="card">
    <div class="card-header">
      <i class="fas fa-table"></i><h4>({{ $criteria->kode }}) {{ $criteria->nama_criteria }} </h4>
      <div class="card-header-action">
      </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table  id=""  class="table table-striped display">
          <thead >
            <tr  >
              <th class="col-1">No.</th>
              <th class="col-1"> Kode Kriteria</th>
              <th class="col-3">Nama Subkriteria</th>
              <th class="col-2">Nilai Subkriteria</th>
              <th class="col-2">Aksi</th>     
            </tr>
          </thead>
          <tbody >
            {{-- FOREACH UNTUK SUBCRITERIA --}}
            @foreach ($criteria->subcriterias as $subcriteria)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subcriteria->criteria->kode }}</td>
                <td>{{ $subcriteria->nama_subcriteria}}</td>
                <td>{{ $subcriteria->nilai_subcriteria }}</td>
                <td >
                  {{-- EDIT SUBKRITERIA --}}
                  <a href="{{ url('subcriteria/'.$subcriteria->id.'/edit') }}" title="Ubah Subkriteria" 
                    class="btn btn-primary btn-sm">
                    <i class="fas fa-pen"></i>
                  </a>

                  {{-- HAPUS SUBKRITERIA --}}
                  <a href="#" data-id ="{{ $subcriteria->id }}" data-nama="{{ $subcriteria->nama_subcriteria }}" class="btn btn-danger btn-sm delete">
                  <form action="{{ url('subcriteria/'.$subcriteria->id) }}" id="delete{{ $subcriteria->id }}" method="POST">
                  @csrf
                  @method('DELETE')
                  </form>
                  <i class="fas fa-trash"></i>
                  </a>   
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endforeach
</section>

{{-- DATATABLE --}}
<script>
  $(document).ready(function(){
    $('table.display').DataTable({
      // "paging":   false,
      "ordering": false,
      "info":     false,
      // "searching" : false,
    })
  })
</script>

{{-- ALERT HAPUS --}}
<script>
 $(".delete").click(function(){

  var id= $(this).attr('data-id');
  var nama_subcriteria = $(this).attr('data-nama');
  swal({
    title: 'Hapus Data Subkriteria '+nama_subcriteria,
    icon: 'warning', 
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete){
      swal('Berhasil dihapus', {
        icon: 'success',
      });
      $(`#delete${id}`).submit();
    }
  });
 });

</script>

@endsection

