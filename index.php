<?php
// 1. Connect to Database Server
$link = mysql_connect('localhost', 'root', 'mysql');
if(!$link) {
	die('Could not connect : '.mysql_error());
}
// 2. Choose Database
mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
if(!empty($_GET['id'])) {
	$sql = "SELECT * FROM topic WHERE id = ".$_GET['id'];
	$result = mysql_query($sql);
	$topic = mysql_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<style type="text/css">
			body {
                font-size: 0.8em;
                font-family: dotum;
                line-height: 1.6em;
            }
          body.black {
                background-color: black;
                color: white;
            }
          body.black a {
                color: white;
            }
          body.black a:hover {
                color: #f60;
            }
          body.black header {
                border-bottom: 1px solid #333;
            }
          body.black nav {
                border-right: 1px solid #333;
            }
          header {
                border-bottom: 1px solid #ccc;
                padding: 20px 0;
            }
          #toolbar {
                padding: 10px;
                float: right;
            }
          nav {
                float: left;
                margin-right: 20px;
                min-height: 500px;
                border-right: 1px solid #ccc;
            }
          nav ul {
                list-style: none;
                padding-left: 0;
                padding-right: 20px;
            }
          article {
                float: left;
            }
          footer {
                clear: both;
            }
          a {
                text-decoration: none;
            }
          a:link, a:visited {
                color: #333;
            }
          a:hover {
                color: #f60;
            }
          h1 {
                font-size: 1.4em;
            }
          .description{
                width:500px;
            }
		</style>
	</head>
	
	<body id="body">
		<div>
			<header>
				<h1>JavaScript</h1>
			</header>
			<div id="toolbar">
				<input type="button" value="black" onclick="document.getElementById('body').className='black'" />
				<input type="button" value="white" onclick="document.getElementById('body').className='white'" />
			</div>
			<nav>
				<ul>
					<?php
					$sql="SELECT id, title FROM topic";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result)) {
						echo "
						<li>
							<a href=\"?id={$row['id']}\">{$row['title']}</a></li>";
					}
					?>
				</ul>
			</nav>
			<article>
				<?php
				if(!empty($topic)) {
				?>
				<h2><?=$topic['title']?></h2>
				<div class="description">
					<?=$topic['description']?>
				</div>
				<?php
				}
				?>
			</article>
		</div>
	</body>
</html>