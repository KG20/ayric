<?php
exec('pg_dump $DB_URL > backup.sql');
file_put_contents('backups/' . date('Y-m-d') . '.sql', file_get_contents('backup.sql'));