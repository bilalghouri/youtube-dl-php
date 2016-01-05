<?
include 'vendor/autoload.php';
use YoutubeDl\YoutubeDl;
use YoutubeDl\Exception\CopyrightException;
use YoutubeDl\Exception\NotFoundException;
use YoutubeDl\Exception\PrivateVideoException;
// $a = new SimpleXMLElement;
// exit;
$dl = new YoutubeDl([
    'format' => 'best',
    'simulate' => true
]);
// For more options go to https://github.com/rg3/youtube-dl#user-content-options

// $dl->setDownloadPath('/home/user/downloads');
// $dl->debug(function ($type, $buffer) {
//     if (\Symfony\Component\Process\Process::ERR === $type) {
//         echo 'ERR > ' . $buffer;
//     } else {
//         echo 'OUT > ' . $buffer;
//     }
// });
try {
    $video = $dl->download('https://www.youtube.com/watch?v=oDAw7vW7H0c');
    echo $video -> getUrl();
    echo $video -> getTitle();
    // var_dump($video);
    // $dl->getFile(); // \SplFileInfo instance of downloaded file
} catch (NotFoundException $e) {
    // Video not found
} catch (PrivateVideoException $e) {
    // Video is private
} catch (CopyrightException $e) {
    // The YouTube account associated with this video has been terminated due to multiple third-party notifications of copyright infringement
} catch (\Exception $e) {
    // Failed to download
}
?>
