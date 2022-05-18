<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Nilai;
use Illuminate\Support\Facades\DB;

class SendEmailController extends Controller
{
    public function index(){
        return view('email.send_email');
    }

    public function sendEmailBroadcast(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
        ]);
        $users = DB::table('users')->select('*')->get();
        foreach ($users as $user) {
        $email = $user->email;
        $data = [
            'subject' => $request->subject  .  $user->nama_siswa,
            'email' => $email,
            'content' => $request->content
        ];

        Mail::send('email.kirim', $data, function($message) use ($data) {
          $message->from('storings3105@gmail.com', 'Sekolah Dasar Negeri 1 Ambarita');
          $message->to($data['email'])
          ->subject($data['subject']);
        });
    }
        return back()->with(['message' => 'Email anda sudah dikirim']);
    }

    public function send(Request $request)
    {
        $request->validate([
          'email' => 'required|email',
          'subject' => 'required',
          'content' => 'required',
        ]);

        $data = [
          'subject' => $request->subject,
          'email' => $request->email,
          'content' => $request->content
        ];

        Mail::send('email.kirim', $data, function($message) use ($data) {
          $message->from('storings3105@gmail.com', 'Sekolah Dasar Negeri 1 Ambarita');
          $message->to($data['email'])
          ->subject($data['subject']);
        });

        return back()->with(['message' => 'Email anda sudah dikirim']);
    }


    public function sendEmail(Request $request, $id)
    {
        $Nilai = DB::table('nilai')
        ->join('users', 'users.nama_siswa', '=', 'nilai.n_nama')
        ->select('users.email', 'nilai.n_nama', 'nilai.n_nis', 'nilai.n_agama', 'nilai.n_pkn', 'n_bindo', 'n_bing', 'n_ipa', 'n_ips', 'n_mtk', 'n_sbk', 'n_penjas', 'kkm')
        ->where('Nilai.id', '=', $request->id)
        ->get();
        return view('Nilai.email_nilai', compact('Nilai'));
    }

    public function sendBroadcast(Request $request)
    {
        $users = DB::table('users')->select('*')->get();
        foreach ($users as $user) {
            $email = $user->email;
            $nilai = DB::table('nilai')
            ->join('users', 'users.nama_siswa', '=', 'nilai.n_nama')
            ->select('users.email', 'nilai.n_nama', 'nilai.n_nis', 'nilai.n_agama', 'nilai.n_pkn', 'n_bindo', 'n_bing', 'n_ipa', 'n_ips', 'n_mtk', 'n_sbk', 'n_penjas', 'kkm')
            ->where('nilai.n_nama',$user->nama_siswa)
            ->get();
            $data = [
                'subject' => 'Nilai Rapor '.$user->nama_siswa,
                'email' => $email,
                'content' => $nilai
              ];
            Mail::send('email.broadcast', $data, function($message) use ($data) {
                $message->from('storings3105@gmail.com', 'Sekolah Dasar Negeri 1 Ambarita');
                $message->to($data['email'])
                ->subject($data['subject']);
            });
        }
        return back()->with(['message' => 'Email anda sudah dikirim']);
    }
}
