<div class="modal fade" id="modalCatatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title capitalize" id="modalCatatanTitle">Catatan KBM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body cus-font">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title?></h1>
        </div>
        
        <!-- berhasil memindahkan peserta -->
        <?php if( $this->session->flashdata('pesan') ) : ?>
            <div class="row">
                <div class="col-6">
                    <?= $this->session->flashdata('pesan');?>
                    </div>
            </div>
        <?php endif; ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4 w-100">
        <div class="card-body">
            <form action="controllers/badal/konfirmasi.php" method="POST">
            <div class="table-responsive">
                <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                    <thead>
                        <th width=3%>No</th>
                        <th width=10%>Program</th>
                        <th width=10%>Tipe</th>
                        <th>Koor</th>
                        <th>Waktu</th>
                        <th>Pengajar</th>
                        <th>Badal</th>
                        <th width=7%>Catatan</th>
                        <th width=7%><center>Konfirmasi</center></th>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach ($jadwal as $jadwal) :?>
                            <tr>
                                <td><?= ++$no?></td>
                                <td><?= $jadwal['program_kbm']?></td>
                                <td><?= $jadwal['tipe_kelas']?></td>
                                <td><?= $jadwal['peserta']?></td>
                                <td><?= $jadwal['hari']?>, <?= date("d-M-Y", strtotime($jadwal['tgl']))?> (<?= $jadwal['jam']?>)</td>
                                <td><?= $jadwal['kpq']?></td>
                                <td><?= $jadwal['kpq_badal']?></td>
                                <td><center><a href="#modalCatatan" class="modal-catatan" data-id="<?= $jadwal['id_kbm']?>" data-toggle="modal"><i class="fa fa-exclamation text-info"></i></a></center></td>
                                <td>
                                    <?php if($jadwal['status'] == 'konfirm'):?>
                                        <a href="<?= base_url()?>badal/delete_badal_by_id_kbm/<?= $jadwal['id_kbm']?>" onclick="return confirm('Yakin tidak menyetujui kelas badal ini?')" class="btn btn-danger btn-sm" id="btn-delete"><i class="fa fa-times"></i></a>
                                        <a href="<?= base_url()?>badal/konfirm_badal/<?= $jadwal['id_kbm']?>" onclick="return confirm('Yakin menyetujui kelas badal ini?')" class="btn btn-success btn-sm" id="btn-konfirm"><i class="fa fa-check" style="font-size: 12px"></i></a>
                                    <?php else :?>
                                        <center>-</center>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            </form>
        </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>

<script>
    $("#badal").addClass("active");

    $(".modal-catatan").on("click", function(){
        let id = $(this).data("id");

        $.ajax({
            url: "<?= base_url()?>badal/get_catatan_badal_by_id",
            data: {id: id},
            dataType: 'json',
            method: 'POST',
            success: function(data){
                $(".modal-body").html(data.catatan);
            }
        })
    })
</script>