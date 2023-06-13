<!--index view-->
<?php if ($this->data['view_type'] === 'view') : ?>
    <?php require_once(VIEW_PATH . '_common/header.php') ?>
    <?php $this->addScript("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js", 3) ?>
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">-->

    <style>
        .nav-table,
        .nav-table ul {
            list-style: none;
            padding: 0
        }

        .nav-table ul {
            margin-left: 35px
        }

        .nav-table .draglist {
            background: #f4f4f4;
            border-left: 2px solid #e6e7e8;
            border-radius: 2px;
            color: #444;
            margin-bottom: 2px;
            padding: 10px
        }

        .nav-table .draglist:hover {
            background-color: #ddd;
            cursor: move
        }

        .nav-table>li .tools {
            color: #dd4b39;
            float: right
        }

        .nav-table>li .tools i {
            margin-right: 10px
        }

        .nav-table .nav_icon {
            margin-right: 8px
        }

        .nav-table .nav_name,
        .nav-table .nav_path {
            display: inline-block;
            width: 100px
        }

        .nav-table .nav_path {
            display: none
        }

        .nav-table .sub_nav li .nav_name {
            width: calc(130px - 35px)
        }

        @media screen and (min-width: 576px) {
            .nav-table .nav_path {
                display: inline-block;
                width: 180px
            }
        }

        @media screen and (min-width: 991px) {
            .nav-table .nav_name {
                display: inline-block
            }

            .nav-table .nav_name,
            .nav-table .nav_path {
                display: inline-block;
                width: 180px
            }

            .nav-table .sub_nav li .nav_name {
                width: calc(250px - 35px)
            }
        }

        @media screen and (min-width: 1100px) {

            .nav-table .nav_name,
            .nav-table .nav_path {
                width: 280px
            }

            .nav-table .sub_nav li .nav_name {
                width: calc(280px - 35px)
            }
        }

        .ui-sortable {
            position: relative
        }

        .drag-placeholder {
            background-color: #f9f979 !important;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            min-height: 30px;
            min-width: 30px
        }

        .ui-sortable-helper>.sub_nav {
            border: none !important;
            min-height: unset !important
        }

        /*# sourceMappingURL=style.css.map */
    </style>

    <!--Main layout start-->
    <main>
        <div class="content-wrapper">
            <!-- Content Header (Page Header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row align-items-center my-4">
                        <div class="col-sm-7">
                            <h3 class="m-0"><?= $this->data['page_title'] ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <?php $this->getMessage(); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4 _card">
                                <div class="card-header with-border">
                                    <h5 class="card-title">
                                        All Navigations
                                    </h5>
                                    <div class="card-options">
                                        <a data-bs-toggle="modal" data-bs-target="#ajaxModal" class="btn _btn btn_primary rounded-pill" href="<?= APP_URL ?>/admin/navs/add/">
                                            <i class="fas fa-plus"></i> Add New Menu
                                        </a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body nowrap">
                                    <?php
                                    if (count($this->data['navs']) < 1) : ?>
                                        <li>Not Found</li>
                                    <?php else : ?>

                                        <?php function buildMenuFromArray($menu_array, $groups, $parent_id = 0, $parentClass = "", $subClass = "")
                                        {
                                            $childItems = [];
                                            foreach ($menu_array as $key => $item) {
                                                if ($item['parent_id'] == $parent_id) {
                                                    $childItems[] = $item;
                                                    unset($menu_array[$key]);
                                                }
                                            }

                                            if ($childItems) {
                                                echo "<ul class='{$parentClass}'>";

                                                foreach ($childItems as $key => $item) : ?>
                                                    <li id="<?= $item['id'] ?>" data-parent_id="<?= $item['parent_id'] ?>">
                                                        <div class='draglist'>
                                                            <span class="nav_icon">
                                                                <i class="<?= $item['nav_icon'] ?>"></i>
                                                            </span>
                                                            <span class="nav_name"><?= $item['nav_name'] ?></span>
                                                            <span class="nav_path"><?= $item['nav_path'] ?></span>
                                                            <?php
                                                            if (isset($item['group_id'])) {
                                                                foreach ($item['group_id'] as $gid) {
                                                                    echo "<span class='badge me-1 ";

                                                                    if ($groups[$gid] === 'Admin') {
                                                                        echo 'bg_skin';
                                                                    } elseif ($groups[$gid] === 'Employee') {
                                                                        echo 'bg_blue';
                                                                    } else {
                                                                        echo 'bg-secondary';
                                                                    }

                                                                    echo "'>{$groups[$gid]}</span>";
                                                                }
                                                            }
                                                            ?>
                                                            <div class="tools">
                                                                <a data-bs-toggle="modal" data-bs-target="#ajaxModal" href='<?= APP_URL . "/admin/navs/edit/$item[id]" ?>'>
                                                                    <i class='far fa-edit text_primary'></i>
                                                                </a>
                                                                <a href="javascript:deleteItem('<?= $item['id'] ?>' , '<?= APP_URL ?>/admin/navs/delete/')">
                                                                    <i class='far fa-trash-alt text-danger'></i>
                                                                </a>
                                                            </div>

                                                        </div>

                                                        <?php buildMenuFromArray($menu_array, $groups, $item['id'], $subClass, $subClass); ?>

                                                    </li>
                                    <?php endforeach;

                                                echo '</ul>';
                                            } else {
                                                echo "<ul class='{$subClass}'></ul>";
                                            }
                                        }

                                        buildMenuFromArray($this->data['navs'], $this->data['groups'], 0, 'nav-table ui-sortable', 'sub_nav');
                                    endif;
                                    ?>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="javascript:updateNav()" class="btn _btn bg_skin float-end">Save</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Main layout end-->
    <?php require_once(VIEW_PATH . '_common/footer.php') ?>
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        function updateNav() {
            var id = [];
            var parent_id = [];
            // find all li and store id and parent_id to variables
            $('.nav-table .ui-sortable-handle').each(function() {
                id.push($(this).attr('id'));
                parent_id.push($(this).data('parent_id'));
            });
            // clear undefined values from array
            id = id.filter(Boolean);
            parent_id = parent_id.filter(function(element) {
                return element !== undefined;
            });

            // send values to controller
            $.ajax({
                url: "/admin/navs/UpdateNav/",
                method: "POST",
                data: {
                    id,
                    parent_id
                },
                success: function(data) {
                    window.location.reload();
                }
            });
        }

        function deleteItem(id, action) {
            var conf = confirm("Are you sure want to remove this data?");
            if (conf) {
                $("#hidden_input").val(id);
                $("#hidden_form").attr('action', action).submit();
            }
        }

        $(document).ready(function() {
            $(".ui-sortable.nav-table").sortable({
                connectWith: '.ui-sortable.nav-table, .sub_nav',
                cursor: "move",
                axis: "y",
                placeholder: 'drag-placeholder',
                start: function(e, ui) {
                    ui.placeholder.height(ui.item.height());
                    $('.sub_nav').css({
                        'minHeight': '10px',
                        'border': '1px dashed lightgray',
                        'padding': '5px 0'
                    });
                    $('.sub_nav .sub_nav').css({
                        'minHeight': '10px',
                        'border': '1px dashed green',
                        'padding': '5px 0'
                    });
                },
                update: function(event, ui) {
                    setIds();
                },
                stop: function(event, ui) {
                    $('.sub_nav').css({
                        'minHeight': 'unset',
                        'border': 'none',
                        'padding': '0px'
                    });
                    $('.sub_nav .sub_nav').css({
                        'minHeight': 'unset',
                        'border': 'none',
                        'padding': '0px'
                    });
                }
            });

            $(".ui-sortable .sub_nav").sortable({
                connectWith: '.ui-sortable.nav-table, .sub_nav',
                cursor: "move",
                axis: "y",
                placeholder: 'drag-placeholder',
                start: function(e, ui) {
                    ui.placeholder.height(ui.item.height());
                    $('.nav-table').css({
                        'minHeight': '10px',
                        'border': '1px dashed lightgray',
                        'padding': '5px 0'
                    });
                    $('.sub_nav').css({
                        'minHeight': '10px',
                        'border': '1px dashed lightgray',
                        'padding': '5px 0'
                    });
                    $('.sub_nav .sub_nav').css({
                        'minHeight': '10px',
                        'border': '1px dashed green',
                        'padding': '5px 0'
                    });
                },
                update: function(event, ui) {
                    setIds();
                },
                stop: function(event, ui) {
                    $('.nav-table').css({
                        'minHeight': 'unset',
                        'border': 'none',
                        'padding': '0px'
                    });
                    $('.sub_nav').css({
                        'minHeight': 'unset',
                        'border': 'none',
                        'padding': '0px'
                    });
                    $('.sub_nav .sub_nav').css({
                        'minHeight': 'unset',
                        'border': 'none',
                        'padding': '0px'
                    });
                }
            });

            function setIds() {
                // set direct children attr parent_id 0
                $('.nav-table > li').each(function() {
                    $(this).attr('data-parent_id', '0')
                });

                // set sub ul parent_id as his parent id attr
                $('.sub_nav').each(function() {
                    let pid = $(this).parent().attr('id');
                    if (pid !== undefined) {
                        $(this).children().attr('data-parent_id', pid)
                    }
                });

            }
        });
    </script>
    <!--    if modal view-->
<?php elseif ($this->data['view_type'] === 'modal') : ?>
    <div class="modal-header">
        <h4 class="modal-title"><?= $this->data['page_title']; ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="" method="post">
        <div class="modal-body">
            <?php $this->getMessage(); ?>

            <?= $this->request->verifier ?>

            <input type="hidden" name="id" value="<?= $this->data['navinfo']['id'] ?? '' ?>">

            <div class="mb-3">
                <label for="select2-icon" class="form-label fw-bold">Select Icon</label>
                <select class="form-select select2-show-search" id="select2-icon" name="nav_icon" required>
                    <?php
                    foreach ($this->data['icons'] as $icon_class) {
                        echo "<option value='{$icon_class}' " .
                            (!empty($this->data['navinfo']['nav_icon']) && $this->data['navinfo']['nav_icon'] == $icon_class ? 'selected' : '')
                            . " data-icon='{$icon_class}'>{$icon_class}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="parent_id" class="form-label fw-bold">Parent</label>
                <select class="form-select select2" id="parent_id" name="parent_id" required>
                    <option value="0">- This is parent -</option>
                    <?php
                    if ($this->data['navParents']) {
                        foreach ($this->data['navParents'] as $parent) {
                            echo "<option value='{$parent['id']}' " . ($this->data['navinfo']['parent_id'] == $parent['id'] ? 'selected' : '') . ">{$parent['nav_name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="nav_name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="nav_name" name="nav_name" value="<?= $this->data['navinfo']['nav_name'] ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="nav_path" class="form-label fw-bold">Path</label>
                <input type="text" class="form-control" id="nav_path" name="nav_path" value="<?= $this->data['navinfo']['nav_path'] ?? '' ?>" required>
                <div class="form-text">
                    <div class="form-check">
                        <input id="files" type="checkbox" name="caf" class="form-check-input" style="width: 1em;height: 1em">
                        <label for="files" style="line-height: 1.7;">Create associative files</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Permission</label>
                <hr class="mt-0">
                <?php if ($this->data['groups']) : ?>
                    <?php foreach ($this->data['groups'] as $key => $group) : ?>
                        <div class="form-check">
                            <input <?= (in_array($group['id'], ($this->data['navinfo']['group_id'] ?? [])) ? "checked" : "") ?> class="form-check-input" type="checkbox" value="<?= $group['id'] ?>" id="custom-check_<?= $key ?>" name="group_id[]">
                            <label class="form-check-label" for="custom-check_<?= $key ?>">
                                <?= $group['group_name'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>

        </div>

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn _btn btn_default rounded-2" data-bs-dismiss="modal">
                Close
            </button>
            <button type="submit" class="btn _btn bg_skin" name="<?= (isset($this->data['navinfo']['id']) && !empty($this->data['navinfo']['id']) ? 'update' : 'store') ?>">
                Confirm
            </button>
        </div>
    </form>
    <script>
        function formatText(icon) {
            return $('<span><i class="' + $(icon.element).data('icon') + '"></i> ' + $(icon.element).data('icon') + '</span>');
        }

        $('#ajaxModal').on('shown.bs.modal', function(e) {
            $('#select2-icon').select2({
                minimumResultsForSearch: '',
                width: '100%',
                templateSelection: formatText,
                templateResult: formatText,
                dropdownParent: $("#ajaxModal")
            });
        });
    </script>
<?php endif; ?>