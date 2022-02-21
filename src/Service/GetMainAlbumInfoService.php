<?php

declare(strict_types=1);

namespace Kirillov\DeezerAlbumInfo\Service;

use Kirillov\DeezerAlbumInfo\Dto\AlbumInfo;
use Kirillov\DeezerAlbumInfo\valueObject\Album;
use Kirillov\DeezerAlbumInfo\valueObject\Url;
use GuzzleHttp\Client;

class GetMainAlbumInfoService
{
    public function __construct(
        private Client $client,
    ) { }

    public function findInfoByAlbumId(int $albumId): AlbumInfo
    {
        $response = $this->sendRequest($albumId);

        return new AlbumInfo(
            $response[Album::ID],
            $response[Album::ARTIST][Album::NAME],
            $response[Album::TITLE],
            $response[Album::UPC],
            $response[Album::DURATION],
            $response[Album::LABEL],
            $response[Album::RELEASE_DATE]
        );
    }

    private function sendRequest(int $albumId): array
    {
        $fullUrl = Url::ALBUM_API_URL . $albumId;
        $client = new Client();

        $response = $client->get($fullUrl);
        return json_decode($response->getBody(), true, flags:JSON_THROW_ON_ERROR);
    }
}
