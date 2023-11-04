<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Spatie\TranslationLoader\LanguageLine;

class InstallTranslationsCommand extends Command
{
    protected $signature = 'translations:install';
    protected $description = 'Перенести переводы в базу данных';
    private array $ignore = ['http-statuses'];

    public function handle()
    {
        $this->installTranslations();
        $this->info('Перенос переводов завершен!');
    }

    private function installTranslations(): void
    {
        $translations = $this->getTranslations();
        $this->createTranslations($translations);
    }

    private function getTranslations(): array
    {
        $storage = Storage::disk('base');

        $translations = [
            // 'navbar' => ['home' => ['ru' => 'Главная', 'en' => 'Home']],
        ];

        foreach($storage->directories('lang') as $directory) {
            $lang = basename($directory);
            foreach($storage->files($directory) as $file) {
                $group = pathinfo($file, PATHINFO_FILENAME);
                if(in_array($group, $this->ignore)) {
                    continue;
                }
                $array = Arr::dot(require $file);

                foreach($array as $key => $text) {
                    if(empty($text)) {
                        continue;
                    }
                    $translations[$group][$key][$lang] = $text;
                }
            }

        }

        return $translations;
    }

    private function createTranslations(array $translations): void
    {
        $models = LanguageLine::query()->get();
        foreach($translations as $group => $keys) {
            foreach($keys as $key => $text) {
                $model = $models->where('group', $group)->where('key', $key)->first() ?: new LanguageLine();
                $text = ($model->text ?? []) + $text;
                $model->update(compact('group', 'key', 'text'));
            }
        }
    }
}
