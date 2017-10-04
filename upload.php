<?php
    $file = 'video.mp4'; // local file
    $remote_file = 'video.mp4'; // remote file

    $ftp_server = 'ftp.example.com';
    $ftp_port = 21;
    $ftp_user_name = 'user';
    $ftp_user_pass = 'password';

    // basic connection
    $conn_id = ftp_connect($ftp_server, $ftp_port) or die("No se pudo conectar a $ftp_server");

    // login with user and password
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

    // validate connection
    if ((!$conn_id) || (!$login_result)) {
        echo "FTP connection has failed!";
        echo "Attempted to connect to $ftp_server for user $ftp_user_name";
        return false;
    }
    else {
        echo "Connected to $ftp_server, for user $ftp_user_name";
    }

    // set passive mode
    ftp_pasv($conn_id, true);
    
    // load file
    if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {
        echo "se ha cargado $file con éxito\n";
    } else {
        echo "Hubo un problema durante la transferencia de $file\n";
    }

    // close ftp connectio 
    ftp_close($conn_id);
?>
