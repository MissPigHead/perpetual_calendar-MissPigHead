<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpetual Calendar</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Nothing+You+Could+Do&family=Homemade+Apple&family=Caveat:wght@500&family=Bebas+Neue&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
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
        body{
            background-image: url(images/body.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            }
        table{
            width: 100%;
            table-layout: fixed;
            border-spacing: 0;
        }
        .h1XL{
            font-family: 'Ubuntu', sans-serif;
            font-size: 3.6rem;
            color: #fff;
        }
        .clock{
            font-family: 'Ubuntu', sans-serif;
            font-size: 2.5rem;          
        }
        .btn-icon-cus{
            font-size: 2rem;
            line-height:2rem;
            text-align: center;
            vertical-align: middle;
            color: #fff;
            background: #17a2b8;
            border-color: #17a2b8;
            padding: 0.1rem;
        }
        .hint::after{
            content: 'please input';
            color: rgba(0,5,10,50%);
            position: absolute;
            /* z-index: 1; */
        }
        .table th{
            text-align: center;
            background: #75cbd9;
            border: 0;
        }
        .table td{
            padding: 0.35rem 0.25rem 2rem 0.25rem;
            border-top: 0;
            text-align: center;
            position: relative;
        }
        td.tdHolidays, td.tdToday{
            padding: 0.35rem 0.25rem 0 0.25rem;
        }
        td.tdHolidays{
            box-shadow: inset 0 0 3px 3px #f991cc;             
        }
        td.tdHolidays:hover{
            min-width: 5rem;
            max-width: 6rem;
            transform: translateX(10%) scale(2);
            background: rgba(253, 216, 237, 80%);
            padding: 0.3rem 0.25rem 0.5rem 0.25rem;
            border: 1px #dc3545 solid;
            border-radius: .25rem;
            box-shadow: none;
            position: absolute;
            margin:0 auto;
            z-index: 1;       
        }

        .holidayName{
            font-family: 'Bebas Neue', cursive;
            font-size:0.7rem;
            font-weight: 500;
            color: #dc3545;
            line-height:0.85rem;
            margin-bottom:0;
        }
        .divToday{
            font-family: 'Ubuntu', sans-serif;
            color: #ffc107;
            font-size: 0.6rem;
            font-weight: 700;
            background: rgba(220, 239, 239,30%);
            padding: none;
        }
        .bgMainBlock{
            background: #26647C;
        }
        .bgSecBlock{
            background: rgb(220, 239, 239);
        }
        .motto-1{
            font-family: 'Nanum Pen Script', cursive;
            font-size: 1.2rem;
            background: transparent;
        }
        .motto-2{
            font-family: 'Caveat', cursive;
            font-size: 1.6rem;
        }
        .motto-3{
            font-family: 'Homemade Apple', cursive;
            font-size: 0.8rem;
        }
        @media(max-width: 575.98px) { 
            .table th, .table td{
                font-size: 0.85rem;
                padding: 0.25rem;
            }
            .table td{
                padding: 0.25rem 0.25rem 2rem 0.25rem;
            }
            td.tdHolidays{
            padding: 0.25rem 0.25rem 0 0.25rem;    
            }
            .holidayName{
            font-size:0.5rem;
            line-height:0.65rem;
            }
            .h1XL{
            font-family: 'Ubuntu', sans-serif;
            font-size: 2.8rem;
            color: #fff;
            }
            .clock{
            font-family: 'Ubuntu', sans-serif;
            font-size: 2.2rem;            
            }

        }
        @media (min-width: 576px) and (max-width: 767.98px){
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
        } 
    </style>
</head>
<body onload="ShowTime()">
<?php
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
        $calMnF=date('F',strtotime($calYr.'-'.$calMn.'-1'));
        ?>
    <div class="container">
        <div class="row my-sm-3 my-lg-5 d-flex justify-content-center">
            <div class="card bgMainBlock col-12 col-lg-8 order-2 order-lg-1 align-self-stretch">
                <div class="order-2">
                        <form action="calendar_v2.php" method="get">
                            <div class="form-row d-flex justify-content-center align-items-center">
                                <div class="input-group order-1 order-md-2 col-12 col-md-3 my-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Year</span>
                                    </div>
                                    <input type="number" min="0" max="10000" class="form-control" name="Yr">
                                </div>
                                <div class="input-group order-2 order-md-3 col-12 col-md-3 my-2">
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
                                <div class="order-4 order-md-4 col-4 col-md-2 my-2">
                                    <button type="submit" class="btn btn-info col-12">Send</button>
                                </div>
                                <div class="order-3 order-md-1 col-4 col-md-1 mr-md-4 my-2">
                                    <button type="button" class="btn btn-icon-cus col-12"
                                        <?php
                                            if($calMn==1){
                                                $lastMn=12;
                                                $lastYr=$calYr-1;
                                            }elseif($calMn>1){
                                                $lastMn=$calMn-1;
                                                $lastYr=$calYr;
                                            }
                                        ?>
                                        onclick="location.href='calendar_v2.php?Yr=<?=$lastYr;?>&Mn=<?=$lastMn;?>'">
                                        <i class="material-icons">fast_rewind</i>
                                    </button>
                                </div>
                                <div class="order-5 col-4 col-md-1 ml-md-4 my-2">
                                    <button type="button" class="btn btn-icon-cus col-12"
                                        <?php
                                            if($calMn==12){
                                                $nextMn=1;
                                                $nextYr=$calYr+1;
                                            }else{
                                                $nextMn=$calMn+1;
                                                $nextYr=$calYr;
                                            }
                                        ?>
                                        onclick="location.href='calendar_v2.php?Yr=<?=$nextYr;?>&Mn=<?=$nextMn;?>'">
                                        <i class="material-icons">fast_forward</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    <div class="m-md-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-danger">Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thur</th>
                                    <th>Fri</th>
                                    <th class="text-success">Sat</th>
                                </tr>
                            </thead>
                            <tbody class="table bg-white">
                                <?php                                       
/*without Mother's Day*/            $holidays=[
                                        '1-1' => 'Happy New Year!',
                                        '2-14' => 'Valentine\'s Day',
                                        '3-8' => 'Women\'s Day',
                                        '4-11' => 'Pet Day',
                                        '4-22' => 'Earth Day',
                                        '5-1' => 'Labor Day',
                                        '6-8' => 'World Ocean Day',
                                        '7-6' => 'Happy World Chocolate Day!',
                                        '8-8' => 'Father\'s Day',
                                        '9-28' => 'Teacher\'s Day',
                                        '10-10' => 'National Day',
                                        '10-31' => 'Happy Halloween!',
                                        '11-11' => 'Shopping Day',
                                        '12-25' => 'Merry Chrismax!']; 

                                    $calDys=date('t',strtotime($calYr.'-'.$calMn.'-1')); 
                                    $firstWkDy=date('w',strtotime($calYr.'-'.$calMn.'-1'));
                                    $endWkDy=date('w',strtotime($calYr.'-'.$calMn.'-'.$calDys));

/*prepare to print table tbody*/    for ($i=0; $i<=ceil(($calDys+$firstWkDy-7)/7); $i++){
                                        echo "<tr>";
                                        for ($j=0; $j<=6; $j++){
                                            $calDate=($i*7)+($j+1)-$firstWkDy;
                                            $tdDate=$calDate;
                                            $tdHolidays="";
                                            $tdToday="";
                                            $calToday="";
/*if() for Holidays*/                       if(!empty($holidays[$calMn.'-'.$calDate])){
                                                $tdDate=($i*7)+($j+1)-$firstWkDy."<div class='holidayName'>".$holidays[$calMn.'-'.$calDate]."</div>";
                                                $tdHolidays="tdHolidays";
                                            }
/*if() for Mother's Day*/                   if((($i==2 && $firstWkDy>0) or ($i==1 && $firstWkDy==0)) && $j==0 && $calMn==5){
                                                $tdDate=($i*7)+($j+1)-$firstWkDy."<div class='holidayName'>Mother's Day</div>";
                                                $tdHolidays="tdHolidays";
                                            } // only for Mother's Day
/*if() for Today*/                          if($calDate==date('d') && $calMn==date('m') && $calYr==date('Y')){
                                                $calToday="<div class='divToday'>TODAY</div>";
                                                $tdToday="tdToday";
                                            }
/*start to print table tbody*/              if (($i==0 && $j<$firstWkDy) ||($i==ceil(($calDys+$firstWkDy-7)/7) && $j>$endWkDy)) {
                                                echo "<td> &nbsp; </td>";
                                            }elseif($j==0){
                                                echo "<td class='$tdHolidays $tdToday tdbg text-danger font-weight-bold'>";
                                                echo $tdDate;
                                                echo "</td>";
                                            }elseif($j==6){
                                                echo "<td class='$tdHolidays $tdToday tdbg text-success font-weight-bold'>";
                                                echo $tdDate;
                                                echo $calToday;
                                                echo "</td>";
                                            }else{
                                                echo "<td class='$tdHolidays $tdToday tdbg'>";
                                                echo $tdDate;
                                                echo $calToday;
                                                echo "</td>";
                                            }
                                        }
                                        echo "</tr>";
/*end to print table tbody*/        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body order-1 text-center">
                    <h1 class="h1XL"><?=$calYr.'&nbsp;&nbsp;'.$calMnF?></h1>
                </div>
            </div>
            <div class="card bgSecBlock col-12 col-lg-4 order-1 order-lg-2 align-self-stretch d-flex justify-content-between align-items-center">
                <p class="card-body text-warning clock"  id="Time"></p>


                <div class="m-3">
                    <div class="nav nav-tabs" id="myTab" role="tablist">
                        <div class="nav-item" role="presentation">
                            <a class="nav-link motto-1" id="motto-tab" data-toggle="tab" href="#motto" role="tab" aria-controls="home" aria-selected="true">Want some food for thought?</a>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="motto" role="tabpanel" aria-labelledby="motto-tab">
                            <?php
                                // $dsn="mysql:host=localhost;dbname=motto;charset=utf8";
                                // $pdo= new PDO($dsn,'root','');

                                // $mottos=$pdo -> query("select * from motto") -> fetchAll(PDO::FETCH_NUM);
                                // $saying[]='';
                                // $person[]='';
                                // foreach ($mottos as $motto){
                                //     $saying[]=$motto['1'];
                                //     $person[]=$motto['2'];
                                // }
                                // $randNum=rand(1,50);
                                ?>
                            <blockquote class="blockquote motto-2">
                                <p class="">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, sunt.</p>
                                <footer class="blockquote-footer motto-3 text-right"><cite title="Source Title">TestOne</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <?php $pic=str_pad($calMn, 2, '0', STR_PAD_LEFT).'-'.strval(rand(1,2));?>
                <img src="300x200/<?=$pic;?>.jpg" class="rounded m-3 d-none d-lg-block">
            </div>
        </div>
    </div>
</body>
</html>