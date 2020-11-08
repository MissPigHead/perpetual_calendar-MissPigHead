<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script language="JavaScript">
        function ShowTime(){
        　  var now=new Date();
            hr=('0'+now.getHours()).substr(-2);
            min=('0'+now.getMinutes()).substr(-2);
            sec=('0'+now.getSeconds()).substr(-2);
            document.getElementById('Time').innerHTML = hr+' : '+min+' : '+sec;
        　  setTimeout('ShowTime()',1000);
        }
    </script>
</head>
<body onload="ShowTime()">

    <?php
        date_default_timezone_set("Asia/Taipei");
        if (!empty($_GET['Yr'])){
            $calYr=$_GET['Yr'];
        }else{
            $calYr=date('Y');
        }
        if (!empty($_GET['Mn'])){
            $calMn=$_GET['Mn'];
        }else{
            $calMn=date('m');
        }
        ?>

    <div class="container">
        <div class="row pt-4 d-flex justify-content-center">
            <div class="mx-1 col-12 col-lg-7 order-2 order-lg-1 card bg-dark text-light text-center">   
                <div class="card-body d-flex flex-column">
                    <div class="order-2">
                        <form action="calendar.php" method="get" name="calendar">
                            <div class="form-row d-flex justify-content-center">
                                <div class=" order-2 form-group col-md-3 px-1">                            
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Year</span>
                                        </div>
                                        <input type="text" class="form-control" name="Yr">
                                    </div>
                                </div> 
                                <div class="order-3 form-group col-md-3">                            
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Month</span>
                                        </div>
                                        <select name="Mn" class="form-control">
                                            <option value=""> --- </option>
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
                                </div>
                                <div class="order-4 form-group col-md-1">
                                    <input type="submit" value="Send" class="btn btn-warning col-12 text-dark" style="font-size: 0.7rem;padding:0.525rem 0.1rem;"></input>
                                </div>
                                <div class="order-5 form-group col-md-2 ml-2 d-none d-md-block">

                                    <input type="button" class="btn btn-info col-12" style="font-size: 0.7rem;padding:0.525rem 0.1rem;" name="FindMn" value="Next Month"
                                        <?php
                                                if($calMn==12){
                                                    $nextMn=1;
                                                    $nextYr=$calYr+1;
                                                }else{
                                                    $nextMn=$calMn+1;
                                                    $nextYr=$calYr;
                                                }
                                            ?>
                                        onclick="location.href='calendar.php?Yr=<?=$nextYr;?>&Mn=<?=$nextMn;?>'">

                                </div>
                                <div class="order-1 form-group col-md-2 mr-2 d-none d-md-block">
                                    <input type="button" class="btn btn-info col-12" style="font-size: 0.7rem;padding:0.525rem 0.1rem;" name="FindMn" value="Last Month"
                                        <?php
                                                if($calMn==1){
                                                    $lastMn=12;
                                                    $lastYr=$calYr-1;
                                                }else{
                                                    $lastMn=$calMn-1;
                                                    $lastYr=$calYr;
                                                }
                                            ?>
                                    onclick="location.href='calendar.php?Yr=<?=$lastYr;?>&Mn=<?=$lastMn;?>'">

                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
                <div class="card-title order-1">
                    <h1><?=$calYr.'-'.$calMn;?></h1>
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
                                    $calDys=date('t',strtotime($calDt)); // 原始'該月天數'
                                    $firstWkDy=date('w',strtotime($calYr.'-'.$calMn.'-1'));
                                    $endWkDy=date('w',strtotime($calYr.'-'.$calMn.'-'.$calDys));

                                    for ($i=0; $i<=ceil(($calDys+$firstWkDy-7)/7); $i++){
                                        echo "<tr>";
                                        for ($j=0; $j<=6; $j++){
                                            if (($i==0 && $j<$firstWkDy) ||($i==ceil(($calDys+$firstWkDy-7)/7) && $j>$endWkDy)) {
                                                echo "<td> &nbsp; </td>";
                                            }elseif($j==0||$j==6){
                                                echo "<td class='text-danger font-weight-bold'>";
                                                echo ($i*7)+($j+1)-$firstWkDy;
                                                echo "</td>";
                                            }else{
                                                echo "<td>";
                                                echo ($i*7)+($j+1)-$firstWkDy;
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
        <div class="mx-1 col-12 col-lg-4 order-1 order-lg-2 card px-2 bg-light text-center align-self-stretch">
            <div class="card-body">
                <h5 class="text-muted"><?='Today is '.date('Y / m / d')?></h5>
                <h1 class="text-warning"><?=date('l')?></h1>
                <h1 class="text-warning"  id="Time"></h1></div>
                <h4 class="text-muted py-4 d-none d-md-block"><?php echo $timezone;?></h4>
                <img src="https://fakeimg.pl/300x200" div class="card-img d-none d-lg-block">
            </div>
        </div>  
    </div>
</body>
</html>