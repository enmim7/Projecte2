$servername=$args[0]
$envname=$args[1]
$Pass = ConvertTo-SecureString $envname -AsPlainText -Force 
Set-ADAccountPassword -Identity $servername -NewPassword $pass –Reset