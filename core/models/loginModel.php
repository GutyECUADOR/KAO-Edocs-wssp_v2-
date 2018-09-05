<?php namespace models;
require_once 'conexion.php';

class loginModel  {
    
    private $instancia_cnx;
    
    public function __construct() {
        $instanciaDB = new \models\conexion();
        $instanciaLista = $instanciaDB->getInstanciaCNX();
        $this->instancia_cnx = $instanciaLista;
    }

    public function validaIngreso($arrayDatos){
        $usuario = $arrayDatos['usuario'];
        $password = $arrayDatos['password'];
        $query = "SELECT *from tbl_cliente WHERE ruc = :ruc AND password = :password"; 
        $stmt = $this->instancia_cnx->prepare($query); 
        $stmt->bindParam(':ruc', $usuario); 
        $stmt->bindParam(':password', $password); 
        $stmt->execute(); 
       
        $resulset = $stmt->fetchAll();
        return $resulset;
           
        
    }


    public function validaMail($mail){
        $query = "SELECT ruc, nombre, email, password FROM tbl_cliente WHERE email = :mail"; 
        $stmt = $this->instancia_cnx->prepare($query); 
        $stmt->bindParam(':mail', $mail); 
        $stmt->execute(); 
       
        $resulset = $stmt->fetch();
        return $resulset;
    }
    
}
