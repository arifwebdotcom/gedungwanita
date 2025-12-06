<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
 
    <div class="col-xxl-12 align-self-end" style="margin-bottom: 20px;">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Transaksi</h5>            
          </div>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="avatar">
                  <div class="avatar-initial bg-primary rounded shadow-xs">
                    <i class="icon-base ri ri-pie-chart-2-line icon-24px"></i>
                  </div>
                </div>
                <div class="ms-3">
                  <p class="mb-0">Pendapatan Total Tahun Ini</p>
                  <h5 class="mb-0"><?= rupiah($tahunini->total_harga+ $tahunini->lainlain) ?></h5>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="avatar">
                  <div class="avatar-initial bg-success rounded shadow-xs">
                    <i class="icon-base ri ri-group-line icon-24px"></i>
                  </div>
                </div>
                <div class="ms-3">
                  <p class="mb-0">Client Tahun Ini</p>
                  <h5 class="mb-0"><?= $tahunini->total_client ?></h5>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="avatar">
                  <div class="avatar-initial bg-warning rounded shadow-xs">
                    <i class="icon-base ri ri-hand-coin-line icon-24px"></i>
                  </div>
                </div>
                <div class="ms-3">
                  <p class="mb-0">Pendapatan Lain-lain</p>
                  <h5 class="mb-0"><?= rupiah($tahunini->lainlain) ?></h5>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="avatar">
                  <div class="avatar-initial bg-info rounded shadow-xs">
                    <i class="icon-base ri ri-money-dollar-circle-line icon-24px"></i>
                  </div>
                </div>
                <div class="ms-3">
                  <p class="mb-0">Pendapatan Event</p>
                  <h5 class="mb-0"><?= rupiah($tahunini->total_harga) ?></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
    <h5 class="card-header">Contextual Classes</h5>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Start Date</label>
                <input type="date" id="start_date" class="form-control">
            </div>
            <div class="col-md-4">
                <label>End Date</label>
                <input type="date" id="end_date" class="form-control">
            </div>
            
            <div class="col-md-2">
                <label>&nbsp;</label>
                <button class="btn btn-primary w-100" onclick="loadChart()">Filter</button>
            </div>
            <!-- <div class="col-md-2">
                <label class="switch switch-primary mt-8">
                <input type="checkbox" class="switch-input" checked="">
                <span class="switch-toggle-slider">
                  <span class="switch-on">
                    <i class="icon-base ri ri-check-line"></i>
                  </span>
                  <span class="switch-off">
                    <i class="icon-base ri ri-close-line"></i>
                  </span>
                </span>
                <span class="switch-label">Model Chart</span>
              </label>
            </div> -->
        </div>
        <div class="row">
            <div class="col-6">
                <div id="chartBooking"></div>
            </div>
            <div class="col-6">
                <div id="chartPiutang" ></div>
            </div>
        </div>
    </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url() ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script>
    $(document).ready(function() {
         loadChart();       
    });

    function lineChart() {
        chart.updateOptions({
            chart: { type: 'line', stacked: false }
        });
    }

    function barChart() {
        chart.updateOptions({
            chart: { type: 'bar', stacked: true }
        });
    }

    let chart; 

    function loadChart() {
        let start = $('#start_date').val();
        let end   = $('#end_date').val();
        let chartBooking = null;
        let chartPiutang = null;

        $.ajax({
            url: "<?= base_url('dashboard/grouped') ?>",
            method: "GET",
            dataType: "json",
            data: {
                start_date: start,
                end_date: end
            },
            success: function(res) {

                // ============================================================
                // 1.   CHART BOOKING (STACKED)
                // ============================================================
                var data = res.dataclient;

                let bulan1 = data.map(r => r.bulan_indonesia);
                let keep    = data.map(r => Number(r.keep_count));
                let dp      = data.map(r => Number(r.dp_count));
                let fifty   = data.map(r => Number(r.fifty_count));
                let lunas   = data.map(r => Number(r.lunas_count));

                let options1 = {
                    chart: {
                        type: 'bar',
                        stacked: true,
                        height: 380
                    },
                    series: [
                        { name: 'KEEP',  data: keep },
                        { name: 'DP',    data: dp },
                        { name: '50%',   data: fifty },
                        { name: 'LUNAS', data: lunas }
                    ],
                    xaxis: { categories: bulan1 },
                    dataLabels: { enabled: true },
                    title: { text: "Client per Bulan" },
                    legend: { position: 'top' }
                };

                if (chartBooking) chartBooking.destroy();
                chartBooking = new ApexCharts(document.querySelector("#chartBooking"), options1);
                chartBooking.render();


                // ============================================================
                // 2.   CHART PIUTANG (GROUPED BAR)
                // ============================================================
                const dataBulan = res.datapiutang;

                let bulan2 = dataBulan.map(r => r.bulan_indonesia);
                let tagihan = dataBulan.map(r => Number(r.total_tagihan));
                let bayar   = dataBulan.map(r => Number(r.total_bayar));
                let piutang = dataBulan.map(r => Number(r.total_piutang));

                let options2 = {
                    chart: {
                        type: 'bar',
                        height: 380
                    },
                    plotOptions: {
                        bar: { horizontal: false, columnWidth: '55%' }
                    },
                    series: [
                        { name: 'Total Tagihan', data: tagihan },
                        { name: 'Total Bayar',   data: bayar },
                        { name: 'Total Piutang', data: piutang }
                    ],
                    xaxis: { categories: bulan2 },
                    dataLabels: { enabled: true },
                    title: { text: "Piutang Bulanan" },
                    legend: { position: 'top' }
                };

                if (chartPiutang) chartPiutang.destroy();
                chartPiutang = new ApexCharts(document.querySelector("#chartPiutang"), options2);
                chartPiutang.render();

            }
        });

    }




</script>
<?= $this->endSection() ?>