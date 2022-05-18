<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Siswa-list|Siswa-create|Siswa-edit|Siswa-delete', ['only' => ['index','show']]);
         $this->middleware('permission:Siswa-create', ['only' => ['create','store']]);
         $this->middleware('permission:Siswa-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:Siswa-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Siswa = Siswa::latest()->paginate(5);
        return view('Siswa.index',compact('Siswa'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function fileImportExport()
    {
        return view('Siswa.index');
    }

    public function fileImport(Request $request)
    {
        Excel::import(new SiswaImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Import Data Siswa telah berhasil.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Siswa = DB::table('users')->pluck("nama_siswa", "nama_siswa");
        return view('Siswa.create', compact('Siswa'));
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
            's_nis' => 'required',
            's_nama' => 'required',
            's_nama_ortu' => 'required',
            's_tempat_lahir' => 'required',
            's_tgl_lahir' => 'required',
            's_alamat' => 'required',
            's_gender' => 'required',
            's_kelas' => 'required',
            's_semester' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('Siswa.index')
                        ->with('success','Siswa Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $Siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $Siswa)
    {
        return view('Siswa.show',compact('Siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $Siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $Siswa)
    {
        return view('Siswa.edit',compact('Siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $Siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $Siswa)
    {
         request()->validate([
            's_nama' => 'required',
            's_nama_ortu' => 'required',
            's_nis' => 'required',
            's_tempat_lahir' => 'required',
            's_tgl_lahir' => 'required',
            's_alamat' => 'required',
            's_gender' => 'required',
            's_kelas' => 'required',
            's_semester' => 'required',
        ]);

        $Siswa->update($request->all());

        return redirect()->route('Siswa.index')
                        ->with('success','Siswa Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::find($id)->delete();

        return redirect()->route('Siswa.index')
                        ->with('success','Siswa Berhasil Dihapus.');
    }
    public function search(Request $request){
        if($request->has('cari')){
            $q=$request->cari;
            $result=Siswa::where('s_nis','like','%' .$q.'%') ->orWhere('s_nama', 'like', '%'.$q.'%')->get();
            return response()->json(['data'=>$result]);
        }else{
            return view('Siswa.index');
        }
    }

    public function findNameOrtu(Request $request){

		$p=User::select('name')->where('nama_siswa',$request->nama_siswa)->first();

    	return response()->json($p);
	}
}
