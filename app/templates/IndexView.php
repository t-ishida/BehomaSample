<div class="header">
    <h1>MessageBoard</h1>
    <h2>this is a message board</h2>
</div>

<div class="content">
    <h2 id="form"><?php $this->assignWord('MessageBoard.form')?></h2>
    <?php $actionForm->formStart('messageBoard', '/save', 'post', false, array('class' => 'pure-form pure-form-stacked'))?>
    <label><?php $this->assignWord('MessageBoard.name')?><?php $actionForm->formText('name')?></label>
    <?php if (!$actionForm->isValid('name')):?>
    <p class="error"><?php $response->assignMessage($actionForm->getErrors('name'))?></p>
    <?php endif;?>
    <label><?php $this->assignWord('MessageBoard.mailAddress')?><?php $actionForm->formText('mailAddress')?></label>
    <?php if (!$actionForm->isValid('mailAddress')):?>
    <p class="error"><?php $response->assignMessage($actionForm->getErrors('mailAddress'))?></p>
    <?php endif;?>
    <label><?php $this->assignWord('MessageBoard.content')?><?php $actionForm->formTextArea('content')?></label>
    <?php if (!$actionForm->isValid('content')):?>
    <p class="error"><?php $response->assignMessage($actionForm->getErrors('content'))?></p>
    <?php endif;?>
    <?php $actionForm->formSubmit('submit', 'post', array('class' => 'pure-button-primary'))?>
    <?php $actionForm->formEnd()?>
    <h2 id="voices"><?php $this->assignWord('MessageBoard.list')?></h2>
    <div class="pure-g">
        <?php foreach ($response->getMessages() as $row):?>
        <div class="pure-u-1">
            <?php $response->toHalfContent($row->content)?>
            <p><?php $response->assign($row->user_name)?>&nbsp;
                <?php $response->assignDate('dateFormat.Y-m-d H:i:s',  $row->created_at)?>
            </p>
        </div>
        <?php endforeach;?>
    </div>
</div>

