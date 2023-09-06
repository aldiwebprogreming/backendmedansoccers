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


                <div class="row">
                    <?php foreach ($team as $data) {  ?>
                        <div class="col-sm-6 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <?php 
                                    if ($data['team'] == 'Merah') {
                                        echo "<h3 class='text-danger'>".$data['team']."</h3>";
                                    }elseif($data['team'] == 'Hitam'){

                                        echo "<h3 class='text-dark'>".$data['team']."</h3>";
                                    }elseif($data['team'] == 'Biru'){
                                      echo "<h3 class='text-primary'>".$data['team']."</h3>";
                                  }else{
                                      echo "<h3 class='text-secondary'>".$data['team']."</h3>";
                                  }
                                  ?>

                              </div>

                              <div class="card-footer">

                                  <a class="" style="text-decoration: none;" data-toggle="collapse" href="#collapseExample<?= $data['team'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                      Lihat Team <?= $data['team'] ?> <i class="fas fa-arrow-right"></i>
                                  </a>

                                  <div class="collapse" id="collapseExample<?= $data['team'] ?>">
                                    <div class="table-responsive" id="table<?= $data['team'] ?>">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Tgl Main</th>
                                                    <th>Foto</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Tgl Main</th>
                                                    <th>Foto</th>
                                                    <th>Opsi</th>
                                                </tr>
                                                <tbody>
                                                    <?php 
                                                    $this->db->where('tgl_main', date('Y-m-d'));
                                                    $this->db->where('team', $data['lawan']);
                                                    $main = $this->db->get('tbl_main')->result_array();
                                                    ?>
                                                    <?php foreach ($main as $data2) { ?>
                                                        <tr>
                                                            <td><?= $data2['nama'] ?></td>
                                                            <td><?= $data2['tgl_main'] ?></td>
                                                            <td></td>
                                                            <td>
                                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalteam<?= $data2['id'] ?>">Goal</button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModalteam<?= $data2['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                  <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                          <span aria-hidden="true">&times;</span>
                                                                      </button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    <h4>Apakah anda ingin menambah goal ? </h4>
                                                                    <form method="post" action="<?= base_url('app/add_goal2') ?>">
                                                                        <input type="hidden" name="id" value="<?= $data2['id_user']  ?>">

                                                                        <input type="hidden" name="team" value="<?= $data['team']  ?>">

                                                                        <input type="hidden" name="lawan" value="<?= $data['lawan']  ?>">

                                                                        <div class="form-group">
                                                                           <label>Jumlah Goal</label>
                                                                           <input type="number"value="1" name="goal" class="form-control">
                                                                       </div>

                                                                   </div>
                                                                   <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button class="btn btn-success btn-sm"  data-toggle="modal" data-target="#exampleModalteamasist<?= $data2['id'] ?>">Asist</button>


                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalteamasist<?= $data2['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <h4>Apakah anda ingin menambah asist ? </h4>
                                                    <form method="post" action="<?= base_url('app/add_asist2') ?>">
                                                        <input type="hidden" name="id" value="<?= $data2['id_user']  ?>">

                                                        <input type="hidden" name="team" value="<?= $data['team']  ?>">

                                                        <input type="hidden" name="lawan" value="<?= $data['lawan']  ?>">

                                                        <div class="form-group">
                                                           <label>Jumlah Asist</label>
                                                           <input type="number"value="1" name="asist" class="form-control">
                                                       </div>

                                                   </div>
                                                   <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php } ?>
                </tfoot>
            </table>
        </div>

    </div>

</div>
</div>
</div>

<div class="col-sm-6 mt-4 mb-4">
    <div class="card">
        <div class="card-body">
            <?php 
            if ($data['lawan'] == 'Merah') {
                echo "<h3 class='text-danger'>".$data['lawan']."</h3>";
            }elseif($data['lawan'] == 'Hitam'){

              echo "<h3 class='text-dark'>".$data['lawan']."</h3>";
          }elseif($data['lawan'] == 'Biru'){
              echo "<h3 class='text-primary'>".$data['lawan']."</h3>";
          }else{
              echo "<h3 class='text-secondary'>".$data['lawan']."</h3>";
          }
          ?>

      </div>
      <div class="card-footer">
        <a class="" data-toggle="collapse" href="#collapseExamplelawan<?= $data['lawan'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none;">
           Lihat Team <?= $data['lawan'] ?> <i class="fas fa-arrow-right"> </i>
       </a>

       <div class="collapse" id="collapseExamplelawan<?= $data['lawan'] ?>">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tgl Main</th>
                        <th>Foto</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Tgl Main</th>
                        <th>Foto</th>
                        <th>Opsi</th>
                    </tr>
                    <tbody>
                        <?php 
                        $this->db->where('tgl_main', date('Y-m-d'));
                        $this->db->where('team', $data['lawan']);
                        $main = $this->db->get('tbl_main')->result_array();
                        ?>
                        <?php foreach ($main as $data3) { ?>
                            <tr>
                                <td><?= $data3['nama'] ?></td>
                                <td><?= $data3['tgl_main'] ?></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModallawangoal<?= $data3['id'] ?>" >Goal</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModallawangoal<?= $data3['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <h4>Apakah anda ingin menambah goal ? </h4>
                                          <form method="post" action="<?= base_url('app/add_goal2') ?>">
                                            <input type="hidden" name="id" value="<?= $data3['id_user']  ?>">

                                            <input type="hidden" name="team" value="<?= $data['lawan']  ?>">

                                            <input type="hidden" name="lawan" value="<?= $data['team']  ?>">

                                            <div class="form-group">
                                               <label>Jumlah Goal</label>
                                               <input type="number"value="1" name="goal" class="form-control">
                                           </div>

                                       </div>
                                       <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModallawanasist<?= $data3['id'] ?>" >Asist</button>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModallawanasist<?= $data3['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <h4>Apakah anda ingin menambah asist ? </h4>
                          <form method="post" action="<?= base_url('app/add_asist2') ?>">
                            <input type="hidden" name="id" value="<?= $data3['id_user']  ?>">

                            <input type="hidden" name="team" value="<?= $data['lawan']  ?>">

                            <input type="hidden" name="lawan" value="<?= $data['team']  ?>">

                            <div class="form-group">
                                <label>Jumlah Asist</label>
                                <input type="number"value="1" name="asist" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </td>
</tr>

<?php } ?>
</tbody>
</tfoot>
</table>
</div>

</div>

</div>
</div>
</div>


<?php } ?>
<div />

</div>
</div>

</div> 

</div>

</div> 

</div>