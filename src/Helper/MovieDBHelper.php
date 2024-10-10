<?php

namespace App\Helper;

use App\DTO\MovieGender;
use App\DTO\Movie;
use App\DTO\MovieList;
use Exception;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MovieDBHelper
{
    private HttpClientInterface $client;
    private SerializerInterface $serializer;

    public function __construct(
        HttpClientInterface $client,
        SerializerInterface $serializer
    ){
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function getMovieGenders(): array|Exception
    {
        try {
            $path = 'genre/movie/list';
            $response = $this->client->request('GET', $path, [
                'query' => [
                    'language' => 'fr',
                ],
            ]);

            if(array_key_exists("genres", $response->toArray())) {
                $genders = $this->serializer->deserialize(json_encode($response->toArray()["genres"]), MovieGender::class.'[]', 'json', ['groups' => ['group.view']]);
                return $genders;
            }
            
            return [];
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function getMovies(): MovieList
    {
        try {
            $path = 'trending/movie/day';
            $response = $this->client->request('GET', $path, [
                'query' => [
                    'language' => 'fr',
                ],
            ]);

            $movieList = $this->serializer->deserialize($response->getContent(), MovieList::class, 'json', ['groups' => ['group.list']]);
            $movies = $this->serializer->deserialize(json_encode($movieList->results), Movie::class.'[]', 'json', ['groups' => ['group.list']]);
            $movieList->results = $movies;
            return $movieList;
            
            return [];
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
    }
}