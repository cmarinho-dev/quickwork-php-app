<?php
    include_once('__conexao.php');
    $retorno = [
        'status'    => '',
        'mensagem'  => '',
        'data'      => []
    ];
    // Simulando as informações que vem do front
    $items           = $_POST['items']; // $_POST['items'];
    $status  = $_POST['status'];
    $valor= $_POST['valor'];
    $data= $_POST['data'];
    
    // Preparando para inserção no banco de dados
    $stmt = $conexao->prepare("
    INSERT INTO pedido(items, status, valor, datapedido) VALUES(?,?,?,?)");
    $stmt->bind_param("ssss",$items, $status, $valor, $data);
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