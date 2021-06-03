# 홈페이지 솔루션
## 디자인만 신경쓰던 기존의 홈페이지를 벗어나 좋은 성능과 쉬운 유지보수를 위한 홈페이지를 만듭니다.
## 장점
* 프레임워크를 사용하지 않았기 때문에 빠른 속도를 자랑합니다.
* 자체적인 코딩스타일을 적용하여 코드분석이 용이하며, php 개발자라면 누구나 쉬운 수정이 가능합니다.
* php언어로 가능한 모든 기능을 자유롭게 추가할 수 있습니다.
* 최신버전은 물론 낮은버전의 php환경에도 동작하게 설계되었습니다.
## 요구사항
* php 5.2 이상
* mysql 5.1 이상
## 설치방법
1. 소스 다운로드 및 서버에 업로드
2. inc/config.php 파일 수정
    - db 정보 및 테이블 접두어 설정(기본값 ukp_)
    - mysql 5.1 ~ 5.5.2 인경우 utf8 또는 euckr(MyISAM), 5.5.3 이상인경우 utf8mb4(InnoDB) 설정
    - 로그 저장경로 및 임시파일 저장경로는 웹접근 불가한곳에 설정 권장
    - 로그, 임시파일, public/upload 폴더권한 777로 설정
3. install.php 접속 또는 실행 후 테이블 생성 확인
4. admin.php 접속후 설정 마무리(id: admin, pw: 1234)
    - 메일전송은 gmail smtp를 사용하며, smtp가 차단되지 않도록 구글계정설정 필요함
5. php 8 버전을 사용하는 경우
    - 컴포저로 라이브러리 설치, inc/ukp.php 파일에서 phpexcel 함수 주석 제거
    - _email_check.php, _email_find_check.php 추가수정(추후 개선)
## 데모페이지
* 사용자: <http://ukp9131.cafe24.com/homepage_solution/html>
* 관리자: <http://ukp9131.cafe24.com/homepage_solution/admin>