 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Main Hari Ini</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Main Hari Ini</h6>
            <!--   <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModaladd"><i class="fas fa-plus"></i> Tambah Lapangan</button> -->



        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tgl Main</th>
                            <th>Jam Main</th>
                            <th>Team</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Tgl Main</th>
                            <th>Jam Main</th>
                            <th>Team</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($main as $data) { ?>


                            <tr>
                                <td><?= $data['nama'] ?></td>

                                <td><?= $data['tgl_main'] ?></td>
                                <td><?= $data['jam_main'] ?></td>
                                <td><?= $data['team'] ?></td>
                                <td></td>
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