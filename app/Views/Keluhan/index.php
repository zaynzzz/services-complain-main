<div class="container-fluid py-3 my-5">
    <div class="row justify-content-between d-flex px-3">
        <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
        <?= (session()->get('level') == "admin") ? "<a class='btn addbtn btn-primary' href='#' role='button'>Add</a>" : ""; ?>

        <div class="modal " id="tambah_keluhan" tabindex="-1" role="dialog" aria-labelleconny="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambah Keluhan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form method="POST" action="<?= base_url('Keluhan/add'); ?>">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Nama Pelanggan:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <!--ambil data propinsi-->
                                        <select id="idpelanggan" name="idpelanggan" class="form-control">
                                            <option value="">-Pilih Pelanggan-</option>
                                            <option value='21'>Badan Pengawas Obat dan Makanan</option>
                                            <option value='23'>Core Laboratories Indonesia</option>
                                            <option value='18'>LIPI</option>
                                            <option value='22'>LPPOM MUI</option>
                                            <option value='19'>Petro China</option>
                                            <option value='26'>PT. Panca Amara Utama</option>
                                            <option value='20'>PT. Pertamina</option>
                                            <option value='24'>Pt. Unilab Perdana</option>
                                            <option value='25'>Pusat Hiperkes Dan Keselamatan Kerja</option>
                                            <option value='16'>UIN Syarif Hidayatullah Jakarta</option>
                                            <option value='17'>Universitas Indonesia</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Keluhan:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="keluhan">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Penyebab:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="penyebab">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Tindakan:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="tindakan">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label style="position:relative; top:7px;">Tgl Keluhan:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="date" class="form-control" name="tgl_keluhan">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label style="position:relative; top:7px;">Tgl Perbaikan:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="date" class="form-control" name="tgl_perbaikan">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Teknisi:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <!--ambil data propinsi-->
                                        <select id="idteknisi" name="idteknisi" class="form-control">
                                            <option value="">-Pilih Teknisi-</option>
                                            <option value='11'>Dimas</option>
                                            <option value='8'>Eka Rizky Febrian</option>
                                            <option value='10'>Iqbal Ramadhan</option>
                                            <option value='9'>Rifqi Hermawan</option>
                                            <option value='12'>Rivai Abustam</option>
                                        </select>
                                    </div>
                                </div>
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
    </div>

    <h1>Data Keluhan</h1>
    <table id='keluhantable' class="table table-striped|sm|bordered|hover|inverse table-inverse table-responsive">
        <thead class="thead-inverse|thead-default">
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Keluhan</th>
                <th>Penyebab</th>
                <th>Tindakan</th>
                <th>Tgl Keluhan</th>
                <th>Tgl Perbaikan</th>
                <th>Nama Teknisi</th>
                <th>Action</th>
            </tr>
        <tbody>
            <?php $i = 1;

            foreach ($keluhan as $row) {
            ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row->nama_pelanggan; ?></td>
                    <td><?= $row->keluhan; ?></td>
                    <td><?= $row->penyebab; ?></td>
                    <td><?= $row->tindakan; ?></td>
                    <td><?= $row->tgl_keluhan; ?></td>
                    <td><?= $row->tgl_perbaikan; ?></td>
                    <td><?= $row->nama_teknisi; ?></td>
                    <td>
                        <button value="<?= $row->idkeluhan; ?> " class='btn btn-success' onclick="getid(this.value)">Edit</button>
                        <button value="<?= $row->idkeluhan; ?> " class='btn btn-danger' onclick="getid(this.value)">Delete</button>
                    </td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</div>
</div>
<div class="modal " id="edit_keluhan" tabindex="1" role="dialog" aria-labelleconny="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Keluhan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div id="tampilkandata"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function getid(id) {
        var id = id;
        $.ajax({
            type: "POST",
            url: "<?= base_url("Keluhan/editData"); ?>",
            data: {
                "id": id
            },
            dataType: "html",
            success: function(html) {
                $('#edit_keluhan').modal('show');
                $("#tampilkandata").html(html);
            }
        });
    }
</script>
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
    $(function() {
        $('#keluhantable').dataTable();
    });
</script>
</div>