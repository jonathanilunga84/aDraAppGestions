<?php

    if(Session::has('error'))
        {

        ?>
            <script type="text/javascript">swal.fire("Message","{{ Session::get('error') }}","warning")</script>;
        <?php

        }
?>
