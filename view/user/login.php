<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>应用管理</title>
	<link rel="stylesheet" href="/apps/static/css/foundation.min.css">
	<link rel="stylesheet" href="/apps/static/css/apps.css">
	<!-- <script src="/apps/static/js/vendor/jquery.js" type="text/javascript" charset="utf-8"></script> -->
	<!-- <script src="/apps/static/js/foundation.min.js" type="text/javascript" charset="utf-8" async defer></script> -->

	<style type="text/css" media="screen">
		#main-div { margin: 200px auto;}
		/*#user-login-form { margin-top: 200px;}*/
	</style>
</head>
<body>
	<div id="header">
		<div id="logo-container"></div>
	</div>
    <div class="row" id="main-div">
        <div id="head-title" class="text-center">
            <p>用户登录</p>
        </div>
        <div id="main-container" class="small-12 columns">
			<form method="post" action="/apps/index.php?r=user/login" id="user-login-form">
			  <div class="row text-center">
			    <div class="small-12 columns">
			      <div class="row">
			        <!-- <div class="small-3 columns"></div> -->
			        <div class="small-3 columns small-offset-2">
			          <label for="in-username" class="right inline">用户名</label>
			        </div>
			        <div class="small-3 columns left">
			          <input type="text" id="in-username" name="username" placeholder="input username">
			        </div>
			      </div>
			    </div>
			  </div>
			  <div class="row">
			    <div class="small-12 columns">
			      <div class="row">
			        <!-- <div class="small-3 columns"></div> -->
			        <div class="small-3 columns small-offset-2">
			          <label for="in-password" class="right inline">密码</label>
			        </div>
			        <div class="small-3 columns left">
			          <input type="password" id="in-password" name="password" placeholder="input password">
			        </div>
			      </div>
			    </div>
			  </div>
                <div style="height: 30px;"></div>
			  <div class="row">
			    <div class="small-12 columns">
                    <div class="row"></div>
			      <div class="row">
			        <!-- <div class="small-3 columns"></div> -->
			        <div class="small-3 columns small-offset-5">
			          <input type="submit" id="submit-login" name="submit" value="提交" class="button primary small">
			        </div>
			      </div>
			    </div>
			  </div>
		</form>
		</div>
	</div>

    <hr/>

	<div class="row large-text-center" id="footer">
        <p>用户管理 @ zplay.cn</p>
    </div>

	<script type="text/javascript">
	</script>
</body>
</html>