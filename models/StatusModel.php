<?php 
class StatusModel extends ExecuteModel {
  public function insert($user_id, $message){
    $now = new DateTime(); //������ �Ͻ�

    $sql = "INSERT INTO status(user_id, message, time_stamp)
            VALUES(:user_id, :message, :time_stamp)";

    $stmt = $this->execute($sql,
    array(':user_id' => $user_id,
          ':message' => $message,
          ':time_stamp' => $now->format('Y-m-d H:i:s'),
        ));              
  }
  // *** getUserData()***
  public function getUserData($user_id){
    $sql = "SELECT a.*, u.user_id
              FROM status a LEFT JOIN user u ON a.user_id = u.id
                  LEFT JOIN followingUser f ON f.following_id = a.user_id
                     AND f.user_id =:user_id  
              WHERE f.user_id = :user_id OR u.id = :user_id
              ORDER BY a.time_stamp DESC";
          $user = $this->getAllRecord($sql,array(':user_id'=>$user_id));
          return $user;
  }

  // *** getPostedMessage()***
  public function getPostedMessage($user_id) {
    $sql = "SELECT a.*,u.user_id
            FROM status a LEFT JOIN user u ON a.user_id = u.id
            WHERE u.id = :user_id
            ORDER BY a.time_stamp DESC";

        $postMsg = $this->getAllRecord($sql,array(':user_id'=> $user_id));
        return $postMsg;
   }

   /// ***getSpecificMessage()***
   public function getSpecificMessage($id,$user_id) {
     $sql = "SELECT a.*,u.user_id
             FROM status a LEFT JOIN user u ON u.id = a.user_id
             WHERE a.id = :id AND u.user_id = :user_id";
     $specMsg = $this->getRecord($sql,
                array(':id'=> $id,':user_id'=> $user_id));
      return $specMsg;    
   }
}
?>