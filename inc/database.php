<?php
	//  Pesquisa registros pelo parametro $p que foi passado
	
	   function filter($table = null, $p = null) {
		   $database = open_database();
		   $found = null;
		   
		   try {
			   if ($p) {
				   $sql = "SELECT * FROM " . $table . " WHERE " . $p;
				   $result = $database->query($sql);
				   
				   if ($result->num_rows > 0) {
					   $found = array();
					   while ($row = $result->fetch_assoc()) {
						   array_push($found, $row);
					   }
				   } else {
					   throw new Exception("Não foram encontrados registros de dados!");
				   }
			   }
		   } catch (Exception $e) {
			   $_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage();
			   $_SESSION['type'] = "danger";
		   }
		   
		   close_database($database);
		   return $found;
	   }
   
   
   
			   
		/**
	 *  Pesquisa um Registro pelo ID em uma Tabela
	 */
	function find( $table = null, $id = null ) {
	
		$database = open_database();
		$found = null;
		

		try {
		if ($id) {
			$sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
			$result = $database->query($sql);
			
			if ($result->num_rows > 0) {
			$found = $result->fetch_assoc();
			}
			
		} else {
			
			$sql = "SELECT * FROM " . $table;
			$result = $database->query($sql);
			
			if ($result->num_rows > 0) {
			$found = $result->fetch_all(MYSQLI_ASSOC);
			
			/* Metodo alternativo
			$found	 = array();
			while ($row = $result->fetch_assoc()) {
			array_push($found, $row);
			} */
			}
		}
		} catch (Exception $e) {
		$_SESSION['message'] = $e->GetMessage();
		$_SESSION['type'] = 'danger';
	}
		
		close_database($database);
		return $found;
	}

	// // Criptografia
	function criptografia($senha){

	
		/*
			==> Criptografia Blowfish
			http://www.linhadecodigo.com.br/artigo/3532/criptografando-senhas-usando-bcrypt-blowfish-no-php.aspx
		*/
		// Aplicando criptografia na senha
		$custo = "08";
		$salt = "CflfllePArK1BJomMOF6aJ";

		//gera um hash baseado em bcrypt
		$hash = crypt($senha, "$2a$" . $custo . "$" . $salt ."$");

		return $hash; // Retonar a senha criptgrafada
	}

	// Funcao para limpar mensagens

	function clear_messages(){
		$_SESSION['message'] = null;
		$_SESSION['type'] = null;
	}
	

	// Funções para formatar os valores de data e outros campos
	function formatadata($data, $formato) {
        $dt = new DateTime($data, new DateTimeZone("America/Sao_Paulo"));
        return $dt->format($formato);
    }
	function telefone($telefone)
	{
		$tel = "(" . substr($telefone, 0, 2) . ") " .
			substr($telefone, 2, 5) . "-" . substr($telefone, 7);
		return $tel;
	}
	function celPhone($phone)
	{
		$cel = "(" . substr($phone, 0, 2) . ") " .
			substr($phone, 2, 5) . "-" . substr($phone, 7);
		return $cel;
	}

	function cep($cep) {
		// Remove qualquer caractere que não seja número
		$cep = preg_replace('/[^0-9]/', '', $cep);
	
		// Formata o CEP no padrão XXXXX-XXX
		if (strlen($cep) === 8) {
			$cep = substr($cep, 0, 5) . '-' . substr($cep, 5);
		}
	
		return $cep;
	}
	function preco($preco)
	{
		// Verifica se o comprimento da string é 4
		if (strlen($preco) === 4) {
			$preco = substr($preco, 0, 2) . "," . substr($preco, 2);
		}
		// Verifica se o comprimento da string é 5
		elseif (strlen($preco) === 5) {
			$preco = substr($preco, 0, 3) . "," . substr($preco, 3);
		}

    return $preco;
	}
	function formatar_cpf_cnpj($doc) {
 
        $doc = preg_replace("/[^0-9]/", "", $doc);
        $qtd = strlen($doc);
 
        if($qtd >= 11) {
 
            if($qtd === 11 ) {
 
                $docFormatado = substr($doc, 0, 3) . '.' .
                                substr($doc, 3, 3) . '.' .
                                substr($doc, 6, 3) . '-' .
                                substr($doc, 9, 2);
            } else if($qtd === 14) {
                $docFormatado = substr($doc, 0, 2) . '.' .
                                substr($doc, 2, 3) . '.' .
                                substr($doc, 5, 3) . '/' .
                                substr($doc, 8, 4) . '-' .
                                substr($doc, -2);
            }else {
				return 'Documento invalido';
			}
 
            return $docFormatado;
 
        } else {
            return 'Documento invalido';
        }
    }
	// Peguei esse format do cpf do  https://www.jonathanmoreira.com.br/aula/como-formatar-cpf-e-cnpj-com-php.html
	// Fiz somente uma pequena alteração para colocar - no cpf 

		
	//  Atualiza um registro em uma tabela, por ID
	 	
	function update($table = null, $id = 0, $data = null) {

		$database = open_database();
	
		$items = null;
	
		foreach ($data as $key => $value) {
		$items .= trim($key, "'") . "='$value',";
		}
	
		// remove a ultima virgula
		$items = rtrim($items, ',');
	
		$sql  = "UPDATE . $table  SET $items WHERE id=" . $id . ";";
	
		try {
		$database->query($sql);
	
		$_SESSION['message'] = 'Registro atualizado com sucesso.';
		$_SESSION['type'] = 'success';
	
		} catch (Exception $e) { 
	
		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';
		} 
	
		close_database($database);
	}

		
	//  Pesquisa Todos os Registros de uma Tabela
		
	function find_all( $table ) {
		return find($table);
	}
	/**
	*  Insere um registro no BD
	*/
	function save($table = null, $data = null) {

	$database = open_database();

	$columns = null;
	$values = null;

	//print_r($data);

	foreach ($data as $key => $value) {
		$columns .= trim($key, "'") . ",";
		$values .= "'$value',";
	}

	// remove a ultima virgula
	$columns = rtrim($columns, ',');
	$values = rtrim($values, ',');
	
	$sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
	


	try {
		$database->query($sql);

		$_SESSION['message'] = 'Registro cadastrado com sucesso.';
		$_SESSION['type'] = 'success';
	
	} catch (Exception $e) { 
	
		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';
	} 

	close_database($database);
	}
	
	

	//mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR );
	$driver = new mysqli_driver();
	$driver->report_mode = MYSQLI_REPORT_STRICT & ~ MYSQLI_REPORT_ERROR;

	function open_database() {
		try {
			$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$conn->SET_charset("utf8");
			return $conn;
		} catch (Exception $e) {
			//echo "<h3>Ocorreu um erro: .$e->getMessage() </h3>";
			return null;
		}
	}

	function close_database($conn) {
		try {
			//mysqli_close($conn);
			$conn = null;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

			/**
	 *  Remove uma linha de uma tabela pelo ID do registro
	 */
	function remove( $table = null, $id = null ) {

		$database = open_database();
		
		try {
		if ($id) {
	
			$sql = "DELETE FROM " . $table . " WHERE id = " . $id;
			$result = $database->query($sql);
	
			if ($result = $database->query($sql)) {   	
			$_SESSION['message'] = "Registro Removido com Sucesso.";
			$_SESSION['type'] = 'success';
			}
		}
		} catch (Exception $e) { 
	
		$_SESSION['message'] = $e->GetMessage();
		$_SESSION['type'] = 'danger';
		}
	
		close_database($database);
	}
?>