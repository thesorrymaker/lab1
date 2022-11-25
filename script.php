<?php
session_start();
date_default_timezone_set('Europe/Moscow');
$time_start = microtime(true);
$x = $_GET['real_x'];
$y = $_GET['y'];
$r = $_GET['real_r'];
// 服务器验证
if(isset($r) && is_numeric($r)&& ( $r==1 || $r==2 || $r==3 || $r==4 ||$r==5) ){
    if(isset($y) && is_numeric($y) &&  preg_match("/-[1-5]|0|[1-5]/m", $y) && ($y>-5 && $y<5)){
        if(isset($x) && is_numeric($x) && ( $x == -5 || $x == -4 || $x == -3 || $x == -2 || $x == -1 ||$x == 0 || $x == 1 || $x == 2 || $x == 3 )){
            //继续测试
            $flag = false;

            //三角形
            if($x<=$r && $x>=0 && $y<=$r && $y<=0 &&($x+$y<=$r)){
                $flag = true;
            }
            //矩形
            if($x>=0 && $x<=$r && $y>=0 && $y<=$r/2){
                $flag=true;
            }
            //圆形
            if(($x^2+$y^2<=($r)^2)&&$x>=-$r && $x<=0 && $y<=$r && $y>=0){
                $flag=true;
            }
            //时间

            $current_time = date('Y-m-d, H:i:s');
            $session_time = number_format(microtime(true)-$time_start,5);

            $after_all = [$x,$y,$r, $flag ? "Есть" : "Нет", $session_time];

            //建表需要把这些数据全部传过来，最好存放在session里面
            $_SESSION['history'][] = $after_all;
            $_SESSION['time']['0'] = $current_time;
            $table_result = "<table id=\"main_table\" class=\"super_table\" border=\"3\"><tr><th>X:</th><th>Y:</th><th>R:</th><th>Попадание:</th><th>Время работы:</th></tr>";
            foreach ($_SESSION['history'] as $line) {
                $table_result.="<tr><td>$line[0]</td><td>$line[1]</td><td>$line[2]</td><td>$line[3]</td><td>$line[4]</td></tr>";
            }
            $table_result = "<label for=\"main_table\" class=\"against_the_current\">Текущая дата и время: $current_time</label>".$table_result;
            $table_result.="</table>";
            echo $table_result;
            $abc="<button name=\"del\" type=\"button\" class=\"btn btn-primary btn-xs\"onclick='return jump()' id=\"del\">删除</button>";
            echo $abc;
        } else {
            die("<label class=\"error\">You tried to break X</label>");
        }
    } else {
        die("<label class=\"error\">You tried to break Y</label>");
    }
} else {
    die("<label class=\"error\">You tried to break R</label>");
}
?>