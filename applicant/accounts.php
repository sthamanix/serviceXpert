<?php
switch ($view) {
    case 'accounts':
        $applicant = new Applicants();
        $appl = $applicant->single_applicant($_SESSION['APPLICANTID']);
?>


<style>

.label {
    display: inline;
    padding: 0.2em 0.6em 0.3em;
    font-size: 100%;
    font-weight: unsent;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25em;
}
 .account-details {
                background-color: #f8f8f8;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 40px;
                margin-bottom: 40px;
                font-weight: normal;
                font-family: Arial, sans-serif;
                color: #333;
            }

            .account-details h3 {
                font-size: 24px;
                font-weight: bold;
                margin-top: 0;
                margin-bottom: 20px;
            }

            .account-details p {
                margin: 0;
                line-height: 1.5;
            }

            .account-details .label {
                font-weight: normal;
                color: #555;
            }

            .account-details .name {
                color: #333;
                font-weight: normal;
                font-size: 16px;
            }
        </style>

        <div class="account-details">
            <h3>Accounts</h3>
            <p><span class="label">Firstname:</span> <span class="name"><?php echo $appl->FNAME; ?></span></p>
            <p><span class="label">Lastname:</span> <span class="name"><?php echo $appl->LNAME; ?></span></p>
            <p><span class="label">Email:</span> <?php echo $appl->EMAILADDRESS; ?></p>

            <?php if (isset($appl->GENDER)) : ?>
                <p><span class="label">Gender:</span> <?php echo $appl->GENDER; ?></p>
            <?php endif; ?>

            <p><span class="label">Date of Birth:</span> <?php echo date_format(date_create($appl->BIRTHDATE), 'F d, Y'); ?></p>
            <!-- <p><span class="label">Place of Birth:</span> <?php echo $appl->BIRTHPLACE; ?></p> -->

            <?php if (isset($appl->TELNO)) : ?>
                <p><span class="label">Contact No.:</span> <?php echo $appl->TELNO; ?></p>
            <?php endif; ?>

            <!-- <p><span class="label">Civil Status:</span> <?php echo $appl->CIVILSTATUS; ?></p>
            <p><span class="label">Academic Qualification:</span> <?php echo $appl->DEGREE; ?></p> -->
        </div>

<?php
        break;
    default:
        echo "Invalid view.";
        break;
}
?>
