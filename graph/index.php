
<?php
error_reporting(0);
if (isset($_POST['ipname']) && $_POST['ipname'] != ' ') {
    $ip = $_POST['ipname'];
    $arr = [];
    $arr1 = [];
    $host='10.1.4.151';
    $root = 'web_user';
    $pwd = 'gDUKTv%W#2';
    $dbname = "cyberstar";

    // 创建连接
    $conn = new mysqli($host, $root, $pwd,$dbname);

    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    $conn->set_charset('utf8');

    $sql = "SELECT url,bIP FROM `url_information` WHERE IP = '$ip'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
    $ifip = count($result);
    $domain = $result['url'];
    $bip = $result['bIP'];
    $sql0 = "SELECT url FROM `url_information` WHERE IP = '$ip'";
    $query0 = mysqli_query($conn,$sql0);
    $result0 = mysqli_fetch_all($query0,MYSQLI_ASSOC);
    // var_dump($result0);die;
    // $return=array();
    // while ($row = mysqli_fetch_assoc($query0)) {
    //     $return[]=$row;
    // }
    // var_dump($return);die;
    $num = mysqli_num_rows($query0);
    foreach ($result0 as $key => $value){
        $a[$key] = $value['url'];
    }

    $sql1 = "SELECT url,bIP,IP,domain_name,registrant_email,registrant_name FROM `url_information` WHERE url = '$domain'";
    $query1 = mysqli_query($conn,$sql1);
    $result1 = mysqli_fetch_all($query1,MYSQLI_ASSOC);
    if (count($result1) > 1) {
        foreach ($result1 as $key => $value) {
            if ($value['IP'] != $ip) {
                array_push($arr,$value['IP']);
                array_push($arr,$value['registrant_email']);
                array_push($arr,$value['registrant_name']);
            }
        };
    }else{
        if ($result1[0]['IP'] != $ip) {

        array_push($arr,$result1[0]['IP']);
        };
        array_push($arr,$result1[0]['registrant_email']);
        array_push($arr,$result1[0]['registrant_name']);
    }
    $arr = array_values(array_unique(array_filter($arr)));
    // var_dump($arr);
    $sql2 = "SELECT port,service FROM `service_major` WHERE bIP = '$bip'";
    $query2 = mysqli_query($conn,$sql2);
    $result2 = mysqli_fetch_all($query2,MYSQLI_ASSOC);
    if (count($result2) > 1) {
        foreach ($result2 as $key => $value) {
        array_push($arr1,$value['port'].'/'.$value['service']);
        }
    }else{
        array_push($arr1,$result2['port'].''.$result2['service']);
    }
    $arr1 = array_values(array_unique(array_filter($arr1)));

    // var_dump(array($domain => $arr,'port' => $arr1));die;
    // var_dump($dataArr);die;
    $sql3 = "SELECT department,details,location FROM `ip_ziyou_guangxi` WHERE bIP = '$bip'";
    $query3 = mysqli_query($conn,$sql3);
    $result3 = mysqli_fetch_all($query3,MYSQLI_ASSOC);
    if (count($result3) > 0) {
        $arrdata = array();
        array_push($arrdata,$result3[0]['department']);
        array_push($arrdata,$result3[0]['details']);
        array_push($arrdata,$result3[0]['location']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));
    };
    $sql4 = "SELECT department,location FROM `ip_ziyou_hainan` WHERE bIP = '$bip'";
    $query4 = mysqli_query($conn,$sql4);
    $result4 = mysqli_fetch_all($query4,MYSQLI_ASSOC);
    if (count($result4) > 0) {
        $arrdata = array();
        array_push($arrdata,$result4[0]['department']);
        array_push($arrdata,$result4[0]['location']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));

    };
    $sql5 = "SELECT location,application FROM `ip_ziyou_hebei` WHERE bip = '$bip'";
    $query5 = mysqli_query($conn,$sql5);
    $result5 = mysqli_fetch_all($query5,MYSQLI_ASSOC);
    if (count($result5) > 0) {
        $arrdata = array();
        array_push($arrdata,$result5[0]['application']);
        array_push($arrdata,$result5[0]['location']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));

    };
    $sql6 = "SELECT department,location FROM `ip_ziyou_henan` WHERE bip = '$bip'";
    $query6 = mysqli_query($conn,$sql6);
    $result6 = mysqli_fetch_all($query6,MYSQLI_ASSOC);
    if (count($result6) > 0) {
        $arrdata = array();
        array_push($arrdata,$result6[0]['department']);
        array_push($arrdata,$result6[0]['location']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));

    };
    $sql7 = "SELECT location,application,tag_1,tag_2 FROM `ip_ziyou_hubei` WHERE bip = '$bip'";
    $query7 = mysqli_query($conn,$sql7);
    $result7 = mysqli_fetch_all($query7,MYSQLI_ASSOC);
    if (count($result7) > 0) {
        $arrdata = array();
        array_push($arrdata,$result7[0]['location']);
        array_push($arrdata,$result7[0]['application']);
        array_push($arrdata,$result7[0]['tag_1']);
        array_push($arrdata,$result7[0]['tag_2']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));
    };
    $sql8 = "SELECT location,application,app_detail FROM `ip_ziyou_hunan` WHERE bip = '$bip'";
    $query8 = mysqli_query($conn,$sql8);
    $result8 = mysqli_fetch_all($query8,MYSQLI_ASSOC);
    if (count($result8) > 0) {
       $arrdata = array();
        array_push($arrdata,$result8[0]['location']);
        array_push($arrdata,$result8[0]['application']);
        array_push($arrdata,$result8[0]['app_detail']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));

    };
    $sql9 = "SELECT location,d_mode,cmcc,use_pattern FROM `ip_ziyou_jiangsu` WHERE bIP = '$bip'";
    $query9 = mysqli_query($conn,$sql9);
    $result9 = mysqli_fetch_all($query9,MYSQLI_ASSOC);
    if (count($result9) > 0) {
       $arrdata = array();
        array_push($arrdata,$result9[0]['location']);
        array_push($arrdata,$result9[0]['d_mode']);
        array_push($arrdata,$result9[0]['cmcc']);
        array_push($arrdata,$result9[0]['use_pattern']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));


    };
    $sql10 = "SELECT location,application,reason,comments FROM `ip_ziyou_qinghai` WHERE bIP = '$bip'";
    $query10 = mysqli_query($conn,$sql10);
    $result10 = mysqli_fetch_all($query10,MYSQLI_ASSOC);
    if (count($result10) > 0) {
        $arrdata = array();
        array_push($arrdata,$result10[0]['location']);
        array_push($arrdata,$result10[0]['application']);
        array_push($arrdata,$result10[0]['reason']);
        array_push($arrdata,$result10[0]['comments']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));
    };
    $sql11 = "SELECT location,application FROM `ip_ziyou_shandong` WHERE bip = '$bip'";
    $query11 = mysqli_query($conn,$sql11);
    $result11 = mysqli_fetch_all($query11,MYSQLI_ASSOC);
    if (count($result11) > 0) {
        $arrdata = array();
        array_push($arrdata,$result11[0]['location']);
        array_push($arrdata,$result11[0]['application']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));
    };
    $sql12 = "SELECT location FROM `ip_ziyou_shanghai` WHERE bIP = '$bip'";
    $query12 = mysqli_query($conn,$sql12);
    $result12 = mysqli_fetch_all($query12,MYSQLI_ASSOC);
    if (count($result12) > 0) {
        $arrdata = array();
        array_push($arrdata,$result12[0]['location']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));
    };
    $sql13 = "SELECT location,comments FROM `ip_ziyou_sichuan` WHERE bIP = '$bip'";
    $query13 = mysqli_query($conn,$sql13);
    $result13 = mysqli_fetch_all($query13,MYSQLI_ASSOC);
    if (count($result13) > 0) {
       $arrdata = array();
        array_push($arrdata,$result13[0]['location']);
        array_push($arrdata,$result13[0]['comments']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));
    };
    $sql14 = "SELECT location,comments FROM `ip_ziyou_tietong` WHERE bip = '$bip'";
    $query14 = mysqli_query($conn,$sql14);
    $result14 = mysqli_fetch_all($query14,MYSQLI_ASSOC);
    if (count($result14) > 0) {
        $arrdata = array();
        array_push($arrdata,$result14[0]['location']);
        array_push($arrdata,$result14[0]['comments']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));
    };
    $sql15 = "SELECT location,application FROM `ip_ziyou_xizang` WHERE bip = '$bip'";
    $query15 = mysqli_query($conn,$sql15);
    $result15 = mysqli_fetch_all($query15,MYSQLI_ASSOC);
    if (count($result15) > 0) {
       $arrdata = array();
        array_push($arrdata,$result15[0]['location']);
        array_push($arrdata,$result15[0]['application']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));
    };
    $sql16 = "SELECT location,application FROM `ip_ziyou_zhejiang` WHERE bip = '$bip'";
    $query16 = mysqli_query($conn,$sql16);
    $result16 = mysqli_fetch_all($query16,MYSQLI_ASSOC);
    if (count($result16) > 0) {
        $arrdata = array();
        array_push($arrdata,$result16[0]['location']);
        array_push($arrdata,$result16[0]['application']);
        $arrdata = array_values(array_unique(array_filter($arrdata)));
    };
    isset($arrdata)? $arrdata = $arrdata: $arrdata = array();

    if (count($arrdata) > 0) {
        if (count($arr1)>0) {
            $arr2 = array($domain => $arr,'端口' => $arr1,'管理信息' => $arrdata);
        }else{
            $arr2 = array($domain => $arr,'管理信息' => $arrdata);
        }
    }else{
        if (count($arr1)>0) {
            $arr2 = array($domain => $arr,'端口' => $arr1);
        }else{
            $arr2 = array($domain => $arr);
        }
    }

    for ($i=1; $i <$num ; $i++) {
       $arr2[$a[$i]]=array();
    }

    $dataArr = json_encode($arr2);
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>graph</title>
    <link rel="stylesheet" href="">
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        img{
            border:0;
        }
        ol, ul ,li{list-style: none;}
        body {
            background:#2a2c3a;
        }
        #submitform {
            width:450px;
            margin: 10px auto;
        }
        #ipname {
                width: 340px;
                height: 30px;
                border-radius: 5px;
                text-indent: 10px;
                border: none;
                font-size: 15px;
        }
        #submit {
                width: 100px;
                height: 30px;
                border-radius: 5px;
                border: none;
        }
    </style>
