<?php
namespace Sample\actions;


use Behoma\Web\BaseGetAction;
use Hoimi\Request;
use Sample\classes\InjectableTrait;
use Sample\classes\Injectable;
use Sample\responses\IndexView;
use Sample\responses\OuterView;

class Index extends BaseGetAction implements Injectable
{
    use InjectableTrait;
    
    public function getActionFormName()
    {
        return 'Sample\classes\forms\SampleForm';
    }

    public function doGet(Request $request)
    {
        $indexView = new IndexView($this->getZaolik()->getFlyWeight('International'));
        $indexView->setMessages(
            $this->getZaolik()->getFlyWeight('databaseSession')->find("SELECT * FROM message_board ORDER BY id DESC")
        );
        return new OuterView($indexView);
    }
}