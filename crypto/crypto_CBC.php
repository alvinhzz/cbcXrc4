<?php
class CBCencrypt
{
    private $IVector;
    private $plaintext  = array();
    private $key        = array();
    private $keychain   = array();
    public $ciphertext = "";
    private $xor1       = array();
    private $xor2       = array();
    
    public function __construct($kunci, $pesan, $iv)
    {

        $this->plaintext    =   $this->ConvertDec($pesan); 
        $this->key          =   $this->ConvertDec($kunci);
        $this->IVector      =   $this->ConvertDec($iv);
        $this->Keychain($this->key);
        $this->Encrypt();
        $this->swiftLeft();
        $this->convertToString();
    }

    private function ConvertDec($word){
        $length = strlen($word);
        for ($i=0; $i < $length; $i++) { 
            $convert[$i] = ord($word[$i]);
        }
        return $convert;
    }

    private function Keychain($key)
    {
        $key = $this->key;
        $j = 0;
        for ($i = 0; $i < count($this->plaintext); $i++) {
          if ($j < count($key)) {
            
              $this->keychain[$i] = $key[$j];
              $j += 1;
              
          }else {
              $j = 0;
              $i = $i - 1;
          }
        }
        return $this->keychain;
    }

    private function Encrypt()
    {
        $plaintext = $this->plaintext;
        $iv        = $this->IVector;
        $key       = $this->keychain;
        
        for ($i=0; $i < count($plaintext); $i++) {

            if ($i==0) {
                $this->xor1[$i] = $plaintext[$i] ^ $iv;
            }else {
                $this->xor1[$i] = $plaintext[$i] ^ $this->xor2[$i-1];
            }
            $this->xor2[$i] = $this->xor1[$i] ^ $key[$i];
        }
        return true;
    }
    
    private function swiftLeft(){
        foreach($this->xor2 as $index => $value){
            $this->xor2[$index] = $value<<1;
        }
        return true;
    }

    private function convertToString()
    {
        for ($i=0; $i < count($this->xor2); $i++) { 
            $this->ciphertext .= chr($this->xor2[$i]);
        }
        return true;
    }

    public function Ciphertxt()
    {
        return $this->ciphertext;
    }

}

class CBCdecrypt
{
    private $IVector;
    private $plaintext;
    private $key        = array();
    private $keychain   = array();
    protected $ciphertext = array();
    private $xor1       = array();
    
    public function __construct($kunci, $pesan, $iv)
    {

        $this->ciphertext   =   $this->ConvertDec($pesan); 
        $this->key          =   $this->ConvertDec($kunci);
        $this->IVector      =   $this->ConvertDec($iv);

        $this->Keychain($this->key);
        $this->Decrypt();
    }

    private function ConvertDec($word){
        $length = strlen($word);
        for ($i=0; $i < $length; $i++) { 
            $convert[$i] = ord($word[$i]);
        }
        return $convert;
    }

    private function Keychain($key)
    {
        $key = $this->key;
        $j = 0;
        for ($i = 0; $i < count($this->ciphertext); $i++) {
          if ($j < count($key)) {
            
              $this->keychain[$i] = $key[$j];
              $j += 1;
              
          }else {
              $j = 0;
              $i = $i - 1;
          }
        }
        return $this->keychain;
    }

    private function Decrypt()
    {
        $ciphertext = $this->ciphertext;
        $iv         = $this->IVector;
        $key        = $this->keychain;
        $bite = array();

        for ($i=0; $i < count($ciphertext); $i++) {
            // geser 1 ke kanan
            $bite[$i] = $ciphertext[$i]>>1;
            
            if ($i==0) {
                $this->xor1[$i] = $bite[$i] ^ $iv;
            }else {
                $this->xor1[$i] = $bite[$i] ^ $bite[$i-1];
            }
            $this->plaintext .= chr($this->xor1[$i] ^ $key[$i]);
        }
        return true;
    }

    public function Plaintext()
    {
        return $this->plaintext;
    }
}

?>
