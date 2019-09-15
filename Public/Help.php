<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="Images/Icono.ico">
    <title>Project User</title>
</head>

<body>
    <header>
        <center>
        <nav class="navegacion">
            <ul class="Menu">
                <li><a href="Index.php">Inicio</a></li>
                <li><a href="Ingreso.php">Acceso</a></li>
            </ul>
        </nav>
    </center>
    </header>
    <section>
        <center>
<form action="/my-handling-form-page" method="post">
    <div >
        <label for="name">Name:</label><input type="text" id="name"/>
    </div><br>
    <div>
        <label for="mail">E-mail:</label><input type="email" id="mail" />
    </div><br>
    <div>
        <label for="msg">Message:</label><textarea id="msg"></textarea>
    </div><br>
    <div>
        <a href=""><button type="submit" class="btn btn-submit" style='width:100px; height:50px'>Send your message</button></a>
    </div>
</form>
</center>
</section>
</body>

</html>