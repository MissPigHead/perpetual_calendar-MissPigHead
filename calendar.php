<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar_1029Homework</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        th{ width: 14.28%;}
    </style>
</head>
<body>
<?php
    $testDate="2020-02-02"; // 輸入測試日期
    $testDateYrMn=date("Y-m",strtotime($testDate)); //回傳測試日期該年份及月份
    $firstDateWeek=date("w",(strtotime($testDateYrMn.'-1'))); // 回傳測試該月第1日星期幾
    $testMonthDays=date("t",strtotime($testDate)); // 回傳測試該月共幾天
    $endDateWeek=date("w",(strtotime($testDateYrMn.'-'.$testMonthDays))); // 回傳測試該月最後1日星期幾
?>
    <h1 class="text-center">Calendar</h1>
    <h3 class="text-center"><?php echo $testDateYrMn ?></h3>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-sm-12 col-md-8">
                <table class="table table-bordered">
                    <thead class="bg-dark text-light">
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thur</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </thead>
                    <tbody class="bg-light">
                    <?php
                        for ($i=0; $i<=ceil(($testMonthDays+$firstDateWeek-7)/7); $i++){
                            echo "<tr>";
                            for ($j=0; $j<=6; $j++){
                                if ($i==0 && $j<$firstDateWeek){
                                    echo "<td> &nbsp; </td>";
                                }else if($i==ceil(($testMonthDays+$firstDateWeek-7)/7) && $j>$endDateWeek){
                                    echo "<td> &nbsp; </td>";
                                }else{
                                    echo "<td>";
                                    echo ($i*7)+($j+1)-$firstDateWeek;
                                    echo "</td>";
                                }
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>