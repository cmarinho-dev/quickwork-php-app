<?php
    include_once('__conexao.php');
    $retorno = [
        'status'    => '',
        'mensagem'  => '',
        'data'      => []
    ];
    // Simulando as informações que vem do front
    $nome           = $_POST['nome']; // $_POST['nome'];
    $especialidade  = $_POST['especialidade'];
    $disponibilidade= $_POST['disponibilidade'];
    
    // Preparando para inserção no banco de dados
    $stmt = $conexao->prepare("
    INSERT INTO prestador(nome, especialidade, disponibilidade) VALUES(?,?,?)");
    $stmt->bind_param("sss",$nome, $especialidade, $disponibilidade);
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