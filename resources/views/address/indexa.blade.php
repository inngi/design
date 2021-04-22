{{-- 주소 api / kakao map integration --}}
{{-- ********************** UI ************************************
    *
    * MAP / current location 
    * Shows apartment in these areas
    * Search box on the map 
    * favorite mark 
    *
    ********************** Functions *****************************
    *
    * It shows selling history of the apartment on click on the map
    * favorite lists (logged in users only)
    * Load more
    * search infrastructure nearby and track the distances
    * --}}
    <x-app-layout>
        <form action="/address" id="form" name="form" method="post">
            @csrf
            <input type="text" name="keyword" value="광화문 풍림" placeholder="지역명 + 아파트명" onkeydown="enterSearch();" />
            <button class="btn btn-light" type="submit" name="juso_search">
                <i class="fa fa-search">검색</i>
            </button>
            <input class="invisible" type="text" name="currentPage" value="1" />
            <!-- <-- 요청 변수 설정 (현재 페이지. currentPage : n > 0) -->
            <input class="invisible" type="text" name="countPerPage" value="5" />
            <!-- 요청 변수 설정 (페이지당 출력 개수. countPerPage 범위 : 0 < n <= 100) -->
            <input class="invisible" type="text" name="resultType" value="json" />
            <!-- <-- 요청 변수 설정 (검색결과형식 설정, json) -->
            <input class="invisible" type="text" name="confmKey" value="{{ env('JUSO_API') }}" />
            <!-- 요청 변수 설정 (승인키) -->

        </form>
        <script>
            $(function () {
                $('#form').submit(function (e) {
                    e.preventDefault()  // prevent the form from 'submitting'
    
                    var url = e.target.action  // get the target
                    var formData = $(this).serialize() // get form data
                    $.post(url, formData, function (response) { // send; response.data will be what is returned

                        alert(response);
                        // alert('report sent')
                    })
                })
            })
        </script>

        <div id="list"></div>
        <div class="paginate text-center" id="pageApi"></div>
        <div id="sold_price"></div>
    </x-app-layout>