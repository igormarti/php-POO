<?php
namespace Poo\interfaces;

interface Publicacao{

    function abrir();
    function fechar();
    function folhear($p);
    function avancarPagina();
    function voltarPagina();

}