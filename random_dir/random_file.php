<?php

setcookie("csrf_token",
        "0123456789012345678901234567890123456789",
        time() + 3600,
        "/csrf/susi/", "susi.bg");
