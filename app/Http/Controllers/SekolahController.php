<?php

namespace App\Http\Controllers;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Sekolah-list|Sekolah-create|Sekolah-edit|Sekolah-delete', ['only' => ['index','show']]);
         $this->middleware('permission:Sekolah-create', ['only' => ['create','store']]);
         $this->middleware('permission:Sekolah-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:Sekolah-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sekolah = Sekolah::latest()->paginate(5);
        return view('Sekolah.index',compact('Sekolah'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function tampil()
    {
        $Sekolah = Sekolah::latest()->paginate(5);
        return view('Sekolah.index2',compact('Sekolah'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sekolah.create');
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
            'i_nama' => 'required',
            'i_alamat' => 'required',
            'i_email' => 'required',
            'i_notelp' => 'required',
            'i_foto' => 'required|image|mimes:jpeg,png,jpg|max:3000',
        ]);
        $id_users = Auth::user()->id;
        $file = $request->file('i_foto');
        $namaFile =$file->getClientOriginalName();
        $tujuanFile ='images/sekolah';
        $file->move($tujuanFile,$namaFile);

        $Sekolah = new Sekolah;
        $Sekolah->i_nama = $request->i_nama;
        $Sekolah->i_alamat = $request->i_alamat;
        $Sekolah->i_email = $request->i_email;
        $Sekolah->i_notelp = $request->i_notelp;
        $Sekolah->i_foto = $namaFile;
        $Sekolah->id_users = $id_users;
        $Sekolah->save();


        return redirect()->route('Sekolah.index')
                        ->with('success','Sekolah Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sekolah  $Sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $Sekolah)
    {
        return view('Sekolah.show',compact('Sekolah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sekolah  $Sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $Sekolah)
    {
        return view('Sekolah.edit',compact('Sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sekolah  $Sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$Sekolah)
    {
         request()->validate([
            'i_nama' => 'required',
            'i_alamat' => 'required',
            'i_email' => 'required',
            'i_notelp' => 'required',
        ]);
        if ($file = $request->file('i_foto')) {
            $namaFile =$file->getClientOriginalName();
            $tujuanFile ='images/sekolah';
            $file->move($tujuanFile,$namaFile);
            Sekolah::where('id', $Sekolah)
                ->update([
                    'i_nama' => $request->i_nama,
                    'i_alamat' => $request->i_alamat,
                    'i_email' => $request->i_email,
                    'i_notelp' => $request->i_notelp,
                    'i_foto' => $namaFile,
                ]);
            }
        else{
            Sekolah::where('id', $Sekolah)
                ->update([
                    'i_nama' => $request->i_nama,
                    'i_alamat' => $request->i_alamat,
                    'i_email' => $request->i_email,
                    'i_notelp' => $request->i_notelp,
                ]);
        }

        return redirect()->route('Sekolah.index')
                        ->with('success','Sekolah Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sekolah  $Sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $Sekolah)
    {
        $Sekolah->delete();

        return redirect()->route('Sekolah.index')
                        ->with('success','Sekolah Berhasil Dihapus');
    }
}
