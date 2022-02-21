<?php

declare(strict_types=1);

namespace Kirillov\DeezerAlbumInfo\Dto;

class AlbumInfo
{
    private string $correctTotalDuration;

    public function __construct(
        private int $albumId,
        private string $artistName,
        private string $albumName,
        private string $upc,
        private int $duration,
        public string $label,
        public string $releaseDate
    ) {
        $this->correctTotalDuration = gmdate('H:i:s', $this->duration);
    }

    public function getArtistName(): string
    {
        return $this->artistName;
    }

    public function getAlbumName(): string
    {
        return $this->albumName;
    }

    public function getUpc(): string
    {
        return $this->upc;
    }

    public function getAlbumId(): int
    {
        return $this->albumId;
    }

    public function getDuration(): string
    {
        return $this->correctTotalDuration;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }
}
