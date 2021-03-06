<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
<head>
    <meta charset="UTF-8">
    <title>发布新闻</title>
</head>
<body>
<br>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="index.php">Home</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
            <li class="active">
							 <a href="addNews.php">发布新闻</a>
						</li>
						<li >
							<a href="searchNews.php">查找新闻</a>
						</li>
            <li >
              <a href="manageNews.php">管理新闻</a>
            </li>
            <?php session_start();
            if (isset($_SESSION['permission'])){
              if($_SESSION['permission']==1){
                echo "
                <li>
    							<a href=\"manageComments.php\">管理评论</a>
    						</li>";
              }
            }
             ?>
					</ul>
					<form class="navbar-form navbar-right" role="search" action="searchNews.php" method="POST">
            <?php
              if(isset($_SESSION['id'])){
              echo $_SESSION['name'];
              echo "&emsp;&emsp;<a href=\"logout.php\">注销</a>";
            }else{
              echo "<a href=\"login.php\">登录</a>";
              echo "&emsp;&emsp;&emsp;";
              echo "<a href=\"register.php\">注册</a>";
            }?>
            <div class="form-group">
							<input type="text" class="form-control" name="key"/>
						</div> <button type="submit" class="btn btn-default">Search</button>
					</form>
				</div>

			</nav>
	<div class="jumbotron">
				<h1>
					Hello, world!
				</h1>
				<p>
					This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
				</p>
				<p>
					 <a class="btn btn-primary btn-large" href="#">Learn more</a>
				</p>
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-3 column">
		</div>
		<div class="col-md-6 column">
			<form role="form" action="addAction.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					 <label for="exampleInputPassword1">Title</label><input type="text" name="title" class="form-control" id="exampleInputPassword1" />
				</div>
				<div class="form-group">
					 <label for="exampleInputFile">File input</label><input type="file" name="file" id="file" />
					<p class="help-block">
						请选择txt文件
					</p>
				</div>
				<div class="checkbox">
					 <label><input type="checkbox" />Check me out</label>
				</div> <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
		<div class="col-md-3 column">
		</div>
	</div>
</div>
</body>
</html>
