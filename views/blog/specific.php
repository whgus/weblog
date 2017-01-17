<?php $this->setPageTitle('title', $status['user_id'])?>
<?php print $this->render('blog/status',array('status'=>$status));?>