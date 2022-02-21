<?php

declare(strict_types=1);

namespace Kirillov\DeezerAlbumInfo\Dto;

class TrackDto
{
    private string $correctDuration;
    private string $correctPosition;

    public function __construct(
        private int $trackPosition,
        private string $trackName,
        private int $duration
    ) {
        if ($this->trackPosition < 10) {
            $this->correctPosition = '0' . $trackPosition;
        } else {
            $this->correctPosition = (string)$this->trackPosition;
        }

        $this->correctDuration = gmdate('i:s', $this->duration);
    }

    public function getPosition(): string
    {
        return $this->correctPosition;
    }

    public function getName(): string
    {
        return $this->trackName;
    }

    public function getDuration(): string
    {
        return $this->correctDuration;
    }
}
