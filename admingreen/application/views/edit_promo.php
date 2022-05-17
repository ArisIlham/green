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
                        <?php foreach ($kupon as $row) { ?>
                            <form class="user" action="<?php echo base_url() . 'Welcome/update_promo'; ?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Kode Kupon</label>
                                        <input type="hidden" class="form-control form-control-user" name="id_kupon" placeholder="Id Kupon" required="" value=<?php echo $row->id_kupon ?>>
                                        <input type="text" class="form-control form-control-user" name="kode_kupon" placeholder="Kode Kupon" required="" value=<?php echo $row->kode_kupon ?>>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Judul Kupon</label>
                                        <input type="text" class="form-control form-control-user" name="judul_kupon" placeholder="Judul Kupon" required="" value=<?php echo $row->judul_kupon ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Persentase Diskon</label>
                                        <input type="text" class="form-control form-control-user" name="persentase_diskon" placeholder="Persentase Diskon" required="" value=<?php echo $row->persentase_diskon ?>>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Min Laundry</label>
                                        <input type="text" class="form-control form-control-user" name="min_laundry" placeholder="Minimal Laundry" required="" value=<?php echo $row->min_laundry ?>>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Masa Berlaku</label>
                                    <input type="date" class="form-control form-control-user" name="masa_berlaku" placeholder="Masa Berlaku" required="" value=<?php echo $row->masa_berlaku ?>>
                                </div>
                                <div class="form-group">
                                    <label>Tier Member</label>
                                    <select class="form-control" name="tier_kupon" value=<?php echo $row->tier_member  ?> required="">
                                        <option value="1" selected>Silver</option>
                                        <option value="2">Gold</option>
                                        <option value="3">Platinum</option>
                                        <option value="4">Semua Tier</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Klaim</label>
                                    <input type="text" class="form-control form-control-user" name="jumlah_klaim" placeholder="Jumlah Klaim" required="" value=<?php echo $row->jumlah_klaim ?>>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea type="text" class="form-control form-control-user" name="keterangan" placeholder="Keterangan" required=""><?php echo $row->keterangan ?></textarea>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Edit Promo
                                </button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>