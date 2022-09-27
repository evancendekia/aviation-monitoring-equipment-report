<tbody >
    <tr>
        <td><input type='text' id='unit' class='form-control f-12' onclick='ChooseUnit()'></td>
        <td><input type='text' id='kode_anggaran' onclick='ChooseKodeAnggaran()'class='form-control f-12'></td>
        <td><input type='text' id='nama_akun' class='form-control f-12'></td>
        <td><input type='text' id='unit_kerja' class='form-control f-12'></td>
        <td><input type='text' id='unit_bisnis' class='form-control f-12'></td>
        <td><input type='text' id='jumlah'class='form-control f-12'></td>
        <td><input type='text' id='keterangan'class='form-control f-12'></td>
        <td><button type='button' onclick="SubmitDataListRequestAnggaran('<?php echo $pa[0]['id_pa'];?>')" class='btn btn-block btn-secondary'>Submittt</button></td>
    </tr>
</tbody>