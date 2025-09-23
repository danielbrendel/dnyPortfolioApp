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
            $apikey = $_GET['token'] ?? '';

            ApiKeys::verify($apikey);
        } catch (\Exception $e) {
            $this->respond(json_encode(['code' => 403, 'msg' => $e->getMessage()]), 403, 'application/json');
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
}
