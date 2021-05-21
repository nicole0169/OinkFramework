<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-19
 * Time: 13:57
 */

namespace Oink\Auth;


use Oink\Base;

class AuthManager extends Base
{
    private $providers = [];

    public function register(AuthProviderInterface $provider)
    {
        $this->providers[$provider->getName()] = $provider;

        return $this;
    }

    public function getProvider($name)
    {
        if (!isset($this->providers[$name])) {
            //throw new LogicException('Authentication provider not found: '.$name);
        }

        return $this->providers[$name];
    }

    /**
     * Execute providers that are able to validate the current session.
     *
     * @return bool
     */
    public function checkCurrentSession()
    {
        if ($this->userSession->isLogged()) {
            foreach ($this->filterProviders('SessionCheckProviderInterface') as $provider) {
                if (!$provider->isValidSession()) {
                    $this->logger->debug('Invalidate session for ' . $this->userSession->getUsername());
                    $this->sessionStorage->flush();
                    $this->preAuthentication();

                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Execute pre-authentication providers.
     *
     * @return bool
     */
    public function preAuthentication()
    {
        foreach ($this->filterProviders('PreAuthenticationProviderInterface') as $provider) {
            if ($provider->authenticate() && $this->userProfile->initialize($provider->getUser())) {
                $this->dispatcher->dispatch(self::EVENT_SUCCESS, new AuthSuccessEvent($provider->getName()));

                return true;
            }
        }

        return false;
    }

    /**
     * Execute username/password authentication providers.
     *
     * @param string $username
     * @param string $password
     * @param bool $fireEvent
     *
     * @return bool
     */
    public function passwordAuthentication($username, $password, $fireEvent = true)
    {
        foreach ($this->filterProviders('PasswordAuthenticationProviderInterface') as $provider) {
            $provider->setUsername($username);
            $provider->setPassword($password);

            if ($provider->authenticate() && $this->userProfile->initialize($provider->getUser())) {
                if ($fireEvent) {
                    $this->dispatcher->dispatch(self::EVENT_SUCCESS, new AuthSuccessEvent($provider->getName()));
                }

                return true;
            }
        }

        if ($fireEvent) {
            $this->dispatcher->dispatch(self::EVENT_FAILURE, new AuthFailureEvent($username));
        }

        return false;
    }


    /**
     * Filter registered providers by interface type.
     *
     * @param string $interface
     *
     * @return array
     */
    private function filterProviders($interface)
    {
        $interface = '\Oink\Auth\\' . $interface;

        return array_filter($this->providers, function (AuthProviderInterface $provider) use ($interface) {
            return is_a($provider, $interface);
        });
    }
}