<script>
    function DeleteUser(user){
        document.getElementById("id_user").value = user.id_user;
        document.getElementById("dataUsername").innerHTML = ": "+user.NAMA;
        document.getElementById("dataNIP").innerHTML = ": "+user.NIP;
    }
    function ResetPasswordUser(user){
        document.getElementById('id_user_reset').value = user.id_user;
    }
</script>