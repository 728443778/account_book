<?php

namespace app\commands;

use yii\console\Controller;
use yii\helpers\Console;

class BaseController extends Controller
{
    public function errorLine($message)
    {
        $this->stderr($message . PHP_EOL, \yii\helpers\Console::BG_RED);
    }

    public function warningLine($message)
    {
        $this->stdout($message . PHP_EOL, Console::BG_BLUE);
    }

    public function successLine($message)
    {
        $this->stdout($message .PHP_EOL, \yii\helpers\Console::BG_BLACK);
    }
}