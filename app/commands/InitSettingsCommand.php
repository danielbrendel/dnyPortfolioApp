<?php 

/**
 * Class InitSettingsCommand
 * 
 * Command handler implementation
 */
class InitSettingsCommand implements Asatru\Commands\Command  {
    /**
     * @param $args
     * @return void
     */
    public function handle($args)
    {
        Settings::raw('INSERT INTO `@THIS` () VALUES()');

        echo "Settings successfully initialized.\n";
    }
}