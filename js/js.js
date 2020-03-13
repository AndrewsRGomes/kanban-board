var contador = 0;

//selected element
document.addEventListener("dragstart", function(event) {
    //console.log(event.target.id);
    event.dataTransfer.setData("Text", event.target.id);
});
  

//moving the element
document.addEventListener("drag", function(event) {
    document.addEventListener("")

});
  
//mouse over the element
    document.addEventListener("dragover", function(event) {
    event.preventDefault();
    
    card_over = `<div class="text-right p-5 m-5">
                    <span class="badge bg-secondary text-light"><i class="fas fa-edit btn-edit" id="edit1"></i></span>
                    <span class="badge bg-danger text-light"><i class="fas fa-trash btn-delete" id="del1"></i></span>
                    <span class="badge bg-light border border-secondary text-dark btn-all-data" id="modal1">...</span>


                    oioioioi
                </div>`;
			

    if(event.target.tagName == "LI"){
          event.target.classList.add("overlaid-element");
    } else {
          removeCSSLI();
    }

  });
  
  function removeCSSLI(){
    document.querySelectorAll(".list-group-item").forEach(function(li){
      li.classList.remove("overlaid-element");

    });
  }


//LOCAL ONDE SOLTOU O ELEMENTO
document.addEventListener("drop", function(event) {
    event.preventDefault();
    
    if ( event.target.classList.contains("droptarget") == true ) {

      var data = event.dataTransfer.getData("Text");
      event.target.appendChild(document.getElementById(data));

    }
  });



document.addEventListener("click", function(event) {
  
  if ( event.target.id == "btn-create-in-todo") {
      let insertField = document.querySelector("#create-in-todo");
      insertField.classList.add("show");
      insertField.classList.remove("hide");

      document.querySelector("#btn-create-in-todo").classList.add("hide");
      
  } 
  
  if ( event.target.id == "btn-create-in-doing") {
      let insertField = document.querySelector("#create-in-doing");
      insertField.classList.add("show");
      insertField.classList.remove("hide");
      
      document.querySelector("#btn-create-in-doing").classList.add("hide");
  }
  
  if ( event.target.id == "btn-create-in-done") {
      let insertField = document.querySelector("#create-in-done");
      insertField.classList.add("show");
      insertField.classList.remove("hide");
      
      document.querySelector("#btn-create-in-done").classList.add("hide");
  }

});


//ADICIONANDO UMA NOVA LINHA NA TAREFA
function addTask(data,taskColumn){
   contador++;

   //TODO ALTERAR ESTE CONTADOR PELO REGISTRO UNICO DO BANCO
    var linha = `<li class='m-2 list-group-item card' draggable='true' id="item${contador}">
                      <div class='text-right'>
                          <span class='badge bg-secondary text-light'><i class='fas fa-edit btn-edit' id="edit${contador}"></i></span>
                          <span class='badge bg-danger text-light'><i class='fas fa-trash btn-delete' id="del${contador}"></i></span>
                          <span class='badge bg-light border border-secondary text-dark btn-all-data' id="modal${contador}">...</span>
                      </div>
                      <span class="data-card" id='txt-descr${contador}'>${data}</span>
                    </li>
                    `;

    if(taskColumn == "create-in-todo"){
      document.getElementById("to-do").innerHTML += linha;
      
      let todo = document.getElementById("btn-create-in-todo");
          todo.classList.remove("hide");
          todo.classList.add("show");

      let todo_textarea = document.getElementById("create-in-todo");
          todo_textarea.classList.remove("show");
          todo_textarea.classList.add("hide");
      
    } else if (taskColumn == "create-in-doing") {
      document.getElementById("doing").innerHTML += linha;

      let doing = document.getElementById("btn-create-in-doing");
          doing.classList.remove("hide");
          doing.classList.add("show");

      let doing_textarea = document.getElementById("create-in-doing");
          doing_textarea.classList.remove("show");
          doing_textarea.classList.add("hide");
   
    } else if (taskColumn == "create-in-done") {
      document.getElementById("done").innerHTML += linha;

      let done = document.getElementById("btn-create-in-done");
          done.classList.remove("hide");
          done.classList.add("show");

      let done_textarea = document.getElementById("create-in-done");
          done_textarea.classList.remove("show");
          done_textarea.classList.add("hide");

    } else {
    alert("Erro: Não foi encontrato a coluna destino da tarefa, entre em contato com o suporte");
    throw new error ("Erro: Não foi encontrato a coluna destino da tarefa");
    }

}



