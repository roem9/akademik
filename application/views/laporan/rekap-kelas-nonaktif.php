<?php 
    function tipe($tipe){
        if($tipe == 'pv khusus'){
            return 'PK';
        } elseif($tipe == 'pv luar') {
            return 'PL';
        } elseif($tipe == 'pv luar kota'){
            return 'PLK';
        } elseif($tipe == 'reguler'){
            return 'R';
        }
    }
?>

<table border=1>
    <tr>
        <th colspan=7><center>Rekapitulasi Kelas Privat Nonaktif TAR-Q</center></th>
    </tr>
    <tr>
        <th colspan=7><center><?= $title?></center></th>
    </tr>
    <!-- <tr>
        <th colspan=11></th>
    </tr> -->
    <tr>
        <th>No</th>
        <th>Tgl. Off</th>
        <th>Nama Pengajar</th>
        <th>Tipe</th>
        <th>Program</th>
        <th>Koordinator</th>
        <th>Alamat Belajar</th>
    </tr>
    <tbody>
        <?php 
            $no = 0;
            foreach ($laporan as $laporan):?>
                <tr>
                    <td><?= ++$no?></td>
                    <td><?= $laporan['tgl_history']?></td>
                    <td><?= $laporan['nama_kpq']?></td>
                    <td><?= tipe($laporan['tipe'])?></td>
                    <td><?= $laporan['program']?></td>
                    <td><?= $laporan['koordinator']?></td>
                    <td><?= $laporan['alamat']?></td>
                </tr>
        <?php endforeach;?>
    </tbody>
</table>