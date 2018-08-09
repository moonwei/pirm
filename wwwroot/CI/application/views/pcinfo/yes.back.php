<!-- <!DOCTYPE html>
<html>
<head>
	<title><?php echo $departs->name."  确认计算机配置"; ?>  </title>
	<link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/static/js/jquery.1.9.0.js"></script>
    <script type="text/javascript" src="/static/js/json2.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=8" > -->
<!-- 	<h1> <?php echo $title; ?> </h1> -->
<!-- <script type="text/javascript" src="/static/js/getpcinfo.js"></script> -->
<script type="text/javascript">


    var net1;
    var disk1;
    var cpu_name;
    var cpu_id
    var memDx_size;
    var mainBoard_name;


    var locator = new ActiveXObject("WbemScripting.SWbemLocator");
    var service = locator.ConnectServer(".");


    function net() {
        var properties = service.ExecQuery("SELECT * FROM Win32_NetworkAdapterConfiguration WHERE IPEnabled=TRUE");
        net1 = new Enumerator(properties);
    }

    function cpu() { //cpu 信息
        var properties = service.ExecQuery("SELECT * FROM Win32_Processor");
        var cpuarr = new Enumerator(properties);
        // for (p in e.item()) {
        //     cpu_id = e[p].cpu_id;
        //     cpu_name = e[p].cpu_name;
        // }
        for (; !cpuarr.atEnd(); cpuarr.moveNext()) {
            var p = cpuarr.item();
            cpu_name = p.Name;
            cpu_id = p.ProcessorID;
        }
    }
    //内存信息
    function raminfo() {
        var system = new Enumerator(service.ExecQuery("SELECT * FROM Win32_ComputerSystem")).item();
        var physicMenCap = Math.ceil(system.TotalPhysicalMemory / 1024 / 1024);
        //内存信息
        var memory = new Enumerator(service.ExecQuery("SELECT * FROM Win32_PhysicalMemory"));
        for (var mem = [], i = 0; !memory.atEnd(); memory.moveNext()) {
            mem[i++] = {
                cap: memory.item().Capacity / 1024 / 1024,
                speed: memory.item().Speed
            };
        }
        var info = "<table border=1>";
        info += "<tr bgcolor='#CDEDED' style='font-weight: bold;' ><td width='450'>内存信息 </td></tr>";
        info += "<tr style='color: red'><td >内存总量：";
        memDX = 0;
        for (var mi = 0; mi < mem.length; mi++) {
            memDX += mem[mi].cap;
        }
        memDx_size = memDX;
    }

    function mainBoard() { //主板信息
        var info;
        var properties = service.ExecQuery("SELECT * FROM Win32_BaseBoard");
        var e = new Enumerator(properties);
        mainBoard_name = e.item().Manufacturer;
        mainBoard_id = e.item().SerialNumber;
    }
    // 获取操作系统信息
    function osinfo() {
        var properties = service.ExecQuery("SELECT * FROM Win32_OperatingSystem");
        var e = new Enumerator(properties);
        osinfo1 = e.item();
    }

    function disk() { //硬盘驱动器
        var properties = service.ExecQuery("SELECT * FROM Win32_DiskDrive");
        disk1 = new Enumerator(properties);
    }

    
    $(document).ready(function() 
    {
        osinfo();
        disk();
        net();
        cpu();
        raminfo();
        mainBoard();
        var i = 0;
        var p = "";
        var disks = new Array();
        var nets = new Array();



        $("#system").val("正确");
        $("#data2").append("<tr><td>CPU</td><td>型号</td><td>" + cpu_name +
            "</td></tr><input type='hidden' name='cpu_name' value='" + cpu_name + "'>");
        $("#data2").append("<tr><td>内存</td><td>内存总量(MB)</td><td>" + memDx_size +
            "</td></tr><input type='hidden' name='memDx' value='" + memDx_size + "'>");
        $("#data2").append("<tr><td>主板</td><td>制造商</td><td> " + mainBoard_name +
            "</td></tr><input type='hidden' name='mainBoard_name' value='" + mainBoard_name + "'>");
        $("#data2").append("<tr><td>操作系统</td><td>版本</td><td> " + osinfo1.Caption + ' - ' + osinfo1.OSArchitecture +
            "</td></tr><input type='hidden' name='system_info' value='" + osinfo1.Caption + ' - ' + osinfo1.OSArchitecture + "'>");
        //统计磁盘的信息
        i = 0;
        for (; !disk1.atEnd(); disk1.moveNext()) {
            p = disk1.item();
            disk = new Object();
            disk.Interface = p.InterfaceType;
            disk.Model = p.Model;
            disk.Name = p.Name;
            disk.Size = (p.Size / 1073741824).toFixed(2);
            disks.push(disk);


            $("#data2").append("<tr><td>硬盘驱动器" + i + "</td><td>类型</td><td> " + p.InterfaceType +
                "</td></tr><input type='hidden' name='disk_lx' value='" + p.InterfaceType + "'>");
            $("#data2").append("<tr><td>硬盘驱动器" + i + "</td><td>制造商</td><td> " + p.Model +
                "</td></tr><input type='hidden' name='disk_cj' value='" + p.Model + "'>");
            $("#data2").append("<tr><td>硬盘驱动器" + i + "</td><td>名字</td><td> " + p.Name +
                "</td></tr><input type='hidden' name='disk_name' value='" + p.Name + "'>");
            $("#data2").append("<tr><td>硬盘驱动器" + i + "</td><td>大小</td><td> " + (p.Size / 1024 / 1024 / 1024)
                .toFixed(2) + "GB</td></tr><input type='hidden' name='disk_size' value='" + (p.Size /1024 / 1024 / 1024).toFixed(2) + "'>");
            i = i + 1;
        };

        //统计网卡信息
        i = 0;
        for (; !net1.atEnd(); net1.moveNext()) {
            p = net1.item();
            net = new Object();
            net.Caption = p.Caption(0);
            net.IPAddress = p.IPAddress(0);
            net.IPSubnet = p.IPSubnet(0);
            net.DefaultIPGateway = p.DefaultIPGateway(0);
            net.MAC = p.MACAddress(0);
            nets.push(net);


            $("#data2").append("<tr><td>网络适配器" + i + "</td><td>网卡描述</td><td> " + p.Caption(0) +
                "</td></tr><input type='hidden' name='net_des' value='" + p.Caption(0) + "'>");
            $("#data2").append("<tr><td>网络适配器" + i + "</td><td>IP</td><td> " + p.IPAddress(0) +
                "</td></tr><input type='hidden' name='net_ip' value='" + p.IPAddress(0) + "'>");
            $("#data2").append("<tr><td>网络适配器" + i + "</td><td>子网掩码</td><td> " + p.IPSubnet(0) +
                "</td></tr><input type='hidden' name='net_sub' value='" + p.IPSubnet(0) + "'>");
            $("#data2").append("<tr><td>网络适配器" + i + "</td><td>网关</td><td> " + p.DefaultIPGateway(0) +
                "</td></tr><input type='hidden' name='net_gate' value='" + p.DefaultIPGateway(0) + "'>");
            $("#data2").append("<tr><td>网络适配器" + i + "</td><td>MAC</td><td> " + p.MACAddress(0) +
                "</td></tr><input type='hidden' name='net_mac' value='" + p.MACAddress(0) + "'>");
            i = i + 1;
        };


        pcinfo = new Object();
        pcinfo.cpuname = cpu_name;
        pcinfo.cpu_id = cpu_id;
        pcinfo.memsize = memDx_size;
        pcinfo.boardname = mainBoard_name;
        pcinfo.board_id = mainBoard_id;
        pcinfo.osCaption = osinfo1.Caption;
        if (osinfo1.osArchitecture == undefined){pcinfo.osArchitecture = "XP-32位"}else{pcinfo.osArchitecture = osinfo1.osArchitecture;};
        
        pcinfo.nets = nets;
        pcinfo.disks = disks;
        pcjson = JSON.stringify(pcinfo);
        

        $("#pcjson").val(pcjson);

//发送按钮被按下时发送json信息         
$("#bsend").click(function() {
	$.post('disp.php',
		{
            'pcjson' :pcjson,
            'belong2': "<?PHP echo $departs->did ?>"
        },
		function(data,status){
			alert("数据: "+data +"\n状态： "+status);
		});
});
});

    function checkform(theForm) {
        if (document.getElementById("tongyi").checked) {} else {
            alert("请选择同意资料准确！");
            return false;
        }
        if (form1.system.value != "正确") {
            alert("没有检测到系统信息,请检查信任站点设置，并用 IE系统自带浏览器打开本页面如提示安装插件请点同意！");
            return false;
        }
        if (form1.sy_name.value == "") {
            alert("请输入使用人姓名！");
            form1.sy_name.focus();
            return false;
        }
        if (form1.sy_phone.value == "") {
            alert("请输入使用人联系号码！");
            form1.sy_phone.focus();
            return false;
        } else {

            pcinfo.sy_name=form1.sy_name.value;
            pcinfo.sy_phone=form1.sy_phone.value;
            pcinfo.sy_bm="<?php echo $departs->did; ?>";
            pcinfo.zc_bh=form1.zc_bh.value;
            pcjson = JSON.stringify(pcinfo);
            
            $("#pcjson").val(pcjson);
            return true;
        }
    }

    </script>
