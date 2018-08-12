<html>
<head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/login.css">
</head>
<body>
<div class="loginarea">
    <form method="post">
        <input type="email" name="email" placeholder="Digite seu E-Mail"> <br>
        <input type="password" name="password" placeholder="Digite sua senha"> <br>
        <input type="submit" value="Entrar"> <br>

        <?php if (isset($error) && !empty($error)): ?>
            <div class="warning"><?php echo $error; ?></div>
        <?php endif; ?>
    </form>
</div>
</body>
</html>