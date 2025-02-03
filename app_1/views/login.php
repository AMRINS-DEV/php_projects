<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./images/logoshape.svg" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- css -->
    <?php
    Assets::css(['style']);
    ?>
</head>

<body>
    <section class="container">
        <div class="form_wrp">
            <div id="form">
                <div>
                    <div class="logo">
                        <img src="./images/logoshape.svg" alt="">
                    </div>
                </div>
                <div>

                    <label for="">Email</label>
                    <input  type="email" placeholder="jhon-due@email.com" name="user_email">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" placeholder="******" name="user_password">
                </div>
                <div>
                    <button id="submitLogin" name="submitLogin">Submit</button>
                </div>
            </div>
        </div>
    </section>


    <!-- js -->
    <?php
    Assets::js(['main']);
    ?>
</body>

</html>