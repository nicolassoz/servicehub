<?php 
function statusTexto($status)
{
    switch($status)
    {
        case 1: return "Pendente";
        case 2: return "Em andamento";
        case 3: return "finalizando";
        case 4: return "cancelada";
        case 5: return "recusada";
        default: return "desconhecido";
    }
}