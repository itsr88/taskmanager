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
    <link href="/css/signin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" />
</head>
<body>
<div class="container">

    <form class="form-signin" action="" method="post" role="form">
        <h2 class="form-signin-heading">Вход</h2>
        <?php if ($errors):
            foreach ($errors as $error):
                echo $error;
            endforeach;
        endif; ?>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="text" name="password" id="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>
</div> <!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
