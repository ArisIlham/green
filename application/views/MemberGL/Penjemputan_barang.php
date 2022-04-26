<!DOCTYPE html>
<html lang="en">

<div id="layoutSidenav_content">
    <main id="main">
        <div class="penjemputan-page" style="width: 600px; padding: 5% 0 0; margin: auto;">
            <h2>
                <p class="center" style="text-align: center; ">Penjemputan Barang
                <p>
            </h2>
            <div class="form" style=" position: relative; z-index: 1; background: #FFFFFF; max-width: 460px; margin: 0 auto 150px; padding: 65px;text-align: center; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);">
                <form id="order" action="<?= base_url('Member/orderMember') ?>" method="POST">
                    <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class=" form-group">
                        <label style="float: left; margin-top: -22px;padding: 2px; font-size: 14px;" for="nama">Nama</label> <input id="nama" name="nama" value="<?= $nama; ?>" type="text" style=" font-family: 'Roboto', sans-serif; outline: 0; background: #f2f2f2; width: 100%; border: 0;margin: 0 0 15px;padding: 10px; box-sizing: border-box;font-size: 14px;">
                    </div> <br>
                    <div class="form-group">
                        <label style="float: left; margin-top: -22px;padding: 2px; font-size: 14px;" for="alamat">Alamat</label> <input id="alamat" name="alamat" value="<?= $alamat; ?>" type="text" style=" font-family: 'Roboto', sans-serif; outline: 0; background: #f2f2f2; width: 100%; border: 0;margin: 0 0 15px;padding: 10px; box-sizing: border-box;font-size: 14px;">
                    </div> <br>
                    <div class="form-group">
                        <label style="float: left; margin-top: -22px;padding: 2px; font-size: 14px;" for="no_hp">No.Hp</label> <input id="no_hp" name="no_hp" value="<?= $no_hp; ?>" type="text" style=" font-family: 'Roboto', sans-serif; outline: 0; background: #f2f2f2; width: 100%; border: 0;margin: 0 0 15px;padding: 10px; box-sizing: border-box;font-size: 14px;">
                    </div><br>
                    <div class="form-group">
                        <label style="float: left; margin-top: -22px;padding: 2px; font-size: 14px;" for="jenis">Jenis Barang</label> <input id="jenis" name="jenis" type="text" style=" font-family: 'Roboto', sans-serif; outline: 0; background: #f2f2f2; width: 100%; border: 0;margin: 0 0 15px;padding: 10px; box-sizing: border-box;font-size: 14px;">
                    </div><br>
                    <div class="form-group">
                        <label style="float: left; margin-top: -22px;padding: 2px; font-size: 14px;" for="note">Note Barang</label> <input id="note" name="note" type="text" style=" font-family: 'Roboto', sans-serif; outline: 0; background: #f2f2f2; width: 100%; border: 0;margin: 0 0 15px;padding: 10px; box-sizing: border-box;font-size: 14px;">
                    </div><br>
                    <div>
                        <label style="float: left; margin-top: -22px;padding: 2px; font-size: 14px;" for="waktu">Waktu Penjemputan</label> <input id="waktu" name="waktu" type="datetime-local" style=" font-family: 'Roboto', sans-serif; outline: 0; background: #f2f2f2; width: 100%; border: 0;margin: 0 0 15px;padding: 10px; box-sizing: border-box;font-size: 14px;">
                    </div><br>
                    <div>
                        <label style="float: left; margin-top: -22px;padding: 2px; font-size: 14px;" for="kupon">Kupon</label>
                        <select id="kupon" name="kupon" style=" font-family: 'Roboto', sans-serif; outline: 0; background: #f2f2f2; width: 100%; border: 0;margin: 0 0 15px;padding: 10px; box-sizing: border-box;font-size: 14px;">
                            <option>Discount 5%</option>
                        </select>
                    </div>

                    <div class="mt-4 mb-0">
                        <div class="d-grid"><input class="btn btn-primary btn-block" style="background-color: #33A303; border-color: #33A303" type="submit" value="Buat Pesanan"></div>
                    </div>
                </form>
            </div>
        </div>


    </main>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted"></div>
                <div>
                    <a href="#">
                        &middot;
                        <a href="#"></a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

</body>
<script>
    $(document).ready(function() {
        $('#order').validate({
            rules: {
                nama: {
                    required: true,
                    minlength: 3
                },
                no_hp: {
                    required: true,
                    number: true,
                    minlength: 12,
                },
                alamat: {
                    required: true,
                    minlength: 4
                },
                jenis: {
                    required: true,
                    minlength: 4
                },
                waktu: {
                    required: true,
                }
            },
            messages: {
                nama: {
                    required: "Masukkan Nama Anda",
                    minlength: "Masukkan Nama dengan Benar"
                },
                no_hp: {
                    required: "Masukkan Kontak Anda",
                    minlength: "Masukkan Nomor HP dengan Benar",
                    number: "Masukkan Nomor HP dengan Benar"
                },
                alamat: {
                    required: "Masukkan Alamat Penjemputan",
                    minlength: "Masukkan Alamat dengan Benar"
                },
                jenis: {
                    required: "Masukkan Jenis Barang Laundry",
                    minlength: "Masukkan Jenis Barang dengan Benar"
                },
                waktu: {
                    required: "Masukkan Waktu Penjemputan"
                },
            }
        })
    })
</script>

</html>