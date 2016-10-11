<?php 
include_once './baza.class.php';

class CRUD{
    // $crud=new CRUD();
    //$crud->insert_id("auto",$dijelovi = array("Volvo", "BMW", "Toyota"));
    //$crud->insert_noid("auto",$dijelovi = array("Volvo", "BMW", "Toyota"));
    //$crud->delete("auto","id","0");
    //$crud->read("auto");
     //$crud->read_uvjet("auto",$selectaj = array("auto.id", "auto.broj") , $uvjet=array("id","broj"),$vrijednost=array(0,5));
    //$crud->update("auto",$dijelovi = array("Volvo", "BMW", "Toyota"));
   public function insert_id($tablica , & $polje_argumenata){
       $duzina_polja = count($polje_argumenata);
       $varijabla="insert into  $tablica values(";
       for($i=0;$i<$duzina_polja;$i++){
           $varijabla.="'";
           $varijabla.=$polje_argumenata[$i];
           $varijabla.="',";
       }
       $varijabla.=")";
       $baza=new Baza();
       $baza->updateDB($varijabla);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
   }
    
    public function insert_noid($tablica , & $polje_argumenata){
       $duzina_polja = count($polje_argumenata);
       $varijabla="insert into  $tablica values(default,";
       for($i=0;$i<$duzina_polja;$i++){
           $varijabla.="'";
           $varijabla.=$polje_argumenata[$i];
           $varijabla.="',";       
       }
       $varijabla.=")";
       $baza=new Baza();
       $baza->updateDB($varijabla);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
   }
   
    public function delete($tablica , $id,$varijabla){
       
        $varijabla = "delete from $tablica where $varijabla= $id ";
        $baza= new Baza();
        $baza->updateDB($varijabla); 
         header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
       public function read($tablica ){
           $varijabla="select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='$tablica'";
           $baza= new Baza();
           $data= $baza->selectDB($varijabla); 
           $zaglavlje= "<table id='table_users' class='custom_table'><thead>";
            while( $polje_argumenata = $data->fetch_array()){
                $zaglavlje.="<th>";
                $zaglavlje.=$row[0];
                $zaglavlje.="</th>";
            }
        $zaglavlje="</thead>";
        $varijabla = "select* from $tablica";
        $baza= new Baza();
        $data= $baza->selectDB($varijabla); 
        $ispis.=$zaglavlje;
        $ispis.="<tbody>";
       while( $polje_argumenata = $data->fetch_array()){
           $ispis.="<tr>";
         $duzina_polja = count($polje_argumenata);
         for($i=0;$i<$duzina_polja;$i++){
              $ispis.="<td>";
              $ispis.=$row[$i];
              $ispis.="</td>";
         }
           $ispis.="</tr>";
       }
       $ispis.="</tbody></table>";
    }
      
    
    public function read_uvjet($tablica ,& $var_select,& $var , & $uvjet ){
        $varijabla="select ";
         $zaglavlje= "<table id='table_users' class='custom_table'><thead>";
        $selectaj=count($var_select);
        for($i=0;$i<$selectaj;$i++){
            $zaglavlje.="<th>";
            $zaglavlje.=$var_select[$i];
            $zaglavlje.="</th>";
            $varijabla.=$var_select[$i];
           if($i<$selectaj-1) {$varijabla=",";}
        }
        $zaglavlje="</thead>";
         $varijabla="from $tablica where ";
         $selectaj=count($var);
        for($i=0;$i<$selectaj;$i++){
            $varijabla.=$var[$i];
            $varijabla.="=";
            $varijabla.=$uvjet[$i];
           if($i<$selectaj-1) {$varijabla="and";}
        }
        
        $baza= new Baza();
        $data= $baza->selectDB($varijabla); 
        $ispis.=$zaglavlje;
        $ispis.="<tbody>";
       while( $polje_argumenata = $data->fetch_array()){
           $ispis.="<tr>";
         $duzina_polja = count($polje_argumenata);
         for($i=0;$i<$duzina_polja;$i++){
              $ispis.="<td>";
              $ispis.=$row[$i];
              $ispis.="</td>";
         }
           $ispis.="</tr>";
       }
       $ispis.="</tbody></table>";
        
        
    }

    public function update($tablica, & $polje_argumenata){
       $duzina_polja = count($polje_argumenata);
       
       delete($tablica,"id",$polje_argumenata[0]);
       
       $varijabla="insert into $tablica values(";
       for($i=0;$i<$duzina_polja;$i++){
           $varijabla.="'";
           $varijabla.=$polje_argumenata[$i];
           $varijabla.="',";
       }
       $varijabla.=")";
       $baza=new Baza();
       $baza->updateDB($varijabla);
       header('Location: ' . $_SERVER['HTTP_REFERER']); 
    }
    
    
}

?>