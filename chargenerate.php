<?php 
      $string = $_POST['img'];
      $record_id = 786; 
      $fileName =$record_id.'highchart.png';
      $save = "img/".$fileName;

      list($type, $data) = explode(';', $string);
      list(, $string)      = explode(',', $string);
      $string = base64_decode($string);

      $file = file_put_contents($save, $string);
      ///**************** Add Text *************///
      header('Content-Type: image/png');
      $im = imagecreatefrompng($save);
      // if there's an error, stop processing the page:
      if(!$im)
      {
      die("");
      }
       
      // define some colours to use with the image
      $transparent = imagecolorallocate($im, 255, 255, 255);
      $black = imagecolorallocate($im, 0, 0, 0);
      $red = imagecolorallocate($im, 255, 0, 0);
       
      // get the width and the height of the image
      $width = imagesx($im);
      $height = imagesy($im);
       
      // draw a black rectangle across the bottom, say, 20 pixels of the image:
      imagefilledrectangle($im, 0, $height , $width, $height, $transparent);
       
      // now we want to write in the centre of the rectangle:

      $font = 20; // store the int ID of the system font we're using in $font
      $text = "85"; // store the text we're going to write in $text
      // calculate the left position of the text:
      $leftTextPos = ( $width - imagefontwidth($font)*strlen($text) )/2;
      // finally, write the string:
      imagestring($im, $font, $leftTextPos, $height/2, $text, $red);
       
      // output the image
      // tell the browser what we're sending it
      Header('Content-type: image/png');
      // output the image as a png
      imagepng($im,$save);
      // tidy up
      imagedestroy($im);
      echo 'ok';
?>

