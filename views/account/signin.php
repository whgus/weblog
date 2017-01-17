<!-- 39페이지 -->

<?php $this->setPageTitle('title', '로그인') ?>
<h2>로그인</h2>
<!-- AccountController의 authenticateAction 메소드 -->
<form class="form-inline" action="<?php print $base_url; ?>/account/authenticate" method="post">
    <input type="hidden" name="_token" value="<?php print $this->escape($_token); ?>" />
    <!-- /views/errors.php를 Rendering -->
    <?php if(isset($errors) && count($errors) > 0): ?>
        <?php print $this->render('errors', array('errors' => $errors)); ?>
    <?php endif; ?>
    <!-- /views/account/inputs.php를 Rendering -->
    <?php print $this->render('account/inputs', array('user_id' => $user_id, 'user_pass' => $user_pass,)); ?>


    <input type="submit" class="btn btn-default" value="로그인"></input>
<!--    <p>-->
<!--        <input type="submit" value="로그인" />-->
<!--    </p>-->
</form>
