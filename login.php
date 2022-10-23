<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ac024fea7b.js" crossorigin="anonymous"></script> 
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="proses-login.php" method="post" class="sign-in-form">
                    <div class="title-login">
                        <h2>SISTEM KEUANGAN BUMDES MAJU MAKMUR</h2>
                        <h2>DESA MINGGIRSARI</h2>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" name="email" placeholder="Masukan Email">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="pass" placeholder="Masukan Password">
                    </div>
                    <input type="submit" name="submit" value="Masuk" class="btn solid"> 
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <img src="img/data.svg" class="image" alt="">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Lupa password?</h3>
                    <button class="btn transparent" id="sign-in-btn">sign in</button>
                </div>
            </div>
        </div>
    </div>
    <script> src="app.js"</script>
</body>
</html>