<?php
/**
 * Video Streamer — serves VIDEO_NAGARI.mp4 with proper Range request support
 * Required for HTML5 video to work correctly in all browsers
 * Access: https://localhost/OpenSID/video_nagari.php
 */

$file = __DIR__ . '/assets/video/VIDEO NAGARI.mp4';

if (!file_exists($file)) {
    http_response_code(404);
    die('Video not found');
}

$size     = filesize($file);
$mimeType = 'video/mp4';
$start    = 0;
$end      = $size - 1;
$length   = $size;

header('Content-Type: ' . $mimeType);
header('Accept-Ranges: bytes');
header('Cache-Control: public, max-age=86400');

// Handle Range request (required for seek & browser autoplay)
if (isset($_SERVER['HTTP_RANGE'])) {
    $range = $_SERVER['HTTP_RANGE'];
    if (preg_match('/bytes=(\d*)-(\d*)/', $range, $matches)) {
        $start = $matches[1] !== '' ? (int)$matches[1] : 0;
        $end   = $matches[2] !== '' ? (int)$matches[2] : $size - 1;
    }
    $length = $end - $start + 1;
    http_response_code(206); // Partial Content
    header("Content-Range: bytes $start-$end/$size");
} else {
    http_response_code(200);
}

header('Content-Length: ' . $length);

$fp = fopen($file, 'rb');
fseek($fp, $start);

$bufferSize = 1024 * 1024; // 1MB chunks
$remaining  = $length;
while ($remaining > 0 && !feof($fp)) {
    $read = min($bufferSize, $remaining);
    echo fread($fp, $read);
    $remaining -= $read;
    flush();
}
fclose($fp);
