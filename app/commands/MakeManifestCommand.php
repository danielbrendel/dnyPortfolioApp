<?php 

class MakeManifestCommand implements Asatru\Commands\Command  {
    /**
     * @param $args
     * @return void
     */
    public function handle($args)
    {
        $manifest = [
            'name' => env('APP_MANIFEST_NAME'),
            'short_name' => env('APP_MANIFEST_NAME'),
            'icons' => [
                [
                    'src' => '/img/logo.png',
                    'sizes' => '256x256',
                    'type' => 'image/png'
                ]
            ],
            'start_url' => '/',
            'display' => env('APP_MANIFEST_DISPLAY'),
            'background_color' => env('APP_MANIFEST_COLOR'),
            'theme_color' => env('APP_MANIFEST_COLOR')
        ];

        file_put_contents(public_path() . '/manifest.json', json_encode($manifest));

        echo "Manifest successfully created.\n";
    }
}