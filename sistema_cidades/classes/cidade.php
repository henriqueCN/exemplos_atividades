<?php
require_once ('Crud.php');

class cidade extends Crud{ //muda aqui
	
	
	protected $table = 'cidade'; //muda aqui
	private $nome;  //muda aqui
	private $tamanho;  //muda aqui 
	private $data_nascimento;  //muda aqui
	private $num_igrejas;  //muda aqui 

	public function __construct($nom, $tam, $dt_nasc, $n_igrejas){
		$this->nome = $nom;
		$this->tamanho = $tam;
		$this->data_nascimento = $dt_nasc;
		$this->num_igrejas = $n_igrejas;
	}

	public function getNome(){
		return $this->nome;	//muda aqui
	}

	public function getTamanho(){
		return $this->tamanho;	//muda aqui
	}

	public function getData_Nascimento(){
		return $this->data_nascimento;	//muda aqui
	}

	public function getNum_Igrejas(){
		return $this->num_igrejas;	//muda aqui
	}


	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, tamanho, data_nascimento, num_igrejas) 
		VALUES (:nome, :tamanho, :data_nascimento, :num_igrejas)"; //muda aqui e na linha acima
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome); //muda aqui
		$stmt->bindParam(':tamanho', $this->tamanho); //muda aqui
		$stmt->bindParam(':data_nascimento', $this->data_nascimento); //muda aqui
		$stmt->bindParam(':num_igrejas', $this->num_igrejas); //muda aqui
		return $stmt->execute(); 

	}

	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome, tamanho = :tamanho, data_nascimento = :data_nascimento, num_igrejas = :num_igrejas WHERE id = :id"; //muda na linha acima 
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome); //muda aqui 
		$stmt->bindParam(':tamanho', $this->tamanho); //muda aqui 
		$stmt->bindParam(':data_nascimento', $this->data_nascimento); //muda aqui 
		$stmt->bindParam(':num_igrejas', $this->num_igrejas); //muda aqui 
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}

}
?>