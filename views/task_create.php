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
    

<div class="container bootstrap snippet">
    <div class="row">
    	<div class="col-sm-9">    
            <?php if(isset($form_message) && empty($form->errors)): ?>
                <div class="alert alert-success" role="alert">
                    <?= $form_message; ?>
                </div>
            <?php endif; ?>

            <?php if(isset($form_message) && !empty($form->errors)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $form_message; ?>
            </div>  
            <?php endif; ?>
            <hr>
            <form class="form" action="task-create" method="post" id="createTaskForm">
                <div class="form-group">                
                    <div class="col-xs-6">
                        <label for="user_name"><h4>*User name</h4></label>
                        <input type="text" 
                               class="form-control <?php if(isset($form->errors['user_name'])): echo 'is-invalid'; endif; ?>" 
                               name="user_name" 
                               id="username" 
                               placeholder="user name"
                               value="<?php if(isset($form->user_name)): echo $form->user_name; endif; ?>"
                               title="enter your name." required>
                        <small id="username_error" class="text-danger">
                            <?php if(isset($form->errors['user_name'])): echo $form->errors['user_name']; endif; ?>
                        </small>
                    </div>
                </div>
                  <div class="form-group">
                    <div class="col-xs-6">
                        <label for="email"><h4>*Email</h4></label>
                        <input type="email" 
                               class="form-control <?php if(isset($form->errors['email'])): echo 'is-invalid'; endif; ?>" 
                               name="email" 
                               id="email" 
                               placeholder="you@email.com" 
                               value="<?php if(isset($form->email)): echo $form->email; endif; ?>"
                               title="enter your email." required>
                        <small id="email_error" class="text-danger">
                            <?php if(isset($form->errors['email'])): echo $form->errors['email']; endif; ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="task_text"><h4>*Task text</h4></label>
                        <textarea 
                            class="form-control <?php if(isset($form->errors['task_text'])): echo 'is-invalid'; endif; ?>" 
                            rows="10" 
                            cols="45" 
                            name="task_text" 
                            id="task_text" 
                            placeholder="enter task text" 
                            title="enter task text" required><?php if(isset($form->task_text)): echo $form->task_text; endif; ?></textarea>
                        <small id="task_text_error" class="text-danger">
                            <?php if(isset($form->errors['task_text'])): echo $form->errors['task_text']; endif; ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                     <div class="col-xs-12 text-right">
                          <a href="/" class="btn btn-lg btn-primary" role="button">Back</a>
                          <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                      </div>
                </div>
            </form>           
            <hr>
        </div><!--/col-9-->
    </div><!--/row-->                                                   
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
