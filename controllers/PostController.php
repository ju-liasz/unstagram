<?php 
include_once "models/Post "

class PostController {
    public function acao ($rotas){
        switch ($rotas){
            case "posts": 
            include "views/posts.php";
            break; 
            case "formulario-post": 
                $this -> viewFormularioPost();
                break;

                case "cadastrar-post"; 
                    $this -> cadastroPost();
                break;
        }
    }

    private function viewFormularioPost(){
        include "views/newPost.php";
        
    }

    private function cadastroPost (){
        $descricao = $_POST ['descricao']; 
        $nomeArquivo = $_FILES ['img']['name'];
        $linkTemp = $_FILES ['img']['tmp_name']; 
        $caminhoSalvar = "views/img/$nomeArquivo"; 

        move_uploaded_file($linkTemp, $caminhoSalvar)

        $post = new Post (); 
        $resultado = $post -> criarPost ($caminhoSalvar, $descricao); 

        if ($resultado){
            header ('Location:/unstagram/posts'); 
        }
    }
}