<?php ini_set('display_errors', 0);ob_start();date_default_timezone_set('Asia/Shanghai');$stime = date('Y-m-d H:i:s');$dt = round(@disk_total_space(".")/(1024*1024*1024),3);$df = round(@disk_free_space(".")/(1024*1024*1024),3);$du = $dt-$df;$hdPercent = (floatval($dt)!=0)?round($du/$dt*100,2):0;$load = $sysInfo['loadAvg'];if($sysInfo['memTotal']<1024){$memTotal = $sysInfo['memTotal']." M";$mt = $sysInfo['memTotal']." M";$mu = $sysInfo['memUsed']." M";$mf = $sysInfo['memFree']." M";$mc = $sysInfo['memCached']." M";$mb = $sysInfo['memBuffers']." M";$st = $sysInfo['swapTotal']." M";$su = $sysInfo['swapUsed']." M";$sf = $sysInfo['swapFree']." M";$swapPercent = $sysInfo['swapPercent'];$memRealUsed = $sysInfo['memRealUsed']." M";$memRealFree = $sysInfo['memRealFree']." M";$memRealPercent = $sysInfo['memRealPercent'];$memPercent = $sysInfo['memPercent'];$memCachedPercent = $sysInfo['memCachedPercent'];}else{$memTotal = round($sysInfo['memTotal']/1024,3)." G";$mt = round($sysInfo['memTotal']/1024,3)." G";$mu = round($sysInfo['memUsed']/1024,3)." G";$mf = round($sysInfo['memFree']/1024,3)." G";$mc = round($sysInfo['memCached']/1024,3)." G";$mb = round($sysInfo['memBuffers']/1024,3)." G";$st = round($sysInfo['swapTotal']/1024,3)." G";$su = round($sysInfo['swapUsed']/1024,3)." G";$sf = round($sysInfo['swapFree']/1024,3)." G";$swapPercent = $sysInfo['swapPercent'];$memRealUsed = round($sysInfo['memRealUsed']/1024,3)." G";$memRealFree = round($sysInfo['memRealFree']/1024,3)." G"; $memRealPercent = $sysInfo['memRealPercent'];$memPercent = $sysInfo['memPercent'];$memCachedPercent = $sysInfo['memCachedPercent'];}if ($_GET['act'] == "rt"){$arr=array('useSpace'=>"$du",'freeSpace'=>"$df",'hdPercent'=>"$hdPercent",'barhdPercent'=>"$hdPercent%",'TotalMemory'=>"$mt",'UsedMemory'=>"$mu",'FreeMemory'=>"$mf",'CachedMemory'=>"$mc",'Buffers'=>"$mb",'TotalSwap'=>"$st",'swapUsed'=>"$su",'swapFree'=>"$sf",'loadAvg'=>"$load",'uptime'=>"$uptime",'freetime'=>"$freetime",'bjtime'=>"$bjtime",'stime'=>"$stime",'memRealPercent'=>"$memRealPercent",'memRealUsed'=>"$memRealUsed",'memRealFree'=>"$memRealFree",'memPercent'=>"$memPercent%",'memCachedPercent'=>"$memCachedPercent",'barmemCachedPercent'=>"$memCachedPercent%",'swapPercent'=>"$swapPercent",'barmemRealPercent'=>"$memRealPercent%",'barswapPercent'=>"$swapPercent%",'NetOut2'=>"$NetOut[2]",'NetOut3'=>"$NetOut[3]",'NetOut4'=>"$NetOut[4]",'NetOut5'=>"$NetOut[5]",'NetOut6'=>"$NetOut[6]",'NetOut7'=>"$NetOut[7]",'NetOut8'=>"$NetOut[8]",'NetOut9'=>"$NetOut[9]",'NetOut10'=>"$NetOut[10]",'NetInput2'=>"$NetInput[2]",'NetInput3'=>"$NetInput[3]",'NetInput4'=>"$NetInput[4]",'NetInput5'=>"$NetInput[5]",'NetInput6'=>"$NetInput[6]",'NetInput7'=>"$NetInput[7]",'NetInput8'=>"$NetInput[8]",'NetInput9'=>"$NetInput[9]",'NetInput10'=>"$NetInput[10]",'NetOutSpeed2'=>"$NetOutSpeed[2]",'NetOutSpeed3'=>"$NetOutSpeed[3]",'NetOutSpeed4'=>"$NetOutSpeed[4]",'NetOutSpeed5'=>"$NetOutSpeed[5]",'NetInputSpeed2'=>"$NetInputSpeed[2]",'NetInputSpeed3'=>"$NetInputSpeed[3]",'NetInputSpeed4'=>"$NetInputSpeed[4]",'NetInputSpeed5'=>"$NetInputSpeed[5]");$jarr=json_encode($arr); $_GET['callback'] = htmlspecialchars($_GET['callback']);echo $_GET['callback'],'(',$jarr,')';exit;}?>
<script language="JavaScript"type="text/javascript"src="phpcustom_info\phpcustom.com.js"></script>
<script type="text/javascript">$(document).ready(function(){getJSONData()});var OutSpeed2=<?php echo floor($NetOutSpeed[2])?>;var OutSpeed3=<?php echo floor($NetOutSpeed[3])?>;var OutSpeed4=<?php echo floor($NetOutSpeed[4])?>;var OutSpeed5=<?php echo floor($NetOutSpeed[5])?>;var InputSpeed2=<?php echo floor($NetInputSpeed[2])?>;var InputSpeed3=<?php echo floor($NetInputSpeed[3])?>;var InputSpeed4=<?php echo floor($NetInputSpeed[4])?>;var InputSpeed5=<?php echo floor($NetInputSpeed[5])?>;function getJSONData(){setTimeout("getJSONData()",1000);$.getJSON('?act=rt&callback=?',displayData)}function ForDight(Dight,How){if(Dight<0){var Last=0+"B/s"}else if(Dight<1024){var Last=Math.round(Dight*Math.pow(10,How))/Math.pow(10,How)+"B/s"}else if(Dight<1048576){Dight=Dight/1024;var Last=Math.round(Dight*Math.pow(10,How))/Math.pow(10,How)+"K/s"}else{Dight=Dight/1048576;var Last=Math.round(Dight*Math.pow(10,How))/Math.pow(10,How)+"M/s"}return Last}function displayData(dataJSON){$("#useSpace").html(dataJSON.useSpace);$("#freeSpace").html(dataJSON.freeSpace);$("#hdPercent").html(dataJSON.hdPercent);$("#barhdPercent").width(dataJSON.barhdPercent);$("#TotalMemory").html(dataJSON.TotalMemory);$("#UsedMemory").html(dataJSON.UsedMemory);$("#FreeMemory").html(dataJSON.FreeMemory);$("#CachedMemory").html(dataJSON.CachedMemory);$("#Buffers").html(dataJSON.Buffers);$("#TotalSwap").html(dataJSON.TotalSwap);$("#swapUsed").html(dataJSON.swapUsed);$("#swapFree").html(dataJSON.swapFree);$("#swapPercent").html(dataJSON.swapPercent);$("#loadAvg").html(dataJSON.loadAvg);$("#uptime").html(dataJSON.uptime);$("#freetime").html(dataJSON.freetime);$("#stime").html(dataJSON.stime);$("#bjtime").html(dataJSON.bjtime);$("#memRealUsed").html(dataJSON.memRealUsed);$("#memRealFree").html(dataJSON.memRealFree);$("#memRealPercent").html(dataJSON.memRealPercent);$("#memPercent").html(dataJSON.memPercent);$("#barmemPercent").width(dataJSON.memPercent);$("#barmemRealPercent").width(dataJSON.barmemRealPercent);$("#memCachedPercent").html(dataJSON.memCachedPercent);$("#barmemCachedPercent").width(dataJSON.barmemCachedPercent);$("#barswapPercent").width(dataJSON.barswapPercent);$("#NetOut2").html(dataJSON.NetOut2);$("#NetOut3").html(dataJSON.NetOut3);$("#NetOut4").html(dataJSON.NetOut4);$("#NetOut5").html(dataJSON.NetOut5);$("#NetOut6").html(dataJSON.NetOut6);$("#NetOut7").html(dataJSON.NetOut7);$("#NetOut8").html(dataJSON.NetOut8);$("#NetOut9").html(dataJSON.NetOut9);$("#NetOut10").html(dataJSON.NetOut10);$("#NetInput2").html(dataJSON.NetInput2);$("#NetInput3").html(dataJSON.NetInput3);$("#NetInput4").html(dataJSON.NetInput4);$("#NetInput5").html(dataJSON.NetInput5);$("#NetInput6").html(dataJSON.NetInput6);$("#NetInput7").html(dataJSON.NetInput7);$("#NetInput8").html(dataJSON.NetInput8);$("#NetInput9").html(dataJSON.NetInput9);$("#NetInput10").html(dataJSON.NetInput10);$("#NetOutSpeed2").html(ForDight((dataJSON.NetOutSpeed2-OutSpeed2),3));OutSpeed2=dataJSON.NetOutSpeed2;$("#NetOutSpeed3").html(ForDight((dataJSON.NetOutSpeed3-OutSpeed3),3));OutSpeed3=dataJSON.NetOutSpeed3;$("#NetOutSpeed4").html(ForDight((dataJSON.NetOutSpeed4-OutSpeed4),3));OutSpeed4=dataJSON.NetOutSpeed4;$("#NetOutSpeed5").html(ForDight((dataJSON.NetOutSpeed5-OutSpeed5),3));OutSpeed5=dataJSON.NetOutSpeed5;$("#NetInputSpeed2").html(ForDight((dataJSON.NetInputSpeed2-InputSpeed2),3));InputSpeed2=dataJSON.NetInputSpeed2;$("#NetInputSpeed3").html(ForDight((dataJSON.NetInputSpeed3-InputSpeed3),3));InputSpeed3=dataJSON.NetInputSpeed3;$("#NetInputSpeed4").html(ForDight((dataJSON.NetInputSpeed4-InputSpeed4),3));InputSpeed4=dataJSON.NetInputSpeed4;$("#NetInputSpeed5").html(ForDight((dataJSON.NetInputSpeed5-InputSpeed5),3));InputSpeed5=dataJSON.NetInputSpeed5}</script>