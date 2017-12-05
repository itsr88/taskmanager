<?php include __DIR__ . '/../layouts/header.php'; ?>
<div class="container">
    <div class="page-header">
        <h2>Задачи в работе</h2>
    </div>
</div>
<div id="container" class="container">
    <ul class="nav nav-tabs">
        <li class="<?php if ($_GET['status']=='active') echo 'active';?>"><a href="?status=active">В работе <span class="badge"><?php echo $tasks['count']; ?></span></a></li>
        <li class="<?php if ($_GET['status']=='completed') echo 'active';?>"><a href="?status=completed">Завершенные <span class="badge"><?php echo $tasks['count']; ?></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="staff">
            <div class="top-buffer">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Задача</th>
                        <th>Дедлайн</th>
                        <th>Ответственный</th>
                        <th>Постановщик</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><a href="/tasks/<?php echo $task['id']; ?>"><?php echo $task['title']; ?></a></td>
                            <td><?php echo $task['deadline']; ?></td>
                            <td><?php echo $task['executor']; ?></td>
                            <td><?php echo $task['creator']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
<script src="/public/js/jquery.min.js"></script>
</body>
</html>
