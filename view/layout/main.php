<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>应用管理</title>
	<link rel="stylesheet" href="/apps/static/css/foundation.min.css">
	<link rel="stylesheet" href="/apps/static/css/apps.css">
	<script src="/apps/static/js/vendor/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="/apps/static/js/foundation.min.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
	<div id="header">
		<div id="logo-container"></div>
		<div id="head-title">
			<p>用户中心应用管理</p>

            <div class="right">
                <a class="button tiny alert" href="/apps/index.php?r=user/logout">登出</a>
            </div>
		</div>
	</div>
	<div class="row">
		
		<div id="sider" class="small-12 medium-4 large-2 columns">
			<div class="side-unit">
				<span>应用管理</span>
				<ul class="side-nav">
					<li><a href="/apps/index.php?r=app/list">应用列表</a></li>
					<li><a href="/apps/index.php?r=app/add">添加应用</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
				</ul>
			</div>
			<div class="side-unit">
				<span>用户管理</span>
				<ul class="side-nav">
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
				</ul>
			</div>
		</div>
		<div id="main-container" class="small-12 medium-8 large-10 columns">
			<?php /** @var $content string*/ echo $content; ?>
		</div>
	</div>

    <hr/>

	<div class="row large-text-center" id="footer">
        <p>用户管理 @ zplay.cn</p>
    </div>

	<script type="text/javascript">
	jQuery(function($) {
		$('.side-unit').click(function(event) {
			var childNav = $(this).children('.side-nav');
			var navDisplay = childNav.is(':hidden');
			$('.side-nav').slideUp();
			if (navDisplay) {
				childNav.slideDown();
			} else {
				childNav.slideUp();
			}
		})

        // auto open sidebar
            var choosedLink = $('a[href$="'+ location.search + '"]').first();
        choosedLink.parent().parent().click();
        choosedLink.css('background-color', '#eee');
	});
	</script>
</body>
</html>