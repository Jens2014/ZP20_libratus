<?php
/*	libratus functions.php
* 	This file (functions.php) is auto included when setting up the environment for each page, no need to include it manually.
*	http://www.oswebcreations.com	
================================================== */

/**
 * Puts up random image thumbs from the gallery
 *
 * @param int $number how many images
 * @param string $class optional class
 * @param string $option what you want selected: all for all images, album for selected ones from an album
 * @param mixed $rootAlbum optional album object/folder from which to get the image.
 * @param integer $width the width/cropwidth of the thumb if crop=true else $width is longest size.
 * @param integer $height the height/cropheight of the thumb if crop=true else not used
 * @param bool $crop 'true' (default) if the thumb should be cropped, 'false' if not
 * @param bool $fullimagelink 'false' (default) for the image page link , 'true' for the unprotected full image link (to use Colorbox for example)
 */
function JKP_printRandomImage($number = 1, $class = null, $option = 'all', $rootAlbum = '', $width = NULL, $height = NULL, $crop = NULL, $fullimagelink = false) {
	if (is_null($crop) && is_null($width) && is_null($height)) {
		$crop = 2;
	} else {
		if (is_null($width))
			$width = 85;
		if (is_null($height))
			$height = 85;
		if (is_null($crop)) {
			$crop = 1;
		} else {
			$crop = (int) $crop && true;
		}
	}
        switch ($option) {
                case "all":
                        $randomImage = getRandomImages();
                        break;
                case "album":
                        $randomImage = getRandomImagesAlbum($rootAlbum);
                        break;
        }
        if (is_object($randomImage) && $randomImage->exists) {
                if ($fullimagelink) {
                        $randomImageURL = $randomImage->getFullimageURL();
                } else {
                        $randomImageURL = $randomImage->getLink();
                }
                echo '<a href="' . html_encode($randomImageURL) . '" title="' . sprintf(gettext('View image: %s'), html_encode($randomImage->getTitle())) . '">';
                switch ($crop) {
                        case 0:
                                $sizes = getSizeCustomImage($width, NULL, NULL, NULL, NULL, NULL, NULL, $randomImage);
                                $html = '<img src="' . html_encode(pathurlencode($randomImage->getCustomImage($width, NULL, NULL, NULL, NULL, NULL, NULL, TRUE))) . '" width="' . $sizes[0] . '" height="' . $sizes[1] . '" alt="' . html_encode($randomImage->getTitle()) . '" />' . "\n";
                                break;
                        case 1:
                                $sizes = getSizeCustomImage(NULL, $width, $height, $width, $height, NULL, NULL, $randomImage);
                                $html = '<img src="' . html_encode(pathurlencode($randomImage->getCustomImage(NULL, $width, $height, $width, $height, NULL, NULL, TRUE))) . '" width="' . $sizes[0] . '" height="' . $sizes[1] . '" alt="' . html_encode($randomImage->getTitle()) . '" />' . "\n";
                                break;
                        case 2:
                                $sizes = getSizeDefaultThumb($randomImage);
                                $html = '<img src="' . html_encode(pathurlencode($randomImage->getThumb())) . '" width="' . $sizes[0] . '" height="' . $sizes[1] . '" alt="' . html_encode($randomImage->getTitle()) . '" />' . "\n";
                                break;
                }
                echo zp_apply_filter('custom_image_html', $html, false);
                echo "</a>";
        } 
}
?>