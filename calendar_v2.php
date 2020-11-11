<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpetual Calendar</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
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
        table{
            width: 100%;
            table-layout: fixed;
            border-spacing: 0;
        }
        .h1XL{
            text-align: center;
            font-size: 3.2rem;
            font-weight: 700;
            color: #fff;
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
        td.tdHolidays{
            padding: 0.35rem 0.25rem 0 0.25rem;
            box-shadow: inset 0 0 3px 3px #f991cc;             
        }
        .bgMainBlock{
            background: #26647C;
        }
        .bgSecBlock{
            background: #fafafa;
        }
        .holidayName{
            font-size:0.45rem;
            font-weight: 600;
            color: #dc3545;
            line-height:0.7rem;
            margin-bottom:0;
        }
        .holidayName:hover{
            width: 6rem;
            height: 4rem;
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.4rem;
            transform: translate(-1rem,-2rem);
            background: rgba(190, 229, 235, 90%);
            padding: 0.2rem;
            border: 1px #17a2b8 solid;
            border-radius: .25rem;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center; 
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
            font-size:0.4rem;
            font-weight: 500;
            line-height:0.65rem;
            margin-bottom:0;
            }
        }
        @media (min-width: 576px) and (max-width: 767.98px){
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
        } 

        /* .inputHere::after:hover{   這段不會寫......
            content: 'please input';
            color: #f00;
            position: relative;
            float: right;
        } */
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
                                <div class="input-group order-1 order-md-2 col-12 col-md-3 mt-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Year</span>
                                    </div><span class="inputHere"></span>
                                    <input type="text" class="form-control" name="Yr">
                                </div>
                                <div class="input-group order-2 order-md-3 col-12 col-md-3 mt-1">
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
                                <div class="order-4 order-md-4 col-4 col-md-2 mt-1">
                                    <button type="submit" class="btn btn-info col-12">Send</button>
                                </div>
                                <div class="order-3 order-md-1 col-4 col-md-1 mr-md-4 mt-1">
                                    <button type="button" class="btn btn-icon-cus col-12"
                                        <?php
                                            if($calMn==1){
                                                $lastMn=12;
                                                $lastYr=$calYr-1;
                                            }elseif($calMn<1){
                                                $lastMn=$calMn-1;
                                                $lastYr=$calYr;
                                            }
                                        ?>
                                        onclick="location.href='calendar_v2.php?Yr=<?=$lastYr;?>&Mn=<?=$lastMn;?>'">
                                        <i class="material-icons">fast_rewind</i>
                                    </button>
                                </div>
                                <div class="order-5 col-4 col-md-1 ml-md-4 mt-1">
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
                                        '1-1' => 'New Year\'s Day',
                                        '2-14' => 'Valentine\'s Day',
                                        '3-8' => 'Women\'s Day',
                                        '4-11' => 'Pet Day',
                                        '4-22' => 'Earth Day',
                                        '5-1' => 'Labor Day',
                                        '6-8' => 'World Ocean Day',
                                        '8-8' => 'Father\'s Day',
                                        '9-28' => 'Teacher\'s Day',
                                        '10-10' => 'National Day',
                                        '11-11' => 'Shopping Day',
                                        '12-25' => 'Merry Chrismax']; 

                                    $calDys=date('t',strtotime($calYr.'-'.$calMn.'-1')); 
                                    $firstWkDy=date('w',strtotime($calYr.'-'.$calMn.'-1'));
                                    $endWkDy=date('w',strtotime($calYr.'-'.$calMn.'-'.$calDys));

/*prepare to print table tbody*/    for ($i=0; $i<=ceil(($calDys+$firstWkDy-7)/7); $i++){
                                        echo "<tr>";
                                        for ($j=0; $j<=6; $j++){
                                            $calDate=($i*7)+($j+1)-$firstWkDy;
/*if() for Holidays*/                   if(!empty($holidays[$calMn.'-'.$calDate])){
                                                $tdDate=($i*7)+($j+1)-$firstWkDy."<div class='holidayName'>".$holidays["$calMn-$calDate"]."</div>";
                                                $tdHolidays="tdHolidays";
                                            }else{
                                                $tdDate=$calDate;
                                                $tdHolidays="";
                                            }


// /*if() for Mother's Day*/                   if((($i==2 && $firstWkDy>0) or ($i==1 && $firstWkDy==0)) && $j==0 && $calMn==5){
//                                                 // $tdDate=($i*7)+($j+1)-$firstWkDy.'</br><p style=\'font-size:0.5rem;line-height:0.85rem;margin-bottom:0;\'>Mother\'s Day</p>';
//                                                 // $tdClass="tdHolidays";
//                                             } // only for Mother's Day


// /*if() for Today*/                          if($calDate==date('d') && $calMn==date('m')){
//                                                 $tdClassToday="tdToday";

//                                             }


/*start to print table tbody*/      if (($i==0 && $j<$firstWkDy) ||($i==ceil(($calDys+$firstWkDy-7)/7) && $j>$endWkDy)) {
                                                echo "<td> &nbsp; </td>";
                                            }elseif($j==0){
                                                echo "<td class='$tdHolidays tdbg text-danger font-weight-bold'>";
                                                echo $tdDate;
                                                echo "</td>";
                                            }elseif($j==6){
                                                echo "<td class='$tdHolidays tdbg text-success font-weight-bold'>";
                                                echo $tdDate;
                                                echo "</td>";
                                            }else{
                                                echo "<td class='$tdHolidays tdbg'>";
                                                echo $tdDate;
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
                <div class="card-body order-1">
                    <h1 class="h1XL"><?=$calYr.'&nbsp;&nbsp;'.$calMnF?></h1>
                </div>
            </div>
            <div class="card bgSecBloack col-12 col-lg-4 order-1 order-lg-2 align-self-stretch d-flex justify-content-between align-items-center">
                <h1 class="card-body text-warning"  id="Time"></h1>
                <div class="card-body text-info">
                    <div class="nav nav-tabs" id="myTab" role="tablist">
                        <div class="nav-item" role="presentation">
                            <a class="nav-link" id="motto-tab" data-toggle="tab" href="#motto" role="tab" aria-controls="home" aria-selected="true">Want some food for thought?</a>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="motto" role="tabpanel" aria-labelledby="motto-tab">
                            <?php
                                $dsn="mysql:host=localhost;dbname=motto;charset=utf8";
                                $pdo= new PDO($dsn,'root','');

                                $mottos=$pdo -> query("select * from motto") -> fetchAll(PDO::FETCH_NUM);
                                $saying[]='';
                                $person[]='';
                                foreach ($mottos as $motto){
                                    $saying[]=$motto['1'];
                                    $person[]=$motto['2'];
                                }
                                $randNum=rand(1,50);
                                ?>
                            <blockquote class="blockquote">
                                <p class="mb-0"><?= $saying[$randNum];?></p>
                                <footer class="blockquote-footer text-right"><cite title="Source Title"><?= $person[$randNum];?></cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <?php
                    $pic=str_pad($calMn, 2, '0', STR_PAD_LEFT).'-'.strval(rand(1,2));
                ?>
                <img src="300x200/<?=$pic;?>.jpg" class="rounded m-3 d-none d-lg-block">    
            </div>           
        </div>
    </div>
</body>
</html>