    var net1;
    var disk1;
    var cpu_name;
    var cpu_id
    var memDx_size;
    var mainBoard_name;


    var locator = new ActiveXObject("WbemScripting.SWbemLocator");
    var service = locator.ConnectServer(".");


    function net() {
        var netcards = service.ExecQuery("SELECT * FROM Win32_NetworkAdapterConfiguration WHERE IPEnabled=TRUE");
        net1 = new Enumerator(netcards);
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
        // memDx_size = memDX;
        return memDx;
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

    
    $(document).ready(function() {
        osinfo();
        disk();
        net();
        cpu();
        memDX = raminfo();
        mainBoard();
        var i = 0;
        var p = "";
        var disks = new Array();
        var nets = new Array();

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


            i = i + 1;
        };

        pcinfo = new Object();
        pcinfo.cpuname = cpu_name;
        pcinfo.memsize = memDx_size;
        pcinfo.boardname = mainBoard_name;
        pcinfo.osCaption = osinfo1.Caption;
        pcinfo.osArchitecture = osinfo1.osArchitecture;
        pcinfo.nets = nets;
        pcinfo.disks = disks;
        pcjson = JSON.stringify(pcinfo);
        
        $("#pcjson").val(pcjson);
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
        }
        if (form1.sy_bm.value == "") {
            alert("请选择使用部门！");
            form1.sy_bm.focus();
            return false;
        } else {
            return true;
        }
    }
    </script>