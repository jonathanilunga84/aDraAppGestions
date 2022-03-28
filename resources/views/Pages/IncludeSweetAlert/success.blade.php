<?php

    if(Session::has('success'))
        {
        ?>
            <script type="text/javascript">swal.fire("Message","{{ Session::get('success') }}","success")</script>;
        <?php

        }

?>
