
<!DOCTYPE html>
<html lang="en">
<head>
    <title>form for creation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../res/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../res/demo.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <style>
        form {
            padding: 40px 40px 30px !important;
            background: #ebeff2;
        }
        .mt32 {
            margin-top: 32px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <form class="mt32" action="{{route('student_store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" id="name" placeholder="First name" name="name">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" placeholder="Last name" name="lastname">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Your email" name="email">
            </div>
            <div class="form-group">
                <label for="password" >Password</label>
                <input type="password" class="form-control" id="password" placeholder="Your password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
    </div>
</body>
</html>