</head>

<body>
			<div class="container">
 	        	<h3><?php echo "部门名称： ".$departs->name.'( '.$departs->did.' )';  ?></h3><br/>
<!--  	        	<button id="bsend" type="button">发送 json 数据</button> -->
 
 	        </div>


    <form class="form-horizontal" name="form1" method="POST" action="/index.php/pcinfo/add" onsubmit="return checkform(this)">
        <div class="container">

            <fieldset style="width:600">
                <legend>使用者信息录入</legend>
                <div class="form-group">
                    <label class=" control-label">电脑信息收集是否正确</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="system" id="system" value="没有检测到系统信息,请检查设置" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">使用人</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="sy_name" value="空闲" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">使用人手机号码</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="sy_phone" value="15637560000"/>
                    </div>
                </div>
<!--                 <div class="form-group">
                    <label class=" control-label">使用部门</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="sy_bm" value="空余" readonly="readonly">
                            <option selected ="selected" value="<?php echo $departs->did ?>"><?php echo $departs->name ?> </option>
                        </select>
                    </div>
                </div> -->
                <div class="form-group">
                    <label class=" control-label">资产编号：（如有则填上）</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="zc_bh" value="000000" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input  type="checkbox" name="tongyi" id="tongyi"> 以上资料真实有效，勾选同意
                            </label>
                        </div>
                    </div>
                </div>


<div class="form-group">
    <label class=" control-label">生成的JSON字符串:</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="6" name="pcjson" id="pcjson" value="json"></textarea>
        </div>

</div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
                <span class="help-block">如有问题请联系15637561169</span>
            </fieldset>
            <div class="row">
                <h3>计算机终端信息概要</h3>
            </div>
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    硬件名称
                                </th>
                                <th>
                                    硬件参数
                                </th>
                                <th>
                                    硬件参数值
                                </th>
                            </tr>
                        </thead>
                        <tbody id="data2">
                        </tbody>
                    </table>
                </div>

        </div>
    </form>

