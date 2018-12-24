<?php

return [
    'header_name' => env('VERSION_HEADER_NAME', 'X-Version'),
    'version' => env('VERSION', env('VERSION_DEFAULT', 'latest')),
];
