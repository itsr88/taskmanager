<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container">
    <div class="page-header">
        <h2><?php echo $task['title']; ?></h2>
    </div>

</div>
<div id="container" class="container">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Описание задачи</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <textarea class="form-control" rows="5" id="description"
                              name="description"
                              placeholder="Описание задачи"><?php echo $task['description']; ?>
                    </textarea>
                </div>

                <div class="col-lg-2">
                    <button class="btn btn-sm btn-primary show-on-change" data-target="#description"
                            data-href="/ajax/tasks/change/46">Изменить
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Действия</h3>
        </div>
        <div class="panel-body">
            <form class="panel-body form-horizontal" method="post">
                <div class="form-group col-lg-6">
                    <a href="/tasks/destroy/<?php echo $task['id']; ?>"><input type="button" name="delete"
                                                                               class="btn btn-sm btn-default"
                                                                               value="Удалить"></a>

                </div>

            </form>
            <form class="panel-body form-horizontal" action="/tasks/update-status/<?php echo $task['id']; ?>" method="post">
                <div class="form-group col-lg-6">
                    <input type="submit" name="status"
                           class="btn btn-sm btn-primary"
                           value="completed">

                </div>
            </form>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Сроки</h3>
        </div>
        <div class="panel-body">
            <div class="panel-body form-horizontal">
        <form action="/tasks/update-deadline/<?php echo $task['id']; ?>" method="post">
                <div class="form-group">
                    <label for="deadline" class="col-lg-1 control-label">Дедлайн</label>
                    <div class="col-lg-2">
                        <input type="date" id="deadline" name="deadline"
                               class="datepicker form-control hasDatepicker"
                               value="<?php echo $task['deadline']; ?>"
                               placeholder="ДД.ММ.ГГГГ">
                    </div>

                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-sm btn-primary show-on-change" id="deadline">
                            Изменить
                        </button>
                    </div>
                </div>
        </form>

            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Участники</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group panel-body">
                <li class="list-group-item">
                    Постановщик: <a href="/user/watch/2"><?php echo $task['creator']; ?></a>
                </li>
                <li class="list-group-item">
                    <form action="/tasks/update-executor/<?php echo $task['id']; ?>" method="post">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label for="executor_id">Ответственный:</label>
                            <select tabindex="2" name="executor_id" id="executor_id"
                                    class="form-control">
                                <?php foreach ($executors as $executor): ?>
                                    <option value="<?php echo $executor['id']; ?>"><?php echo $executor['fullname']; ?></option>
                                <?php endforeach; ?>
                                <option selected> <?php echo $task['executor']; ?></option>
                            </select>
                        </div>

                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary"> Изменить</button>
                        </div>
                    </div>
                    </form>

                </li>
            </ul>


        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Комментарии</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                <?php foreach ($comments as $comment): ?>
                <li class="list-group-item">
                    <h4><?php echo $comment->author; ?></h4>
                    <span class="text-primary"><?php echo $comment->added; ?></span>
                    <div><?php echo $comment->text; ?></div>
                </li>
                <?php endforeach; ?>
            </ul>

            <div class="col-lg-6">
                <form class="well form-horizontal" method="post">

                    <div class="form-group">
                        <div class="col-lg-12">
                                                <textarea class="form-control" rows="5" id="text" name="text"
                                                          placeholder="Текст комментария"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-sm btn-primary">Создать</button>
                            <button type="reset" class="btn btn-sm btn-default">Очистить</button>
                        </div>
                    </div>

                </form>
            </div>
            <p id="test2">Тест </p>
            <p id="sendid"><?php echo $task['id']; ?> </p>

        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>

</body>
</html>
