<?php
  class PreviewProvider {
  
    private $con;
    private $username;

    public function __construct($con, $username) {
        $this->con = $con;
        $this->username = $username;
    }

    public function createPreview($entity) {
        if ($entity == null) {
            $entity = $this->getRandomEntity();
        } 

    
        $id = $entity->getId();
        $name = $entity->getName();
        $thumbnail = $entity->getThumbNail();
        $preview = $entity->getPreview();
        
        return "<div class='previewContainer'>

                  <video autoplay muted class='previewVideo' onended='previewEnded()'>
                    <source src='$preview' type='video/mp4'>
                  </video>

                  <img src='$thumbnail' class='previewImage' hidden>

                  <div class='previewOverlay'>
                    
                    <div class='mainDetails'>
                      <h3>$name</h3>

                      <div class='buttons'>
                        <button id='playButton'><i class='fas fa-play'></i> Play</button>
                        <button onClick='volumeToggle(this)'><i class='fas fa-volume-mute'></i></button>
                      </div>

                    </div>

                  </div>

                </div>";
    }

    public function createEntityPreviewSquare(Entity $entity) {
      $id = $entity->getId();
      $thumbNail = $entity->getThumbNail();
      $name = $entity->getName();

      return "<a href='entity.php?id=$id'>
                <div class='previewContainer small'>
                  <img src='$thumbNail' title='$name'>
                </div>
              </a>";
    }

    private function getRandomEntity() {

        $entity = EntityProvider::getEntities($this->con, null, 1);

        return $entity[0];
    }

  }
?>