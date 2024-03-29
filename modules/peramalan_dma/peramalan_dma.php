<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <?php
            $id_komoditas = $_GET['id_komoditas'] ?? 1;
            ?>
            <h4 class="header-title"> <?= $module_name ?></h4>
            <form class="mt-4" action="">
                
                <select class="form-control mb-4" name="id_komoditas" id="">
                    <?php
                    $query = mysqli_query($connection, "SELECT * FROM komoditas ORDER BY nama_komoditas");

                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?= $row['id_komoditas'] ?>" <?= $id_komoditas == $row['id_komoditas'] ? 'selected' : null ?>><?= $row['nama_komoditas'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <input type="hidden" name="module" value="peramalan_dma">
                <a href="?module=peramalan_dma" type="button" class="btn btn-dark">Reset</a>
                <button type="submit" class="btn btn-primary">Hitung Peramalan DMA</button>
            </form>

            <br>
            <?php
            if ($_GET['id_komoditas']) {
             
                $n = 3;
                $query = mysqli_query($connection, "SELECT * FROM harga_komoditas WHERE id_komoditas = '$id_komoditas' ORDER BY tanggal");                // $no = 1;
                $x = [];
                $data_train = [];
                while ($row = mysqli_fetch_array($query)) {
                    $x[] = $row['harga'];
                    $data_train[] = $row;
                }
                // print_r($x);
                // die;
                $dma = dma($x, $n);

            ?>
                <div class="table-responsive">
                    <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>t</th>
                                <th>Tanggal</th>
                                <th>X</th>
                                <th>S'</th>
                                <th>S''</th>
                                <th>a</th>
                                <th>b</th>
                                <th>F</th>
                                <th>MAD</th>
                                <th>MSE</th>
                                <th>MAPE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $gx = [];
                            $gf = [];
                            foreach ($dma['x'] as $key => $value) {
                                $gx[] =  $data_train[$key]['tanggal'];
                                $gf[] = $key > $n ? round($dma['f'][$key]) : null;
                            ?>
                                <tr>
                                    <th scope="row"><?= $key + 1 ?></th>
                                    <td><?= $data_train[$key]['tanggal']  ?></td>
                                    <td><?= rupiah($value)  ?></td>
                                    <td><?= round($dma['sa'][$key], 2) ?></td>
                                    <td><?= round($dma['saa'][$key], 2) ?></td>
                                    <td><?= round($dma['a'][$key], 2) ?></td>
                                    <td><?= round($dma['b'][$key], 2) ?></td>
                                    <td><?= round($dma['f'][$key], 2) ?></td>
                                    <td><?= round($dma['mad'][$key], 2) ?></td>
                                    <td><?= round($dma['mse'][$key], 2) ?></td>
                                    <td><?= round($dma['mape'][$key], 2) ?></td>
                                </tr>

                            <?php
                            }
                            ?>

                            <?php
                            for ($i = 1; $i <= 3; $i++) {
                                $dma['f'][$key + $i] = $dma['a'][$key] + ($i * $dma['b'][$key]);
                                $date[$i] = date('Y-m-d', strtotime("+$i day", strtotime($data_train[$key]['tanggal'])));
                                $gx[]  = $date[$i];
                                $gf[] = round($dma['f'][$key + $i]);
                            ?>
                                <tr style="color: red;">
                                    <th scope="row"><?= $key + 1 + $i ?></th>
                                    <td><?= $date[$i] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?= rupiah($dma['f'][$key + $i]) ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <strong>
                    Rata-rata MAPE = <?= round($dma['rmape'],2) ?>
                </strong>
                <hr>
                <strong>
                    Rata-rata MSE = <?= round($dma['rmse'],2) ?>
                </strong>
            <?php
            }
            ?>

        </div>
    </div>

</div>

<?php
if ($_GET['id_komoditas']) {
?>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Grafik</h4>

                <div id="line_chart_dashed" class="apex-charts" dir="ltr"></div>
            </div>
        </div><!--end card-->
    </div>

    <!-- Plugin Js-->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <!-- demo js-->
    <!-- <script src="assets/js/pages/apex.init.js"></script> -->

    <script>
        if ($("#line_chart_dashed").length) {
            options = {
                chart: {
                    height: 380,
                    type: "line",
                    zoom: {
                        enabled: !1
                    },
                    toolbar: {
                        show: !1
                    }
                },
                colors: ["#3ddc97", "#00a7e1", "#fb4d53"],
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    width: [3, 4, 3],
                    curve: "straight",
                    dashArray: [0, 8, 5]
                },
                series: [{
                    name: "F",
                    data: <?= json_encode($gf) ?>
                }, {
                    name: "Data Train X",
                    data: <?= json_encode($x) ?>
                }, ],
                title: {
                    text: "Harga",
                    align: "left"
                },
                markers: {
                    size: 0,
                    hover: {
                        sizeOffset: 6
                    }
                },
                xaxis: {
                    categories: <?= json_encode($gx) ?>
                },
                tooltip: {
                    y: [{
                        title: {
                            formatter: function(e) {
                                return e + " (mins)"
                            }
                        }
                    }, {
                        title: {
                            formatter: function(e) {
                                return e + " per session"
                            }
                        }
                    }, {
                        title: {
                            formatter: function(e) {
                                return e
                            }
                        }
                    }]
                },
                grid: {
                    borderColor: "#f1f1f1"
                }
            };
            (chart = new ApexCharts(document.querySelector("#line_chart_dashed"), options)).render()
        }
    </script>

<?php
}
?>