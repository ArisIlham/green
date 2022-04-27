<!DOCTYPE html>
<html lang="en">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Selamat Datang</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Hai, <?= $nama ?> <br>
                    Selamat Datang Di Aplikasi Green laundry. Cucian anda akan beres hanya dalam waktu 3 jam, Kami siap mejemput dan mengantar cucian anda.</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Status Pesanan</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Kupon" style="background: #43A047; width: 400px; height: auto;">
            <div>
                 </div><img src="assets/img/kupon.png" style="background: #43A047; width:100px; height: 90px; float: left;" >
                 <h5 >Promo Spesial Ramadhan! </h5>
                 <h2 >Diskon 20 %</h2> 
                 <p class="expire" >Expired: 20 Agustus 2022</p>
                 <center><button style="background: #4CAF50; border-color: green;">Klaim</button></center>
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

</html>