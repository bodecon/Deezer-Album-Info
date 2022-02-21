<?php

declare(strict_types=1);

namespace Kirillov\DeezerAlbumInfo\Dto;

class TrackDto
{
    public function __construct(
        private string $trackPosition,
        private string $trackName,
        private string $duration
    ) {
        if ($this->trackPosition < 10) {
            $this->trackPosition = '0' . $trackPosition;
        }
        $this->duration = gmdate('i:s', $this->duration);
    }

    public function getPosition(): string
    {
        return $this->trackPosition;
    }

    public function getName(): string
    {
        return $this->trackName;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }
}
