<?php

namespace App\Console\Commands;

use App\Models\Language;
use Illuminate\Console\Command;

class InstallLanguagesCommand extends Command
{
    protected $signature = 'languages:install';

    protected $description = 'Установка языков';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->installLanguages();
        $this->info('Языки установлены');
    }

    private function installLanguages()
    {
        if(Language::query()->exists()) {
            return;
        }
        
        $templates = [
            ['id' => 'ru', 'name' => 'Русский', 'active' => true, 'default' => true, 'fallback' => false],
            ['id' => 'en', 'name' => 'English', 'active' => true, 'default' => false, 'fallback' => true],
            ['id' => 'de', 'name' => 'Deutsch', 'active' => true, 'default' => false, 'fallback' => false],
            ['id' => 'it', 'name' => 'Italian', 'active' => false, 'default' => false, 'fallback' => false],
        ];

        Language::query()->upsert($templates, 'id');
    }
}
