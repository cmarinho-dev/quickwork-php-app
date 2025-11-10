<?php
    include_once('__conexao.php');

    $retorno = [
        'status'    => '',
        'mensagem'  => '',
        'data'      => []
    ];

    if(isset($_GET['id'])){
        // Simulando as informações que vem do front
        $items       = $_POST['items']; // $_POST['items'];
        $status      = $_POST['status'];
        $valor    = $_POST['valor'];
        $data    = $_POST['data'];
    
        // Preparando para inserção no banco de dados
        $stmt = $conexao->prepare("UPDATE pedido SET items = ?, status = ?, valor = ?, datapedido = ? WHERE id = ?");
        $stmt->bind_param("ssssi",$items, $status, $valor, $data, $_GET['id']);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            $retorno = [
                'status'    => 'ok',
                'mensagem'  => 'Registro alterado com sucesso.',
                'data'      => []
            ];
        }else{
            $retorno = [
                'status'    => 'nok',
                'mensagem'  => 'Não posso alterar um registro.'.json_encode($_GET),
                'data'      => []
            ];
        }
        $stmt->close();
    }else{
        $retorno = [
            'status'    => 'nok',
            'mensagem'  => 'Não posso alterar um registro sem um ID informado.',
            'data'      => []
        ];
    }
       
    $conexao->close();

    header("Content-type:application/json;charset:utf-8");
    echo json_encode($retorno);