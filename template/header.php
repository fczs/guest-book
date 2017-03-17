<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$LANG["TITLE"]?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="/template/css/style.css">
</head>
<body>
<div class="gp-page">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand">
                    <?php if($users->isUser()): ?>
                        <?=$users->getUserName();?>
                    <?php else: ?>
                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                    <?php endif; ?>
                </span>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php if($users->isUser()): ?>
                        <li><a href="#" type="button" data-toggle="modal" data-target="#Modal_Message"><?=$LANG["WRITE_MESSAGE_OPTION"]?></a></li>
                        <?php if($users->isAdmin()): ?>
                            <li><a href="/"><?=$LANG["HOME_OPTION"]?></a></li>
                            <li><a href="/messages/"><?=$LANG["ADMIN_OPTION"]?></a></li>
                        <?php endif; ?>
                        <li><a href="#" class="logout"><?=$LANG["LOGOUT_OPTION"]?></a></li>
                    <?php else: ?>
                        <li><a href="#" type="button" data-toggle="modal" data-target="#Modal_Login"><?=$LANG["LOGIN_OPTION"]?></a></li>
                    <?php endif; ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container">
