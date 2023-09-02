 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Asist</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Asist</h6>

            <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModaladd"><i class="fas fa-plus"></i> Tambah Asist</button>

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
                <form method="post" action="<?= base_url('app/add_asist') ?>">

                    <div class="form-group">
                        <labal>Nama Pemain</labal>
                        <select class="form-control" name="nama">
                            <option>-- Pilih pemain --</option>
                            <?php foreach ($pemain as $pm) { ?>
                                <option><?= $pm['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <labal>Jumlah Asist</labal>
                        <input type="number" name="jml_asist" value="1" class="form-control">
                    </div>



                    <div class="form-row">

                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Team</label>
                          <select class="form-control" name="team">
                            <option>-- Pilih team --</option>
                            <option>Merah</option>
                            <option>Hitam</option>
                            <option>Biru</option>
                            <option>Putih</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Score Team</label>
                      <input type="number" name="score_team" class="form-control" value="0" id="inputPassword4" >
                  </div>
              </div>



              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Lawan</label>
                    <select class="form-control" name="lawan">
                        <option>-- Pilih lawan --</option>
                        <option>Merah</option>
                        <option>Hitam</option>
                        <option>Biru</option>
                        <option>Putih</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Score Lawan</label>
                    <input type="number" name="score_lawan" value="0" class="form-control">
                </div>

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
                    <th>Nama Pemain</th>
                    <th>Jml Asist</th>
                    <th>Team</th>
                    <th>Score Team</th>
                    <th>Lawan</th>
                    <th>Score Lawan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Pemain</th>
                    <th>Jml Asist</th>
                    <th>Team</th>
                    <th>Score Team</th>
                    <th>Lawan</th>
                    <th>Score Lawan</th>
                    <th>Opsi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($asist as $data) { ?>


                    <tr>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['jml_asist'] ?></td>
                        <td><?= $data['team'] ?></td>
                        <td><?= $data['score_team'] ?></td>
                        <td><?= $data['lawan'] ?></td>
                        <td><?= $data['score_lawan'] ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['id'] ?>"><i class="fas fa-pen"></i></button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fas fa-trash"></i></button>

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
                                <form method="post" action="<?= base_url('app/edit_asist') ?>">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">


                                    <div class="form-group">
                                        <labal>Nama Pemain</labal>
                                        <select class="form-control" name="nama">
                                            <option><?= $data['nama'] ?></option>
                                            <option>-- Pilih pemain --</option>
                                            <?php foreach ($pemain as $pm) { ?>
                                                <option><?= $pm['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <labal>Jumlah Asist</labal>
                                        <input type="number" value="<?= $data['jml_asist'] ?>" name="jml_asist" value="1" class="form-control">
                                    </div>



                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                          <label for="inputPassword4">Team</label>
                                          <select class="form-control" name="team">
                                              <option><?= $data['team'] ?></option>
                                              <option>-- Pilih team --</option>
                                              <option>Merah</option>
                                              <option>Hitam</option>
                                              <option>Biru</option>
                                              <option>Putih</option>
                                          </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="inputPassword4">Score Team</label>
                                          <input type="number" value="<?= $data['score_team'] ?>" name="score_team" class="form-control"  id="inputPassword4" >
                                      </div>
                                  </div>



                                  <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="inputPassword4">Lawan</label>
                                        <select class="form-control" name="lawan">
                                          <option><?= $data['lawan'] ?></option>
                                          <option>-- Pilih lawan --</option>
                                          <option>Merah</option>
                                          <option>Hitam</option>
                                          <option>Biru</option>
                                          <option>Putih</option>
                                      </select>
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="inputPassword4">Score Lawan</label>
                                    <input type="number" name="score_lawan" value="<?= $data['score_lawan'] ?>" class="form-control">
                                </div>

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
        <div class="modal fade" id="exampleModalhapus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?= base_url('app/hapus_asist') ?>">
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
</div>



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