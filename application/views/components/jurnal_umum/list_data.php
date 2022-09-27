<?php
$sum_debit = 0;
$sum_kredit = 0;
$simbol = 'Rp';
?>
<?php foreach ($list_request as $lr) { ?>
    <tr>
        <td colspan="2"><span><?php echo $lr['kode_account'] . ' - ' . $lr['nama_account']; ?></span></td>
        <td class="text-right"><span><?php echo $lr['debit'] == null ? '' : $lr['simbol'] . number_format($lr['debit'], 0, ",", "."); ?></span></td>
        <td class="text-right"><span><?php echo $lr['kredit'] == null ? '' : $lr['simbol'] . number_format($lr['kredit'], 0, ",", "."); ?></span></td>
        <td><span><?php echo $lr['uraian']; ?></span></td>
    </tr>
    <?php
    $sum_debit = $sum_debit + $lr['debit'];
    $sum_kredit = $sum_kredit + $lr['kredit'];
    $simbol = $lr['simbol'];
}
?>
<tr>
    <td colspan="3" class="text-right"><b>Total Debit</b></td>
    <td class="text-right"><?php echo $simbol . number_format($sum_debit, 0, ",", ".") ?></td>
    <td colspan="2"></td>
</tr>
<tr>
    <td colspan="3" class="text-right border-top-0"><b>Total Kredit</b></td>
    <td class="text-right border-top-0"><?php echo $simbol . number_format($sum_kredit, 0, ",", ".") ?></td>
    <td colspan="2" class="border-top-0"></td>
</tr>
<tr>
    <td colspan="3" class="text-right border-top-0"><b>Out of Balance</b></td>
    <td class="text-right border-top-0"><?php echo $simbol . number_format(($sum_debit - $sum_kredit), 0, ",", ".") ?></td>
    <td colspan="2" class="border-top-0"></td>
</tr>