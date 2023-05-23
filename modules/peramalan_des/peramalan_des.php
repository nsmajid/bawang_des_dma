<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <?php
            $harga = $_GET['harga'] ?? 'average';
            $id_komoditas = $_GET['id_komoditas'] ?? 1;
            ?>
            <h4 class="header-title"> <?= $module_name ?></h4>
            <form class="mt-4" action="">
                <select class="form-control mb-4" name="provinsi" id="">
                    <option value="">Pilih Provinsi</option>
                    <?php
                    $query = mysqli_query($connection, "SELECT * FROM provinsi ORDER BY nama_provinsi");

                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?= $row['id_provinsi'] ?>" <?= $_GET['provinsi'] == $row['id_provinsi'] ? 'selected' : null ?>><?= $row['nama_provinsi'] ?></option>
                    <?php
                    }
                    ?>
                </select>
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


                <select class="form-control mb-4" name="harga" id="">
                    <option value="average" <?= $harga == 'average' ? 'selected' : null ?>>Harga Rata-Rata Bulanan</option>
                    <option value="max" <?= $harga == 'max' ? 'selected' : null ?>>Harga Tertinggi Bulanan</option>
                    <option value="min" <?= $harga == 'min' ? 'selected' : null ?>>Harga Terendah Bulanan</option>
                </select>
                <input type="hidden" name="module" value="peramalan_des">
                <a href="?module=peramalan_des" type="button" class="btn btn-dark">Reset</a>
                <button type="submit" class="btn btn-primary">Hitung Peramalan DES</button>
            </form>
            <br>
            <?php
            if ($_GET['provinsi']) {

                $id_provinsi = $_GET['provinsi'];

                $query = mysqli_query($connection, "SELECT COUNT(id_harga_komoditas) AS record, AVG(harga) AS average,MAX(harga) AS max,MIN(harga) AS min, MONTH(tanggal) AS bulan, YEAR(tanggal) AS tahun FROM harga_komoditas WHERE id_provinsi = $id_provinsi AND id_komoditas = $id_komoditas GROUP BY YEAR(tanggal), MONTH(tanggal) ORDER BY tahun, bulan");
                // $no = 1;
                $x = [];
                $data_train = [];
                while ($row = mysqli_fetch_array($query)) {
                    $x[] = round($row[$harga]);
                    $data_train[] = $row;
                }
                $des = des($x);
                // echo "<pre>";
                // print_r($des);

                // echo "</pre>";

            ?>
                <div class="table-responsive">
                    <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>t</th>
                                <th>Bulan</th>
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
                            foreach ($des['x'] as $key => $value) {

                                $gx[] =  $data_train[$key]['bulan'] . '-' . $data_train[$key]['tahun'];
                                $gf[] = $key >= 2 ? round($des['f'][$key]) : null;
                            ?>
                                <tr>
                                    <th scope="row"><?= $key + 1 ?></th>
                                    <td><?= $data_train[$key]['bulan'] . '-' . $data_train[$key]['tahun'] ?></td>
                                    <td><?= rupiah($value)  ?></td>
                                    <td><?= round($des['sa'][$key], 2) ?></td>
                                    <td><?= round($des['saa'][$key], 2) ?></td>
                                    <td><?= round($des['a'][$key], 2) ?></td>
                                    <td><?= round($des['b'][$key], 2) ?></td>
                                    <td><?= round($des['f'][$key], 2) ?></td>
                                    <td><?= round($des['mad'][$key], 2) ?></td>
                                    <td><?= round($des['mse'][$key], 2) ?></td>
                                    <td><?= round($des['mape'][$key], 2) ?></td>
                                </tr>

                            <?php
                            }
                            ?>

                            <?php
                            for ($i = 1; $i <= 3; $i++) {
                                // a+(b*i)
                                $des['f'][$key + $i] = $des['a'][$key] + ($i * $des['b'][$key]);


                                $month[$i] = date('m-Y', strtotime("+$i month", strtotime($data_train[$key]['tahun'] . '-' . $data_train[$key]['bulan'] . '-1')));
                                $gx[]  = $month[$i];
                                $gf[] = round($des['f'][$key + $i]);
                            ?>
                                <tr style="color: red;">
                                    <th scope="row"><?= $key + 1 + $i ?></th>
                                    <td><?= $month[$i] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?= rupiah($des['f'][$key + $i]) ?></td>
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
                    Rata-rata MAPE = <?= round($des['rmape'],2) ?>
                </strong>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
if ($_GET['provinsi']) {
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