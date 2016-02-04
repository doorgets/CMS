<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 5.1 - 11 November, 2013
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life, One code =-
/*******************************************************************************
    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
******************************************************************************
******************************************************************************/

// Authentification User
$Auth = new AuthUser();
$User = $Auth->isConnected();

// create doorGets object
$doorGets = new doorGetsUser(1,'dashboard',$langueZone,'user',$User);

// If is not logged set authentication controller 
if (empty($User) )
{
    if (!isset($_GET['controller']) || (isset($_GET['controller']) && $_GET['controller'] !== 'authentification'))
    {
        
        $backUrl = '&back='.urlencode ($_SERVER['REQUEST_URI']);
        header('Location:?controller=authentification'.$backUrl); exit();
        
    }
}

// // Check Payment
// if (!empty($User) && $User['payment']) {
//     // Check if user have paid
//     $orderQuery = new OrderQuery($doorGets);
//     $orderQuery->filterByUserId($User['id']);
//     $orderQuery->filterByStatus('payment_success');
//     $orderQuery->filterByType('subscription');
//     $orderQuery->find();
    
//     $userOrders = $orderQuery->_getEntities('array');
//     // if not paid redirect to paiement page
    
//     if (empty($userOrders)){
//         header('Location:'.URL.'payment/?lg='.$User['langue']); exit();
//     }
// }

$tplWrapper = Template::getView('user/user_wrapper');
include $tplWrapper;


// Check if connected and print footer
if (!empty($User) )
{
    
    $tplFooter = Template::getView('user/user_footer');
    include $tplFooter;
    
}else{
    
    $tplFooter = Template::getView('index_footer');
    include $tplFooter;
    
}
