<h1 class="mt-4">Ulasan Buku </h1>
<div class="card">
  <div class="card-body">
  <div class="row">
    <div class="col-md-12">
        <a href="?page=ulasan_tambah" class="btn btn-primary mb-2">+ Tambah Data</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Buku</th>
                <th>Ulasan</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM ulasan LEFT JOIN user on user.id_user = ulasan.id_user LEFT JOIN buku on buku.id_buku = ulasan.id_buku");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['ulasan']; ?></td>
                        <td><?php echo $data['rating']; ?></td>
                        <td>
                        <?php
                            if($_SESSION['user']['level'] != 'admin'){ ?>
                            <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-warning"><i class="align-middle me-2" data-feather="edit"></i> <span class="align-middle">Ubah</span></a>
                            <?php
                            }
                            ?>
                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger"><i class="align-middle me-2" data-feather="trash-2"></i> <span class="align-middle">Hapus</span></a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
      
  </div>
    </div>
</div>