<?php

namespace App\DTO;

use Symfony\Component\Serializer\Annotation\Groups;

class MovieGender
{
    #[Groups(['group.view'])]
    public int $id;

    #[Groups(['group.view'])]
    public string $name;
}