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
    <p class="judul">Arus Kas</p>
    Periode : <?= date('d F Y', strtotime($tglawal)) . "s/d" . date('d F Y', strtotime($tglakhir)) ?>
    <br>
    <br>
    <table class="table table-striped table-md">
        <?php
        $totpenerimaan = 0;
        $totpengeluaran = 0;
        $modal = 0;
        $tprive = 0;
        ?>

        <!-- Penerimaan -->
        <tr>
            <td>Arus Kas dari Aktiva Usaha</td>
            <td></td>
            <td></td>
        </tr>

        <?php foreach ($dttransaksi as $key => $value) : ?>
            <?php if ($value->id_status == 1) : ?>
                <?php
                $penerimaan = $value->debit;
                $totpenerimaan = $totpenerimaan + $penerimaan;
                ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <tr>
            <td class="text-left" style="padding-left: 3em;">Penerimaan kas dari Pelanggan</td>
            <td></td>
            <td class="text-right"><?= number_format($totpenerimaan, 0, ",", ".") ?></td>
        </tr>

        <!-- Pengeluaran -->
        <tr>
            <td>Pengeluaran Kas</td>
            <td></td>
            <td></td>
        </tr>

        <?php foreach ($dttransaksi as $key => $value) : ?>
            <?php if ($value->id_status == 2) : ?>
                <?php
                $pengeluaran = $value->kredit;
                $totpengeluaran = $totpengeluaran + $pengeluaran;
                ?>
                <tr>
                    <td class="text-left" style="padding-left: 3em;"><?= $value->ketjurnal ?></td>
                    <td></td>
                    <td class="text-right" style="padding-right: 6em;"><?= number_format($pengeluaran, 0, ",", ".") ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>

        <tr>
            <td>Jumlah Pengeluaran</td>
            <td></td>
            <td class="text-right"><?= number_format($totpengeluaran, 0, ",", ".") ?></td>
        </tr>
        <tr>
            <td>Arus Kas Bersih dari Aktivitas Usaha</td>
            <td></td>
            <td class="text-right"><?= number_format($totpenerimaan - $totpengeluaran, 0, ",", ".") ?></td>
        </tr>

        <!-- Arus kas dari aktivitas transaksi -->
        <?php foreach ($dttransaksi as $key => $value) : ?>
            <?php if ($value->id_status == 3) : ?>
                <?php
                $setor = $value->debit;
                $modal = $modal + $setor;
                ?>
                <tr>
                    <td class="text-left" style="padding-left: 3em;"><?= $value->ketjurnal ?></td>
                    <td></td>
                    <td class="text-right" style="padding-right: 6em;"><?= number_format($modal, 0, ",", ".") ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- Prive -->
        <?php foreach ($dttransaksi as $key => $value) : ?>
            <?php if ($value->id_status == 4) : ?>
                <?php
                $prive = $value->kredit;
                $tprive = $tprive + $prive;
                ?>
                <tr>
                    <td class="text-left" style="padding-left: 3em;"><?= $value->ketjurnal ?></td>
                    <td></td>
                    <td class="text-right" style="padding-right: 6em;"><?= number_format($tprive, 0, ",", ".") ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>

        <tr>
            <td>Arus Kas Bersih dari Aktivitas Investasi</td>
            <td></td>
            <td class="text-right"><?= number_format($modal - $tprive, 0, ",", ".") ?></td>
        </tr>

        <tr>
            <td>Saldo Kas Akhir Periode</td>
            <td></td>
            <td class="text-right"><?= number_format(($totpenerimaan - $totpengeluaran) + ($modal - $tprive), 0, ",", ".") ?></td>
        </tr>
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