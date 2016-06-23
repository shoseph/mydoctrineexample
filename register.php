<?php
require_once "bootstrap.php";
require_once "src/Client.php";

// Creating a new client
$client = new Client();

// seting all the data from post
$client->populateClientFromPost($_POST);

// creating the entitiy mamanger and getting the user or not
$repository = $entityManager->getRepository("Client");
$resultClient = $repository->findBy(array('login' => $client->getLogin()));

if (!$resulClient) {
    
    //var_dump($currentTime); die; 
    $client->setRegistrationDate();
    
    // inserting the client
    $entityManager->persist($client);
    
    $entityManager->flush();
    $message = "New Client added sucessfuly!";
    
} else {
    $message = "Impossible to register the new Client!";
}

header("Location: index.php?m=" . $message);
die();