<div class="block">
  <h2>Вход</h2>
  <?php if(isset($_SESSION["autorized"]) && $_SESSION["autorized"] == true): ?>
    <p style="padding: 10px 0;">Вы вошли как:<br><strong><?php echo $_SESSION["user"]; ?></strong></p>
    <p><a href="index.php?action=exit">Выйти</a></p>
  <?php else: ?>
    <form action="index.php" method="POST" style="margin: 0; padding: 5px;">
      Логин:<br><input type="text" name="login" style="width:100%; max-width:140px;"><br>
      Пароль:<br><input type="password" name="pwd" style="width:100%; max-width:140px;"><br>
      <input type="submit" value="Войти" style="margin-top: 8px;">
    </form>
  <?php endif; ?>
</div>
