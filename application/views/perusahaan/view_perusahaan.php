<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="header-title" align="center">DATA PERUSAHAAN</h2>
                <div class="table-rep-plugin">
                    <a href="<?php echo base_url(); ?>perusahaan/input_perusahaan" class="btn btn-primary btn-sm input">Tambah Data</a>
                    <div class="table-responsive mb-0">
                        <table id="tech-companies-1" class="table table-striped table-bordered table-hover table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Perusahaan</th>
                                    <th>Alamat</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Desa</th>
                                    <th>No HP</th>
                                    <th>Email</th>
                                    <th>Exp Date</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) { ?>
                                    <tr>
                                        <td><?php echo $d->nama_perusahaan; ?></td>
                                        <td><?php echo $d->alamat; ?></td>
                                        <td><?php echo $d->provinsi; ?></td>
                                        <td><?php echo $d->kota; ?></td>
                                        <td><?php echo $d->kecamatan; ?></td>
                                        <td><?php echo $d->desa; ?></td>
                                        <td><?php echo $d->no_hp; ?></td>
                                        <td><?php echo $d->email; ?></td>
                                        <td><?php echo $d->exp_date; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a data-kode="<?php echo $d->kode_perusahaan; ?>" class="btn btn-outline-secondary btn-sm detail" title="View">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <a class="btn btn-outline-secondary btn-sm" title="Edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="#" class="btn btn-outline-secondary btn-sm delete" data-href="<?php echo base_url(); ?>perusahaan/hapus_perusahaan/<?php echo $d->kode_perusahaan; ?>" title="Delete">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </a>
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
    </div>
</div>

<div class="modal fade" id="detailperusahaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Detail Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="loaddetailperusahaan">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {

        $('.detail').click(function(e) {
            e.preventDefault();
            var kode_perusahaan = $(this).attr('data-kode');
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>perusahaan/detail_perusahaan',
                data: {
                    kode_perusahaan: kode_perusahaan
                },
                cache: false,
                success: function(respond) {
                    $("#loaddetailperusahaan").html(respond);
                    $("#detailperusahaan").modal("show");
                }
            });
        });

    });
</script>