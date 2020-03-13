

<!doctype html>
<html lang='pt-BR'>
  <head>
    <title>Kanban</title>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='../_fontawesome/css/all.css'>
    <link rel='stylesheet' href='css/styles.css'>
</head>
  <body>
    <div class='container' id="div-principal"> 
        <div class='row pt-3 quadro'>
            
            <div class='col-md-4 list to-do rounded'>
                <div class='bg-light text-dark border-secondary p-2 rounded font-weight-bold'> A fazer</div>
                
                <ul class='border border-secondary list-group droptarget' id="to-do">
                <!--lista pendentes js-->
                </ul>

                <button class="badge bg-light w-100 p-1" id="btn-create-in-todo"><i class="fas fa-plus"></i>Adicionar outro cartão (Alt+F1)</button>
                <textarea class="create-task w-100 hide" dir="auto" placeholder="Insira um título para este cartão..." spellcheck="false" data-gramm="false" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 54px;" id="create-in-todo"></textarea>

            </div>

            <div class='col-md-4 list in-progress'>
                <div class='bg-light text-dark border-secondary p-2 rounded font-weight-bold droptarget'> Fazendo</div>
                
                <ul class='border border-secondary list-group droptarget' id="doing">
                <!--lista em andamento js-->
                </ul>

                <button class="badge bg-light w-100 p-1" id="btn-create-in-doing"><i class="fas fa-plus"></i>Adicionar outro cartão (Alt+F2)</button>
                <textarea class="create-task w-100 hide" dir="auto" placeholder="Insira um título para este cartão..." spellcheck="false" data-gramm="false" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 54px;" id="create-in-doing"></textarea>

            </div>

            <div class='col-md-4  list done'>
                <div class='bg-light text-dark border-secondary p-2 rounded font-weight-bold droptarget'> Feito</div>
               
                <ul class='border border-secondary list-group droptarget' id="done">
                <!--lista concluido js-->
                </ul>
                
                <button class="badge bg-light w-100 p-1" id="btn-create-in-done"><i class="fas fa-plus"></i>Adicionar outro cartão (Alt+F3)</button>
                <textarea class="create-task w-100 hide" dir="auto" placeholder="Insira um título para este cartão..." spellcheck="false" data-gramm="false" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 54px;" id="create-in-done"></textarea>

            </div>
        </div>
    </div>



    <!-- Botão para acionar modal -->
<button type="button" hidden id="btn-modal-all-data" data-toggle="modal" data-target="#modal"></button>

<!-- Modal -->
<div class="modal fade " id="modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg bg-light" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Título do modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="container">
        <div class="row">
          <div class="col-md-8 border p-2">
            
            <span class="badge" id="create-date">Criado em: 01/01/1970</span>
            <span class="badge" id="create-date">Por Administrador:</span>

            <hr>

            <span>Descrição :</span>
            <textarea class="create-task w-100 rounded" dir="auto" placeholder="Adicione uma descrição mais detalhada..." spellcheck="false" data-gramm="false" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 54px; background-color:rgb(220,220,220); color:rgb(60,60,60)" id="create-in-todo"></textarea>
            
            <hr>

            <span>Atividade :</span>
            <textarea class="create-task w-100 rounded" dir="auto" placeholder="Escreve um comentário..." spellcheck="false" data-gramm="false" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 54px; background-color:rgb(220,220,220); color:rgb(60,60,60)" id="create-in-todo"></textarea>

          </div> 
          <div class="col-md-4 border p-2">

              <div>
                <span id="responsavel">Responsável</span>
                  <select class="form-control form-control-sm">
                      <option>Usuario1</option>
                      <option>Usuario2</option>
                      <option>Usuario3</option>
                  </select>
              </div>

              <div>
                  <span>Vencimento</span>
                  <input type="date" class="form-control form-control-sm">
              </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


    <script src='js/js.js'></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
