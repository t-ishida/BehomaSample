<?php
namespace Sample\classes\dao;


use Mahotora\DatabaseSession;
use Mahotora\SaveQuery;

class MessageBoardDao 
{
    private $databaseSession = null;
    public function __construct(DatabaseSession $databaseSession)
    {
        $this->databaseSession = $databaseSession;
    }

    public function find($id)
    {
        return $this->databaseSession->find("SELECT * FROM message_board WHERE id = ?", 'i', $id);
    }
    
    public function save($obj) 
    {
        $query = new SaveQuery('message_board', $obj);
        $this->databaseSession->executeNoResult($query);
    }
}