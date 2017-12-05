<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Менеджер задач</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" />
</head>
<body>
<nav><!-- Static navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Управление задачами</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Задачи <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/tasks/">
                                    <span class="big-icon-inside">
                                        <span class="glyphicon ion-clipboard icon-big"></span>Мои задачи
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="/tasks/create">
                                    <span class="big-icon-inside">
                                        <span class="glyphicon ion-compose icon-big"></span>Новая задача
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/tasks/create">
                            <span>
                                <span class="glyphicon ion-plus"></span>Новая задача
                            </span>
                        </a>
                    </li>
                    <?php if (\App\Models\User::isAdmin()): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Компания <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/users/">
                                        <span class="big-icon-inside">
                                            <span class="glyphicon ion-person-stalker icon-big"></span>Сотрудники
                                        </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false"><?php echo \App\Models\User::getUserById($_SESSION['user'])['fullname'] ;?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/user/">
                                <span class="big-icon-inside">
                                    <span class="glyphicon glyphicon-user icon-big"></span>Личная информация
                                </span>
                                </a>
                            </li>

                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Дополнительные действия</li>
                            <li>
                                <a title="Выход из приложения" href="/users/logout">
                                <span class="big-icon-inside">
                                    <span class="glyphicon ion-log-out icon-big"></span>Выход
                                </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</nav>