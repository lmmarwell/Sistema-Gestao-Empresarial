<html>
<head>
    <title>Painel - <?php echo $viewData['company_name']; ?></title>
</head>
<body>

<div class="container">
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
</div>
</body>
</html>