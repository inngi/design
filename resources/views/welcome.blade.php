<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('main page') }}
        </h2>
    </x-slot>
    {{-- 장 템플릿

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5"></p>
                    <p class="text-xl py-2"></p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

     code template

    <div class="rounded-md w-1/2 py-3 bg-black text-white">
        <p class="px-5 text-xl py-2">
        </p>
        <p class="px-5 text-xl py-2">
        </p>
        <p class="px-5 text-xl py-2">
        </p>
    </div> --}}
    {{-- 1장 개요 --}}
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">1. 개요</p>
                    <div class="md:flex">
                        <div class=" md:w-1/2">
                            <p class="text-lg text-green-500">## Frontend Features</p>
                            <ul class="list-decimal list-inside">
                                <li>홈페이지 / 최근 글</li>
                                <li>포스팅 디테일 / 댓글</li>
                                <li>사이드바(right)
                                    <ul class="list-disc list-inside">
                                        <li>검색옵션</li>
                                        <li>5 최근 포스팅</li>
                                        <li>5 인기글</li>
                                        <li>5 최근 댓글</li>
                                        <li>관리자 옵션</li>
                                    </ul>
                                </li>
                                <li>게스트 포스팅 (approved by Admin)</li>
                                <li>유저 대시보드
                                    <ul class="list-disc list-inside">
                                        <li>업데이트 프로파일</li>
                                        <li>비밀번호 변경</li>
                                        <li>비밀번호 찾기</li>
                                        <li>내 글</li>
                                        <li>내 댓글</li>
                                    </ul>
                                </li>
                                <li>about us 페이지</li>
                                <li>contact us 페이지</li>
                            </ul>

                        </div>
                        <div class="py-10 md:py-0 md:w-1/2">
                            <p class="text-lg  text-green-500">## Backend Features</p>
                            <ul class="list-decimal list-inside">
                                <li>관리자 로그인</li>
                                <li>포스트 카테고리 관리</li>
                                <li>포스트 관리
                                    <ul class="list-disc list-inside">
                                        <li>포스트 제목</li>
                                        <li>포스트 내용</li>
                                        <li>포스트 카테고리</li>
                                        <li>포스트 태그</li>
                                        <li>포스트 썸네일</li>
                                        <li>포스트 이미지</li>
                                    </ul>
                                </li>
                                <li>댓글관리 (댓글 자동허용 / 허가)</li>
                                <li>사용자 관리 (사용자 허용 / 퇴출)</li>
                                <li>설정
                                    <ul class="list-disc list-inside">
                                        <li>댓글 자동허용 / 허가</li>
                                        <li>사용자 자동등록 / 불허</li>
                                        <li>(숫자 관리)최근 포스팅 / 인기 포스팅 / 최근 댓글</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- 2장 설치 --}}
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">2. 설치</p>
                    <p class="text-xl py-2">1. 라라벨 app 설치</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            composer create-project laravel/laravel example-app
                        </p>
                        <p class="px-5 text-xl py-2">
                            cd example-app
                        </p>
                        <p class="px-5 text-xl py-2">
                            php artisan serve
                        </p>
                    </div>


                    <p class="text-xl py-2">2. DATABASE 설정 및 .env 파일 수정</p>

                    <p class="text-xl py-2">3. Starterkit 설치 (breeze / tailwind css)</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan migrate
                        </p>
                        <p class="px-5 text-xl py-2">
                            composer require laravel/breeze --dev
                        </p>
                        <p class="px-5 text-xl py-2">
                            php artisan breeze:install
                        </p>
                        <p class="px-5 text-xl py-2">
                            npm install && npm run dev
                        </p>
                    </div>


                    <p class="text-xl py-2">4. Laratrust / Laratrust Seeder</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            composer require santigarcor/laratrust
                        </p>
                        <p class="px-5 text-xl py-2">
                            php artisan vendor:publish --tag="laratrust"
                        </p>
                        <p class="px-5 text-xl py-2">
                            php artisan laratrust:setup
                        </p>
                        <p class="px-5 text-xl py-2">
                            composer dump-autoload
                        </p>
                        <p class="px-5 text-xl py-2">
                            php artisan migrate
                        </p>
                        <p class="px-5 text-xl py-2">
                            php artisan laratrust:seeder
                        </p>
                        <p class="px-5 text-xl py-2">
                            php artisan vendor:publish --tag="laratrust-seeder"
                        </p>
                        <p class="px-5 text-xl py-2">
                            composer dump-autoload
                        </p>
                    </div>
                    <p class="text-xl py-2">5. database/seeders/DatabaseSeeder.php 수정<br>run() 함수 수정<br>user role은
                        config/laratrust_seeder.php 에서 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            $this->call(LaratrustSeeder::class);
                        </p>
                    </div>
                    <div class="rounded-md w-1/2 mt-3 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan db:seed
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- 3장 홈컨트롤러 --}}
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">3. Controller</p>

                    <p class="text-xl py-2">HomeController 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan make:controller HomeController
                        </p>
                    </div>
                    <p class="text-xl py-2">HomeController 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public function home(){
                            return view('home');
                            }
                        </p>
                    </div>
                    <p class="text-xl py-2">web.php 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            Route::get('/home', [HomeController::class, 'home']);
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- 4장 --}}
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">4. Database Tables / Model 생성</p>
                    <p class="text-xl py-2">Database:User / Category / Post / Comments</p>
                    <p class="text-xl py-2">Model:User / Category / Post / Comments</p>
                    <p class="text-xl py-2">User Database/Model은 migrate시 default 로 생성됨</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan make:model Category -m
                        </p>
                    </div>
                    <p class="text-xl py-2">database/migrations/create_categories_table 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public function up()<br>
                            {<br>

                            Schema::create('categories', function (Blueprint $table) {<br>
                            $table->id();<br>
                            $table->string('title');<br>
                            $table->string('detail',300);<br>
                            $table->string('image');<br>
                            $table->timestamps();<br>
                            });<br>
                            }
                        </p>
                    </div>
                    <div class="mt-5 rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan migrate
                        </p>
                    </div>
                    <p class="text-xl py-2">Post table / model 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan make:model Post -m
                        </p>
                    </div>
                    <p class="text-xl py-2">database/migrations/create_posts_table 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            $table->integer('user_id');<br>
                            $table->integer('cat_id');<br>
                            $table->string('title');<br>
                            $table->string('thumb');<br>
                            $table->string('full_img');<br>
                            $table->string('detail');<br>
                            $table->string('tags');<br>
                        </p>
                    </div>
                    <div class="mt-5 rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan migrate
                        </p>
                    </div>


                    {{--  --}}
                    <p class="text-xl py-2">comments table / model 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan make:model Comment -m
                        </p>
                    </div>
                    <p class="text-xl py-2">database/migrations/create_comments_table 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            Schema::create('comments', function (Blueprint $table) {<br>
                            $table->id();<br>
                            $table->integer('user_id');<br>
                            $table->integer('post_id');<br>
                            $table->text('comment');<br>
                            $table->timestamps();<br>
                            });
                        </p>
                    </div>
                    <div class="mt-5 rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan migrate
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- 5장 --}}

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">5. AdminController</p>
                    <p class="text-xl py-2"></p>

                    <p class="text-xl py-2">AdminController 생성 / 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">php artisan make:controller AdminController</p>
                        <p class="px-5 text-xl py-2">
                            function login(){<br>
                            return view('backend.login');<br>
                            }
                        </p>
                    </div>
                    <p class="text-xl py-2">backend.login 이므로, backend 폴더 내에 login.blade.php 생성</p>
                    <p class="text-xl py-2"><a class="text-red-500 hover:text-green-500"
                            href="https://github.com/inngi/laravel8/blob/main/login.blade.php">이 코드</a>를 복사 / 붙여넣기</p>


                    <p class="text-xl py-2">Admin model 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan make:model Admin -m
                        </p>
                    </div>
                    <p class="text-xl py-2">database/migrations/create_admins_table 수정(추가)</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            $table->string('username');<br>
                            $table->string('password');
                        </p>
                    </div>
                    <p class="text-xl py-2"></p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan migrate
                        </p>
                    </div>
                    <p class="text-xl py-2">web.php 에 다음 route 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            Route::post('/admin/login', [AdminController::class, 'submit_login']);<br>
                            Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

                        </p>
                    </div>
                    <p class="text-xl py-2">AdminController 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            use App\Models\Admin;
                        </p>
                    </div>
                    <p class="text-xl py-2"></p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            function submit_login(request $request){<br>
                            $request->validate([<br>
                            'username'=>'required',<br>
                            'password'=>'required'<br>
                            ]);<br>
                            $userCheck=Admin::where(['username'=>$request->username,<br>'password'=>$request->password])->count();<br>
                            if($userCheck>0){<br>
                            return redirect('admin/dashboard');<br>
                            }else{<br>
                            return redirect('admin/login')->with('error','아이디와 <br>비밀번호가 일치하지 않습니다.');<br>
                            }<br>
                            }<br>

                            function dashboard(){<br>
                            return view('backend/dashboard');<br>
                            }
                        </p>
                    </div>
                    <p class="text-xl py-2">backend 폴더내에 dashboard.blade.php 파일 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 6장 --}}
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">CategoryController</p>
                    <p class="text-xl py-2">Category의 CRUD 는 웹에서 관리 되기 때문에 resource 형태로 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan make:controller CategoryController -r
                        </p>
                    </div>
                    <p class="text-xl py-2">web.php 추가</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            Route::resource('/admin/category',CategoryController::class);
                        </p>
                    </div>
                    <p class="text-xl py-2">CategoryController 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public function index()<br>
                            {<br>
                            return view('backend.category.index');<br>
                            }
                        </p>
                    </div>
                    <p class="text-xl py-2">Backend/category 폴더 내에 index.blade.php 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public function index()<br>
                            {<br>
                            return view('backend.category.index');<br>
                            }
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- 번외편 laratrust 를 사용한 admin 관리 --}}
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">Laratrust를 사용한 admin/user 관리</p>
                    <p class="text-xl py-2">register page에서 사용자/admin 옵션선택</p>
                    <p class="text-xl py-2">resources/views/auth register.blade.php (<a
                            class="text-red-500 hover:text-green-500"
                            href="https://github.com/inngi/laravel8/blob/main/register.blade.php"
                            target="_blank">다운로드</a>)</p>
                    <p class="text-xl py-2">laratrust / seeder 유저 설정은 config/laratrust_seeder.php에서 수정</p>

                    <p class="text-xl py-2">user role에 따른 다른 대시보드 보이기</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan make:controller DashboardController
                        </p>
                        <p class="px-5 text-xl py-2">
                            Route::group(['middleware'=>['auth']], function(){<br>
                            Route::get('/dashboard', [DashboardController::class, <br>'index'])->name('dashboard');<br>
                            });
                        </p>
                    </div>
                    <p class="text-xl py-2">web.php 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            Route::group(['middleware'=>['auth']], function(){<br>
                            Route::get('/dashboard', [DashboardController::class, <br>'index'])->name('dashboard');<br>
                            });
                        </p>
                    </div>
                    <p class="text-xl py-2">DashboardController 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            use Illuminate\Support\Fascades\Auth;
                        </p>
                    </div>
                    <p class="text-xl py-2 text-red-500">위의 코드가 안될 시,</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            use Auth;
                        </p>
                    </div>
                    <div class="mt-5 rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public function index() <br>
                            {
                            if(Auth::user()->hasRole('user')){<br>
                            return view('userdash');<br>
                            }elseif(Auth::user()->hasRole('administrator')){<br>
                            return view('admindash');<br>
                            }elseif(Auth::user()->hasRole('employee')){<br>
                            return view('dashboard');<br>
                            }
                            }
                        </p>
                    </div>
                    <p class="text-xl py-2">위에서 만든 dashboard 3종을 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            userdash <br>
                            admindash <br>
                            dashboard
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 번외편 laratrust 를 사용한 user별 메뉴 --}}
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">laratrust / seed role 별 메뉴 설정</p>
                    <p class="text-xl py-2">views/layouts/navigation.blade.php 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            골뱅이guest
                            골뱅이else
                            골뱅이if (Auth::user()->hasRole('user'))<br>
                            //사이에 메뉴를 넣어준다.<br>
                            골뱅이endif
                            골뱅이endguest
                        </p>
                    </div>
                    <p class="text-xl py-2">web.php 설정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            Route::group(['middleware'=>['auth','role:user']],function(){<br>
                            Route::get('/dashboard/myprofile',
                            <br>[DashboardController::class,'myprofile'])<br>->name('dashboard.myprofile');<br>
                            });
                        </p>
                    </div>
                    <p class="text-xl py-2">DashboardController 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public function myprofile()<br>
                            {<br>
                            return view('myprofile');<br>
                            }
                        </p>
                    </div>
                    <p class="text-xl py-2">myprofile이란 파일을 만들고, 로그인</p>
                    <p class="text-xl py-2">유저 별로 각각 다른 dashboard를 확인 할 수 있다.</p>

                </div>
            </div>
        </div>
    </div>

    {{-- 번외편 laratrust 를 사용한 user role 부여 --}}

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">user role 부여하기.</p>
                    <p class="text-xl py-2">POST form 만들기 (<a class="text-red-500 hover:text-green-500"
                            href="https://github.com/inngi/laravel8/blob/main/admindash.blade.php"
                            target="_blank">다운로드</a>)</p>

                    <p class="text-xl py-2">web.php 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            // for admins <br>
                            Route::group(['middleware'=>['auth','role:administrator']],function(){<br>
                            Route::get('/dashboard/postcreate',
                            [DashboardController::class,'postcreate'])->name<br>('dashboard.postcreate');<br>
                            Route::post('/dashboard', [DashboardController::class, 'roleEdit']);<br>
                            });
                        </p>
                    </div>
                    <p class="text-xl py-2">DashboardController 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public function roleEdit(request $request){<br>
                            if($request->toRole =="toAdmin"){<br>
                            $foundUser = User::where('email',$request->u_email)<br>->first();<br>
                            $currentRole = $foundUser->roles->first()->name;<br>
                            $foundUser->detachRole($currentRole);<br>
                            $foundUser->attachRole('employee');<br>
                            return back()->with('success','회원에서 직원으로 수정했습니다.');<br>
                            }elseif($request->toRole =="toUser"){<br>
                            $foundUser = User::where('email',$request->u_email)->first();<br>
                            $currentRole = $foundUser->roles->first()->name;<br>
                            $foundUser->detachRole($currentRole);<br>
                            $foundUser->attachRole('user');<br>
                            return back()->with('success','직원에서 회원으로 수정했습니다.');<br>
                            }<br>
                            }
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 번외편 posts 만들기 --}}
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">blog 만들기 (PostsController)</p>
                    <p class="text-xl py-2">PostsController 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan make:controller PostsController --resource
                        </p>
                    </div>
                    <p class="text-xl py-2">Post model 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan make:model Post
                        </p>
                    </div>
                    <p class="text-xl py-2">web.php 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            Route::resource('/blog', PostsController::class);
                        </p>
                    </div>
                    <p class="text-xl py-2">PostsController Index 설정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            return view('blog.index');
                        </p>
                    </div>
                    <p class="text-xl py-2">posts migration</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan make:migration posts
                        </p>
                    </div>
                    <p class="text-xl py-2">posts migration 수정 </p>
                    <p class="text-xl py-2">database/migrations </p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public function up()<br>
                            {<br>
                            Schema::create('posts', function(Blueprint $table){<br>
                            $table->increments('id');<br>
                            $table->string('slug');<br>
                            $table->string('title');<br>
                            $table->longText('description');<br>
                            $table->string('file_path1')->nullable();<br>
                            $table->string('file_path2')->nullable();<br>
                            $table->string('file_path3')->nullable();<br>
                            $table->string('file_path4')->nullable();<br>
                            $table->timestamps();<br>
                            $table->unsignedBigInteger('user_id');<br>
                            $table->foreign('user_id')->references('id')->on('users');<br>
                            });<br>
                            }
                        </p>
                    </div>
                    <p class="text-xl py-2 text-green-500">위에 설명: unsignedBigInteger는 foreign 키로 post 작성자 users 테이블에서
                        id를 가져 오게끔 한다. </p>
                    <p class="text-xl py-2">PostsController 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            use App\Models\Post;<br>
                            return view('blog.index')->with('posts',Post::orderBy('updated_at','DESC')->get());

                        </p>
                    </div>
                    <p class="text-xl py-2">relationship 설정 (Post / User model)</p>
                    <p class="text-xl py-2">Post model 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public function user(){<br>
                            return $this->belongsTo(User::class);<br>
                            }
                        </p>
                    </div>
                    <p class="text-xl py-2">User model 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public function post(){<br>
                            return $this->hasMany(Post::class);<br>
                            }
                        </p>
                    </div>
                    <p class="text-xl py-2">포스트를 보여주는 테이블에서</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            골뱅이foreach($posts as $post ) 로 post를 받고 <br>
                            { $post->title } 포스팅 타이틀<br>
                            { $post->user->name } 작성자 이름 을 받을 수 있다.<br>
                            { date('Y.m.d',strtotime($post->updated_at)) } 작성일 표시
                        </p>
                    </div>
                    <p class="text-xl py-2">create.blade.php 생성 / PostsController create수정</p>
                    <p class="text-xl py-2 ">create.blade.php는 POST form enctype 설정해야됨</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            return view('blog.create');
                        </p>
                    </div>

                    <p class="text-xl py-2 text-green-500">Slug 만드는 package (영문만 지원)</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            composer require cviebrock/eloquent-sluggable
                        </p>
                    </div>
                    <p class="text-xl py-2 text-green-500">sluggable publish</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan vendor:publish --provider="Cviebrock\EloquentSluggable\ServiceProvider"
                        </p>
                    </div>
                    <p class="text-xl py-2 text-green-500">clear config</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan config:clear
                        </p>
                    </div>
                    <p class="text-xl py-2 text-green-500">Post 에서 Sluggable 설정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            use Sluggable;<br>
                            public function sluggable(): array{<br>
                            return [<br>
                            'slug' =>[<br>
                            'source'=>'title'<br>
                            ]<br>
                            ];<br>
                            }
                        </p>
                        <p class="px-5 text-xl py-2">
                            protected $fillable = ['title','description',
                            'file_path1','file_path2','file_path3','file_path4', 'user_id'];
                        </p>
                    </div>
                    <p class="text-xl py-2 text-green-500">PostController 에서 Suggable 설정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            use Sluggable;<br>
                            public function sluggable(): array{<br>
                            return [<br>
                            'slug' =>[<br>
                            'source'=>'title'<br>
                            ]<br>
                            ];<br>
                            }
                        </p>
                    </div>
                    <p class="text-xl py-2 ">PostController store -> DB</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            // post create <br>
                            Post::create([<br>
                            'title' => $request->input('title'),<br>
                            'description' => $request->input('description'),<br>
                            'slug' => SlugService::createSlug(Post::class, 'slug', <br>$request->title),<br>
                            'file_path1' => $file1name,<br>
                            'file_path2' => $file2name,<br>
                            'file_path3' => $file3name,<br>
                            'file_path4' => $file4name,<br>
                            'user_id' => auth()->user()->id<br>
                            ]);
                        </p>
                    </div>
                    <p class="text-xl py-2 ">PostController show 설정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public function show($slug)<br>
                            {<br>
                            return view('blog.show')->with('post',Post::where('slug',$slug)->first());<br>
                            }
                        </p>
                    </div>
                    <p class="text-xl py-2 ">PostController edit 설정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            return view('blog.edit')->with('post',Post::where('slug',$slug)->first());
                        </p>
                    </div>
                    <p class="text-xl py-2 ">PostController update 설정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            기본적으로 store 와 같음 Post::create대신 다음 문장으로<br>
                            Post::where('slug',$slug)->update([ <br>

                        </p>
                    </div>
                    <p class="text-xl py-2 ">PostController destroy 설정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            $post = Post::where('slug',$slug);<br>
                            $post->delete();<br>
                            return redirect('/blog')->with('message','삭제되었습니다.');
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- mysql export --}}
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">Deploy Laravel Application</p>
                    <p class="text-xl py-2">mySQL database Export</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            cd Desktop<br>
                            mysqldump --databases --user=root --password exampleDB > exampleDB.sql<br>
                            mysqldump --databases --user=root --password company > companyDB.sql
                        </p>
                    </div>
                    <p class="text-xl py-2">upload using FTP</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            create folder before public_html<br>
                            copy everything except "public" folder<br>
                            paste into the folder you made at the beginning<br>
                            copy everything in "public" folder paste into the FTP's (logical)public folder
                        </p>
                    </div>
                    <p class="text-xl py-2">edit index.php file</p>
                    <p class="text-xl py-2">Auto Loader 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            require __DIR__.'/../laravelFolderName/vendor/autoload.php'
                        </p>
                    </div>
                    <p class="text-xl py-2">Run the Application 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            $app = require __DIR__.'/../laravelFolderName/bootstrap/app.php'
                        </p>
                    </div>
                    <p class="text-xl py-2">.env 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            APP_URL=https://URL.com<br>
                            DB_HOST=servername<br>
                            DB_PORT=3306
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Deploy Laravel on AWS Lightsail --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">Deploy Laravel on AWS Lightsail</p>
                    <p class="text-xl py-2">Lightsail LAMP instance 생성 후</p>
                    <p class="text-xl py-2">update instance</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            sudo apt-get update
                        </p>
                    </div>
                    <p class="text-xl py-2">install NPM</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            sudo apt-get install npm
                        </p>
                    </div>
                    <p class="text-xl py-2">Laravel project 폴더 생성</p>
                    <p class="text-xl py-2 text-green-500">폴더를 htdocs 하위 폴더에 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            cd /opt/bitnami/apache2/<br>
                            mkdir 폴더명<br>
                            sudo chown $USER /opt/bitnami/apache2/폴더명
                        </p>
                    </div>
                    <p class="text-xl py-2 ">Laravel 프로젝트 파일 복사</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            public 폴더를 제외한 나머지 파일들을 위에서 만든 폴더로 복사<br>
                            sudo chown $USER /opt/bitnami/apache2/폴더명
                        </p>
                    </div>
                    <p class="text-xl py-2 ">Install composer & NPM dependencies</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            cd /opt/bitnami/apache2/폴더명<br>
                            composer install<br>
                            npm install
                        </p>
                    </div>
                    <p class="text-xl py-2 ">folder permission 부여</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            sudo chown daemon:daemon /opt/bitnami/apache2/폴더명/storage
                        </p>
                    </div>
                    <p class="text-xl py-2 ">bitnami password 받기</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            cat ~/bitnami_application_password
                        </p>
                    </div>
                    <p class="text-xl py-2 ">mySQL Database 와 user 생성</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            mysql -u root -p // 그다음 위의 비번 엔터<br>
                            mysql> create database DATABASE_NAME;<br>
                            mysql> create user 'USER_NAME'@'%' identified by 'PASSWORD';<br>
                            mysql> grant all privileges on DATABASE_NAME.* TO 'USER_NAME'@'%';<br>
                            mysql> flush privileges;
                        </p>
                    </div>
                    <p class="text-xl py-2 ">env 파일 설정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            APP_URL=http://고정아이피주소<br>
                            DB_DATABASE=위에서만든 DB명<br>
                            DB_USERNAME=위에서만든 유저명<br>
                            DB_PASSWORD=위에서만든 비번
                        </p>
                    </div>
                    <p class="text-xl py-2 ">generate Key</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan key:generate 
                        </p>
                    </div>
                    <p class="text-xl py-2 ">run Migration</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan migrate
                        </p>
                    </div>
                    <p class="text-xl py-2 ">public 파일 복사 /htdocs</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            laravel app 의 public 폴더내의 파일을 복사해서 htdocs 로 복사
                        </p>
                    </div>
                    <p class="text-xl py-2 ">apache 재시작</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            sudo /opt/bitnami/ctlscript.sh restart
                        </p>
                    </div>
                    <p class="text-xl py-2 ">htdocs index.php 수정</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            require __DIR__.'/../vendor/autoload.php';<br>
                            $app = require_once __DIR__.'/../bootstrap/app.php';<br>
                            위 문장을 아래로 <br>
                            require __DIR__.'/../폴더명/vendor/autoload.php';<br>
                            $app = require_once __DIR__.'/../폴더명/bootstrap/app.php';
                        </p>
                    </div>
                    <p class="text-xl py-2 text-green-500">오류 발생시</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            storage 권한오류<br>
                            sudo chown daemon:daemon /opt/bitnami/apache2/폴더명/storage<br>
                            sudo chown -R $USER:www-data storage<br>
                            sudo chown -R $USER:www-data bootstr
