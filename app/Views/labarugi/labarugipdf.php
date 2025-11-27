<html>

<head>
    <style type="text/css">
        .text-left {
            text-align: left;
        }

        .text-right {
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
    <p class="judul">Laba Rugi</p>
    Periode : <?= date('d F Y', strtotime($tglawal)) . "s/d" . date('d F Y', strtotime($tglakhir)) ?>
    <br>
    <br>

    <table class="table table-striped table-md">
        <tbody>
            <?php
            $pendapatan = 0;
            $totpendapatan = 0;

            $beban = 0;
            $totbeban = 0;
            ?>

            <tr>
                <td>PENDAPATAN</td>
                <td></td>
                <td></td>
            </tr>

            <?php foreach ($dttransaksi as $key => $value) : ?>
                <?php
                $pendapatan = $value->jumkredit + $value->jumkredits;
                $totpendapatan = $totpendapatan + $pendapatan;
                ?>

                <?php if ($value->kode_akun2 == 41) : ?>
                    <tr>
                        <td style="padding-left: 3em;"><?= $value->nama_akun3 ?></td>
                        <td></td>
                        <td class="text-right"><?= number_format($pendapatan, 0, ",", ".") ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>

            <tr>
                <td class="text-left">BEBAN-BEBAN</td>
                <td></td>
                <td></td>
            </tr>

            <?php foreach ($dttransaksi as $key => $value) : ?>
                <?php if ($value->kode_akun2 == 51) : ?>
                    <?php
                    $beban = $value->jumdebit + $value->jumdebits;
                    $totbeban = $totbeban + $beban;
                    ?>
                    <tr>
                        <td style="padding-left: 3em;"><?= $value->nama_akun3 ?></td>
                        <td></td>
                        <td class="text-right" style="padding-right: 6em;"><?= number_format($beban, 0, ",", ".") ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            <tr>
                <td class="text-left">TOTAL BEBAN</td>
                <td></td>
                <td class="text-right"><?= number_format(($totbeban), 0, ",", ".") ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="text-left">LABA RUGI</td>
                <td></td>
                <td class="text-right"><?= number_format(($totpendapatan - $totbeban), 0, ",", ".") ?></td>
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
    Pimpinan AKN<br>
    _____________
</body>

</html>