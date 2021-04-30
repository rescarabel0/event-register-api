<script>
    $(document).ready(function(){
        var addCheck = 0;
        $(document).on("click", "#newEvent", function(e){
            e.preventDefault();
            newEventForm();
        });
        $(document).on("click", "#getEventsBtn", function(e){
            e.preventDefault();
            $.get("../api/index.php", function(data){
                let lado = 0;
                let colunas = document.createElement("section");
                    colunas.className = "columns events";
                let coluna1 = document.createElement("div");
                    coluna1.className = "column is-half";
                    $(coluna1).attr("id", "coluna1");
                
                let coluna2 = document.createElement("div");
                    coluna2.className = "column is-half";
                    $(coluna2).attr("id", "coluna2");
                
                
                data.forEach(event => {

                    let table = document.createElement("table");
                        table.className = "table is-fullwidth is-hoverable is-bordered";
                        $(table).attr("id", "eventoTab");
                    
                    //Cabeça da tabela
                    let thead = document.createElement("thead");

                    let theadTR = document.createElement("tr");
                    let titulo = document.createElement("th");
                        titulo.innerHTML = '<h2><strong>Title</strong></h2>';
                        $(theadTR).append(titulo);
                    let descricao = document.createElement("th");
                        descricao.innerHTML = '<h2><strong>Description</strong></h2>';
                        $(theadTR).append(descricao);
                    let start = document.createElement("th");
                        start.innerHTML = '<h2><strong>Starts at</strong></h2>';
                        $(theadTR).append(start);
                    let end = document.createElement("th");
                        end.innerHTML = '<h2><strong>Ends at</strong></h2>';
                        $(theadTR).append(end);
                    let buttons = document.createElement("th");
                        buttons.innerHTML = '';
                        $(theadTR).append(buttons);
                    $(thead).append(theadTR);
                    $(table).append(thead);

                    //Corpo da tabela
                    let tbody = document.createElement("tbody");

                    let tbodyTR = document.createElement("tr");
                    let eventTitle = document.createElement("th");
                        eventTitle.innerHTML = event['titulo'];
                        $(tbodyTR).append(eventTitle);
                    let eventDescricao = document.createElement("th");
                        eventDescricao.innerHTML = event['descricao'];
                        $(tbodyTR).append(eventDescricao);
                    let eventStart = document.createElement("th");
                        eventStart.innerHTML = event['start'];
                        $(tbodyTR).append(eventStart);
                    let eventEnd = document.createElement("th");
                        eventEnd.innerHTML = event['end'];
                        $(tbodyTR).append(eventEnd);
                    let eventBtn = document.createElement("th");
                        eventBtn.innerHTML = "<button type='button' class='button is-small is-warning editE' id='edit_" + event['id'] + "'><i class='fas fa-edit'></i></button><button class='button is-small is-danger deleteE' id='delete_"+ event['id'] +"'><i class='fas fa-trash-alt'></i></button>";
                        $(tbodyTR).append(eventBtn);
                    $(tbody).append(tbodyTR);
                    $(table).append(tbody);

                    if (lado == 0) {
                        $(coluna1).append(table);
                        lado = 1;
                    } else {
                        $(coluna2).append(table);
                        lado = 0;
                    }
                });
                $(colunas).append(coluna1);
                $(colunas).append(coluna2);
                if (addCheck == 0) {
                    $("body").append(colunas);
                    addCheck++;
                } else {
                    alert("Your events are already being exhibited!");
                }
            })
        })
        $(document).on("click", "button.editE", function(e){
            e.preventDefault();
            let id;
            if($(this).attr("id").length > 5){
                id = $(this).attr("id").substring(5,$(this).attr("id").length);
            } else {
                id = $(this).attr("id").charAt(5);
            }
            
            $.get("../api/index.php", id, function(data){
                let form = $("<form>");
                    form.attr("id", "eventEditForm");
                let div1 = document.createElement("div");
                    div1.className = "field";
                    div1.innerHTML = '<label class="label" for="titulo">Title:</label><div class="control"><input type="text" name="titulo" class="input" value="'+ data[0]['titulo'] +'" required></div>'
                $(form).append(div1);                        
                let div2 = document.createElement("div");
                    div2.className = "field";
                    div2.innerHTML = '<label for="descricao" class="label">Description:</label><div class="control"><input type="textarea" name="descricao" class="textarea" value="'+ data[0]['descricao'] +'" required></div>'
                $(form).append(div2);                        
                let div3 = document.createElement("div");
                    div3.className = "field";
                    div3.innerHTML = '<label for="start" class="label">Starts at:</label><div class="control"><input type="time" name="start" class="input" value="'+ data[0]['start'] +'" pattern="([0-1]{1}[0-9]{1}|20|21|22|23):[0-5]{1}[0-9]{1}" required></div>'
                $(form).append(div3);                        
                let div5 = document.createElement("div");
                    div5.className = "field";
                    div5.innerHTML = '<label for="end" class="label">Ends at:</label><div class="control"><input type="time" name="end" class="input" value="'+ data[0]['end'] +'" pattern="([0-1]{1}[0-9]{1}|20|21|22|23):[0-5]{1}[0-9]{1}"  required></div>'
                $(form).append(div5);
                                
                let div6 = document.createElement("div");
                    $(div6).attr("id", "userId");
                    $(div6).css("display", "none");
                    div6.innerHTML = '<input id="hdUserId" type="text" name="userId" value="' + data[0]['userId'] +'">';
                $(form).append(div6);                        
                let div7 = document.createElement("div");
                    $(div7).attr("id", "eventId");
                    $(div7).css("display", "none");
                    div7.innerHTML = '<input id="hdEventId" type="text" name="id" value="' + data[0]['id'] +'">';
                $(form).append(div7);                        
                let div4 = document.createElement("div");
                    div4.className = "field is-grouped";
                    div4.innerHTML = '<div class="control"><button type="submit" class="button is-primary">Submit</button></div>'
                $(form).append(div4);       
                
                
                $("form").replaceWith(form);
            });
        });
        $(document).on("submit", "#eventEditForm", function(e){
            e.preventDefault();
            let data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../api/index.php",
                data: data
            });
            alert("Editado com sucesso!");
            location.reload();
        });
        $(document).on("click", "button.deleteE", function(e){
            e.preventDefault();
            let id;
            if($(this).attr("id").length > 8){
                id = $(this).attr("id").substring(7,$(this).attr("id").length);
            } else {
                id = $(this).attr("id").charAt(7);
            }
            $.ajax({
                type: "DELETE",
                url: "../api/event",
                data: {'id': id},
            })
            alert("Successfully deleted!");
            location.reload();
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
            div3.innerHTML = '<label for="start" class="label">Starts at:</label><div class="control"><input type="time" name="start" class="input" placeholder="HH:MM:SS" pattern="([0-1]{1}[0-9]{1}|20|21|22|23):[0-5]{1}[0-9]{1}" required></div>'
        $(form).append(div3);                        
        let div5 = document.createElement("div");
            div5.className = "field";
            div5.innerHTML = '<label for="end" class="label">Ends at:</label><div class="control"><input type="time" name="end" class="input" placeholder="HH:MM:SS" pattern="([0-1]{1}[0-9]{1}|20|21|22|23):[0-5]{1}[0-9]{1}"  required></div>'
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