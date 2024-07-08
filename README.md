## 💬 Introduction

---

Develop an interactive quiz website that utilizes web forms, manipulates strings and arrays, and validates/handles user input and text files for storing and retrieving quiz information. Quiz results by user are stored in session. 

## 📚 Tech Stack

---

`PHP`, `jQuery`

## 🔨 Requirements

---

### Design Requirements

The website should provide interfaces for:

- Inputting a nickname and presenting a menu with options (Quiz topics, Leaderboard, Exit);
- Showing a quiz consisting of 5 questions (One question per page);
- Navigating through questions using ‘next’ and ‘previous’ buttons;
- Displaying the quiz results and the total points for the current attempt;
- Viewing a 'Leaderboard' where players with their points are listed by nickname or highest score;
- Displaying the user’s nickname and total points (from all previous and current attempts) upon quiz completion (for the “Exit” option);
- Restarting the quiz.

### Functional Requirements

- Users must be able to enter a nickname at the start of an attempt;
- Users must be able to select different quiz topics at the beginning and after each quiz;
    - Topics: “Singapore History”, “Singapore Geography”
    - Questions: From 10 questions in question pool, 4 choices of MCQs and short-answer questions will be picked randomly
- Users must be able to navigate between questions during a quiz;
- Users can take unlimited quizzes in one attempt and see the results and total points for the current attempt after each quiz;
    - Points:  `[The number of correct questions] * 5 – [The number of incorrect questions] * 3`
- Users can check their total points at the end of an attempt and view the 'Leaderboard';
- Users should have the option to “Exit” and start a new attempt both at the beginning and end of a quiz.

## 🧑🏼‍💼 Collaboration

---

First, we extracted the requirements from the client's provided information and organized them in the format shown above. We then met with other team member at a scheduled time to compare our notes and fill in any gaps, resulting in the requirements listed above. Next, we sketched a simple wireframe on a whiteboard to discuss the necessary screens, their relationships, and navigation order. Based on this, we divided the functionality by screen and aimed to complete our assigned tasks one week before the submission deadline. We then reviewed each other’s implemented features.

During the review, we prioritized extracting repeated elements, such as parts displaying questions, into functions. We also created separate files for commonly displayed components like the footer and header. Looking back, we realize that repeated structures, such as displaying choices, could have been handled using loops to simplify the code.

## 🏹 Challenges

---

The most memorable challenge was meeting the requirement to hide the ‘Next’ and ‘Previous’ buttons on the first and last pages, respectively. Using only PHP made it difficult to dynamically manage page content. Initially, I attempted to use JavaScript, which enables dynamic functionality on the web, but found it challenging to precisely manipulate DOM elements. Seeking a better solution, I discovered jQuery. By using jQuery, I implemented functionality to show or hide buttons based on the presence of an `active` class by executing predefined functions each time a button was clicked.

## 🪞 Reflection

---

I had heard that PHP is great for creating simple websites, and after learning Spring, I completely agree with this. Since PHP involves inserting dynamic elements into an HTML structure, it can be challenging to organize and systematically manage the website. However, PHP is easy to learn, making it very suitable for building basic websites.

In this assignment, instead of just learning PHP theoretically, I had the opportunity to internalize it through practical exercises. Even though it wasn't a large-scale project, it was my first experience collaborating, where we divided tasks and worked together, leading to meaningful experiences in writing better code.

## 💬 소개

---

웹 폼을 활용하고 문자열 및 배열을 조작하며, 사용자 입력을 검증 및 처리하는 인터랙티브 퀴즈 웹사이트를 개발했습니다. 또한, 퀴즈 정보를 저장하고 검색하기 위해 텍스트 파일을 사용하며, 사용자의 점수 결과는 세션에 저장했습니다.

## 📚 사용 기술

---

`PHP`, `jQuery`

## 🔨 요구 사항

---

### 디자인 요구 사항

웹사이트는 다음과 같은 인터페이스를 가져야 한다:

- 닉네임 입력 및 메뉴 (퀴즈 주제, 리더보드, 종료) 옵션 제공
- 5개의 질문이 있는 퀴즈 표시 (페이지 당 하나의 질문)
- '다음' 및 '이전' 버튼을 통해 질문 탐색
- 현재 시도에서 퀴즈 결과 및 전체 점수 표시
- '리더보드'에서 플레이어 목록(사용자-점수)을 닉네임이나 최고 점수로 표시하는 옵션
- 시도가 완료되면 사용자의 별명과 누적 점수(모든 이전 및 현재 시도의 총합)를 표시 (’종료’ 버튼을 클릭)
- 퀴즈는 다시 시작 가능

