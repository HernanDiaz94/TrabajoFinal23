<?php
class Mongo{
    public function select($condicion, $coleccion){
        //Funcion para buscar los registros de acuerdo a $condicion(Debe ser un array), sobre la colecccion $coleccion
        $conexion = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $query = new MongoDB\Driver\Query($condicion);
        $result = $conexion->executeQuery('sistema_informes.'.$coleccion, $query);
        return $result->toArray();
    }

    public function insert($array, $colleccion){
        //Funcion para insertar registros de acuerdo a $array(Debe ser un array), sobre la colecccion $coleccion
        $conexion = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        ($query = new MongoDB\Driver\BulkWrite())->insert($array);
        $result = $conexion->executeBulkWrite('sistema_informes.'.$colleccion,  $query);
        return $result;
    }

    public function find($id, $colleccion){
        //Funcion para buscar registros de acuerdo al id $id sobre la colecccion $coleccion
        $conexion = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $query = new MongoDB\Driver\Query(array('_id' => new MongoDB\BSON\ObjectId($id)));
        $result = $conexion->executeQuery('sistema_informes.'.$colleccion, $query);
        return $result->toArray();
    }

    public function update($valores, $condicion, $colleccion){
        //Funcion para buscar y actualizar registros de acuerdo a la $condicion(debe ser un array), seteando los valores de $valores(debe ser un array) sobre la colecccion $coleccion
        $conexion = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        ($query = new MongoDB\Driver\BulkWrite())->update($condicion,['$set' => $valores]);
        $result = $conexion->executeBulkWrite('sistema_informes.'.$colleccion,  $query);
        return $result;
    }

    public function updateById($valores, $id, $colleccion){
        //Funcion para buscar y actualizar registros de acuerdo a id $id, seteando los valores de $valores(debe ser un array) sobre la colecccion $coleccion
        $conexion = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        ($query = new MongoDB\Driver\BulkWrite())->update(array('_id' => new MongoDB\BSON\ObjectId($id)),['$set' => $valores]);
        $result = $conexion->executeBulkWrite('sistema_informes.'.$colleccion,  $query);
        return $result;
    }

    public function delete($condicion, $colleccion){
        //Funcion para eliminar registros de acuerdo a la $condicion(debe ser un array), sobre la coleccion $coleccion
        $conexion = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        ($query = new MongoDB\Driver\BulkWrite())->delete($condicion);
        $result = $conexion->executeBulkWrite('sistema_informes.'.$colleccion,  $query);
        return $result;
    }

    public function deleteById($id, $colleccion){
        //Funcion para eliminar registros de acuerdo a al id $id, sobre la coleccion $coleccion
        $conexion = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        ($query = new MongoDB\Driver\BulkWrite())->delete(array('_id' => new MongoDB\BSON\ObjectId($id)));
        $result = $conexion->executeBulkWrite('sistema_informes.'.$colleccion,  $query);
        return $result;
    }
    
}
