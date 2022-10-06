<!DOCTYPE html>
<html lang="pt-br">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Red PHP</title>

      <style>

      body{
            background-color: black;
            color:white;
            line-height: 1.5;
            font-size: 20px;
      }

      section{
            margin: auto;
            width: 850px;
            padding: 20px;
            background-color: red;
            border-radius: 30px;
            margin-top: 50px;
      }

      footer{
            margin: auto;
            width: 100%;
            padding: 20px;
            margin-left: 500px;
            font-style: italic;
      }

        
    
      </style>


 <body>   

 <section>
<?php


$signos = simplexml_load_file('arquivoSignos.xml');

$data = $_POST['dataNascimento'];

$data = explode('-', $data);

$dataSemAno = $data[1]."/".$data[2];
   

foreach($signos->signo as $signo){
      $dataInicioFormatada = explode('/', $signo->dataInicio);
      $dataInicioFormatada = $dataInicioFormatada[1]."/".$dataInicioFormatada[0];

      $dataFinalFormatada = explode('/', $signo->dataFim);
      $dataFinalFormatada = $dataFinalFormatada[1]."/".$dataFinalFormatada[0];

      if(strtotime($dataSemAno) >= strtotime($dataInicioFormatada) && strtotime($dataSemAno) <= strtotime($dataFinalFormatada)){
      
            echo "Seu signo é: ". "<b>".$signo->signoNome . "</b>";

            echo "<br/><br/>Em resumo: ".$signo->descricao;
            
           
            
      }
}

?>
</section>

<footer> &copy; Rodrigues, Bianca 2022</footer>

</body>

</head>