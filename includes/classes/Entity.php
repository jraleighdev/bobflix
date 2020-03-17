<?php
  class Entity {

    private $con;
    private $sqlData;

    public function __construct($con, $input) {
      $this->con = $con;

      if (is_array($input)) {
        $this->sqlData = $input;
      } else {
          $query = $this->con->prepare("SELECT * FROM entities WHERE id=:id");
          $query->bindValue(":id", $input);
          $query->execute();

          $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
      }

    }

    public function getId() {
        return $this->getData("id");
    }

    public function getName() {
        return $this->getData("name");
    }

    public function getThumbNail() {
        return $this->getData("thumbnail");
    }

    public function getPreview() {
        return $this->getData("preview");
    }

    private function getData($name) {
        return $this->sqlData[$name];
    }
 
    public function getSeasons() {
        $query = $this->con->prepare("SELECT * FROM videos WHERE entityId=:id AND isMovie=0 ORDER BY season, episode ASC");
        $query->bindValue(":id", $this->getId());
        $query->execute();

        $seasons = array();
        $videos = array();
        $currentSeason = null;
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

          $currentSeason = $row["season"];

        }
    }

  }
?>