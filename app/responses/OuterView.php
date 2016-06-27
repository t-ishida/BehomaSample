<?php
namespace Sample\responses;


use Behoma\Web\BaseHtmlView;
use Sample\classes\BaseHtmlResponse;

class OuterView extends BaseHtmlResponse
{
    private $content = null;
    public function __construct(BaseHtmlView $content)
    {
        parent::__construct($content->getLiteralManager());
        $this->content = $content;
    }

    /**
     * @return null
     */
    public function getContentView()
    {
        return $this->content;
    }

    public function setActionForm($actionForm)
    {
        if (method_exists($this->content, 'setActionForm')) {
            $this->content->setActionForm($actionForm);
        }
    }
    
    public function getActionForm()
    {
        if (method_exists($this->content, 'getActionForm')) {
            return $this->content->getActionForm();
        }
        return null;
    }
}