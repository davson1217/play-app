<?php

namespace App\Services;


use Illuminate\Support\Collection;

class RemoteFileCollection extends Collection
{
    public function addFile(string $fileName, string $hash): self
    {
        if (!$this->has($fileName)) {
            $this->put($fileName, collect());
        }

        /** @var self $fileHashes */
        $fileHashes = $this->get($fileName);
        if (!$fileHashes->contains($hash)) {
            $fileHashes->push($hash);
            $this->put($fileName, $fileHashes);
        }

        return $this;
    }
}
