<?php

namespace App\Http\Controllers;

use Google_Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoogleCalendarAuthController extends Controller
{
    public function redirect()
    {
        $client = new Google_Client;
        $client->setAuthConfig(storage_path('app/google-calendar/oauth-credentials.json'));
        $client->setRedirectUri(route('google-calendar.callback'));
        $client->addScope(\Google_Service_Calendar::CALENDAR);
        $authUrl = $client->createAuthUrl();

        return redirect($authUrl);
    }

    public function callback(Request $request)
    {
        $client = new Google_Client;
        $client->setAuthConfig(storage_path('app/google-calendar/oauth-credentials.json'));
        $client->setRedirectUri(route('google-calendar.callback'));

        $token = $client->fetchAccessTokenWithAuthCode($request->code);

        Storage::disk('local')->put('google-calendar/oauth-token.json', json_encode($token));

        return redirect()->route('tasks.index')->with('success', 'Autoryzacja zakończona');
    }
}