// CRIA UMA NOVA ATIVIDADE AO APERTAR ENTER
document.querySelectorAll(".create-task").forEach(function(element){
  element.addEventListener('keypress', function(e){
    if(e.which == 13){
         
          if (element.value === ''){
           return alert("Nenhum texto informado");
          }
      
          //pegando os campos para enviar para o JSON
          var data = element.value;
          var columId = element.id;
          element.value = "";
          addTask(data, columId);
          
          //BOTAO ADICIONAR OUTRO CARTAO
    }
    
  }, false);
});


//Atalhos para abrir o campo de preencher uma nova atividade
window.addEventListener('keydown',(e) => {
  if(e.altKey == true && e.key == 'F1') {
      let todo = document.getElementById("btn-create-in-todo");
          todo.classList.remove("show");
          todo.classList.add("hide");

      let todo_textarea = document.getElementById("create-in-todo");
          todo_textarea.classList.remove("hide");
          todo_textarea.classList.add("show");
          todo_textarea.focus();


  } else if(e.altKey == true && e.key == 'F2') {
    
      let doing = document.getElementById("btn-create-in-doing");
            doing.classList.remove("show");
            doing.classList.add("hide");
            

      let doing_textarea = document.getElementById("create-in-doing");
            doing_textarea.classList.remove("hide");
            doing_textarea.classList.add("show");
            doing_textarea.focus();

  } else if(e.altKey == true && e.key == 'F3') {
      let done = document.getElementById("btn-create-in-done");
            done.classList.remove("show");
            done.classList.add("hide");

      let done_textarea = document.getElementById("create-in-done");
            done_textarea.classList.remove("hide");
            done_textarea.classList.add("show");
            done_textarea.focus();
  }
}); 

function getLi($only_id)
{
    $id = returnOnlyNumbers($only_id);
    let li = document.getElementById("item"+$id)
    return li
}

function editLi($p_id){

    let id = returnOnlyNumbers($p_id);
    let card_text = document.getElementById("txt-descr"+id);
    let id_text_editing = "textedit"+id;
   
    //check if user already clicked in edit
    if(card_text.classList.contains("editing") == true){

        //delete element if already open
        let in_edit = document.querySelector("."+id_text_editing);
        console.log(in_edit);
        in_edit.remove();
        card_text.classList.remove("editing");

    } else {
        
        //create a new element to new edit
        
        field_new_text = `<textarea class="create-task w-100 rounded ${id_text_editing}" dir="auto" placeholder="Insira um título para este cartão..." spellcheck="false" data-gramm="false" style="overflow: hidden; overflow-wrap: break-word; resize: none; background-color:rgb(220,220,220); color:rgb(60,60,60)" id="create-in-todo">${card_text.textContent}</textarea>`;
        card_text.textContent = "";
        
        card_text.innerHTML += field_new_text;
      

        card_text.classList.add("editing");
                
        //Monitoring the element too save the new text
        document.querySelector("."+id_text_editing).addEventListener('keypress', function(e){
            if(e.which == 13){

              let text_editing = document.querySelector("."+id_text_editing);
              
              //if the edit field is not filled in and open enter, remove the input field
              if (text_editing.value === ''){
                  text_editing.remove(); 
                  card_text.classList.remove("editing");
               } else {
                  //save the new text
                  card_text.textContent = text_editing.value;
                  document.getElementById("txt-descr"+id).classList.remove("editing");
              }
            }
          });
                 
    }
}

/**********************REMOVER O LI ************************/
function removeLi($p_id)
{   
    let li = getLi($p_id);
    li.remove();
}

function returnOnlyNumbers(string) 
{
    var numsStr = string.replace(/[^0-9]/g,'');
    return parseInt(numsStr);
}

document.addEventListener("click", function(event)
{
    //DELETAR
    if (event.target.classList.contains("btn-delete") == true){

      var r = confirm("Tem certeza que deseja remover esta atividade ?");
      
      if (r == true) {
        removeLi(event.target.id);
      } else {
        return 
      }
  
    //EDITAR
    } else if (event.target.classList.contains("btn-edit") == true){
        editLi(event.target.id);

    } else if (event.target.classList.contains("btn-all-data") == true){
      showModalDataCard(event.target.id);
  }
});
/*********************************************************/

function showModalDataCard($p_id){

  let id = returnOnlyNumbers($p_id);
  let card_text = document.getElementById("txt-descr"+id);
  let modal_body = document.querySelector(".modal-title");

  document.getElementById("btn-modal-all-data").click();

 
  modal_body.textContent = card_text.innerHTML;


}