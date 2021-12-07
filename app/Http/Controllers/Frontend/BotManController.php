<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{

    public function handle()
    {
        $botman = app('botman');
        $botman->hears('{message}', function ($botman, $message) {
            if ($message == 'hi' or $message == 'Hi') {
                $this->askName($botman);
            } elseif ($message == 'hello') {
                $this->helloResponse($botman);
            } else {
                $botman->reply("write 'hi' for testing...");
            }

        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask('what is your name', function (Answer $answer) {
            $name = $answer->getText();
            $this->say('your name is:' . $name);
        });

    }

    public function helloResponse($botman)
    {
        $botman->ask('welcome your website', function (Answer $answer) {
            $msg = $answer->getText();
            $this->say("https://www.google.com/");
        });

    }
}
