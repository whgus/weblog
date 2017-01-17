<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8' />
    <!-- 각 action에 따른 views폴더내의 view파일들에서 설정하여 보내줌-->
    <title>
        <?php if (isset($title)): print $this->escape($this).'-'; endif; ?>
        WebShop
    </title>
    <!-- { endfor; endwhile; endswitch; endforeach;} -->
    <link href="/css/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/css/lib/bootstrap/js/bootstrap.min.js"></script>
    <style>
        body{
            padding-top:30px;
        }
        .form_control{
            padding-top:20px;
        }
    </style>
</head>
<body>
<!--  상단 소개 메뉴바  -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header" >
                <a class="navbar-brand" href="<?php print $base_url; ?>/">
                    <img alt="Brand" src="/img/main_title.jpg" width="110px">
                </a>
                <p class="navbar-text">94Line ShoppingMall</p>
            </div>
        </div>
    </nav>

    <ol class="breadcrumb",position="fixed" >
        <li><a href="<?php print $base_url; ?>/">Home</a></li>
        <li><a href="<?php print $base_url; ?>/item?cate=man">Man's Clothing</a></li>
        <li><a href="<?php print $base_url; ?>/item?cate=woman">Woman's Clothing</a></li>
        <li><a href="<?php print $base_url; ?>/item?cate=scarf">Scarf</a></li>
        <li><a href="<?php print $base_url; ?>/item?cate=wallet">Wallet</a></li>
        <li><a href="<?php print $base_url; ?>/item?cate=perfume">Perfume</a></li>
        <li><a href="<?php print $base_url; ?>/item?cate=shoes">Shoes</a></li>
        <li><a href="<?php print $base_url; ?>/item?cate=free">FreeBoard</a></li>
        <li class="active">개인 정보</li>
        <?php if ($session->isAuthenticated()): ?>
            <li>
                <a href="<?php print $base_url; ?>/">
                    Top Page
                </a>
            </li>
            <li>
                <a href="<?php print $base_url; ?>/account">
                    계정 정보
                </a>
            </li>
        <?php else: ?>
            <li>
                <a href="<?php print $base_url; ?>/account/signin">
                    로그인
                </a>
            </li>
            <li>
                <a href="<?php print $base_url; ?>/account/signup">
                    계정 등록(회원가입)
                </a>
            </li>
        <?php endif; ?>
    </ol>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="/img/man_introduce.mp4"></iframe>
            </div>
            <div id="main">
                <?php print $_content; ?>
                <!-- $_content: View 객체의 render()메서드에서 전달해줌 -->
            </div>
        </div>
    </div>

</body>
</html>