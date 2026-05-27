<div id="left">
    <div id="reg">
        <form method="POST">
            <div align="center">
                <table border="0" width="90%" id="table1">
                    <tr>
                        <td colspan="2">
                            <p align="center"><b>Регистрация нового пользователя</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="55%">Ваш ник</td>
                        <td width="35%">
                            <input type="text" name="T1" size="20" value="<?php echo isset($_POST['T1']) ? htmlspecialchars($_POST['T1']) : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="55%">Ваш пароль</td>
                        <td width="35%">
                            <input type="password" name="T2" size="20" value="<?php echo isset($_POST['T2']) ? htmlspecialchars($_POST['T2']) : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="55%">Ваш пароль еще раз</td>
                        <td width="35%">
                            <input type="password" name="T3" size="20" value="<?php echo isset($_POST['T3']) ? htmlspecialchars($_POST['T3']) : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="55%">Фамилия</td>
                        <td width="35%">
                            <input type="text" name="T4" size="20" value="<?php echo isset($_POST['T4']) ? htmlspecialchars($_POST['T4']) : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="55%">Имя</td>
                        <td width="35%">
                            <input type="text" name="T5" size="20" value="<?php echo isset($_POST['T5']) ? htmlspecialchars($_POST['T5']) : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="55%">Пол</td>
                        <td width="35%">
                            <select size="1" name="D1">
                                <option <?php if (isset($_POST['D1']) && $_POST['D1'] == 'мужской') echo 'selected'; ?>>мужской</option>
                                <option <?php if (isset($_POST['D1']) && $_POST['D1'] == 'женский') echo 'selected'; ?>>женский</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="55%">Являетесь ли вы студентом/студенткой?</td>
                        <td width="35%">
                            <input type="radio" value="V1" name="R1" <?php if (!isset($_POST['R1']) || $_POST['R1'] == 'V1') echo 'checked'; ?>>да
                            <input type="radio" value="V2" name="R1" <?php if (isset($_POST['R1']) && $_POST['R1'] == 'V2') echo 'checked'; ?>>нет
                        </td>
                    </tr>
                    <tr>
                        <td width="55%">Ваш e-mail</td>
                        <td width="35%">
                            <input type="text" name="T6" size="20" value="<?php echo isset($_POST['T6']) ? htmlspecialchars($_POST['T6']) : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="55%">Получать рассылку с нашего сайта?</td>
                        <td width="35%">
                            <input type="checkbox" name="C1" value="ON" <?php if (isset($_POST['C1']) && $_POST['C1'] == 'ON') echo 'checked'; ?>>
                        </td>
                    </tr>
                </table>
            </div>
            <p align="center" style="margin-top: 10px;"><input type="submit" value="Подтвердить" name="B1"></p>
        </form>
    </div>
    
    <div id="info">
        <img src="PHP.png" align="left" alt="PHP">
        <p>PHP&nbsp;(англ.&nbsp;PHP (пи-эйч-пи): Hypertext Preprocessor&nbsp;— «PHP:&nbsp;препроцессор&nbsp;гипертекста»; первоначально&nbsp;Personal Home Page Tools&nbsp;— «Инструменты для создания персональных веб-страниц»)&nbsp;—&nbsp;скриптовый язык&nbsp;программирования общего назначения, интенсивно применяемый для разработки веб-приложений. В настоящее время поддерживается подавляющим большинством&nbsp;хостинг-провайдеров&nbsp;и является одним из лидеров среди языков программирования, применяющихся для создания&nbsp;динамических веб-сайтов.</p>
    </div>
</div>
