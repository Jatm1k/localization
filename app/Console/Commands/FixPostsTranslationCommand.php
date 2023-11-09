<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixPostsTranslationCommand extends Command
{
    protected $signature = 'fix:posts-translation';
    protected $description = 'Command description';
    public function handle()
    {
        $this->fixPosts();
        $this->info('Done');
    }

    private function fixPosts(): void
    {
        $posts = DB::table('posts')->get();
        
        foreach($posts as $post) {
            $title = json_encode(['ru' => $post->title], JSON_UNESCAPED_UNICODE);
            DB::table('posts')->where('id', $post->id)->update(['title' => $title]);
        }
    }
}
