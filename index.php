<?php include('functions.php'); ?>
<?php //include('log.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Time.Tracker Application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
       
    </style>
</head>
<body>

<div class="container-fluid">
    <header class="row">
        <div class="col-xs-6">
            <a href="#">Enter Restore Mode</a>
        </div>
        <div class="col-xs-6 text-right">
            Total Time: <span id="tally"></span>
        </div>
    </header>
    <div class="row">
        <form id="form-new">
            <div class="col-xs-10">
                <input id="name" name="name" class="form-control" placeholder="Enter New Task Name...">
            </div>
            <div class="col-xs-2">
                <button type="submit" class="btn btn-block btn-success"><?= i('play') ?></button>
            </div>
        </form>
    </div>
    <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Task</th>
            <th>Start</th>
            <th>End</th>
            <th>Time</th>
            <th colspan="2">Controls</th>
        </tr>
        </thead>
        <tbody id="log"></tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/time.tracker.js"></script>
</body>
</html>