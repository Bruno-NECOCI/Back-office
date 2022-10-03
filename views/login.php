<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Tailwind -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./style/css/style.css">

    <title>Login dashboard</title>
</head>
<body>

<h3 class="h3 text-xl my-20">Bienvenue !</h3>

<form action="connexion" class="form mx-auto my-auto" id="admin" method="POST">
    <input type="text" name="login" placeholder="Nom d'utilisateur" class="form-input">
    <input type="password" name="mdp" placeholder="Mot de passe" class="form-input">
    <div class=" flex text-white ">
        <input type="checkbox" name="remember" class="mr-5"> 
        <p>Se souvenir de moi </p>
    </div>
    <button type="submit" class="btn-form">connexion</button>
</form>


</body>
</html>