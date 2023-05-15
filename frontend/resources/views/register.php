<form action="../../request.php" method="POST">
    <input type="hidden" name="role_id" value="1">
    <input type="hidden" name="action" value="register">
    <label for="name">Nome</label><br>
    <input type="text" name="name" id="name" placeholder="Digite o nome completo"><br><br>
    <label for="email">E-mail</label><br>
    <input type="email" name="email" id="email" placeholder="Digite o e-mail"><br><br>
    <label for="password">Senha:</label><br>
    <input type="password" name="password" id="password" placeholder="Digite a senha"><br><br>
    <label for="password">Confirmação de senha:</label><br>
    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirme a senha"><br><br>
    <button style="border: 1px solid black; background-color: green;">Registrar</button>
</form>