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
                                <a href="#" id="team<?= $data['team'] ?>">Lihat team <?= $data['team'] ?></a>

                                <div class="table-responsive" id="table<?= $data['team'] ?>" style="display: none;">
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
                                                            <button class="btn btn-primary btn-sm">Goal</button>
                                                            <button class="btn btn-success btn-sm">Asist</button>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                            </tfoot>
                                        </table>
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
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                   Lihat Team <?= $data['team'] ?>
                               </a>

                               <div class="collapse" id="collapseExample<?= $data['team'] ?>">
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
                                                            <button class="btn btn-primary btn-sm">Goal</button>
                                                            <button class="btn btn-success btn-sm">Asist</button>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script>

                            $(document).ready(function(){
                               $("#team<?= $data['team'] ?>").click(function(){
                                $("#table<?= $data['team'] ?>").show();
                            })

                           })

                       </script>
                   <?php } ?>
                   <div />

               </div>
           </div>
       </div> 

   </div>