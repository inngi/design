<div class="col-sm-10">
    <form onsubmit="searchDong(); return false;">
        <div class="responsive">

            <div id="map" style="width:100%;height:400px;"></div>
        </div>
        <!-- <hr> -->
        <div class="text-center">
            <div class="responsive">
                <i class="fas fa-notes-medical" style="color:blue"><span>
                        <?php
                        if (gmdate('D') == 'Mon') {
                            echo '월요일은 주민번호 뒷자리 <span style="color:red">1, 6 </span>';
                        } else if (gmdate('D') == 'Tue') {
                            echo '화요일은 주민번호 뒷자리 <span style="color:red">2, 7 </span>';
                        } else if (gmdate('D') == 'Wed') {
                            echo '수요일은 주민번호 뒷자리 <span style="color:red">3, 8 </span>';
                        } else if (gmdate('D') == 'Thu') {
                            echo '목요일은 주민번호 뒷자리 <span style="color:red">4, 9 </span>';
                        } else if (gmdate('D') == 'Fri') {
                            echo '금요일은 주민번호 뒷자리 <span style="color:red">5, 0 </span>';
                        } else if (gmdate('D') == 'Sat') {
                            echo '주말은 <span style="color:red">모두 구매 가능</span>';
                        } else if (gmdate('D') == 'Sun') {
                            echo '주말은 <span style="color:red">모두 구매 가능</span>';
                        }
                        ?>

                    </span></i><span style="color:#999"> <i class="fas fa-info-circle"></i>판매처 찾기(베타)</span></div>
            <div>
                <img src="https://bogunso.co.kr/images/mm_20_green.png"> 100개 이상 </img>
                <img src="https://bogunso.co.kr/images/mm_20_yellow.png"> 30개 이상 </img>
                <img src="https://bogunso.co.kr/images/mm_20_red.png"> 2~29개 </img>
                <img src="https://bogunso.co.kr/images/mm_20_gray.png"> 재고 없음</img>
            </div>
            <input class='hidden' type="text" id="sample4_postcode" placeholder="우편번호">
            <input class='hidden' type="text" id="sample4_roadAddress" placeholder="도로명주소">
            <input class='hidden' type="text" id="sample4_jibunAddress" placeholder="지번주소">
            <span class='hidden' id="guide" style="color:#999;display:none"></span>
            <input class='hidden' type="text" id="sample4_detailAddress" placeholder="상세주소">
            <input class='hidden' type="text" id="sample4_extraAddress" placeholder="참고항목">
            <input class='hidden' type="text" id="sample4_sido" placeholder="도">
            <input class='hidden' type="text" id="sample4_sigungu" placeholder="시군구">
            <input class='hidden' type="text" id="sample4_bname" placeholder="동">
            <div>
            <input type="button" class="btn btn-info btn-xs" onclick="sample4_execDaumPostcode()" value="주소 검색">
            <button id="seller_info" class="btn btn-info btn-xs" type="submit" onclick="searchDong()">판매처 찾기</button>
                    </div>
            <p style="color:red">주소검색 후 판매처 찾기를 눌러주세요(내위치로 찾기는 반경 2km검색)</p>
            <p id="spinner" class="hidden"><i class="fas fa-circle-notch fa-spin"> </i><br>현재 위치로 검색중입니다. 검색이 되지 않으면 주소 찾기를 해주세요.</p>
            <span id="result"></span> <br /><span id="error_msg"></span>
        </div>
    </form>
    <div class="text-center">


        <button id="my_loc" class="btn btn-info btn-xs" onclick="searchMyloc()">내 위치로 찾기</button>
        <button  class="btn btn-info btn-xs" onclick="center_search()">현재 맵에서 찾기</button>
    </div>

</div>



<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ env('KAKAO_MAP_JAVA') }}&libraries=services"></script>

