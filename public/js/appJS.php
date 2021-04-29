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
                    colunas.className = "columns";
                let coluna1 = document.createElement("div");
                    coluna1.className = "column is-half";
                    $(coluna1).attr("id", "coluna1");
                
                let coluna2 = document.createElement("div");
                    coluna2.className = "column is-half";
                    $(coluna2).attr("id", "coluna2");
                
                
                data.forEach(event => {
                    let table = document.createElement("table");
                        table.className = "table is-striped is-fullwidth is-hoverable";
                    
                    //Cabeça da tabela
                    let thead = document.createElement("thead");

                    let theadTR = document.createElement("tr");
                    let titulo = document.createElement("th");
                        titulo.innerHTML = 'Title';
                        $(theadTR).append(titulo);
                    let descricao = document.createElement("th");
                        descricao.innerHTML = 'Description';
                        $(theadTR).append(descricao);
                    let start = document.createElement("th");
                        start.innerHTML = 'Starts at';
                        $(theadTR).append(start);
                    let end = document.createElement("th");
                        end.innerHTML = 'Ends at';
                        $(theadTR).append(end);
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