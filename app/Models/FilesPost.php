<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class FilesPost
{

    public string $title;
    public string $excert;
    public string $slug;
    public int    $publiched_at;
    public string $content;

    protected static function convertFileToFilesPost(string $path)
    {
        return new FilesPost(
            ($y = YamlFrontMatter::parseFile($path))->title,
            $y->slug,
            $y->excert,
            $y->date,
            $y->body()
        );
    }

    public function __construct(
        ?string $title,
        ?string $slug,
        ?string $excert,
        ?int $date,
        ?string $content
    ) {
        $this->title = $title       ?? 'no title';
        $this->slug = $slug         ?? 'no slug';
        $this->excert = $excert     ?? 'no excert';
        $this->publiched_at = $date ?? 0;
        $this->content = $content   ?? 'no body';
    }

    public static function all()
    {
        return collect(File::files(public_path('storage/filesDatabase')))
            ->map(fn ($e) => self::convertFileToFilesPost($e->getPath() . '/' . $e->getFilename()))
            ->sortByDesc('publiched_at');
    }

    public static function allAndCache($ttl = 40)
    {
        Cache::forget('fileposts:All');
        return Cache::remember(
            'fileposts:All',
            now()->minutes($ttl),
            fn () =>
            collect(File::files(public_path('storage/filesDatabase')))
                ->map(fn ($e) => self::convertFileToFilesPost($e->getPath() . '/' . $e->getFilename()))
                ->sortByDesc('publiched_at')
        );
    }

    public static function firstWhere(string $slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function firstWhereAndCache(string $slug, $ttl = 40)
    {
        return static::allAndCache($ttl)->firstWhere('slug', $slug);
    }

    public static function firstWhereOrFail(string $slug)
    {
        return static::firstWhere($slug) ?? throw new ModelNotFoundException();
    }

    public static function firstWhereOrFailAndCache(string $slug, $ttl = 40)
    {
        return static::firstWhereAndCache($slug) ?? throw new ModelNotFoundException();
    }

    public static function find(string $slug)
    {
        return self::convertFileToFilesPost('storage/filesDatabase/' . $slug);
    }

    public static function findAndCache(string $slug, $ttl = 40)
    {
        return Cache::remember(
            `filepostname:{$slug}`,
            now()->addMinutes($ttl),
            fn () => self::convertFileToFilesPost('storage/filesDatabase/' . $slug)
        );
    }

    public static function findOrFail(string $slug)
    {
        if (!file_exists($file = 'storage/filesDatabase/' . $slug))
            throw new ModelNotFoundException();
        return static::find($slug);
    }

    public static function findOrFailAndCache(string $slug, $ttl = 40)
    {
        if (!file_exists($file = 'storage/filesDatabase/' . $slug))
            throw new ModelNotFoundException();
        return static::findAndCache($slug, $ttl);
    }
}
