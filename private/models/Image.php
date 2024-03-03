<?php 



/**
 * image croper and resizer
 */
class Image
{
    public function crop($src_image_path, $dest_image_path, $max_size = 600)
    {
        if (file_exists($src_image_path)) {
            $ext = strtolower(pathinfo($src_image_path, PATHINFO_EXTENSION));
            $valid_extensions = ['jpeg', 'jpg', 'png', 'gif'];
            if (!in_array($ext, $valid_extensions)) {
                $ext = 'jpeg';
            }

            $src_image = imagecreatefromstring(file_get_contents($src_image_path));
            if ($src_image) {
                $width = imagesx($src_image);
                $height = imagesy($src_image);

                $size = min($width, $height);
                $src_x = ($width - $size) / 2;
                $src_y = ($height - $size) / 2;
                $src_w = $src_h = $size;

                $dst_image = imagecreatetruecolor($max_size, $max_size);
                imagecopyresampled($dst_image, $src_image, 0, 0, $src_x, $src_y, $max_size, $max_size, $src_w, $src_h);

                imagejpeg($dst_image, $dest_image_path);
            }
        }
    }

    public function profile_thumb($image_path)
    {
        $crop_size = 600;
        $ext = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));
        $thumbnail = str_replace('.' . $ext, '_thumb.' . $ext, $image_path);

        if (!file_exists($thumbnail)) {
            $this->crop($image_path, $thumbnail, $crop_size);
        }

        return $thumbnail;
    }
}