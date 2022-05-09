<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tambah Karyawan</h1>
                            </div>
                            <form class="user" action="<?php echo base_url(). 'Welcome/tambahkaryawanaksi'; ?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="id_karyawan"
                                            placeholder="ID Karyawan"  required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="nama"
                                            placeholder="Nama"  required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user"
                                            name="tanggal_terdaftar"  required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            name="no_hp" placeholder="Nomor Handphone"  required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="alamat"
                                        placeholder="Alamat">
                                </div>
                                <hr>
                                <button type = "submit" class="btn btn-primary btn-user btn-block">
                                    Tambah Karyawan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>