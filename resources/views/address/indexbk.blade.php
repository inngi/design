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

        <script type="text/javascript" src="js/jquery.ajax-cross-origin.min.js"></script>
    
        <?php
        $url = 'https://www.juso.go.kr/addrlink/addrLinkApi.do';
        $confmkey = env('JUSO_API');
        $resultType = 'json';
    
        if (isset($_POST['keyword'])) {
        $keyword = htmlentities($_POST['keyword']);
    
        //set POST variables
        $fields = [
        'api_key' => $confmkey,
        'confmKey' => $confmkey,
        'keyword' => $keyword,
        'resultType' => 'json',
        ];
    
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
    
        if ($result_json['results']['common']['errorMessage'] != '정상') {
        $_SESSION['error'] = $result_json['results']['common']['errorMessage'];
        }
        echo "
        <pre>";
            var_dump($result_json);
            echo '</pre>';
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
    
                    htmlStr +=
                        '<table class="responsive table table-bordered"><th>도로명 주소</th><th>zipNo</th><th>admCd (code)</th>'
                    $(jsonStr.results.juso).each(function() {
                        htmlStr += "<tr>";
    
                        htmlStr +=
    
                            "<td><a href='#' onclick=jusoCallBack(\"" + this.admCd + "\",\"" + this
                            .lnbrMnnm + "\",\"" + this.rnMgtSn +
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
                                paggingStr +=
                                "<a style='font-weight:bold;color:blue;font-size:15px;' href='javascript:goPage(" + i +
                                ");'>" + i + "</a>  ";
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
    
    
                    $.ajax({
                        crossOrigin: true,
                        url: "http://openapi.data.go.kr/openapi/service/rest/Covid19/getCovid19GenAgeCaseInfJson?",
                        type: "post",
                        data: {
                            "serviceKey": 'tUrVrvpv0PTKuJPdL2SgQ1taji59HrgdHbsdmLa6AIm2azX0UwNjXA2M0KKsz1SEMuOTYKXlbTKJ2wdLOsa9qw==',  "pageNo": "1",
                            "numOfRows":"10", "startCreateDt":"20210310", "endCreateDt":"20210410"
                        },
                        dataType: "jsonp",
                        crossDomain: true,
                        success: function(jsonStr) {
                            $("#list").html("");
                            console.log(jsonStr);
                            // }
                        },
                        error: function(xhr, status, error) {
                            alert("테스트 error");
                        }
                    });
    
                    // var xhr = new XMLHttpRequest();
                    // var url =
                    //     'https://cors-anywhere.herokuapp.com/http://openapi.molit.go.kr/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcAptTradeDev'; /*URL*/
                    // var queryParams = '?' + encodeURIComponent('ServiceKey') + '=' + 'tUrVrvpv0PTKuJPdL2SgQ1taji59HrgdHbsdmLa6AIm2azX0UwNjXA2M0KKsz1SEMuOTYKXlbTKJ2wdLOsa9qw=='; /*Service Key*/
                    // queryParams += '&' + encodeURIComponent('pageNo') + '=' + encodeURIComponent('1'); /**/
                    // queryParams += '&' + encodeURIComponent('numOfRows') + '=' + encodeURIComponent('10'); /**/
                    // queryParams += '&' + encodeURIComponent('LAWD_CD') + '=' + encodeURIComponent('11110'); /**/
                    // queryParams += '&' + encodeURIComponent('DEAL_YMD') + '=' + encodeURIComponent('201512'); /**/
                    // xhr.open('GET', url + queryParams);
                    // xhr.onreadystatechange = function() {
                    //     if (this.readyState == 4) {
                    //         alert('Status: ' + this.status + 'nHeaders: ' + JSON.stringify(this
                    //         .getAllResponseHeaders()) + 'nBody: ' + this.responseText);
                    //     }
                    // };
    
                    // xhr.send('');
    
    
    
                    // $.ajax({
                    //     crossOrigin: true,
                    //     url: "http://openapi.molit.go.kr/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcAptTradeDev?" +
                    //         "serviceKey=" +
                    //         "tUrVrvpv0PTKuJPdL2SgQ1taji59HrgdHbsdmLa6AIm2azX0UwNjXA2M0KKsz1SEMuOTYKXlbTKJ2wdLOsa9qw%3D%3D" +
                    //         "&pageNo=" + "1" + "&numOfRows=" + "10" + "&LAWD_CD=" + "11110" + "&DEAL_YMD=" +
                    //         "202003",
                    //     //         headers: {  
                    //     //              'Access-Control-Allow-Credentials' : true,  
                    //     // 'Access-Control-Allow-Origin': '*',  
                    //     //         },
    
                    //     //         }
                    //     type: "POST",
                    //     headers: {
                    //         'Access-Control-Allow-Credentials': true,
                    //         // 'X-Content-Type-Options': nosniff,
                    //         'Access-Control-Allow-Origin': '*',
                    //         'Access-Control-Allow-Methods': 'POST',
                    //         'Access-Control-Allow-Headers': 'application/xml',
                    //     },
                    //     // dataType: "jsonp",
                    //     // crossDomain: true,
                    //     success: function(jsonStr) {
                    //         $("#list").html("");
                    //         if (jsonStr != null) {
                    //             // makeListJson(jsonStr);
                    //             // pageMake(jsonStr)
                    //             console.log(jsonStr);
                    //         }
                    //         // }
                    //     },
                    //     error: function(xhr, status, error) {
                    //         alert("에러발생ss");
                    //     }
                    // });
    
    
    
                    // console.log(decodeURIComponent(stringA));
                    // $("#sold_price").load("sold_price4.php" + "?admCd=" + stringA + "&lnbrMnnm=" + lnbrMnnm + "&doro=" + doro + "&lnbrSlno=" + lnbrSlno);
    
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
                <input class="invisible" type="text" name="confmKey" value="{{ env('JUSO_API') }}" />
                <!-- 요청 변수 설정 (승인키) -->
    
            </form>
    
    
            <div id="list"></div>
            <div class="paginate text-center" id="pageApi"></div>
            <div id="sold_price"></div>
        </div>
        {{-- Kakao Map --}}
        <div class="map">
            <div id="map" style="width:100%;height:350px;"></div>
            {{-- 지도 --}}
            <script type="text/javascript"
                src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ env('KAKAO_MAP_JAVA') }}&libraries=services"></script>
            <script>
                var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
                    mapOption = {
                        center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
                        level: 4 // 지도의 확대 레벨 
                    };
    
                var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다
                // HTML5의 geolocation으로 사용할 수 있는지 확인합니다 
                if (navigator.geolocation) {
    
                    // GeoLocation을 이용해서 접속 위치를 얻어옵니다
                    navigator.geolocation.getCurrentPosition(function(position) {
    
                        var lat = position.coords.latitude, // 위도
                            lon = position.coords.longitude; // 경도
    
                        var locPosition = new kakao.maps.LatLng(lat,
                                lon), // 마커가 표시될 위치를 geolocation으로 얻어온 좌표로 생성합니다
                            message = '<div style="padding:5px;">현재위치</div>'; // 인포윈도우에 표시될 내용입니다
    
    
                        // 마커와 인포윈도우를 표시합니다
                        displayMarker(locPosition, message);
    
                    });
    
                } else { // HTML5의 GeoLocation을 사용할 수 없을때 마커 표시 위치와 인포윈도우 내용을 설정합니다
    
                    var locPosition = new kakao.maps.LatLng(33.450701, 126.570667),
                        message = 'geolocation을 사용할수 없어요..'
    
                    displayMarker(locPosition, message);
                }
    
                // 지도에 마커와 인포윈도우를 표시하는 함수입니다
                function displayMarker(locPosition, message) {
    
                    // 마커를 생성합니다
                    var marker = new kakao.maps.Marker({
                        map: map,
                        position: locPosition
                    });
    
                    var iwContent = message, // 인포윈도우에 표시할 내용
                        iwRemoveable = true;
    
                    // 인포윈도우를 생성합니다
                    var infowindow = new kakao.maps.InfoWindow({
                        content: iwContent,
                        removable: iwRemoveable
                    });
    
                    // 인포윈도우를 마커위에 표시합니다 
                    infowindow.open(map, marker);
    
                    // 지도 중심좌표를 접속위치로 변경합니다
                    map.setCenter(locPosition);
                }
    
                // 주소-좌표 변환 객체를 생성합니다
                var geocoder = new kakao.maps.services.Geocoder();
                var callback = function(result, status) {
                    if (status === kakao.maps.services.Status.OK) {
    
                        console.log(result[0].address_name);
                        console.log(result[0].code);
                    }
                };
                geocoder.coord2RegionCode(126.9786567, 37.566826, callback);
    
            </script>
    
        </div>
        {{-- Kakao Map --}}
    </x-app-layout>
    