<?php
// Логика вычисления калькулятора на PHP
$result = "";
if (isset($_POST['B3'])) {
    $num1 = isset($_POST['T7']) ? doubleval($_POST['T7']) : 0;
    $num2 = isset($_POST['T8']) ? doubleval($_POST['T8']) : 0;
    $type = isset($_POST['D2']) ? $_POST['D2'] : 'сумма';

    if ($type == 'сумма') {
        $result = $num1 + $num2;
    } else if ($type == 'среднее') {
        $result = ($num1 + $num2) / 2;
    } else if ($type == 'максимальное') {
        $result = ($num1 > $num2) ? $num1 : $num2;
    } else if ($type == 'минимальное') {
        $result = ($num1 < $num2) ? $num1 : $num2;
    }
}
?>

<div id="right">
    <div id="info"> 
        <img src="CSS.png" align="left" alt="CSS">
        <p>CSS используется создателями веб-страниц для задания цветов, шрифтов, расположения отдельных блоков и других аспектов представления внешнего вида этих веб-страниц. Основной целью разработки CSS являлось разделение описания логической структуры веб-страницы (которое производится с помощью HTML или других языков разметки) от описания внешнего вида этой веб-страницы (которое теперь производится с помощью формального языка CSS). Такое разделение может увеличить доступность документа, предоставить большую гибкость и возможность управления его представлением, а также уменьшить сложность и повторяемости в структурном содержимом.</p>
    </div>
    
    <div id="reg">
        <form method="POST">
            <div align="center">
                <table border="0" width="90%" id="table2">
                    <tr>
                        <td colspan="3">
                            <p align="center"><b>Расчет выражений</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="26%">Первое число</td>
                        <td width="29%">
                            <input type="text" name="T7" size="20" value="<?php echo isset($_POST['T7']) ? htmlspecialchars($_POST['T7']) : ''; ?>">
                        </td>
                        <td width="41%">Тип расчета</td>
                    </tr>
                    <tr>
                        <td width="26%">Второе число</td>
                        <td width="29%">
                            <input type="text" name="T8" size="20" value="<?php echo isset($_POST['T8']) ? htmlspecialchars($_POST['T8']) : ''; ?>">
                        </td>
                        <td width="41%">
                            <select size="1" name="D2">
                                <option <?php if (isset($_POST['D2']) && $_POST['D2'] == 'сумма') echo 'selected'; ?>>сумма</option>
                                <option <?php if (isset($_POST['D2']) && $_POST['D2'] == 'среднее') echo 'selected'; ?>>среднее</option>
                                <option <?php if (isset($_POST['D2']) && $_POST['D2'] == 'максимальное') echo 'selected'; ?>>максимальное</option>
                                <option <?php if (isset($_POST['D2']) && $_POST['D2'] == 'минимальное') echo 'selected'; ?>>минимальное</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="26%">Ответ</td>
                        <td width="29%">
                            <input type="text" name="T9" size="20" readonly value="<?php echo $result; ?>">
                        </td>
                        <td width="41%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p align="center" style="margin-top: 10px;">
                                <input type="submit" value="Рассчитать" name="B3">
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
