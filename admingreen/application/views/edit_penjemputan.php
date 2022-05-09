<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">edit penjemputan</h1>
                            </div>
                            <?php foreach($penjemputan as $pjm){ ?>
                            <form class="user" action="<?php echo base_url(). 'Welcome/update_penjemputan'; ?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Berat</label>
                                        <input type="hidden" class="form-control form-control-user" name="id_order"
                                            placeholder="Id Order"  required="" value=<?php echo $pjm->id_order?>>
                                        <input type="text" class="form-control form-control-user" name="berat"
                                            placeholder="Berat"  required="" value=<?php echo $pjm->berat?>>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Harga</label>
                                        <input type="text" class="form-control form-control-user" name="harga"
                                            placeholder="Harga"  required="" value=<?php echo $pjm->harga?>>
                                    </div>
                                </div>
                                <hr>
                                <button type = "submit" class="btn btn-primary btn-user btn-block">
                                    Edit Tagihan
                                </button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>