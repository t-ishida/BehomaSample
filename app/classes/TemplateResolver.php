<?php
namespace Sample\classes;
trait TemplateResolver
{
    public function appRoot()
    {
        return APP_ROOT;
    }

    public function nameSpaceRoot()
    {
        return 'Sample';
    }

    public function responseDirectoryName()
    {
        return APP_ROOT . '/responses';
    }

    public function templateDirectoryName()
    {
        return APP_ROOT . '/templates';
    }
}