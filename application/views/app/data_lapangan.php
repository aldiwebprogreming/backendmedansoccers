 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Lapangan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Lapangan</h6>
            <!--   <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModaladd"><i class="fas fa-plus"></i> Tambah Lapangan</button> -->

            <div class="modal fade" id="exampleModaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?= base_url('app/add_wasit') ?>">

                    <div class="form-group">
                        <labal>Nama</labal>
                        <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <labal>Alamat</labal>
                        <textarea class="form-control" name="alamat"></textarea>
                    </div>

                    <div class="form-group">
                        <labal>Tgl Lahir</labal>
                        <input type="date" name="tgl_lahir" class="form-control">
                    </div>

                    <div class="form-group">
                        <labal>Jenis Kelamin</labal>
                        <select class="form-control" name="jk">
                            <option>-- Pilih Alamat --</option>
                            <option>Laki - Laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <labal>NIK</labal>
                        <input type="number" name="nik" class="form-control">
                    </div>

                    <div class="form-group">
                        <labal>No HP</labal>
                        <input type="number" name="nohp" class="form-control">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>


</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Lapangan</th>
                    <th>Fasilitas</th>
                    <th>Harga Perjam</th>
                    <th>Status Booking</th>
                    <th>Gambar</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Lapangan</th>
                    <th>Fasilitas</th>
                    <th>Harga Perjam</th>
                    <th>Status Booking</th>
                    <th>Gambar</th>
                    <th>Opsi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($lapangan as $data) { ?>


                    <tr>
                        <td><?= $data['lapangan'] ?></td>

                        <td><?= $data['pasilitas'] ?></td>
                        <td><?= $data['harga_perjam'] ?></td>
                        <td><?= $data['status_booking'] ?></td>
                        <td><?= $data['gambar'] ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['id'] ?>"><i class="fas fa-pen"></i></button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus"><i class="fas fa-trash"></i></button>

                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit data </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="<?= base_url('app/edit_lapangan') ?>">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                    <div class="form-group">
                                        <labal>Lapangan</labal>
                                        <input type="text" name="lapangan" class="form-control" value="<?= $data['lapangan'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <labal>Fasilitas</labal>
                                        <textarea class="form-control" name="fasilitas"><?= $data['pasilitas'] ?></textarea>
                                    </div>


                                    <div class="form-group">
                                        <labal>Harga Perjam</labal>
                                        <input type="number" class="form-control" name="harga_perjam" value="<?= $data['harga_perjam'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <labal>Status Booking</labal>
                                        <input type="number" class="form-control" name="status_booking" value="<?= $data['status_booking'] ?>">
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <!-- Modal -->
               <!--  <div class="modal fade" id="exampleModalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="<?= base_url('app/hapus_wasit') ?>">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <h4>Apakah anda ingin menghapus data ini ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->



</div>
</td>
</tr>

<?php } ?>

</tbody>
</table>
</div>
</div>
</div> 

</div>