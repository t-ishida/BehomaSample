<?php
namespace Sample\actions;

use Behoma\Web\BasePostAction;
use Behoma\Web\ErrorRedirectException;
use Behoma\Web\Redirect;
use Hoimi\Request;
use Sample\classes\InjectableTrait;
use Sample\classes\Injectable;

class Save extends BasePostAction implements Injectable
{
    use InjectableTrait;

    public function getActionFormName()
    {
        return 'Sample\classes\forms\SampleForm';
    }

    public function formUrl()
    {
        return '/';
    }

    public function getValidatorDefinitions()
    {
        return array (
            'name' => array('required' => true, 'dataType' => 'string', 'min' => 1, 'max' => 255),
            'mailAddress' => array('required' => false, 'dataType' => 'string', 'min' => 1, 'max' => 255),
            'content' => array('required' => true, 'dataType' => 'string'),
        );
    }

    public function doPost(Request $request)
    {
        if ($request->get('mailAddress') && !filter_var($request->get('mailAddress'), FILTER_VALIDATE_EMAIL)) {
            $this->getActionForm()->saveRequest();
            $this->getActionForm()->setErrors(array('mailAddress' => 'INVALID_FORMAT@MAIL_ADDRESS'));
            throw new ErrorRedirectException($this->formUrl());
        }
        $this->getZaolik()->getFlyweight('messageBoardDao')->save((object)array(
            'user_name' => $request->get('name'),
            'mail_address' => $request->get('mailAddress'),
            'content' => $request->get('content'),
            'created_at' => time(),
        ));
        return new Redirect('/?saved=true');
    }
}