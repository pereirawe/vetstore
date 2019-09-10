<?php 
    // reimg
    function icreate($filename)
    {
    $isize = getimagesize($filename);
    if ($isize['mime']=='image/jpeg')
        return imagecreatefromjpeg($filename);
    elseif ($isize['mime']=='image/png')
        return imagecreatefrompng($filename);
    elseif ($isize['mime']=='image/jpg')
        return imagecreatefromjpg($filename);
    /* Add as many formats as you can */
    }

    function resizeMax($image, $width, $height)
    {
    /* Original dimensions */
    $origw = imagesx($image);
    $origh = imagesy($image);

    $ratiow = $width / $origw;
    $ratioh = $height / $origh;
    $ratio = min($ratioh, $ratiow);

    $neww = $origw * $ratio;
    $newh = $origh * $ratio;

    $new = imageCreateTrueColor($neww, $newh);

    imagecopyresampled($new, $image, 0, 0, 0, 0, $neww, $newh, $origw, $origh);
    return $new;
    }

    function rotateCrop($image, $deg)
    {
    $width = imagesx($image);
    $height = imagesy($image);

    $long = max($width, $height);
    $short = min($width, $height);

    $radians = deg2rad($deg);
    $_sin = abs(sin($radians));
    $_cos = abs(cos($radians));

    if ($short <= 2*$_sin*$_cos*$long)
        {
        $x = 0.5*$short;
        if ($width>$height)
        {
        $neww = $x/$_sin;
        $newh = $x/$_cos;
        }
        else
        {
        $neww = $x/$_cos;
        $newh = $x/$sin;
        }
        }
    else
        {
        $_cos2 = $_cos*$_cos - $_sin*$_sin;
        $neww = ($width*$_cos - $height*$_sin)/$_cos2;
        $newh = ($height*$_cos - $width*$_sin)/$_cos2;
        }

    $rot = imagerotate($image, $deg, 0);
    $new = imageCreateTrueColor($neww, $newh);

    imagecopy($new, $rot, 0,0,  imagesx($rot)/2-$neww/2 , imagesy($rot)/2-$newh/2 ,$neww, $newh);
    return $new;

    }

    // TRATAMIENTO DE LA IMAGEN
    // https://vetstore.com.co/lab/reimg.php?img_file=test_image.jpg&size=300
    $imagefile = 'test_image.jpg';
    $imagefile = $_GET['img_file'];
    $size = $_GET['size'];

    $imgh = icreate($imagefile);
    $imgr = resizeMax($imgh, $size, $size);
        // $imgv = rotateCrop($imgr, 0);
    header('Content-type: image/jpeg');
    imagejpeg($imgr);

?>
