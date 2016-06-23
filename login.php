<?php
require_once "bootstrap.php";
require_once "src/Client.php";

// Creating a new client
$client = new Client();

// seting all the data from post
$client->populateClientFromPost($_POST);

// creating the entitiy mamanger and getting the user or not
$repository = $entityManager->getRepository("Client");
$resulClient = $repository->findBy(
        array(
            'login' => $client->getLogin(),
            'password' => $client->getPassword(),
        )
);

if ($resulClient) {
    $resulClient = current($resulClient);
    
    // adding the time when the Client logged in the system
    $resulClient->setLastLoginTime();
    
    // Seting the last time that the user logen into the system
    $q = $entityManager->createQueryBuilder()
                       ->update('Client', 'c')
                       ->set('c.lastLoginTime', '?1')
                       ->where('c.login = ?2')
                       ->setParameter(1, $resulClient->getLastLoginTime())
                       ->setParameter(2, $resulClient->getLogin())
                       ->getQuery();
    $p = $q->execute();
   
    $loginTime = $resulClient->getLastLoginTime()->format('d-m-Y H:i');
    $message = "Welcome back! <div class='success'> ". $resulClient->getFirstName() . "</div><br /> Your Last Login was -> " . $loginTime;
} else {
    $message = "Invalid login";
}

    header("Location: index.php?m=" . $message);
die();