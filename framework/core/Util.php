<?php

class Util
{

    public static function generateRandomString($length = 32)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function DataReplacer($data, $text)
    {
        foreach ($data as $name => $value) {
            $text = str_ireplace("{{" . $name . "}}", $value, $text);
        }

        return $text;
    }

    public static function redirect($url)
    {
        header("Location: $url");
        die();
    }

    public static function checkPostValues(array $values)
    {
        $validated = true;

        foreach ($values as $field) {
            if (!isset($_POST[$field]) || $_POST[$field] == "") {
                $validated = false;
                break;
            }
        }

        return $validated;
    }

    public static function validateNumber($num)
    {
        if (!$num) {
            return false;
        }

        $num    = ltrim(trim($num), "+88");
        $number = '88' . ltrim($num, "88");

        $ext = [
            "88017",
            "88013",
            "88016",
            "88015",
            "88018",
            "88019",
            "88014",
        ];
        if (
            is_numeric($number) && strlen($number) === 13
            && in_array(substr($number, 0, 5), $ext)
        ) {
            return $number;
        }

        return false;
    }

    public static function validateDate($date)
    {
        if (!DateTime::createFromFormat("Y-m-d", $date)) {
            return false;
        }

        return true;
    }

    public static function formatMoney($money)
    {
        if (extension_loaded('intl')) {
            $formatter = new NumberFormatter('en_IN', NumberFormatter::DECIMAL);
            $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 2);

            return $formatter->format($money);
        }

        return 'intl >= 1.0.0 extension not loaded';
    }

    public static function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        // $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow)); 

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public static function Pagination($item_count, $page_number, $item_limit)
    {

        $totalPage = ceil($item_count / $item_limit);

        $params = $_GET;
        unset($params['page']);
        $params['page'] = '';
        $cUrl = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . '?' . http_build_query($params);

        $pHTML = '<ul class="float-end pagination custom-pagination mb-0">';
        $pHTML .= '<li class="page-item page-prev ' . ($page_number === 1 ? 'disabled' : '') . '"><a class="page-link" href="' . $cUrl . ($page_number > 1 ? ($page_number - 1) : '#') . '">Prev</a></li>';
        $pHTML .= '<li class="page-item ' . ($page_number === 1 ? 'active' : '') . '"><a class="page-link" href="' . $cUrl . '1">1</a></li>';
        $pHTML .= ($page_number > 4 ? '<li class="page-item disabled"><a>...</a></li>' : '');
        $startLoop = ($page_number > 4 ? ($page_number - 2) : 2);
        $endLoop = ($page_number < ($totalPage - 3) ? ($page_number + 2) : ($totalPage - 1));
        for ($i = $startLoop; $i <= $endLoop; $i++) {
            $pHTML .= '<li class="page-item ' . ($i === $page_number ? 'active' : '') . '"><a class="page-link" href="' . $cUrl . $i . '">' . $i . '</a></li>';
        }
        $pHTML .=  ($page_number < ($totalPage - 3) ? '<li class="page-item disabled"><a>...</a></li>' : '');
        $pHTML .= ($totalPage > 1 ? '<li class="page-item ' . ($i === $page_number ? 'active' : '') . '"><a class="page-link" href="' . $cUrl . $totalPage . '">' . $totalPage . '</a></li>' : '');
        $pHTML .= '<li class="page-item ' . ($page_number === $totalPage ? 'disabled' : '') . '"><a class="page-link" href="' . $cUrl . ($page_number < $totalPage ? ($page_number + 1) : '#') . '">Next</a></li>';
        $pHTML .= '</ul>';

        $info = '<p class="mb-0">Showing ' . ((($page_number - 1) * $item_limit) + 1) . ' to ' . (min(($page_number * $item_limit), $item_count)) . ' of ' . $item_count . '</p>';


        return array("paginateNav" => $pHTML, "paginateInfo" => $info);
    }

    public static function Encrypt($string)
    {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $ciphertext = openssl_encrypt($string, 'aes-256-cbc', ENCRYPTION_KEY, OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $ciphertext);
    }


    public static function Decrypt($encrypted_string)
    {
        $decoded = base64_decode($encrypted_string);
        $iv_length = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($decoded, 0, $iv_length);
        $ciphertext = substr($decoded, $iv_length);
        return $plaintext = openssl_decrypt($ciphertext, 'aes-256-cbc', ENCRYPTION_KEY, OPENSSL_RAW_DATA, $iv);
    }
}
