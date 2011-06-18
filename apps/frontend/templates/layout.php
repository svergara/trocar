<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>
      FB.init({
        appId  : '179663705425430',
        status : true, 
        cookie : true, 
        xfbml  : true  
      });
      
       FB.Event.subscribe('auth.sessionChange', function(response) {
            if (response.session) {
              // el usuario esta logeado, se procesa su login en la plataforma
                window.location="<?php echo url_for('@facebook_connect',true); ?>";
            } else {
              // no hay sesion de facebook, retornar al home
                window.location="<?php echo url_for('@sf_guard_signout',true); ?>";
            }
          });
    </script>
    <?php echo $sf_content ?>
  </body>
</html>
