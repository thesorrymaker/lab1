<?php
    session_start();
?>
<!DOCTYPE html><!--html5标准网页声明-->
<html lang="en"><!--语言为英语-->
<head>
<meta charset="UTF-8"><!--告知浏览器此页面属于什么字符编码格式-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="">
<link rel="shortcut icon" href="#">
<title>Студент: Е Хэн P32141 1007</title><!--定义网页的标题-->

</head>
<style>

    body {
        background: #DED4C8;
        color: #1d1d1d;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 14px;
        font-weight: 400;
    }
    .header {
        height: 155px;
        background-color: #4E3835;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    form * {
        margin-bottom: 4px;
        font-size: 16px;
        padding-bottom: 0.2%;
    }
    img {
        max-width: 400px;
        height: auto;
        border: 3px solid #4E3835;
    }
    .super_table {
        font-weight: 500;
        font-size: 18px;
        line-height: 25px;
        color: #4E3835;
        font-family: 'Roboto';
        border-color: #4E3835;
        background-color: #E6D5B8;
        margin-top: 10px;
        margin-right: 70px;
    }
    .r_button {
        cursor: pointer;
        min-width: 44px;
    }

    input[type="radio"] {
        cursor: pointer;
    }

    input[type="submit"] input[type="button"] button{
        cursor: pointer;
    }
    input[type="reset"] {
        cursor: pointer;
    }
    table {
        border-collapse: collapse;
        border: 2px solid rgb(200, 200, 200);
        border-color: #4E3835;
        letter-spacing: 1px;
        font-size: 20px;
    }
    td, th {
        border: 1px solid rgb(190, 190, 190);
        padding: 10px 20px;
    }
    th {
        background-color:#E6D5B9;
        border-color: #4E3835;
    }
    td {
        text-align: center;
        background-color:#E6D5B9;
        border-color: #4E3835;
    }
