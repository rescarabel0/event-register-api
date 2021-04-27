<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
</head>
<body>
    <header class="hero is-medium-with-navbar is-dark">
            <section>
                <div class="container">
                    <h1 class="title">
                        Event Network
                    </h1>
                    <p class="subtitle">
                        Remember what you have to!
                    </p>
                </div>
            </section>
    </header>
    <nav class="navbar">
            <div class="container">
                <div class="navbar-menu">
                    <div class="navbar-start">
                        <div class="navbar-item">
                            <a class="button is-dark">Início</a>
                        </div>
                    </div>
                    <div class="navbar-end">
                        <div class="navbar-item">
                            <div class="buttons">
                                <?php 
                                    if(isset($_SESSION['autenticado']))
                                    echo "<a id='quitOuBtn' href='db/LogoutUser.php' class='button is-danger'>Log out</a>";
                                    else
                                    echo "<a id='signUpBtn' class='button is-link'>Sign Up</a>
                                    <a id='loginBtn' class='button is-primary'>Log in</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </nav>
    <!--      
    <section class="container">
        <div class="notification is-info">
            <p>REGISTER NEW EVENT</p>
        </div>
    </section> 
     -->
    <section id="target">
        <div class="columns">
            <div class="column"></div>
            <div id="mainColumn" class="column">
                <form method="POST" id="userCadForm">
                    <div class="field">
                        <label for="username" class="label">Username</label>
                        <div class="control">
                            <input class="input" name="username" type="text" placeholder="John Doe" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <div class="control">
                            <input class="input" name="email" type="text" placeholder="john.doe@example.com" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <div class="control">
                            <input class="input" name="password" type="password" placeholder="********" required>
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-primary">Submit</button>
                        </div>
                        <div class="control">
                            <button type="reset" class="button is-danger">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="column"></div>
        </div>
    </section>

</body>
</html>