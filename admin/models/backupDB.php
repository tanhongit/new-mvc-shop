<?php
function backup_db()
{
    global $linkconnectDB;
    // Lưu trữ tất cả tên Table vào một mảng
    $return = '';
    $allTables = array();
    $result = mysqli_query($linkconnectDB, 'SHOW TABLES');
    while ($row = mysqli_fetch_row($result)) {
        $allTables[] = $row[0];
    }

    foreach ($allTables as $table) {
        $result = mysqli_query($linkconnectDB, 'SELECT * FROM ' . $table);
        $num_fields = mysqli_num_fields($result);

        $return .= 'DROP TABLE IF EXISTS ' . $table . ';';
        $row2 = mysqli_fetch_row(mysqli_query($linkconnectDB, 'SHOW CREATE TABLE ' . $table));
        $return .= "\n\n" . $row2[1] . ";\n\n";

        for ($i = 0; $i < $num_fields; $i++) {
            while ($row = mysqli_fetch_row($result)) {
                $return .= 'INSERT INTO ' . $table . ' VALUES(';
                for ($j = 0; $j < $num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n", "\\n", $row[$j]);
                    if (isset($row[$j])) {
                        $return .= '"' . $row[$j] . '"';
                    } else {
                        $return .= '""';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return .= ',';
                    }
                }
                $return .= ");\n";
            }
        }
        $return .= "\n\n";
    }

    // Tạo thư mục Backup
    $folder = 'admin/database/';
    if (!is_dir($folder))
        mkdir($folder, 0777, true);
    chmod($folder, 0777);
    // Đặt tên file
    $date = date('Y-m-d-H-i-s', time() + 7 * 3600);
    $filename = $folder . "db-backup-tanhongit-" . $date;
    //Tạo file .sql
    $handle = fopen($filename . '.sql', 'w+');
    fwrite($handle, ($return));
    fclose($handle);
}
function delete_file_backup($link_connect)
{
    if (is_file($link_connect)) {
        unlink($link_connect);
    }
}
