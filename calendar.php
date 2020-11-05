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
    $testDate="2020-11-28"; // 輸入測試日期
    echo date("m.d.Y",strtotime($testDate)); // 測試日期格式讀取正確
    echo "</br>";
    echo $monthToday=date("m");//本月份
    echo "</br>";
    echo $testMonth=date("m",strtotime($testDate));// 測試日期月份
    echo "</br>";
    echo $w=date("w",strtotime($testDate)); //回傳測試日期為星期幾
    echo "</br>";
    echo $t=date("t",strtotime($testDate)); //回傳測試日期該月天數
    echo "</br>";
    echo $month=date("F",strtotime($testDate)); //回傳測試日期該月份英文全稱
    echo "</br>";
    echo $year=date("Y",strtotime($testDate)); //回傳測試日期該年份
    echo "</br>";
    echo $testDateYrMn=date("Y-m",strtotime($testDate)); //回傳測試日期該年份及月份
    echo "</br>";
    echo $firstDateWeek=date("w",(strtotime($testDateYrMn.'-1')));   
    // echo "</br>";
    // echo 
    // echo "</br>";
    // echo 
    // echo "</br>";
    // echo 
    // echo "</br>";
    // echo ;
    // echo ;
?>


<h1 class="text-center">Calendar</h1>
<h3 class="text-center"><?php echo date("Y-m",strtotime($testDate)) ?></h3>
    <div class="container">
        <div class="row justify-content-center text-center">
            <!-- <div class="col-sm-0 col-md-2 bg-light">
                <table class="bordered"></table>
            
            </div> -->
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

                    </tbody>
                </table>
            </div>
            <!-- <div class="col-sm-0 col-md-2 bg-light">
            3
            </div> -->
        </div>
    </div>



    <?php
    for ($i=0; $i<=ceil(($daysMonth+$firstDateWeek-7)/7); $i++){
        echo "<tr>";
        for ($j=0; $j<=6; $j++){
            if ($i==0 && $j<$firstDateWeek){
                echo "<td> &nbsp; </td>";
            }else if($i==ceil(($daysMonth+$firstDateWeek-7)/7) && $j>$endDateWeek){
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

</body>
</html>
