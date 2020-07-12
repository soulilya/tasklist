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

<div class="container mb-4">
    <div class="row">
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12 col-md-8 text-right"></div>
                <div class="col-sm-12 col-md-4 text-right">
                    <a href="task-create" class="btn btn-lg btn-block btn-success text-uppercase" role="button">Create task</a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <?php if(!empty($tasks)) : ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">
                                <a href="task?page=<?= $current_page?>&order=user_name">User name</a>
                            </th>
                            <th scope="col">
                                <a href="task?page=<?= $current_page?>&order=email">Email</a>
                            </th>
                            <th scope="col">Task text</th>
                            <th scope="col">
                                <a href="task?page=<?= $current_page?>&order=status">Status</a>
                            </th>
                            <?php if($isLogged): ?>
                            <th> </th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tasks as $task) : ?>
                        <tr>
                            <td><?= isset($task['user_name']) ? $task['user_name'] : ''; ?></td>
                            <td><?= isset($task['email']) ? $task['email'] : ''; ?></td>
                            <td><?= isset($task['task_text']) ? $task['task_text'] : ''; ?></td>
                            <td><?= isset($task['status']) ? TaskModel::STATUSES[$task['status']]: ''; ?></td>
                            <?php if($isLogged): ?>
                            <td class="text-right">
                                <a href="task-edit?id=<?= $task['id']; ?>" class="btn btn-sm btn-success" role="button">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>
                                <a href="task-delete?id=<?= $task['id']; ?>" class="btn btn-sm btn-danger" role="button">
                                    <i class="fa fa-trash"></i> 
                                </a>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>   
                <?php if(isset($pages)): ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if($current_page != 1): ?>
                        <li class="page-item">
                            <a class="page-link" 
                                href="<?php echo 'task?page=' . $prev;?>" 
                                aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                              <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <?php for($i=1; $i<=$pages; $i++): ?>
                        <li class="page-item <?php if($i == $current_page): echo 'disabled'; endif; ?>">
                          <a class="page-link" href="task?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                        <?php endfor; ?>
                        
                        <?php if($pages != $current_page): ?>
                            <li class="page-item">
                                <a class="page-link" 
                                   href="task?page=<?= $next;?>" 
                                   aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                  <span class="sr-only">Next</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <?php endif; ?>
            <?php else: ?>
                <p class="text-center">Tasks list is empty</p>
            <?php endif; ?>
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
