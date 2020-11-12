<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpetual Calendar</title>
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
    <style>
        body {
            height: 100vh;
            background:linear-gradient(#a8dadc,#cdeae5,#a8dadc) no-repeat;
        }
        table{
            width: 100%;
            table-layout: fixed;
            border-spacing: 0;
        }
        .title-large{
            font-size: 3.2rem;
            font-weight: 700;
        }
        .tdbg:hover{
            background: #f8f9fa;
            box-shadow: 0 0 3px 3px #ced4da;
        }
        .table td{
            padding: 1rem 0.75rem;
            vertical-align: middle;
        }
        .tdHolidays{
            font-size: 0.9rem;
            font-weight: 600;
            line-height: 1.1rem;
            background: #ffd9da;
            padding: 0.15rem 0.1rem !important;
        }
        .tdToday{
            font-weight: 900;
            background: #fff8e8;
            box-shadow: inset 0 0 3px 3px #ffe082   !important;
        }
        .tdHolidays:hover{
            background: #ffb5a9;
            box-shadow:  0 0 3px 3px #ffe082;
        }
        @media(max-width: 575.98px) { 
            .table th{
                font-size: 0.9rem;
                padding: 0.6rem 0.15rem;
            }
            .table td{
                font-size: 0.9rem;
                padding: 0.75rem 0.15rem;
            }
            .title-large{
                font-size: 2.8rem;
                font-weight: 700;
            }
            .tdHolidays{
                font-size: 0.8rem;
                line-height: 0.9rem;
                padding: 0.1rem 0.05rem !important;
            }
        }
        @media (min-width: 576px) and (max-width: 767.98px){
            .tdHolidays{
                font-size: 0.85rem;
                line-height: 1rem;
                padding: 0.1rem 0.05rem !important;
            }
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
            span.cus, select.cus{
            padding:0.375rem 0.5rem;
            }
        } 
    </style>
</head>
<body onload="ShowTime()" class="bodybg">
    <?php
        date_default_timezone_set("Asia/Taipei");
        $timezone = date_default_timezone_get();
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
        <div class="row pt-sm-2 pt-lg-5 d-flex justify-content-center">
            <div class="mx-1 col-12 col-lg-7 order-2 order-lg-1 card bg-dark text-center d-flex flex-column justify-content-between">   
                <div class="order-2">
                    <form action="calendar.php" method="get">
                        <div class="form-row d-flex justify-content-center">
                            <div class="order-2 form-group col-md-3 mb-2">                            
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text cus">Year</span>
                                    </div>
                                    <input type="text" class="form-control" name="Yr">
                                </div>
                            </div> 
                            <div class="order-3 form-group col-md-3 mb-2">                            
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text cus">Month</span>
                                    </div>
                                    <select name="Mn" class="form-control cus">
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
                            <div class="order-4 form-group col-md-1 mb-2">
                                <input type="submit" value="Send" class="btn btn-warning col-12 text-dark" style="font-size: 0.7rem;padding:0.525rem 0.1rem;"></input>
                            </div>
                            <div class="order-5 form-group col-md-2 ml-md-3 d-none d-md-block mb-2">
                                <input type="button" class="btn btn-info col-12" style="font-size: 0.65rem;padding:0.55rem 0.1rem;" value="Next Month >"
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
                            <div class="order-1 form-group col-md-2 mr-md-3 d-none d-md-block mb-2">
                                <input type="button" class="btn btn-info col-12" style="font-size: 0.65rem;padding:0.55rem 0.1rem;" value="< Last Month"
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
                <div class="order-1">
                    <?php $calMnF=date('F',strtotime($calYr.'-'.$calMn.'-1'));?>
                    <h1 class="card-body card-title text-white title-large"><?=$calYr.'&nbsp;&nbsp;'.$calMnF;?></h1>
                </div>
                <div class="order-3 table-responsive">
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
                                    
                                    
                                    $holidays=[
                                        '1-1' => 'New Year\'s Day',
                                        '2-14' => 'Valentine\'s Day',
                                        '3-8' => 'Women\'s Day',
                                        '4-11' => 'Pet Day',
                                        '4-22' => 'Earth Day',
                                        '5-1' => 'Labor Day',
                                        '6-8' => 'World Oceans Day',
                                        '8-8' => 'Father\'s Day',
                                        '9-28' => 'Teacher\'s Day',
                                        '10-10' => 'National Day',
                                        '11-11' => 'Shopping Day',
                                        '12-25' => 'Merry Chrismax'
                                    ]; // 未加母親節


                                    $calDys=date('t',strtotime($calYr.'-'.$calMn.'-1')); // 原始'該月天數'
                                    $firstWkDy=date('w',strtotime($calYr.'-'.$calMn.'-1'));
                                    $endWkDy=date('w',strtotime($calYr.'-'.$calMn.'-'.$calDys));

                                    for ($i=0; $i<=ceil(($calDys+$firstWkDy-7)/7); $i++){
                                        echo "<tr>";
                                        for ($j=0; $j<=6; $j++){

                                            $calDate=($i*7)+($j+1)-$firstWkDy;

                                            if(isset($holidays[$calMn.'-'.$calDate])){
                                                $tdDate=($i*7)+($j+1)-$firstWkDy.'</br>'.$holidays["$calMn-$calDate"];
                                                $tdClass="tdHolidays";
                                            }else{
                                                $tdDate=$calDate;
                                                $tdClass="";
                                            }

// if() for Mother's Day
                                            if((($i==2 && $firstWkDy>0) or ($i==1 && $firstWkDy==0)) && $j==0 && $calMn==5){
                                                $tdDate=($i*7)+($j+1)-$firstWkDy."</br>Mother\'s Day";
                                                $tdClass="tdHolidays";
                                            } // only for Mother's Day
// if() for today
                                            if($calDate==date('d') && $calMn==date('m')){
                                                $tdClass="tdToday";
                                            } // only for Today

                                            if (($i==0 && $j<$firstWkDy) ||($i==ceil(($calDys+$firstWkDy-7)/7) && $j>$endWkDy)) {
                                                echo "<td> &nbsp; </td>";
                                            }elseif($j==0||$j==6){
                                                echo "<td class=\"text-danger $tdClass font-weight-bold tdbg\">";
                                                echo $tdDate;
                                                echo "</td>";
                                            }else{
                                                echo "<td class='tdbg $tdClass'>";
                                                echo $tdDate;
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
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="text-muted pt-lg-2"><?='Today is '.date('Y / m / d')?></h5>
                    <div>
                        <h1 class="text-warning"><?=date('l')?></h1>
                        <h1 class="text-warning"  id="Time"></h1>
                    </div>
                    <div>
                    <h5 class="text-muted py-lg-2 d-none d-md-block"><?php echo $timezone;?></h5>
                        <?php
                            $pic=str_pad($calMn, 2, '0', STR_PAD_LEFT).'-'.strval(rand(1,2));
                        ?>
                        <img src="images/300x200/<?=$pic;?>.jpg" class="card-img d-none d-lg-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>