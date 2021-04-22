<x-app-layout>
    <?php 
    $url = "https://www.juso.go.kr/addrlink/addrLinkApi.do";
    $confmkey = "U01TX0FVVEgyMDIxMDQwMjIwMjQyNzExMTAwMjk=";
    $resultType = "json";
    
    if (isset($_POST["keyword"])) {
        $keyword = htmlentities($_POST["keyword"]);
    
        //set POST variables
        $fields = array(
            'api_key' => $confmkey,
            'confmKey' => $confmkey,
            'keyword' => $keyword,
            'resultType' => 'json'
        );
    
        //url-ify the data for the POST
        $fields_string = http_build_query($fields);
    
        //open connection
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    
        //execute post
        $result = curl_exec($ch);
        $result_json = json_decode($result, true);
    
        curl_close($ch);
    
    
        if ($result_json["results"]["common"]["errorMessage"] != "정상") {
            $_SESSION['error'] = $result_json["results"]["common"]["errorMessage"];
        }
        echo "<pre>";
        var_dump($result_json);
        echo "</pre>";
    }
    ?>
    
    <div>
    
            <script>
            function goPage(pageNum) {
                document.form.currentPage.value = pageNum;
                getAddr();
            }
    
            function getAddr() {
                // 적용예 (api 호출 전에 검색어 체크) 	
                $("#sold_price").html("");
    
                $.ajax({
                    url: "https://www.juso.go.kr/addrlink/addrLinkApiJsonp.do",
                    type: "post",
                    data: $("#form").serialize(),
                    dataType: "jsonp",
                    crossDomain: true,
                    success: function(jsonStr) {
                        $("#list").html("");
                        if (jsonStr != null) {
                            makeListJson(jsonStr);
                            pageMake(jsonStr)
                            // console.log(jsonStr);
                        }
                        // }
                    },
                    error: function(xhr, status, error) {
                        alert("에러발생");
                    }
                });
            }
    
            function makeListJson(jsonStr) {
                var htmlStr = "";
    
                htmlStr += '<table class="responsive table table-bordered"><th>도로명 주소</th><th>영문주소</th><th>우편번호</th>'
                $(jsonStr.results.juso).each(function() {
                    htmlStr += "<tr>";
    
                    htmlStr += "<td><a href='#' onclick=jusoCallBack(\"" + this.admCd + "\",\"" + this.lnbrMnnm + "\",\"" + this.rnMgtSn +
                        "\",\"" + this.lnbrSlno +
                        "\")>" + this.jibunAddr + "</a></td>";
                    htmlStr += "<td>" + this.zipNo + "</td>";
                    htmlStr += "<td>" + this.admCd + "</td>";
                    htmlStr += "</tr>";
                });
                htmlStr += "</table>";
                $("#list").html(htmlStr);
            }
    
            function pageMake(jsonStr) {
                var total = jsonStr.results.common.totalCount; // 총건수
                var pageNum = document.form.currentPage.value; // 현재페이지
                var paggingStr = "";
                if (total < 1) {} else {
                    var PAGEBLOCK = document.form.countPerPage.value;
                    var pageSize = document.form.countPerPage.value;
                    var totalPages = Math.floor((total - 1) / pageSize) + 1;
                    var firstPage = Math.floor((pageNum - 1) / PAGEBLOCK) * PAGEBLOCK + 1;
                    if (firstPage <= 0) firstPage = 1;
                    var lastPage = firstPage - 1 + PAGEBLOCK;
                    if (lastPage > totalPages) lastPage = totalPages;
                    var nextPage = lastPage + 1;
                    var prePage = firstPage - 5;
                    if (firstPage > PAGEBLOCK) {
                        paggingStr += "<a href='javascript:goPage(" + prePage + ");'>◁</a>  ";
                    }
                    for (i = firstPage; i <= lastPage; i++) {
                        if (pageNum == i)
                            paggingStr += "<a style='font-weight:bold;color:blue;font-size:15px;' href='javascript:goPage(" + i + ");'>" + i + "</a>  ";
                        else
                            paggingStr += "<a href='javascript:goPage(" + i + ");'>" + i + "</a>  ";
                    }
                    if (lastPage < totalPages) {
                        paggingStr += "<a href='javascript:goPage(" + nextPage + ");'>▷</a>";
                    }
                    $("#pageApi").html(paggingStr);
                }
            }
    
            function enterSearch() {
                var evt_code = (window.netscape) ? ev.which : event.keyCode;
                if (evt_code == 13) {
                    event.keyCode = 0;
                    getAddr(); //jsonp사용시 enter검색 
                }
            }
    
    
    
            function jusoCallBack(stringA, lnbrMnnm, doro, lnbrSlno) {
                $("#sold_price").html("");
                if (lnbrSlno.length == 1) {
                    lnbrSlno = "000" + lnbrSlno;
                } else if (lnbrSlno.length == 2) {
                    lnbrSlno = "00" + lnbrSlno;
                } else if (lnbrSlno.length == 3) {
                    lnbrSlno = "0" + lnbrSlno;
                }
                if (lnbrMnnm.length == 1) {
                    lnbrMnnm = "000" + lnbrMnnm;
                } else if (lnbrMnnm.length == 2) {
                    lnbrMnnm = "00" + lnbrMnnm;
                } else if (lnbrMnnm.length == 3) {
                    lnbrMnnm = "0" + lnbrMnnm;
                }
    
                // console.log(decodeURIComponent(stringA));
                $("#sold_price").load("sold_price4.blade.php" + "?admCd=" + stringA + "&lnbrMnnm=" + lnbrMnnm + "&doro=" + doro + "&lnbrSlno=" + lnbrSlno);
    
            }
        </script>
        <form id="form" name="form" method="post">
    
            <input type="text" name="keyword" value="광화문 풍림" placeholder="지역명 + 아파트명" onkeydown="enterSearch();" />
            <button class="btn btn-light" type="button" onClick="getAddr();">
                <i class="fa fa-search">검색</i>
            </button>
            <input class="invisible" type="text" name="currentPage" value="1" />
            <!-- <-- 요청 변수 설정 (현재 페이지. currentPage : n > 0) -->
            <input class="invisible" type="text" name="countPerPage" value="5" />
            <!-- 요청 변수 설정 (페이지당 출력 개수. countPerPage 범위 : 0 < n <= 100) -->
            <input class="invisible" type="text" name="resultType" value="json" />
            <!-- <-- 요청 변수 설정 (검색결과형식 설정, json) -->
            <input class="invisible" type="text" name="confmKey" value="{{ env('JUSO_API') }}" /><!-- 요청 변수 설정 (승인키) -->
    
        </form>
    
    
        <div id="list"></div>
        <div class="paginate text-center" id="pageApi"></div>
        <div id="sold_price"></div>
    </div>
    </x-app-layout>