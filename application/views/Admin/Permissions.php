<!--index view-->
<?php if ( $this->data['view_type'] === 'view' ): ?>
	<?php require_once( VIEW_PATH . '_common/header.php' ) ?>
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
                            <div class="card mb-4 _card border_top_skin">
                                <div class="card-header with-border">
                                    <h5 class="card-title">
                                        All Permissions
                                    </h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="mb-0 table table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Permissions</th>
                                            </tr>
                                            </thead>
											<?php
											if ( count( $this->data['paths'] ) < 1 ) : ?>
                                                <tr>
                                                    <td colspan="15" class="notdata">No data found</td>
                                                </tr>
											<?php else : ?>
                                                <tbody>
												<?php
												foreach ( $this->data['paths'] as $nav ):
													$p_class = ( in_array( $nav['action'], $this->data['deletedPaths'] ) ) ? 'text_orange' : ( isset( $nav['id'] ) ? 'text_success' : 'text-dark' );
													?>

                                                    <tr>
                                                        <td>
                                                            <a data-bs-toggle="modal" data-bs-target="#ajaxModal"
                                                               href="/admin/permissions/edit/<?= urlencode( $nav["action"] ) ?>"
                                                               class="<?= $p_class ?>">
																<?= $nav['action'] ?>
                                                            </a>
                                                        </td>
                                                        <td>
															<?php if ( $nav['pid'] ): ?>
																<?php foreach ( $nav['pid'] as $pid ): ?>
                                                                    <span class="badge
                                                                        <?php
																	if ( $this->data['groups'][ $pid ] === 'Admin' ) {
																		echo "bg_skin";
																	} elseif ( $this->data['groups'][ $pid ] === 'Manager' ) {
																		echo "bg_blue";
																	} else {
																		echo "bg-secondary";
																	}
																	?>
                                                                        ">
                                                                        <?= $this->data['groups'][ $pid ] ?>
                                                                    </span>
																<?php endforeach; ?>
															<?php endif; ?>
                                                        </td>
                                                    </tr>

												<?php endforeach; ?>
                                                </tbody>
											<?php endif; ?>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Main layout end-->
	<?php require_once( VIEW_PATH . '_common/footer.php' ) ?>
    <!--    if modal view-->


<?php elseif ( $this->data['view_type'] === 'modal' ): ?>


    <div class="modal-header">
        <h4 class="modal-title"><?= $this->data['modal_title'] ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>


    <form action="" method="post">

		<?= $this->request->verifier ?>

        <div class="modal-body">

	        <?php $this->getMessage(); ?>
            <input type="hidden" name="id" value="<?= $this->data['navinfo']['id'] ?? '' ?>">

            <div class="mb-3">
                <label for="nav_path" class="form-label fw-bold">Path</label>
                <input type="text" class="form-control" id="nav_path" name="nav_path"
                       value="<?= urldecode( $this->data['navinfo']['action'] ) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Access Control</label>

		        <?php if ( $this->data['groups'] ): ?>
			        <?php foreach ( $this->data['groups'] as $key => $group ): ?>
                        <div class="form-check">
                            <input <?= ( in_array( $group['id'], $this->data['navinfo']['pid'] ) ) ? "checked" : "" ?>
                                    class="form-check-input" type="checkbox"
                                    value="<?= $group['id'] ?>" id="custom-check_<?= $key ?>"
                                    name="permissions[]">
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
            <button type="submit" class="btn _btn bg_skin"
                    name="<?= ( isset( $this->data['navinfo']['id'] ) && ! empty( $this->data['navinfo']['id'] ) ? 'update' : 'store' ) ?>">
                Confirm
            </button>
        </div>
    </form>

<?php endif; ?>
