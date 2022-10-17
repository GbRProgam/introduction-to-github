<?php

$succes_flag = false;

if (isset($_POST)) {

    if (isset($_POST['dataNascimento']) && !empty($_POST['dataNascimento'])) {
        $dataNascimento = htmlspecialchars($_POST['dataNascimento'], ENT_QUOTES);
        $dataHoroscopo = DateTime::createFromFormat('Y-m-d', $dataNascimento)->format('m/d');
        $succes_flag = true;
    } else {
        $dataNascimento = 0;
        $succes_flag = false;
    }

}

if ($succes_flag) {

    require_once('arquivo.xml');
        $xml = simplexml_load_file('arquivo');
        $success = false;
        foreach ($xml->signo as $horoscope) {
            $initial_date = DateTime::createFromFormat('d/m', $horoscope->dataInicio)->format('m/d');
            $final_date = DateTime::createFromFormat('d/m', $horoscope->dataFim)->format('m/d');

    
            if (strtotime($initial_date) < strtotime($final_date)) {
    
                if (strtotime($horoscope_date) >= strtotime($initial_date) && strtotime($horoscope_date) <= strtotime($final_date)) {
                    $success = true;
                    $data_inicio = $horoscope->dataInicio;
                    $data_fim = $horoscope->dataFim;
                    $descricao = $horoscope->descricao;
                    $signo_nome = $horoscope->signoNome;
                    break;
                
                    echo "Você é do signo: ".$signo->signoNome;
                    echo "Data Inicio: ".$signo->dataInicio;
                    echo "Data Fim: ".$signo->dataFim;
                    echo "Caracteristicas: ".$signo->descricao;
                    
                    
                }
            }
        }
    }
   