<?php
/*Author : Ng Wen Xiang*/
?>
<?php
class EncryptionHelper {
    private $key;
    private $cipher;

    public function __construct($key, $cipher = 'aes-256-cbc') {
        $this->key = $key;
        $this->cipher = $cipher;
    }

    public function encrypt($data) {
        $ivlen = openssl_cipher_iv_length($this->cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext = openssl_encrypt($data, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $ciphertext);
    }

    public function decrypt($data) {
        $data = base64_decode($data);
        $ivlen = openssl_cipher_iv_length($this->cipher);
        $iv = substr($data, 0, $ivlen);

        // Pad the IV if it's shorter than the required length
        if (strlen($iv) < $ivlen) {
            $iv = str_pad($iv, $ivlen, "\0");
        }

        $ciphertext = substr($data, $ivlen);
        return openssl_decrypt($ciphertext, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
    }
}