<div class="form-group">
    <label class="sr-only" >UserID</label>
    <input type="text" class="form-control" name="user_id" placeholder="User ID"
           value="<?php echo $this->escape($user_id); ?>" />
</div>
<div class="form-group">
    <label class="sr-only" >Password</label>
    <input type="password" class="form-control" name="user_pass" placeholder="Password"
           value="<?php echo $this->escape($user_pass); ?>" />
</div>

<!-- 아이디 비밀번호, 비밀번호 확인, 닉네임, 주소, 배송지, 휴대폰, 이메일 -->