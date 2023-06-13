<?php if ($this->data['action'] == 'add') : ?>

    <div class="modal-header">
        <h4 class="modal-title"><?= $this->data['page_title']; ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="<?= APP_URL ?>/admin/users/add/" method="post" autocomplete="off">
        <?= $this->request->verifier ?>

        <div class="modal-body">

            <div class="mb-3">
                <label for="name" class="form-label ">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label ">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="mb-3">

                        <label for="phone" class="form-label ">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" required>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class=" mb-3">
                        <label for="status" class="form-label ">Status</label>
                        <select class="form-select select2-show-search-modal" id="status" name="status" required>
                            <option value="1" selected>Active</option>
                            <option value="0">Disabled</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="group" class="form-label ">Group</label>
                        <select class="form-select select2-show-search-modal" id="group" name="group_id" required>
                            <option value="">- Select One -</option>
                            <?php
                            if ($this->data['groups']) {
                                foreach ($this->data['groups'] as $group) {
                                    echo "<option value='{$group['id']}'>{$group['group_name']}</option>";
                                }
                            }
                            ?>
                        </select>

                    </div>
                </div>

            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password <button class="btn_primary btn btn-sm fs-10 ms-2" type="button" onclick="generatePassword('password')">Generate</button></label>
                <input type="password" class="form-control" id="password" name="password" title="Password must be between 8 and 20 characters" pattern=".{8,20}" required>
            </div>

        </div>

        <div class="modal-footer">

            <button type="button" class="btn _btn btn_default" data-bs-dismiss="modal">Close</button>

            <button type="submit" class="btn _btn btn_primary" name="AddNew">Save</button>

        </div>

    </form>

<?php else : ?>

    <div class="modal-header">
        <h4 class="modal-title">Modify <?= $this->data["user"]['name'] ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="<?= APP_URL ?>/admin/users/edit/" method="post">
        <?= $this->request->verifier ?>

        <div class="modal-body">

            <input type="hidden" name="id" value="<?= $this->data["user"]["id"] ?>">

            <div class="mb-3">
                <label for="password" class="form-label ">Password <button class="btn_primary btn btn-sm fs-10 ms-2" type="button" onclick="generatePassword('password')">Generate</button></label>
                <input type="password" class="form-control" id="password" name="password" title="Password must be between 8 and 20 characters" pattern=".{8,20}">
            </div>

            <div class="mb-3">
                <label for="group" class="form-label ">Group</label>
                <select class="form-select select2-show-search-modal" id="group" name="group_id" required>
                    <?php
                    if ($this->data['groups']) {
                        foreach ($this->data['groups'] as $group) {
                            echo "<option value='{$group['id']}' " . ($this->data["user"]["group_id"] == $group['id'] ? 'selected' : '') . " >{$group['group_name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>

        </div>

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn _btn btn_default rounded-2" data-bs-dismiss="modal"> Close</button>
            <button type="submit" class="btn _btn bg_skin"> Save changes</button>
        </div>

    </form>

<?php endif; ?>