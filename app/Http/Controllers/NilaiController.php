<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Nilai-list|Nilai-create|Nilai-edit|Nilai-delete', ['only' => ['index','show']]);
         $this->middleware('permission:Nilai-create', ['only' => ['create','store']]);
         $this->middleware('permission:Nilai-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:Nilai-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Nilai = Nilai::latest()->paginate(5);
        return view('Nilai.index',compact('Nilai'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $Nilai = DB::table('Siswa')->pluck("s_nama", "s_nama");
        $NIS = DB::table('Siswa')->pluck("s_nis", "s_nis");
        return view('Nilai.create', compact('NIS'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'n_nama' => 'required',
            'n_nama_ortu' => 'required',
            'n_nis' => 'required',
            'n_agama' => 'required',
            'n_pkn' => 'required',
            'n_bing' => 'required',
            'n_bindo' => 'required',
            'n_ipa' => 'required',
            'n_ips' => 'required',
            'n_mtk' => 'required',
            'n_sbk' => 'required',
            'n_penjas' => 'required',
            'kkm' => 'required',
        ]);

        // Nilai::create($request->all());
        $id_users = Auth::user()->id;
        $Nilai = new Nilai;
        $Nilai->n_nama = $request->n_nama;
        $Nilai->n_nama_ortu = $request->n_nama_ortu;
        $Nilai->n_nis = $request->n_nis;
        $Nilai->n_agama = $request->n_agama;
        $Nilai->n_pkn = $request->n_pkn;
        $Nilai->n_bing = $request->n_bing;
        $Nilai->n_bindo = $request->n_bindo;
        $Nilai->n_ipa = $request->n_ipa;
        $Nilai->n_ips = $request->n_ips;
        $Nilai->n_mtk = $request->n_mtk;
        $Nilai->n_sbk = $request->n_sbk;
        $Nilai->n_penjas = $request->n_penjas;
        $Nilai->kkm = $request->kkm;
        $Nilai->id_users = $id_users;
        $Nilai->save();


        return redirect()->route('Nilai.index')
                        ->with('success','Nilai Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nilai  $Nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $Nilai)
    {
        return view('Nilai.show',compact('Nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nilai  $Nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $Nilai)
    {
        return view('Nilai.edit',compact('Nilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nilai  $Nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $Nilai)
    {
         request()->validate([
            'n_nama' => 'required',
            'n_nama_ortu' => 'required',
            'n_nis' => 'required',
            'n_agama' => 'required',
            'n_pkn' => 'required',
            'n_bing' => 'required',
            'n_bindo' => 'required',
            'n_ipa' => 'required',
            'n_ips' => 'required',
            'n_mtk' => 'required',
            'n_sbk' => 'required',
            'n_penjas' => 'required',
            'kkm' => 'required',
        ]);

        $Nilai->update($request->all());

        return redirect()->route('Nilai.index')
                        ->with('success','Nilai Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilai  $Nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $Nilai)
    {
        $Nilai->delete();

        return redirect()->route('Nilai.index')
                        ->with('success','Nilai Berhasil Dihapus.');
    }
    public function search(Request $request){
        if($request->has('search')){
            $q=$request->search;
            $result=Nilai::where('n_nis','like','%' .$q.'%')->orWhere('n_nama','like','%' .$q.'%')->get();
            return response()->json(['data'=>$result]);
        }else{
            return view('Nilai.index');
        }
    }

    public function findNis(Request $request){

		$p=Siswa::select('s_nama')->where('s_nis',$request->s_nis)->first();

    	return response()->json($p);
	}

    public function findNamaOrtu(Request $request){

		$p=Siswa::select('s_nama_ortu')->where('s_nis',$request->s_nis)->first();

    	return response()->json($p);
	}


}
