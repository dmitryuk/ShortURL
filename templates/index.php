<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сервис коротких ссылок</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="styles.css" >
    <script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="functions.js"></script>



</head>
<body>
    <div class="container">
        <h1 align="center">Сервис коротких ссылок</h1>
        <div class="vertical-center">

                <form method="post" class="form-inline">
                    <div class="form-group">
                        <label for="url">URL: </label>
                        <input type="text" class="form-control" id="url" placeholder="http://yandex.ru">
                        <span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate" style="display: none"></span>
                    </div>
                    <button type="submit" class="btn btn-default">Укоротить</button>

                </form>

            <div class="result_div" ><label for="result">Ваша короткая ссылка:</label><input type="text" class="form-control" id="result"></div>
        </div>

    </div>
</body>
</html>