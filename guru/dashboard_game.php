<body>
    <?php
    include '../koneksi2.php';

    try {
        $sql = "SELECT * FROM sigamingclub.game";
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0) {
            $avg_time = array();
            $longest_time = array();
            $avg_scr = array();
            $highest_scr = array();
            while ($row = $result->fetch()) {
                $avg_time[] = $row["avg_time"];
                $longest_time[] = $row["longest_time"];
                $avg_score[] = $row["avg_score"];
                $highest_score[] = $row["highest_score"];
            }
            unset($result);
        } else {
            echo "No records matching your query were found.";
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
                    <h1 class="m-0"><i class="fas fa-chart-pie fa-sm"></i> Dashboard Game</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right"></ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content">
        <div class="container-fluid p-4 d-flex justify-content-center ">
            <div class="row chartBox">
                <div class="col-12 ">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Setup Block
        const avg_time = <?php echo json_encode($avg_time); ?>;
        const longest_time = <?php echo json_encode($longest_time); ?>;
        const avg_score = <?php echo json_encode($avg_score); ?>;
        const highest_score = <?php echo json_encode($highest_score); ?>;
        const length = avg_time.length;

        const data = {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu' ],
            datasets: [{
                label: 'Rata-Rata Waktu Bermain',
                data: avg_time,
                borderWidth: 1
            }, {
                label: 'Waktu Bermain Terlama',
                data: longest_time,
                borderWidth: 1
            }]
        };

        // Config Block
        const config = {
            type: 'bar',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
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