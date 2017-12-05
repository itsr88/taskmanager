<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container">
    <div class="page-header">
        <h2>Новая задача</h2>
    </div>

</div>
<div id="container" class="container">
    <form class="well form-horizontal" method="post">

        <div class="form-group">
            <label for="name" class="col-lg-3 control-label">Название</label>
            <div class="col-lg-9">
                <input required="" tabindex="1" type="text" name="title" id="name" placeholder="Название задачи"
                       class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-lg-3 control-label">Описание</label>
            <div class="col-lg-9">
                <textarea required="" tabindex="2" class="form-control" rows="3" id="description" name="description"
                          placeholder="Описание задачи"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="executor_id" class="col-lg-3 control-label">Ответственный</label>
            <div class="col-lg-9">
                <select tabindex="2" name="executor" id="executor" class="form-control">
                    <?php foreach ($executors as $executor): ?>
                        <option value="<?php echo $executor['id']; ?>"><?php echo $executor['fullname']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="deadline" class="col-lg-3 control-label">Дедлайн</label>
            <div class="col-lg-9">
                <input type="date" id="deadline" name="deadline" class="form-control datepicker hasDatepicker"
                       placeholder="ДД.ММ.ГГГГ">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-9 col-lg-offset-3">
                <button type="reset" class="btn btn-default">Очистить</button>
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>

    </form>


</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
<script src="/public/js/jquery.min.js"></script>
</body>
</html>
