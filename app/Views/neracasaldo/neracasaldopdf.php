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
    <p class="judul">Neraca Saldo</p>
    Periode : <?= date('d F Y', strtotime($tglawal)) . "s/d" . date('d F Y', strtotime($tglakhir)) ?>
    <br>
    <br>

    <table class="table table-striped table-md">
        <thead>
            <tr>
                <td class="aturtengah" rowspan="2" width="125px">Kode Akun</td>
                <td class="aturkiri" rowspan="2" width="100px">Keterangan</td>
                <td class="aturtengah" colspan="2" width="100px">Saldo</td>
            </tr>
            <tr>
                <td class="aturkanan" width="50px">Debit</td>
                <td class="aturkanan" width="50px">Kredit</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $td = 0;
            $tk = 0;
            ?>
            <?php foreach ($dttransaksi as $key => $value) : ?>
                <?php
                $d = $value->jumdebit;
                $k = $value->jumkredit;
                $neraca = $d - $k;

                if ($neraca < 0) {
                    $kreditnew = abs($neraca);
                    $tk = $tk + $kreditnew;
                } else {
                    $kreditnew = 0;
                }

                if ($neraca > 0) {
                    $debitnew = abs($neraca);
                    $td = $td + $debitnew;
                } else {
                    $debitnew = 0;
                }
                ?>
                <tr>
                    <td width="125px"><?= $value->kode_akun3 ?></td>
                    <td width="100px"><?= $value->nama_akun3 ?></td>
                    <td width="50px" class="aturkanan"><?= number_format($debitnew, 0, ",", ".") ?></td>
                    <td width="50px" class="aturkanan"><?= number_format($kreditnew, 0, ",", ".") ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="aturtengah"></td>
                <td class="aturtengah"></td>
                <td class="aturkanan"><?= number_format($td, 0, ",", ".") ?></td>
                <td class="aturkanan"><?= number_format($tk, 0, ",", ".") ?></td>
            </tr>
        </tfoot>
    </table>

    <br>
    <?php
    $tgl = date('l, d-m-y');
    echo $tgl;
    ?>
    <br>
    <br>
    Pimpinan AKN
    _____________
</body>

</html>