<?php

namespace App\DTO;

use Symfony\Component\Serializer\Annotation\Groups;

class MovieList
{
    #[Groups(['group.list'])]
    public int $page;

    /**
     * @var array<Movie>
    */
    #[Groups(['group.list'])]
    public array $results;

    #[Groups(['group.list'])]
    public int $total_pages;

    #[Groups(['group.list'])]
    public int $total_results;
}