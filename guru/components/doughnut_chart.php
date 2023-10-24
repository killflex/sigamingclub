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

    <div class="container-fluid p-4 d-flex justify-content-center chartBox">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Setup Block
        const avg_score = <?php echo json_encode($avg_score); ?>;
        const highest_score = <?php echo json_encode($highest_score); ?>;

        const data = {
            labels: [
                'Score Rata-Rata',
                'Score Tertinggi'
            ],
            datasets: [{
                label: 'Score Rata-Rata',
                data: avg_score,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)'
                ],
                hoverOffset: 4
            }, {
                label: 'Score Tertinggi',
                data: highest_score,
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)'
                ],
                hoverOffset: 4
            }]
        };

        // Config Block
        const config = {
            type: 'doughnut',
            data,
            options: {}
        };

        // Render Block
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

</body>
<aside class="control-sidebar control-sidebar-dark"></aside>