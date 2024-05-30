<?php include_once 'header.php' ?>
<title>Admin</title>
<link rel="stylesheet" href="./assets/styles/admin.css">

<?php
require_once('./entities/user.class.php');
?>

<!-- GET DOCUMENT -->
<?php
$userList = User::list_user();
?>

<main>
    <div class="admin_page">
        <h1 class="admin__heading">TRANG ADMIN - QUẢN LÝ TOUR DU LỊCH</h1>

        <div style="text-align: center; margin-top: 30px">
            <form method="post" action="./add_update_destination.php" class="custom-form">
                <button class="btn btn-primary">Thêm người dùng</button>
            </form>
        </div>

        <div class="wrapper__admin">
            <aside class="aside__left">
                <ul class="task-list">
                    <h4 class="task-list-heading">Danh mục quản lý</h4>
                    <li class="task-item">
                        <a href="./admin_destination.php">Địa điểm du lịch</a>
                    </li>
                    <li class="task-item">
                        <a href="./admin_tours.php">Tours du lịch</a>
                    </li>
                    <li class="task-item">
                        <a href="./admin.guider.php">Hướng dẫn viên</a>
                    </li>
                    <li class=" task-item">
                        <a href="./admin_blog.php">Bài viết quảng cáo</a>
                    </li>
                    <li class="task-item">
                        <a href="./admin_user.php">Tài khoản người dùng</a>
                    </li>
                    <li class="task-item">
                        <a href="./admin_country.php">Quốc gia nổi tiếng</a>
                    </li>
                </ul>
            </aside>
            <div class="admin__main">
                <table>
                    <thead>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($userList as $item) { ?>
                            <tr>
                                <td class="doc-id"><?php echo $item["email"] ?></td>
                                <td>
                                    <form style="margin-bottom: 0;" method="post" action="./add_update_destination.php">
                                        <input type="hidden" name="document_id" value="<?php echo $item['email'] ?>">
                                        <button style="font-size: 13px;" type="submit" class="btn-update">Cập nhật</button>
                                    </form>
                                </td>
                                <td>
                                    <form style="margin-bottom: 0;" method="post" action="./delete_user.php" onsubmit="return confirmDelete()">
                                        <input type="hidden" name="document_id" value="<?php echo $item['email']; ?>">
                                        <button style="font-size: 13px;" type="submit" class="btn-delete">Xóa</button>
                                    </form>
                                </td>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include_once 'footer.php' ?>