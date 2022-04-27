<div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2">
        <label class="control-label" style="position:relative; top:7px;">Keluhan:</label>
    </div>
    <div class="col-lg-10">
        <input type="text" class="form-control" value="<?= $perbaikan->keluhan; ?>" readonly name="keluhan">
    </div>
</div>
<div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2">
        <label class="control-label" style="position:relative; top:7px;">Penyebab:</label>
    </div>
    <div class="col-lg-10">
        <input value="<?= $perbaikan->penyebab; ?>" type="text" class="form-control" readonly name="penyebab">
    </div>
</div>
<div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2">
        <label class="control-label" style="position:relative; top:7px;">Tindakan:</label>
    </div>
    <div class="col-lg-10">
        <input value="" type="text" class="form-control" name="tindakan">
    </div>
</div>
<div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2">
        <label class="control-label" style="position:relative; top:7px;">Perbaikan:</label>
    </div>
    <div class="col-lg-10">
        <input value="" type="text" class="form-control" name="perbaikan">
    </div>
</div>
<div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2">
        <label style="position:relative; top:7px;">Tgl Keluhan:</label>
    </div>
    <div class="col-lg-10">
        <input value="<?= $perbaikan->tgl_keluhan; ?>" type="date" class="form-control" readonly name="tgl_keluhan">
    </div>
</div>
<div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2">
        <label style="position:relative; top:7px;">Tgl Perbaikan:</label>
    </div>
    <div class="col-lg-10">
        <input value="" type="datetime-local" class="form-control" name="tgl_perbaikan">
    </div>
</div>
<div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2">
        <label class="control-label" style="position:relative; top:7px;">Teknisi:</label>
    </div>
    <div class="col-lg-10">
        <!--ambil data propinsi-->
        <select id="idteknisi" readonly name="idteknisi" class="form-control">
            <option value="<?= $perbaikan->idteknisi; ?>"><?= $perbaikan->nama_teknisi; ?></option>
        </select>
    </div>
</div>