<div class="alert alert-danger text-center">
    Anda belum mendaftar tahap 2. Mohon untuk daftar terlebih dahulu
</div>
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Formulir Pendaftaran Tahap 2</h3>
        <form action="{{ route('create_casis') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label for="nisn">Nisn</label>
                <input type="number" name="nisn" value="{{ $tahap_1->nisn }}"
                    class="form-control @error('nisn')
                                        is-invalid
                                    @enderror"
                    placeholder="Massukan nisn yang valid" autocomplete="off" readonly required>
                @error('nisn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="nik">Nik</label>
                <input type="number" name="nik"
                    class="form-control @error('nik')
                                        is-invalid
                                    @enderror"
                    placeholder="Massukan nik yang valid" autocomplete="off" required>
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="nama">Nama Lengkap</label>
                <input type="text"
                    class="form-control @error('nama')
                                        is-invalid
                                    @enderror"
                    name="nama" value="{{ $tahap_1->nama_lengkap }}" placeholder="Nama Lengkap siswa"
                    autocomplete="off" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="ttl">Tanggal Lahir</label>
                <input type="text" name="ttl"
                    class="form-control @error('ttl')
                                        is-invalid
                                    @enderror"
                    placeholder="Contoh: Cirebon, 22 Juni 2007" autocomplete="off" required>
                @error('ttl')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" rows="5"
                    class="form-control @error('alamat')
                                        is-invalid
                                    @enderror"
                    placeholder="Alamat lengkap"></textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="agama">Agama</label>
                <input type="text" name="agama"
                    class="form-control @error('agama')
                                        is-invalid
                                    @enderror"
                    autocomplete="off" required>
                @error('agama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" 
                    class="form-select @error('jenis_kelamin')
                                        is-invalid
                                    @enderror">
                    <option value="{{ $tahap_1->jenis_kelamin }}" selected>{{ $tahap_1->jenis_kelamin }}</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="jurusan_id">Jurusan</label>
                <select name="jurusan_id" 
                    class="form-select @error('jurusan_id')
                                        is-invalid
                                    @enderror">
                    <option value="{{ $tahap_1->jurusan_id }}" selected>
                        {{ $tahap_1->jurusan->nama_jurusan }}
                    </option>
                </select>
                @error('jurusan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" value="{{ $tahap_1->asal_sekolah }}"
                    class="form-control @error('asal_sekolah')
                                        is-invalid
                                    @enderror"
                    placeholder="Asal sekolah siswa" autocomplete="off" readonly required>
                @error('asal_sekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="no_hp">No Whatsapp Aktif</label>
                <input type="number" name="no_hp" value="{{ $tahap_1->no_hp }}"
                    class="form-control @error('no_hp')
                                        is-invalid
                                    @enderror"
                    placeholder="08xx xxxx xxx" autocomplete="off" readonly required>
                @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="foto">Pas Foto</label><small class="text-danger"> maximal 10mb</small>
                <input type="file" name="foto"
                    class="form-control @error('foto')
                                        is-invalid
                                    @enderror">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>
