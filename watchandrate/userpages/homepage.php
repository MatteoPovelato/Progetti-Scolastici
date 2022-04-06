
  
  <body>
        <header style="background-color: #1e1e1e;">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Watch and Rate</h1>
                    <p class="lead fw-normal text-white mb-0">Condividi ciò che pensi dei film o serie TV che guardi</p>
                </div>
          
        </header>
        <div class="container px-4 px-lg-5 my-5 bg-white" >
        <p class="text-dark">Film recensiti:</p>
            <?php
             $res =Model::getInstance()->getFilm();
            
            //$film= $res[0]['nomeFIlm'];
            var_dump($res);
            echo $res;
            ?>
        </div>
    </body>
</html>
