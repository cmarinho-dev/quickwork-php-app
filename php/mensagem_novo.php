<?php
    include_once('__conexao.php');
    $retorno = [
        'status'    => '',
        'mensagem'  => '',
        'data'      => []
    ];
    // Simulando as informações que vem do front
    $remetente           = $_POST['remetente']; // $_POST['remetente'];
    $destinatario  = $_POST['destinatario'];
    $conteudo= $_POST['conteudo'];
    
    // Preparando para inserção no banco de dados
    $stmt = $conexao->prepare("
    INSERT INTO mensagem(remetente, destinatario, conteudo) VALUES(?,?,?)");
    $stmt->bind_param("sss",$remetente, $destinatario, $conteudo);
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