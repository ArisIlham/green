<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tambah Promo</h1>
                            </div>
                            <form class="user" action="<?php echo base_url(). 'Welcome/tambahpromoaksi'; ?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="kode_kupon"
                                            placeholder="Kode Promo"  required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="judul_kupon"
                                            placeholder="Judul Kupon"  required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user"
                                            name="masa_berlaku"  required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            name="min_laundry" placeholder="Minimal Laundry"  required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            name="persentase_diskon" placeholder="Persentase Diskon"  required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            name="tier_kupon" placeholder="Tier Kupon"  required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="jumlah_klaim"
                                        placeholder="Jumlah Klaim">
                                </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control form-control-user" name="keterangan"
                                        placeholder="Keterangan"  required=""></textarea>
                                </div>
                                <hr>
                                <button type = "submit" class="btn btn-primary btn-user btn-block">
                                    Tambah Promo
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>