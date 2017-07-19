<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Blog;
use App\Email;
use Mail;

class SendNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts['ru'] = Blog::where('email', NULL)->where('send', 1)->where('text_ru', '<>', NULL)->select('id','img','name_ru as name','subtext_ru as text', 'href')->orderBy('id')->get();
        $posts['en'] = Blog::where('email', NULL)->where('send', 1)->where('text_en', '<>', NULL)->select('id','img','name_en as name','subtext_en as text', 'href')->orderBy('id')->get();

        if ($posts) {
            $userEmails['ru'] = Email::where('lang', 'ru')->get();
            $userEmails['en'] = Email::where('lang', 'en')->get();
            if ($userEmails) {
                foreach ($posts['ru'] as $post) {
                    foreach ($userEmails['ru'] as $userEmail) {
                        Mail::send('mails.new_ru',
                            array(
                                'new' => $post,
                                'email' => $userEmail
                            ), function($message) use ($userEmail, $post)
                        {
                            $message->to($userEmail->email)->subject($post->name);
                        });
                        $post->email = 1;
                        $post->save();
                    }
                }
                foreach ($posts['en'] as $post) {
                    foreach ($userEmails['en'] as $userEmail) {
                        Mail::send('mails.new_en',
                            array(
                                'new' => $post,
                                'email' => $userEmail
                            ), function($message) use ($userEmail, $post)
                        {
                            $message->to($userEmail->email)->subject($post->name);
                        });
                        $post->email = 1;
                        $post->save();
                    }
                }
            }
        }
    }    
}
