<div class="container">
    <h3><?php echo "部门名称： ".$departs->name.'( '.$departs->did.' )';  ?></h3><br/>
</div>


    <form class="form-horizontal" name="form1" method="POST" action="/index.php/pcinfo/add" onsubmit="return checkform(this)">
        <div class="container">

            <fieldset style="width:600">
                <legend>使用者信息录入</legend>
                <div class="form-group">
                    <label class=" control-label">电脑信息收集是否正确</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="system" id="system" value="没有检测到系统信息,请检查设置" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">使用人</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="sy_name" value="空闲" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">使用人手机号码</label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="sy_phone" value="15637560000"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">资产编号：（如有则填上）</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="zc_bh" value="000000" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <div class="checkbox">
                            <label>
                                <input  type="checkbox" name="tongyi" id="tongyi"> 以上资料真实有效，勾选同意
                            </label>
                        </div>
                    </div>
                </div>


<div class="form-group" hidden="hidden">
    <label class=" control-label">生成的JSON字符串:</label>
        <div class="col-md-10">
            <textarea class="form-control" rows="6" name="pcjson" id="pcjson" value="json"></textarea>
        </div>

</div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
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

    function cpu() { /*cpu 信息 */
        var properties = service.ExecQuery("SELECT * FROM Win32_Processor");
        var cpuarr = new Enumerator(properties);

        for (; !cpuarr.atEnd(); cpuarr.moveNext()) {
            var p = cpuarr.item();
            cpu_name = p.Name;
            cpu_id = p.ProcessorID;
        }
    }
    /* 内存信息 */
    function raminfo() {
        var system = new Enumerator(service.ExecQuery("SELECT * FROM Win32_ComputerSystem")).item();
        var physicMenCap = Math.ceil(system.TotalPhysicalMemory / 1024 / 1024);
 
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

    function mainBoard() { /* 主板信息 */
        var info;
        var properties = service.ExecQuery("SELECT * FROM Win32_BaseBoard");
        var e = new Enumerator(properties);
        mainBoard_name = e.item().Manufacturer;
        mainBoard_id = e.item().SerialNumber;
    }
    /* 获取操作系统信息 */
     function osinfo() {
        var properties = service.ExecQuery("SELECT * FROM Win32_OperatingSystem");
        var e = new Enumerator(properties);
        osinfo1 = e.item();
    }

    function disk() { /* 硬盘驱动器 */
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
            "</td></tr>");
        $("#data2").append("<tr><td>内存</td><td>内存总量(MB)</td><td>" + memDx_size +
            "</td></tr>");
        $("#data2").append("<tr><td>主板</td><td>制造商</td><td> " + mainBoard_name +
            "</td></tr>");
        $("#data2").append("<tr><td>操作系统</td><td>版本</td><td> " + osinfo1.Caption +
            "</td></tr>");
        /* 统计磁盘的信息 */
        i = 0;
        for (; !disk1.atEnd(); disk1.moveNext()) {
            p = disk1.item();
            disk = new Object();
            disk.Interface = p.InterfaceType;
            disk.Model = p.Model;
            disk.Name = p.Name;
            disk.Size = (p.Size / 1073741824).toFixed(2);
            disks.push(disk);


            $("#data2").append("<tr><td>硬盘驱动器" + i + "</td><td>类型</td><td> " + p.InterfaceType + "</td></tr>");
            $("#data2").append("<tr><td>硬盘驱动器" + i + "</td><td>制造商</td><td> " + p.Model + "</td></tr>");
            $("#data2").append("<tr><td>硬盘驱动器" + i + "</td><td>名字</td><td> " + p.Name + "</td></tr>");
            $("#data2").append("<tr><td>硬盘驱动器" + i + "</td><td>大小</td><td> " + (p.Size / 1024 / 1024 / 1024).toFixed(2) + "GB</td></tr>");
            i = i + 1;
        };

        /* 统计网卡信息 */
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


            $("#data2").append("<tr><td>网络适配器" + i + "</td><td>网卡描述</td><td> " + p.Caption(0) + "</td></tr>");
            $("#data2").append("<tr><td>网络适配器" + i + "</td><td>IP</td><td> " + p.IPAddress(0) + "</td></tr>");
            $("#data2").append("<tr><td>网络适配器" + i + "</td><td>子网掩码</td><td> " + p.IPSubnet(0) + "</td></tr>");
            $("#data2").append("<tr><td>网络适配器" + i + "</td><td>网关</td><td> " + p.DefaultIPGateway(0) + "</td></tr>");
            $("#data2").append("<tr><td>网络适配器" + i + "</td><td>MAC</td><td> " + p.MACAddress(0) + "</td></tr>");
            i = i + 1;
        };


        pcinfo = new Object();
        pcinfo.cpuname = cpu_name;
        pcinfo.cpu_id = cpu_id;
        pcinfo.memsize = memDx_size;
        pcinfo.boardname = mainBoard_name;
        pcinfo.osCaption = osinfo1.Caption;
        pcinfo.osArchitecture = osinfo1.osArchitecture;
        pcinfo.nets = nets;
        pcinfo.disks = disks;
        pcjson = JSON.stringify(pcinfo);
        

        $("#pcjson").val(pcjson);

/* 发送按钮被按下时发送json信息         
    $("#bsend").click(function() {
       $.post('disp.php',
        {
             'pcjson' :pcjson,
            'belong2': "<?PHP echo $departs->did ?>",
        },
        function(data,status){
            alert("数据: "+data +"\n状态： "+status);
        })
})*/
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