<?php
namespace Sample\responses;


use Sample\classes\BaseHtmlResponse;

class IndexView extends BaseHtmlResponse
{
    private $actionForm = null;
    private $messages = null;
    /**
     * @return null
     */
    public function getActionForm()
    {
        return $this->actionForm;
    }

    /**
     * @param null $actionForm
     */
    public function setActionForm($actionForm)
    {
        $this->actionForm = $actionForm;
    }

    /**
     * @return null
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param null $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }
    
}