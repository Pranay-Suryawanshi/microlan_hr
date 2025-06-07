<html>

<head>
    <title>Punch In</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<style>
    /**
*@author Alesh
*/

    html,
    body {
        margin: 20px;
    }

    img {
        max-width: 100%;
        max-height: 100%;
    }

    .card-container {
        margin: auto;
        /* center the element within the container */
        width: 347px;
        border-style: solid;
    }

    .companyLogo {
        margin: auto;
        padding-left: 89px;
        width: 300px;
        height: 80px;
    }

    .companyLogo img {
        margin: auto;
    }

    .employeeAvatar {
        margin: auto;
        height: 150px;
        width: 150px;
    }

    .employeeAvatar img {
        border-radius: 50%;
    }

    .employeeName {
        padding-top: 8px;
        width: 50%;
        margin: 0 auto;
        text-align: center;
    }

    span.name {
        font-size: 20px;
        text-transform: uppercase;
    }

    .employeeInformation {
        margin: auto;
        text-align: center;
        font-size: 16px;
    }

    hr.divider {
        margin: 5px;
        border-width: 2px;
    }
</style>

<body>

    <div class="card-container">
        <div class="companyLogo">
            <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo of the company">
        </div>
        <div class="employeeAvatar">
            <?php if (empty($profile_photo)) { ?>
                <img src="<?php echo base_url(); ?>assets/images/user.png" alt="employee image"
                    style="margin-left: 7px;">
            <?php } else { ?>
                <img src="<?php echo base_url(); ?>uploads/profile/<?php echo $profile_photo; ?>" alt="employee image"
                    style="margin-left: 7px;">
            <?php } ?>


        </div>
        <div class="employeeName">
            <div><span class="name"><strong><?php echo $user_name; ?></strong></span></div>
            <div><span class="designation"><?php echo $designation[0]['des_name']; ?></span></div>
        </div>
        <hr class="divider" />
        <div class="employeeInformation">
            <div>
                <span class="emp-info"><?php echo $contact_no; ?></span>
            </div>
            <div>
                <span class="emp-info"><?php echo $email; ?></span>
            </div>
            <div>
                <button id="punch-btn" data-status="in">Punch In</button>
                <p id="location"></p>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Button click event
            $('#punch-btn').click(function () {
                const punchStatus = $(this).data('status'); // 'in' or 'out'
                alert(punchStatus);
                const button = $(this);

                // Get current location
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function (position) {
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;

                            // Send AJAX request to store punch log
                            $.ajax({
                                url: "<?= site_url('attendance/punch_in') ?>",
                                type: "POST",
                                data: {
                                    user_id: <?= $user_id ?>,
                                    punch_status: punchStatus,
                                    latitude: latitude,
                                    longitude: longitude
                                },
                                success: function (response) {

                                    //  if (data.status) {
                                    // Update button status and text
                                    if (punchStatus == "in") {
                                        button.text("Punch Out").data("status", "out");
                                        window.location.href = "admin";
                                    } else {
                                        button.text("Punch In").data("status", "in");
                                        window.location.href = "alogin";
                                    }
                                    //  }
                                },
                                error: function () {
                                    alert("Failed to punch in/out. Try again.");
                                }
                            });
                        },
                        function (error) {
                            alert("Failed to get location: " + error.message);
                        }
                    );
                } else {
                    alert("Geolocation is not supported by your browser.");
                }
            });
        });
    </script>
</body>

</html>