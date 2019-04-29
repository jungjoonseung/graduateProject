<?php
function print_title(){
  if(isset($_GET['id'])){
    echo $_GET['id'];
  } else {
    echo "Welcome";
  }
}
function print_description(){
  if(isset($_GET['id'])){
    echo file_get_contents("premierdata/".$_GET['id']);
  } else {
    echo "Hello, PHP";
  }
}
function print_list(){
  $list = scandir('./premierdata');
  $i = 0;
  while($i < count($list)){
    if($list[$i] != '.') {
      if($list[$i] != '..') {
        echo "<li><a href=\"premiertalk.php?id=$list[$i]\">$list[$i]</a></li>\n";
      }
    }
    $i = $i + 1;
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      <?php
      print_title();
      ?>
    </title>
    <style>
    #grid{
      border:5px solid pink;
      display:grid;
      grid-template-columns: 150px 1fr;
    }
    div{
      border:1px solid gray;
    }
    h1 {
      font-size:45px;
      text-align: center;
      border-bottom:1px solid gray;
      margin:0;
      padding:20px;
    }
    </style>
  </head>
  <body>
  <h1><a href="index.html"><img src="epl.jpg" width="100%" height=350;></a></h1>
  <div id="grid">
  <ol>
    <?php
    print_list();
    ?>
  </ol>
  <div>
  <h2>
    <?php
    print_title();
    ?>
  </h2>
  <h2>
  <?php
  print_description();
   ?>
 </h2>
 <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://premierlpage.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
  </div>
    </body>
    </html>
