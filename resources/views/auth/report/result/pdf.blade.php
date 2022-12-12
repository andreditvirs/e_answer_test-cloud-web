<!DOCTYPE html>
<html>
<head>
	<title>@if ($data["user"]) {{ $data["user"]->name }} @else - @endif </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        table {border: none;}
        p.separator {
            height: 0;
            width: 100%;
            border: 0;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }
        .bar { width: 99%; border: 1px solid #000; margin: 5px 0px;}
        .percentage { background: cyan; }
	</style>
	<center>
		<h4><b>PSIKOGRAM</b></h4>
	</center>
    <hr>
 
	<table class='table'>
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th style="border: 1px solid black"><h5 style="text-align: center"><b>RAHASIA</b></h5></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nama</td>
                <td>: <b>@if ($data["user"]) {{ $data["user"]->name }} @else - @endif</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: @if ($data["user"]) {{ $data["user"]->address }} @else - @endif </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>: @if ($data["user"]) {{ $data["user"]->birthplace }} @else - @endif </td>
                <td>Tanggal Lahir</td>
                <td>: @if ($data["user"]) {{ $data["user"]->birthday }} @else - @endif </td>
            </tr>
            <tr>
                <td>Pendidikan Terakhir</td>
                <td>: @if ($data["user"]) {{ $data["user"]->education_level }} @else - @endif</td>
                <td>Jurusan</td>
                <td>: @if ($data["user"]) {{ $data["user"]->education_prody }} @else - @endif</td>
            </tr>
            <tr>
                <td>Lembaga Pendidikan</td>
                <td>: @if ($data["user"]) {{ $data["user"]->education_institution }} @else - @endif</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Posisi</td>
                <td>: @if ($data["user"]) {{ $data["user"]->field }} @else - @endif</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Instansi</td>
                <td>: <b>@if ($data["user"]) {{ $data["user"]->company->name }} @else - @endif</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Tes IST</td>
                <td>: @if ($data["ist"]) {{  $data["ist"]->date }} @else Belum tes @endif</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Tes 16PF</td>
                <td>: @if ($data["_16pf"]) {{ $data["_16pf"]->date }} @else Belum tes @endif </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Tes DISC</td>
                <td>: @if ($data["disc"]) {{  $data["disc"]->date }} @else Belum tes @endif</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Tes V-Kraepelin</td>
                <td>: @if ($data["vKraepelin"]) {{ $data["vKraepelin"]->date }} @else @endif</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
	</table>
    <p class="separator"> </p>
    <i style="font-size: 10px; margin-bottom: 20px;">Data bukan berdasarkan perhitungan (ini hanya contoh random dinamis)</i>
    @php
        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        $e = 0;
        $f = 0;
        $g = 0;
        $h = 0;
        $i = 0;
        $j = 0;
        $k = 0;
        $l = 0;
        $m = 0;
        $n = 0;
        $o = 0;
        $p = 0;
        $q = 0;
        $r = 0;
        $s = 0;
        $t = 0;
        $u = 0;
    @endphp
    <table class="table">
        <thead>
            <tr>
                <th colspan="2"><h5><b>ASPEK INTELIGENSI</b></h5></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="30%">Kecerdasan Umum</td>
                <td>: @if ($ex200 < 80)
                        @php $a = 1; @endphp
                        Sangat Kurang
                    @elseif($ex200 < 90)
                        @php $a = 2; @endphp
                        Rata-rata bawah
                    @elseif($ex200 < 110)
                        @php $a = 3; @endphp
                        Rata-rata
                    @elseif($ex200 < 120)
                        @php $a = 4; @endphp
                        Rata-rata atas
                    @elseif($ex200 < 140)
                        @php $a = 5; @endphp
                        Superior
                    @else
                        @php $a = 5; @endphp
                        Sangat Superior
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>IQ: {{ $ex200 }}</td>
            </tr>
            <tr>
                <td>Berpikir Kongkrit Praktis</td>
                <td>:
                    @if ($ex100 < 80)
                        @php $b = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100 < 90)
                        @php $b = 2; @endphp
                        Kurang
                    @elseif($ex100 < 110)
                        @php $b = 3; @endphp
                        Cukup
                    @elseif($ex100 < 120)
                        @php $b = 4; @endphp
                        Baik
                    @else
                        @php $b = 5; @endphp
                        Sangat Baik
                    @endif
                </td>
            </tr>
            <tr>
                <td>Berpikir Logis</td>
                <td>:
                    @if ($ex100 < 80)
                        @php $c = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100 < 90)
                        @php $c = 2; @endphp
                        Kurang
                    @elseif($ex100 < 110)
                        @php $c = 3; @endphp
                        Cukup
                    @elseif($ex100 < 120)
                        @php $c = 4; @endphp
                        Baik
                    @else
                        @php $c = 5; @endphp
                        Sangat Baik
                    @endif
                </td>
            </tr>
            <tr>
                <td>Kemampuan Berabstraksi</td>
                <td>:
                    @if ($ex100_2 < 80)
                        @php $d = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100_2 < 90)
                        @php $d = 2; @endphp
                        Kurang
                    @elseif($ex100_2 < 110)
                        @php $d = 3; @endphp
                        Cukup
                    @elseif($ex100_2 < 120)
                        @php $d = 4; @endphp
                        Baik
                    @else
                        @php $d = 5; @endphp
                        Sangat Baik
                    @endif
                </td>
            </tr>
            <tr>
                <td>Kemampuan Analisis Sintesis</td>
                <td>:
                    @if ($ex100 < 80)
                        @php $e = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100 < 90)
                        @php $e = 2; @endphp
                        Kurang
                    @elseif($ex100 < 110)
                        @php $e = 3; @endphp
                        Cukup
                    @elseif($ex100 < 120)
                        @php $e = 4; @endphp
                        Baik
                    @else
                        @php $e = 5; @endphp
                        Sangat Baik
                    @endif
                </td>
            </tr>
            <tr>
                <td>Pemahaman Konsep Bahasa</td>
                <td>:
                    @if ($ex100_3 < 80)
                        @php $f = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100_3 < 90)
                        @php $f = 2; @endphp
                        Kurang
                    @elseif($ex100_3 < 110)
                        @php $f = 3; @endphp
                        Cukup
                    @elseif($ex100_3 < 120)
                        @php $f = 4; @endphp
                        Baik
                    @else
                        @php $f = 5; @endphp
                        Sangat Baik
                    @endif
                </td>
            </tr>
            <tr>
                <td>Pemahaman Konsep Hitung</td>
                <td>:
                    @if ($ex100 < 80)
                        @php $g = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100 < 90)
                        @php $g = 2; @endphp
                        Kurang
                    @elseif($ex100 < 110)
                        @php $g = 3; @endphp
                        Cukup
                    @elseif($ex100 < 120)
                        @php $g = 4; @endphp
                        Baik
                    @else
                        @php $g = 5; @endphp
                        Sangat Baik
                    @endif
                </td>
            </tr>
            <tr>
                <td>Ruang Bidang</td>
                <td>:
                    @if ($ex100 < 80)
                        @php $h = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100 < 90)
                        @php $h = 2; @endphp
                        Kurang
                    @elseif($ex100 < 110)
                        @php $h = 3; @endphp
                        Cukup
                    @elseif($ex100 < 120)
                        @php $h = 4; @endphp
                        Baik
                    @else
                        @php $h = 5; @endphp
                        Sangat Baik
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table" id="graph" style="margin-bottom: 30px;">
        <tbody>
            <tr>
                <td width="30%" style="text-align: right;">Kecerdasan Umum</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $a * 20; }}%;"><center>{{ $a }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Berpikir Kongkrit Praktis</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $b * 20; }}%;"><center>{{ $b }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Berpikir Logis</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $c * 20; }}%;"><center>{{ $c }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Kemampuan Berabstraksi</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $d * 20; }}%;"><center>{{ $d }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Kemampuan Analisis Sintesis</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $e * 20; }}%;"><center>{{ $e }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Pemahaman Konsep Bahasa</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $f * 20; }}%;"><center>{{ $f }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Pemahaman Konsep Hitung</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $g * 20; }}%;"><center>{{ $g }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Ruang Bidang</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $h * 20; }}%;"><center>{{ $h }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%"></td>
                <td width="70%">
                    <table>
                        <tbody>
                            <tr>
                                <td>(1) Sangat Kurang</td>
                                <td>(2) Kurang</td>
                                <td>(3) Cukup</td>
                                <td>(4) Baik</td>
                                <td>(5) Sangat Baik</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th colspan="2"><h5><b>ASPEK BAKAT</b></h5></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="30%">Kecerdasan Umum</td>
                <td>: @if ($ex10 < 2)
                        @php $i = 1; @endphp
                        Sangat Kurang
                    @elseif($ex10 < 4)
                        @php $i = 2; @endphp
                        Kurang
                    @elseif($ex10 < 7)
                        @php $i = 3; @endphp
                        Cukup
                    @elseif($ex10 < 9)
                        @php $i = 4; @endphp
                        Baik
                    @else
                        @php $i = 5; @endphp
                        Sangat Baik
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table" id="graph" style="margin-bottom: 30px;">
        <tbody>
            <tr>
                <td width="30%" style="text-align: right;">Pengertian Mekanik</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $i * 20; }}%;"><center>{{ $i }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%"></td>
                <td width="70%">
                    <table>
                        <tbody>
                            <tr>
                                <td>(1) Sangat Kurang</td>
                                <td>(2) Kurang</td>
                                <td>(3) Cukup</td>
                                <td>(4) Baik</td>
                                <td>(5) Sangat Baik</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
            <tr>
                <th colspan="2"><h5><b>ASPEK KEPRIBADIAN</b></h5></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="30%">Kepercayaan Diri</td>
                <td>: @if ($ex100_2 < 11.5)
                        @php $j = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100_2 < 45.3)
                        @php $j = 2; @endphp
                        Kurang
                    @elseif($ex100_2 < 64.9)
                        @php $j = 3; @endphp
                        Cukup
                    @elseif($ex100_2 < 92.4)
                        @php $j = 4; @endphp
                        Tinggi
                    @else
                        @php $j = 5; @endphp
                        Sangat Tinggi
                    @endif
                </td>
            </tr>
            <tr>
                <td width="30%">Kematangan</td>
                <td>: @if ($ex100_3 < 21)
                        @php $k = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100_3 < 41)
                        @php $k = 2; @endphp
                        Kurang
                    @elseif($ex100_3 < 61)
                        @php $k = 3; @endphp
                        Cukup
                    @elseif($ex100_3 < 81)
                        @php $k = 4; @endphp
                        Baik
                    @else
                        @php $k = 5; @endphp
                        Sangat Baik
                    @endif
                </td>
            </tr>
            <tr>
                <td width="30%">Stabilitas Emosi</td>
                <td>: @if ($ex100 < 12.4)
                        @php $l = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100 < 47.8)
                        @php $l = 2; @endphp
                        Kurang
                    @elseif($ex100 < 66.9)
                        @php $l = 3; @endphp
                        Cukup
                    @elseif($ex100 < 93.5)  
                        @php $l = 4; @endphp
                        Tinggi
                    @else
                        @php $l = 5; @endphp
                        Sangat Tinggi
                    @endif
                </td>
            </tr>
            <tr>
                <td width="30%">Ketekunan</td>
                <td>: @if ($ex100 < 12.3)
                    @php $m = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100 < 41)
                        @php $m = 2; @endphp
                        Kurang
                    @elseif($ex100 < 61.7)
                        @php $m = 3; @endphp
                        Cukup
                    @elseif($ex100 < 92)
                        @php $m = 4; @endphp
                        Tinggi
                    @else
                        @php $m = 5; @endphp
                        Sangat Tinggi
                    @endif
                </td>
            </tr>
            <tr>
                <td width="30%">Kesigapan</td>
                <td>: @if ($ex100 < 11.7)
                        @php $n = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100 < 48)
                        @php $n = 2; @endphp
                        Kurang
                    @elseif($ex100 < 61.7)
                        @php $n = 3; @endphp
                        Cukup
                    @elseif($ex100 < 94.3)
                        @php $n = 4; @endphp
                        Tinggi
                    @else
                        @php $n = 5; @endphp
                        Sangat Tinggi
                    @endif
                </td>
            </tr>
            <tr>
                <td width="30%">Kemampuan Bersosialisasi</td>
                <td>: @if ($ex100 < 15.4)
                        @php $o = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100 < 45.9)
                        @php $o = 2; @endphp
                        Kurang
                    @elseif($ex100 < 68.3)
                        @php $o = 3; @endphp
                        Cukup
                    @elseif($ex100 < 89.5)
                        @php $o = 4; @endphp
                        Tinggi
                    @else
                        @php $o = 5; @endphp
                        Sangat Tinggi
                    @endif
                </td>
            </tr>
            <tr>
                <td width="30%">Hubungan Personal</td>
                <td>: @if ($ex100_3 < 14.7)
                        @php $p = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100_3 < 48.3)
                        @php $p = 2; @endphp
                        Kurang
                    @elseif($ex100_3 < 70.5)
                        @php $p = 3; @endphp
                        Cukup
                    @elseif($ex100_3 < 85.5)
                        @php $p = 4; @endphp
                        Tinggi
                    @else
                        @php $p = 5; @endphp
                        Sangat Tinggi
                    @endif
                </td>
            </tr>
            <tr>
                <td width="30%">Kemampuan Berkomunikasi</td>
                <td>: @if ($ex100_3 < 21)
                        @php $q = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100_3 < 41)
                        @php $q = 2; @endphp
                        Kurang
                    @elseif($ex100_3 < 61)
                        @php $q = 3; @endphp
                        Cukup
                    @elseif($ex100_3 < 81)
                        @php $q = 4; @endphp
                        Baik
                    @else
                        @php $q = 5; @endphp
                        Sangat Baik
                    @endif
                </td>
            </tr>
            <tr>
                <td width="30%">Penyesuaian Diri</td>
                <td>: @if ($ex100_3 < 35)
                        @php $r = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100_3 < 55)
                        @php $r = 2; @endphp
                        Kurang
                    @elseif($ex100_3 < 66)
                        @php $r = 3; @endphp
                        Cukup
                    @elseif($ex100_3 < 87)
                        @php $r = 4; @endphp
                        Tinggi
                    @else
                        @php $r = 5; @endphp
                        Sangat Tinggi
                    @endif
                </td>
            </tr>
            <tr>
                <td width="30%">Motivasi Berprestasi</td>
                <td>: @if ($ex100_3 < 13.3)
                        @php $s = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100_3 < 45.2)
                        @php $s = 2; @endphp
                        Kurang
                    @elseif($ex100_3 < 65.6)
                        @php $s = 3; @endphp
                        Cukup
                    @elseif($ex100_3 < 89.2)
                        @php $s = 4; @endphp
                        Tinggi
                    @else
                        @php $s = 5; @endphp
                        Sangat Tinggi
                    @endif
                </td>
            </tr>
            <tr>
                <td width="30%">Kedisiplinan</td>
                <td>: @if ($ex100_2 < 33)
                        @php $t = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100_2 < 45)
                        @php $t = 2; @endphp
                        Kurang
                    @elseif($ex100_2 < 50)
                        @php $t = 3; @endphp
                        Cukup
                    @elseif($ex100_2 < 60)
                        @php $t = 4; @endphp
                        Tinggi
                    @else
                        @php $t = 5; @endphp
                        Sangat Tinggi
                    @endif
                </td>
            </tr>
            <tr>
                <td width="30%">Tanggung Jawab</td>
                <td>: @if ($ex100 < 21)
                        @php $u = 1; @endphp
                        Sangat Kurang
                    @elseif($ex100 < 41)
                        @php $u = 2; @endphp
                        Kurang
                    @elseif($ex100 < 61)
                        @php $u = 3; @endphp
                        Cukup
                    @elseif($ex100 < 81)
                        @php $u = 4; @endphp
                        Tinggi
                    @else
                        @php $u = 5; @endphp
                        Sangat Tinggi
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table" id="graph" style="margin-bottom: 30px;">
        <tbody>
            <tr>
                <td width="30%" style="text-align: right;">Kepercayaan Diri</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $j * 20; }}%;"><center>{{ $j }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Kematangan</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $k * 20; }}%;"><center>{{ $k }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Stabilitas Emosi</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $l * 20; }}%;"><center>{{ $l }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Ketekunan</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $m * 20; }}%;"><center>{{ $m }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Kesigapan</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $n * 20; }}%;"><center>{{ $n }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Kemampuan Bersosialisasi</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $o * 20; }}%;"><center>{{ $o }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Hubungan Personal</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $p * 20; }}%;"><center>{{ $p }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Kemampuan Berkomunikasi</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $q * 20; }}%;"><center>{{ $q }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Penyesuaian Diri</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $r * 20; }}%;"><center>{{ $r }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Motivasi Berprestasi</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $s * 20; }}%;"><center>{{ $s }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Kedisiplinan</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $t * 20; }}%;"><center>{{ $t }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%" style="text-align: right;">Tanggung Jawab</td>
                <td><div class="bar"><div class="percentage" style="width:{{ $u * 20; }}%;"><center>{{ $u }}</center></div></div></td>
            </tr>
            <tr>
                <td width="30%"></td>
                <td width="70%">
                    <table>
                        <tbody>
                            <tr>
                                <td>(1) Sangat Kurang</td>
                                <td>(2) Kurang</td>
                                <td>(3) Cukup</td>
                                <td>(4) Baik</td>
                                <td>(5) Sangat Baik</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <hr>
    <center>
        <i style="font-size: 10px;"><img src="{{ asset('assets/images/psychoweb-icon.png') }}" width="40"/> <br>Copyright @ {{ date('Y') }} by Psychoweb</i>
    </center>
</body>
</html>