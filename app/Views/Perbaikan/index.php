<div class="container-fluid py-3 my-5 mx-auto">
    <div class="row justify-content-between d-flex px-3">
        <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
        <?php

        $sql = db_connect()->query('SELECT * FROM keluhan JOIN pelanggan ON keluhan.idpelanggan=pelanggan.idpelanggan')->getResultArray();
        // dd($sql->idpelanggan);
        ?>
        <h1>Pending</h1>
        <div class="modal " id="tambah_keluhan" tabindex="-1" role="dialog" aria-labelleconny="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambah Keluhan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form method="POST" action="<?= base_url('Perbaikan/add'); ?>">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Nama Pelanggan:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <!--ambil data propinsi-->
                                        <select id="idpelanggan" name="idpelanggan" class="form-control">
                                            <option value="">-Pilih Pelanggan-</option>
                                            <?php foreach ($sql as $sql) : ?>
                                                <option value='<?= $sql['idkeluhan']; ?>'><?= $sql['nama_pelanggan'] . "-" . $sql['idkeluhan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div id="tampilkangetdata"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn hide btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        <table id='keluhantable' class="mx-auto table table-striped|sm|bordered|hover|inverse table-inverse table-responsive">
            <?= (session()->get('level') == "teknisi") ? "<a class='btn my-2 addbtn btn-primary' href='#' role='button'>Add</a>" : ""; ?>
            <table class="table table-striped|sm|bordered|hover|inverse table-inverse table-responsive">
                <thead class="thead-inverse|thead-default">
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Keluhan</th>
                    <th>Nama Teknisi</th>
                    <th>Perbaikan</th>
                    <th>Tgl Perbaikan</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                <tbody>
                    <?php $i = 1;
                    foreach ($perbaikan as $row) {
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->nama_pelanggan; ?></td>
                            <td><?= $row->keluhan; ?></td>
                            <td><?= $row->nama_teknisi; ?></td>
                            <td><?= $row->perbaikan; ?></td>
                            <td><?= $row->tgl_perbaikan; ?></td>
                            <td>
                                <button class="btn <?= ($row->finished === "1") ? "btn-success" : "btn-danger"; ?>" id=""><?= ($row->finished === "1") ? "Success" : "Pending"; ?></button>
                            </td>
                            <td>
                                <button class="btn btn-success fa fa-check-circle" onClick="getid(this.value)" value="<?= $row->idperbaikan; ?>" id="selesai"></button>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                    <i class="" aria-hidden="true"></i>
                </tbody>
            </table>
    </div>
</div>
<hr>
<h1>Sukses</h1>
<hr>
<table class="table table-striped|sm|bordered|hover|inverse table-inverse table-responsive">
    <thead class="thead-inverse|thead-default">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Keluhan</th>
            <th>Nama Teknisi</th>
            <th>Perbaikan</th>
            <th>Tgl Perbaikan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody id='sukses'>
    </tbody>
</table>
</div>
<script>
    $("#keluhantable").DataTable();
    $("#sukseskeluhan").DataTable();
</script>
</div>
<script>
    $(document).ready(function() {
        $(".addbtn").click(function(e) {
            e.preventDefault();
            $("#tambah_keluhan").show();
        });
        $(".hide").click(function(e) {
            e.preventDefault();
            $("#tambah_keluhan").hide();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url('perbaikan/getsukses'); ?>",
            method: "POST",
            async: true,
            dataType: 'html',
            success: function(html) {
                $('#sukses').html(html);
            }
        });
        return false;
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#idpelanggan').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url('perbaikan/getdata'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'html',
                success: function(html) {
                    $('#tampilkangetdata').html(html);
                }
            });
            return false;
        });

    });
</script>
<script>
    function getid(id) {
        var id = id;
        $.ajax({
            type: "POST",
            data: {
                'id': id
            },
            url: "<?= base_url("Perbaikan/finished"); ?>",
            success: function(data) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
                window.location.reload(300);
            }
        });

    }
</script>