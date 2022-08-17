<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract static public function tableName(): string; //я добавил static 

    abstract public function attributes(): array;

    abstract static function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        //по моему это можно убрать и расставить двоеточия в строке self::prepare
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statement = self::prepare("
                INSERT INTO $tableName (" . implode(',', $attributes) . ") VALUES(" . implode(',', $params) . ");
        ");
        foreach ($attributes as  $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
    //я добавил static 
    static public function findOne($where) //[email => fdkjfk@gamel.com, firstname => Name] 4:09:29
    {
        $tableName = static::tableName(); //4:09:50
        $attributes = array_keys($where);
        $sql = implode("AND ", (array_map(fn ($attr) => "$attr = :$attr", $attributes)));
        //SELECT*FROM $tableName WHERE $sql
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
}
