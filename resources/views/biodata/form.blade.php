<input id="user_id" type="hidden" value="{{$id}}" class="form-control" name="user_id" required>
<div class="row mb-3">
    <label for="nama_lengkap" class="col-md-4 col-form-label text-md-end">Nama Lengkap</label>

    <div class="col-md-6">
        <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{ isset($data_existing[0]) ? $data_existing[0]->nama_lengkap : '' }}"  required>
    </div>
</div>

<div class="row mb-3">
    <label for="tempat_lahir" class="col-md-4 col-form-label text-md-end">Tempat Lahir</label>

    <div class="col-md-6">
        <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ isset($data_existing[0]) ? $data_existing[0]->tempat_lahir : '' }}"   required>
    </div>
</div>
<div class="row mb-3">
    <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-end">Tanggal Lahir</label>

    <div class="col-md-6">
        <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ isset($data_existing[0]) ? $data_existing[0]->tanggal_lahir : '' }}"   required>
    </div>
</div>
<div class="row mb-3">
    <label for="posisi_dilamar" class="col-md-4 col-form-label text-md-end">Posisi Dilamar</label>

    <div class="col-md-6">
        <select name="posisi_dilamar" id="posisi_dilamar" class="form-control">
            <option value="" selected disabled>Pilih Posisi</option>
            <option value="HR" {{ isset($data_existing) && $data_existing[0]->posisi_dilamar == 'HR' ? 'selected' : '' }}>HR</option>
            <option value="Software Engineer" {{ isset($data_existing) && $data_existing[0]->posisi_dilamar == 'Software Engineer' ? 'selected' : '' }}>Software Engineer</option>
        </select>
    </div>
</div>


