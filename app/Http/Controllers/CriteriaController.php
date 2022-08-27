<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\StoreCriteriaRequest;
use App\Http\Requests\UpdateCriteriaRequest;

class CriteriaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $criteria = Criteria::all();        
    return view('criteria.index',compact('criteria'),[      
      "aktif" => "criteria",
      "judul" => "Data Kriteria",
      "title" => "Kriteria",
      "criterias"=> Criteria::orderBy('kode', 'asc')->get(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $criteria = new Criteria;
    return view('criteria.create', compact('criteria'),  [
         "aktif" => "criteria",
         "judul" => "Data Kriteria",
         "title" => "Kriteria Tambah",
         "criterias"=> Criteria::orderBy ('kode', 'asc')->get()
     ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreCriteriaRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreCriteriaRequest $request)
  {
    $data = $request->validate([
      "kode" => "required",
      "nama_criteria" => "required",
      "bobot_criteria" => "required|numeric",
      "tipe" => "required",
 ], 
  [
      "kode.required" => "Kode Kriteria tidak boleh kosong",
      "nama_criteria.required" => "Nama Kriteria tidak boleh kosong", 
      "bobot_criteria.required" => "Bobot Kriteria tidak boleh kosong", 
      "tipe.required" => "Jenis Kriteria tidak boleh kosong"
  ]);

  Criteria::create($data);
  Toastr::success("Anda berhasil menambahkan $request->nama");
  return redirect()->route('criteria.index');
  
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Criteria  $criteria
   * @return \Illuminate\Http\Response
   */
  public function show(Criteria $criteria)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Criteria  $criteria
   * @return \Illuminate\Http\Response
   */
  public function edit(Criteria $criteria)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateCriteriaRequest  $request
   * @param  \App\Models\Criteria  $criteria
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateCriteriaRequest $request, Criteria $criteria, $id)
  {
    $criteria = Criteria::find($id); 
    $data     = $request->validate([
      "kode" => "required",
      "nama_criteria" => "required", 
      "bobot_criteria" => "required",
      "tipe" => "required",
    ]);

    $criteria->update([
      "kode" => $request->kode,
      "nama_criteria" => $request->nama_criteria,
      "bobot_criteria" => $request->bobot_criteria, 
      "tipe" => $request->tipe,
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Criteria  $criteria
   * @return \Illuminate\Http\Response
   */
  public function destroy(Criteria $criteria, $id)
  {
    $criteria = Criteria::find($id);
    $criteria->delete();

    return redirect()->route('criteria.index')->withSuccess("Berhasil menghapus kriteria: $id");
  }
}
