<?php

namespace App\Models;

class OpenSSL
{
    private $defaultAlgorithm = "AES-256-CBC";
    # Encrypt the data using OpenSSL
    public function encrypt(string $input, array $params = [])
    {

        $config = $this->config();
        return base64_encode(
            openssl_encrypt(
                $input,
                $this->defaultAlgorithm,
                hash('sha256',  $config['sec']),
                0,
                substr(hash('sha256',  $config['iv']), 0, 16)
            )
        );


        if ($action == 'e') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        } else if ($action == 'd') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    # Decrypt the Provided Data
    public function decrypt(string $input, array $params = [])
    {
        $config = $this->config();
        return
            openssl_decrypt(
                base64_decode($input),
                $this->defaultAlgorithm,
                hash('sha256',  $config['sec']),
                0,
                substr(hash('sha256',  $config['iv']), 0, 16)
            );
    }

    public function config()
    {

        # Private_Key = openssl genpkey -algorithm RSA -out private_key.pem -pkeyopt rsa_keygen_bits: 1024
        # Public_Key = openssl genpkey -algorithm RSA -out private_key.pem -pkeyopt rsa_keygen_bits: 512

        return [
            'sec' => 'kGJeGF2hEQ',
            'iv' => '7236489512357891', # Only First 16 Characters will be Considered
        ];
    }
}
