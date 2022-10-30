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

    function getRatio(){
        $num1= $this->width;
        $num2 = $this->height;
        for($i = $num2; $i > 1; $i--) {
            if(($num1 % $i) == 0 && ($num2 % $i) == 0) {
                $num1 = $num1 / $i;
                $num2 = $num2 / $i;
            }
        }
        
        return "$num1:$num2";
    }

    public function getResizeHeight($width){
        $height = $width / $this->aspectRatio();
        return $height;
    }



    public function GetContainOutput($width,$height)
    {
    	return $width.'*'.$height;
    }

}




$imageA = new Image(250,500);
$imageB = new Image(500,90);
$imageWidth = $imageA->width;
$imageHeight=$imageB->getResizeHeight($imageWidth);
echo $imageB->GetContainOutput($imageWidth,$imageHeight); // Contain Output
