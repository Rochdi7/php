<?php
class UserInfo {

    private static function get_user_agent() {
        return $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN';
    }

    public static function getRealIpAddr() {
        // List of headers that might contain the real IP address
        $headers = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        ];
    
        foreach ($headers as $header) {
            if (isset($_SERVER[$header])) {
                $ipList = explode(',', $_SERVER[$header]); // Some headers may contain multiple IPs
                foreach ($ipList as $ip) {
                    $ip = trim($ip); // Remove spaces
                    // Validate if the IP is a public IPv4 address
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                        return $ip;
                    }
                }
            }
        }
    
        return 'UNKNOWN'; // If no valid public IPv4 address is found
    }
    
    public static function get_ip() {
        $mainIp = 'UNKNOWN';

        // Liste des en-têtes courants contenant l'IP
        $headers = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        ];

        foreach ($headers as $header) {
            if (isset($_SERVER[$header]) && filter_var($_SERVER[$header], FILTER_VALIDATE_IP)) {
                $mainIp = $_SERVER[$header];
                break;
            }
        }

        // Si l'IP est localhost (127.0.0.1 ou ::1), retournez une valeur descriptive
        if ($mainIp === '127.0.0.1' || $mainIp === '::1') {
            $mainIp = 'Localhost (127.0.0.1)';
        }

        return $mainIp;
    }

    public static function get_os() {
        $user_agent = self::get_user_agent();
        $os_platform = "Unknown OS Platform";

        $os_array = [
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/android/i' => 'Android',
        ];

        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }

        return $os_platform;
    }

    public static function get_browser() {
        $user_agent = self::get_user_agent();
        $browser = "Unknown Browser";

        $browser_array = [
            '/msie/i' => 'Internet Explorer',
            '/firefox/i' => 'Firefox',
            '/safari/i' => 'Safari',
            '/chrome/i' => 'Chrome',
            '/edge/i' => 'Edge',
            '/opera/i' => 'Opera',
        ];

        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser = $value;
            }
        }

        return $browser;
    }

    public static function get_device() {
        $user_agent = strtolower(self::get_user_agent());

        if (preg_match('/tablet|ipad|playbook|android(?!.*mobile)/i', $user_agent)) {
            return 'Tablet';
        } elseif (preg_match('/mobile|iphone|ipod|blackberry|iemobile|kindle/i', $user_agent)) {
            return 'Mobile';
        }

        return 'Computer';
    }
}


