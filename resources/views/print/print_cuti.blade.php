<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Cuti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }
        h4, h5 {
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: bold;
        }
        @page {
            size: A4;
            margin-top: 3cm;
            margin-left: 4cm;
            margin-bottom: 3cm;
            margin-right: 3cm;
        }
        p {
            text-align: justify;
        }
        .text-center table {
            font-family: Arial, sans-serif;
            width: 100%;
            border-bottom: 1px solid #000;
        }
        .text-center td {
            padding: 10px;
        }
        .text-center h5, .text-center p {
            margin: 5px 0;
        }
        .text-center h5 {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .text-center h6 {
            font-size: 8px;
            font-weight: bold;
            text-align: justify;
        }
        .text-center p {
            font-size: 8px;
        }
        .text-center .block .judul p {
            text-align: center;
        }
        .text-center .block .banker p {
            text-align: left;
            white-space: nowrap;
        }
        .text-center .block .banker {
            padding-top: 26px;
        }
        .pengenal {
            text-align: justify;
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
                                <td style="padding-right: 25px;"><img src="assets/img/logo.png" alt="Logo" width="90px" height="90px"></td>
                                <td class="judul">
                                    <h5>BADAN PUSAT STATISTIK KOTA PADANG</h5>
                                    <p style="margin-top: 1px; margin-bottom: 1px;">Jl. Raya By Pass Km.13, Kel.Sungai Sapih, Kuranji, Sungai Sapih,</p>
                                    <p style="margin-top: 1px; margin-bottom: 1px;">Kec. Kuranji, Kota Padang, Sumatera Barat 25159</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="pengenal">
                        <table>
                            <tr class="no">
                                <td>
                                    <p style="margin-top: 1px; margin-bottom: 1px;">No<span style="margin-left:35px;">: </span>XXX</p>
                                    <p style="margin-top: 1px; margin-bottom: 1px;">Hal<span style="margin-left:32.5px;">: </span><span style="font-weight: bold; text-decoration: underline;">Penngajuan Cuti</span></p>
                                </td>
                                <td>
                                    <p style="margin-left:190px; margin-bottom: 55px;">Padang, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <p style="margin-top: 1px; margin-bottom: 1px;">Yth, Kepala Kantor BPS Kota Padang</p>
                    <p style="margin-top: 1px; margin-bottom: 1px;">Di tempat</p>
                    <br>
                    <p>Dengan hormat,</p>
                    <p>Saya yang bertanda tangan di bawah ini :</p>
                    <p style="margin-top: 1px; margin-bottom: 1px;">Nama<span style="margin-left:35px;">: </span>XXX</p>
                    <p style="margin-top: 1px; margin-bottom: 1px;">NIP<span style="margin-left:44px;">: </span>XXX</p>
                    <p style="margin-top: 1px; margin-bottom: 1px;">Jabatan<span style="margin-left:28px;">: </span>XXX</p>

                    <p style="margin-top: 15px;"> Dengan ini bermaksud mengajukan permohonan cuti terhitung mulai tanggal 01 Januari 2024 s/d 07 Januari 2024.</p>
                    <p style="margin-top: 15px;"> Selama menjalankan cuti, alamat saya adalah di Jl. Contoh Alamat No.123, Kota Padang.</p>
                    <p style="margin-top: 15px;"> Demikian surat permohonan ini saya buat untuk dapat dipertimbangkan sebagaimana mestinya.</p>
                    <p style="margin-top: 1px; margin-bottom: 1px;">Padang, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                    <p style="margin-top: 1px; margin-bottom: 1px;">Jabatan</p>
                    <br>
                    <br>
                    <p style="margin-top: 1px; margin-bottom: 1px; font-weight: bold; text-decoration: underline;">Nama Pengirim</p>
                    <p style="margin-top: 1px; margin-bottom: 1px;">NIP Staff</p>
                    <br>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
