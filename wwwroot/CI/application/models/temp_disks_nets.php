    if ( $disksi>0 ){
    $DISK_LX1 = $disks[0]->Interface,
    $DISK_CJ1 = $disks[0]->Model,
    $DISK_NAME1 = $disks[0]->Name,
    $DISK_SIZE1 = $disks[0]->Size,
        }
        if ($disksi>1) {
    $DISK_LX2 = $disks[1]->Interface,
    $DISK_CJ2 = $disks[1]->Model,
    $DISK_NAME2 = $disks[1]->Name,
    $DISK_SIZE2 = $disks[1]->Size,
        }
        if ($disksi>2) {
    $DISK_LX3 = $disks[2]->Interface,
    $DISK_CJ3 = $disks[2]->Model,
    $DISK_NAME3 = $disks[2]->Name,
    $DISK_SIZE3 = $disks[2]->Size,
        }
        if ($disksi>3) {
    $DISK_LX4 = $disks[3]->Interface,
    $DISK_CJ4 = $disks[3]->Model,
    $DISK_NAME4 = $disks[3]->Name,
    $DISK_SIZE4 = $disks[3]->Size,
        }

    if ($netsi>0){
$DES1 = $nets[0]->Caption,
$IP1 = $nets[0]->IPaddress,
$SUB1 = $nets[0]->IPSubnet,
$GATE1 = $nets[0]->DefaultIPGateway,
$MAC1 = $nets[0]->MAC,
             }
    if ($netsi>1) {   
$DES2 = $nets[1]->Caption,
$IP2 = $nets[1]->IPaddress,
$SUB2 = $nets[1]->IPSubnet,
$GATE2 = $nets[1]->DefaultIPGateway,
$MAC2 = $nets[1]->MAC,
        

                }
    if ($netsi>2) {
$DES3 = $nets[2]->Caption,
$IP3 = $nets[2]->IPaddress,
$SUB3 = $nets[2]->IPSubnet,
$GATE3 = $nets[2]->DefaultIPGateway,
$MAC3 = $nets[2]->MAC,
        }
    if ($netsi>3) {
$DES4 = $nets[3]->Caption,
$IP4 = $nets[3]->IPaddress,
$SUB4 = $nets[3]->IPSubnet,
$GATE4 = $nets[3]->DefaultIPGateway,
$MAC4 = $nets[3]->MAC,
        }