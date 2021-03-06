<?php
include "../config/database.php";
include "../library/controllers.php";
$perintah = new oop();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Detail Kehadiran</title>
    <style>
        .utama {
            margin: 0 auto;
            border: thin solid #000;
            width: 700px;
        }

        .print {
            margin: 0 auto;
            width: 700px;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="print">
        <a href="#" onclick="document.getElementById('print').style.display='none';window.print();">
            <img src="../images/printer.png" id="print" width="25" height="25" border="0">
        </a>
    </div>
    <div class="utama">
        <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top: 10px">
            <tr>
                <td width="7%" rowspan="3" align="center" valign="top">
                    <img src="../images/logo-sekolah.png" width="55" height="55">
                </td>
                <td width="93%" valign="top">
                    <strong>&nbsp;Laporan Kehadiran</strong>
                </td>
            </tr>
            <tr>
                <td valign="top">&nbsp;SMK Wikrama Kota Bogor</td>
            </tr>
            <tr>
                <td valign="top">&nbsp;Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah</td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td><hr></td>
            </tr>
        </table>
        <table cellspacing="1" align="center" border="1">
            <tr align="center">
                <td rowspan="2" width="30">No</td>
                <td rowspan="2" width="100">NIS</td>
                <td rowspan="2" width="150">Nama</td>
                <td rowspan="2" width="100">Rombel</td>
                <td colspan="4">Keterangan</td>
                <td rowspan="2" width="100">Tanggal</td>
            </tr>
            <tr align="center" bgcolor="#FFFFFF">
                <td width="30">H</td>
                <td width="30">S</td>
                <td width="30">I</td>
                <td width="30">A</td>
            </tr>
            <?php
                $a = $perintah->tampil($conn, "query_absen WHERE nis = '$_GET[nis]'");
                $no = 0;
                if ($a == "") {
                    echo "<table>
                            <tr>
                                <td colspan='9'>No Record</td>
                            </tr>
                        </table>";
                } else {
                    foreach ($a as $r) {
                        $no++;
            ?>
            <tr align="center">
                <td><?= $no ?></td>
                <td><?= $r['nis'] ?></td>
                <td><?= $r['nama'] ?></td>
                <td><?= $r['rombel'] ?></td>
                <td><?= $r['hadir'] ?></td>
                <td><?= $r['sakit'] ?></td>
                <td><?= $r['ijin'] ?></td>
                <td><?= $r['alpa'] ?></td>
                <td><?= $r['tgl_absen'] ?></td>
            </tr>
            <?php
                    }
                }
            ?>
        </table>
        <br>
    </div>
    <center>
        <p>&copy; <?= date('Y'); ?> SMK Wikrama Bogor</p>
    </center>
</body>
</html>