<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-18
 * Time: 13:58
 */

namespace App\Http\Middleware;

use Oink\Middleware\BaseMiddleware;

class AuthMiddleware extends BaseMiddleware
{
    public function execute()
    {
//        if (!$this->authManager->checkCurrentSession()) {
//        }

//        if (!$this->isPublicAccess()) {
//            $this->handleAuthentication();
//        }

        $this->handleAuthentication();

        $this->next();
    }

    /**
     * Handle authentication.
     */
    protected function handleAuthentication()
    {
        $this->userSession->isLogged();
    }

    /**
     * Check authentication.
     */
    protected function isPublicAccess()
    {
        /*if ($this->applicationAuthorization->isAllowed($this->router->getController(), $this->router->getAction(), Role::APP_PUBLIC, $this->router->getPlugin())) {
            $this->nextMiddleware = null;

            return true;
        }

        return false;*/
        return false;
    }
}