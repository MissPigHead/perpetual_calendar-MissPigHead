<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row pt-4 d-flex justify-content-center">
            <div class="mx-1 col-12 col-lg-7 order-2 order-lg-1 card bg-dark text-light text-center">   
                    <div class="card-body d-flex flex-column">
                        <div class="order-2">
                            <form action="calendar_layout.php" method="get" name="calendar">
                                <div class="form-row d-flex justify-content-center">
                                    <div class="form-group col-md-2 mr-2 d-none d-md-block">
                                        <input type="submit" class="btn btn-info col-12" style="font-size: 0.7rem;padding:0.525rem 0.1rem;" name="lastMn" value="Last Month">
                                            <?php
                                                date_default_timezone_set('Asia/Taipei');//預設時區
                                                $timezone = date_default_timezone_get();//叫出時區
                                                $calendarYrMn=date('Y-F',strtotime(date('Y-m-d')));
                                                $calendarDt=date('Y-m-d');
                                                $calendarYr=date('Y',strtotime($calendarDt));//查詢年份，預設now
                                                $calendarMn=date('m',strtotime($calendarDt));//查詢月份，預設now
                                                $calendarDy=date('d',strtotime($calendarDt));//查詢riqi，預設now                                                  
                                                if(isset($_GET['lastMn'])){
                                                    if ($calendarMn =='01'){
                                                        $_GET['Yr']=($calendarYr-1);
                                                        $_GET['Mn']='12';
                                                    }else{
                                                        $calendarDt=date('Y-m-d',strtotime($calendarYr.'-'.($calendarMn-1).'-'.$calendarDy));
                                                    }
                                                    header("location:calendar_layout.php?Yr={$_GET['Yr']}&Mn={$_GET['Mn']}");                                                
                                                }

                                            ?>
                                    </div>

                                    <div class="form-group col-md-3 px-1">                            
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Year</span>
                                            </div>
                                            <input type="text" class="form-control" name="Yr">
                                        </div>
                                    </div> <div class="form-group col-md-3">                            
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Month</span>
                                            </div>
                                            <select name="Mn" class="form-control">
                                                <option value=""> Choose </option>
                                                <option value="1"> 1 </option>
                                                <option value="2"> 2 </option>
                                                <option value="3"> 3 </option>
                                                <option value="4"> 4 </option>
                                                <option value="5"> 5 </option>
                                                <option value="6"> 6 </option>
                                                <option value="7"> 7 </option>
                                                <option value="8"> 8 </option>
                                                <option value="9"> 9 </option>
                                                <option value="10"> 10 </option>
                                                <option value="11"> 11 </option>
                                                <option value="12"> 12 </option>
                                            </select>
                                        </div>
                                    </div><div class="form-group col-md-1">
                                        <input type="submit" value="Send" class="btn btn-warning col-12 text-dark" style="font-size: 0.7rem;padding:0.525rem 0.1rem;"></input>
                                    </div>
                                    <div class="form-group col-md-2 ml-2 d-none d-md-block">
                                    <input type="button" class="btn btn-info col-12" style="font-size: 0.7rem;padding:0.525rem 0.1rem;" name="nextMn" value="Next Month">
                                    </div>
                                </div> 
    <?php
        $calendarDs=date('t',strtotime($calendarDt));//查詢月份的天數
        $calendarDW=date('l',strtotime($calendarDt));//查詢日期星期幾，預設now
        $calendarT=date('H:i:s');//查詢時間，預設now
    if (empty($_GET['Yr']) && empty($_GET['Mn'])){
        $calendarYr=date('Y',strtotime($calendarDt));//查詢年份，預設now
        $calendarMn=date('F',strtotime($calendarDt));//查詢月份，預設now  
    }elseif (isset($_GET['Yr'])){
        $calendarYr=$_GET['Yr']; //輸入後替換年份
    }elseif (isset($_GET['Mn'])){
        $calendarMn=$_GET['Mn']; //輸入後替換月份
    }else{
        $calendarYr=$_GET['Yr']; //輸入後替換年份
        $calendarMn=$_GET['Mn']; //輸入後替換月份
    }
    $firstDW=date('w',strtotime($calendarYr.'-'.$calendarMn.'-01'));//第一天星期幾
    $endDW=date('w',strtotime($calendarYr.'-'.$calendarMn.'-'.$calendarDs));//最後一天星期幾
?>
                            </form>
                        </div>

                        <div class="card-title order-1">
                            <h1><?=$calendarYrMn;?></h1>
                        </div>


                        <div class="table-responsive order-3" style="border-spacing: 0;">
                            <table class="table mt-2 ">
                                <thead class="table-secondary">
                                    <th class="text-danger">Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thur</th>
                                    <th>Fri</th>
                                    <th class="text-danger">Sat</th>
                                </thead>
                                <tbody  class="table bg-white">
    <?php
        for ($i=0; $i<=ceil(($calendarDs+$firstDW-7)/7); $i++){
            echo "<tr>";
            for ($j=0; $j<=6; $j++){
                if (($i==0 && $j<$firstDW) ||($i==ceil(($calendarDs+$firstDW-7)/7) && $j>$endDW)) {
                    echo "<td> &nbsp; </td>";
                }elseif($j==0||$j==6){
                    echo "<td class='text-danger font-weight-bold'>";
                    echo ($i*7)+($j+1)-$firstDW;
                    echo "</td>";
                }else{
                    echo "<td>";
                    echo ($i*7)+($j+1)-$firstDW;
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
            <div class="mx-1 col-12 col-lg-4 order-1 order-lg-2 card px-2 bg-light text-center align-self-stretch">
                    <div class="card-body">
                        <h5 class="text-muted"><?='Today is '.date('Y / m / d')?></h5>
                        <h1 class="text-warning"><?=$calendarDW?></h1>
                        <h1 class="text-warning"><?=$calendarT?></h1>
                        <h4 class="text-muted py-4 d-none d-md-block"><?php echo $timezone;?></h4>
                        <img src="https://fakeimg.pl/300x200" div class="card-img d-none d-lg-block">
                    </div>
            </div>  
        </div>
    </div>
</body>
</html>