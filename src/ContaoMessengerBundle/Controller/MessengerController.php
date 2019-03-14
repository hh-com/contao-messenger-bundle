<?php

#declare(strict_types=1);

/*
 * This file is part of the Fronten User Last Online Bundle.
 *
 * (c) inspiredminds
 *
 * @license LGPL-3.0-or-later
 */

namespace ContaoMessengerBundle\Controller;

use Contao\System;
use Contao\CoreBundle\Framework\FrameworkAwareInterface;
use Contao\CoreBundle\Framework\FrameworkAwareTrait;
use Contao\CoreBundle\Routing\UrlGenerator;
use Contao\CoreBundle\Security\User\UserChecker;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;


class MessengerController extends Controller
{

    public function __invoke($action = 1, Request $request)
    {     

        return new JsonResponse( array('status' => "test ausgabe" ) ); 


        $objUser = \Contao\FrontendUser::getInstance();

        if ($objUser->id != null)
        {

            return new JsonResponse( array('status' => true ) ); 

        }

        return new JsonResponse( array('status' => false ) ); 
    }

}

?>