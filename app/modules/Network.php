<?php


/**
 * A module to handle network requests
 */

class Network
{
    /**
     * @param $url
     * @return string
     * @throws \Exception
     */
    public static function getRemoteContents($url)
    {
        try {
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($curl);

            $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($code !== 200) {
                throw new \Exception('Remote host returned error: ' . $code);
            }

            if (curl_error($curl)) {
                throw new \Exception(curl_error($curl));
            }

            curl_close($curl);

            return $output;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $url
     * @param $params
     * @return array
     * @throws \Exception
     */
    public static function remoteRequest($url, $params = null)
    {
        try {
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            if (isset($params['curl_opt']['header'])) {
                curl_setopt($curl, CURLOPT_HEADER, $params['curl_opt']['header']);
            }

            if (isset($params['curl_opt']['follow_location'])) {
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, $params['curl_opt']['follow_location']);
            }

            if ((isset($params['post'])) && ($params['post'])) {
                curl_setopt($curl, CURLOPT_POST, true);
	            curl_setopt($curl, CURLOPT_POSTFIELDS, $params['post']);
            }

            if ((isset($params['header'])) && ($params['header'])) {
                curl_setopt($curl, CURLOPT_HTTPHEADER, $params['header']);
            }

            $output = curl_exec($curl);

            $info = curl_getinfo($curl);

            if (curl_error($curl)) {
                throw new \Exception(curl_error($curl));
            }

            curl_close($curl);

            return [
                'info' => $info,
                'data' => $output
            ];
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $url
     * @return int
     * @throws \Exception
     */
    public static function getHttpStatus($url)
    {
        try {
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($curl);
            $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            curl_close($curl);

            return $code;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $host
     * @param $port
     * @return bool
     * @throws \Exception
     */
    public static function getSocketStatus($host, $port)
    {
        try {
            $socket = @fsockopen($host, $port, $errno, $errstr, 5);
            if ($socket) {
                fclose($socket);

                return true;
            }

            return false;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $contents
     * @return string
     */
    public static function toNetworkableIni(array $contents)
    {
        $result = '';

        foreach ($contents as $section => $pairs) {
            $result .= '[' . $section . ']' . PHP_EOL;

            foreach ($pairs as $key => $value) {
                $result .= $key . '=' . $value . PHP_EOL;
            }
        }

        return $result;
    }

    /**
     * @param $host
     * @param $port
     * @param $protocol
     * @param $timeout
     * @return mixed
     */
    public static function getMinecraftServerStatus($host, $port, $protocol = 760, $timeout = 3)
    {
        $socket = @fsockopen($host, $port, $errno, $errstr, $timeout);
        if (!$socket) {
            return false;
        }

        $data = '';
        $data .= Utils::writeVarInt(0x00);
        $data .= Utils::writeVarInt($protocol);
        $data .= Utils::writeVarInt(strlen($host)) . $host;
        $data .= pack('n', $port);
        $data .= Utils::writeVarInt(1);

        $packet = Utils::writeVarInt(strlen($data)) . $data;
        fwrite($socket, $packet);

        $data = Utils::writeVarInt(0x00);
        $packet = Utils::writeVarInt(strlen($data)) . $data;
        fwrite($socket, $packet);

        $length = Utils::readVarInt($socket);
        $packetId = Utils::readVarInt($socket);

        if ($packetId !== 0x00) {
            fclose($socket);
            return false;
        }

        $jsonLength = Utils::readVarInt($socket);
        $json = '';

        while (strlen($json) < $jsonLength) {
            $json .= fread($socket, $jsonLength - strlen($json));
        }

        fclose($socket);

        return json_decode($json, true);
    }
}
