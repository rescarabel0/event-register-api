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
                    <a class="button is-dark" onClick="location.reload()">Início</a>
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