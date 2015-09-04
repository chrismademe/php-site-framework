<!--
 *
 * Message template
 *
 * Variables available:
 * {date} = Current date
 * {time} = Current time
 * {site_name} = Site name as configured in contact.process.php
 * {site_logo} = Path to site logo as configured on contact.process.php
 *
 * Other variables are
 * generated by the contact
 * class based on the input IDs
 * e.g. input ID "name" would
 * generate {name} as a variable.
 *
-->
<!doctype html>
<html>
<body style='font-family: Helvetica Neue, Arial, sans-serif; font-size: 16px; font-weight: 300; height: 100vh; margin: 0'>

<div style='background: #efefef;'>
    <div align='center' style='padding: 40px'>
        <table cellspacing='0' cellpadding='0' border='0' style='font-family: Helvetica Neue, Arial, sans-serif; font-size: 16px; font-weight: 300; max-width: 600px; position: relative'>
            <!-- top line -->
            <tr>
                <td colspan='2' style='padding: 16px; text-align: center;' width='160'><img id='logo' src='<?= SITE_DOMAIN ?>/<?php assets_dir() ?>/images/logo.png' style='height: auto;width: 180px;'></td>
            </tr>
            <!-- header -->
            <tr>
                <td bgcolor='#ffffff' colspan='2' style='color: #555; font-family: Helvetica Neue, Arial, sans-serif; font-size: 16px; font-weight: 300; line-height: 160%; padding: 16px 36px'>
                <strong style='font-weight: 700'>From:</strong> <?= $this->name ?><br>
                <strong style='font-weight: 700'>When:</strong> <?= $this->time ?> on <?= $this->date ?><br>
                <strong style='font-weight: 700'>Phone Number:</strong> <?= $this->phone ?><br>
                <div style='padding-top: 24px;'><?= $this->message ?></div>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
