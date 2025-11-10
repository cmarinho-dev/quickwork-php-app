<?php
    include_once('__conexao.php');
    $retorno = [
        'status'    => '',
        'mensagem'  => '',
        'data'      => []
    ];
    // Simulando as informações que vem do front
    $nome           = $_POST['nome']; // $_POST['nome'];
    $descricao  = $_POST['descricao'];
    $preco= $_POST['preco'];
    
    // Preparando para inserção no banco de dados
    $stmt = $conexao->prepare("
    INSERT INTO servico(nome, descricao, preco) VALUES(?,?,?)");
    $stmt->bind_param("sss",$nome, $descricao, $preco);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        $retorno = [
            'status' => 'ok',
            'mensagem' => 'registro inserido com sucesso',
            'data' => []
        ];
    }else{
        $retorno = [
            'status' => 'nok',
            'mensagem' => 'falha ao inserir o registro',
            'data' => []
        ];
    }

    $stmt->close();
    $conexao->close();

    header("Content-type:application/json;charset:utf-8");
    echo json_encode($retorno);