<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script type="text/JavaScript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript">
function center_search(){
    var position = map.getCenter();

    geo[0] = position['Ha']
    geo[1] = position['Ga']
    
    displayPlaces(geo, 2,2)
}






    // jQuery(document).ready(function() {

    //     // Geolocation 객체를 사용
    //     if (navigator.geolocation) {

    //         navigator.geolocation.getCurrentPosition(function(position) {

    //             // 위치를 가져오는데 성공할 경우
    //             jQuery.each(position.coords, function(key, item) {
    //                 jQuery("<h3></h3>").html("● " + key + " : " + item).appendTo("body");
    //             });
    //         }, function(error) {

    //             // 위치를 가져오는데 실패한 경우
    //             consol.log(error.message);
    //         });
    //     } else {
    //         consol.log("Geolocation을 지원하지 않는 브라우저 입니다.");
    //     }
    // });
</script>

<script>
    window.addEventListener("load", function(){
    document.getElementById("spinner").classList.remove('hidden');
  searchMyloc();
});
</script>


{{-- map --}}

<script>
    //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
    function sample4_execDaumPostcode() {
        document.getElementById("seller_info").classList.remove('hidden');
        
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var roadAddr = data.roadAddress; // 도로명 주소 변수
                var extraRoadAddr = ''; // 참고 항목 변수
                var sido = data.sido;
                var sigungu = data.sigungu;
                var bname = data.bname;

                // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                    extraRoadAddr += data.bname;
                }
                // 건물명이 있고, 공동주택일 경우 추가한다.
                if (data.buildingName !== '' && data.apartment === 'Y') {
                    extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                if (extraRoadAddr !== '') {
                    extraRoadAddr = ' (' + extraRoadAddr + ')';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                // document.getElementById('sample4_postcode').value = data.zonecode;
                // document.getElementById("sample4_roadAddress").value = roadAddr;
                // document.getElementById("sample4_jibunAddress").value = data.jibunAddress;
                document.getElementById("sample4_sido").value = data.sido;
                document.getElementById("sample4_sigungu").value = data.sigungu;
                document.getElementById("sample4_bname").value = data.bname;

                // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
                if (roadAddr !== '') {
                    document.getElementById("sample4_extraAddress").value = extraRoadAddr;
                } else {
                    document.getElementById("sample4_extraAddress").value = '';
                }

                var guideTextBox = document.getElementById("guide");
                // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
                if (data.autoRoadAddress) {
                    var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
                    guideTextBox.innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')';
                    guideTextBox.style.display = 'block';

                } else if (data.autoJibunAddress) {
                    var expJibunAddr = data.autoJibunAddress;
                    guideTextBox.innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')';
                    guideTextBox.style.display = 'block';
                } else {
                    guideTextBox.innerHTML = '';
                    guideTextBox.style.display = 'none';
                }
            }
        }).open();
    }
</script>

{{-- mask --}}
<script>

var count = 0
var geo = [0, 0]



function displayInfowindow(marker, title) {
    var content = '<div style="padding:5px;z-index:1;">' + title + '</div>';

    infowindow.setContent(content);
    infowindow.open(map, marker);

}

function howmany(spot) {
    if (spot.remain_stat == 'plenty') {
        return '<span style="background:green;color:white;font-size:100%">' + '100개 이상' + '</span>'
    } else if (spot.remain_stat == 'some') {
        return '<span style="background:yellow;color:black;font-size:100%">' + '30~100개' + '</span>'

    } else if (spot.remain_stat == 'few') {
        return '<span style="background:red;color:white;font-size:100%">' + '2~30개' + '</span>'
    } else {
        return '<span style="background:grey;color:white;font-size:100%">' + '재고없음' + '</span>'
    }
}


