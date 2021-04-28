<script>
    $(document).ready(function(){
        $(document).on("click", "#newEvent", function(e){
            e.preventDefault();
            newEventForm();
        })
    })
    function newEventForm(){
        let form = $("<form>");
            form.attr("id", "eventCadForm");
        let div1 = document.createElement("div");
            div1.className = "field";
            div1.innerHTML = '<label class="label" for="titulo">Title:</label><div class="control"><input type="text" name="titulo" class="input" placeholder="Wedding" required></div>'
        $(form).append(div1);                        
        let div2 = document.createElement("div");
            div2.className = "field";
            div2.innerHTML = '<label for="descricao" class="label">Description:</label><div class="control"><input type="textarea" name="descricao" class="textarea" placeholder="Nice wedding by the beach shore" required></div>'
        $(form).append(div2);                        
        let div3 = document.createElement("div");
            div3.className = "field";
            div3.innerHTML = '<label for="start" class="label">Starts at:</label><div class="control"><input type="text" name="start" class="input" placeholder="HH:MM:SS" required></div>'
        $(form).append(div3);                        
        let div5 = document.createElement("div");
            div5.className = "field";
            div5.innerHTML = '<label for="end" class="label">Ends at:</label><div class="control"><input type="text" name="end" class="input" placeholder="HH:MM:SS" required></div>'
        $(form).append(div5);
        <?php $idUsuario = $_SESSION['usuario_id']; ?>                
        let div6 = document.createElement("div");
            $(div6).attr("id", "userId");
            $(div6).css("display", "none");
            div6.innerHTML = '<input id="hdUserId" type="text" name="userId" value="' + <?php echo $idUsuario; ?> +'">';
        $(form).append(div6);                        
        let div4 = document.createElement("div");
            div4.className = "field is-grouped";
            div4.innerHTML = '<div class="control"><button type="submit" class="button is-primary">Submit</button></div><div class="control"><button type="reset" class="button is-danger">Reset</button></div>'
        $(form).append(div4);       
        
        
        $("form").replaceWith(form);
    }
    
</script>