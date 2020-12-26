<?php session_start(); ?>
<form action="lcp3-checkin.php" method="post">
          <div class="imgcontainer">
                    <img src="/bootstrap/img/avatar.png" alt="Avatar" class="avatar">
          </div>
          <div class="container">
                    <label for="email"><b>E-mail</b></label>
                    <input type="text" placeholder="Enter E-mail" name="email" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <button type="submit">Login</button>
          </div>
</form>