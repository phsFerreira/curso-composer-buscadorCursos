#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client as GuzzleHttp;
use Symfony\Component\DomCrawler\Crawler;
use phFerreira\BuscadorDeCursos\Buscador;

$client = new GuzzleHttp([
    'base_uri' => 'https://www.alura.com.br/cursos-online-programacao/php',
    'verify' => false
]);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}