ap/cache<br>
                            sudo chmod -R 777 /opt/bitnami/apache2/폴더명/storage<br>
                            sudo /opt/bitnami/ctlscript.sh restart
                        </p>
                    </div>
                    <p class="text-xl py-2 text-green-500">phpmyadmin 사용법</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            AWS 에서 SSH키 발급<br>
                            chmod 600 SSH키 로 키공개 약화 <br>
                            ssh -N -L 8888:127.0.0.1:80 -i SSH키이름 bitnami@아이피주소
                        </p>
                    </div>
                    
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            ssh -N -L 8888:127.0.0.1:80 -i LightsailDefaultKey-ap-northeast-2-3.pem bitnami@3.36.231.76
                        </p>
                    </div>
                    <p class="text-xl py-2 text-green-500">그 다음 127.0.0.1:8888/phpmyadmin으로 접속</p>
                    <p class="text-xl py-2">mySQL database Export / Import from phpmyadmin</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            cd Desktop<br>
                            mysqldump --databases --user=root --password exampleDB > exampleDB.sql
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- category controller --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-3xl pb-5">Category Controller</p>
                    <p class="text-xl py-2">for admin only</p>
                    <div class="rounded-md w-1/2 py-3 bg-black text-white">
                        <p class="px-5 text-xl py-2">
                            php artisan make:controller CategoryController -r
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