### 기능 요구 사항

- 사용자는 닉네임을 입력할 수 있어야 한다 (시작 시)
- 사용자는 다양한 주제를 선택할 수 있어야 한다 (시작 시 및 모든 퀴즈 제출 후)
- 주제: “Singapore History”, “Singapore Geography”
- 문제: 저장된 10개의 문제 중 4개의 객관식, 1개의 주관식이 무작위로 선택된다
- 사용자는 퀴즈 중에 문제 사이를 탐색할 수 있어야 한다
- 사용자는 한 시도 내에서 무제한으로 퀴즈를 풀 수 있으며, 제출 후에 퀴즈 결과와 점수를 볼 수 있어야 한다
- 점수: [맞은 개수] * 5 – [틀린 개수] * 3
- 사용자는 "종료" 시 누적 점수를 확인할 수 있으며, '리더보드'를 볼 수 있어야 한다
- 사용자는 "종료" 옵션을 통해 퀴즈 시작과 끝에서 새 시도를 시작할 수 있어야 한다

## 🧑🏼‍💼 협업 과정

---

우선 주어진 클라이언트의 상황 설명을 바탕으로 요구 사항을 위와 같은 형식으로 추려낸 후 이를 다른 팀원과 정해진 시간에 만나 서로 비교하면서 부족한 점은 보완하며 정리했습니다. 그 결과가 위에 보이는 요구 사항입니다. 이후 필요한 화면을 구성하기 위해 칠판에 wireframe을 간단하게 그리고 화면들의 관계, 이동 순서 등을 표현하며 토의하는 시간을 가졌습니다. 이를 토대로 화면 별로 기능을 나누긴 했지만 각자 맡은 기능 구현을 제출 1주 전까지 완료하고 서로가 구현한 기능을 리뷰하는 시간을 가졌습니다.
기능을 리뷰할 때는 문제를 보여주는 부분 등 반복되는 부분을 함수로 추출하는 작업을 최우선적으로 진행했습니다. 매 페이지에 공통적으로 보여줘야 하는 footer와 header는 아예 독립적인 파일로 만들었습니다. 지금 다시 돌이켜보니 반복되는 구조 예를 들면 선지를 보여주는 부분은 반복문으로 처리해서 출력해도 되지 않았을까 싶습니다.

## 🏹 어려웠던 점

---

‘다음’, ‘이전’ 버튼을 각각 첫번째, 마지막 페이지에는 보이지 않도록 하는 요구사항을 해결하는 문제가 가장 기억에 남습니다. PHP 자체 기술만을 활용해서는 페이지를 동적으로 구성하기에 어려웠던 문제가 있었습니다. 이를 위해 처음에는 웹에서 동적인 기능을 가능하게 하는 JavaScript를 사용해보려 시도했으나 DOM을 구성하는 요소들을 세밀하게 접근하는데 어려움이 있었습니다. 좀 더 나은 방법은 없을까 찾아본 결과는 jQuery였습니다. 버튼을 클릭할 때마다 지정해둔 함수를 실행시켜 클래스 이름에 `active` 유무로 버튼을 보이거나 보이지 않게 구현했습니다. 

## 🪞 회고

---

PHP는 간단한 웹사이트를 구성하기에 좋다는 이야기를 들었는데 Spring을 배우고 다시 보니 이 이야기가 너무나도 공감됐습니다. 애초에 HTML을 기반으로 그 사이에 동적으로 구성할 수 있는 PHP 요소를 삽입하는 것이기 때문에 구조를 잡기가 매우 어렵고 웹 사이트를 구성 후 체계적으로 관리하기가 힘든 것입니다. 하지만 PHP는 배우기가 쉽다는 장점으로 기초적인 웹 사이트를 만들 때는 아주 적합한 용도로 사용될 수 있었습니다.
이번에도 PHP를 이론 그 자체로만 배우는 것이 아닌 과제 실습을 통해 채화하는 시간을 가졌습니다. 그리고 규모가 큰 프로젝트는 아니었지만 처음 협업하는 과정에서 일을 분배하는 과정 그리고 더 나은 코드를 짜기 위한 의미 있는 경험을 했습니다.