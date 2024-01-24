<?php

namespace App\Console\Commands;

use App\Mail\DailyTweetCount;
use App\models\User;
use App\Services\SantakuService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Mail\Mailer;

class SendDailyTweetCountMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send-daily-tweet-count-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '前日のつぶやき数を集計してつぶやきを促すメールを送ります';

    private SantakuService $tweetService;
    private Mailer $mailer;

    public function __construct(SantakuService $tweetService, Mailer $mailer)
    {
        parent::__construct();
        $this->tweetService = $tweetService;
        $this->mailer = $mailer;
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tweetCount = $this->tweetService->countyesterdayTweets();

        $users = User::get();

        foreach ($users as $user) {
            $this->mailer->to($user->email)
                ->send(new DailyTweetCount($user, $tweetCount));
        }
        return 0;
    }
}
