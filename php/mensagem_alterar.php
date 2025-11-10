<?php
    include_once('__conexao.php');

    $retorno = [
        'status'    => '',
        'mensagem'  => '',
        'data'      => []
    ];

    if(isset($_GET['id'])){
        // Simulando as informações que vem do front
        $remetente       = $_POST['remetente']; // $_POST['remetente'];
        $destinatario      = $_POST['destinatario'];
        $conteudo    = $_POST['conteudo'];
    
        // Preparando para inserção no banco de dados
        $stmt = $conexao->prepare("UPDATE mensagem SET remetente = ?, destinatario = ?, conteudo = ? WHERE id = ?");
        $stmt->bind_param("sssi",$remetente, $destinatario, $conteudo, $_GET['id']);
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