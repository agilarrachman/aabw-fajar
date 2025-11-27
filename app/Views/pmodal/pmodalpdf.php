<html>

<head>
    <style type="text/css">
        .aturkiri {
            text-align: left;
        }

        .aturkanan {
            text-align: right;
        }

        .aturtengah {
            text-align: center;
        }

        .spesifik {
            font-style: italic;
            word-spacing: 30px;
        }

        .judul {
            font-style: italic;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <p class="judul">Jurnal Penyesuaian</p>
    Periode : <?= date('d F Y', strtotime($tglawal)) . "s/d" . date('d F Y', strtotime($tglakhir)) ?>
    <br>
    <br>

    <table class="table table-striped table-md">
        <thead>

        </thead>
        <tbody>
            <tr>
                <td class="text-left">Modal Awal</td>
                <td></td>
                <td class="text-right"><?= number_format(($dttransaksi['modal_awal']), 0, ",", ".") ?></td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 3em;">Laba/Rugi Bersih</td>
                <td></td>
                <td class="text-right" style="padding-right: 6em;"><?= number_format(($dttransaksi['laba_rugi']), 0, ",", ".") ?></td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 3em;">Prive</td>
                <td></td>
                <td class="text-right" style="padding-right: 6em;"><?= number_format(($dttransaksi['prive']), 0, ",", ".") ?></td>
            </tr>
            <tr>
                <td class="text-left">Penambahan Modal</td>
                <td></td>
                <td class="text-right"><?= number_format(($dttransaksi['penambahan_modal']), 0, ",", ".") ?></td>
            </tr>
            <tr>
                <td class="text-left">Modal Akhir</td>
                <td></td>
                <td class="text-right"><?= number_format(($dttransaksi['modal_akhir']), 0, ",", ".") ?></td>
            </tr>
        </tbody>
        <tfoot>
        </tfoot>
    </table>

    <br>
    <?php
    $tgl = date('l, d-m-y');
    echo $tgl;
    ?>
    <br>
    <br>
    Pimpinan AKN<br>
    _____________
</body>

</html>