</style>
<body>
<script
        src="//ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#myForm').submit(function(form_listener) {
            form_listener.preventDefault();
            $.ajax({
                type : "GET",
                url : "script.php",
                data : $(this).serialize(),
                success : function(data) {
                    $('#resulting_table').html(data);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    function validate() {
        var R = Number(document.getElementById("hidden_r").value).toFixed(5);
        var y = document.forms["myForm"]["y"].value;
        if (isNaN(r)) {
            alert("Вы не выбрали R");
            return false;
        }
        if (y <= -3 | y >= 3) {
            alert("Вы нарушили границы Y.");
            return false;
        }
        if (isNaN(y) | y == "" | y == null) {
            alert("Вы ввели не число в Y");
            return false;
        }
        if (getValue()) {
            return true;
        }
        return false;
    }
    function getValue() {
        var possibleAnswers = [-5, -4, -3, -2, -1, 0, 1, 2];
        var numbers = new Set(possibleAnswers)
        var radio1 = document.querySelectorAll('.checker:checked');
        if(radio1.length===0){
            document.getElementById("currx").innerHTML = "";
            alert("Выберете X");
            return false;
        }
        if (radio1.length > 1) {
            alert("Нужно выбрать один радиус... Да, такое задание... Извините!");
            return false;
        }
        var checkedValue = document.querySelector('.checker:checked').value;
        return true;
    }
    function updateButton(value_button) {
        document.getElementById("hidden_r").value = value_button;
        document.getElementById("currr").innerHTML = value_button;
    }
    function updateText() {
        document.getElementById("curry").innerHTML = document.forms["myForm"]["y"].value;
    }
    function updateRadio() {
        if (getValue()) {
            document.getElementById("currx").innerHTML = document.querySelector('.checker:checked').value;
            document.getElementById("hidden_x").value = document.querySelector('.checker:checked').value;
        }
    }
    function cleaner(){
        document.getElementById("currr").innerHTML = "";
        document.getElementById("curry").innerHTML = "";
        document.getElementById("currx").innerHTML = "";
    }
</script>
<header class="header">
    <h2 class="title">web 1 Студент: Е Хэн P32141 1007</h2>
</header>
<div class="container">
    <div class="block">

        <div class="block_text_left">
            <p class="block_title">Вариант № 1007</p>
            <p class="block_description"></p>
        </div>
    </div>

    <div class="line"></div>
    <div class="block">
        <div class="block_text_right">
            <p class="block_title right">
                Решение лабораторной работы
            </p>
            <form method="get" name="myForm" action="script.php" id="myForm">
                <fieldset>
                    <legend class="block_description">Выбор R</legend>
                    <div>
                        <input type="button" id="r_button1" value="1" class="r_button" name="r"
                               onclick="return updateButton(value)">
                        <input type="button" id="r_button2" value="2" class="r_button" name="r"
                               onclick="return updateButton(value)">
                        <input type="button" id="r_button3" value="3" class="r_button" name="r"
                               onclick="return updateButton(value)">
                        <input type="button" id="r_button4" value="4" class="r_button" name="r"
                               onclick="return updateButton(value)">
                        <input type="button" id="r_button5" value="5" class="r_button" name="r"
                               onclick="return updateButton(value)">
                </fieldset>
                <fieldset>
                    <legend class="block_description">Выбор Y</legend>
                    <div>
                        <label for="y-text" class="block_description">Изменение Y:</label>
                        <input type="text" name="y" id="y-text" placeholder="(-5;5)" onkeyup="return updateText()" maxlength="11">
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="block_description">Выбор X</legend>
                    <div class="r-choose">
                        <input type="radio" name="x" id="choice_check1" value="-5" class="checker"
                        onclick="return updateRadio();">
                        <label class="rki" for="choice_check1" class="block_description">X = -5</label>

                        <input type="radio" name="x" id="choice_check2" value="-4" class="checker"
                               onclick="return updateRadio();">
                        <label class="rki" for="choice_check2" class="block_description">X = -4</label>

                        <input type="radio" name="x" id="choice_check3" value="-3" class="checker"
                               onclick="return updateRadio();">
                        <label class="rki" for="choice_check3" class="block_description">X = -3</label>

                        <input type="radio" name="x" id="choice_check4" value="-2" class="checker"
                               onclick="return updateRadio();">
                        <label class="rki" for="choice_check4" class="block_description">X = -2</label>

                        <input type="radio" name="x" id="choice_check5" value="-1" class="checker"
                               onclick="return updateRadio();">
                        <label class="rki" for="choice_check5" class="block_description">X = -1</label>

                        <input type="radio" name="x" id="choice_check6" value="0" class="checker"
                               onclick="return updateRadio();">
                        <label class="rki" for="choice_check6" class="block_description">X = 0</label>

                        <input type="radio" name="x" id="choice_check7" value="1" class="checker"
                               onclick="return updateRadio();">
                        <label class="rki" for="choice_check7" class="block_description">X = 1</label>

                        <input type="radio" name="x" id="choice_check8" value="2" class="checker"
                               onclick="return updateRadio();">
                        <label class="rki" for="choice_check8" class="block_description">X = 2</label>

                        <input type="radio" name="x" id="choice_check9" value="3" class="checker"
                               onclick="return updateRadio();">
                        <label class="rki" for="choice_check9" class="block_description">X = 3</label>
                    </div>
                    <div>
                        <input type="hidden" name="real_x" value="nichego" id="hidden_x">
                        <input type="hidden" name="real_r" value="nichego" id="hidden_r">
                    </div>
                </fieldset>
                <div class = "range">
                    <img loading = 'lazy' src = "1.png">
                </div>
                <div>
                    <input type="submit" value="Проверить" id="submit_button"  name="submit" onclick="return validate()">
                    <input type="reset" value="Очистить форму" onclick="return cleaner()">

                </div>
            </form>
        </div>
    </div>
    <div class="line"></div>
    <div class="block">
        <table class="online">
            <tr>
                <th rowspan="2">Запрос</th>
                <th colspan="3">Значения переменных</th>
            </tr>
            <tr>
                <th>X</th>
                <th>Y</th>
                <th>R</th>
            </tr>
            <tr>
                <td>Текущий</td>
                <td id="currx"></td>
                <td id="curry"></td>
                <td id="currr"></td>
            </tr>
        </table>
        <div>
            <div id="resulting_table">
            <?php
    		$table_result = "<table id=\"main_table\" class=\"super_table\" border=\"3\"><tr><th>X:</th><th>Y:</th><th>R:</th><th>Попадание:</th><th>Время работы:</th></tr>";
        foreach ($_SESSION['history'] as $line) {
        $table_result.="<tr><td>$line[0]</td><td>$line[1]</td><td>$line[2]</td><td>$line[3]</td><td>$line[4]</td></tr>";
        }
        $table_result.="</table>";
        echo $table_result;
            $abc="<button name=\"del\" type=\"button\" class=\"btn btn-primary btn-xs\" id=\"del\">删除</button>";
            echo $abc
        ?>
    </div>
    </div>
</body>
</html>

