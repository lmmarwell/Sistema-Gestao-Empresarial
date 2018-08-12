<html>
<head>
    <title>Painel - <?php echo $viewData['company_name']; ?></title>
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/template.css">
</head>
<body>
<div class="leftmenu">
    <div class="company_name">
        <?php echo $viewData['company_name'] ;?>
    </div>
</div>
<div class="container">
    <div class="top">
        <div class="top_right">
            <a href="<?php echo BASE;?>login/logout">Sair</a>
        </div>
        <div class="top_right">
            <?php echo $viewData['user_email']; ?>
        </div>
    </div>
</div>


</body>
</html>