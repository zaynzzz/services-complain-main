<div class="container mt-5 col-lg-6">
    <form method="POST" class='mt-5' action="<?= base_url('Keluhan/editproses'); ?>">
        <input type="hidden" name="idkeluhan" value="<?= $sql->idkeluhan; ?>">
        <div class="row">
            <div class="col-lg-2">
                <label style="position:relative; top:7px;">Pelanggan:</label>
            </div>
            <div class="col-lg-10">
                <!--ambil data pelanggan-->
                <select id="idpelanggan" name="idpelanggan" class="form-control readonly">
                    <option value="<?= $sql->idpelanggan; ?>"><?= $sql->nama_pelanggan; ?></option>
                </select>
            </div>
        </div>
        <div style="height:10px;"></div>
        <div class="row">
            <div class="col-lg-2">
                <label style="position:relative; top:7px;">Keluhan:</label>
            </div>
            <div class="col-lg-10">
                <input type="text" name="keluhan" class="form-control" value="<?= $sql->keluhan; ?>">
            </div>
        </div>
        <div style="height:10px;"></div>
        <div class="row">
            <div class="col-lg-2">
                <label style="position:relative; top:7px;">Penyebab:</label>
            </div>
            <div class="col-lg-10">
                <input type="text" name="penyebab" class="form-control" value="<?= $sql->penyebab; ?> tidak stabil">
            </div>
        </div>
        <div style="height:10px;"></div>
        <div class="row">
            <div class="col-lg-2">
                <label style="position:relative; top:7px;">Tindakan:</label>
            </div>
            <div class="col-lg-10">
                <input type="text" name="tindakan" class="form-control" value="<?= $sql->tindakan; ?>">
            </div>
        </div>
        <div style="height:10px;"></div>
        <div class="row">
            <div class="col-lg-2">
                <label style="position:relative; top:7px;">Tgl Keluhan:</label>
            </div>
            <div class="col-lg-10">
                <input type="date" name="tgl_keluhan" class="form-control" value="<?= $sql->tgl_keluhan; ?>-11-15">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label style="position:relative; top:7px;">Tgl Perbaikan:</label>
            </div>
            <div class="col-lg-10">
                <input type="date" name="tgl_perbaikan" class="form-control" value="<?= $sql->tgl_perbaikan; ?>">
            </div>
        </div>
        <div style="height:10px;"></div>
        <div class="row">
            <div class="col-lg-2">
                <label style="position:relative; top:7px;">Teknisi:</label>
            </div>
            <div class="col-lg-10">
                <select id="idteknisi" name="idteknisi" class="form-control">
                    <option>Pilih Teknisi-</option>
                    <option value=" <?= $sql->idteknisi; ?>"><?= $sql->nama_teknisi; ?></option>
                </select>
            </div>
        </div>
        <button type=" submit" class="btn btn-primary|secondary|success|danger|warning|info|light|dark|link">Submit</button>
    </form>
</div>