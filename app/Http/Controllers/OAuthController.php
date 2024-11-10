<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Http\Controllers\ApproveAuthorizationController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response as Psr7Response;

class OAuthController extends Controller
{
    public function authorize(Request $request)
    {
        // Gérer l'affichage de la page d'autorisation
        // Vous pouvez personnaliser la vue d'autorisation ici
        return view('oauth.authorize');
    }

    public function approve(Request $request)
    {
        // Utiliser le contrôleur natif de Passport pour approuver
        $serverRequest = \Zend\Diactoros\ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );

        $response = new Psr7Response;

        return app(ApproveAuthorizationController::class)->approve($serverRequest, $response);
    }

    public function token(ServerRequestInterface $request)
    {
        // Utiliser le contrôleur natif de Passport pour émettre un token
        $response = new Psr7Response;

        return app(AccessTokenController::class)->issueToken($request, $response);
    }
}
