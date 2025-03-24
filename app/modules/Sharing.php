<?php

/**
 * A module to handle sharing on social media
 */

class Sharing
{
    /**
     * @param $title
     * @param $url
     * @param $tags
     * @return void
     * @throws \Exception
     */
    public static function mastodon($title, $url, $tags = '')
    {
        try {
            $server_instance = env('MASTODONBOT_SERVER_INSTANCE');
            $access_token = env('MASTODONBOT_ACCESS_TOKEN');

            $text = "🚀 I have published a new blog post:\n\n$title\n\n➡️ Read it here:\n$url\n\n$tags";

            $response = Network::remoteRequest($server_instance . '/api/v1/statuses', [
                'header' => [
                    'Authorization: Bearer ' . $access_token,
                    'Content-Type: application/json'
                ],
                'post' => json_encode([
                    'status' => $text,
                    'visibility' => 'public'
                ])
            ]);

            if (!isset($response['data'])) {
                throw new \Exception('Request failed: ' . print_r($response, true));
            }

            $status_json = json_decode($response['data']);
            if (isset($status_json->error)) {
                throw new \Exception('[api/v1/statuses] ' . $status_json->error, $response['info']['http_code']);
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $title
     * @param $url
     * @param $tags
     * @return void
     * @throws \Exception
     */
    public static function bluesky($title, $url, $tags = '')
    {
        try {
            $instance = env('BLUESKY_INSTANCE');
            $handle = env('BLUESKY_HANDLE');
            $password = env('BLUESKY_PASSWORD');

            $text = "🚀 I have published a new blog post:\n\n$title\n\n➡️ Read it here:\n$url\n\n$tags";
            
            $response = Network::remoteRequest($instance . '/xrpc/com.atproto.server.createSession', [
                'header' => [
                    'Content-Type: application/json'
                ],
                'post' => json_encode([
                    'identifier' => $handle,
                    'password' => $password
                ])
            ]);

            $session = json_decode($response['data']);
            
            if ((!isset($session->accessJwt)) || (!isset($session->did))) {
                throw new \Exception('accessJwt or did are missing: ' . print_r($response, true));
            }
            
            $response = Network::remoteRequest($instance . '/xrpc/com.atproto.repo.createRecord', [
                'header' => [
                    'Authorization: Bearer ' . $session->accessJwt,
                    'Content-Type: application/json'
                ],
                'post' => json_encode([
                    'repo' => $session->did,
                    'collection' => 'app.bsky.feed.post',
                    'record' => [
                        'type' => 'app.bsky.feed.post',
                        'text' => $text,
                        'createdAt' => gmdate("Y-m-d\TH:i:s\Z")
                    ]
                ])
            ]);

            if (!isset($response['data'])) {
                throw new \Exception('Request failed: ' . print_r($response, true));
            }

            $status_json = json_decode($response['data']);
            if (isset($status_json->error)) {
                throw new \Exception('Erroneous request: ' . $status_json->error, $response['info']['http_code']);
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $title
     * @param $url
     * @param $tags
     * @return void
     * @throws \Exception
     */
    public static function all($title, $url, $tags = '')
    {
        try {
            static::mastodon($title, $url, $tags);
            static::bluesky($title, $url, $tags);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}