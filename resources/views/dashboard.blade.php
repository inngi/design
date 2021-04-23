  <x-app-layout>


      <style>
          * {
              margin: 0;
          }

          .box1 {
              /* background-color: #2e2e2e; */
          }

          .box2 {
              background-color: rgb(36, 7, 7);
          }

          .box3 {
              background-color: red;
          }


          main {
              display: grid;
              height: calc(100vh - 64px);
              /* grid-template-columns: repeat(3,300px); */
              /* grid-template-columns: repeat(auto-fill,300px); */
              /* grid-template-columns: repeat(auto-fit,300px); */
              /* grid-template-columns: repeat(auto-fit,minmax(300px, 1fr)); */
              grid-template-columns: 18vw 82vw;
              grid-template-rows: 1fr;
              /* grid-column-gap:20px; */
              /* grid-row-gap:20px; */
              grid-template-areas: "box1 box2";
              /* justify-items: center;
        align-items: center; */
          }

          .box1 {
              grid-area: box1;
              color: black;
              font-weight: bold;
              text-align: right;
              padding-top: 60px;
              margin-left: auto;
              margin-right: auto;
          }

          .box1 h1 {
              margin-bottom: 10px;
          }

          .box1 ul li {
              margin-bottom: 30px;
              text-transform: capitalize;
          }

          .box1 ul li a {
              padding: 7px;
              border-radius: 5px;

          }

          .box1 ul li a:hover {
              background-color: orange;
              color: white
          }

          .box2 {
              grid-area: box2;
              color: white;
              padding-top: 60px;
              font-weight: bold;
              padding-left: 30px;
          }

          .box3 {
              grid-area: box3;
          }

      </style>
      <main>
          <div class="box1">
              {{-- <h1>대시보드</h1> --}}
              <ul>
                  <li><a href="#">profile</a></li>
                  <li><a href="#">password</a></li>
                  <li><a href="#">settings</a></li>
                  <li><a href="/admin/category/create">category</a></li>
                  <li><a href="#">users</a></li>
                  <li><a href="#">logout</a></li>
              </ul>
          </div>
          <div class="box2">
              <h1>box2</h1>
          </div>
          {{-- <div class="box3"><h1>box3</h1></div> --}}
      </main>

  </x-app-layout>
