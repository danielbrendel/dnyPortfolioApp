<?php

/*
    Asatru PHP - Migration for Settings
*/

/**
 * This class specifies a migration
 */
class Settings_Migration {
    private $database = null;
    private $connection = null;

    /**
     * Store the PDO connection handle
     * 
     * @param \PDO $pdo The PDO connection handle
     * @return void
     */
    public function __construct($pdo)
    {
        $this->connection = $pdo;
    }

    /**
     * Called when the table shall be created or modified
     * 
     * @return void
     */
    public function up()
    {
        $this->database = new Asatru\Database\Migration('Settings', $this->connection);
        $this->database->drop();
        $this->database->add('id INT NOT NULL AUTO_INCREMENT PRIMARY KEY');
        $this->database->add('head_code TEXT NULL');
        $this->database->add('text_color VARCHAR(512) NOT NULL DEFAULT \'#ffffff\'');
        $this->database->add('text_emphasis BOOLEAN NOT NULL DEFAULT TRUE');
        $this->database->add('background_color VARCHAR(512) NOT NULL DEFAULT \'#82acd7\'');
        $this->database->add('background_image VARCHAR(512) NOT NULL DEFAULT \'none\'');
        $this->database->add('sound_enable BOOLEAN NOT NULL DEFAULT TRUE');
        $this->database->add('updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->database->add('created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        $this->database->create();
    }

    /**
     * Called when the table shall be dropped
     * 
     * @return void
     */
    public function down()
    {
        if ($this->database)
            $this->database->drop();
    }
}