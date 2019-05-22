<?php
/**
 * 返回可读性更好的文件尺寸如:2kb,3MB,4GB
 *
 * @param [integer] $bytes
 * @param integer $decimals
 * @return void string
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

/**
 * 返回是否是图片
 *
 * @param [type] $mimeType
 * @return boolean
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

/**
 * return 'checked 'if true
 *  如果选中就返回checked 
 * @param [type] $value
 * @return void
 */
function checked($value)
{
    return $value ? 'checked' : '';
}

/**
 * return img url for headers
 * 返回上传图片的完整路径
 *
 * @param [type] $value
 * @return void
 */
function page_image($value = null)
{
    if (empty($value)) {
        $value = config('blog.page_image');
    }
    if (!starts_with($value, 'http') && $value[0] !== '/') {
        $value = config('blog.uploads.webpath') . '/' . $value;
    }
    return $value;
}
