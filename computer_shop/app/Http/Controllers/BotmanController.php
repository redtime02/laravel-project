<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    public function handle(){
        $botman = app("botman");
        $botman->hears('{message}', function($botman, $message){
            if($message == 'Hướng dẫn giúp tôi mua laptop'){
                $this->askName1($botman);
            }
            else if($message == 'Hướng dẫn giúp tôi mua PC'){
                $this->askName2($botman);
            }
            else{
                $botman->reply("Hãy nhập lại tin nhắn");
            }
        });
        $botman->listen();
    }

    public function askName1($botman){
        $botman->ask('Bạn có thể chọn danh mục Laptop tại trang danh mục, sau đó các sản phẩm laptop sẽ hiện trên giao diện, bạn có thể tùy ý lựa chọn sản phẩm theo hãng hoặc theo giá cả.', function(Answer $answer){
            // $name = $answer->getText();
            // $this->say('Nice to meet you '.$name);
        });
    }
    public function askName2($botman){
        $botman->ask('Bạn có thể chọn danh mục PC tại trang danh mục, sau đó các sản phẩm PC sẽ hiện trên giao diện, bạn có thể tùy ý lựa chọn sản phẩm theo hãng hoặc theo giá cả.', function(Answer $answer){
            // $name = $answer->getText();
            // $this->say('Nice to meet you '.$name);
        });
    }
}
