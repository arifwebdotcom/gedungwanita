<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
 
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
            <div class="col-md-2">
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
            </div>
        </div>
        <div id="chartBooking"></div>
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

        $.ajax({
            url: "<?= base_url('dashboard/grouped') ?>",
            method: "GET",
            dataType: "json",
            data: {
                start_date: start,
                end_date: end
            },
            success: function(res) {

                let bulan = res.map(r => r.bulan_indonesia);  // ⬅ Ubah ini
                let keep    = res.map(r => Number(r.keep_count));
                let dp      = res.map(r => Number(r.dp_count));
                let fifty   = res.map(r => Number(r.fifty_count));
                let lunas   = res.map(r => Number(r.lunas_count));

                let options = {
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
                    xaxis: { categories: bulan },  // ⬅ Ubah ini
                    dataLabels: { enabled: true },
                    title: { text: "Booking per Bulan" },
                    legend: { position: 'top' }
                };

                if (chart) chart.destroy();

                chart = new ApexCharts(document.querySelector("#chartBooking"), options);
                chart.render();
            }
        });
    }




</script>
<?= $this->endSection() ?>