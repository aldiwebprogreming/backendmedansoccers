 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Setting  Lawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Setting Lawan</h6>

            <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModaladd"><i class="fas fa-plus"></i> Setting Lawan</button>

            <div class="modal fade" id="exampleModaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Setting Lawan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?= base_url('app/set_lawan') ?>">

                    <div class="form-group">
                        <labal>Lawan</labal>
                        <select class="form-control" name="jadwal">
                            <option>-- Pilih Jadwal --</option>
                            <option value="1">Jadwal 1</option>
                            <option value="2">Jadwal 2</option>
                            <option value="3">Jadwal 3</option>
                        </select>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Terapkan</button>
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
                    <th>Team</th>
                    <th>Lawan</th>
                    <th>Jadwal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>Team</th>
                  <th>Lawan</th>
                  <th>Jadwal</th>
                  <th>Status</th>
              </tr>
          </tfoot>
          <tbody>
            <?php foreach ($lawan as $data) { ?>


                <tr>
                    <td><?= $data['team'] ?></td>
                    <td><?= $data['lawan'] ?></td>
                    <td><?= $data['jadwal'] ?></td>
                    <td>
                        <?php 
                        if ($data['status'] == 1) {
                            echo "<small class='text-success'> Diterapkan </small>";
                        }else{
                           echo "<small class='text-danger'> Tidak </small>";
                       }
                       ?>
                   </td>
               </tr>

           <?php } ?>

       </tbody>
   </table>
</div>
</div>
</div> 

</div>