<?php
    require_once('Models/Todo.php');
    require_once('function.php');

    // Todoクラスのインスタンス化
    $todo = new Todo();
    // DBからデータを全件取得
    $tasks = $todo->all();

    // echo '<pre>';
    // var_dump($tasks);
    // exit();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="px-5 bg-primary">
      <nav class="navbar navbar-dark">
          <a href="index.php" class="navbar-brand">TODO APP</a>
          <div class="justify-content-end">
              <span class="text-light">
                  SeedKun
              </span>
          </div>
      </nav>
  </header>
  <main class="container py-5">
      <section>
          <form class="form-row justify-content-center" action="create.php" method="POST">
              <div class="col-10 col-md-6 py-2">
                  <input id="input-task" type="text" class="form-control" placeholder="ADD TODO" name="task">
              </div>
              <div class="py-2 col-md-3 col-10">
                  <button id="add-button" type="submit" class="col-12 btn btn-primary">ADD</button>
              </div>
          </form>
      </section>
      <section class="mt-5">
        <table class="table table-hover">
            <thead>
              <tr class="bg-primary text-light">
                  <th class=>TODO</th>
                  <th>DUE DATE</th>
                  <th>STATUS</th>
                  <th></th>
                  <th></th>
                  <th></th>
              </tr>
              <!-- <tr>
                  <td>create new website</td>
                  <td>2019/08/21</td>
                  <td>NOT YET</td>
                  <td>
                      <a class="text-success" href="edit.php">EDIT</a>
                  </td>
                  <td>
                      <a class="text-danger" href="delete.php">DELETE</a>
                  </td>
              </tr>
              <tr>
                  <td>go to club</td>
                  <td>2019/10/21</td>
                  <td>DONE</td>
                  <td>
                      <a class="text-success" href="edit.php">EDIT</a>
                  </td>
                  <td>
                      <a class="text-danger" href="delete.php">DELETE</a>
                  </td>
              </tr> -->
            </thead>
            <tbody>
            <?php foreach ($tasks as
            $task):?>
            <tr id="task-<?php echo h($task['id']); ?>">
              <td>
              <?php echo h($task['name']); ?>
              </td>
              <td>
              <?php echo h($task['due_date']); ?>
              </td>

              <?php if($task['done_flg'] == 0): ?>
                <td id="done-<?php echo h($task['id']); ?>">NOT YET</td>
              <?php else: ?>
                <td>DONE</td>
              <?php endif; ?>

              <!-- <td><?php echo h($task['done_flg']); ?></td> -->

              <td>
                <a class="text-success" href="edit.php?id=<?php echo h($task['id']); ?>">EDIT</a>
              </td>
              <td>
                <a data-id="<?php echo h($task['id']); ?>" class="text-danger delete-button" href="delete.php?id=<?php echo h($task['id']); ?>">DELETE</a>
              </td>
              <td>

              <?php if($task['done_flg'] == 0): ?>
                <button data-id="<?php echo h($task['id']); ?>" class="btn btn-info done-button">完了</button>
              <?php endif; ?>
              <!-- <button class="btn btn-info done-button">完了</button> -->
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </section>
  </main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="./assets/js/app.js"></script>
</body>
</html>