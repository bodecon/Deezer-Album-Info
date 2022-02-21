<?php

declare(strict_types=1);

namespace Kirillov\DeezerAlbumInfo\Service;

use Kirillov\DeezerAlbumInfo\Dto\TrackDto;
use Kirillov\DeezerAlbumInfo\valueObject\Track;
use Kirillov\DeezerAlbumInfo\valueObject\Url;
use GuzzleHttp\Client;

class GetTracklistService
{
    public function __construct(
        private Client $client
    ) { }


    /**
     * @param int $albumId
     * @return TrackDto[]
     */
    public function get(int $albumId): array
    {
        $trackList = $this->sendRequest($albumId);
        $tracks = [];

        foreach ($trackList as $track) {
            $trackDto = new TrackDto(
                $track[Track::TRACK_POSITION],
                $track[Track::TITLE],
                $track[Track::DURATION]
            );

            $tracks[] = $trackDto;
        }

        return $tracks;
    }

    private function sendRequest(int $albumId): array
    {
        $fullUrl = Url::ALBUM_API_URL . $albumId . Url::TRACKLIST_KEY;
        $client = new Client();

        $response = $client->get($fullUrl);
        return json_decode($response->getBody(), true, flags:JSON_THROW_ON_ERROR);
    }
}