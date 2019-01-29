<?php 

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario() {

		return $this->idusuario;
	}

	public function setIdusuario($value) {
		$this->idusuario = $value;
	}

	public function getDeslogin() {

		return $this->deslogin;
	}

	public function setDeslogin($value) {
		$this->deslogin = $value;
	}

	public function getDessenha() {

		return $this->dessenha;
	}

	public function setDessenha($value) {
		$this->dessenha = $value;
	}

	public function getDtcadastro() {

		return $this->dtcadastro;
	}

	public function setDtcadastro($value) {
		$this->dtcadastro = $value;
	}

	public function loadById($id) {

		$sql = new Sql();
		$results = $sql->select("Select * from tb_usuarios Where idusuario = :Id", array(
			"Id"=>$id
		));

		if (count($results)> 0) {

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	public static function getList(){

		$sql = new Sql();
		return $sql->select("Select * from tb_usuarios Order By deslogin;");

	}

	public static function search($Login) {

		$sql = new Sql();
		return $sql->select("Select * from tb_usuarios Where deslogin Like :SEARCH Order by deslogin", array(
			':SEARCH'=>"%".login."%"
		));
		
	}

	public function login($login, $password) {

		$sql = new Sql();

		$results = $sql->select("Select * from tb_usuarios Where idusuario = :LOGIN And dessenha = :PASSWORD, array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		if (count($results)> 0) {

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	public function __toString() {

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

			 ));
	}
}


 ?>