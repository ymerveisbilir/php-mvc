


<?php /*
foreach($data['pages'] as $page ):
         print_r($page['name']);
endforeach;*/
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}


/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.page{
         background-color:  #f1f1f1;
}


.page a{
         font-weight: bold;
         color:black;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>
</head>
<body>

<div class="header">
  <h2><?=$data['name']?></h2>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2><?=$data['name']?></h2>
      <h5><?=$data['date']?></h5>
      <div class="fakeimg">
         <img src= "/proje/public/images/<?=$data['image']?>" width="1600px" height="200px">
     </div><br>
      <p><?=$data['content']?></p>
    </div>

  </div>
  <div class="rightcolumn">
  
    <div class="card">
      <h3>Popular Page</h3><br>
      <?php 
      foreach($data['pages'] as $page):
         ?><div class="page"><a href="<?=$page['slug']?>"><?=$page['name']?></a></div><br><?php
      endforeach;
      ?>
    </div>

  </div>
</div>



</body>
</html>
