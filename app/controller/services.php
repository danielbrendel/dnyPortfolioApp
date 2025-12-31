<?php

/*
    Asatru PHP - Services Controller
*/

class ServicesController extends BaseController {
    /**
	 * Perform base initialization
	 * 
	 * @return void
	 */
	public function __construct()
	{
        try {
            $apikey = parent::param('token', '');
            
            ApiKeys::verify($apikey);
        } catch (\Exception $e) {
            $this->respond(json_encode(['code' => 403, 'msg' => $e->getMessage()]), 403, 'application/json');
        }
	}

    /**
	 * Handles URL: /services/endpoints/list
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return mixed
	 */
    public function endpoint_list($request)
    {
        try {
            $response = null;

            $format = $request->params()->query('format', 'json');
            if (is_string($format)) {
                $format = strtolower($format);
            }

            $data = [];
            $data['metadata']['status'] = 0;

            $endpoints = Endpoints::getAll();
            $data['metadata']['endpoints'] = count($endpoints);

            foreach ($endpoints as $endpoint) {
                $data['ep' . strval($endpoint->get('id'))] = [
                    'title' => $endpoint->get('title'),
                    'description' => $endpoint->get('description'),
                    'host' => $endpoint->get('host')
                ];
            }

            $data['metadata']['status'] = 200;

            if ($format === 'json') {
                $response = json($data);
            } else if ($format === 'ini') {
                $response = Network::toNetworkableIni($data);
            } else if ($format === 'txt') {
                $response = text($data);
            } else {
                throw new \Exception('Unknown format: ' . $format);
            }

            return $response;
        } catch (\Exception $e) {
            return json([
                'code' => 500,
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
	 * Handles URL: /services/endpoints/quantity
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return mixed
	 */
    public function endpoint_quantity($request)
    {
        try {
            $response = null;

            $format = $request->params()->query('format', 'json');
            if (is_string($format)) {
                $format = strtolower($format);
            }

            $data = [];
            $data['metadata']['quantity'] = Endpoints::getQuantity();
            $data['metadata']['status'] = 200;

            if ($format === 'json') {
                $response = json($data);
            } else if ($format === 'ini') {
                $response = Network::toNetworkableIni($data);
            } else if ($format === 'txt') {
                $response = text($data);
            } else {
                throw new \Exception('Unknown format: ' . $format);
            }

            return $response;
        } catch (\Exception $e) {
            return json([
                'code' => 500,
                'msg' => $e->getMessage()
            ]);
        }
    }
    /**
	 * Handles URL: /services/endpoints/status/specific
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return mixed
	 */
    public function endpoint_status_specific($request)
    {
        try {
            $response = null;

            $format = $request->params()->query('format', 'json');
            if (is_string($format)) {
                $format = strtolower($format);
            }

            $ident = $request->params()->query('ident');

            $data = [];
            $data['metadata']['status'] = 0;

            $endpoint = Endpoints::getById($ident);

            $title = $endpoint->get('title');
            $description = $endpoint->get('description');
            $host = $endpoint->get('host');
            $contype = $endpoint->get('contype');

            $status = false;

            if ($contype === 'http') {
                $status = Cache::remember('status_endpoint_' . $ident, env('APP_STATUS_EP_CACHING', 200), function() use ($host) {
                    return Network::getHttpStatus($host);
                });
            } else if ($contype === 'socket') {
                $status = Cache::remember('status_endpoint_' . $ident, env('APP_STATUS_EP_CACHING', 200), function() use ($host) {
                    $tokens = explode(':', $host);

                    return Network::getSocketStatus($tokens[0], $tokens[1]);
                });
            } else {
                throw new \Exception('Invalid connection type \'' . $contype . '\' for entry #' . $ident);
            }

            $data['endpoint'] = [
                'title' => $title,
                'description' => $description,
                'host' => $host,
                'contype' => $contype,
                'status' => strval((int)$status)
            ];

            $data['metadata']['status'] = 200;

            if ($format === 'json') {
                $response = json($data);
            } else if ($format === 'ini') {
                $response = Network::toNetworkableIni($data);
            } else if ($format === 'txt') {
                $response = text($data);
            } else {
                throw new \Exception('Unknown format: ' . $format);
            }

            return $response;
        } catch (\Exception $e) {
            return json([
                'code' => 500,
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
	 * Handles URL: /services/endpoints/status/all
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return mixed
	 */
    public function endpoint_status_all($request)
    {
        try {
            $response = null;

            $format = $request->params()->query('format', 'json');
            if (is_string($format)) {
                $format = strtolower($format);
            }

            $data = [];
            $data['metadata']['status'] = 0;

            $endpoints = Endpoints::getAll();
            $data['metadata']['endpoints'] = count($endpoints);

            foreach ($endpoints as $endpoint) {
                $ident = $endpoint->get('id');
                $title = $endpoint->get('title');
                $description = $endpoint->get('description');
                $host = $endpoint->get('host');
                $contype = $endpoint->get('contype');

                $status = false;

                if ($contype === 'http') {
                    $status = Cache::remember('status_endpoint_' . $ident, env('APP_STATUS_EP_CACHING', 200), function() use ($host) {
                        return Network::getHttpStatus($host);
                    });
                } else if ($contype === 'socket') {
                    $status = Cache::remember('status_endpoint_' . $ident, env('APP_STATUS_EP_CACHING', 200), function() use ($host) {
                        $tokens = explode(':', $host);

                        return Network::getSocketStatus($tokens[0], $tokens[1]);
                    });
                } else {
                    throw new \Exception('Invalid connection type \'' . $contype . '\' for entry #' . $ident);
                }

                $data['ep' . strval($ident)] = [
                    'title' => $title,
                    'description' => $description,
                    'host' => $host,
                    'contype' => $contype,
                    'status' => strval((int)$status)
                ];
            }

            $data['metadata']['status'] = 200;

            if ($format === 'json') {
                $response = json($data);
            } else if ($format === 'ini') {
                $response = Network::toNetworkableIni($data);
            } else if ($format === 'txt') {
                $response = text($data);
            } else {
                throw new \Exception('Unknown format: ' . $format);
            }

            return $response;
        } catch (\Exception $e) {
            return json([
                'code' => 500,
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
	 * Handles URL: /services/netaddr
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return mixed
	 */
    public function netaddr($request)
    {
        try {
            $response = null;

            $format = $request->params()->query('format', 'json');
            if (is_string($format)) {
                $format = strtolower($format);
            }

            $data = $_SERVER['REMOTE_ADDR'];
            if ($format === 'json') {
                $response = json(['code' => 200, 'data' => $data]);
            } else if ($format === 'ini') {
                $response = Network::toNetworkableIni(['result' => ['code' => 200, 'data' => $data]]);
            } else if ($format === 'txt') {
                $response = text($data);
            } else {
                throw new \Exception('Unknown format: ' . $format);
            }

            return $response;
        } catch (\Exception $e) {
            return json([
                'code' => 500,
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
	 * Handles URL: /services/mcsrv
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return mixed
	 */
    public function mcsrv($request)
    {
        try {
            $response = null;

            $format = $request->params()->query('format', 'json');
            if (is_string($format)) {
                $format = strtolower($format);
            }

            $server_addr = $request->params()->query('address', null);
            $server_port = $request->params()->query('port', 25565);

            $data = Network::getMinecraftServerStatus($server_addr, $server_port);
            if ($format === 'json') {
                $response = json(['code' => 200, 'data' => $data]);
            } else if ($format === 'ini') {
                $server_info = [
                    'address' => $server_addr,
                    'port' => $server_port,
                    'favicon' => $data['favicon'],
                    'version' => $data['version']['name'],
                    'protocol' => $data['version']['protocol'],
                    'online' => $data['players']['online'],
                    'max' => $data['players']['max']
                ];

                $server_players = [];
                if ((isset($data['players']['sample'])) && (count($data['players']['sample']) > 0)) {
                    foreach ($data['players']['sample'] as $num => $player) {
                        $server_players[strval($num)] = $player['name'];
                    }
                }

                $response = Network::toNetworkableIni(['metadata' => $server_info, 'players' => $server_players]);
            } else if ($format === 'txt') {
                $response = text(json_encode($data));
            } else {
                throw new \Exception('Unknown format: ' . $format);
            }

            return $response;
        } catch (\Exception $e) {
            return json([
                'code' => 500,
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
	 * Handles URL: /services/ko-fi/webhook
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\JsonHandler
	 */
    public function kofi_webhook($request)
    {
        try {
            if (!env('KOFI_ENABLE', false)) {
                throw new \Exception('Service is currently inactive');
            }

            $data = $request->params()->query('data');

            $donation = json_decode($data);

            if ($donation->verification_token !== env('KOFI_VERIFICATION_TOKEN')) {
                throw new \Exception('Invalid verification token specified!');
            }

            if ($donation->is_public) {
                $bot_token = env('KOFI_BOTTOKEN');
                $bot_channel = env('KOFI_CHANNEL');

                $header = [
                    'Content-Type: application/json',
                    'Authorization: Bot ' . $bot_token
                ];

                if (($donation->is_subscription_payment) && ($donation->is_first_subscription_payment)) {
                    $post = [
                        'content' => $donation->from_name . " just made a monthly subscription via Ko-Fi! 💚\n\n" . (isset($donation->message) ? $donation->message : "(No message specified)") . "\n\nWant to support me, too? Here you go:\n➡️ " . env('APP_DONATION_KOFI') . "\n"
                    ];
                } else {
                    $post = [
                        'content' => $donation->from_name . " just made a " . (($donation->is_subscription_payment) ? "recurring" : "") . " donation via Ko-Fi! 💚\n\n" . (isset($donation->message) ? $donation->message : "(No message specified)") . "\n\nWant to support me, too? Here you go:\n➡️ " . env('APP_DONATION_KOFI') . "\n"
                    ];
                }

                $result = Network::remoteRequest('https://discord.com/api/v10/channels/' . $bot_channel . '/messages', [
                    'header' => $header,
                    'post' => json_encode($post)
                ]);
            }

            return json(['code' => 200]);
        } catch (\Exception $e) {
            return json([
                'code' => 500,
                'msg' => $e->getMessage()
            ]);
        }
    }
}
