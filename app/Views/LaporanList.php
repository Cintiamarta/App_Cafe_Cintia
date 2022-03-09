<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<div class="container">
    <h3>Laporan</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <th>No</th>
            <th>User Id</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>No Meja</th>
            <th>Nama Pesanan</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach($data as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['user_id']?></td>
                <td><?=$row['tgl']?></td>
                <td><?=$row['total_harga']?></td>
                <td><?=$row['no_meja']?></td>
                <td><?=$row['nama_pemesan']?></td>
                <td><a href="" class="btn btn-warning btn-sm btn-edit">edit</a> <a href="" class="btn btn-danger btn-sm btn-delete">Hapus</a></td>
            </tr>
            <?php
            $no++; 
            endforeach?>
        </tbody>
    </table>
</div>
<?= $this->endSection()?>