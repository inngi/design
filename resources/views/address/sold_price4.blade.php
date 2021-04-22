<?php
$serviceKey = "tUrVrvpv0PTKuJPdL2SgQ1taji59HrgdHbsdmLa6AIm2azX0UwNjXA2M0KKsz1SEMuOTYKXlbTKJ2wdLOsa9qw%3D%3D";

// if (!isset($_GET['admCd']) || !isset($_GET['lnbrMnnm']) || !isset($_GET['doro']) || !isset($_GET['lnbrSlno'])) {
//     $_SESSION['error'] = "내부 오류발생";
// } else {


    // header('Location: juso_search.php');
    // return;
    $doro = substr($_GET['doro'], 5, 9);
    $pageNo = 1;
    $numOfRows = 10000;
    $LAWD_CD = substr($_GET['admCd'], 0, 5);
    $dong = substr($_GET['admCd'], 5, 10);
    $lnbrMnnm = $_GET['lnbrMnnm'];
    $lnbrSlno = $_GET['lnbrSlno'];

    $GLOBALS["sold_month"] = date("Ym");
    $GLOBALS['m'] = 1;
    $Api_url = "http://openapi.molit.go.kr/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcAptTradeDev?"; //인터넷망


    $url = $Api_url . "serviceKey=" . $serviceKey . "&pageNo=" . $pageNo . "&numOfRows=" . $numOfRows . "&LAWD_CD=" . $LAWD_CD . "&DEAL_YMD=";
    function get_sold($url, $dong, $doro, $lnbrMnnm, $lnbrSlno)
    {
        $ch = curl_init();
        // echo $url;
        curl_setopt($ch, CURLOPT_URL, $url . $GLOBALS["sold_month"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

        //execute post
        $result = curl_exec($ch);

        $xml_snippet = simplexml_load_string($result);

        $json_convert = json_encode($xml_snippet);
        $result_json = json_decode($json_convert, true);

        curl_close($ch);
        $result_apt = array();

        if ($result_json["body"]["totalCount"] > 1) {
            foreach ($result_json["body"]["items"]["item"] as $item) {
                if ($item["법정동읍면동코드"] == $dong && $item["도로명코드"] == $doro && $item["법정동본번코드"] = $lnbrMnnm && $item["법정동부번코드"] == $lnbrSlno) {
                    array_push($result_apt, $item);
                }
            }
            usort($result_apt, function ($a, $b) { //Sort the array using a user defined function
                return $a["일"] > $b["일"] ? -1 : 1; //Compare the scores
            });
            foreach ($result_apt as $apt) {
                echo "<tr><td>" . $apt["월"] . "월 " . $apt["일"] . "일 </td>";
                echo "<td>" . $apt["거래금액"] . "</td>";
                echo "<td>" . $apt["전용면적"] . "</td>";
                echo "<td>" . $apt["층"] . "</td></tr>";
            }
        }
    }
    function prev_month($url, $dong, $doro, $lnbrMnnm, $lnbrSlno)
    {

        $GLOBALS["sold_month"] = date('Ym', strtotime('-' . $GLOBALS['m'] . ' month',  strtotime($GLOBALS["sold_month"])));
        get_sold($url, $dong, $doro, $lnbrMnnm, $lnbrSlno);
        $GLOBALS['m'] = $GLOBALS['m'] + 1;
    }

?>
    <table>
        <thead>
            <tr>
                <td>
                    계약일
                </td>
                <td>
                    거래가격(단위 1000원)
                </td>
                <td>
                    전용면적
                </td>
                <td>
                    층수
                </td>
            </tr>
        </thead>



        <tbody>
            <?php

                get_sold($url, $dong, $doro, $lnbrMnnm, $lnbrSlno);
                prev_month($url, $dong, $doro, $lnbrMnnm, $lnbrSlno);
                prev_month($url, $dong, $doro, $lnbrMnnm, $lnbrSlno);
                prev_month($url, $dong, $doro, $lnbrMnnm, $lnbrSlno);
                prev_month($url, $dong, $doro, $lnbrMnnm, $lnbrSlno);
                prev_month($url, $dong, $doro, $lnbrMnnm, $lnbrSlno);
        
            ?>
            

        </tbody>
    </table>
    <script>

    </script>
<?php
   

// }
?>

