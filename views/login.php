<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Tasks</a>
        <div class="col-xs-12 text-right">
            <?php if(!$isLogged): ?>
             <a href="/login" class="btn btn-sm btn-primary" role="button">
                 <i class="fa fa-sign-in"></i>
                 Login
             </a>
            <?php else: ?>
             <a href="/logout" class="btn btn-sm btn-primary" role="button">
                 <i class="fa fa fa-sign-out"></i>
                 Logout
             </a>    
            <?php endif; ?>
         </div>
    </div>
</nav>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><?= $title ?></h1>
     </div>
</section>
    
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto">
        <div class="card card-container">
            <?php if(isset($form_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $form_message; ?>
            </div>  
            <?php endif; ?>
            <form class="form-signin" action="login" method="post">
                <input type="text"
                       name="username"
                       id="inputUsername" 
                       class="form-control <?php if(isset($form->errors['username'])): echo 'is-invalid'; endif; ?>" 
                       placeholder="User name" 
                       value="<?php if(isset($form->username)): echo $form->username; endif; ?>"
                       required autofocus>
                <small id="username_error" class="text-danger">
                    <?php if(isset($form->errors['username'])): echo $form->errors['username']; endif; ?>
                </small>
                <input type="password" 
                       id="inputPassword" 
                        name="password"
                       class="form-control <?php if(isset($form->errors['username'])): echo 'is-invalid'; endif; ?>"
                       placeholder="Password" required>
                <small id="username_error" class="text-danger">
                    <?php if(isset($form->errors['password'])): echo $form->errors['password']; endif; ?>
                </small>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div>
    </div>
</div>
<!-- Footer -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Back to top</a>
                </p>
                <p class="text-right text-muted">created by <a href="https://www.facebook.com/soulilya"><i>soulilya</i></a></p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