</head>
<body>
    <form id="submitform" action="index.php" method="post" accept-charset="utf-8" onsubmit="return verify()">
        <input id="ipname" type="text" name='ipname' placeholder="请输入IP" />
        <input id="submit" type="submit" name="">
    </form>
    <div id="graph" style="height:600px;width:1200px;margin:20px auto 0;">

    </div>
    <script type="text/javascript" src="js/echarts.min.js"></script>
    <script type="text/javascript">
    var data = JSON.parse('<?php echo $dataArr;?>');
    var ifip = JSON.parse('<?php echo $ifip;?>');
    var ip = '<?php echo $ip;?>';
    var ipdom = document.getElementById('ipname');
    var submitform = document.getElementById('submit');
    var verify = function(){
        var ip = ipdom.value;
        var re=/^(\d+)\.(\d+)\.(\d+)\.(\d+)$/;//正则表达式
            if(re.test(ip))
            {
               if( RegExp.$1<256 && RegExp.$2<256 && RegExp.$3<256 && RegExp.$4<256){

                // option.series[0].data=dataArray;
                // option.series[0].links=linksArray;
                // option.series[0].categories=categoriesArray;
                // var ipdom = document.getElementById('ipname');
                // var submitform = document.getElementById('submit');
                // ipdom.value = ip;
                // submitform.click();
                return true;
               }

            }else{
                alert('请输入正确IP');
                return false;

            }
    };
    if (ifip == 0) {
        alert('没有查到相关信息，请重新输入');

    };

         var dataArr = [{
                    "name": ip,
                    x: 600,
                    y: 300,
                    fixed:true,
                    "symbolSize": 80,
                    "category": ip,
                    // "draggable": "true"
                    itemStyle: {
                        normal: {
                            borderColor: '#04f2a7',
                            borderWidth: 4,
                            shadowBlur: 10,
                            shadowColor: '#04f2a7',
                            color: '#001c43',
                        }
                    }
                }];
         var dataLinks = [];
         var dataCategories = [];
         for (var h in data) {
            var dt = {};
            var categorie = {};
            var linkstart = {};
            categorie.name = h;
            dt.name=h;
            dt.draggable= true;
            dt.symbolSize= 60;
            dt.category = h;
            if (h == '端口') {
                dt.x=350;
                dt.y=300;
                dt.fixed=true;
            }else if(h == '管理信息'){
                dt.x=600;
                dt.y=100;
                // dt.fixed=true;
            }else if(data[h].length > 0 && h != '管理信息'){
                dt.x=850;
                dt.y=300;
                dt.fixed=true;

            }
            linkstart.source = ip;
            linkstart.target = h;
            dataArr.push(dt);
            dataCategories.push(categorie);
            dataLinks.push(linkstart);
            for (var j = 0; j < data[h].length; j++) {
                var link = {};
                var dtlast = {};
                dtlast.name=data[h][j];
                dtlast.draggable= true;
                dtlast.symbolSize= 40;
                dtlast.category = h;
                link.source = h;
                link.target = data[h][j];
                dataLinks.push(link);
                dataArr.push(dtlast);
            };
         };
         console.log(dataLinks);
         console.log(dataCategories);
         console.log(dataArr);
        var graph = document.getElementById('graph');
        var myChart = echarts.init(graph);

        var yy = 200;
        var yy1 = 250;
        option = {
            // title: {
            //     // text: "IP解读",
            //     top: "top",
            //     left: "middle",
            //     textStyle: {
            //         color: '#4d4d4d'
            //     }
            // },
            tooltip: {
                formatter: '{b}'
            },
            toolbox: {
                show: true,
                right:30,
                feature: {
                    // restore: {
                    //     show: true
                    // },
                    saveAsImage: {
                        show: true
                    }
                }
            },
            backgroundColor: '#2a2c3a',
            animationDuration: 1000,
            animationEasingUpdate: 'quinticInOut',
            // color:['red','yellow','blue','#ccc','#000'],
            series: [{
                name: 'IP分析',
                type: 'graph',
                cursor:'pointer',
                focusNodeAdjacency:false,//是否在鼠标移到节点上的时候突出显示节点以及节点的边和邻接节点。
                layout: 'force',
                // edgeSymbol: ['circle', 'arrow'],
                edgeSymbolSize: [0, 8],
                // 连接线上的文字
                // focusNodeAdjacency: true,
                edgeLabel: {
                    normal: {
                        show: true,
                        textStyle: {
                            fontSize: 14
                        },
                        formatter:function(params){
                            if (params.data.value) {
                                return params.data.value;
                            }else{
                                return ' ';
                            }
                        }
                    }
                },
                force: {
                    repulsion: 1300,//节点之间的斥力因子
                    // gravity: 0.1,//节点受到的向中心的引力因子。该值越大节点越往中心点靠拢。
                    // edgeLength: 100,//边的两个节点之间的距离，这个距离也会受 repulsion
                    layoutAnimation: true,
                },
                data:dataArr,
                links:dataLinks,
                categories: dataCategories,
                roam: true,
                label: {
                    normal: {
                        show: true,
                        formatter: '{b}',
                        position: 'inside',
                        fontSize: 16,
                        fontStyle: '500',
                    }
                },
                lineStyle: {//连线的样式
                    normal: {
                        width: 2,
                        color: '#04f2a7',
                        // color: 'source',
                        curveness: 0,
                        type: "solid"
                    }
                },
                itemStyle: {
                    borderColor: '#04f2a7',
                    borderWidth: 2,
                    shadowBlur: 6,
                    shadowColor: '#04f2a7',
                    color: '#001c43',
                }
            }]
        };
         myChart.setOption(option);
         myChart.on('click',function(parme){
            console.log(parme);
            var ip = parme.name;
            var re=/^(\d+)\.(\d+)\.(\d+)\.(\d+)$/;//正则表达式
            if(re.test(ip))
            {
               if( RegExp.$1<256 && RegExp.$2<256 && RegExp.$3<256 && RegExp.$4<256){

                // option.series[0].data=dataArray;
                // option.series[0].links=linksArray;
                // option.series[0].categories=categoriesArray;
                var ipdom = document.getElementById('ipname');
                var submitform = document.getElementById('submit');
                ipdom.value = ip;
                console.log(submitform);
                submitform.click();
               }

            }

         })
         myChart.on('mouseup',function(params){
            var option=myChart.getOption();
            option.series[0].data[params.dataIndex].x=params.event.offsetX;
            option.series[0].data[params.dataIndex].y=params.event.offsetY;
            option.series[0].data[params.dataIndex].fixed=true;
            myChart.setOption(option);
            });


         // console.log(dataArr);
         // console.log(dataLinks);
         // console.log(dataCategories);
    </script>
</body>
</html>