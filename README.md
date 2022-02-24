# Deezer Album Information
Get album info from deezer by ID and

# Requirements
```
php >= 8.0
'json' php-ext
Guzzle HTTP Client 7.4.x
```

# Installation
``` 
composer require k.kirillov/deezer-album-info
```

# Usage
```
fetch album data:
$service = new GetMainAlbumInfoService();
$info = $service->findInfoByAlbumId($albumId)

fetch tracklist:
$service = new GetTracklistService();
$tracklist = $service->get($albumId);
```