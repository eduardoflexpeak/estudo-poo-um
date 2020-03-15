<form method="post">
    <input type="text" name="nome">
    <input type="text" name="telefone">
    <button type="submit">Salvar</button>
</form>

<br>

<a href="?comando=limparLista">Limpar Lista</a>

<br>

<?php
    require 'Contato.php';
    require 'Funcoes.php';

    listarContatos();