<?php
/*Author : Ng Wen Xiang*/
?>
<?php

class GenerateRandomCodeHelper {
    public static function generateCode($length = 8) {
    $bytes = random_bytes($length);
    return bin2hex($bytes);
  }
}
