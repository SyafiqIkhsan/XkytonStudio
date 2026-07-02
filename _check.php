<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$projects = $app->make('db')->table('projects')->get(['id','title','slug']);
foreach ($projects as $p) {
    echo "$p->id | $p->title | $p->slug\n";
}
