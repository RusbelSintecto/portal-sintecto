<?php

// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//      http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.


include_once("FixedByteNotation.php");

class GoogleAuthenticator {

    static $PASS_CODE_LENGTH = 6;
    static $PIN_MODULO;
    static $SECRET_LENGTH = 10;
    
    const VALID_CHARS='ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';

    public function __construct() {
        self::$PIN_MODULO = pow(10, self::$PASS_CODE_LENGTH);
    }

    public function checkCode($secret, $code) {
        $time = floor(time() / 30);
        for ($i = -1; $i <= 1; $i++) {

            if ($this->getCode($secret, $time + $i) == $code) {
                return true;
            }
        }

        return false;
    }

    public function getCode($secret, $time = null) {

        if (!$time) {
            $time = floor(time() / 30);
        }
        $base32 = new FixedBitNotation(5, GoogleAuthenticator::VALID_CHARS, TRUE, TRUE);
        $secret = $base32->decode($secret);

        $time = pack("N", $time);
        $time = str_pad($time, 8, chr(0), STR_PAD_LEFT);

        $hash = hash_hmac('sha1', $time, $secret, true);
        $offset = ord(substr($hash, -1));
        $offset = $offset & 0xF;

        $truncatedHash = self::hashToInt($hash, $offset) & 0x7FFFFFFF;
        $pinValue = str_pad($truncatedHash % self::$PIN_MODULO, 6, "0", STR_PAD_LEFT);
        ;
        return $pinValue;
    }

    protected function hashToInt($bytes, $start) {
        $input = substr($bytes, $start, strlen($bytes) - $start);
        $val2 = unpack("N", substr($input, 0, 4));
        return $val2[1];
    }

    public function getUrl($user, $hostname, $secret) {
        $url = urlencode(sprintf("otpauth://totp/%s@%s?secret=%s", $user, $hostname, $secret));
        $encoder = "https://www.google.com/chart?chs=200x200&chld=M|0&cht=qr&chl=" . $url;
        return $encoder;
    }

    public function getQrCodeHTMLImage($username, $hostname, $secret) {
        $url = self::getUrl($username, $hostname, $secret);
        $curl_handle = curl_init();
        $headers = array('Expect:');
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => 'My-Google-Auth',
            CURLOPT_HTTPHEADER => $headers
        );
        curl_setopt_array($curl_handle, $options);
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);
        $base_64 = chunk_split(base64_encode($query));
        return '<img class="google_qrcode" src="data:image/gif;base64,' . $base_64 . '" alt="QR Code" />';
    }

    public function generateSecret() {
        $secret = "";
        for ($i = 1; $i <= self::$SECRET_LENGTH; $i++) {
            $c = rand(0, 255);
            $secret .= pack("c", $c);
        }
        $base32 = new FixedBitNotation(5, GoogleAuthenticator::VALID_CHARS, TRUE, TRUE);
        return $base32->encode($secret);
    }

    public function getNewOtpGKey() {
        $secretLength = 16;
        $validChars = GoogleAuthenticator::VALID_CHARS;
        $secret = '';
        for ($i = 0; $i < $secretLength; $i++) {
            $secret .= $validChars[rand(0, 31)];
        }
        return $secret;
    }

}
