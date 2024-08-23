<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>zawa-zawa</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
8CAE-B263

    <div class="container">
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                <img src="../images/logo.jpeg" class="img-responsive" style="height: 200px;">
            </div>
                    <?php if (isset($_GET['msg']) and $_GET['msg'] == 'bloquer') : ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <span class="text">Impossible de vous connecter,votre compte est bloqué</span>
                        </div>
                    <?php elseif (isset($_GET['msg']) and $_GET['msg'] == 'supprimer') : ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <span class="text">Impossible de vous connecter,votre compte est supprimé</span>
                        </div>
                    <?php endif ?>

                    <div class="form-group">
                        <label for="" class="text">login</label>
                        <input type="text" class="form-control" id="login" placeholder="entrer votre identifiant" name="login">
                    </div>
                    <div class="form-group">
                        <label for="" class="text">mot de passe</label>
                        <input type="password" class="form-control" id="pwd" placeholder="entrer mot de passe" name="pwd">
                    </div>



                    <button type="submit" class="btn btn-primary btn-succes">Valider</button>
                    <button type="reset" class="btn btn-danger pull-right btn-bg">Connexion</button>


                </div>
            </form>
        </div>
    </div>





<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-notify.min.js"></script>
<script type="text/javascript">
    $(function(){
        $(".frmCompte").on('submit',function(e){
        e.preventDefault();
       $login=$('#login').val();
       $pwd=$('#pwd').val();
       if($login=='' || $pwd==''){
           $.notify({
               message:'Vueillez remplir tous les champs'
           },{ 
               type:'danger'
           });
           return false;
       }else{
           $.post('../traitement/connection.php',$(this).serialize(),function(data){
               if(data ==1)
               window.location.href="vueprincipal.php";
              else if(data==2){
                  $.notify({
               message:'Impossible de vous connecter,votre compte est bloqué'
           },{ 
               type:'danger'
           }); 
              }else if(data==3){
                 $.notify({
               message:'Impossible de vous connecter,votre compte est supprimé'
           },{ 
               type:'danger'
           }); 
              }else{
                 $.notify({
               message:'Login ou mot de passe incorrecte'
           },{ 
               type:'danger'
           }); 
              }
                  
               
           })
       }
    });
    });
</script>

</body>

</html>