<?php

session_start();

if (!isset($_SESSION['contatos'])) {
    $_SESSION['contatos'] = array();
}

if (isset($_POST['nome'])) {

    if($_POST['nome'] == "" || $_POST['telefone'] == "") {
        $_SESSION['msg'] = '<br>Nome e telefone são obrigatórios<br>';
        header('Location: /estudo-poo-um/');
        exit;
    }

    $contato = new Contato();
    $contato->setNome($_POST['nome']);
    $contato->setTelefone($_POST['telefone']);

    array_push($_SESSION['contatos'], array(
        'nome' => $contato->getNome(),
        'telefone' => $contato->getTelefone()
    ));

    header('Location: /estudo-poo-um/');
}

function listarContatos()
{
    foreach($_SESSION['contatos'] as $key => $value)
    {
        echo "Nome: " . $value['nome'];
        echo "<br>Telefone: " . $value['telefone'];
        echo "<br><br>";
    }
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

if (isset($_GET['comando'])) {
    if ($_GET['comando'] == 'limparLista') {
        $_SESSION['contatos'] = array();
    }

    header('Location: /estudo-poo-um/');
}

