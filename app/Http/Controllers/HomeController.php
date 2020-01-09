<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $client = new Client();
//        segundo pedido do teste
        $response = $client->get('https://jsonplaceholder.typicode.com/users');
        $json = json_decode($response->getBody(), true);

        $filter = true;
        $name = empty($request->name) ? null : ['ordened' => 'Nome | ', 'order' => $request->name];
        $username = empty($request->username) ? null : ['ordened' => 'Usuario | ', 'order' => $request->username];
        $email = empty($request->email) ? null : ['ordened' => 'Email | ', 'order' => $request->email];
        $phone = empty($request->phone) ? null : ['ordened' => 'Telefone | ', 'order' => $request->phone];

        if ($name == null && $username == null && $email == null && $phone == null) {
            $filter = false;
        } else {
//          Quarto e Ultimo pedido do teste
            if (empty($json)) {
                throw new Exception('Não existem Dados a serem Ordenados');
            }

            $jsondec = json_decode($response->getBody());

            $collection = collect($jsondec);

            if ($name != null && $name['order'] == 'sortBy') {
                $sorted = $collection->sortBy('name');
            } elseif ($name != null && $name['order'] == 'sortByDesc') {
                $sorted = $collection->sortByDesc('name');
            }

            if ($username != null && $username['order'] == 'sortBy') {
                $sorted = $collection->sortBy('username');
            } elseif ($username != null && $username['order'] == 'sortByDesc') {
                $sorted = $collection->sortByDesc('username');
            }

            if ($email != null && $email['order'] == 'sortBy') {
                $sorted = $collection->sortBy('email');
            } elseif ($email != null && $email['order'] == 'sortByDesc') {
                $sorted = $collection->sortByDesc('email');
            }

            if ($phone != null && $phone['order'] == 'sortBy') {
                $sorted = $collection->sortBy('phone');
            } elseif ($phone != null && $phone['order'] == 'sortByDesc') {
                $sorted = $collection->sortByDesc('phone');
            }

            $json = json_decode(
                json_encode($sorted->values()->all())
                , true
            );
        }

        return view('welcome', [
            'json' => $json, 'filter' => $filter,
            'name' => $name, 'username' => $username,
            'email' => $email, 'phone' => $phone]);
    }

}
