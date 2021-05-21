<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-18
 * Time: 13:58
 */

namespace App\Http\Middleware;

use Oink\Exceptions\AccessException;
use Oink\Middleware\BaseMiddleware;

class AuthMiddleware extends BaseMiddleware
{
    public function execute()
    {
        if (!$this->authManager->checkCurrentSession()) {
            throw AccessException::getInstance()->withoutLayout();
        }

        if (!$this->isPublicAccess()) {
            $this->handleAuthentication();
        }

        $this->next();
    }

    /**
     * Handle authentication.
     */
    protected function handleAuthentication()
    {
        if (!$this->userSession->isLogged() && !$this->authenticationManager->preAuthentication()) {
            $this->nextMiddleware = null;

            if ($this->request->isAjax()) {
                $this->response->text('Not Authorized', 401);
            } else {
                $this->sessionStorage->redirectAfterLogin = $this->request->getUri();
                $this->response->redirect($this->helper->url->to('Auth/AuthController', 'login'));
            }
        }
    }

    /**
     * Check authentication.
     */
    protected function isPublicAccess()
    {
        if ($this->applicationAuthorization->isAllowed($this->router->getController(), $this->router->getAction(), Role::APP_PUBLIC, $this->router->getPlugin())) {
            $this->nextMiddleware = null;

            return true;
        }

        return false;
    }
}