
$(document).ready(function(){
    $(document).on("submit", "#userCadForm", function(e){
        e.preventDefault();
        let data = $(this).serialize();
        $.post("/db/CadastroUsuario.php", data, function(msg){
            if (msg === "ok") {
                alert("Signed up succesfully!");
            } else {
                alert("Error signing up");
            }
            location.reload();
        });
    });
    $(document).on("submit", "#userLogForm", function(e){
        e.preventDefault();
        let data = $(this).serialize();
        $.post("/db/LoginUsuario.php", data, function(result){
            let msg = responseTreatment(result);
            let status = false;
            for (let i in msg) {
                if(msg[i] == "ok") status = true;
            }
            if(status == true){
                alert("Logged in!"); 
                location.reload(); 
                return false;
            } 
            else alert("Error, try again later");
        });
    });
    $(document).on("submit", "#eventCadForm", function(e){
        e.preventDefault();
        let data = $(this).serialize();
        $.post("../api/index.php", data, function(result){
            if (result === "ok") {
                alert("Evento cadastrado com sucesso!");
            }
        });
        location.reload();
    });
    $(document).on("click", "#loginBtn", function(e){
        e.preventDefault();
        formLogin();
    });
    $(document).on("click", "#signUpBtn", function(e){
        e.preventDefault();
        formCad();
    });
    $(document).on("click", "#getEventsBtn", function(e){
        e.preventDefault();
        // GET todos os eventos;
    })
})

function formLogin(){
    let form = $("<form>");
        form.attr("id", "userLogForm");
    
    let div1 = document.createElement("div");
        div1.className = "field alert";
        div1.innerHTML = '<label class="label" for="username">Username:</label><div class="control"><input type="text" name="username" class="input" placeholder="Jhon Doe" required></div>'
    $(form).append(div1);                        
    let div2 = document.createElement("div");
        div2.className = "field";
        div2.innerHTML = '<label for="password" class="label">Password:</label><div class="control"><input type="password" name="password" class="input" placeholder="********" required></div>'
    $(form).append(div2);                        
    let div4 = document.createElement("div");
        div4.className = "field";
        div4.innerHTML = '<div class="control"><button type="submit" class="button is-primary">Login</button></div>'
    $(form).append(div4);                       
    $("form").replaceWith(form);
}

function formCad(){
    let form = $("<form>");
        form.attr("id", "userCadForm");
    let div1 = document.createElement("div");
        div1.className = "field";
        div1.innerHTML = '<label class="label" for="username">Username:</label><div class="control"><input type="text" name="username" class="input" placeholder="Jhon Doe" required></div>'
    $(form).append(div1);                        
    let div2 = document.createElement("div");
        div2.className = "field";
        div2.innerHTML = '<label for="email" class="label">Email:</label><div class="control"><input type="text" name="email" class="input" placeholder="john.doe@example.com" required></div>'
    $(form).append(div2);                        
    let div3 = document.createElement("div");
        div3.className = "field";
        div3.innerHTML = '<label for="password" class="label">Password:</label><div class="control"><input type="password" name="password" class="input" placeholder="********" required></div>'
    $(form).append(div3);                        
    let div4 = document.createElement("div");
        div4.className = "field is-grouped";
        div4.innerHTML = '<div class="control"><button type="submit" class="button is-primary">Submit</button></div><div class="control"><button type="reset" class="button is-danger">Reset</button></div>'
    $(form).append(div4);                       
    $("form").replaceWith(form);
}

function responseTreatment(response){
    let json = JSON.parse(response);
    return json;
}

