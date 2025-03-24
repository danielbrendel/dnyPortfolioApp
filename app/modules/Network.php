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
}
