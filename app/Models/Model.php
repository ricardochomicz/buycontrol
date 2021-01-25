<?php

namespace App\Models;

use Config\DB;

class Model
{
    static $num_page;
    static public function all()
    {       
        
        $obj = new static;
        $con = DB::connection();
        $result = $con->prepare("SELECT * FROM $obj->table");
        $result->execute();

        $compras = $result->fetchAll();

        return $compras;
    }

    static public function find(int $id)
    {
        $obj = new static;
        $con = DB::connection();
        $result = $con->prepare("SELECT * FROM " . $obj->table . " WHERE " . $obj->primary_key . "=:idcompras");
        $result->bindValue(':idcompras', $id);
        $result->execute();
        $res = $result->fetch(\PDO::FETCH_OBJ);
        foreach ($res as $key => $value) {
            $obj->{$key} = $value;           
        }
        //retornar todos os dados do objeto
        return $obj;

    }

    public function save()
    {
        $con = DB::connection();
        $att = get_object_vars($this);
        //remove determinado atributo
        unset($att['table']);
        unset($att['primary_key']);

        if (isset($this->{$this->primary_key})) {
            //atualizar registro
            $coluna = "";
            $aux = true;
            unset($att[$this->primary_key]);
            foreach ($att as $key => $value) {
                if ($aux) {
                    $aux = false;
                    $coluna .= "$key = :$key";
                } else {
                    $coluna .= ",$key = :$key";
                }
            }
            $update = $con->prepare("UPDATE " . $this->table . " SET ".$coluna." WHERE " . $this->primary_key . "=:id");
            foreach ($att as $key => $value) {
                $update->bindValue(':' . $key, $value);
                //$insert->bindParam(':'.$key, $att[$key]);
            }
            $update->bindValue(':id', $this->{$this->primary_key});
    
            $update->execute();
            return $this;
        }

        //criar novo registro
        $col = "(";
        $val = "(";
        $aux = true;
        foreach ($att as $key => $value) {
            if ($aux) {
                $aux = false;
                $col .= "$key";
                $val .= ":$key";
            } else {
                $col .= ",$key";
                $val .= ",:$key";
            }
        }

        $col .= ")";
        $val .= ")";


        $insert = $con->prepare("INSERT INTO " . $this->table . " " . $col . " VALUES " . $val . "");

        foreach ($att as $key => $value) {
            $insert->bindValue(':' . $key, $value);
            //$insert->bindParam(':'.$key, $att[$key]);
        }

        $insert->execute();
        return $this::find($con->lastInsertId());
    }

    public function delete()
    {
        $con = DB::connection();
        $delete = $con->prepare("DELETE FROM ".$this->table." WHERE ".$this->primary_key."=:id");
        $delete->bindValue(':id', $this->{$this->primary_key});
        $delete->execute();
    }
}
