
<!-- Section  -->
<Section>
    <div class="container">
        <div class="row">
        <div class="col text-center">
          <img src="img/rocket.jpg" 
          id="imgperfil">
          </div>
          <div class="col">
            <h5 style="color:gray;">
            Projeto_Arthemis
            <button  type="button" class="btn btn-primary ajusteSeguir"  style="
            background-color:#273c75; font-size: 14px; float:right;"
            >Seguir</button>
            </h5><br>
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
        </div><br>
        <hr class="my-4">
          <p class="text-center">
          <a href="" style="font-size: 22px; text-decoration:none; color:grey;">Publicações</a>
           &nbsp;&nbsp;&nbsp;&nbsp;
          <a href=""  style=" font-size: 22px; text-decoration:none; color:grey;">Marcados</a>
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
    <div class="card mb-3 h-100"  style="width: 18rem;">
    
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
    <div class="card-body">
    <p class="card-title" style="font-size:17px;">
    <div style="font-size:19px;" class="text-center">
    
    <img src="img/like.png" width="22px">
    <?php
    print_r($node["node"]["edge_media_to_comment"]["count"]);
    ?>
    &nbsp;&nbsp;
    <img src="img/coment.png" width="22px">
     <?php
     print($string_dados["graphql"]["user"]["edge_owner_to_timeline_media"]["count"]);
     ?>

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
