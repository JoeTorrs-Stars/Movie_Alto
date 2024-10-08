<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="front/css/bootstrap.css">
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">Portal</h1>
        <hr>
        <div class="container p-5">
            <div class="row">
                <div class="col-md-6 offset-md-1">
                    <div class="card border-success mb-3" style="max-width: 20rem;">
                        <div class="card-header text-center">User Portal</div>
                        <div class="card-body d-flex justify-content-between">
                            <a class="btn btn-success btn-lg btn-block " type="button" class="btn btn-info " href="back/user/user_data.php">Login</a>
                            <a class="btn btn-warning btn-lg btn-block" type="button" class="btn btn-warning" href="back/user/user_reg.php">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                        <div class="card-header text-center">Admin Portal</div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <a class="btn btn-primary btn-lg btn-block " type="button" href="back/admin/admin_create.php">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-4 mt-3">
                    <div class="card border-warning mb-3" style="max-width: 20rem;">
                        <div class="card-header text-center">Guest</div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <a class="btn btn-info btn-lg btn-block " type="button" a href="index.php">Enter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>