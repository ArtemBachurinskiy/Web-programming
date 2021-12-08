<?php
    $start = microtime(true);
    session_start();

    function x_validate($x) {
        $x_values = array(-5, -4, -3, -2, -1, 0, 1, 2, 3);
        return is_numeric($x) && in_array($x, $x_values);
    }

    function y_validate($y) {
        return is_numeric($y) && $y > -3 && $y < 3;
    }
    
    function r_validate($r) {
        return is_numeric($r) && $r > 1 && $r < 4;
    }

    function result($x, $y, $r){
        return 
            ($x >= 0 && $y >= 0 && $x <= $r && $y <= $r) ||
            ($x <= 0 && $y >= 0 && $y <= $x + ($r / 2)) ||
            ($x >= 0 && $y <= 0 && $x * $x + $y * $y <= ($r / 2) * ($r / 2));
    }

    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = [];
    }

    $X = $_GET['x'];
    $Y = $_GET['y'];
    $R = $_GET['r'];
    if (x_validate($X) && y_validate($Y) && r_validate($R)) {
        $_SESSION['data'][] = [
            'x_' => $X,
            'y_' => $Y,
            'r_' => $R,
            'req_time_' => Date('d.m.Y - H:i:s'), 
            'res_' => result($X, $Y, $R), 
            'duration_' => round((microtime(true) - $start), 6) . " s"
             // number_format((microtime(true) - $start) * 1000000000, 0, ".", "") . " ns"
        ];
    }

    header("Location: lab1.php");
    die();
?>