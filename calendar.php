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
        table{
            width: 100%;
            table-layout: fixed;
        }
    </style>
</head>
<body>
    <?php
        $testDate="2020-05-20"; // 輸入測試日期
        $testDateYrMn=date("Y-m",strtotime($testDate)); //回傳測試日期該年份及月份
        $firstDateWeek=date("w",(strtotime($testDateYrMn.'-1'))); // 回傳測試該月第一日星期幾
        $testMonthDays=date("t",strtotime($testDate)); // 回傳測試該月共幾天
        $endDateWeek=date("w",(strtotime($testDateYrMn.'-'.$testMonthDays))); // 回傳測試該月最後一日星期幾

        $lastMnLastDate=date("Y-m-d",((strtotime($testDateYrMn.'-1'))-24*60*60)); // 回傳前月最後一天日期
        $lastMnYrMn=date("Y-m",strtotime($lastMnLastDate)); //回傳前月年份及月份
        $lastMnDays=date("t",strtotime($lastMnLastDate)); //回傳前月共幾天
        $lastMnFirstDtWk=date("w",(strtotime($lastMnYrMn.'-1'))); //回傳前月第一天星期幾
        $lastMnLastDtWk=date("w",(strtotime($lastMnLastDate))); //回傳前月最後一天星期幾

        $nextMnFirstDate=date("Y-m-d",((strtotime($testDateYrMn.'-'.$testMonthDays))+24*60*60)); // 回傳次月第一天日期
        $nextMnYrMn=date("Y-m",strtotime($nextMnFirstDate)); //回傳次月年份及月份
        $nextMnDays=date("t",strtotime($nextMnFirstDate)); //回傳次月共幾天
        $nextMnFirstDtWk=date("w",(strtotime($nextMnFirstDate))); //回傳次月第一天星期幾
        $nextMnLastDtWk=date("w",(strtotime($nextMnYrMn.'-'.$nextMnDays))); //回傳次月最後一天星期幾
    ?>
    <h1 class="text-center p-3">Calendar</h1>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-10">
                <h3 class="text-center"><?php echo $testDateYrMn ?></h3>
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
            <div class="col-md-5">
                <h5 class="text-center text-secondary"><?php echo "Last Month ".$lastMnYrMn ?></h5>
                <table class="table table-bordered small">
                    <thead class="bg-secondary text-light transform small">
                        <th style="padding:0.5rem 0.1rem;">Sun</th>
                        <th style="padding:0.5rem 0.1rem;">Mon</th>
                        <th style="padding:0.5rem 0.1rem;">Tue</th>
                        <th style="padding:0.5rem 0.1rem;">Wed</th>
                        <th style="padding:0.5rem 0.1rem;">Thur</th>
                        <th style="padding:0.5rem 0.1rem;">Fri</th>
                        <th style="padding:0.5rem 0.1rem;">Sat</th>
                    </thead>
                    <tbody class="bg-light">
                    <?php
                        for ($i=0; $i<=ceil(($lastMnDays+$lastMnFirstDtWk-7)/7); $i++){
                            echo "<tr>";
                            for ($j=0; $j<=6; $j++){
                                if ($i==0 && $j<$lastMnFirstDtWk){
                                    echo "<td> &nbsp; </td>";
                                }else if($i==ceil(($lastMnDays+$lastMnFirstDtWk-7)/7) && $j>$lastMnLastDtWk){
                                    echo "<td> &nbsp; </td>";
                                }else{
                                    echo "<td>";
                                    echo ($i*7)+($j+1)-$lastMnFirstDtWk;
                                    echo "</td>";
                                }
                            }
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                <h5 class="text-center text-secondary"><?php echo "Next Month ".$nextMnYrMn ?></h5>
                <table class="table table-bordered small">
                    <thead class="bg-secondary text-light transform small">
                        <th style="padding:0.5rem 0.1rem;">Sun</th>
                        <th style="padding:0.5rem 0.1rem;">Mon</th>
                        <th style="padding:0.5rem 0.1rem;">Tue</th>
                        <th style="padding:0.5rem 0.1rem;">Wed</th>
                        <th style="padding:0.5rem 0.1rem;">Thur</th>
                        <th style="padding:0.5rem 0.1rem;">Fri</th>
                        <th style="padding:0.5rem 0.1rem;">Sat</th>
                    </thead>
                    <tbody class="bg-light">
                    <?php
                        for ($i=0; $i<=ceil(($nextMnDays+$nextMnFirstDtWk-7)/7); $i++){
                            echo "<tr>";
                            for ($j=0; $j<=6; $j++){
                                if ($i==0 && $j<$nextMnFirstDtWk){
                                    echo "<td> &nbsp; </td>";
                                }else if($i==ceil(($nextMnDays+$nextMnFirstDtWk-7)/7) && $j>$nextMnLastDtWk){
                                    echo "<td> &nbsp; </td>";
                                }else{
                                    echo "<td>";
                                    echo ($i*7)+($j+1)-$nextMnFirstDtWk;
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