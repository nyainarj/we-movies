<?php

namespace App\DTO;

use Symfony\Component\Serializer\Annotation\Groups;

class Movie
{
    #[Groups(['group.view', 'group.list'])]
    public int $id;

    #[Groups(['group.view'])]
    public bool $adult;

    #[Groups(['group.view', 'group.list'])]
    public string $backdrop_path;

    #[Groups(['group.view'])]
    public array $genre_ids;

    #[Groups(['group.view'])]
    public string $original_language;

    #[Groups(['group.view'])]
    public string $original_title;

    #[Groups(['group.view', 'group.list'])]
    public string $overview;

    #[Groups(['group.view'])]
    public float $popularity;

    #[Groups(['group.view', 'group.list'])]
    public string $poster_path;

    #[Groups(['group.view', 'group.list'])]
    public string $release_date;

    #[Groups(['group.view', 'group.list'])]
    public string $title;

    #[Groups(['group.view'])]
    public bool $video;

    #[Groups(['group.view', 'group.list'])]
    public float $vote_average;

    #[Groups(['group.view', 'group.list'])]
    public int $vote_count;
}