<div style="border-bottom: 1px solid rgb(210,210,210)" class="w-100">
  <div class="d-flex flex-column flex-md-row align-items-center container navigation-container">
        <h5 style="font-size: 24px; font-weight: 600;" class="my-0 mr-md-auto">learnhack.ru</h5>
        <nav class="my-2 my-md-0 mr-md-3">
          <?php
              if($_COOKIE['login']== ''):
           ?>
        </nav>
        <a class="btn btn-header-link" href="/auth.php">Войти</a>
        <a class="btn btn-header-link ml-4" href="/game.php">Приступить</a>
        <a class="btn btn-header-link ml-4" href="/reg.php">Регестрация</a>
        <?php
      else:
         ?>
           <a class="btn btn-outline-primary" href="/game.php">Приступить</a>
           <h2><?=$_COOKIE['login']?></h2>
           <button  class="btn btn-danger" id="exit_btn">Выйти</button>
        <?php
      endif;
         ?>
  </div>
</div>