async function Yakguk(dong, call_type) {
    // api_url = "https://8oi9s0nnth.apigw.ntruss.com/corona19-masks/v1/storesByGeo/json?";
    api_url = "https://8oi9s0nnth.apigw.ntruss.com/corona19-masks/v1/storesByAddr/json?address="
    geo_url = "https://8oi9s0nnth.apigw.ntruss.com/corona19-masks/v1/storesByGeo/json?lat="
    if (call_type == 1) {
        response = await fetch(api_url + dong)
    }
    else if (call_type == 2) {
        response = await fetch(geo_url + dong[0] + '&lng=' + dong[1] + '&m=2000')
    }
    console.log(response)
    const data = await response.json();
    console.log(data['stores'])
    return data['stores']
}
var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = {
        center: new kakao.maps.LatLng(37.5132272, 127.0347787), // 지도의 중심좌표
        level: 4 // 지도의 확대 레벨
    };

var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

// 마커가 표시될 위치입니다 
var markerPosition = new kakao.maps.LatLng(33.450701, 126.570667);


async function displayPlaces(dong, call_type,searchType) {
    var placelist = []
    // if (call_type ==1){
    //     placelist = await Yakguk(dong,call_type);
    // }//수정
    // else if
    placelist = await Yakguk(dong, call_type);

    var avail_seller = 0;

    if (placelist.length == 0) {
        if (count == 1) {
            return;
        }
        count = count + 1;
        return redong();
    }
    function setCenter() {
        // 이동할 위도 경도 위치를 생성합니다 
        var moveLatLon = new kakao.maps.LatLng(placelist[0].lat, placelist[0].lng);

        // 지도 중심을 이동 시킵니다
        map.setCenter(moveLatLon);
    }

    function panTo() {
        // 이동할 위도 경도 위치를 생성합니다 
        var moveLatLon = new kakao.maps.LatLng(placelist[0].lat, placelist[0].lng);

        // 지도 중심을 부드럽게 이동시킵니다
        // 만약 이동할 거리가 지도 화면보다 크면 부드러운 효과 없이 이동합니다
        map.panTo(moveLatLon);
    }
    if(arguments.length==2){
    setCenter();
    panTo();
    }
    var imageSrc = []
    imageSrc[0] = 'https://bogunso.co.kr/images/mm_20_gray.png' // 마커이미지의 주소입니다    
    imageSrc[1] = 'https://bogunso.co.kr/images/mm_20_red.png' // 마커이미지의 주소입니다    
    imageSrc[2] = 'https://bogunso.co.kr/images/mm_20_yellow.png' // 마커이미지의 주소입니다    
    imageSrc[3] = 'https://bogunso.co.kr/images/mm_20_green.png' // 마커이미지의 주소입니다    


    var imageSize = new kakao.maps.Size(25, 42) // 마커이미지의 크기입니다
    var imageOption = { offset: new kakao.maps.Point(27, 69) }; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.

    for (i = 0; i < placelist.length; i++) {
        var lat = placelist[i].lat
        var lng = placelist[i].lng
        var markerPosition = new kakao.maps.LatLng(lat, lng)
        markerSrc = imageSrc[color(placelist[i].remain_stat)]
        var markerImage = new kakao.maps.MarkerImage(markerSrc, imageSize, imageOption)

        var marker = new kakao.maps.Marker({
            position: markerPosition,
            title: placelist[i].name,
            image: markerImage
        });
        console.log(placelist[i].remain_stat)
        if (placelist[i].remain_stat != 'empty' && placelist[i].remain_stat != null) {
            avail_seller = avail_seller + 1;
        }
        stat = howmany(placelist[i])

        stocktime = placelist[i].stock_at
        // +'<br>입고시간:'+stocktime
        var iwContent = '<div style="padding:1em; font-size:120%">' + placelist[i].name + '<br>' + stat + '</div>'
        var infowindow = new kakao.maps.InfoWindow({
            position: markerPosition,
            content: iwContent
        });

        marker.setMap(map);

        kakao.maps.event.addListener(marker, 'mouseover', makeOverListener(map, marker, infowindow));
        kakao.maps.event.addListener(marker, 'mouseout', makeOutListener(infowindow));
        kakao.maps.event.addListener(marker, 'click', moveTo(map, marker, infowindow));

    }
    document.getElementById('result').innerHTML = "검색결과: " + placelist.length + '개 처 중(<span style="color:red">' + avail_seller + '곳</span> 구매가능)'
    document.getElementById("spinner").classList.add('hidden');
}

