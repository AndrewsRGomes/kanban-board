<?php 

class Events {
    
    private $id;
    private $title;
    private $color;
    private $start;
    private $end;
    private $responsavel;

    public function getId(){
        return  $this->id;
    }

    public function setId($value){
       $this->id = $value;
    }

    public function getTitle(){
        return  $this->title;
    }

    public function setTitle($value){
       $this->title = $value;
    }

    public function getColor(){
        return  $this->color;
    }

    public function setColor($value){
       $this->color = $value;
    }

    public function getStart(){
        return  $this->start;
    }

    public function setStart($value){
       $this->start = $value;
    }

    public function getEnd(){
        return  $this->end;
    }

    public function setEnd($value){
       $this->end = $value;
    }

    public function getResponsavel(){
        return  $this->responsavel;
    }

    public function setResponsavel($value){
       $this->responsavel = $value;
    }

    /**************************************/

    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select ("SELECT * FROM eventos_calendarios WHERE id = :ID", array(
            ":ID"=>$id
        ));

        if (count($results) > 0 ){

            $row = $results[0];

            $this->setId($row['id']);
            $this->setTitle($row['title']);
            $this->setColor($row['color']);
            $this->setStart(new DateTime($row['start']));
            $this->setEnd(new DateTime($row['end']));
            $this->setResponsavel($row['responsavel']);
            
        }

    }

    public function getList($responsavel){
       
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM eventos_calendarios WHERE responsavel = :RESPONSAVEL ORDER BY title", array(  
            ':RESPONSAVEL'=>$responsavel
        ));

      

        if (count($results) > 0 ){

           foreach ($results as $row){
               $this->setId($row['id']);
               $this->setTitle($row['title']);
               $this->setColor($row['color']);
               $this->setStart(new DateTime($row['start']));
               $this->setEnd(new DateTime($row['end']));
               $this->setResponsavel($row['responsavel']);

               echo json_encode($row);
            }

        } else {
            throw new Exception("Nenhum registro encontrado");
        }
    }

    public function searchByTitle($title, $responsavel){
        //nao esta funcionando
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM eventos_calendarios WHERE title LIKE :TITLE and responsavel = :RESPONSAVEL order by title", array(  
            ':TITLE'=>"%".$title."%",
            ':RESPONSAVEL'=>$responsavel
        ));

        

        if (count($results) > 0 ){

            $row = $results[0];

            $this->setId($row['id']);
            $this->setTitle($row['title']);
            $this->setColor($row['color']);
            $this->setStart(new DateTime($row['start']));
            $this->setEnd(new DateTime($row['end']));
            $this->setResponsavel($row['responsavel']);
            
            
        } else {
            throw new Exception("Nenhum registro encontrado");
            
        }

    }

    public function __toString(){
        return json_encode(array(
            "id"=>$this->getId(),
            "title"=>$this->getTitle(),
            "color"=>$this->getColor(),
            "start"=>$this->getStart()->format("d/m/Y H:i:s"),
            "end"=>$this->getEnd()->format("d/m/Y H:i:s"),
            "responsavel"=>$this->getResponsavel()

        ));
    }

}
?>