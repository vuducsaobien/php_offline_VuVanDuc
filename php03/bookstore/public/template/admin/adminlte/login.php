<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $this->_metaHTTP; ?>
    <?php echo $this->_metaName; ?>
    <title><?php echo $this->_title; ?></title>
    <?php echo $this->_cssFiles; ?>
</head>

<body class="login-page">
    <?php
        require_once MODULE_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
    ?>
</body>

</html>