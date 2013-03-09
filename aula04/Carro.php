<?php

class Carro 
{
	private $marca;
	private $modelo;
	private $cor;
	private $ano;

	public static $fabricados = 0;

	public function __construct()
	{
		self::$fabricados += 1;
	}

	public function getMarca()
	{
		return $this->marca;
	}
	public function setMarca ($m) 
	{
		$this->marca = $m;
	}

	public function getModelo()
	{
		return $this->modelo;
	}
	public function setModelo ($m) 
	{
		$this->modelo = $m;
	}

	public function getCor()
	{
		return $this->cor;
	}
	public function setCor ($c) 
	{
		$this->cor = $c;
	}

	public function getAno()
	{
		return $this->ano;
	}
	public function setAno($a)
	{
		if(! is_int($a))
		{
			dir("Ano deve ser inteiro");
		}
		$this-> ano = $a;
	}

	public function getCarro()
	{
		return "Marca: "  . $this->getMarca() . "<br>" . 
			   "Modelo: " . $this->getModelo() . "<br>" . 
			   "Cor: "    . $this->getCor() . "<br>" .
			   "Ano: "    . $this->getAno() . "<br>";
	}
}