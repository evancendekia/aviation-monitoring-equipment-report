<?php $sum = 0;?>
<?php foreach($list_request as $lr){?>
    <tr>
        <td><span><?php echo $lr['no_unit'];?></span></td>
        <td><span><?php echo $lr['kode_anggaran'];?></span></td>
        <td><span><?php echo $lr['nama_akun'];?></span></td>
        <td><span><?php echo $lr['unit_kerja'];?></span></td>
        <td><span><?php echo $lr['unit_bisnis'];?></span></td>
        <td class="text-right"><span><?php echo $lr['jumlah'] == null ? '' : number_format($lr['jumlah'],0,",",".");?></span></td>
        <td><span><?php echo $lr['keterangan'];?></span></td>
        <td class="align-middle text-center">
            <button type="button" class="btn btn-outline-danger btn-sm px-2" data-toggle="modal"  data-target="#DeleteDetailModal" onClick='DeleteDetail(<?php echo json_encode($lr);?>)'>
                <i class="fa fa-trash"></i>
                Delete
            </button>
        </td>
    </tr>
<?php $sum= $sum + $lr['jumlah']; }?>
<tr>
    <td colspan="5" class="text-right"><b>Total</b></td>
    <td class="text-right"><?php echo number_format($sum,0,",",".")?></td>
    <td colspan="2"></td>
</tr>