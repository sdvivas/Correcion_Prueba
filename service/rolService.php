<?php
    include 'mainService.php';
    class RolService extends MainService{

        function findRoles(){
            return $this->conex->query("SELECT * FROM SEG_ROL");
        }

        function findByRol($codigoRol){
            return $this->conex->query("SELECT * FROM ROL_MODULO rm , SEG_MODULO sm WHERE rm.COD_MODULO = sm.COD_MODULO AND rm.COD_ROL Like '$codigoRol'");
        }

        function findModulos($codigoModulo){
            return $this->findActive("SEG_MODULO");
        }
        function insertRol($codigoRol,$codigoModulo){
            $stmt = $this->conex->prepare("INSERT INTO ROL_MODULO  (COD_ROL, COD_MODULO)  VALUES (?,?)");
            $stmt->bind_param('ss', $codigoRol,$codigoModulo);
            $stmt->execute();
            $stmt->close();
        }
        
        function delete($codRol, $codigoModulo){
            $stmt = $this->conex->prepare("DELETE FROM ROL_MODULO WHERE COD_ROL like ? AND COD_MODULO like ?");
            $stmt->bind_param('ss',$codRol,$codigoModulo);
            $stmt->execute();
            $stmt->close();
        }
        

    }

?>