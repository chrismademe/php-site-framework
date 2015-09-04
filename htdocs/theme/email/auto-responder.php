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
        <table cellspacing='0' cellpadding='16' border='0' style='font-family: Helvetica Neue, Arial, sans-serif; font-size: 16px; font-weight: 300; max-width: 600px;'>
            <tr>
                <td colspan='2' height='40' valign='top' style='color: #777777; font-family: Helvetica Neue, Arial, sans-serif; font-weight: 300;font-size: 13px;text-align: center;'>This is an automated response. Please do not reply to this message.</td>
            </tr>
        </table>
        <table cellspacing='0' cellpadding='0' border='0' style='font-family: Helvetica Neue, Arial, sans-serif; font-size: 16px; font-weight: 300; max-width: 600px; position: relative'>
            <!-- top line -->
            <tr>
                <td colspan='2' style='padding: 16px; text-align: center' width='160'><img id='logo' src='<?= SITE_DOMAIN ?>/<?php assets_dir() ?>/images/logo.png'' style='height: auto;width: 180px;'></td>
            </tr>
            <!-- header -->
            <tr>
                <td bgcolor='#ffffff' colspan='2' style='color: #555; font-family: Helvetica Neue, Arial, sans-serif; font-size: 16px; font-weight: 300; line-height: 160%; padding: 16px 36px'>
                <p style='text-transform: capitalize;'>Dear <?= $this->name ?>,</p>
                <p>Thanks for contacting <?= $this->site_name ?>. We'll be in touch shortly.</p>
                <p>Kind regards,<br><?= $this->site_name ?></p>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
