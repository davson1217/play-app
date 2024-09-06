<?php

namespace App\Http\Controllers;

use App\Services\RemoteFileCollection;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SampleController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @throws ConnectionException
     */
    public function bfGames()
    {
        $response = Http::withBasicAuth(
            'bf',
            'Cn0JTVkWqcm1sP3E'
        )->get('https://gs-relaxgaming-int.beefee.co.uk/gamehub/olybetlt/discovery/criticalFiles?providerCode=BFG&platformFiles=true&partnerid=656');
        if ($response->ok()) {
            $dataJson = $response->json();
            $remoteCollection = new RemoteFileCollection();
            foreach (Arr::get($dataJson, 'gamesFiles', []) as $gameFile) {
                foreach ($gameFile['files'] as $file) {
                    $remoteCollection->addFile($file['path'], str_replace("SHA1:", "", $file['checksum']));
                }
            }

            dd($dataJson);
        }
    }
}
