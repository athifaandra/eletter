<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }

        h1, h5, h6 {
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }

        h1 {
            font-size: 20px;
            font-weight: bold;
        }

        h5 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        h6 {
            font-size: 8px;
            font-weight: bold;
            margin-top: 1px;
            margin-bottom: 1px;
        }

        p {
            text-align: justify;
            margin-top: 1px;
            margin-bottom: 1px;
        }

        @page {
            size: A4;
            margin: 2cm 3cm 3cm 3cm;
        }

        .text-center table {
            width: 100%;
            border-bottom: 1px solid #000;
        }

        .text-center td {
            padding: 10px;
        }

        .signature {
            text-align: right;
            padding-left: 380px;
        }
    </style>
</head>

<body>
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <table>
                            <tr class="block">
                                <td style="padding-right: 25px;">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="90px" height="90px" style="display: block;">
                                </td>
                                <td class="judul">
                                    <h1>BADAN PUSAT STATISTIK KOTA PADANG</h1>
                                    <h6>Jl. Raya By Pass Km.13, Kel.Sungai Sapih, Kuranji, Sungai Sapih, Kec. Kuranji, Kota Padang, Sumatera Barat 25159</h6>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="pengenal">
                        <table>
                            <tr class="no">
                                <td>
                                    <p>No<span style="margin-left:35px;">: </span>{{ $pengajuan->nomor_surat }}</p>
                                    <p>Hal<span style="margin-left:32.5px;">: </span><span style="font-weight: bold; text-decoration: underline;">{{ $pengajuan->perihal }}</span></p>
                                </td>
                                <td>
                                    <p style="margin-left:250px; margin-bottom: 55px;">Padang, {{ \Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <p>Yth, Kepala Kantor BPS Kota Padang</p>
                    <p>Di tempat</p>
                    <br>
                    <p>Dengan hormat,</p>
                    <p>Saya yang bertanda tangan di bawah ini :</p>
                    <p style="padding-left: 36px;">Nama<span style="margin-left:35px;">: </span>{{ $pengajuan->user->name }}</p>
                    <p style="padding-left: 36px;">NIP<span style="margin-left:44px;">: </span>{{ $pengajuan->nip }}</p>
                    <p style="padding-left: 36px;">Jabatan<span style="margin-left:27px;">: </span>{{ $pengajuan->user->jabatan }}</p>

                    @if ($pengajuan->perihal == 'Permohonan Cuti')
                        <p style="margin-top: 15px;">Sehubung saya akan {{ $pengajuan->ringkasan }}</p>
                        <p style="margin-top: 15px;">Maka, dengan ini saya bermaksud mengajukan permohonan cuti terhitung mulai tanggal {{ \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->isoFormat('dddd, D MMMM YYYY') }} s/d {{ \Carbon\Carbon::parse($pengajuan->tanggal_selesai)->isoFormat('dddd, D MMMM YYYY') }}.</p>
                        <p style="margin-top: 15px;">Selama menjalankan cuti, alamat saya adalah di {{ $pengajuan->alamat }}</p>
                        <p style="margin-top: 15px;">Demikian surat permohonan ini saya buat untuk dapat dipertimbangkan sebagaimana mestinya. Atas perhatiannya saya ucapkan terima kasih</p>
                    @elseif ($pengajuan->perihal == 'Permohonan Tugas')
                        <p style="margin-top: 15px;">Sehubung akan diadakannya {{ $pengajuan->ringkasan }}</p>
                        <p style="margin-top: 15px;">Maka, dengan ini saya bermaksud mengajukan permohonan dibuatkannya Surat Tugas untuk kegiatan ini terhitung mulai tanggal {{ \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->isoFormat('dddd, D MMMM YYYY') }} s/d {{ \Carbon\Carbon::parse($pengajuan->tanggal_selesai)->isoFormat('dddd, D MMMM YYYY') }}.</p>
                        <p style="margin-top: 15px;">Selama menjalankan tugas, saya akan berada di {{ $pengajuan->alamat }}</p>
                        <p style="margin-top: 15px;">Demikian surat tugas ini saya buat untuk dapat dipertimbangkan sebagaimana mestinya. Atas perhatiannya saya ucapkan terima kasih</p>
                    @endif
                    <br>
                    <div class="signature">
                        <p>Padang, {{ \Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}</p>
                        <p>{{ $pengajuan->user->jabatan }}</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p style="font-weight: bold; text-decoration: underline;">{{ $pengajuan->user->name }}</p>
                        <p>NIP. {{ $pengajuan->nip }}</p>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
