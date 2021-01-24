<?php

namespace App\Models;
use Config\DB;

class Model
{
    static public function all()
    {
        $obj = new static;
        $con = DB::connection();
        $result = $con->prepare("SELECT * FROM $obj->table");
        $result->execute();
        $compras = $result->fetchAll();

        return $compras;
    }

    public function save()
    {
        $att = get_object_vars($this);
        //remove determinado atributo
        unset($att['table']);

        $col = "(";
        $val = "(";
        $aux = true;
        foreach($att as $key => $value){
            if($aux){
                $aux = false;
                $col .= "$key";
                $val .= ":$key";
            }else{
                $col .= ",$key";
                $val .= ",:$key";
            }
        }
        
        $col .= ")";
        $val .= ")";

        $con = DB::connection();
        $insert = $con->prepare("INSERT INTO ".$this->table." ".$col." VALUES ".$val."");

        foreach($att as $key => $value){
            $insert->bindValue(':'.$key, $value);
            //$insert->bindParam(':'.$key, $att[$key]);
        }

        $insert->execute();
        return $con->lastInsertId();
    }
}