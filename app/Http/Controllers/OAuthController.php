<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Http\Controllers\ApproveAuthorizationController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response as Psr7Response;

class OAuthController extends Controller
{
    /**
     * Affiche la page d'autorisation OAuth.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function oauthAuthorize(Request $request)
    {
        return view('oauth.authorize');
    }

    /**
     * Approuve la demande d'autorisation OAuth.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function approve(Request $request)
    {
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

    /**
     * Émet un token d'accès OAuth.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function token(ServerRequestInterface $request)
    {
        $response = new Psr7Response;

        return app(AccessTokenController::class)->issueToken($request, $response);
    }
}
