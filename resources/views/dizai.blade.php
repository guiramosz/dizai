<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .cabecalho{
            height: 110px;
            border-bottom: 1px solid #ccc;
            box-shadow: 0 0 10px #bbb;
        }
        .conteudo{
            margin-top: 120px;
        }
        .avatar{
            font-size: 70px;
        }
        .botao-flutuante{
            display: block;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 50%;
            box-shadow: 5px 5px 5px #aaa;
            color: #fff;
            font-size: 30px;
        }
    </style>

    <title>DIZ AÍ!!</title>
  </head>
  <body>
    <div class="cabecalho p-3 bg-white fixed-top">
        <h1 class="text-center text-warning m-0">
            DIZ AÍ
        </h1>
        <p class="m-0 text-center text-secondary">
            Fale o que der na telha mas seja educado.
        </p>
    </div>

    <!-- conteúdo -->
    <div class="container conteudo">
        <div class="col-md-8 offset-md-2">

            <!-- Comportamento padrão: mostra os dados de $comentarios em vários CARDS 
            Se não tiver nenhum registro, mostra apenas uma MSG ao usuário -->
            @if(count($comentarios) === 0)  
                <p class="mt-5 text-center">
                    Não há comentários, ninguém digitou :-(
                </p>
            @else 
                @foreach($comentarios as $comentario)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-2 text-center">
                                <span class="avatar text-warning">
                                    <i class="{{$comentario->espirito}}"></i>
                                </span>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$comentario->codinome}}</h5>
                                    <p class="card-text">{{$comentario->comentario}}</p>
                                    <p class="card-text"><small class="text-muted">Publicado em {{Carbon\Carbon::parse($comentario->created_at)->format('d/m/Y H:i:s') }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            @endif
            


        </div>
    </div>

    <!-- Botão que abre o formulário -->
    <button type="button" class="botao-flutuante bg-warning" 
    data-bs-toggle="modal" data-bs-target="#modalFormulario">+</button>

    <!-- Modal -->
    <div class="modal fade" id="modalFormulario" tabindex="-1" 
    aria-labelledby="modalFormularioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormularioLabel">DIZ AÍ!!!</h5>
                    <button type="button" class="btn-close" 
                    data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('novocomentario') }}" method="post">
                        @csrf
                        <input class="form-control" type="text" placeholder="Codinome" name="codinome" required>
                        <br>
                        <p>Seu estado de espírito</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="espirito" value="far fa-grin-tongue" required>
                            <label class="form-check-label"><i class="far fa-grin-tongue fa-2x"></i></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="espirito" value="far fa-grin-beam" required>
                            <label class="form-check-label"><i class="far fa-grin-beam fa-2x"></i></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="espirito" value="far fa-sad-tear" required>
                            <label class="form-check-label"><i class="far fa-sad-tear fa-2x"></i></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="espirito" value="far fa-surprise" required>
                            <label class="form-check-label"><i class="far fa-surprise fa-2x"></i></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="espirito" value="far fa-angry" required>
                            <label class="form-check-label"><i class="far fa-angry fa-2x"></i></label>
                        </div>
                        
                        <br><br>
                        <label for="comentario" class="form-label">Diz Aí!!</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
                        
                        <br>
                        <button type="submit" class="btn btn-primary mb-3">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
 
    </body>
</html>