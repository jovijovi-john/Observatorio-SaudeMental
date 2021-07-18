<?php
if (!isset($_POST['nome']) or !isset($_POST['email']) or !isset($_POST['mensagem'])) {
	echo "Pacote não Permite";
}else{
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['phone'];
	$mensagem = $_POST['mensagem'];

	$arquivo ="Nome: $nome;Email: $email; Telefone: $telefone; Mensagem= $mensagem";
	//Email para quem será enviado
	$emailEnviar = "matheus.levy@discente.ufma.br"; // Email que vai receber os dados
	$destino = $emailEnviar;
	$assunto = 'Contato pelo Site';
	//Header
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: $nome <$email>';

	$enviaremail = mail($destino, $assunto, $arquivo, $headers);
	if($enviaremail){
		$mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecedio";
	}else{
		$mgm = "ERRO AO ENVIAR EMAIL!";
		echo "";
	}
}

?>