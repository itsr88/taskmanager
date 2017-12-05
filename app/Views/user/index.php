<?php include __DIR__.'/../layouts/header.php';?>

<div class="container">
    <div class="page-header">
        <h2>Сотрудники</h2>
    </div>

</div>
<div id="container" class="container">
    <div class="tab-content">
        <div class="tab-pane fade active in" id="staff">
            <div class="top-buffer">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Имя пользователя</th>
                        <th>email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><a href="/users/<?php echo $user['id']; ?>"><?php echo $user['fullname']; ?></a></td>
                        <td><?php echo $user['email']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <p><a href="/users/create" class="btn btn-info">Зарегистрировать сотрудника</a></p>
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