function makeOverListener(map, marker, infowindow) {
    return function () {
        infowindow.open(map, marker);
    };
}
// 인포윈도우를 닫는 클로저를 만드는 함수입니다 
function makeOutListener(infowindow) {
    return function () {
        infowindow.close();
    };
}
function color(stat) {
    const stat_array = ['plenty', 'some', 'few', 'empty']
    if (stat == stat_array[0]) {
        return 3
    }
    else if (stat == stat_array[1]) {
        return 2
    }
    else if (stat == stat_array[2]) {
        return 1
    }
    else return 0
}



// 인포윈도우를 닫는 클로저를 만드는 함수입니다 
function moveTo(map, marker, infowindow) {
    return function () {
        var latlng = marker.getPosition();
        target_URL = "https://map.kakao.com/link/to/" + marker.getTitle() + ',' + latlng.getLat() + ',' + latlng.getLng()
        console.log(target_URL)
        window.open(target_URL)
    };
}

function isnotEmpty(address) {
    if (address.length != 0) {
        return address + ' '
    }
    return;
}
function searchDong() {

    count = 0
    var state = document.getElementById('sample4_sido').value;
    var city = document.getElementById('sample4_sigungu').value;
    var place = document.getElementById('sample4_bname').value;
    document.getElementById("spinner").classList.remove('hidden');

    state = redefineDo(state);
    if (state == '세종특별자치시') {
        displayPlaces(isnotEmpty(state), 1)
        document.getElementById('error_msg').innerHTML = "<세종특별자치시로 검색되었습니다.>"

    }
    else {
        var dong = isnotEmpty(state) + isnotEmpty(city) + place
        var redong = isnotEmpty(state) + isnotEmpty(city)
        var redong = displayPlaces(dong, 1)
    }
    // if (redong == 0){
    //     document.getElementById('error_msg').innerHTML="asdf"
    // }
}
function redong() {
    var state = document.getElementById('sample4_sido').value;
    var city = document.getElementById('sample4_sigungu').value;
    state = redefineDo(state);
    var redong = isnotEmpty(state) + isnotEmpty(city)
    document.getElementById('error_msg').innerHTML = "<동 검색 결과가 없어, " + city + "(으)로 검색했습니다.>"

    displayPlaces(redong)
}

function redefineDo(state) {
    if (state == '서울') {
        return '서울특별시';
    }
    else if (state == '인천') {
        return '인천광역시';
    }
    else if (state == '부산') {
        return '부산광역시';
    }
    else if (state == '울산') {
        return '울산광역시';
    }
    else if (state == '대전') {
        return '대전광역시';
    }
    else if (state == '광주') {
        return '광주광역시';
    }
    else if (state == '대구') {
        return '대구광역시';
    }
    else if (state == '세종특별자치시') {
        return '세종특별자치시';
    }
    else if (state == '충북') {
        return '충청북도';
    } else if (state == '충남') {
        return '충청남도';
    } else if (state == '경북') {
        return '경상북도';
    } else if (state == '경남') {
        return '경상남도';
    } else if (state == '전북') {
        return '전라북도';
    } else if (state == '전남') {
        return '전라남도';
    }
    else if (state == '제주특별자치도') {
        return '제주특별자치도';
    }
    else if (state.length != 0) {
        return state + '도';
    }
    return state
}
function searchMyloc() {
    

    if (navigator.geolocation) {

        // GeoLocation을 이용해서 접속 위치를 얻어옵니다
        navigator.geolocation.getCurrentPosition(function (position) {

            var lat = position.coords.latitude, // 위도
                lon = position.coords.longitude; // 경도

            geo[0] = lat;
            geo[1] = lon;
            displayPlaces(geo, 2)
        });

    } else { // HTML5의 GeoLocation을 사용할 수 없을때 마커 표시 위치와 인포윈도우 내용을 설정합니다

    
    }
}


</script>