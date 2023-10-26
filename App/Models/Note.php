<?php
namespace App\Models;

/**
 * Note class interact with notes table in database
 */
class Note extends \Core\Model
{    
    /**
     * getNotes method receives information about all notes in database
     *
     * @return array
     */
    public static function getNotes() : array {
        return static::getDB()->query('SELECT * FROM `notes`')->fetchAll();
    }
        
    /**
     * getNote method receives information about one note in database by it's id
     *
     * @param  integer $id
     * @return array
     */
    public static function getNote(int $id) : array {
        return static::getDB()->prepare('SELECT * FROM `notes` WHERE `id` = ?')->execute([$id])->fetchAll();
    }
    
    /**
     * createNote method add note to the database
     *
     * @param  string $text
     * @return void
     */
    public static function createNote(string $text) : void {
        static::getDB()->prepare('INSERT INTO `notes` (`text`, `created_at`) VALUES (?, NOW())')->execute([$text]);
    }
}