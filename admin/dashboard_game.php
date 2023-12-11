<body>
    <?php
    include '../koneksi.php';
    include '../koneksi2.php';

    if ($_GET['id_game']);

    try {
        $sql = "SELECT * FROM sinurulhuda.log_game WHERE `id_game`='".$_GET['id_game']."'";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            $avg_time = array();
            $labelx = array();
            while ($row = $result->fetch()) {
                $waktu_mulai = isset($row['waktu_mulai']) ? $row['waktu_mulai'] : '-';
                $waktu_entry = isset($row['waktu_entry']) ? $row['waktu_entry'] : '-';
                $time_mulai = DateTime::createFromFormat('Y-m-d H:i:s',  $waktu_mulai)->format('i');
                $time_entry = DateTime::createFromFormat('Y-m-d H:i:s',  $waktu_entry)->format('i');

                $wkt_mulai = new DateTime($row['waktu_mulai']);
                $since_start = $wkt_mulai->diff(new DateTime($row['waktu_entry']));
                $minutes = $since_start->days * 24 * 60;
                $minutes += $since_start->h * 60;
                $minutes += $since_start->i;
                
                $total_waktu = abs($time_mulai - $time_entry);
                $avg_time[] = $minutes;

                $labelx[] = DateTime::createFromFormat('Y-m-d H:i:s',  $waktu_mulai)->format('d.m.Y');
            }
            unset($result);
        } else {
            echo "Data Waktu Bermain Player Tidak Ditemukan!";
        }
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
    unset($pdo);
    ?>

    <div class="content-header">
        <div class="container-fluid px-lg-5">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-chart-pie fa-sm"></i> Overview Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right"></ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content">
        <div class="container-fluid p-4 d-flex justify-content-center">
            <div class="row">
                <div class="position-relative col-12 col-sm-12 mb-4 chartBox bg-white rounded" >
                    <canvas id="myChart" ></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script>
        // Setup Block
        const avg_time = <?php echo json_encode($avg_time); ?>;
        const labelx = <?php echo json_encode($labelx); ?>;

        const data = {
            labels: labelx,
            datasets: [{
                label: 'Waktu Bermain Players',
                data: avg_time,
                fill: true,
                borderWidth: 1}, 
            ]
        };

        // Config Block
        const config = {
            type: 'bar',
            data,
            options: {
                interaction: {
                    mode: 'index'
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value, index, ticks) {
                                return value + ' mnt';
                            }
                        }
                    },
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day',
                            parser: 'dd.MM.yyyy'
                        },
                    }
                }
            }
        };

        // Render Block
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
<aside class="control-sidebar control-sidebar-dark"></aside>