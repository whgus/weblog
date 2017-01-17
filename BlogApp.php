<?php
class BlogApp extends AppBase {

  protected $_signinAction = array('account', 'signin');

  //DB접속 실행
  protected function doDbConnection() {
    $this->_connectModel->connect('master', //접속이름
    array(
      'string'    => 'mysql:dbname=weblog;host=localhost;charset=utf8',  //DB이름 - weblog
      'user'      => 'root',                                            //DB사용자명
      'password'  => '1234',                                             //DB사용자의 패스워드
    ));
  }//doDbConnection - function

  //Root Directory 경로를 반환
  public function getRootDirectory() {
    return dirname(__FILE__); //BlogApp.php가 저장되어 있는 디렉토리
    //http://php.net/menual/en/function.dirname.php
  }//getRootDirectory - function

  //Blog APP에서 사용되는 Controller, Action
  //Contorller  - action    - path정보                    - 내용
  //1)account   - index     - /account                    - 계정 정보의 톱페이지
  //2)account   - signin    - /account/:action            - 로그인
  //3)account   - signout   - /account/:action            - 로그아웃
  //4)account   - signup    - /account/:action            - 계정등록
  //5)account   - follow    - /follow                     - 계정등록(회원가입)
  //6)blog      - index     - /                           - 블로그의 톱페이지
  //7)blog      - post      - /status/post                - 글작성
  //8)blog      - user      - /user/:user_name            - 사용자 작성글 일람
  //9)blog      - specific  - /user/:user_name/status/:id - 작성글의 상세보기


  //Routiong 정의를 반환
  protected function getRouteDefinition() {
    return array(

      //AccountController클래스 관련 Routing
      '/account'          => array('controller' => 'account', 'action' => 'index'),
      '/account/:action'  => array('controller' => 'account'),
      '/follow'           => array('contorller' => 'account', 'action' => 'follow'),

      //BlogController 클래스 관련 Routing
      '/'                           => array('controller' => 'blog', 'action' => 'index'),
      '/status/post'                => array('controller' => 'blog', 'action' => 'post'),
      '/user/:user_name'            => array('controller' => 'blog', 'action' => 'user'),
      '/user/:user_name/status/:id' => array('controller' => 'blog', 'action' => 'specific')

    );

  }//getRouteDefinition - function

}//BlogApp -class

 ?>
