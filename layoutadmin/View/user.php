<div class="option">
    <?php if (!empty($this->users) && is_array($this->users)) : ?>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <TH>Email</TH>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id'], ENT_QUOTES) ?></td>
                        <td><?= htmlspecialchars($user['username'], ENT_QUOTES) ?></td>
                        <td><?= htmlspecialchars($user['email'], ENT_QUOTES) ?></td>
                        <td class="adodo">
                            <!-- <a class="liems" href="index.php?trang=editcategory&id=<?= $user['id'] ?>"><i class="fa-regular fa-pen-to-square"></i></a> -->
                            <a href="index.php?trang=deleteuser&id=<?= $user['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?')"><i style="color: #FF5733;" class ="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No users available.</p>
    <?php endif; ?>
</div>
