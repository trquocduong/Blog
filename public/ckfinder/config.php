<?php

// Bật error log nếu cần debug
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 1);

use CKSource\CKFinder\CKFinder;
use CKSource\CKFinder\Configuration;

$baseDir = __DIR__ . '/..';

$config = [
    'authentication' => function () {
        // TODO: thay bằng check session user thật
        return true;
    },
    'licenseName' => 'localhost',
    'licenseKey'  => '63Y3NHCJKTCSELJRWUMC47HPYPVEP',

    'backends' => [
        [
            'name'         => 'default',
            'adapter'      => 'local',
            'baseUrl'      => '/public/uploads/',
            'root'         => $baseDir . '/uploads/',
            'chmodFiles'   => 0777,
            'chmodFolders' => 0755,
            'filesystemEncoding' => 'UTF-8',
        ]
    ],

    'resourceTypes' => [
        [
            'name'              => 'Images',
            'directory'         => 'images',
            'maxSize'           => '5M',
            'allowedExtensions' => 'bmp,gif,jpeg,jpg,png,webp',
            'backend'           => 'default'
        ],
        [
            'name'              => 'Files',
            'directory'         => 'files',
            'maxSize'           => '10M',
            'allowedExtensions' => 'pdf,doc,docx,xls,xlsx,txt,zip,rar',
            'backend'           => 'default'
        ]
    ]
];

return $config;
