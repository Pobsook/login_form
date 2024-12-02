<?php
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        if (isset($_SESSION['result'])) {
            if ($_SESSION['result'] == 'การสมัครสมาชิกสำเร็จ' || $_SESSION['result'] == 'เข้าสู่ระบบสำเร็จ') {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'สำเร็จ!',
                        text: '{$_SESSION['result']}'
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{$_SESSION['result']}'
                    });
                </script>";
            }
            unset($_SESSION['result']); // ลบข้อมูลหลังแสดงผล
        }
    ?>