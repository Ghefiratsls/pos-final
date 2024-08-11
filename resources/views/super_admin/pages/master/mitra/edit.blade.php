<form action="{{ url('super_admin/master/mitra/' . $edit['id']) }}" enctype="multipart/form-data" method="POST">
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nama Pemilik Usaha</label>
                        <input class="form-control" value="{{ $edit['user']['nama'] }}"
                            placeholder="Masukan Nama Pemilik Mitra" name="namaPemilikMitra" type="text" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Email Pemilik Usaha</label>
                        <input class="form-control" value="{{ $edit['user']['email'] }}"
                            placeholder="Masukan Email Mitra" name="emailPemilikMitra" type="email" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="place-bottom-right" class="form-label">Foto Pemilik Usaha</label>
                <input type="file" name="fotoPemilikMitra" class="dropify" data-height="200">
                <label class="form-label mt-5">Foto Pemilik Usaha</label>
                <img src="{{ asset('' . $edit['user']['foto']) }}" style="width:100px;height:100">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nama Usaha</label>
                        <input class="form-control" value="{{ $edit['namaMitra'] }}" placeholder="Masukan Nama Mita"
                            name="namaMitra" type="text" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">No.Hp Usaha</label>
                        <input class="form-control" value="{{ $edit['nomorHp'] }}" placeholder="Masukan Nomor Hp Mitra"
                            name="noTelpMitra" type="number" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="place-bottom-right" class="form-label">Foto Usaha</label>
                <input type="file" name="fotoMitra" class="dropify" data-height="200">
                <label class="form-label mt-5">Foto Usaha</label>
                <img src="{{ asset('' . $edit->fotoMitra) }}" style="width:100px;height:100">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        @include('template.component.button.button_modal')
    </div>
</form>

<script src="{{ url('/assets') }}/plugins/fileuploads/js/fileupload.js"></script>
<script src="{{ url('/assets') }}/plugins/fileuploads/js/file-upload.js"></script>
