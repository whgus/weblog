<?php
class UserModel extends ExecuteModel {
  // **insert()***
  //http://php.net/manual/kr/function.password-hash.php
  //패스워드의 해쉬 처리 : 암호화
  //http://php.net/manual/kr/datetime.format.php
  //DateTime::format
  public function insert($user_id, $user_pass) {
    $user_pass = password_hash($user_pass, PASSWORD_DEFAULT);
    $now = new DateTime();
    $sql = "INSERT INTO user(user_id, user_pass, time_stamp)
    VALUES(:user_id, :user_pass, :time_stamp)";
    $stmt = $this->execute($sql, array(
      ':user_id' => $user_id,
      ':user_pass' => $user_pass,
      ':time_stamp' => $now->format('Y-m-d H:i:s'),
    ));

    // execute(); 추상 클래스 ExecuteModel의 메소드
  }

  // ***getUserRecord() ***
  public function getUserRecord($user_id) {
    $sql = "SELECT *
          FROM user
          WHERE user_id = :user_id";

          $userData = $this->getRecord(
                      $sql,
                      array(':user_id' => $user_id));

   // getRecord(); 추상 클래스 ExecuteModel의 메소드

    return $userData;
  }

  // ***isOverlapUserName() ***
  public function isOverlapUserName($user_id) {
    $sql = "SELECT COUNT(id) as count
            FROM user
            WHERE user_id = :user)id";

    $row = $this->getRecord(
            $sql,
            array(':user_id' => $user_id));
    if($row['count']==='0') { // $user_id의 유저가 미동륵이면
        return true;
      }
      return false;
    }

  // *** getFollowingUser() ***
  public function getFollowingUser($user_id){
    $sql = "SELECT u.*
          FROM user u
          LEFT JOIN followingUser f ON f.following_id = u.id
          WHERE f.user_id = :user_id";

  $follows = $this->getAllRecord(
              $sql,
              array(':user_id' => $user_id));
      return $follows;
    }
  }
?>
