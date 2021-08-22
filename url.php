<!DOCTYPE html>
<html lang="en">


      <!-- Require via JSON do instagram passando o conteudo via json_decode para
      a variavel $string_dados -->
<?php
      $string_dados = file_get_contents("data.txt");    
      $string_dados = json_decode($string_dados, true);
?>

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />

      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

      <!-- Css Style -->
      <link rel="stylesheet" href="Style/style.css">

      <!-- Fontes -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Bitter&display=swap" rel="stylesheet"> 
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <title>Url</title>
</head>

<body>


<!-- Header  -->
<header>
<div class="container">
    <div class="row text-center" id="inline">
    <div class="col"> 
    <form class="d-flex">
    <img src="img/insta.png" height="50" width="100" alt="user">
    </form>
    </div>
    <div class="col" style="margin-top: 7px;">
      <img src="img/instalogo.png" width="40px">
    </div>
    <div class="col" id="logar">
    <button type="button" class="btn btn-warning" 
    style="color:white; font-size:13px; background-color:#ED4C67;">Entrar</button>
    &nbsp;&nbsp;
    <a href="url" style="text-decoration:none; color:grey;">Cadastre-se</a>
    </div>  
    </div>
    <div>
    <hr class="my-1">
    </header>
    <br><br>
<!-- Fim do Header  -->
    
<!-- Section  -->
<Section>
    <div class="container">
        <div class="row">
        <div class="col text-center">
          <img src="img/rocket.jpg" 
          id="imgperfil">
          </div>
          <div class="col">
            <h5 style="color:gray;">Projeto_Arthemis2025
            <button  type="button" class="btn btn-primary" style="font-size: 12px; 
            background-color:#273c75; font-size: 14px;"
            >Seguir</button>
            </h5>
            <div class="row">
            <div class="col" id="seguidores">
              <div style="margin-right:25px">
            <?php
             print("<img src='img/seguindo.png' height='25'>   ");
             print_r($string_dados["graphql"]["user"]["edge_followed_by"]["count"]); 
            ?>
            </div>
            <div style="margin-right:25px">
            <?php
             print("<img src='img/follow.png' height='25'> Seguindo:");
             print_r($string_dados["graphql"]["user"]["edge_follow"]["count"]);
            ?></div>
            <div style="margin-right:25px"> 
            <?php
             print("<img src='img/media.png' height='28'> Mídias:");
             print($string_dados["graphql"]["user"]["edge_owner_to_timeline_media"]["count"]); 
            ?></div>
            </div>
          </div>  
          <p><h5 style="font-size:16px; color:gray;">Velozes e Furiosos Brasil</h5>
              Bem-Vindo a família Velozes e Furiosos.<br>
              Aqui Vamos postar tudo sobre à melhor fraquia do mundo.<br>
              Estará sempre em nossos corações Paul Walker.<p>    
        </div>
        <hr class="my-4">  
          <p class="text-center">
        
          <a href="" style="font-size: 20px; text-decoration:none; color:grey;">Publicações</a>
           &nbsp;&nbsp;&nbsp;&nbsp;
          <a href=""  style="text-decoration:none; color:grey; font-size: 20px;">Marcados</a>
          </p>  
      </div>
      </div>

    <!-- Array[#node] com o Objeto e as variaveis.  -->
    <div id="cardDimensao">     
    <?php
    foreach($string_dados["graphql"]["user"]['edge_owner_to_timeline_media']
    ["edges"] as $r => $node){
    ?>
 
    <!-- Select da Url no Front  -->  
    <div class="col-3">
    <div class="card   mb-3 h-100"  style="width: 18rem;">
    
    <!-- Laço condicional, Se [$_typename] == 'GraphImage' traz a IMAGEM 
         Se  [$_typename] == 'GraphVideo' traz o Video
         Senao traz uma imagem Específica.
    -->
    <?php 
    if($node["node"]["__typename"] == 'GraphImage'){
    echo"<img src='img/astronautas.png' id='cardImgVideo'>";
    }elseif($node["node"]["__typename"] == 'GraphVideo'){
    echo"<video id='cardImgVideo'  controls> 
    <source src='video/video.mp4'  type='video/mp4'>
    </video>";
    }else{
      echo"<img src='img/starship.jpg' id='cardImgVideo'>";
    }
    ?>
    <div class="card-body" style="background-color:#ecf0f1">
    <p class="card-title" style="font-size:17px;">
    <div style="font-size:19px;" class="text-center">
    <?php
    print_r($node["node"]["edge_media_to_comment"]["count"]);
    ?>
     <img src="img/like.png" width="22px">
     <?php
     print($string_dados["graphql"]["user"]["edge_owner_to_timeline_media"]["count"]);
     ?>
     <img src="img/coment.png" width="22px">
    </div>
    <hr style="border: 1px solid #95a5a6;">
    <div id="comentarios">
    <h6 style="font-size:22px; color:grey;" class="text-left">Commentaries<h6><br>
     <?php
      print_r($node["node"]["edge_media_to_caption"]["edges"][0]["node"]["text"]);
      ?></p></div>
    </div>
</div>
</div>
<?php
}
?>
</div>
</section><br>   
<!-- Fim da Section  -->

<!-- Footer  -->
<footer id="footer">
      <div class="container" id="footer">
        <div class="row">
          <div class="col">
            <br>
            <p style="font-size:25px; color:white;">Sobre</p>
            <p id="fontfooter">Somos uma empresa especializada em tecnologia e gestão ambiental. Com atuação em todo o Vale do paraíba e presente
              no mercado ambiental desde 2020, focamos em serviços e soluções tecnológicos visando atender as necessidades dos nossos clientes.
              Possuímos uma equipe multidicilpinar que atua em processos de gerenciamento de áreas contaminadas, gerenciamento de resíduos, consultoria,
              estudos ambientais, e demais serviços prestados a indústrias, mercado imobiliário, comércios, aeroportos, rodoviase outros.
            </p>
            </div>
            <div class="col text-center">
            <br>
            <p style="font-size:25px; color:white;">Contato e Redes Sociais<p>
            
              <p  id="fontfooter" style="padding: 1.5em;">(12) 99895-9102 
              <a href="https://api.whatsapp.com/send?phone=5512988959102&text=Link%20Whats">
              <img src="img/Whats.png" width="30px ">
              </a><br>
              
              0800-667-886<img src="img/phone.png" width="30px"><br>

              jonatasw40@gmail.com
              <a href="https://mail.google.com/mail/u/0/#inbox">
              <img src="img/gmail.png" width="30px"></a><br>
              </p>

              <!-- icones facebook,Instagram,Twitter e Linkedin  -->
              <a href="https://www.facebook.com/jonatas.isaac.92//"><img src="img/face.png" width="35px " style="margin-right:15px;"></a>
              <a href="https://twitter.com/JonatasIsaac1/"><img src="img/twiter.png" width="35px " style="margin-right:15px;"></a>
              <a href="https://www.instagram.com/"><img src="img/instagram.png" width="35px " style="margin-right:15px;"></a>
              <a href="https://www.linkedin.com/in/jonatas-willian-059923b7/"><img src="img/linkedin.png" width="35px " style="margin-right:15px;"></a>
             

            
          </div>
          </div>
          <div class="row text-center">
          <p style="font-size:16px; color:white;">2021 | Todos os direitos reservados - @BrCred</p>
        </div>
      </div>
    </footer>
  <!-- Fim da Footer  -->

</body>
</html>