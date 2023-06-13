<!--Footer start-->
<footer class="footer-wrapper">
    <strong>Copyright © <?= date("Y") ?>
        <a href="<?= APP_URL ?>" target="blank"><?= SITE_NAME ?></a>.
    </strong>
    All rights reserved.
</footer>
<!--Footer end-->
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="ajaxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0"></div>
    </div>
</div>
<!-- hidden form-->
<form class="d-none" role="form" id="hidden_form" action="" method="post">
    <?= $this->request->verifier; ?>
    <input type="hidden" name="id" id="hidden_input" value="">
</form>



<div class="offcanvas offcanvas-end" tabindex="-1" id="searchServer" aria-labelledby="searchServerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="searchServerLabel">Select Server</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="p-3">
        <form data-search-server>
            <div class="input-group mb-2">
                <input name="search-server" type="search" placeholder="Search.." aria-describedby="button-addon5" class="form-control">
                <div class="input-group-append">
                    <button id="button-addon5" type="submit" class="btn btn_primary"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="offcanvas-body vh-100" data-servers>

    </div>
</div>

<!-- scripts -->
<?php $this->loadScript(); ?>

<script>
    var selectedServer = <?= $_SESSION['server']['id'] ?? 0  ?>;

    var serverList = [];

    function ShowServers(host, ip_address, id, selected) {
        return `
        <a href='javascript:SelectServer(${id})' class="server d-block mb-2 p-2 w-100 ${ selected === id ? 'border_success' : '' }">
            <div class="align-items-center d-flex">
                <div class="info ${ selected === id ? 'text_success' : '' }">
                    <div class="fw-bold">${host}</div>
                    <small class="ip-address text-muted fs-12">${ip_address}</small>
                </div>
                <div class="ms-auto">
                        <i class="${ selected === id ? 'fa-regular fa-circle-check text_success fs-3' : 'text_primary fa-regular fa-circle-play fs-3' }"></i>
                </div>
            </div>
        </a>
        `
    }


    //on load 
    $(document).ready(function() {
        $.ajax({
            //accept data type json
            dataType: "json",
            url: "<?= APP_URL ?>/admin/server/getallservers",
            type: "GET",
            success: function(data) {

                $.each(data.servers, function(key, server) {
                    $('div[data-servers]').append(ShowServers(server.hostname, server
                        .ip_address, server.id, selectedServer));
                });

                //on search
                $('form[data-search-server]').on('submit', function(e) {
                    e.preventDefault();
                    var search = $('input[name="search-server"]').val();
                    $('div[data-servers]').html('');
                    $.each(data.servers, function(key, server) {
                        if (server.hostname.toLowerCase().includes(search
                                .toLowerCase()) || server.ip_address.toLowerCase().includes(
                                search.toLowerCase())) {
                            $('div[data-servers]').append(ShowServers(server.hostname,
                                server.ip_address, server.id, selectedServer));
                        }
                    });
                });

                //search-server on keyup
                $('input[name="search-server"]').on('keyup', function(e) {
                    //submit form
                    $('form[data-search-server]').submit();
                });

            }
        });
    });




    //#select-server on focus
    $('#select-server').on('focus click', function(e) {
        e.preventDefault();
        //open offcanvas
        ServerList();
    });
    //serverList
    function ServerList() {
        var searchServer = document.getElementById('searchServer')
        var searchServer = new bootstrap.Offcanvas(searchServer)
        searchServer.show()
    }
    //.searchbar on submit
    $('.searchbar').on('submit', function(e) {
        e.preventDefault();
        //open offcanvas
        ServerList();

    });


    //select server
    async function SelectServer(id) {
        conf = await confirmation(`Are you sure want to select this server?`);
        if (conf) {
            location.replace(`<?= APP_URL ?>/admin/server/select/${id}/`)
        }
    }
</script>


</body>

</html>