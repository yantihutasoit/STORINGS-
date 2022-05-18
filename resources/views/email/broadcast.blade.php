@foreach($content as $nilai)
    Berikut kami lampirkan nilai dari siswa:<br>
    Nama&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: {{ $nilai->n_nama }} <br>
    Nomor Induk Siswa : {{ $nilai->n_nis }}<br><br>
    Nilai Agama&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;: {{ $nilai->n_agama }}<br>
    Nilai Pkn&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: {{ $nilai->n_pkn}}<br>
    Nilai Bahasa Indonesia&emsp;&ensp;: {{ $nilai->n_bindo}}<br>
    Nilai Bahasa Inggris&emsp;&emsp;&emsp;: {{ $nilai->n_bing }}<br>
    Nilai IPA&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: {{ $nilai->n_ipa}}<br>
    Nilai IPS&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: {{ $nilai->n_ips}}<br>
    Nilai Matematika&emsp;&emsp;&emsp;&emsp;: {{ $nilai->n_mtk }}<br>
    Nilai Seni Budaya&emsp;&emsp;&emsp;&emsp;: {{ $nilai->n_sbk}}<br>
    Nilai Pendidikan Jasmani&ensp;: {{ $nilai->n_penjas}}<br>
    Nilai KKM&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: {{ $nilai->kkm}}<br>
    Nilai Rata-rata&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: {{ number_format(($nilai->n_agama+$nilai->n_pkn+$nilai->n_bindo+$nilai->n_bing+$nilai->n_ipa+$nilai->n_ips+$nilai->n_mtk+$nilai->n_sbk+$nilai->n_penjas)/9 ,2)}}<br><br>
    Atas perhatian Bapak/Ibu, kami ucapkan terima kasih.
@endforeach
