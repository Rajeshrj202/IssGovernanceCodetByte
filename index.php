<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Image{

    public $width;
    public $height;
  

    function __construct($width,$height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function getHeight(){
        return   $this->height;
    }


    
    public function aspectRatio(){
        return $this->width/$this->height;
    }

    public function getResizeHeight($width){
        $height = $width / $this->aspectRatio();
        return $height;
    }



    public function GetContainOutput($width,$height)
    {
    	return $width.'*'.$height;
    }


    public function GetCoverOutput()
    {
    	return $this->width.'*'.$this->height;
    }

}




$imageA = new Image(250,500);
$imageB = new Image(500,90);

$imageWidth = $imageA->width;
$imageHeight=$imageB->getResizeHeight($imageWidth);
echo 'Contain Output : '.$imageB->GetContainOutput($imageWidth,$imageHeight); // Contain Output
echo "<br>";
echo 'Cover Output : '.$imageB->GetCoverOutput(); // Cover Output
