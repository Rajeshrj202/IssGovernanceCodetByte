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

    public function getResizeWeight($height){
        $width = $height * $this->aspectRatio();
        return $width;
    }



    

    public function getCoverOutput()
    {
    	return $this->width.'*'.$this->height;
    }

    public function getContainOutput($width,$height)
    {
    	if($this->width<=$width && $this->height<=$height)
    	{
    		return $this->width.'*'.$this->height;
    	}

    	if($this->height>$height)
    	{
    		$imageWidth=$this->getResizeWeight($height);
    		return floor($imageWidth).'*'.$height;
    	}

    	if($this->width>$width)
    	{
    		$imageHeight=$this->getResizeHeight($width);
    		return $width.'*'.floor($imageHeight);
    	}
		

    }

}




$imageA = new Image(250,500);
$imageB = new Image(400,600);

echo 'Contain Output : '.$imageB->getContainOutput($imageA->width,$imageA->height); // Contain Output
echo "<br>";
echo 'Cover Output : '.$imageB->getCoverOutput(); // Cover Output
