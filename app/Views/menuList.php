<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<?php
        if(session()->getFlashdata('success')){
    ?>
    <div class="alert alert-succes alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('succes')?>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">Succes</button>
        </div>
        <?php
            }
        ?>
<div class="container">
    <h3>Data Menu</h3>
    <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#addMenu">Tambah Menu</button>

    <table class="table table-bordered table-striped">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach($data as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['harga']?></td>
                <td><?=$row['jenis']?></td>
                <td><?=$row['stok']?></td>
                <td><?=$row['gambar']?></td>
                <td><a href="#" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editMenu-<?=$row['id']?>">edit</a>
                <a href="<?= base_url('MenuController/delete/'.$row['id'])?>" onclick="return confirm('Yakin Akan Dihapus')" class="btn btn-danger btn-sm btn-delete">Hapus</a></td>
            </tr>

            <form action="<?=base_url('/menu/edit/'.$row['id'])?>" method="post">
<div class="modal fade" id="editMenu-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5> 
                <button type="button" class="Close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('menu')?>" method="post"> 
            <div class="modal-body">

            <div class="form-group">
                <label>Nama Menu</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Menu" value="<?=$row['nama']?>">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" class="form-control" name="harga" placeholder="Harga" value="<?=$row['harga']?>">
            </div>

            <div class="form-group">
                <label>Jenis</label>
                <input type="text" class="form-control" name="jenis" placeholder="Jenis" value="<?=$row['jenis']?>">
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="text" class="form-control" name="stok" placeholder="Stok" value="<?=$row['stok']?>">
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" class="form-control" name="gambar" placeholder="Gambar" value="<?=$row['gambar']?>">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
            </form>
            <?php
            $no++; 
            endforeach?>
        </tbody>
    </table>
</div>
<!--Add Product-->
<!--<form action="menus" method="post">-->

<div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5> 
                <button type="button" class="Close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('menus')?>" method="post"> 
            <div class="modal-body">

            <div class="form-group">
                <label>Nama Menu</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Menu" >
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" class="form-control" name="harga" placeholder="Harga">
            </div>

            <div class="form-group">
                <label>Jenis</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="Makanan">
                <label class="form-check-label" for="flexRadioDefault2">
                    Makanan
                 </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault2" value="minuman">
                <label class="form-check-label" for="flexRadioDefault2">
                    Minuman
                 </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault3" value="cemilan">
                <label class="form-check-label" for="flexRadioDefault3">
                   Camilan
                 </label>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="text" class="form-control" name="stok" placeholder="Stok" >
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" class="form-control" name="gambar" placeholder="Gambar" >
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
            </form>
            <!--End Model Add User-->
<?= $this->endSection()?>