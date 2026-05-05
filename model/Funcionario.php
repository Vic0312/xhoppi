<?php

class Funcionario{

    //Atributos
    protected $cpf;
    protected $nome;
    protected $sobrenome;
    protected $dataNasc;
    protected $telefone;
    protected $cargo;
    protected $salario;
    protected $email;
    protected $senha;
    protected $foto_prod;

    //Construtor
    public function __construct($cpf, $nome, $sobrenome, $dataNasc, $telefone, $cargo, $salario, $email, $senha, $foto_perfil){
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->dataNasc = $dataNasc;
        $this->telefone = $telefone;
        $this->cargo = $cargo;
        $this->salario = $salario;
        $this->email = $email;
        $this->senha = $senha;
        $this->foto_perfil = $foto_perfil;
    }

    //Getter e Setter
    public function get_Cpf(){
        return($this->cpf);
    }

    public function set_Cpf($cpf){
        $this->cpf = $cpf;
    }

    public function get_Nome(){
        return($this->nome);
    }

    public function set_Nome($nome){
        $this->nome = $nome;
    }

    public function get_Sobrenome(){
        return($this->sobrenome);
    }

    public function set_Sobrenome($sobrenome){
        $this->sobrenome = $sobrenome;
    }

    public function get_DataNasc(){
        return($this->dataNasc);
    }

    public function set_DataNasc($dataNasc){
        $this->dataNasc = $dataNasc;
    }

    public function get_Telefone(){
        return($this->telefone);
    }

    public function set_Telefone($telefone){
        $this->telefone = $telefone;
    }

    public function get_Cargo(){
        return($this->cargo);
    }

    public function set_Cargo($cargo){
        $this->cargo = $cargo;
    }

    public function get_Salario(){
        return($this->salario);
    }

    public function set_Salario($salario){
        $this->salario = $salario;
    }

    public function get_Email(){
        return($this->email);
    }

    public function set_Email($email){
        $this->email = $email;
    }

    public function get_Senha(){
        return($this->senha);
    }

    public function set_Senha($senha){
        $this->senha = $senha;
    }

    public function get_Foto(){
        return($this->foto_perfil);
    }

    public function set_Foto($foto_perfil){
        $this->foto_perfil = $foto_perfil;
    }

}
?>