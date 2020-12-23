<?php

session_start();

// initializing variables

$username = "nattanin";

$email    = "Np721220$";

$errors = array();

// connect to the database

$db = mysqli_connect('localhost', 'root', '', 'registration');