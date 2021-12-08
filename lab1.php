<?php
    session_start();

    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = [];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Web-programming, lab1 </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header> Bachurinskiy Artem Andreevich, P3210, var 10107 </header>

    <div>
        <!-- График -->
        <svg height="350px" width="350px" viewBox="0 0 300 300">
            <rect class="figure" height="100" width="100" x="150" y="50"></rect>
            <polygon class="figure" points="100 150, 150 100, 150 150"></polygon>
            <path class="figure" d="M150 150 h 50 a 50 50 0 0 1 -50 50 Z"></path>
            <line x1="10" x2="290" y1="150" y2="150" stroke="black"></line>
            <line x1="150" x2="150" y1="10" y2="290" stroke="black"></line>
            <line x1="50" x2="50" y1="147" y2="153" stroke="black"></line>
            <line x1="100" x2="100" y1="147" y2="153" stroke="black"></line>
            <line x1="200" x2="200" y1="147" y2="153" stroke="black"></line>
            <line x1="250" x2="250" y1="147" y2="153" stroke="black"></line>
            <line x1="147" x2="153" y1="50" y2="50" stroke="black"></line>
            <line x1="147" x2="153" y1="100" y2="100" stroke="black"></line>
            <line x1="147" x2="153" y1="200" y2="200" stroke="black"></line>
            <line x1="147" x2="153" y1="250" y2="250" stroke="black"></line>
            <line x1="285" x2="290" y1="147" y2="150" stroke="black"></line>
            <line x1="285" x2="290" y1="153" y2="150" stroke="black"></line>
            <line x1="147" x2="150" y1="15" y2="10" stroke="black"></line>
            <line x1="153" x2="150" y1="15" y2="10" stroke="black"></line>
            <text x="280" y="145">X</text>
            <text x="245" y="145">R</text>
            <text x="190" y="145">R/2</text>
            <text x="85" y="145">-R/2</text>
            <text x="40" y="145">-R</text>
            <text x="155" y="20">Y</text>
            <text x="155" y="55">R</text>
            <text x="155" y="105">R/2</text>
            <text x="155" y="205">-R/2</text>
            <text x="155" y="255">-R</text>
            <!-- <circle id="point" r="4" cx="150" cy="150" visibility="hidden"></circle> -->
        </svg>

        <!-- Формы для отправки запросов -->
        <form id="form" action="script.php" method="GET"> 
            <div>
                <label> X = 
                    <input class="cb" type="checkbox" name="x" value="-5" onchange="cbChange(this)">-5
                    <input class="cb" type="checkbox" name="x" value="-4" onchange="cbChange(this)">-4
                    <input class="cb" type="checkbox" name="x" value="-3" onchange="cbChange(this)">-3
                    <input class="cb" type="checkbox" name="x" value="-2" onchange="cbChange(this)">-2
                    <input class="cb" type="checkbox" name="x" value="-1" onchange="cbChange(this)">-1
                    <input class="cb" type="checkbox" name="x" value="0" onchange="cbChange(this)">0
                    <input class="cb" type="checkbox" name="x" value="1" onchange="cbChange(this)">1
                    <input class="cb" type="checkbox" name="x" value="2" onchange="cbChange(this)">2
                    <input class="cb" type="checkbox" name="x" value="3" onchange="cbChange(this)">3
                </label>
            </div>
            <div>
                <label> Y =  
                    <input type="text" name="y" placeholder="(-3...3)" maxlength="16">
                </label>
            </div>
            <div>
                <label> R = 
                    <input type="text" name="r" placeholder="(1...4)" maxlength="16">
                </label>
            </div>
            <div class="btn">
                <button class="btn btn_submit" type="submit"> Submit </button>
                <button class="btn btn_reset"> <a href="reset.php"> Reset </a> </button>
            </div>
        </form>
    </div>

    <div>
        <!-- Таблица -->
        <table>
            <tr>
                <th>X</th>
                <th>Y</th>
                <th>R</th>
                <th>Result</th>
                <th>Request time</th>
                <th>Duration</th>
            </tr>

            <?php if (isset($_SESSION['data'])) : 
                foreach ($_SESSION['data'] as $elem) :    
            ?>
            <tr>
                <td><?php echo $elem["x_"]; ?></td>
                <td><?php echo $elem["y_"]; ?></td>
                <td><?php echo $elem["r_"]; ?></td>
                <td><?php echo $elem["res_"]? 
                    " <span style='color: #5a0'> <b>in</b> </span>" : 
                    " <span style='color: #c20'> <b>out</b> </span>"; ?></td>
                <td><?php echo $elem["req_time_"]; ?></td>
                <td><?php echo $elem["duration_"]; ?></td>
            </tr>
            <?php 
                endforeach; 
                endif;
            ?>
        </table>
    </div>

    <script src="script.js"></script>
</body>

</html>