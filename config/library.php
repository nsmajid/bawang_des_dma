<?php

function des($x = array())
{

    if (empty($x)) {
        $x[] = 130;
        $x[] = 145;
        $x[] = 150;
        $x[] = 165;
        $x[] = 170;
        $x[] = 170;
    }

    $n = count($x);
    $alpha = 2 / ($n + 1);
    // $alpha = 0.1;

    $sa = [];
    $saa = [];
    // (2 * $sa[$t]) - $saa[$t];
    $a = [];
    // (($alpha) / (1 - $alpha)) * ($sa[$t] - $saa[$t]);
    $b = [];
    //peramalan a+b
    $f = [];
    $fx = 0;

    foreach ($x as $t => $value) {
        if ($t == 0) {
            $sa[$t] = $value;
            $saa[$t] = $value;
            $a[$t] = 0;
            $b[$t] = 0;
            $f[$t] = 0;
        } else if ($t == 1) {
            // single
            $sa[$t] = ($alpha * $x[$t]) + ((1 - $alpha) * $sa[($t - 1)]);
// double
            $saa[$t] = ($alpha * $sa[$t]) + ((1 - $alpha) * $saa[($t - 1)]);
            $a[$t] = (2 * $sa[$t]) - $saa[$t];
            $b[$t] = (($alpha) / (1 - $alpha)) * ($sa[$t] - $saa[$t]);


            $f[$t] = 0;
        } else {
            $sa[$t] = ($alpha * $x[$t]) + ((1 - $alpha) * $sa[($t - 1)]);
            $saa[$t] = ($alpha * $sa[$t]) + ((1 - $alpha) * $saa[($t - 1)]);
            $a[$t] = (2 * $sa[$t]) - $saa[$t];
            $b[$t] = (($alpha) / (1 - $alpha)) * ($sa[$t] - $saa[$t]);


            $f[$t] = $a[$t] + $b[$t];
        }


        if ($t <= 1) {
            $mad[$t] = 0;
            $mse[$t] = 0;
        } else {
            $mad[$t] = abs($value - $f[$t]);
            $mse[$t] =  pow(($value - $f[$t]), 2);
        }

        // selisih dibagi nilai aktual
        $mape[$t] = ($mad[$t] / $value) * 100;
        if ($f > 0) {
            $fx++;
        }
    }



    $data['x'] = $x;

    $data['t'] = $t;
    $data['sa'] = $sa;
    $data['saa'] = $saa;
    $data['a'] = $a;
    $data['b'] = $b;
    $data['f'] = $f;
    $data['mad'] = $mad;
    $data['mse'] = $mse;
    $data['mape'] = $mape;
    $data['rmse'] = array_sum($mse) / $fx;
    $data['mape'] = $mape;
    $data['rmape'] = array_sum($mape) / $fx;

    return $data;
}

function dma($x = array(), $n = 3)
{

    if (empty($x)) {
        $x[] = 3197;
        $x[] = 3348;
        $x[] = 3476;
        $x[] = 3643;
        $x[] = 3426;
        $x[] = 3714;
        $x[] = 3135;
        $x[] = 3029;
        $x[] = 3851;
        $x[] = 3566;
        $x[] = 3493;
        $x[] = 3460;
    }

    $ma = $n - 1;
    $maa = $ma * 2;
    // $alpha = 2 / ($n + 1);

    $sa = [];
    $saa = [];
    $a = [];
    $b = [];
    $f = [];
    $fx = 0;

    foreach ($x as $t => $value) {
        if ($t < $ma) {
            $sa[$t] = 0;
            $saa[$t] = 0;
            $a[$t] = 0;
            $b[$t] = 0;
            $f[$t] = 0;
        } else if ($t < $maa) {
            // $sa[$t] = ($x[$t] + $x[$t-1] + $x[$t - 2] + $x[$t - 3])/$n;
            $sxt[$t] = 0;

            for ($i = 0; $i < $n; $i++) {
                $sxt[$t] += $x[$t - $i];
            }

            $sa[$t] = $sxt[$t] / $n;
            $saa[$t] = 0;
            $a[$t] = 0;
            $b[$t] = 0;
            $f[$t] = 0;
        } else {
            $sxt[$t] = 0;
            for ($i = 0; $i < $n; $i++) {
                $sxt[$t] += $x[$t - $i];
            }

            $sa[$t] = $sxt[$t] / $n;

            $saxt[$t] = 0;
            for ($i = 0; $i < $n; $i++) {
                $saxt[$t] += $sa[$t - $i];
            }

            $saa[$t] = $saxt[$t] / $n;
            // $saa[$t] = 1;
            $a[$t] = (2 * $sa[$t] - $saa[$t]);
            $b[$t] = (2 / ($n - 1)) - ($sa[$t] - $saa[$t]);
            $f[$t] = $a[$t] + $b[$t];
        }


        if ($t < $maa) {
            $mad[$t] = 0;
            $mse[$t] = 0;
        } else {
            $mad[$t] = abs($value - $f[$t]);
            $mse[$t] =  pow(($value - $f[$t]), 2);
        }

        $mape[$t] = ($mad[$t] / $value) * 100;
        if ($f>0) {
           $fx++;
        }
    }

    $data['x'] = $x;
    $data['ma'] = $ma;
    $data['maa'] = $maa;
    $data['t'] = $t;
    $data['sa'] = $sa;
    $data['saa'] = $saa;
    $data['a'] = $a;
    $data['b'] = $b;
    $data['f'] = $f;
    $data['mad'] = $mad;
    $data['mse'] = $mse;
    $data['rmse'] = array_sum($mse)/$fx;
    $data['mape'] = $mape;
    $data['rmape'] = array_sum($mape)/$fx;

    return $data;
}
