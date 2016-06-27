<?php
return array(
    'MessageBoard' => array(
        'form' => '投稿フォーム',
        'name' => '名前',
        'mailAddress' => 'メールアドレス',
        'content' =>  '本文',
        'createdAt' =>  '投稿日時',
        'list' => 'みんなの声',
    ),
    'dateFormat' => array(
        'Y-m-d H:i:s' => 'Y-m-d H:i:s',
    ),
    'hoimi' => array(
        'message' =>  array(
            'template' => array(
                'INVALID_TYPE' => '<#0>で入力してください',
                'NOT_REQUIRED' => '必ず入力してください',
                'INVALID_RANGE' => '<#1>から<#2>の範囲の<#0>で入力してください',
                'INVALID_FORMAT' => '<#0>の形式で入力してください',
            ),
            'literal' => array(
                'DATE' => '日付',
                'STRING' => '文字',
                'DOUBLE' => '少数',
                'INT' => '整数',
                'MAIL_ADDRESS' => 'メールアドレス',
            ),
        ),
    ),
);
