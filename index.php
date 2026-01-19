<?php

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

$terminalAgents = ['curl', 'wget', 'lynx', 'fetch', 'httpie'];

$isTerminal = false;
foreach ($terminalAgents as $agent) {
    if (stripos($userAgent, $agent) !== false) {
        $isTerminal = true;
        break;
    }
}

if ($isTerminal) {
    header('Content-Type: text/plain');
    readfile('term.txt');
} else {
    header('Content-Type: text/html; charset=utf-8');
    readfile('web.html');
}