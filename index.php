<?php require_once './config.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yoomoney Access</title>
    <style>
        body {
            background-color: #222;
            display: flex;
            justify-content: center;
            align-items: center;

            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
<div>
    <form action="http://yoomoney.ru/oauth/authorize" method="POST">
        <input name="client_id" readonly placeholder="ClientId"
               value="<?php echo $GLOBALS['ClientId']; ?>" style="width: 100%; margin-bottom: 5px">
        <input name="redirect_uri" readonly placeholder="Redirect URI"
               value="<?php echo 'http://' . $_SERVER['SERVER_NAME']; ?>/code.php" style="width: 100%; margin-bottom: 5px">
        <input name="response_type" type="hidden" value="code">
        <input name="scope" type="hidden" value='<?php echo $GLOBALS['Scope']; ?>'>
        <button type="submit">Go</button>
    </form>
</div>
</body>
</html>