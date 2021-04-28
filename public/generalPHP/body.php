<?php 
    if(isset($_SESSION['autenticado']))
    echo "
    <section id='target'>
        <div class='columns'>
            <div class='column'></div>
                <div id='mainColumn' class='column'>
                    <section class='container'>
                            <div id='newEvent' class='notification is-info'>
                                <p>REGISTER NEW EVENT</p>
                            </div>
                    </section>
                    <form></form>
                </div>
            <div class='column'></div>
        </div>
    </section>";
    else
    echo "<section id='target'>
            <div class='columns'>
                <div class='column'></div>
                <div id='mainColumn' class='column'>
                    <form method='POST' id='userCadForm'>
                        <div class='field'>
                            <label for='username' class='label'>Username</label>
                            <div class='control'>
                                <input class='input' name='username' type='text' placeholder='John Doe' required>
                            </div>
                        </div>
                        <div class='field'>
                            <label for='email' class='label'>Email</label>
                            <div class='control'>
                                <input class='input' name='email' type='text' placeholder='john.doe@example.com' required>
                            </div>
                        </div>
                        <div class='field'>
                            <label for='password' class='label'>Password</label>
                            <div class='control'>
                                <input class='input' name='password' type='password' placeholder='********' required>
                            </div>
                        </div>
                        <div class='field is-grouped'>
                            <div class='control'>
                                <button type='submit' class='button is-primary'>Submit</button>
                            </div>
                            <div class='control'>
                                <button type='reset' class='button is-danger'>Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class='column'></div>
            </div>
        </section>";
?>