<?php include __DIR__.'/../layouts/header.php';?>
<div class="container">
    <div class="page-header">
        <h2>Новый сотрудник</h2>
    </div>

</div>
<div id="container" class="container">
    <div class="tab-content">
        <div class="tab-pane fade active in" id="staff">
            <div class="top-buffer">
                <div class="col-lg-6">
                    <form class="well form-horizontal" method="post">

                        <div class="form-group">
                            <label for="email" class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-9">
                                <input tabindex="1" required="" type="email" name="email" id="email" placeholder="Email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fullname" class="col-lg-3 control-label">Имя</label>
                            <div class="col-lg-9">
                                <input tabindex="2" type="text" name="fullname" id="fullname" placeholder="Полное имя сотрудника" class="form-control">
                                <div class="checkbox">
                                    <label for="admin">
                                        <input type="checkbox" name="admin" id="admin">Администратор
                                    </label>
                                </div>
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