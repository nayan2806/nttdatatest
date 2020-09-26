<?php

$img = imagecreatetruecolor(1360,768);

function regularPolygon($img,$x,$y,$radius,$sides,$color)
{
    $points = array();
    for($a = 0;$a <= 360; $a += 360/$sides)
    {
        $points[] = $x + $radius * cos(deg2rad($a));
        $points[] = $y + $radius * sin(deg2rad($a));
    }
    return imagepolygon($img,$points,$sides,$color);
}

regularPolygon($img,1360/2,768/2,300,6,0xffffff);//Test draw

$im = imagecreatetruecolor(255, 255);
 
// Create a colour.
$white = imagecolorallocate($im, 255, 255, 255);
 
// Draw a cirlce in the middle of the image.
imageellipse($img, 680, 400, 400, 400, $white);

// Draw a white rectangle
regularPolygon($img,680,768/2,150,4,0xffffff);
 
// Save the image to a file.
//imagepng($img, 'circle.png');
 
header('Content-type: image/png');
imagepng($img);
imagedestroy($img);