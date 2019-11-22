<div class="container mt-5 mb-2">

    <div class="row">
      <div class="col-md-8 mb-3">
        <h5>Рейтинг: </h5>
        <?php
        $user = 'root';
        $password ='';
        $db ='testing';
        $host = 'localhost';


        $dsn ='mysql:host ='.$host.';dbname='.$db;
        $pdo = new PDO($dsn, $user, $password);
          $query = $pdo->query('SELECT * FROM `users` ORDER BY `points` DESC LIMIT 3 '); // вывод данных
          $number = 1;
           ?>
          <table class="table table-dark">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Имя</th>
    <th scope="col">Очки</th>
  </tr>
</thead>
<?php
          while ($row =  $query->fetch(PDO::FETCH_OBJ) ) {

    print
  '<tbody>
  <tr>
      <th scope="row"> '. $number . '</th>
      <td>' . $row->login . '</td>
      <td> '. $row->points . ' </td>
    </tr>
  </tbody>';
   $number++;
} ?></table>

      </div>
    </div>
  </div>
